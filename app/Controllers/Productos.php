<?php

namespace App\Controllers;

use App\Models\Productos_model;

class Productos extends BaseController
{
    public function index()
    {
        $model = model(Productos_model::class);
        if ($_REQUEST && $_REQUEST['search']!='')
        {
            $productos=$model->get_searched_products($_REQUEST['search']);
        }else{
            $productos= $model->get_all_products();
        }
       
        $data['productos'] = $productos;
        

        return view('templates/header')
        .view('tienda',$data)
        .view('include/modal_add_carrito')
        .view('templates/footer');
        
    }
    public function carrito()
    {
        $model = model(Productos_model::class);
        $data=array();
       // $data['carrito'] = $model->get_carrito($user_id);
        

        return view('templates/header')
        .view('carrito',$data)
        .view('templates/footer');  

    }
    public function add_carrito_ajax()
    {
        if($_SESSION['id'])
        {
            $user_id=$_SESSION['id'];
            $model = model(Productos_model::class);
            $id_product=$_POST['id_product'];
            $qty=$_POST['qty'];
            $data=array(
                'user_id' =>$user_id,
                'product_id' =>$id_product,
                'qty' =>$qty,
            );
            $model->set_product_carrito($data);
            if ($_REQUEST && isset($_REQUEST['search']) &&$_REQUEST['search']!='')
            {
                $productos=$model->get_searched_products($_REQUEST['search']);
            }else{
                $productos= $model->get_all_products();
            }
           
            $data['productos'] = $productos;
            echo(json_encode(
            view('tienda',$data)
              ));

    
        }
       
    }
   
}
