<?php

namespace App\Controllers\Mobile;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class BarangKeluarController extends BaseController
{
    public function barangkeluar()
    {
        $data = [
            'title' => 'Barang Keluar',
        ];
        return view('mobile/barang-keluar/barang-keluar', $data);
    }
}
