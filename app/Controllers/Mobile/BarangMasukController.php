<?php

namespace App\Controllers\Mobile;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class BarangMasukController extends BaseController
{
    public function barangmasuk()
    {
        $data = [
            'title' => 'Barang Masuk',
        ];
        return view('mobile/barang-masuk/barang-masuk', $data);
    }
}
