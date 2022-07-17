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
    public function get_searched_products($criterio)
    {
        $db = db_connect();
        $query=$db->query("SELECT * FROM productos where nombre LIKE '%$criterio%'
         OR descripcion LIKE '%$criterio%' OR categoria LIKE '%$criterio%' OR precio LIKE '%$criterio%'");
        return $query->getResult();
    }
    public function set_product_carrito($data)
    {
        $db = db_connect();
        return $db
        ->table('carrito')
        ->insert($data);
    }
   
} 