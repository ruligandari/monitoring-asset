<?php

namespace App\Controllers\Mobile;

use App\Controllers\BaseController;
use App\Models\AdminModel;
use CodeIgniter\HTTP\ResponseInterface;

class ProfileController extends BaseController
{
    protected $adminModel;

    public function __construct()
    {
        $this->adminModel = new \App\Models\AdminModel();
    }
    public function index()
    {
        // get role dari sesi
        $role = session()->get('role');

        // cari role ke tabel user
        $user = $this->adminModel->where('role', $role)->first();

        // switch jika role 1  maka $keterangan = 'administrator'
        switch ($role) {
            case 1:
                $keterangan = 'Administrator';
                break;
            case 2:
                $keterangan = 'Teknisi';
                break;
            case 3:
                $keterangan = 'Project Manager 1';
                break;
            case 3:
                $keterangan = 'Project Manager 2';
                break;
            default:
                $keterangan = 'User';
                break;
        }
        $data = [
            'title' => 'Profile',
            'user' => $user,
            'keterangan' => $keterangan
        ];
        return view('mobile/home/profile', $data);
    }

    public function update()
    {
        $id = $this->request->getPost('id_user');
        $nama = $this->request->getPost('nama');
        $username = $this->request->getPost('username');
        $password_baru = $this->request->getPost('password_baru');
        $password_baru_1 = $this->request->getPost('password_baru_1');

        // cek jika password baru dan password baru 1 harus sama
        if ($password_baru != $password_baru_1) {
            session()->setFlashdata('error', 'Password baru tidak sama');
            return redirect()->to('/profile');
        }

        // update password sesuai id
        $this->adminModel->update($id, ['password' => $password_baru, 'nama' => $nama, 'username' => $username]);

        return redirect()->to('/profile')->with('success', 'Password berhasil diubah');
    }
}
