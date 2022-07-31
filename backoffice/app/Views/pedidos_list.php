<main role="main" class="col-md-9 ml-sm-auto col-lg-12 pt-3 px-4">

          <div class="row">
          <div class="col-md-9 ml-sm-auto col-lg-12 pt-3 px-4">
            <h2>Pedidos de la tienda
               
            </h2>
          <form class="col-2  mb-3 mb-lg-0 me-lg-3">
            
          <input type="search" class="form-control form-control-dark" name="search" placeholder="Buscar..." aria-label="Search">
        
         </form>
            <div class="table-responsive">
              <table class="table table-striped table-sm">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Usuario</th>
                    <th>Fecha</th>
                    <th>Dirección</th>
                    <th>Estado</th>
                    <th>Total</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($pedidos as $pedido) : ?>
                  <tr>
                    <td>
                        <a href="<?php echo base_url('pedidos/ver_pedido/'.$pedido->id); ?>"><?php echo $pedido->id ?>
                         </a>
                    </td>
                    <td><a href="<?php echo base_url('pedidos/ver_pedido/'.$pedido->id); ?>">
                    <?php 
                     $model = model(Usuarios_model::class); 
                    $usuario = $model->get_cliente($pedido->user_id);
                    echo $usuario->nombre.' '.$usuario->apellidos ?>
                         </a></td>
                    <td><a href="<?php echo base_url('pedidos/ver_pedido/'.$pedido->id); ?>"><?php echo $pedido->fecha ?>
                         </a></td>
                    <td>
                    <?php
                     $direccion = $model->get_direccion($pedido->direccion_id);
                     echo $direccion->nombre.' Nº'.$direccion->numero.', CP '.$direccion->codigo_postal.' '.$direccion->ciudad.' ,'
                     .$direccion->provincia. ' ('.$direccion->pais.')' ?>
                    </td>
                   
                    <td>
                    <?php echo $pedido->estado_pedido ?>
                    </td>
                    <td>
                    <?php echo number_format($pedido->total,2,',','.').' €' ?>
                    </td>
                   
                  </tr>
                <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
       
          </div>
        </main>  
    