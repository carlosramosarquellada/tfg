<?php

namespace App\Controllers;

use App\Models\Usuarios_model;
use CodeIgniter\Entity\Cast\BaseCast;

class Usuarios extends BaseController
{
    public function registro()
    {
        $data=array();
        $model = model(Usuarios_model::class);
       if($_POST)
       {
        $nombre=$this->request->getPost('nombre');
        $apellidos=$this->request->getPost('apellidos');
        $username=$this->request->getPost('username');
        $password=$this->request->getPost('password');
        $email=$this->request->getPost('email');
        $telefono=$this->request->getPost('telefono');
        $direccion=$this->request->getPost('direccion');
        $numero=$this->request->getPost('numero');
        $ciudad=$this->request->getPost('ciudad');
        $codigo_postal=$this->request->getPost('codigo_postal');
        $provincia=$this->request->getPost('provincia');
        $pais=$this->request->getPost('pais');
        $data_user=[
            'nombre'=> $nombre,
            'apellidos'=>$apellidos,
            'username'=>base64_encode($username),
            'password'=>base64_encode($password),
            'email'=>$email,
            'telefono'=>$telefono

        ];
        $user_id =$model->set_usuario($data_user);
      
        $data_direccion=array(
            'user_id'=>$user_id,
            'nombre'=>$direccion,
            'numero' =>$numero,
            'codigo_postal' =>$codigo_postal,
            'ciudad' =>$ciudad,
            'provincia' => $provincia,
            'pais'  => $pais

        );
        $model->set_usuario_direccion($data_direccion);
       }
       
       // $data['Usuarios'] = $Usuarios;

        return view('templates/header')
        .view('registro',$data)
        .view('templates/footer');
        
    }
    public function login()
    {
        $data=array();
        $model = model(Usuarios_model::class);
       if($_POST)
       {
       
        $username=$this->request->getPost('username');
        $password=$this->request->getPost('password');
       
       
      
       
        if($username=='administrador' && $password=='administrador'){
            $session=session();
            $session->set($username);
            $session->set($password);
            $_SESSION['admin']=1;
            $_SESSION['username']=$username;
            $_SESSION['password']=$password;

            
            return redirect()->to(base_url('home'));
        }else{
            $data['error_login']=1;
        }
      
      
       }
       
      

        return view('templates/header')
        .view('login',$data)
        .view('templates/footer');
        
    }
    public function logout()
    {
       
            $session=session();
            $session->destroy();
            return redirect()->to(base_url(''));
    
    }
    public function clientes_list()
    {
        $model = model(Usuarios_model::class);
        if($_SESSION['admin'])
        {
            
            $data=array();
            $data['clientes'] = $model->get_all_users();
            return view('templates/header')
            .view('clientes_list',$data)
            .view('templates/footer');  
           
        }else{
            return redirect()->to(base_url(''));
        }
       

    }
    public function edit_cliente($id)
    {
        $model = model(Usuarios_model::class);
        if($_SESSION['admin'])
        {
            if($_POST)
            {
               
                $nombre=$_POST['nombre'];
                $apellidos=$_POST['apellidos'];
                $email=$_POST['email'];
                $telefono=$_POST['telefono'];
                
                $data=array(
                    'id' =>$id,
                    'nombre' => $nombre,
                    'apellidos' => $apellidos,
                    'email' =>$email,
                    'telefono' =>$telefono,
                   
                );
               $model-> edit_cliente($data);
    
               return redirect()->to(base_url('clientes'));
            }else{
            
                $data['cliente'] = $model->get_cliente($id);
                return view('templates/header')
                .view('edit_cliente',$data)
                .view('templates/footer'); 
            }
          
           
        }else{
            return redirect()->to(base_url(''));
        }
       
    }
    public function direcciones_list($user_id)
    {
        $model = model(Usuarios_model::class);
        if($_SESSION['admin'])
        {
            
            $data=array();
            $data['cliente'] = $model->get_cliente($user_id);
            $data['direcciones'] = $model->get_direcciones_cliente($user_id);
            return view('templates/header')
            .view('direcciones_list',$data)
            .view('templates/footer');  
           
        }else{
            return redirect()->to(base_url(''));
        }
       

    }
    public function edit_direccion($id)
    {
        $model = model(Usuarios_model::class);
        if($_SESSION['admin'])
        {
            if($_POST)
            {
                $data['direccion'] = $model->get_direccion($id);
                $data['cliente'] = $model->get_cliente($data['direccion']->user_id);
                $nombre=$_POST['nombre'];
                $numero=$_POST['numero'];
                $codigo_postal=$_POST['codigo_postal'];
                $ciudad=$_POST['ciudad'];
                $provincia=$_POST['provincia'];
                $pais=$_POST['pais'];
                
                $data_dir=array(
                    'id' =>$id,
                    'nombre' => $nombre,
                    'numero' =>$numero,
                    'codigo_postal' =>$codigo_postal,
                    'ciudad' =>$ciudad,
                    'provincia' =>$provincia,
                    'pais' =>$pais
                   
                );
               $model-> edit_direccion($data_dir);
    
               return redirect()->to(base_url('clientes'));
            }else{
            
                $data['direccion'] = $model->get_direccion($id);
                return view('templates/header')
                .view('edit_direccion',$data)
                .view('templates/footer'); 
            }
          
           
        }else{
            return redirect()->to(base_url(''));
        }
       
    }
    public function pedidos_list()
    {
        $model = model(Usuarios_model::class);
        if($_SESSION['admin'])
        {
            
            $data=array();
            if($_GET['search'])
            {
                $criterio=$_GET['search'];
                $data['pedidos'] = $model->get_pedidos_filtrados($criterio);
            }else{
                $data['pedidos'] = $model->get_all_pedidos();
            }
           
           
            return view('templates/header')
            .view('pedidos_list',$data)
            .view('templates/footer');  
           
        }else{
            return redirect()->to(base_url(''));
        }
       

    }
    public function ver_pedido($id)
    {
        $model = model(Usuarios_model::class);
        if($_SESSION['admin'])
        {
            if($_POST['estado'])
            {
                $data_pedido=array(
                    'id'=>$id,
                    'estado_pedido'=>$_POST['estado']
                );

                $model->update_pedido($data_pedido);
                if($data_pedido['estado_pedido']=='En reparto')
                {
                    //EMAIL
                    $to = 'carlosramosarquellada@gmail.com';
                    $subject = 'Su pedido está en reparto.';
                    $message = 'Pronto lo recibirá en la dirección seleccionada.';
                    
                    $email = \Config\Services::email();
                    $email->setTo($to);
                    $email->setFrom('tfg.carlosramosarquellada@gmail.com');
                    
                    $email->setSubject($subject);
                    $email->setMessage($message);
                    if (!$email->send()) 
                    {

                        $data_mail = $email->printDebugger(['headers']);
                        print_r($data_mail);
                    }
                }else if($data_pedido['estado_pedido']=='Entregado'){
                    //EMAIL
                    $to = 'carlosramosarquellada@gmail.com';
                    $subject = 'Su pedido ha sido entregado.';
                    $message = 'Su pedido se ha entregado con éxito en la dirección seleccionada.';
                    
                    $email = \Config\Services::email();
                    $email->setTo($to);
                    $email->setFrom('tfg.carlosramosarquellada@gmail.com');
                    
                    $email->setSubject($subject);
                    $email->setMessage($message);
                    if (!$email->send()) 
                    {

                        $data_mail = $email->printDebugger(['headers']);
                        print_r($data_mail);
                    }
                }
                
            
                
            }

           
            
                $data['pedido'] = $model->get_pedido($id);
                $data['lineas_pedido'] = $model->get_lineas_pedido($id);
                $data['cliente'] = $model->get_cliente($data['pedido']->user_id);
                $data['direccion'] = $model->get_direccion($data['pedido']->direccion_id);
                return view('templates/header')
                .view('ver_pedido',$data)
                .view('templates/footer'); 
            
          
           
        }else{
            return redirect()->to(base_url(''));
        }
       
    }
    public function carrusel()
    {
        $model = model(Usuarios_model::class);
        if($_SESSION['admin'])
        {
           
            
                $data['carrusel'] = $model->get_carrusel();
                
                return view('templates/header')
                .view('carrusel',$data)
                .view('templates/footer'); 
            
          
           
        }else{
            return redirect()->to(base_url(''));
        }
       
    }
    public function add_diapositiva()
    {
        $model = model(Usuarios_model::class);
        if($_SESSION['admin'])
        {
            if($_POST)
            {
                $target_dir = "C:/xampp/htdocs/tfg/public/uploads/";
                $target_file = $target_dir . basename($_FILES["imagen"]["name"]);
                move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file);
                $titulo=$_POST['titulo'];
                $subtitulo=$_POST['subtitulo'];
                
                $data=array(
                    'titulo' => $titulo,
                    'subtitulo' => $subtitulo,
                    'imagen' =>$_FILES["imagen"]["name"],
                    
                );
               $model-> set_carrusel($data);
    
               return redirect()->to(base_url('carrusel'));
            }else{
                return view('templates/header')
                .view('edit_diapositiva')
                .view('templates/footer'); 
            }
          
           
        }else{
            return redirect()->to(base_url(''));
        }
       
    }
    public function edit_diapositiva($id)
    {
        $model = model(Usuarios_model::class);
        if($_SESSION['admin'])
        {
            if($_POST)
            {
                $target_dir = "C:/xampp/htdocs/tfg/public/uploads/";
                $target_file = $target_dir . basename($_FILES["imagen"]["name"]);
                move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file);
                $titulo=$_POST['titulo'];
                $subtitulo=$_POST['subtitulo'];
                
                $data=array(
                    'id'=>$id,
                    'titulo' => $titulo,
                    'subtitulo' => $subtitulo,
                    'imagen' =>$_FILES["imagen"]["name"],
                    
                );
               $model-> edit_carrusel($data);
    
               return redirect()->to(base_url('carrusel'));
            }else{
                $data['diapositiva'] = $model->get_diapositiva($id);
                return view('templates/header')
                .view('edit_diapositiva',$data)
                .view('templates/footer'); 
            }
          
           
        }else{
            return redirect()->to(base_url(''));
        }
       
    }
    public function delete_diapositiva($id)
    {
        $model = model(Usuarios_model::class);
        if($_SESSION['admin'])
        {
               $model-> delete_carrusel($id);
    
               return redirect()->to(base_url('carrusel'));
        }else{
            return redirect()->to(base_url(''));
        }
       
    }
   
}
