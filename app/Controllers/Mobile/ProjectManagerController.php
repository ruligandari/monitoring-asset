<?php

namespace App\Controllers\Mobile;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class ProjectManagerController extends BaseController
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
        $pengajuanData = $this->pengajuan->join('tbl_master_asset', 'tbl_master_asset.id = tbl_pengajuan.id_asset')
            ->join('user', 'user.id = tbl_pengajuan.id_user')
            ->select('tbl_pengajuan.*, tbl_master_asset.nama as asset_nama, user.nama as user_nama')
            ->orderBy('id_pengajuan', 'DESC')
            ->findAll();

        $data = [
            'title' => 'Permintaan Teknisi',
            'pengajuan' => $pengajuanData
        ];

        return view('project-manager/pengajuan', $data);
    }

    public function edit($id)
    {
        $pengajuanData = $this->pengajuan->join('tbl_master_asset', 'tbl_master_asset.id = tbl_pengajuan.id_asset')
            ->join('user', 'user.id = tbl_pengajuan.id_user')
            ->select('tbl_pengajuan.*, tbl_master_asset.nama as asset_nama, user.nama as user_nama')
            ->orderBy('id_pengajuan', 'DESC')
            ->find($id);


        $data = [
            'title' => 'Detail Permintaan Teknisi',
            'data' => $pengajuanData,
            'barang' => $this->masterAsset->findAll()
        ];

        return view('project-manager/edit', $data);
    }

    public function update()
    {
        $id_pengajuan = $this->request->getPost('id_pengajuan');
        $data = [
            'status' => 'Telah Disetujui',
        ];

        $this->pengajuan->update($id_pengajuan, $data);

        return redirect()->to('/pengajuan-teknisi')->with('success', 'Permintaan Telah Disetujui');
    }
}
