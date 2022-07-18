<div class="container">
  <main>
    <div class="py-5">
      <h2>Añadir nuevo producto</h2>
     
    </div>

    <div class="row g-5">
     
      <div class="col-md-7 col-lg-8" style="margin:auto">
       
        <form class="needs-validation" method="post" enctype="multipart/form-data">
          <div class="row g-3">
            <div class="col-sm-12">
              <label for="nombre" class="form-label">Nombre</label>
              <input type="text" class="form-control" id="nombre"name="nombre" required="">
              <div class="invalid-feedback">
                El campo Nombre es requerido.
              </div>
            </div>

            <div class="col-sm-12">
              <label for="descripcion" class="form-label">Descripción</label>
              <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="" required="">
              <div class="invalid-feedback">
              El campo descripcion es requerido.
              </div>
            </div>

            <div class="col-12">
              <label for="imagen" class="form-label">Imagen</label>
              <div class="input-group">
                <input type="file" class="form-control" id="imagen" name="imagen" placeholder="" >
              
              </div>
            </div>
            <div class="col-md-6">
              <label for="categoria" class="form-label">Categoría</label>
              <select class="form-select" id="categoria" name="categoria" required="">
                <option value="">Seleccione...</option>
                <option value="España">España</option>
                <option value="Portugal">Portugal</option>
                <option value="Francia">Francia</option>
                <option value="Italia">Italia</option>
                <option value="Alemania">Alemania</option>
                <option value="Reino Unido">Reino Unido</option>
                <option value="Grecia">Grecia</option>
                <option value="Bélgica">Bélgica</option>
                <option value="Turquía">Turquía</option>
              </select>
              <div class="invalid-feedback">
               Por favor seleccione una categoría válida
              </div>
            </div>
           

            <div class="col-6">
              <label for="precio" class="form-label">Precio </label>
              <input type="text" class="form-control" id="precio" name="precio" placeholder="">
              <div class="invalid-feedback">
              El campo precio es requerido.
              </div>
            </div>
            <div class="col-6">
              <label for="stock" class="form-label">Stock </label>
              <input type="text" class="form-control" id="stock" name="stock" placeholder="">
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