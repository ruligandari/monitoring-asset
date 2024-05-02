<?php

namespace App\Controllers\Mobile;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class HomeController extends BaseController
{
    protected $masterassets;
    function __construct()
    {
        $this->masterassets = new \App\Models\MasterAssetModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Home',
        ];
        return view('mobile/home/home', $data);
    }

    public function master()
    {
        $masterassets = $this->masterassets->findAll();

        $data = [
            'title' => 'Master Aset',
            'masterassets' => $masterassets
        ];
        return view('mobile/master-aset/master-aset', $data);
    }

    public function master_tambah()
    {
        $data = [
            'title' => 'Tambah Aset',
        ];
        return view('mobile/master-aset/tambah', $data);
    }

    public function master_add()
    {
        $nama = $this->request->getPost('nama');
        $total = $this->request->getPost('total');
        $tanggal = $this->request->getVar('tanggal');
        $tanggal = date('Y-m-d', strtotime($tanggal));

        $data = [
            'nama' => $nama,
            'total' => $total,
            'tanggal' => $tanggal
        ];

        $this->masterassets->insert($data);

        return redirect()->to('/master-aset')->with('success', 'Data berhasil ditambahkan');
    }

    public function master_edit($id)
    {
        $data = $this->masterassets->find($id);

        $data = [
            'title' => 'Edit Aset',
            'data' => $data
        ];
        return view('mobile/master-aset/edit', $data);
    }

    public function master_update()
    {
        $id = $this->request->getPost('id');
        $nama = $this->request->getPost('nama');
        $total = $this->request->getPost('total');

        $data = [
            'nama' => $nama,
            'total' => $total
        ];

        $this->masterassets->update($id, $data);

        return redirect()->to('/master-aset')->with('success', 'Data berhasil diupdate');
    }

    public function master_delete()
    {
        $id = $this->request->getPost('id');

        $deleted = $this->masterassets->delete($id);
        if (!$deleted) {
            return json_encode(['error' => 'Data gagal dihapus']);
        }
        return json_encode(['success' => 'Data berhasil dihapus']);
    }
}
