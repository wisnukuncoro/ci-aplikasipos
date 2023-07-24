<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelProduk;
use App\Models\ModelKategori;
use App\Models\ModelSatuan;

class Produk extends BaseController
{
    public function __construct()
    {
        $this->ModelProduk = new ModelProduk();
        $this->ModelKategori = new ModelKategori();
        $this->ModelSatuan = new ModelSatuan();
    }
    
    public function index()
    {       
        $data = [
            'judul' => 'Master Data',
            'subjudul' => 'Produk',
            'menu' => 'masterdata',
            'submenu' => 'produk',
            'page' => 'v_produk',
            'logo' => '',
            'produk' => $this->ModelProduk->AllData(),
            'kategori' => $this->ModelKategori->AllData(),
            'satuan' => $this->ModelSatuan->AllData(),
        ];
        return view('v_template', $data);
    }

    // public function insertdata()
    // {
    //     $data = [
    //         'kode_produk' => $this->request->getPost('kode_produk'),
    //         'nama_produk' => $this->request->getPost('nama_produk'),
    //         'id_kategori' => $this->request->getPost('id_kategori'),
    //         'id_satuan' => $this->request->getPost('id_satuan'),
    //         'harga_jual' => $this->request->getPost('harga_jual'),
    //         'harga_beli' => $this->request->getPost('harga_beli'),
    //         'stok' => $this->request->getPost('stok')
    //     ];
    //     $this->ModelProduk->Tambah($data);
    //     session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
    //     return redirect()->to('produk');
    // }

    public function insertdata()
    {
      if($this->validate([
        'kode_produk' => [
          'label' => 'Kode Produk/Barcode',
          'rules' => 'is_unique[tbl_produk.kode_produk]',
          'errors' => [
            'is_unique' => '{field} Sudah ada, masukkan kode kembali!',
          ]
        ],
        'id_satuan' => [
          'label' => 'Satuan/Barcode',
          'rules' => 'is_unique[tbl_satuan.id_satuan]',
          'errors' => [
            'is_unique' => '{field} Sudah ada, masukkan kode kembali!',
          ]
        ],
        'id_kategori' => [
          'label' => 'Kategori',
          'rules' => 'required[tbl_produk.kode_produk]',
          'errors' => [
              'required' => '{field} Sudah ada, Belum dipilih',
          ]
        ]
        
      ])) {
        $Harga_beli = str_replace(",", "", $this->request->getPost('Harga_beli'));
        $Harga_jual = str_replace(",", "", $this->request->getPost('Harga_jual'));

        $data = [
        'kode_produk' => $this->request->getPost('kode_produk'),
        'nama_produk' => $this->request->getPost('kode_produk'),
        'id_kategori' => $this->request->getPost('id_kategori'),
        'id_satuan' => $this->request->getPost('id_satuan'),
        'harga_beli' => $Harga_beli,
        'harga_jual' => $Harga_jual,
        'stok' => $this->request->getPost('stok')
        ];

    $this->ModelProduk->Tambah($data);
    session()->setFlashdata('pesan', 'Data Berhasil Disimpan');
    return redirect()->to(base_url('Produk'));

} else {
        session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
        return redirect()->to(base_url('Produk'))->withInput('validation', \Config\Services::validation());
        }
      }

    public function ubahdata($id_produk)
    {
        $data = [
            'id_produk' => $id_produk,
            'kode_produk' => $this->request->getPost('kode_produk'),
            'nama_produk' => $this->request->getPost('nama_produk'),
            'id_kategori' => $this->request->getPost('id_kategori'),
            'id_satuan' => $this->request->getPost('id_satuan'),
            'harga_jual' => $this->request->getPost('harga_jual'),
            'harga_beli' => $this->request->getPost('harga_beli'),
            'stok' => $this->request->getPost('stok')
        ];
        $this->ModelProduk->ubahdata($data);
        session()->setFlashdata('pesan', 'Data Berhasil Diubah');
        return redirect()->to('produk');
    }

    public function hapusdata($id_produk)
    {
        $data = [
            'id_produk' => $id_produk,
        ];
        $this->ModelProduk->hapusdata($data);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to('produk');
    }
}
