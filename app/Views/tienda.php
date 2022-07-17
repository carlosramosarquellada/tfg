<?php $session =session(); ?>
<main>
  <section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">مثال الألبوم</h1>
        <p class="lead text-muted">وصف قصير حول الألبوم أدناه (محتوياته ، ومنشؤه ، وما إلى ذلك). اجعله قصير ولطيف، ولكن ليست قصير جدًا حتى لا يتخطى الناس هذا الألبوم تمامًا.</p>
        <p>
          <a href="#" class="btn btn-primary my-2">الدعوة الرئيسية للعمل</a>
          <a href="#" class="btn btn-secondary my-2">عمل ثانوي</a>
        </p>
      </div>
    </div>
  </section>

  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <?php foreach($productos as $producto): ?>
        <div class="col">
          <div class="card shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: صورة مصغرة" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">صورة مصغرة</text></svg>

            <div class="card-body">
              <p class="card-text"><?php echo $producto->nombre ?></p>
              <p class="card-text"><?php echo number_format($producto->precio,2,',','.') ?> €</p>
              <?php if($session->has('username')) :?>
              <div class="d-flex justify-content-between align-items-center">
               
                  <button type="button" class="btn btn-sm btn-outline-secondary btn-carrito" id_product="<?php echo $producto->id ?>"><span class="fa fa-shopping-cart"></span> Añadir al carrito</button>
                  <div  id="container_select_uds_view_<?php echo $producto->id ?>" style="max-width:110px;">
                    <select id="select_qty_view_<?php echo $producto->id ?>" name="select_qty" class="select-uds" data-id="<?php echo $producto->id ?>" data-rowid="" style="top:0px;background-color:#fff;">
                        <option value="1">1 ud</option>
                        <option value="2">2 uds</option>
                        <option value="3">3 uds</option>
                        <option value="4">4 uds</option>
                        <option value="5">5 uds</option>
                        <option value="6">6 uds</option>
                        <option value="7">7 uds</option>
                        <option value="8">8 uds</option>
                        <option value="9">9 uds</option>
                        <option value="10">10 uds</option>
                    
                    </select>
                    <i class="arrow_select"></i>
			      	  </div>
                
                
              </div>
              <?php endif ?>
              <small class="text-muted">Quedan <?php echo $producto->stock ?> unidades</small>
            </div>
          </div>
        </div>
       <?php endforeach; ?>
      </div>
    </div>
  </div>

</main>