<!doctype html>
<?php $session =session(); ?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- JQUERY-->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"> </script>
   
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/css/theme.css">
   
   
    <script src="https://kit.fontawesome.com/04d48ad965.js" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>/js/js-module.js"></script>
    </head>
  <body>
<header class="bg-warning ">
  <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0  text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="<?php echo base_url();?>" class="nav-link nav-link-black px-2">Inicio</a></li>
          <li><a href="<?php echo base_url('clientes');?>" class="nav-link nav-link-black px-2 ">Clientes</a></li>
          
          <li><a href="<?php echo base_url('productos');?>" class="nav-link nav-link-black px-2 ">Productos</a></li>
          <li><a href="<?php echo base_url('pedidos');?>" class="nav-link nav-link-black px-2 ">Pedidos</a></li>
          <li><a href="<?php echo base_url('promociones');?>" class="nav-link nav-link-black px-2 ">Promociones</a></li>
          <li><a href="<?php echo base_url('transportistas');?>" class="nav-link nav-link-black px-2 ">Transportistas</a></li>
          <li><a href="<?php echo base_url('carrusel');?>" class="nav-link nav-link-black px-2 ">Carrusel</a></li>
         
        </ul>

        
    <?php if (!$session->has('admin')) :?>
      
    <?php else: ?>
      <?php echo 'Bienvenido, Administrador' ?>
      <!--
      <a href="<?php echo base_url('carrito');?>" type="button" class="btn btn-outline-light m-2"><span class="fa fa-shopping-cart"></span> Carrito</a>
    -->
      <a href="<?php echo base_url('logout');?>" type="button" class="btn btn-outline-dark m-2">Cerrar sesión</a>
      
    <?php endif ?>
        
      </div>
    </div>
    </header>