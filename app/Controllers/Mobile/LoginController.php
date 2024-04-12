<?php

namespace App\Controllers\Mobile;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class LoginController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Login',
        ];
        return view('mobile/login/login', $data);
    }

    public function register()
    {
        $data = [
            'title' => 'Register',
        ];
        return view('mobile/login/register', $data);
    }
}
