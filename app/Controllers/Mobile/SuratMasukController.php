<?php

namespace App\Controllers\Mobile;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class SuratMasukController extends BaseController
{
    function __construct()
    {
        $this->suratmasuk = new \App\Models\SuratMasukModel();
    }

    public function suratmasuk()
    {
        $suratmasuk = $this->suratmasuk->findAll();
        $data = [
            'title' => 'Surat Masuk',
            'suratmasuk' => $suratmasuk
        ];
        return view('mobile/surat-masuk/surat-masuk', $data);
    }
}
