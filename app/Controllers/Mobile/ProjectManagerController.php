<?php

namespace App\Controllers\Mobile;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class ProjectManagerController extends BaseController
{
    protected $masterAsset;
    protected $pengajuan;
    protected $user;
    protected $barangMasuk;
    protected $barangKeluar;
    public function __construct()
    {
        $this->masterAsset = new \App\Models\MasterAssetModel();
        $this->pengajuan = new \App\Models\PengajuanPerangkatModel();
        $this->user = new \App\Models\AdminModel();
        $this->barangMasuk = new \App\Models\BarangMasukModel();
        $this->barangKeluar = new \App\Models\BarangKeluarModel();
    }
    public function index()
    {
        $pengajuanData = $this->pengajuan
            ->join('user', 'user.id = tbl_pengajuan.id_user')
            ->orderBy('id_pengajuan', 'DESC')
            ->findAll();

        $data = [
            'title' => 'Permintaan Barang',
            'pengajuan' => $pengajuanData
        ];

        return view('project-manager/pengajuan', $data);
    }

    public function edit($id)
    {
        $pengajuan = $this->pengajuan->find($id);
        $dataSimpan = $this->barangMasuk->where('id_simpan', $pengajuan['id_simpan'])->join('tbl_master_asset', 'tbl_master_asset.id = tbl_barang_masuk.id_asset')->findAll();
        $dataAmbil = $this->barangKeluar->where('id_ambil', $pengajuan['id_ambil'])->join('tbl_master_asset', 'tbl_master_asset.id = tbl_barang_keluar.id_asset')->findAll();
        $namaTeknisi = $this->user->find($pengajuan['id_user']);
        $data = [
            'title' => 'Permintaan Teknisi',
            'data' => $pengajuan,
            'dataSimpan' => $dataSimpan,
            'dataAmbil' => $dataAmbil,
            'namaTeknisi' => $namaTeknisi['nama']
        ];

        return view('project-manager/edit', $data);
    }

    public function update()
    {
        $id_pengajuan = $this->request->getPost('id_pengajuan');
        $role_pm = $this->request->getPost('role_pm');

        if ($role_pm == '3') {
            $data = [
                'status' => 'Disetujui PM 1',
                'pm1' => 1,
            ];
        } else {
            $data = [
                'status' => 'Disetujui PM 2',
                'pm2' => 1,
            ];
        }

        $this->pengajuan->update($id_pengajuan, $data);

        return redirect()->to('/pengajuan-teknisi')->with('success', 'Permintaan Telah Disetujui');
    }
}
