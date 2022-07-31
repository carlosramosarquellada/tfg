<?php

namespace App\Models;

use CodeIgniter\Model;

class Productos_model extends Model
{
    public function get_all_products()
    {
        $db = db_connect();
        $query=$db->query('SELECT * FROM productos');
        return $query->getResult();
    }
    public function get_product($product_id)
    {
        $db = db_connect();
        $query=$db->query('SELECT * FROM productos where id ='.$product_id);
        return $query->getRow();
    }
    public function get_searched_products($criterio)
    {
        $db = db_connect();
        $query=$db->query("SELECT * FROM productos where nombre LIKE '%$criterio%'
         OR descripcion LIKE '%$criterio%' OR categoria LIKE '%$criterio%' OR precio LIKE '%$criterio%'");
        return $query->getResult();
    }
    public function get_producto_repetido_carrito($user_id,$product_id)
    {
        $db = db_connect();
        $query=$db->query("SELECT * FROM carrito where user_id =$user_id AND product_id =$product_id");
        return $query->getRow();
    }
    public function set_product_carrito($data)
    {
        $db = db_connect();
        return $db
        ->table('carrito')
        ->insert($data);
    }
    public function update_product_carrito($data)
    {
        $db = db_connect();
        return $db
        ->table('carrito')
        ->set('qty', 'qty+'.(int)$data['qty'],false)
        ->set('precio', $data['precio'])
        ->where('user_id', $data['user_id'])
        ->where('product_id', $data['product_id'])
        ->update();

    }
    public function get_carrito($id_user)
    {
        $db = db_connect();
        $query=$db->query("SELECT * FROM carrito WHERE user_id= $id_user");
        return $query->getResult();
    }
    public function get_item_carrito($id)
    {
        $db = db_connect();
        $query=$db->query("SELECT * FROM carrito WHERE id= $id");
        return $query->getRow();
    }
    public function update_item_carrito($data)
    {
        $db = db_connect();
        return $db
        ->table('carrito')
        ->set('qty',$data['qty'],false)
        ->set('precio', $data['precio'])
        ->where('id', $data['id'])
        ->update();
    }
    public function delete_carrito($user_id)
    {
        $db = db_connect();
        return $db
        ->table('carrito')
        ->where('user_id', $user_id)
        ->delete();
    }
    public function delete_item_carrito($id)
    {
        $db = db_connect();
        return $db
        ->table('carrito')
        ->where('id', $id)
        ->delete();
    }
    public function get_direcciones($id)
    {
        $db = db_connect();
        $query=$db->query("SELECT * FROM usuarios_direcciones WHERE user_id= $id");
        return $query->getResult(); 
    }
    public function set_pedido($data)
    {
        $db      = \Config\Database::connect();
        $builder= $db->table('pedidos');
        $builder->set($data);
        $builder->insert($data);
        $id=$db->insertID();
        return $id;
    }
    public function set_linea_pedido($data)
    {
        $db = db_connect();
        return $db
        ->table('lineas_pedido')
        ->insert($data);  
       
    }
    public function get_all_promociones()
    {
        $db = db_connect();
        $query=$db->query('SELECT * FROM promociones');
        return $query->getResult();
    }
    public function get_promocion_producto($product_id)
    {
        $db = db_connect();
        $query=$db->query('SELECT * FROM promociones where product_id = ' . $product_id);
        return $query->getRow();
    }
    public function get_all_transportistas()
    {
        $db = db_connect();
        $query=$db->query('SELECT * FROM transportistas');
        return $query->getResult();
    }
    public function get_transportista($id)
    {
        $db = db_connect();
        $query=$db->query('SELECT * FROM transportistas where id ='.$id);
        return $query->getRow();
    }
   
} 