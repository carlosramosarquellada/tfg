<main role="main" class="col-md-9 ml-sm-auto col-lg-12 pt-3 px-4">

          <div class="row">
          <div class="col-md-9 ml-sm-auto col-lg-12 pt-3 px-4">
            <h2>Transportistas de la tienda
                <a  href="<?php echo base_url('transportistas/add_transportista'); ?>" class="btn  btn-warning" type="button">Añadir nuevo transportista</a>
            </h2>
           
            <div class="table-responsive">
              <table class="table table-striped table-sm">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Tasas</th>
                    <th>Tiempo de entrega</th>
                    <th>Acciones</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($transportistas as $transportista) : ?>
                  <tr>
                    <td>
                        <?php echo $transportista->id ?>
                        
                    </td>
                    <td><?php echo $transportista->nombre ?>
                  </td>
                    <td><?php echo number_format($transportista->tasas,2,',','.').'€' ?>
                        </td>
                    <td>
                   <?php
                      echo $transportista->tiempo_envio.' días';
                    
                    ?>
                    </td>
                    
                    <td>
                    <a href="<?php echo base_url('transportistas/eliminar_transportista/'.$transportista->id); ?>" type="button" class="btn btn-danger pt-0 pb-0">Eliminar</a>
                    </td>
                   
                   
                   
                  </tr>
                <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
       
          </div>
        </main>  
    