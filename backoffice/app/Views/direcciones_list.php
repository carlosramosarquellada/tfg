<main role="main" class="col-md-9 ml-sm-auto col-lg-12 pt-3 px-4">

          <div class="row">
          <div class="col-md-9 ml-sm-auto col-lg-12 pt-3 px-4">
            <h2>Direcciones del cliente <?php echo $cliente->nombre.' '.$cliente->apellidos ?></h2>
               
            </h2>
           
            <div class="table-responsive">
              <table class="table table-striped table-sm">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Dirección</th>
                    <th>Número</th>
                    <th>Código postal</th>
                    <th>Ciudad</th>
                    <th>Provincia</th>
                    <th>País</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($direcciones as $direccion) : ?>
                  <tr>
                    <td>
                        <a href="<?php echo base_url('direcciones/edit/'.$direccion->id); ?>"><?php echo $direccion->id ?>
                         </a>
                    </td>
                    <td><a href="<?php echo base_url('direcciones/edit/'.$direccion->id); ?>"><?php echo $direccion->nombre ?>
                         </a></td>
                    <td><a href="<?php echo base_url('direcciones/edit/'.$direccion->numero); ?>"><?php echo $direccion->numero ?>
                         </a></td>
                    <td>
                    <?php echo $direccion->codigo_postal ?>
                    </td>
                   
                    <td>
                    <?php echo $direccion->ciudad ?>
                    </td>
                    <td>
                    <?php echo $direccion->provincia ?>
                    </td>
                    <td>
                    <?php echo $direccion->pais ?>
                    </td>
                   
                  </tr>
                <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
       
          </div>
        </main>  
    