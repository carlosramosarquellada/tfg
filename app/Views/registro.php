<div class="container">
  <main>
    <div class="py-5 text-center">
      <h2>Registro</h2>
      <p class="lead">Complete el siguiente formulario para registrarse como usuario de nuestra tienda. Esperamos que le guste.</p>
    </div>

    <div class="row ">
     
      <div class="col-md-7 col-lg-8" style="margin:auto">
       
        <form class="needs-validation" method="post" >
          <div class="row g-3">
            <div class="col-sm-6">
              <label for="nombre" class="form-label">Nombre</label>
              <input type="text" class="form-control" id="nombre"name="nombre" required="">
              <div class="invalid-feedback">
                El campo Nombre es requerido.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="apellidos" class="form-label">Apellidos</label>
              <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="" required="">
              <div class="invalid-feedback">
              El campo Apellidos es requerido.
              </div>
            </div>

            <div class="col-6">
              <label for="username" class="form-label">Nombre de usuario</label>
              <div class="input-group has-validation">
                <input type="text" class="form-control" id="username" name="username" placeholder="" required="">
              <div class="invalid-feedback">
              El campo Nombre de usuario es requerido.
                </div>
              </div>
            </div>
            <div class="col-6">
              <label for="password" class="form-label">Contraseña</label>
              <div class="input-group has-validation">
                <input type="password" class="form-control" id="password" name="password" placeholder="" required="">
              <div class="invalid-feedback">
              El campo Contraseña es requerido.
                </div>
              </div>
            </div>

            <div class="col-6">
              <label for="email" class="form-label">Email </label>
              <input type="email" class="form-control" id="email" name="email" placeholder="">
              <div class="invalid-feedback">
              El campo Email es requerido.
              </div>
            </div>
            <div class="col-6">
              <label for="telefono" class="form-label">Teléfono </label>
              <input type="telefono" class="form-control" id="telefono" name="telefono" placeholder="">
              <div class="invalid-feedback">
              El campo telefono es requerido.
              </div>
            </div>

            <div class="col-10">
              <label for="direccion" class="form-label">Dirección</label>
              <input type="text" class="form-control" id="direccion" name="direccion" placeholder="" required="">
              <div class="invalid-feedback">
                El campo Dirección es requerido.
              </div>
            </div>
            <div class="col-sm-2">
              <label for="numero" class="form-label">Número</label>
              <input type="text" class="form-control" id="numero" name="numero" placeholder=""  required="">
              <div class="invalid-feedback">
                El campo Número es requerido.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label">Ciudad</label>
              <input type="text" class="form-control" id="ciudad" name="ciudad" placeholder="" required="">
              <div class="invalid-feedback">
              El campo Ciudad es requerido.
              </div>
            </div>
            <div class="col-md-6">
              <label for="codigo_postal" class="form-label">Código postal</label>
              <input type="text" class="form-control" id="codigo_postal" name="codigo_postal" placeholder="" required="">
              <div class="invalid-feedback">
                El campo Código postal es requerido.
              </div>
            </div>
            <div class="col-md-6">
              <label for="state" class="form-label">Provincia</label>
              <input type="text" class="form-control" id="provincia" name="provincia" placeholder="" required="">
              <div class="invalid-feedback">
              El campo Provincia es requerido.
              </div>
            </div>
            <div class="col-md-6">
              <label for="pais" class="form-label">País</label>
              <select class="form-select" id="pais" name="pais" required="">
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