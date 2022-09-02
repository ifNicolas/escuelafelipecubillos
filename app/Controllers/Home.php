<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view ('headfoot/header');
        $this->load->view('inicio');
        return view ('headfoot/footer');
    }

}
