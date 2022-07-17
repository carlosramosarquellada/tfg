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
} 