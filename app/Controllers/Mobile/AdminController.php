<?php

namespace App\Controllers\Mobile;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class AdminController extends BaseController
{
    protected $admin;
    function __construct()
    {
        $this->admin = new \App\Models\AdminModel();
    }

    public function admin()
    {
        $admin = $this->admin->where('role', '1')->findAll();
        $data = [
            'title' => 'Data Admin',
            'admin' => $admin
        ];
        return view('mobile/admin/admin', $data);
    }
    public function teknisi()
    {
        $admin = $this->admin->where('role!=', '1')->findAll();
        // ubah role, jika 2 maka teknisi, jika 3 maka project manager 1, jika 4 maka kordinator
        foreach ($admin as $key => $value) {
            if ($value['role'] == 2) {
                $admin[$key]['role'] = 'Teknisi';
            } elseif ($value['role'] == 3) {
                $admin[$key]['role'] = 'Project Manager 1';
            } elseif ($value['role'] == 4) {
                $admin[$key]['role'] = 'Kordinator';
            }
        }
        $data = [
            'title' => 'Data Teknisi',
            'admin' => $admin,
        ];
        return view('mobile/admin/admin', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Data Teknisi'
        ];
        return view('mobile/admin/tambah', $data);
    }

    public function add()
    {
        $data = [
            'nama' => $this->request->getPost('nama'),
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
            'role' => $this->request->getPost('role')
        ];
        $this->admin->insert($data);
        return redirect()->to('/teknisi')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Data Teknisi',
            'admin' => $this->admin->find($id)
        ];
        return view('mobile/admin/edit', $data);
    }

    public function update()
    {
        $id = $this->request->getPost('id');
        $data = [
            'nama' => $this->request->getPost('nama'),
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
            'role' => $this->request->getPost('role')
        ];
        $this->admin->update($id, $data);
        return redirect()->to('/teknisi')->with('success', 'Data berhasil diubah');
    }

    public function delete()
    {
        $id = $this->request->getPost('id');


        $deleted = $this->admin->delete($id);
        if (!$deleted) {
            return json_encode(['error' => 'Data gagal dihapus']);
        }
        return json_encode(['success' => 'Data berhasil dihapus']);
    }
}
