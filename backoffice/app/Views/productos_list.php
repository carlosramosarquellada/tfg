<main role="main" class="col-md-9 ml-sm-auto col-lg-12 pt-3 px-4">

          <div class="row">
          <div class="col-md-9 ml-sm-auto col-lg-12 pt-3 px-4">
            <h2>Productos de la tienda
                <a  href="<?php echo base_url('productos/add_producto'); ?>" class="btn  btn-warning" type="button">Añadir nuevo producto</a>
            </h2>
           
            <div class="table-responsive">
              <table class="table table-striped table-sm">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Categoría</th>
                    <th>Precio</th>
                    <th>Stock</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($productos as $producto) : ?>
                  <tr>
                    <td>
                        <a href="<?php echo base_url('productos/edit/'.$producto->id); ?>"><?php echo $producto->id ?>
                         </a>
                    </td>
                    <td><a href="<?php echo base_url('productos/edit/'.$producto->id); ?>"><?php echo $producto->nombre ?>
                         </a></td>
                    <td><a href="<?php echo base_url('productos/edit/'.$producto->id); ?>"><?php echo $producto->descripcion ?>
                         </a></td>
                    <td>
                    <?php echo $producto->categoria ?>
                    </td>
                    <td>
                        <?php echo number_format($producto->precio,2,',','.').'€' ?>
                    </td>
                    <td>
                    <?php echo $producto->stock ?>
                    </td>
                   
                  </tr>
                <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
       
          </div>
        </main>  
    