<?php

namespace App\Models;

use CodeIgniter\Model;

class Usuarios_model extends Model
{
    public function get_all_products()
    {
        $db = db_connect();
        $query=$db->query('SELECT * FROM productos');
        return $query->getResult();
    }
    public function get_searched_products($criterio)
    {
        $db = db_connect();
        $query=$db->query("SELECT * FROM productos where nombre LIKE '%$criterio%'
         OR descripcion LIKE '%$criterio%' OR categoria LIKE '%$criterio%' OR precio LIKE '%$criterio%'");
        return $query->getResult();
    }
    public function set_usuario($data)
    {
        //$db = db_connect();
        $db      = \Config\Database::connect();
        $builder= $db->table('usuarios');
        $builder->set($data);
        $builder->insert($data);
        $id=$db->insertID();
        return $id;
       
        
    }
    public function set_usuario_direccion($data)
    {
        $db = db_connect();
        return $db
        ->table('usuarios_direcciones')
        ->insert($data);
    }
    public function login($username, $password)
    {
        $db = db_connect();
        $query=$db->query("SELECT * FROM usuarios WHERE username = '$username' AND password = '$password' LIMIT 1");
        $user= $query->getResult();
        if(!$user) {
            return false;
        }else{
            return true;
        }
    }
    public function get_usuario_login_pass($username, $password)
    {
        $db = db_connect();
        $query=$db->query("SELECT * FROM usuarios WHERE username = '$username' AND password = '$password' LIMIT 1");
        return $query->getRowArray();
    }
    public function edit_cliente($data)
    {
       
        $db = \Config\Database::connect();
        $builder= $db->table('usuarios');
        $builder->set($data);
        $builder->where('id',$data['id']);
        $builder->update($data);
        $id=$db->insertID();
        return $id;
       
    }
    public function get_cliente($id)
    {
        $db = db_connect();
        $query=$db->query('SELECT * FROM usuarios where id ='.$id);
        return $query->getRow();
    }
    public function get_direcciones_cliente($id)
    {
        $db = db_connect();
        $query=$db->query('SELECT * FROM usuarios_direcciones where user_id ='.$id);
        return $query->getResult();
    }
    public function edit_direccion($data)
    {
       
        $db = \Config\Database::connect();
        $builder= $db->table('usuarios_direcciones');
        $builder->set($data);
        $builder->where('id',$data['id']);
        $builder->update($data);
        $id=$db->insertID();
        return $id;
       
    }
    public function get_direccion($id)
    {
        $db = db_connect();
        $query=$db->query('SELECT * FROM usuarios_direcciones where id ='.$id);
        return $query->getRow();
    }
    public function get_pedido($id)
    {
        $db = db_connect();
        $query=$db->query('SELECT * FROM pedidos where id ='.$id);
        return $query->getRow();
    }
    public function get_lineas_pedido($id)
    {
        $db = db_connect();
        $query=$db->query('SELECT * FROM lineas_pedido where pedido_id ='.$id);
        return $query->getResult();
    }
    public function get_producto($id)
    {
        $db = db_connect();
        $query=$db->query('SELECT * FROM productos where id ='.$id);
        return $query->getRow();
    }
    public function get_carrusel()
    {
        $db = db_connect();
        $query=$db->query('SELECT * FROM carrusel');
        return $query->getResult();
    }
    public function set_carrusel($data)
    {
        $db = db_connect();
        return $db
        ->table('carrusel')
        ->insert($data); 
    }
    public function edit_carrusel($data)
    {
       
        $db = \Config\Database::connect();
        $builder= $db->table('carrusel');
        $builder->set($data);
        $builder->where('id',$data['id']);
        $builder->update($data);
        $id=$db->insertID();
        return $id;
       
    }
    public function delete_carrusel($id)
    {
       
        $db = db_connect();
        return $db
        ->table('carrusel')
        ->where('id', $id)
        ->delete();
       
    }
    public function get_diapositiva($id)
    {
        $db = db_connect();
        $query=$db->query('SELECT * FROM carrusel where id ='.$id);
        return $query->getRow();
    }
    public function get_pedidos_cliente($id)
    {
        $db = db_connect();
        $query=$db->query("SELECT * FROM pedidos WHERE user_id = '$id' ");
        return $query->getResult();
       
    }


} 