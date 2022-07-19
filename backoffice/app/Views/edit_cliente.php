<div class="container">
  <main>
    <div class="py-5">
      <?php if (isset($cliente->id)): ?>
        <h2>Editar cliente <?php echo $cliente->nombre ?></h2>
      <?php else: ?>
        <h2>Añadir nuevo cliente</h2>
      <?php endif; ?>
     
    </div>

    <div class="row ">
     
      <div class="col-md-7 col-lg-8" style="margin:auto">
       
        <form class="needs-validation" method="post" enctype="multipart/form-data">
          <div class="row g-3">
            <div class="col-sm-12">
              <label for="nombre" class="form-label">Nombre</label>
              <input type="text" class="form-control" id="nombre"name="nombre"  value="<?php if(isset($cliente->nombre)){echo $cliente->nombre;} ?>" required="">
              <div class="invalid-feedback">
                El campo Nombre es requerido.
              </div>
            </div>

            <div class="col-sm-12">
              <label for="apellidos" class="form-label">Apellidos</label>
              <input type="text" class="form-control" id="apellidos" name="apellidos" value="<?php if(isset($cliente->apellidos)){echo $cliente->apellidos;} ?>" required="">
              <div class="invalid-feedback">
              El campo apellidos es requerido.
              </div>
            </div>

         

            <div class="col-6">
              <label for="email" class="form-label">Email </label>
              <input type="text" class="form-control" id="email" name="email" value="<?php if (isset($cliente->email)) { echo $cliente->email;} ?>">
              <div class="invalid-feedback">
              El campo email es requerido.
              </div>
            </div>
            <div class="col-6">
              <label for="telefono" class="form-label">Teléfono </label>
              <input type="text" class="form-control" id="telefono" name="telefono" value="<?php if (isset($cliente->telefono)) { echo $cliente->telefono;} ?>">
              <div class="invalid-feedback">
              El campo telefono es requerido.
              </div>
            </div>

            
            

            

          
          </div>

     
           
          <button class="btn btn-warning" style="float: right; margin-top: 10px" type="submit"><span class="fa fa-save"></span> Guardar</button>
         
        </form>
      </div>
    </div>
  </main>

</div>