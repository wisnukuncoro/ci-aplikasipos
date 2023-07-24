<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelPenjualan;

class Penjualan extends BaseController
{
  public function __construct()
  {
      $this->ModelPenjualan = new ModelPenjualan;
  }
  
  public function index()
  {
      $data = [
          'judul' => 'Penjualan',
          'subjudul' => '',
          'menu' => 'penjualan',
          'submenu' => '',
          'page' => 'v_penjualan',
          'logo' => '<i class="fas fa-shopping-cart text-primary"></i>',
          'no_faktur' => $this->ModelPenjualan->NoFaktur()
      ];
      return view('v_template', $data);
  }
}
