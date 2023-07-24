<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPenjualan extends Model
{
  public function NoFaktur()
  {
    $tgl = date('Ymd');
    $query = $this->db->query("SELECT MAX(RIGHT(no_faktur,4)) as no_urut from tbl_transaksi where DATE(tgl_jual)='$tgl'");
    $hasil = $query->getRowArray();
    if ($hasil['no_urut'] > 0) {
      $tmp = $hasil['no_urut'] + 1;
      $kd = printf("%04s", $tmp);
    } else {
      $kd = "0001";
    }
    $no_faktur = date('Ymd') . $kd;
    return $no_faktur;   
  }
}
