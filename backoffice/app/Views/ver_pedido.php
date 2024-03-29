<div class="row">
<div class="container col-lg-3">
  <main>
    <div class="py-5">
      <?php if (isset($pedido->id)): ?>
        <h2>Detalles del pedido <?php echo $pedido->id ?></h2>
      <?php endif; ?>
     
    </div>

    <div class="col-lg-12">
    <div class="card shadow-sm p-0">
      <form method="post">
      <div class="card-body">
              <p class="card-text"><b>ID: </b><?php echo $pedido->id ?></p>
              <p class="card-text"><b>Cliente: </b><?php echo $cliente->nombre. ' '.$cliente->apellidos ?>
              <p class="card-text"><b>Dirección: </b><?php echo $direccion->nombre.' Nº'.$direccion->numero.', CP '.$direccion->codigo_postal.' '.$direccion->ciudad.' ,'
                    .$direccion->provincia. ' ('.$direccion->pais.')' ?></p>
              <div style="display: inline-block">
                <b>Estado: </b>
                <select name="estado" id="estado" class="select" pedido_id="<?php echo $pedido->id; ?>">
                  <option value="Tramitado" <?php if($pedido->estado_pedido=='Tramitado') echo 'selected'?> >Tramitado</option>
                  <option value="En reparto"<?php if($pedido->estado_pedido=='En reparto') echo 'selected'?> >En reparto</option>
                  <option value="Entregado"<?php if($pedido->estado_pedido=='Entregado') echo 'selected'?> >Entregado</option>
                </select>
              </div>
              
              <p class="card-text"><b>Total: </b><?php echo number_format($pedido->total,2,',','.') ?> €</p>
              <button class="btn btn-warning mb-1" style="float: right;"type="submit">Guardar</button>
        </div>
      </form>
      </div>
      
    </div>
    
  </main>

</div>
<div class="container col-lg-7">
  <main>
  <div class="py-5">
      <?php if (isset($pedido->id)): ?>
        <h2>Líneas del pedido <?php echo $pedido->id ?></h2>
      <?php else: ?>
        <h2>Añadir nuevo cliente</h2>
      <?php endif; ?>
     
    </div>
    <div class="col-lg-12">
    <div class="table-responsive">
              <table class="table table-striped table-sm">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Total línea</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($lineas_pedido as $linea) : ?>
                  <tr>
                    <td>
                       <?php echo $linea->id ?>
                    </td>
                    <td>
                    <?php 
                     $model = model(Usuarios_model::class); 
                    $producto = $model->get_producto($linea->product_id);
                    echo $producto->nombre ?>
                        </td>
                    <td>
                      <?php echo $linea->qty ?>
                    </td>
                    <td>
                    <?php echo number_format($linea->precio,2,',','.').'€'  ?>
                    
                    </td>
                    
                    <td>
                    <?php echo number_format($linea->qty*$linea->precio,2,',','.').'€'  ?>
                    </td>
                    
                   
                  </tr>
                <?php endforeach; ?>
                </tbody>
              </table>
            </div>
    </div>
  </main>
</div>
</div>