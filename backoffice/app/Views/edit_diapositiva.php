<div class="container">
  <main>
    <div class="py-5">
      <?php if (isset($diapositiva->id)): ?>
        <h2>Editar diapositiva <?php echo $diapositiva->id ?></h2>
    
      <?php endif; ?>
     
    </div>

    <div class="row">
     
      <div class="col-md-7 col-lg-8" style="margin:auto">
       
        <form class="" method="post" enctype="multipart/form-data">
          <div class="row g-3">
          <div class="col-12">
              <label for="imagen" class="form-label">Imagen</label>
              <div class="input-group">
                <input type="file" class="form-control" id="imagen" name="imagen" value="<?php if(isset($diapositiva->imagen)){echo $diapositiva->imagen;}?>" >
              </div>
            </div>

         

            <div class="col-6">
              <label for="codigo_postal" class="form-label">Título</label>
              <input type="text" class="form-control" id="titulo" name="titulo" value="<?php if (isset($diapositiva->titulo)) { echo $diapositiva->titulo;} ?>">
             
            </div>
            <div class="col-6">
              <label for="subtitulo" class="form-label">Subtítulo</label>
              <input type="text" class="form-control" id="subtitulo" name="subtitulo" value="<?php if (isset($diapositiva->subtitulo)) { echo $diapositiva->subtitulo;} ?>">
            </div>
          
          </div>

     
           
          <button class="btn btn-warning" style="float: right; margin-top: 10px" type="submit"><span class="fa fa-save"></span> Guardar</button>
         
        </form>
      </div>
    </div>
  </main>

</div>