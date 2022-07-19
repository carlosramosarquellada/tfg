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
        if($_SESSION['id'])
        {
            $user_id=$_SESSION['id'];
            $data=array();
            $data['carrito'] = $model->get_carrito($user_id);
            $data['total']=0;
            $data['gastos_envio']= 5;
            foreach($data['carrito'] as $item){
                $product= $model->get_product($item->product_id);
                $data['total']+= $product->precio*$item->qty;

            
            }
        }
        return view('templates/header')
        .view('carrito',$data)
        .view('templates/footer');  

    }
    public function productos_list()
    {
        $model = model(Productos_model::class);
        if($_SESSION['admin'])
        {
            
            $data=array();
            $data['productos'] = $model->get_all_products();
            return view('templates/header')
            .view('productos_list',$data)
            .view('templates/footer');  
           
        }else{
            return redirect()->to(base_url(''));
        }
       

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
            $data['gastos_envio']= 5;
            foreach($data['carrito'] as $item){
                $product= $model->get_product($item->product_id);
                $data['total']+= $product->precio*$item->qty;

            
            }
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
            $data=array();
            $data['carrito'] = $model->get_carrito($user_id);
            $data['total']=0;
            $data['gastos_envio']= 5;
            foreach($data['carrito'] as $item){
                $product= $model->get_product($item->product_id);
                $data['total']+= $product->precio*$item->qty;

            
            }
            $total=$data['total']+ $data['gastos_envio'];
            $data_pedido=array(
                'user_id' => $user_id,
                'total'=>$total,
                'estado_pedido' => 'Tramitado',
                'direccion_id'=>$direccion_id
            );
            $pedido_id=$model->set_pedido($data_pedido);


            foreach($data['carrito'] as $item){
                $product= $model->get_product($item->product_id);
                $data_linea=array(
                    'pedido_id' => $pedido_id,
                    'product_id' =>$item->product_id,
                    'qty' =>$item->qty,
                    'precio'=>$product->precio

                );
                $model->set_linea_pedido($data_linea);

            
            }
            $model->delete_carrito($user_id);
        
            $data['direcciones']= $model->get_direcciones($user_id);
            
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
            $data=array(
                'user_id' =>$user_id,
                'product_id' =>$id_product,
                'qty' =>$qty,
            );
            $item_carrito=null;
            $item_carrito=$model->get_producto_repetido_carrito($user_id,$id_product);
            if($item_carrito)
            {
               $model->update_product_carrito($data);
            }else{
                $model->set_product_carrito($data);
            }
           
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
    public function update_carrito_ajax()
    {
        if($_SESSION['id'])
        {
            $user_id=$_SESSION['id'];
            $model = model(Productos_model::class);
            $id=$_POST['item'];
            $qty=$_POST['qty'];
            $data=array(
                'id' => $id,
                'qty' =>$qty,
            );
            if($qty == 0)
            {
                $model->delete_item_carrito($id);
            }else{
                $model->update_item_carrito($data);
            }
            $data=array();
            $data['carrito'] = $model->get_carrito($user_id);
            $data['total']=0;
            $data['gastos_envio']= 5;
            foreach($data['carrito'] as $item){
                $product= $model->get_product($item->product_id);
                $data['total']+= $product->precio*$item->qty;

            
            }
        }

         
           
          
            echo(json_encode(view('carrito',$data)
          ));

    
    }
    public function add_producto()
    {
        $model = model(Productos_model::class);
        if($_SESSION['admin'])
        {
            if($_POST)
            {
                $target_dir = "C:/xampp/htdocs/tfg/public/uploads/";
                $target_file = $target_dir . basename($_FILES["imagen"]["name"]);
                move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file);
                $nombre=$_POST['nombre'];
                $descripcion=$_POST['descripcion'];
                $categoria=$_POST['categoria'];
                $precio=$_POST['precio'];
                $stock=$_POST['stock'];
                
                $data=array(
                    'nombre' => $nombre,
                    'descripcion' =>$descripcion,
                    'imagen' =>$_FILES["imagen"]["name"],
                    'categoria' =>$categoria,
                    'precio' =>$precio,
                    'stock' =>$stock
                );
               $model-> set_product($data);
    
               return redirect()->to(base_url('productos'));
            }else{
                return view('templates/header')
                .view('edit_producto')
                .view('templates/footer'); 
            }
          
           
        }else{
            return redirect()->to(base_url(''));
        }
       
    }
    public function edit_producto($id)
    {
        $model = model(Productos_model::class);
        if($_SESSION['admin'])
        {
            if($_POST)
            {
                $target_dir = "C:/xampp/htdocs/tfg/public/uploads/";
                $target_file = $target_dir . basename($_FILES["imagen"]["name"]);
                move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file);
                $nombre=$_POST['nombre'];
                $descripcion=$_POST['descripcion'];
                $categoria=$_POST['categoria'];
                $precio=$_POST['precio'];
                $stock=$_POST['stock'];
                
                $data=array(
                    'id' =>$id,
                    'nombre' => $nombre,
                    'descripcion' =>$descripcion,
                    'imagen' =>$_FILES["imagen"]["name"],
                    'categoria' =>$categoria,
                    'precio' =>$precio,
                    'stock' =>$stock
                );
               $model-> edit_product($data);
    
               return redirect()->to(base_url('productos'));
            }else{
            
                $data['producto'] = $model->get_product($id);
                return view('templates/header')
                .view('edit_producto',$data)
                .view('templates/footer'); 
            }
          
           
        }else{
            return redirect()->to(base_url(''));
        }
       
    }
       
    
   
}
