<?php

namespace App\Controllers\Mobile;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class AdminController extends BaseController
{
    function __construct()
    {
        $this->admin = new \App\Models\AdminModel();
    }

    public function admin()
    {
        $admin = $this->admin->findAll();
        $data = [
            'title' => 'Data Admin',
            'admin' => $admin
        ];
        return view('mobile/admin/admin', $data);
    }
    public function teknisi()
    {
        $admin = $this->admin->findAll();
        $data = [
            'title' => 'Data Teknisi',
            'admin' => $admin
        ];
        return view('mobile/admin/admin', $data);
    }
}
