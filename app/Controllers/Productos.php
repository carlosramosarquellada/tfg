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
        $data['promociones']= $model->get_all_promociones();

        return view('templates/header')
        .view('tienda',$data)
        .view('include/modal_add_carrito')
        .view('templates/footer');
        
    }
    public function carrito()
    {
        $model = model(Productos_model::class);
        if($_SESSION['id'])
        {
            $user_id=$_SESSION['id'];
            $data=array();
            $data['carrito'] = $model->get_carrito($user_id);
            $data['total']=0;
            $data['gastos_envio']= 5;
            foreach($data['carrito'] as $item){
              
                $data['total']+= $item->precio*$item->qty;

            
            }
        }
        $data['promociones']= $model->get_all_promociones();
        return view('templates/header')
        .view('carrito',$data)
        .view('templates/footer');  

    }
    public function checkout()
    {
        $model = model(Productos_model::class);
        if($_SESSION['id'])
        {
            $user_id=$_SESSION['id'];
            $data=array();
            $data['carrito'] = $model->get_carrito($user_id);
            $data['total']=0;
            $data['gastos_envio']= 0;
            foreach($data['carrito'] as $item){
                $product= $model->get_product($item->product_id);
                $data['total']+= $item->precio*$item->qty;

            
            }
            $data['transportistas']= $model->get_all_transportistas();
            $data['direcciones']= $model->get_direcciones($user_id);
            
        }
        return view('templates/header')
        .view('checkout',$data)
        .view('templates/footer');  

    }
    public function pedido_realizado()
    {
        $model = model(Productos_model::class);
        if($_SESSION['id'])
        {
            $user_id=$_SESSION['id'];
            $direccion_id=$_POST['id_direccion'];
            $transportista_id=$_POST['transportista'];
            $transportista=$model->get_transportista($transportista_id);
            $data=array();
            $data['carrito'] = $model->get_carrito($user_id);
            $data['total']=0;
            
            $data['gastos_envio']= $transportista->tasas;
            foreach($data['carrito'] as $item){
                $product= $model->get_product($item->product_id);
                $data['total']+= $item->precio*$item->qty;

            
            }
            $total=$data['total']+ $data['gastos_envio'];
            $data_pedido=array(
                'user_id' => $user_id,
                'total'=>$total,
                'estado_pedido' => 'Tramitado',
                'direccion_id'=>$direccion_id,
                'transportista_id'=>$transportista_id
            );
            $pedido_id=$model->set_pedido($data_pedido);


            foreach($data['carrito'] as $item){
                $product= $model->get_product($item->product_id);
                $data_linea=array(
                    'pedido_id' => $pedido_id,
                    'product_id' =>$item->product_id,
                    'qty' =>$item->qty,
                    'precio'=>$item->precio

                );
                $model->set_linea_pedido($data_linea);

            
            }
            $model->delete_carrito($user_id);
        
            $data['direcciones']= $model->get_direcciones($user_id);
            //EMAIL
            $to = 'carlosramosarquellada@gmail.com';
            $subject = 'Su pedido se ha tramitado con éxito.';
            $message = 'El envío será realizado en breve.';
            
            $email = \Config\Services::email();
            $email->setTo($to);
            $email->setFrom('tfg.carlosramosarquellada@gmail.com');
            
            $email->setSubject($subject);
            $email->setMessage($message);
            if ($email->send()) 
            {
               
            } 
            else 
            {
                $data_mail = $email->printDebugger(['headers']);
                print_r($data_mail);
            }
            
        }
        return view('templates/header')
        .view('pedido_realizado',$data)
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
            $producto=$model->get_product($id_product);
            $data=array(
                'user_id' =>$user_id,
                'product_id' =>$id_product,
                'qty' =>$qty,
                'precio' =>$producto->precio
            );
            $item_carrito=null;
            $item_carrito=$model->get_producto_repetido_carrito($user_id,$id_product);
            $promocion =$model -> get_promocion_producto($id_product);
            {
                if($promocion->tipo=='Unidades')
                {
                    $uni_req=$promocion->unidades_requeridas;
                    $uni_pag=$promocion->unidades_pagadas;
                    if($qty%$uni_pag==0)
                    {
                        $veces_aplicada=0;
                    }
                }else{
                    $data['precio']=$producto->precio*(1-$promocion->descuento/100);
                }
            }
            if($item_carrito)
            {
               $model->update_product_carrito($data);
            }else{
                $model->set_product_carrito($data);
            }
           
           
            $productos= $model->get_all_products();
            $data['promociones']=$model->get_all_promociones();
           
            $data['productos'] = $productos;
            echo(json_encode(
            view('tienda',$data)
              ));

    
        }
       
    }
    public function update_carrito_ajax()
    {
        if($_SESSION['id'])
        {
            $user_id=$_SESSION['id'];
            $model = model(Productos_model::class);
            $id=$_POST['item'];
            $qty=$_POST['qty'];
            $item_carrito= $model->get_item_carrito($id);
                $producto=$model->get_product($item_carrito->product_id);
                $promocion =$model -> get_promocion_producto($item_carrito->product_id);
           
            $data=array(
                'id' => $id,
                'qty' =>$qty,
                'precio' =>$producto->precio
            );
            if($qty == 0)
            {
                $model->delete_item_carrito($id);
            }else{
                
                {
                    if($promocion->tipo=='Unidades')
                    {
                        $uni_req=$promocion->unidades_requeridas;
                        $uni_pag=$promocion->unidades_pagadas;
                        if(intdiv($qty,$uni_req)>0)
                        {
                            $veces_aplicada=intdiv($qty,$uni_req);
                            $data['precio']=($producto->precio*($qty-$veces_aplicada))/($qty);
                            

                            
                        }
                    }else{
                        $data['precio']=$item_carrito->precio*(1-$promocion->descuento/100);
                    }
                }
               
                $model->update_item_carrito($data);


            }
            $data=array();
            $data['carrito'] = $model->get_carrito($user_id);
            $data['total']=0;
           
            $data['promociones'] = $model->get_all_promociones();
            foreach($data['carrito'] as $item){
               
                $data['total']+= $item->precio*$item->qty;

            
            }
        }
            echo(json_encode(view('carrito',$data)
          ));

    
    }
       
    
   
}
