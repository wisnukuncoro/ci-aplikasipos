<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelUser extends Model
{
    protected $table = 'tbl_user';
    protected $primarykey = 'id_user';
    protected $allowedfields = ['nama_user'];
    public function AllData()
    {
        return $this->findAll();
    }

    public function Tambah($data)
    {
        $this->db->table('tbl_user')->insert($data);
    }


    public function ubahdata($data)
    {
        $this->db->table('tbl_user')->where('id_user', $data['id_user'])->update($data);
    }

    public function hapusdata($data)
    {
        $this->db->table('tbl_user')->where('id_user', $data['id_user'])->delete($data);
    }
}
