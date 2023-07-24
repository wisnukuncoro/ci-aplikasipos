<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKategori extends Model
{
    protected $table = 'tbl_kategori';
    protected $primarykey = 'id_kategori';
    protected $allowedfields = ['nama_kategori'];
    public function AllData()
    {
        return $this->findAll();
    }

    public function Tambah($data)
    {
        $this->db->table('tbl_kategori')->insert($data);
    }


    public function ubahdata($data)
    {
        $this->db->table('tbl_kategori')->where('id_kategori', $data['id_kategori'])->update($data);
    }

    public function hapusdata($data)
    {
        $this->db->table('tbl_kategori')->where('id_kategori', $data['id_kategori'])->delete($data);
    }
}
