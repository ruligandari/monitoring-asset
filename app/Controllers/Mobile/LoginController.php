<?php

namespace App\Controllers\Mobile;

use App\Controllers\BaseController;
use App\Models\AdminModel;
use CodeIgniter\HTTP\ResponseInterface;

class LoginController extends BaseController
{
    private $userModel;
    // constructor
    public function __construct()
    {
        $this->userModel = new AdminModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Login',
        ];
        return view('mobile/login/login', $data);
    }

    public function auth()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getVar('password');

        $user = $this->userModel->where('username', $username)->first();
        // login logic
        if ($user) {
            if ($user['password'] == $password) {
                $data = [
                    'id' => $user['id'],
                    'nama' => $user['nama'], // add this line
                    'username' => $user['username'],
                    'role' => $user['role'],
                    'isLoggedIn' => true,
                ];
                session()->set($data);
                return redirect()->to('/');
            } else {
                session()->setFlashdata('error', 'Password salah');
                return redirect()->to('/login');
            }
        } else {
            session()->setFlashdata('error', 'Email tidak ditemukan');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        session()->destroy();
        return json_encode(['status' => 'success']);
    }

    public function register()
    {
        $data = [
            'title' => 'Register',
        ];
        return view('mobile/login/register', $data);
    }
}
