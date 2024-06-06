<?php

namespace App\Controllers\Mobile;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class SuratMasukController extends BaseController
{
    protected $masterAsset;
    protected $pengajuan;
    protected $user;
    protected $barangMasuk;
    protected $barangKeluar;
    public function __construct()
    {
        $this->masterAsset = new \App\Models\MasterAssetModel();
        $this->pengajuan = new \App\Models\PengajuanPerangkatModel();
        $this->user = new \App\Models\AdminModel();
        $this->barangMasuk = new \App\Models\BarangMasukModel();
        $this->barangKeluar = new \App\Models\BarangKeluarModel();
    }

    public function suratmasuk()
    {
        $pengajuanData = $this->pengajuan
            ->join('user', 'user.id = tbl_pengajuan.id_user')
            ->where('status', 'Disetujui')
            ->orderBy('id_pengajuan', 'DESC')
            ->findAll();

        // fifo
        $pengajuanDataAntri = $this->pengajuan
            ->join('user', 'user.id = tbl_pengajuan.id_user')
            ->where('pm1', '1')
            ->orderBy('id_pengajuan', 'ASC')
            ->findAll();

        $data = [
            'title' => 'Surat Masuk',
            'pengajuan' => $pengajuanData,
            'pengajuanAntri' => $pengajuanDataAntri,
        ];
        return view('mobile/surat-masuk/surat-masuk', $data);
    }

    public function edit($id)
    {
        $pengajuan = $this->pengajuan->find($id);
        $dataSimpan = $this->barangMasuk->where('id_simpan', $pengajuan['id_simpan'])->join('tbl_master_asset', 'tbl_master_asset.id = tbl_barang_masuk.id_asset')->findAll();
        $dataAmbil = $this->barangKeluar->where('id_ambil', $pengajuan['id_ambil'])->join('tbl_master_asset', 'tbl_master_asset.id = tbl_barang_keluar.id_asset')->findAll();
        $namaTeknisi = $this->user->find($pengajuan['id_user']);
        $data = [
            'title' => 'Surat Masuk Permintaan Teknisi',
            'data' => $pengajuan,
            'dataSimpan' => $dataSimpan,
            'dataAmbil' => $dataAmbil,
            'namaTeknisi' => $namaTeknisi['nama']
        ];

        return view('mobile/surat-masuk/edit', $data);
    }

