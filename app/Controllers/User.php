<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelUser;

class User extends BaseController
{
    public function index()
    {
        $data = [
            'judul' => 'Master Data',
            'subjudul' => 'User',
            'menu' => 'masterdata',
            'submenu' => 'user',
            'page' => 'v_user',
            'logo' => '',
            'user'=> $this->ModelUser->AllData()
        ];
        return view('v_template', $data);
    }

    public function __construct()
    {
        $this->ModelUser=new ModelUser();
    }

    public function insertdata()
    {
        $data = [
            'id_user' => $this->request->getPost('id_user'),
            'nama_user' => $this->request->getPost('nama_user'),
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
            'level' => $this->request->getPost('level'),
        ];
        $this->ModelUser->Tambah($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
        return redirect()->to('user');
    }

    public function ubahdata($id_user)
    {
        $data = [
            'id_user' => $id_user,
            'nama_user' => $this->request->getPost('nama_user'),
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
            'level' => $this->request->getPost('level'),
        ];
        $this->ModelUser->ubahdata($data);
        session()->setFlashdata('pesan', 'Data Berhasil Diubah');
        return redirect()->to('user');
    }

    public function hapusdata($id_user)
    {
        $data = [
            'id_user' => $id_user,

        ];
        $this->ModelUser->hapusdata($data);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to('user');
    }
}
