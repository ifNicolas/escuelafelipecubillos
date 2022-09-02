<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {   

        echo view ('headfoot/header');

        echo view ('headfoot/footer');
    }

}
