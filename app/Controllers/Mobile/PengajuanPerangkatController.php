<?php

namespace App\Controllers\Mobile;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Model;

class PengajuanPerangkatController extends BaseController
{
    protected $masterAsset;
    protected $pengajuan;
    protected $user;
    public function __construct()
    {
        $this->masterAsset = new \App\Models\MasterAssetModel();
        $this->pengajuan = new \App\Models\PengajuanPerangkatModel();
        $this->user = new \App\Models\AdminModel();
    }
    public function index()
    {
        $pengajuanData = $this->pengajuan->join('tbl_master_asset', 'tbl_master_asset.id = tbl_pengajuan.id_asset')->orderBy('id_pengajuan', 'DESC')->findAll();

        $data = [
            'title' => 'Pengajuan Perangkat Baru',
            'pengajuan' => $pengajuanData
        ];

        return view('teknisi/pengajuan', $data);
    }

    public function tambah()
    {
        $barang = $this->masterAsset->findAll();
        $data = [
            'title' => 'Tambah Pengajuan Perangkat Baru',
            'barang' => $barang
        ];

        return view('teknisi/tambah', $data);
    }

    public function add()
    {
        $tanggal = date('Y-m-d', strtotime($this->request->getVar('tanggal')));
        $data = [
            'id_user' => $this->request->getPost('id_user'),
            'id_asset' => $this->request->getPost('nama'),
            'tgl_pengajuan' => $tanggal,
            'unit' => $this->request->getPost('unit'),
            'status' => 'Menunggu Approval'
        ];

        $this->pengajuan->insert($data);

        return redirect()->to('/pengajuan-perangkat')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Pengajuan Perangkat Baru',
            'data' => $this->pengajuan->find($id),
            'barang' => $this->masterAsset->findAll()
        ];

        return view('teknisi/edit', $data);
    }

    public function update()
    {
        $tanggal = date('Y-m-d', strtotime($this->request->getVar('tanggal')));
        $data = [
            'id_asset' => $this->request->getPost('nama'),
            'tgl_pengajuan' => $tanggal,
            'unit' => $this->request->getPost('unit'),
            'status' => 'Menunggu Approval'
        ];

        $this->pengajuan->update($this->request->getPost('id_asset'), $data);

        return redirect()->to('/pengajuan-perangkat')->with('success', 'Data berhasil diubah');
    }

    public function delete()
    {
        $id = $this->request->getVar('id');
        $this->pengajuan->delete($id);

        return json_encode(['status' => 'success']);
    }
}
