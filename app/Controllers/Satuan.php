<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelSatuan;



class Satuan extends BaseController
{
    public function __construct()
    {

        $this->ModelSatuan = new ModelSatuan();
    }

    
    public function index()
    {       
        $data = [
            'judul' => 'Master Data',
            'subjudul' => 'Satuan',
            'menu' => 'masterdata',
            'submenu' => 'satuan',
            'page' => 'v_satuan',
            'logo' => '',
            'satuan' => $this->ModelSatuan->AllData(),
        ];
        return view('v_template', $data);
    }

    public function insertdata()
    {
        $data = [
            'nama_satuan' => $this->request->getPost('nama_satuan')
        ];
        $this->ModelSatuan->Tambah($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
        return redirect()->to('satuan');
    }

    public function ubahdata($id_satuan)
    {
        $data = [
            'id_satuan' => $id_satuan,
            'nama_satuan' => $this->request->getPost('nama_satuan')
        ];
        $this->ModelSatuan->ubahdata($data);
        session()->setFlashdata('pesan', 'Data Berhasil Diubah');
        return redirect()->to('satuan');
    }

    public function hapusdata($id_satuan)
    {
        $data = [
            'id_satuan' => $id_satuan,

        ];
        $this->ModelSatuan->hapusdata($data);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to('satuan');
    }

}
