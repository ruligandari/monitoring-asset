<?php

namespace App\Controllers\Mobile;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class SuratController extends BaseController
{
    public function index()
    {
        return view('template_surat');
    }
}
