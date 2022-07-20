<?php

namespace App\Controllers;
use App\Models\Home_model;
class Home extends BaseController
{
    public function index()
    {
        $model = model( Home_model::class);
        $data['carrusel']=$model->get_carrusel();
        $data['productos_mas_vendidos']=$model->get_productos_mas_vendidos();
       
        return view('templates/header')
        .view('home',$data)
        .view('templates/footer');
        
    }
    public function phpinfo()
    {
   
        phpinfo();
    }
}
