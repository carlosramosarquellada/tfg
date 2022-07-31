<div class="container">
  <main>
    <div class="py-5">
      <?php if (isset($promocion->id)): ?>
        <h2>Editar promocion <?php echo $promocion->nombre ?></h2>
      <?php else: ?>
        <h2>Añadir nueva promoción</h2>
      <?php endif; ?>
     
    </div>

    <div class="row ">
     
      <div class="col-md-7 col-lg-8" style="margin:auto">
       
        <form class="needs-validation" method="post" enctype="multipart/form-data">
          <div class="row g-3">
            <div class="col-sm-12">
              <label for="nombre" class="form-label">Nombre</label>
              <input type="text" class="form-control" id="nombre"name="nombre"  value="<?php if(isset($promocion->nombre)){echo $promocion->nombre;} ?>" required="">
              <div class="invalid-feedback">
                El campo Nombre es requerido.
              </div>
            </div>

            <div class="col-md-6">
              <label for="tipo" class="form-label">Tipo</label>
              <select class="form-select" id="tipo" name="tipo" required="">
                <option value="">Seleccione...</option>
                <option <?php if (isset($promocion->tipo) && $promocion->tipo=='Descuento') echo 'selected' ?> value="Descuento">Descuento</option>
                <option <?php if (isset($promocion->tipo) && $promocion->tipo=='Unidades') echo 'selected' ?> value="Unidades">Unidades</option>
                
              </select>
              <div class="invalid-feedback">
               Por favor seleccione untipo  válido
              </div>
            </div>
            <div class="col-md-6">
              <label for="producto" class="form-label">Producto</label>
              <select class="form-select" id="product_id" name="product_id" required="">
                <option value="">Seleccione...</option>
                <?php foreach($productos as $producto ): ?>
                <option <?php if( $producto->id==$promocion->product_id) echo 'selected' ?> value="<?php echo $producto->id ?>"><?php echo $producto->nombre ?></option>
               <?php endforeach ?>
              </select>
              <div class="invalid-feedback">
               Por favor seleccione un producto válido
              </div>
            </div>
           <small>Solo requerido para  promociones por unidades</small>

            <div class="col-6">
              <label for="unidades_requeridas" class="form-label">Unidades requeridas </label>
              <input type="text" class="form-control" id="unidades_requeridas" name="unidades_requeridas" value="<?php if (isset($promocion->unidades_requeridas)) { echo $promocion->unidades_requeridas;} ?>">
              <div class="invalid-feedback">
              El campo unidades requeridas es requerido.
              </div>
            </div>
            <div class="col-6">
              <label for="unidades_requeridas" class="form-label">Unidades pagadas </label>
              <input type="text" class="form-control" id="unidades_pagadas" name="unidades_pagadas" value="<?php if (isset($promocion->unidades_pagadas)) { echo $promocion->unidades_pagadas;} ?>">
              <div class="invalid-feedback">
              El campo unidades pagadas es requerido.
              </div>
            </div>
            <small>Solo requerido para  promociones por descuento</small>
            <div class="col-6">
              <label for="unidades_requeridas" class="form-label">Descuento (en %)</label>
              <input type="text" class="form-control" id="descuento" name="descuento" value="<?php if (isset($promocion->descuento)) { echo $promocion->descuento;} ?>">
             
              <div class="invalid-feedback">
              El campo descuento es requerido.
              </div>
             
            </div>

            

            
            

            

          
          </div>

     
           
          <button class="btn btn-warning" style="float: right; margin-top: 10px" type="submit"><span class="fa fa-save"></span> Guardar</button>
         
        </form>
      </div>
    </div>
  </main>

</div>