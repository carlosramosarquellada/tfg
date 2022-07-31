<div class="container">
  <main>
    <div class="py-5">
      <?php if (isset($transportista->id)): ?>
        <h2>Editar transportista <?php echo $transportista->nombre ?></h2>
      <?php else: ?>
        <h2>Añadir nuevo transportista</h2>
      <?php endif; ?>
     
    </div>

    <div class="row ">
     
      <div class="col-md-7 col-lg-8" style="margin:auto">
       
        <form class="needs-validation" method="post" enctype="multipart/form-data">
          <div class="row g-3">
            <div class="col-sm-12">
              <label for="nombre" class="form-label">Nombre</label>
              <input type="text" class="form-control" id="nombre"name="nombre"  value="<?php if(isset($transportista->nombre)){echo $transportista->nombre;} ?>" required="">
              <div class="invalid-feedback">
                El campo Nombre es requerido.
              </div>
            </div>

           
            <div class="col-6">
              <label for="tasas" class="form-label">Tasas (en €) </label>
              <input type="text" class="form-control" id="tasas" name="tasas" value="<?php if (isset($transportista->tasas)) { echo $transportista->tasas;} ?>">
              <div class="invalid-feedback">
              El campo unidades requeridas es requerido.
              </div>
            </div>
            <div class="col-6">
              <label for="tasas" class="form-label">Tiempo de entrega (días) </label>
              <input type="text" class="form-control" id="tiempo_envio" name="tiempo_envio" value="<?php if (isset($transportista->tiempo_envio)) { echo $transportista->tiempo_envio;} ?>">
              <div class="invalid-feedback">
              El campo unidades pagadas es requerido.
              </div>
            </div>
           
             
            

            

            
            

            

          
          </div>

     
           
          <button class="btn btn-warning" style="float: right; margin-top: 10px" type="submit"><span class="fa fa-save"></span> Guardar</button>
         
        </form>
      </div>
    </div>
  </main>

</div>