<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelSatuan extends Model
{
    protected $table = 'tbl_satuan';
    protected $primarykey = 'id_satuan';
    protected $allowedfields = ['nama_satuan'];
    public function AllData()
    {
        return $this->findAll();
    }

    public function Tambah($data)
    {
        $this->db->table('tbl_satuan')->insert($data);
    }


    public function ubahdata($data)
    {
        $this->db->table('tbl_satuan')->where('id_satuan', $data['id_satuan'])->update($data);
    }

    public function hapusdata($data)
    {
        $this->db->table('tbl_satuan')->where('id_satuan', $data['id_satuan'])->delete($data);
    }
}
