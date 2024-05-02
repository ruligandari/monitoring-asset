<?php

namespace App\Controllers\Mobile;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Model;

class PengajuanPerangkatController extends BaseController
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
    public function index()
    {
        $pengajuanData = $this->pengajuan->orderBy('id_pengajuan', 'DESC')->findAll();

        $data = [
            'title' => 'Pengajuan Perangkat',
            'pengajuan' => $pengajuanData
        ];

        return view('teknisi/pengajuan', $data);
    }

    public function tambah()
    {
        $barang = $this->masterAsset->findAll();
        $data = [
            'title' => 'Tambah Pengajuan Perangkat Baru',
            'barang' => $barang
        ];

        return view('teknisi/tambah', $data);
    }

    public function add()
    {
        // generate kombinasi angka 6 digit random id_simpan dan id_ambi
        $id_simpan = mt_rand(100000, 999999);
        $id_ambil = mt_rand(100000, 999999);

        $tanggal = $this->request->getVar('tanggal');
        $perangkat_disimpan[] = $this->request->getPost('perangkat_disimpan');
        $perangkat_diambil[] = $this->request->getPost('perangkat_diambil');
        $tanggalAwal = $this->request->getVar('tanggal_awal');
        $tanggalAkhir = $this->request->getVar('tanggal_akhir');
        $unit = $this->request->getPost('unit');

        $perangkat_disimpan = $perangkat_disimpan[0];
        $perangkat_diambil = $perangkat_diambil[0];

        //    simpan $perangkat_disimpan ke tbl barang masuk
        foreach ($perangkat_disimpan as $pd) {
            $data = [
                'id_asset' => $pd,
                'id_simpan' => $id_simpan,
                'tanggal_barang_masuk' => date('Y-m-d', strtotime($tanggal)),
            ];

            $this->barangMasuk->insert($data);
        }
        //  simpan $perangkat_diambil ke tbl barang keluar
        foreach ($perangkat_diambil as $pa) {
            $data = [
                'id_asset' => $pa,
                'id_ambil' => $id_ambil,
                'tanggal_barang_keluar' => date('Y-m-d', strtotime($tanggal)),
            ];

            $this->barangKeluar->insert($data);
        }

        $data = [
            'id_user' => $this->request->getPost('id_user'),
            'id_simpan' => $id_simpan,
            'id_ambil' => $id_ambil,
            'tgl_awal' => date('Y-m-d', strtotime($tanggalAwal)),
            'tgl_akhir' => date('Y-m-d', strtotime($tanggalAkhir)),
            'unit' => $unit,
            'tgl_pengajuan' => date('Y-m-d', strtotime($tanggal)),
            'status' => 'Menunggu Approval'
        ];

        $this->pengajuan->insert($data);

        return redirect()->to('/pengajuan-perangkat')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $pengajuan = $this->pengajuan->find($id);
        $dataSimpan = $this->barangMasuk->where('id_simpan', $pengajuan['id_simpan'])->join('tbl_master_asset', 'tbl_master_asset.id = tbl_barang_masuk.id_asset')->findAll();
        $dataAmbil = $this->barangKeluar->where('id_ambil', $pengajuan['id_ambil'])->join('tbl_master_asset', 'tbl_master_asset.id = tbl_barang_keluar.id_asset')->findAll();
        $data = [
            'title' => 'Edit Pengajuan Perangkat Baru',
            'data' => $pengajuan,
            'dataSimpan' => $dataSimpan,
            'dataAmbil' => $dataAmbil
        ];

        return view('teknisi/edit', $data);
    }

    public function update()
    {
        $tanggal = date('Y-m-d', strtotime($this->request->getVar('tanggal')));
        $data = [
            'id_asset' => $this->request->getPost('nama'),
            'tgl_pengajuan' => $tanggal,
            'unit' => $this->request->getPost('unit'),
            'status' => 'Menunggu Approval'
        ];

        $this->pengajuan->update($this->request->getPost('id_pengajuan'), $data);

        return redirect()->to('/pengajuan-perangkat')->with('success', 'Data berhasil diubah');
    }

    public function delete()
    {
        $id = $this->request->getVar('id');
        $this->pengajuan->delete($id);

        return json_encode(['status' => 'success']);
    }

    public function perangkatDisimpan()
    {
        $data = $this->masterAsset->where('status_perangkat !=', 'Tersedia')->findAll();
        $result = [];
        foreach ($data as $d) {
            $result[] = [
                'id' => $d['id'],
                'text' => $d['deskripsi'] . '-' . $d['sn']
            ];
        }

        return json_encode($result);
    }
}
