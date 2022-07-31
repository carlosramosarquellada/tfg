<div class="container">
  <main>
    <div class="py-5">
      <?php if (isset($direccion->id)): ?>
        <h2>Editar direccion <?php echo $direccion->nombre ?></h2>
      <?php else: ?>
        <h2>Añadir nuevo direccion</h2>
      <?php endif; ?>
     
    </div>

    <div class="row ">
     
      <div class="col-md-7 col-lg-8" style="margin:auto">
       
        <form class="needs-validation" method="post" enctype="multipart/form-data">
          <div class="row g-3">
            <div class="col-sm-11">
              <label for="nombre" class="form-label">Dirección</label>
              <input type="text" class="form-control" id="nombre"name="nombre"  value="<?php if(isset($direccion->nombre)){echo $direccion->nombre;} ?>" required="">
              <div class="invalid-feedback">
                El campo Nombre es requerido.
              </div>
            </div>

            <div class="col-sm-1">
              <label for="numero" class="form-label">Número</label>
              <input type="text" class="form-control" id="numero" name="numero" value="<?php if(isset($direccion->numero)){echo $direccion->numero;} ?>" required="">
              <div class="invalid-feedback">
              El campo numero es requerido.
              </div>
            </div>

         

            <div class="col-6">
              <label for="codigo_postal" class="form-label">Código postal </label>
              <input type="text" class="form-control" id="codigo_postal" name="codigo_postal" value="<?php if (isset($direccion->codigo_postal)) { echo $direccion->codigo_postal;} ?>">
              <div class="invalid-feedback">
              El campo Codigo postal es requerido.
              </div>
            </div>
            <div class="col-6">
              <label for="ciudad" class="form-label">Ciudad</label>
              <input type="text" class="form-control" id="ciudad" name="ciudad" value="<?php if (isset($direccion->ciudad)) { echo $direccion->ciudad;} ?>">
              <div class="invalid-feedback">
              El campo ciudad es requerido.
              </div>
            </div>

            <div class="col-6">
              <label for="provincia" class="form-label">Provincia</label>
              <input type="text" class="form-control" id="provincia" name="provincia" value="<?php if (isset($direccion->provincia)) { echo $direccion->provincia;} ?>">
              <div class="invalid-feedback">
              El campo provincia es requerido.
              </div>
            </div>
            <div class="col-md-6">
              <label for="pais" class="form-label">País</label>
              <select class="form-select" id="pais" name="pais" required="">
                <option value="">Seleccione...</option>
                <option <?php if($direccion->pais=='España') echo 'selected' ?> value="España">España</option>
                <option <?php if($direccion->pais=='Portugal') echo 'selected' ?> value="Portugal">Portugal</option>
                <option <?php if($direccion->pais=='Francia') echo 'selected' ?> value="Francia">Francia</option>
                <option <?php if($direccion->pais=='Italia') echo 'selected' ?> value="Italia">Italia</option>
                <option <?php if($direccion->pais=='Alemania') echo 'selected' ?> value="Alemania">Alemania</option>
                <option <?php if($direccion->pais=='Reino Unido') echo 'selected' ?> value="Reino Unido">Reino Unido</option>
                <option <?php if($direccion->pais=='Grecia') echo 'selected' ?> value="Grecia">Grecia</option>
                <option <?php if($direccion->pais=='Bélgica') echo 'selected' ?> value="Bélgica">Bélgica</option>
                <option <?php if($direccion->pais=='Turquía') echo 'selected' ?> value="Turquía">Turquía</option>
              </select>
              <div class="invalid-feedback">
               Por favor seleccione un país válido
              </div>
            </div>

            

            

          
          </div>

     
           
          <button class="btn btn-primary" style="float: right; margin-top: 10px" type="submit"><span class="fa fa-save"></span> Guardar</button>
         
        </form>
      </div>
    </div>
  </main>

</div>