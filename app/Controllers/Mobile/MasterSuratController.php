<?php

namespace App\Controllers\Mobile;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class MasterSuratController extends BaseController
{
    protected $mastersurat;
    function __construct()
    {
        $this->mastersurat = new \App\Models\MasterSuratModel();
    }

    public function mastersurat()
    {
        $mastersurat = $this->mastersurat->findAll();
        $data = [
            'title' => 'Master Surat',
            'mastersurat' => $mastersurat
        ];
        return view('mobile/master-surat/master-surat', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Surat',

        ];

        return view('mobile/master-surat/tambah', $data);
    }

    public function add()
    {
        $file_surat = $this->request->getFile('file_surat');
        $nama_surat = $this->request->getPost('nama_surat');

        if ($file_surat) {
            $nama_file = 'template_surat-' . date('d-m-Y') . '.' . $file_surat->getExtension();
            // simpan file_surat. ubah nama menjadi template_surat
            $file_surat->move('template', $nama_file);

            // insert ke database table master_surat
            $data = [
                'file_surat' => $nama_file,
                'nomor_surat' => '0',
                'nama' => $nama_surat
            ];
            $this->mastersurat->insert($data);
            return redirect()->to('/master-surat')->with('success', 'Data berhasil ditambahkan');
        } else {
            return redirect()->to('/master-surat')->with('error', 'Data gagal ditambahkan');
        }
    }

    public function edit($id)
    {
        $data_surat = $this->mastersurat->find($id);
        $data = [
            'title' => 'Edit Surat',
            'data' => $data_surat
        ];
        return view('mobile/master-surat/edit', $data);
    }

    public function update()
    {
        $id = $this->request->getPost('id');
        $nomor_surat = $this->request->getPost('nomor_surat');

        $data = [
            'nomor_surat' => $nomor_surat
        ];

        // jika $nomor_surat == 1 maka ubah data dengan id tersebut menjadi 1
        // jika $nomor_surat == 0 maka ubah data dengan id tersebut menjadi 0

        // jika id dengan nomor_surat == 1, maka ubah semua data dengan id != id tersebut menjadi 0
        if ($nomor_surat == 1) {
            $this->mastersurat->update($id, $data);
            $this->mastersurat->where('id !=', $id)->set(['nomor_surat' => 0])->update();
        } else {
            $this->mastersurat->update($id, $data);
        }


        return redirect()->to('/master-surat')->with('success', 'Data berhasil diupdate');
    }

    public function delete()
    {
        $id = $this->request->getPost('id');
        // dapatkan nama file
        $data = $this->mastersurat->find($id);
        $file_surat = $data['file_surat'];
        $nomor_surat = $data['nomor_surat'];

        // jika nomor_surat == 1 maka tidak bisa dihapus
        if ($nomor_surat == 1) {
            return redirect()->to('/master-surat')->with('error', 'Data tidak bisa dihapus Karena Status Aktif');
        }
        $this->mastersurat->delete($id);
        // hapus file
        unlink('template/' . $file_surat);
        return redirect()->to('/master-surat')->with('success', 'Data berhasil dihapus');
    }
}