    public function update()
    {
        $id_pengajuan = $this->request->getPost('id_pengajuan');

        // nama teknisi dari tbl_pengajuan dengan id
        $pengajuan = $this->pengajuan->find($id_pengajuan);
        $dataPengajuan = $this->user->find($pengajuan['id_user']);

        $tanggalPengajuan = $pengajuan['tgl_pengajuan'];

        // ubah format menjadi => rabu, 12 januari 2021
        $tanggalPengajuan = date('l, d F Y', strtotime($tanggalPengajuan));
        // ke nama hari indonesia
        $hari = [
            'Sunday' => 'Minggu',
            'Monday' => 'Senin',
            'Tuesday' => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday' => 'Kamis',
            'Friday' => 'Jumat',
            'Saturday' => 'Sabtu'
        ];
        $tanggalPengajuan = strtr($tanggalPengajuan, $hari);


        $tgl_awal = $pengajuan['tgl_awal'];

        // ubah format ambil tanggalnya saja => 12
        $tgl_awal = date('d', strtotime($tgl_awal));

        $tgl_akhir = $pengajuan['tgl_akhir'];
        // ubah format menjadi => 12 januari 2021
        $tgl_akhir = date('d F Y', strtotime($tgl_akhir));

        $tgl_pengambilan = $tgl_awal . ' - ' . $tgl_akhir;

        $pm1 = $this->user->where('role', 3)->select('nama')->first();
        $pm2 = $this->user->where('role', 4)->select('nama')->first();
        $unit = $pengajuan['unit'];

        $dataBarangmasuk = $this->barangMasuk->where('id_simpan', $pengajuan['id_simpan'])->join('tbl_master_asset', 'tbl_master_asset.id = tbl_barang_masuk.id_asset')
            ->select('deskripsi as nama_perangkat, sn as serial_number, merk as merk_perangkat')
            ->findAll();

        // databarang keluar
        $dataBarangkeluar = $this->barangKeluar->where('id_ambil', $pengajuan['id_ambil'])->join('tbl_master_asset', 'tbl_master_asset.id = tbl_barang_keluar.id_asset')
            ->select('deskripsi as nama_perangkat_simpan, sn as serial_numbe_simpanr, merk as merk_perangkatsimpan')
            ->findAll();


        // gunakan library php word
        $template = new \PhpOffice\PhpWord\TemplateProcessor('template_surat.docx');

        // setvalue tanggal format = rabu, 12 januari 2021
        $template->setValue('tanggal', $tanggalPengajuan);
        // setvalue tgl_pengambilan
        $template->setValue('tanggal_pengambilan', $tgl_pengambilan);
        // setvalue tgl_penyimpanan
        $template->setValue('tanggal_penyimpanan', $tgl_pengambilan);
        // ganti variabel di template dengan data dari database
        $template->setValue('nama_teknisi', $dataPengajuan['nama']);
        // // tanggal dari tbl_pengajuan dengan id, format tanggal indonesia
        // project_manager_1 diisi nama project manager 1
        $template->setValue('project_manager_1', $pm1['nama']);
        $template->setValue('nama_project_manager_1', $pm1['nama']);
        // project_manager_2 diisi nama project manager 2
        $template->setValue('project_manager_2', $pm2['nama']);
        // unit diisi dengan unit dari tbl_pengajuan dengan id
        $template->setValue('unit', $unit);
        // ttd_pm1 diisi dengan gambar, nama file gambar ttd_pm1.png
        $template->setImageValue('ttd_pm1', ['path' => 'ttd-pm-bandung.png', 'width' => 50, 'height' => 50]);
        // ttd_pm2 diisi dengan gambar, nama file gambar ttd_pm2.png
        $template->setImageValue('ttd_pm2', ['path' => 'ttd-pm-kordinator.png', 'width' => 50, 'height' => 50]);

        // placeholder nama_perangkat dilooping, dengan banyaknya data
        $template->cloneRowAndSetValues('nama_perangkat', $dataBarangmasuk);
        // placeholder nama_perangkat_simpan dilooping, dengan banyaknya data
        $template->cloneRowAndSetValues('nama_perangkat_simpan', $dataBarangkeluar);

        $namaSurat = 'surat-' . $pengajuan['id_simpan'] . '-' . date('d-m-Y') . '.docx';

        // simpan file surat.pdf di folder public /surat-masuk
        $template->saveAs($namaSurat);

        // return view untuk preview surat

        // update master asset untuk barang masuk
        $updateMasterAsset = $this->barangMasuk->where('id_simpan', $pengajuan['id_simpan'])
            ->select('id_asset')
            ->findAll();
        // cocokan id_asset dengan id pada tbl_master_asset, kemudia ubah status menjadi  Tersedia
        foreach ($updateMasterAsset as $data) {
            $this->masterAsset->update($data['id_asset'], ['status_perangkat' => 'Tersedia']);
        }

        // update master asset untuk barang Keluar
        $updateMasterAssetKeluar = $this->barangKeluar->where('id_ambil', $pengajuan['id_ambil'])
            ->select('id_asset')
            ->findAll();
        // cocokan id_asset dengan id pada tbl_master_asset, kemudia ubah status menjadi  $unit
        foreach ($updateMasterAssetKeluar as $data) {
            $this->masterAsset->update($data['id_asset'], ['status_perangkat' => $unit]);
        }

        // update status pengajuan

        $this->pengajuan->update($id_pengajuan, ['status' => 'Disetujui', 'nama_surat' => $namaSurat, 'admin' => 1]);



        return redirect()->to('/surat-masuk')->with('success', 'Permintaan Disetujui');
    }
}
