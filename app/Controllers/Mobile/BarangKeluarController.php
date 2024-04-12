<?php

namespace App\Controllers\Mobile;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class BarangKeluarController extends BaseController
{
    function __construct()
    {
        $this->barangkeluar = new \App\Models\BarangKeluarModel();
    }

    public function barangkeluar()
    {
        $barangkeluar = $this->barangkeluar->findAll();
        $data = [
            'title' => 'Barang Keluar',
            'barangkeluar' => $barangkeluar
        ];
        return view('mobile/barang-keluar/barang-keluar', $data);
    }
}
