<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
       
        return view('templates/header')
        .view('home')
        .view('templates/footer');
        
    }
    public function phpinfo()
    {
   
        phpinfo();
    }
}
