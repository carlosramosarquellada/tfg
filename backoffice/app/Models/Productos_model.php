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
    public function update_item_carrito($data)
    {
        $db = db_connect();
        return $db
        ->table('carrito')
        ->set('qty',$data['qty'],false)
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
    public function set_product($data)
    {
        $db = db_connect();
        return $db
        ->table('productos')
        ->insert($data);
    }
    public function edit_product($data)
    {
       
        $db = \Config\Database::connect();
        $builder= $db->table('productos');
        $builder->set($data);
        $builder->where('id',$data['id']);
        $builder->update($data);
        $id=$db->insertID();
        return $id;
       
    }
    public function get_all_promociones()
    {
        $db = db_connect();
        $query=$db->query('SELECT * FROM promociones');
        return $query->getResult();
    }
    public function set_promocion($data)
    {
        $db = db_connect();
        return $db
        ->table('promociones')
        ->insert($data);
    }
    public function delete_promocion($id)
    {
       
        $db = db_connect();
        return $db
        ->table('promociones')
        ->where('id', $id)
        ->delete();
       
    }
    public function get_all_transportistas()
    {
        $db = db_connect();
        $query=$db->query('SELECT * FROM transportistas');
        return $query->getResult();
    }
    public function set_transportista($data)
    {
        $db = db_connect();
        return $db
        ->table('transportistas')
        ->insert($data);
    }
    public function delete_transportista($id)
    {
       
        $db = db_connect();
        return $db
        ->table('transportistas')
        ->where('id', $id)
        ->delete();
       
    }


   
} 