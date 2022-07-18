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
    public function get_pedidos_ultima_semana()
    {
        $db = db_connect();
        $query=$db->query("SELECT sum(total) as total,fecha FROM pedidos WHERE fecha >= DATE(NOW() - INTERVAL 7 DAY)  GROUP by DAY(fecha) order by fecha asc;");
        return $query->getResult();
    }
    public function get_mejores_clientes()
    {
        $db = db_connect();
        $query=$db->query("SELECT sum(pedidos.total) as total,usuarios.* FROM pedidos INNER JOIN usuarios on pedidos.user_id=usuarios.id   GROUP by pedidos.user_id  order by total desc LIMIT 5;");
        return $query->getResult();
    }
    public function get_productos_mas_vendidos()
    {
        $db = db_connect();
        $query=$db->query("SELECT sum(lineas_pedido.qty) as total,productos.*,sum(lineas_pedido.qty)*productos.precio as dinero FROM lineas_pedido INNER JOIN productos on lineas_pedido.product_id=productos.id   GROUP by productos.id order by total desc LIMIT 5;");
        return $query->getResult();
    }
} 