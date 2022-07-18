<?php

namespace App\Controllers;

use CodeIgniter\HTTP\RedirectResponse;

class Home extends BaseController
{
    public function index()
    {
        
        return redirect()->to(base_url('login'));
       
        
    }
    public function home()
    {
        if(isset($_SESSION['admin']) && $_SESSION['admin'] ==1)
        {
            $model = model(Usuarios_model::class);
             $data['pedidos_ultima_semana']= $model->get_pedidos_ultima_semana();
             foreach($data['pedidos_ultima_semana'] as $dia)
             {
                $dia->anio= date('Y', strtotime($dia->fecha));
                $dia->mes= date('m', strtotime($dia->fecha));
                $dia->dia= date('d', strtotime($dia->fecha));
             }
             $data['mejores_clientes'] = $model->get_mejores_clientes();
             $data['productos_mas_vendidos'] = $model->get_productos_mas_vendidos();
            return view('templates/header')
            .view('home',$data)
            .view('templates/footer');
        }else{
            return redirect()->to(base_url(''));
        }
       
    }
    public function phpinfo()
    {
   
        phpinfo();
    }
}
