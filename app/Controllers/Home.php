<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'page' => 'v_login'
        ];
        return view('v_login', $data);
    }   
}
