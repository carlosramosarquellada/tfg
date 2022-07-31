<main role="main" class="col-md-9 ml-sm-auto col-lg-12 pt-3 px-4">

          <div class="row">
          <div class="col-md-9 ml-sm-auto col-lg-12 pt-3 px-4">
            <h2>Promociones de la tienda
                <a  href="<?php echo base_url('promociones/add_promocion'); ?>" class="btn  btn-warning" type="button">Añadir nueva promocion</a>
            </h2>
           
            <div class="table-responsive">
              <table class="table table-striped table-sm">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Tipo</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($promociones as $promocion) : ?>
                  <tr>
                    <td>
                        <?php echo $promocion->id ?>
                        
                    </td>
                    <td><?php echo $promocion->nombre ?>
                  </td>
                    <td><?php echo $promocion->tipo ?>
                        </td>
                    <td>
                    <?php if($promocion->tipo=='Unidades'){
                      echo ($promocion->unidades_requeridas.'X'.$promocion->unidades_pagadas);

                    }else{
                      echo $promocion->descuento.'%';
                    }  
                    ?>
                    </td>
                    
                    <td>
                    <a href="<?php echo base_url('promociones/eliminar_promocion/'.$promocion->id); ?>" type="button" class="btn btn-danger pt-0 pb-0">Eliminar</a>
                    </td>
                   
                   
                   
                  </tr>
                <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
       
          </div>
        </main>  
    