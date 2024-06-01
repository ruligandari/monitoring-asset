<?php

namespace App\Controllers\Mobile;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class MasterSuratController extends BaseController
{
    protected $mastersurat;
    function __construct()
    {
        $this->mastersurat = new \App\Models\MasterSuratModel();
    }

    public function mastersurat()
    {
        $mastersurat = $this->mastersurat->findAll();
        $data = [
            'title' => 'Master Surat',
            'mastersurat' => $mastersurat
        ];
        return view('mobile/master-surat/master-surat', $data);
    }
}
