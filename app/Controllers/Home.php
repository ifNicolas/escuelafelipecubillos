<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {       
        $estructura=view('headfoot/header').view('inicio').view('headfoot/footer');

        return $estructura;
    }

}
