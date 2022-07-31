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
        $username=base64_encode($username);
        $password=base64_encode($password);
       
      
        $verificado=$model->login($username,$password);
        if($verificado){
            $user=$model-> get_usuario_login_pass($username, $password);
            $session=session();
            $session->set($user);
            $_SESSION['user']=$user;
            return redirect()->to(base_url(''));
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
    public function area_clientes($id)
    {
        $data=array();
        $model = model(Usuarios_model::class);
       if($_POST)
       {
            $nombre=$this->request->getPost('nombre');
            $apellidos=$this->request->getPost('apellidos');
            $email=$this->request->getPost('email');
            $telefono=$this->request->getPost('telefono');
            $username=$this->request->getPost('username');
            $password=$this->request->getPost('password');
            $username=base64_encode($username);
            $password=base64_encode($password);
            $data_cliente=array(
                'id'=>$id,
                'nombre'=>$nombre,
                'apellidos'=>$apellidos,
                'email'=>$email,
                'telefono'=>$telefono,
                'username'=>$username,
                'password'=>$password,

            );
            $model->edit_cliente($data_cliente);

       }
       $data['id']=$id;
       $data['cliente']=$model->get_cliente($id);
       $data['cliente']->username=base64_decode($data['cliente']->username);
       $data['cliente']->password=base64_decode($data['cliente']->password);
       $data['direcciones']=$model->get_direcciones_cliente($id);
       $data['pedidos']=$model->get_pedidos_cliente($id);
        return view('templates/header')
        .view('area_clientes',$data)
        .view('templates/footer');
        
    }
    public function edit_direccion($id)
    {
        $model = model(Usuarios_model::class);
        
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
            
    
               return redirect()->to(base_url('area_clientes/'.$data['cliente']->id));
            }else{
            
                $data['direccion'] = $model->get_direccion($id);
                return view('templates/header')
                .view('edit_direccion',$data)
                .view('templates/footer'); 
            }
          
           
       
       
    }
    public function nueva_direccion()
    {
        $model = model(Usuarios_model::class);
        $session=session();
            if($_POST)
            {
                
                $id_cliente=$_SESSION['id']  ;
                $nombre=$_POST['nombre'];
                $numero=$_POST['numero'];
                $codigo_postal=$_POST['codigo_postal'];
                $ciudad=$_POST['ciudad'];
                $provincia=$_POST['provincia'];
                $pais=$_POST['pais'];
                
                $data_dir=array(
                   'user_id' =>$id_cliente,
                    'nombre' => $nombre,
                    'numero' =>$numero,
                    'codigo_postal' =>$codigo_postal,
                    'ciudad' =>$ciudad,
                    'provincia' =>$provincia,
                    'pais' =>$pais
                   
                );
               $model-> set_usuario_direccion($data_dir);
            
    
               return redirect()->to(base_url('area_clientes/'.$id_cliente));
            }else{
            
               
                return view('templates/header')
                .view('edit_direccion')
                .view('templates/footer'); 
            }
          
           
       
       
    }
   
}
