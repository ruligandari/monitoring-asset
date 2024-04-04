<?php

namespace App\Controllers\Mobile;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class HomeController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Home',
        ];
        return view('mobile/home/home', $data);
    }
}
