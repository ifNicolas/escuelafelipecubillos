<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {   
        $vista = array('headfoot/header','inicio','headfoot/footer');

        $this->load->view ($vista);

    }

}
