
  
    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2" class="active" aria-current="true"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3" class=""></button>
    </div>
    <div class="carousel-inner">
        <?php $active=0; ?>
        <?php foreach($carrusel as $diapositiva): ?>
        <div class="carousel-item <?php if ($active == 0){echo 'active'; $active=1;} ?>"> 
            <div class="container">
            <img class="img-carrusel-principal" src="<?php echo ('uploads/'.$diapositiva->imagen) ?>">
            <div class="carousel-caption text-start">
                <h1 class="strokeme"><?php echo $diapositiva->titulo ?></h1>
                <p class="strokeme"><?php echo $diapositiva->subtitulo ?></p>
    
            </div>
            </div>
        </div>
      <?php endforeach; ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.js"></script>
<div class="bbb_viewed">
    <div class="container">
        <div class="row">
            <div class="col">
               <div class="bbb_main_container">
                <div class="bbb_viewed_title_container">
                    <h3 class="bbb_viewed_title">Más vendidos</h3>
                    <div class="bbb_viewed_nav_container">
                        <div class="bbb_viewed_nav bbb_viewed_prev"><i class="fas fa-chevron-left"></i></div>
                        <div class="bbb_viewed_nav bbb_viewed_next"><i class="fas fa-chevron-right"></i></div>
                    </div>
                </div>
                <div class="bbb_viewed_slider_container">
                    <div class="owl-carousel owl-theme bbb_viewed_slider">
                        <?php foreach ($productos_mas_vendidos as $producto):  ?>
                        <div class="owl-item">
                            <div class="bbb_viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                <div class="bbb_viewed_image">
                                    <img  src="<?php echo ('uploads/'.$producto->imagen) ?>" alt=""></div>
                                <div class="bbb_viewed_content text-center">
                                    <div class="bbb_viewed_price"><?php echo number_format($producto->precio,2,',','.').'€' ?></div>
                                    <div class="bbb_viewed_name"><a href="#"><?php echo $producto->nombre ?></a></div>
                                </div>
                                <!--
                                <ul class="item_marks">
                                    <li class="item_mark item_discount">-25%</li>
                                    <li class="item_mark item_new">new</li>
                                </ul>
                                -->
                            </div>
                        </div>
                        <?php endforeach ?>
                    </div>
                </div>
               </div> 
            </div>
        </div>
    </div>
</div>
   


