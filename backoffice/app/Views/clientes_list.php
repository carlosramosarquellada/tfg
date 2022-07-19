<main role="main" class="col-md-9 ml-sm-auto col-lg-12 pt-3 px-4">

          <div class="row">
          <div class="col-md-9 ml-sm-auto col-lg-12 pt-3 px-4">
            <h2>Clientes de la tienda
               
            </h2>
           
            <div class="table-responsive">
              <table class="table table-striped table-sm">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Direcciones</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($clientes as $cliente) : ?>
                  <tr>
                    <td>
                        <a href="<?php echo base_url('clientes/edit/'.$cliente->id); ?>"><?php echo $cliente->id ?>
                         </a>
                    </td>
                    <td><a href="<?php echo base_url('clientes/edit/'.$cliente->id); ?>"><?php echo $cliente->nombre ?>
                         </a></td>
                    <td><a href="<?php echo base_url('clientes/edit/'.$cliente->id); ?>"><?php echo $cliente->apellidos ?>
                         </a></td>
                    <td>
                    <?php echo $cliente->email ?>
                    </td>
                   
                    <td>
                    <?php echo $cliente->telefono ?>
                    </td>
                    <td>
                    <a href="<?php echo base_url('clientes/direcciones/'.$cliente->id); ?>" type="button" class="btn btn-warning pt-0 pb-0">Ver direcciones </a>
                    </td>
                   
                  </tr>
                <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
       
          </div>
        </main>  
    