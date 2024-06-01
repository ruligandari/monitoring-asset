<?php

namespace App\Controllers\Mobile;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class SuratKeluarController extends BaseController
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

    public function suratkeluar()
    {
        $pengajuanData = $this->pengajuan
            ->join('user', 'user.id = tbl_pengajuan.id_user')
            ->orderBy('id_pengajuan', 'ASC')
            ->where('status', 'Disetujui')
            ->findAll();

        $data = [
            'title' => 'Surat Keluar',
            'pengajuan' => $pengajuanData
        ];
        return view('mobile/surat-keluar/surat-keluar', $data);
    }

    public function edit($id)
    {
        $pengajuan = $this->pengajuan->find($id);
        $dataSimpan = $this->barangMasuk->where('id_simpan', $pengajuan['id_simpan'])->join('tbl_master_asset', 'tbl_master_asset.id = tbl_barang_masuk.id_asset')->findAll();
        $dataAmbil = $this->barangKeluar->where('id_ambil', $pengajuan['id_ambil'])->join('tbl_master_asset', 'tbl_master_asset.id = tbl_barang_keluar.id_asset')->findAll();
        $namaTeknisi = $this->user->find($pengajuan['id_user']);
        $data = [
            'title' => 'Surat Keluar',
            'data' => $pengajuan,
            'dataSimpan' => $dataSimpan,
            'dataAmbil' => $dataAmbil,
            'namaTeknisi' => $namaTeknisi['nama']
        ];

        return view('mobile/surat-keluar/edit', $data);
    }
}
