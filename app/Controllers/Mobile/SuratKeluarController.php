<?php

namespace App\Controllers\Mobile;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class SuratKeluarController extends BaseController
{
    function __construct()
    {
        $this->suratkeluar = new \App\Models\SuratKeluarModel();
    }

    public function suratkeluar()
    {
        $suratkeluar = $this->suratkeluar->findAll();
        $data = [
            'title' => 'Surat Keluar',
            'suratkeluar' => $suratkeluar
        ];
        return view('mobile/surat-keluar/surat-keluar', $data);
    }
}
