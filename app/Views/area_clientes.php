<?php $model = model(Usuarios_model::class); ?>
<div class="container">
    <h2 class="mt-3 mb-3">Área de clientes</h2>
    <main>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Mis datos</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Mis direcciones</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Mis pedidos</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="row mt-3">

                    <div class="col-md-7 col-lg-8" style="margin:auto">

                        <form class="needs-validation" method="post">
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <label for="nombre" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?php if (isset($cliente->nombre)) {
                                                                                                                    echo $cliente->nombre;
                                                                                                                } ?>" required="">
                                    <div class="invalid-feedback">
                                        El campo Nombre es requerido.
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label for="apellidos" class="form-label">Apellidos</label>
                                    <input type="text" class="form-control" id="apellidos" name="apellidos" value="<?php if (isset($cliente->apellidos)) {
                                                                                                                        echo $cliente->apellidos;
                                                                                                                    } ?>" required="">
                                    <div class="invalid-feedback">
                                        El campo Apellidos es requerido.
                                    </div>
                                </div>

                                <div class="col-6">
                                    <label for="username" class="form-label">Nombre de usuario</label>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control" id="username" name="username" value="<?php if (isset($cliente->username)) {
                                                                                                                            echo $cliente->username;
                                                                                                                        } ?>" required="">
                                        <div class="invalid-feedback">
                                            El campo Nombre de usuario es requerido.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label for="password" class="form-label">Contraseña</label>
                                    <div class="input-group has-validation">
                                        <input type="password" class="form-control" id="password" name="password" value="<?php if (isset($cliente->password)) {
                                                                                                                                echo $cliente->password;
                                                                                                                            } ?>" required="">
                                        <div class="invalid-feedback">
                                            El campo Contraseña es requerido.
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <label for="email" class="form-label">Email </label>
                                    <input type="email" class="form-control" id="email" name="email" value="<?php if (isset($cliente->email)) {
                                                                                                                echo $cliente->email;
                                                                                                            } ?>">
                                    <div class="invalid-feedback">
                                        El campo Email es requerido.
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label for="telefono" class="form-label">Teléfono </label>
                                    <input type="telefono" class="form-control" id="telefono" name="telefono" value="<?php if (isset($cliente->telefono)) {
                                                                                                                            echo $cliente->telefono;
                                                                                                                        } ?>">
                                    <div class="invalid-feedback">
                                        El campo telefono es requerido.
                                    </div>
                                </div>






                            </div>



                            <button class="btn btn-primary" style="float: right; margin-top: 10px" type="submit"><span class="fa fa-save"></span> Guardar</button>

                        </form>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <main role="main" class="col-md-9 ml-sm-auto col-lg-12 pt-3 px-4">

                    <div class="row">
                        <div class="col-md-9 ml-sm-auto col-lg-12 pt-3 px-4">
                        <a href="<?php echo base_url('nueva_direccion'); ?>" type="button" class="btn btn-primary mb-4">Añadir nueva dirección</a>                                                                                             

                            <div class="col-lg-12">
                                <?php foreach ($direcciones as $direccion) : ?>
                                    <div class="card shadow-sm  col-lg-3 p-0">
                                        <div class="card-body">

                                            <p class="card-text"><b>Dirección: </b><?php echo $direccion->nombre.' Nº'.$direccion->numero ?></p>
                                            <p class="card-text"><b>Código postal: </b><?php echo $direccion->codigo_postal ?>
                                            <p class="card-text"><b>Ciudad: </b><?php echo $direccion->ciudad ?></p>
                                            <p class="card-text"><b>Provincia: </b><?php echo $direccion->provincia ?></p>
                                            <p class="card-text"><b>País: </b><?php echo $direccion->pais ?></p>
                                            <a href="<?php echo base_url('edit_direccion/' . $direccion->id); ?>" type="button" class="btn btn-primary">Editar</a>

                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                <?php foreach ($pedidos as $pedido) : ?>

                    <?php $direccion = $model->get_direccion($pedido->direccion_id); ?>
                    <?php $lineas_pedido = $model->get_lineas_pedido($pedido->id); ?>
                    <div class="row mb-4 mt-4 separador_pedidos">
                        <h5 class="col-lg-3">Detalles del pedido</h5>
                        <h5 class="col-lg-7">Líneas del pedido</h5>

                        <div class="container col-lg-3 m-0">
                            <main>
                                <div class="col-lg-12">
                                    <div class="card shadow-sm p-0">
                                        <div class="card-body">
                                            <p class="card-text"><b>Dirección: </b><?php echo $direccion->nombre . ' Nº' . $direccion->numero . ', CP ' . $direccion->codigo_postal . ' ' . $direccion->ciudad . ' ,'
                                                                                        . $direccion->provincia . ' (' . $direccion->pais . ')' ?></p>
                                            <p class="card-text"><b>Estado: </b><?php echo $pedido->estado_pedido ?></p>
                                            <p class="card-text"><b>Total: </b><?php echo number_format($pedido->total, 2, ',', '.') ?> €</p>
                                        </div>
                                    </div>
                                </div>
                            </main>

                        </div>


                        <div class="container col-lg-7" style="margin-left:20px">
                            <main>

                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-sm">
                                            <thead>
                                                <tr>

                                                    <th>Producto</th>
                                                    <th>Cantidad</th>
                                                    <th>Precio</th>
                                                    <th>Total línea</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($lineas_pedido as $linea) : ?>
                                                    <tr>

                                                        <td>
                                                            <?php
                                                            $model = model(Usuarios_model::class);
                                                            $producto = $model->get_producto($linea->product_id);
                                                            echo $producto->nombre ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $linea->qty ?>
                                                        </td>
                                                        <td>
                                                            <?php echo number_format($linea->precio, 2, ',', '.') . '€'  ?>

                                                        </td>

                                                        <td>
                                                            <?php echo number_format($linea->qty * $linea->precio, 2, ',', '.') . '€'  ?>
                                                        </td>


                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </main>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>




    </main>

</div>