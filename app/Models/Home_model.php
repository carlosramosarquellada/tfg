<?php

namespace App\Models;

use CodeIgniter\Model;

class Home_model extends Model
{
    public function get_all_products()
    {
        $db = db_connect();
        $query=$db->query('SELECT * FROM productos');
        return $query->getResult();
    }
    public function get_all_users()
    {
        $db = db_connect();
        $query=$db->query('SELECT * FROM usuarios');
        return $query->getResult();
    }
    public function get_all_pedidos()
    {
        $db = db_connect();
        $query=$db->query('SELECT * FROM pedidos');
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
        $query=$db->query("SELECT sum(lineas_pedido.qty) as total,productos.*,sum(lineas_pedido.qty)*productos.precio as dinero FROM lineas_pedido INNER JOIN productos on lineas_pedido.product_id=productos.id   GROUP by productos.id order by total desc LIMIT 8;");
        return $query->getResult();
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
    
    

} 