<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelKategori;


class Kategori extends BaseController
{
    public function index()
    {
        $data = [
            'judul' => 'Master Data',
            'subjudul' => 'Kategori',
            'menu' => 'masterdata',
            'submenu' => 'kategori',
            'page' => 'v_kategori',
            'logo' => '',
            'kategori'=> $this->ModelKategori->AllData()
        ];
        return view('v_template', $data);
    }

    public function __construct()
    {
        $this->ModelKategori=new ModelKategori();
    }

    public function insertdata()
    {
        $data = [
            'nama_kategori' => $this->request->getPost('nama_kategori')
        ];
        $this->ModelKategori->Tambah($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
        return redirect()->to('kategori');
    }

    public function ubahdata($id_kategori)
    {
        $data = [
            'id_kategori' => $id_kategori,
            'nama_kategori' => $this->request->getPost('nama_kategori')
        ];
        $this->ModelKategori->ubahdata($data);
        session()->setFlashdata('pesan', 'Data Berhasil Diubah');
        return redirect()->to('kategori');
    }

    public function hapusdata($id_kategori)
    {
        $data = [
            'id_kategori' => $id_kategori,

        ];
        $this->ModelKategori->hapusdata($data);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to('kategori');
    }
}
