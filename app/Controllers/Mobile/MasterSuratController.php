<?php

namespace App\Controllers\Mobile;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class MasterSuratController extends BaseController
{
    public function mastersurat()
    {
        $data = [
            'title' => 'Master Surat',
        ];
        return view('mobile/master-surat/master-surat', $data);
    }
}
