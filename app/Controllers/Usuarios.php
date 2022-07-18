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
   
}
