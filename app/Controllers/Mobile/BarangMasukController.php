<?php

namespace App\Controllers\Mobile;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use Exception;

class BarangMasukController extends BaseController
{
    protected $barangmasuk;
    protected $barang;
    function __construct()
    {
        $this->barangmasuk = new \App\Models\BarangMasukModel();
        $this->barang = new \App\Models\MasterAssetModel();
    }

    public function barangmasuk()
    {
        $barangmasuk = $this->barangmasuk
            ->join('tbl_master_asset', 'tbl_master_asset.id = tbl_barang_masuk.id_asset')
            ->join('tbl_pengajuan', 'tbl_pengajuan.id_simpan = tbl_barang_masuk.id_simpan')->where('status', 'Disetujui')
            ->orderBy('id_pengajuan', 'DESC')->findAll();
        $data = [
            'title' => 'Barang Masuk',
            'barangmasuk' => $barangmasuk
        ];
        return view('mobile/barang-masuk/barang-masuk', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Barang Masuk',
            'barang' => $this->barang->findAll()
        ];
        return view('mobile/barang-masuk/tambah', $data);
    }

    public function add()
    {
        $id = $this->request->getPost('nama');
        $nama = $this->barang->find($id);

        $kuantitas = $this->request->getPost('kuantitas');
        $tanggal = $this->request->getVar('tanggal');
        // ubah format tanggal ke deault database
        $tanggal = date('Y-m-d', strtotime($tanggal));
        $data = [
            'nama' => $nama['nama'],
            'qty' => $kuantitas,
            'tanggal_barang_masuk' => $tanggal,
        ];

        try {
            $barangMasuk = $this->barangmasuk->insert($data);

            if ($barangMasuk) {
                // Dapatkan data barang dari tbl_master_aset
                $barang = $this->barang->find($id);
                // Tambahkan kuantitas baru ke total yang ada
                $totalBaru = $barang['total'] + $this->request->getPost('kuantitas');
                // Update tbl_master_aset dengan total baru
                $this->barang->update($id, ['total' => $totalBaru]);

                return redirect()->to('/barang-masuk')->with('success', 'Data barang masuk berhasil ditambah');
            }
        } catch (Exception $e) {
            // Handle exception
            return json_encode($e->getMessage());
        }
    }

    public function edit($id)
    {
        $barangmasuk = $this->barangmasuk
            ->join('tbl_master_asset', 'tbl_master_asset.id = tbl_barang_masuk.id_asset')
            ->join('tbl_pengajuan', 'tbl_pengajuan.id_simpan = tbl_barang_masuk.id_simpan')
            ->join('user', 'tbl_pengajuan.id_user = user.id')
            ->find($id);

        $data = [
            'title' => 'Detail Barang Masuk',
            'data' => $barangmasuk
        ];
        return view('mobile/barang-masuk/edit', $data);
    }

    public function update()
    {
        $id = $this->request->getPost('id');
        $data = [
            'qty' => $this->request->getPost('qty'),
        ];

        $this->barangmasuk->update($id, $data);
        return redirect()->to('/barang-masuk')->with('success', 'Data barang masuk berhasil diubah');
    }

    public function delete()
    {
        $id = $this->request->getPost('id');
        $this->barangmasuk->delete($id);
        return redirect()->to('/barang-masuk');
    }
}
