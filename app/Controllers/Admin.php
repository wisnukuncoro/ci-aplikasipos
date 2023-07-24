<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Admin extends BaseController
{
  public function index()
  {
      $data = [
          'judul' => 'Dashboard',
          'subjudul' => '',
          'menu' => 'dashboard',
          'submenu' => '',
          'page' => 'v_admin',
          'logo' => ''
      ];
      return view('v_template', $data);
  }

  public function setting()
  {
      $data = [
          'judul' => 'Setting',
          'subjudul' => '',
          'menu' => 'setting',
          'submenu' => '',
          'page' => 'v_setting',
          'logo' => ''
      ];
      return view('v_template', $data);
  }
}
