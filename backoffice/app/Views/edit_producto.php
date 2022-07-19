<div class="container">
  <main>
    <div class="py-5">
      <?php if (isset($producto->id)): ?>
        <h2>Editar producto <?php echo $producto->nombre ?></h2>
      <?php else: ?>
        <h2>Añadir nuevo producto</h2>
      <?php endif; ?>
     
    </div>

    <div class="row ">
     
      <div class="col-md-7 col-lg-8" style="margin:auto">
       
        <form class="needs-validation" method="post" enctype="multipart/form-data">
          <div class="row g-3">
            <div class="col-sm-12">
              <label for="nombre" class="form-label">Nombre</label>
              <input type="text" class="form-control" id="nombre"name="nombre"  value="<?php if(isset($producto->nombre)){echo $producto->nombre;} ?>" required="">
              <div class="invalid-feedback">
                El campo Nombre es requerido.
              </div>
            </div>

            <div class="col-sm-12">
              <label for="descripcion" class="form-label">Descripción</label>
              <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?php if(isset($producto->descripcion)){echo $producto->descripcion;} ?>" required="">
              <div class="invalid-feedback">
              El campo descripcion es requerido.
              </div>
            </div>

            <div class="col-12">
              <label for="imagen" class="form-label">Imagen</label>
              <div class="input-group">
                <input type="file" class="form-control" id="imagen" name="imagen" value="<?php if(isset($producto->imagen)){echo $producto->imagen;}?>"  >
              
              </div>
            </div>
            <div class="col-md-6">
              <label for="categoria" class="form-label">Categoría</label>
              <select class="form-select" id="categoria" name="categoria" required="">
                <option value="">Seleccione...</option>
                <option <?php if (isset($producto->categoria) && $producto->categoria=='Alimentación') echo 'selected' ?> value="Alimentación">Alimentación</option>
                <option <?php if (isset($producto->categoria) && $producto->categoria=='Moda') echo 'selected' ?> value="Moda">Moda</option>
                <option <?php if (isset($producto->categoria) && $producto->categoria=='Bricolaje') echo 'selected' ?> value="Bricolaje">Bricolaje</option>
                <option <?php if (isset($producto->categoria) && $producto->categoria=='Limpieza') echo 'selected' ?> value="Limpieza">Limpieza</option>
                <option <?php if (isset($producto->categoria) && $producto->categoria=='Salud') echo 'selected' ?> value="Salud">Salud</option>
                <option <?php if (isset($producto->categoria) && $producto->categoria=='Electrónica') echo 'selected' ?> value="Electrónica">Electrónica</option>
                <option <?php if (isset($producto->categoria) && $producto->categoria=='Deportes') echo 'selected' ?> value="Deportes">Deportes</option>
                <option <?php if (isset($producto->categoria) && $producto->categoria=='Ocio') echo 'selected' ?> value="Ocio">Ocio</option>
                <option <?php if (isset($producto->categoria) && $producto->categoria=='Electrodomésticos') echo 'selected' ?> value="Electrodomésticos">Electrodomésticos</option>
              </select>
              <div class="invalid-feedback">
               Por favor seleccione una categoría válida
              </div>
            </div>
           

            <div class="col-6">
              <label for="precio" class="form-label">Precio </label>
              <input type="text" class="form-control" id="precio" name="precio" value="<?php if (isset($producto->precio)) { echo $producto->precio;} ?>">
              <div class="invalid-feedback">
              El campo precio es requerido.
              </div>
            </div>
            <div class="col-6">
              <label for="stock" class="form-label">Stock </label>
              <input type="text" class="form-control" id="stock" name="stock" value="<?php if (isset($producto->stock)) { echo $producto->stock;} ?>">
              <div class="invalid-feedback">
              El campo stock es requerido.
              </div>
            </div>

            
            

            

          
          </div>

     
           
          <button class="btn btn-warning" style="float: right; margin-top: 10px" type="submit"><span class="fa fa-save"></span> Guardar</button>
         
        </form>
      </div>
    </div>
  </main>

</div>