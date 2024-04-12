<?php

namespace App\Controllers\Mobile;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class BarangMasukController extends BaseController
{
    function __construct()
    {
        $this->barangmasuk = new \App\Models\BarangMasukModel();
    }

    public function barangmasuk()
    {
        $barangmasuk = $this->barangmasuk->findAll();
        $data = [
            'title' => 'Barang Masuk',
            'barangmasuk' => $barangmasuk
        ];
        return view('mobile/barang-masuk/barang-masuk', $data);
    }
}
