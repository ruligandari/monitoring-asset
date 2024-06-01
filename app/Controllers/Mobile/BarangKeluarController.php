<?php

namespace App\Controllers\Mobile;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use Exception;

class BarangKeluarController extends BaseController
{
    protected $barangkeluar;
    protected $barang;
    function __construct()
    {
        $this->barangkeluar = new \App\Models\BarangKeluarModel();
        $this->barang = new \App\Models\MasterAssetModel();
    }

    public function barangkeluar()
    {
        $barangkeluar = $this->barangkeluar
            ->join('tbl_master_asset', 'tbl_master_asset.id = tbl_barang_keluar.id_asset')
            ->join('tbl_pengajuan', 'tbl_pengajuan.id_ambil = tbl_barang_keluar.id_ambil')->where('status', 'Disetujui')->findAll();


        $data = [
            'title' => 'Barang Keluar',
            'barangkeluar' => $barangkeluar
        ];
        return view('mobile/barang-keluar/barang-keluar', $data);
    }

    public function edit($id)
    {
        $barangKeluar = $this->barangkeluar
            ->join('tbl_master_asset', 'tbl_master_asset.id = tbl_barang_keluar.id_asset')
            ->join('tbl_pengajuan', 'tbl_pengajuan.id_ambil = tbl_barang_keluar.id_ambil')
            ->join('user', 'tbl_pengajuan.id_user = user.id')
            ->find($id);

        $data = [
            'title' => 'Detail Barang Keluar',
            'data' => $barangKeluar
        ];
        return view('mobile/barang-keluar/edit', $data);
    }
}
