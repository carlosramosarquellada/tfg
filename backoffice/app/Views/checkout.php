
    

  <main>
  <div class="container" style="margin-top: 40px;"> 
    <form method="post" action="<?php echo base_url('pedido_realizado');  ?>" enctype="multipart/form-data" class="needs-validation" novalidate="" >
    <div class="row ">
      <div class="col-md-5 col-lg-4 order-md-last">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-primary">Su pedido</span>
          <span class="badge bg-primary rounded-pill"><?php echo count($carrito) ?></span>
        </h4>
        <ul class="list-group mb-3">
        <?php foreach($carrito as $item) :?>
            <?php  $model = model(Productos_model::class);
                            $product= $model->get_product($item->product_id)?>
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0"><?php echo $product->nombre ?></h6>
             
            </div>
            <span class="text-muted"><?php echo number_format(($product->precio*$item->qty),2,',','.').'€' ?></span>
          </li>
         <?php endforeach;?>
         <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0"><?php echo 'Gastos de envío' ?></h6>
             
            </div>
            <span class="text-muted"><?php echo number_format((5),2,',','.').'€' ?></span>
          </li>
          <li class="list-group-item d-flex justify-content-between">
            <span>TOTAL </span>
            <strong><?php echo number_format($total + $gastos_envio,2,',','.').'€' ?></strong>
          </li>
        </ul>
        <button class="w-100 btn btn-primary btn-lg" type="submit">Tramitar pedido</button>
       
      </div>
      <div class="col-md-7 col-lg-8">
        <h2 class="mb-3">Datos de facturación</h2>
            
          <div class="row g-3">
            <div class="col-sm-6">
              <label for="firstName" class="form-label">Nombre</label>
              <input type="text" class="form-control" id="nombre" name="nombre"   value="<?php echo $_SESSION['nombre']; ?>" required="">
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label">Apellidos</label>
              <input type="text" class="form-control" id="apellidos" name="apellidos" value="<?php echo $_SESSION['apellidos']; ?>" required="">
              <div class="invalid-feedback">
                Valid last name is required.
              </div>
            </div>

            
            <input type="hidden" class="form-control" id="email" name="email" value="<?php echo $_SESSION['email']; ?>" >
            <div class="col-sm-6">
              <label for="email" class="form-label">Email </label>
              <input type="email" class="form-control" id="email" name="email" value="<?php echo $_SESSION['email']; ?>" >
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>
            <div class="col-sm-6">
              <label for="email" class="form-label">Teléfono </label>
              <input type="email" class="form-control"  name="telefono" value="<?php echo $_SESSION['telefono']; ?>" id="telefono" >
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>

            <div class="col-11">
              <label for="address" class="form-label">Dirección</label>
              <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo $direcciones[0]->nombre ?>" required="">
              <div class="invalid-feedback">
                Please enter your shipping address.
              </div>
            </div>
            <div class="col-1">
              <label for="address" class="form-label">Número</label>
              <input type="text" class="form-control" id="numero" name="numero"  value="<?php echo $direcciones[0]->numero?>" required="">
              <div class="invalid-feedback">
                Please enter your shipping address.
              </div>
            </div>
            <div class="col-md-6">
              <label for="state" class="form-label">Ciudad</label>
              <input type="text" class="form-control" id="ciudad" name="ciudad"  value="<?php echo $direcciones[0]->ciudad ?>" required="">
              <div class="invalid-feedback">
                Please provide a valid state.
              </div>
            </div>
            <div class="col-md-6">
              <label for="zip" class="form-label">Zip</label>
              <input type="text" class="form-control" id="codigo_postal" name="codigo_postal"  value="<?php echo $direcciones[0]->codigo_postal ?>" required="">
              <div class="invalid-feedback">
                Zip code required.
              </div>
            </div>
            <div class="col-md-6">
              <label for="state" class="form-label">Provincia</label>
              <input type="text" class="form-control" id="provincia" name="provincia"   value="<?php echo $direcciones[0]->provincia ?>"  required="">
              <div class="invalid-feedback">
                Please provide a valid state.
              </div>
            </div>
            <div class="col-md-6">
              <label for="country" class="form-label">País</label>
              <input type="text" class="form-control" id="pais" name="pais"  value="<?php echo $direcciones[0]->pais ?>" required="">
              <div class="invalid-feedback">
                Please select a valid country.
              </div>
            </div>
          </div>
          <h2 class="mb-3">Otras direcciones de envío</h2>
          <select class="form-control" id="otra_direccion" name="id_direccion">
            <?php foreach ($direcciones as $direccion):?>
                <option value="<?php echo $direccion->id; ?>"
                 nombre="<?php echo $direccion->nombre;?>"
                  numero="<?php echo $direccion->numero;?>"
                  codigo_postal="<?php echo $direccion->codigo_postal ?>"
                  ciudad="<?php echo $direccion->ciudad;?>"
                  provincia="<?php echo $direccion->provincia;?>"
                  pais="<?php echo $direccion->pais;?>"
                ><?php echo $direccion->nombre.' Nº'.$direccion->numero.', CP '.$direccion->codigo_postal.' '.$direccion->ciudad.' ,'
                    .$direccion->provincia. ' ('.$direccion->pais.')'?> </option>
            <?php endforeach; ?>



      </div>
    </div>
            </form>
    </div>
  </main>




    <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

      <script src="form-validation.js"></script>
  

