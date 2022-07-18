<main>
<div class="album py-5 bg-light">    
    <section class="px-4 py-5 w-100" style=" border-radius: .5rem .5rem 0 0;">
      <div class="row">
        <div class="col-12">
          <div class="container">
            <div class="card-body p-0">
              <div class="row g-0">
                <div class="col-lg-8">
                  <div class="p-5">
                    <div class="d-flex justify-content-between align-items-center mb-5">
                      <h1 class="fw-bold mb-0 text-black">Carrito</h1>
                      <h6 class="mb-0 text-muted"><?php echo count($carrito).' artículos' ?></h6>
                    </div>
                    <hr class="my-4">
                    <?php foreach($carrito as $item): ?>
                    <?php  $model = model(Productos_model::class);
                            $product= $model->get_product($item->product_id)?>
                    <div class="row mb-4 d-flex justify-content-between align-items-center">
                      <div class="col-md-2 col-lg-2 col-xl-2">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-shopping-carts/img5.webp" class="img-fluid rounded-3" alt="Cotton T-shirt">
                      </div>
                      <div class="col-md-3 col-lg-3 col-xl-3">
                      
                        <h6 class="text-black mb-0"><?php echo $product->nombre ?></h6>
                      </div>
                      <div class="col-md-3 col-lg-3 col-xl-3 d-flex">
                        <button class="btn btn-link px-2  qty_select_down"  item="<?php echo $item->id?>" qty="<?php echo $item->qty ?>">
                          <i class="fas fa-minus"></i>
                        </button>

                        <input id="form1" min="0" name="quantity" value="<?php echo $item->qty ?>" type="text" readonly="readonly" class="form-control form-control-sm">

                        <button class="btn btn-link px-2 qty_select_up" item="<?php echo $item->id?>" qty="<?php echo $item->qty ?>" >
                          <i class="fas fa-plus"></i>
                        </button>
                      </div>
                      <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                        <h6 class="mb-0"> <?php echo number_format(($product->precio*$item->qty),2,',','.').'€' ?></h6>
                      </div>
                     
                    </div>

                    <hr class="my-4">
                    <?php endforeach; ?>

                 

                  

                    <div class="pt-5">
                      <h6 class="mb-0"><a href="#!" class="text-body"><i class="fas fa-long-arrow-alt-left me-2"></i>Volver a la tienda</a></h6>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 bg-grey">
                  <div class="p-5">
                    <h3 class="fw-bold mb-5 mt-2 pt-1">Resumen</h3>
                    <hr class="my-4">

                    <div class="d-flex justify-content-between mb-4">
                      <h5 class="text-uppercase">Productos</h5>
                      <h5><?php echo number_format($total,2,',','.').' €' ?></h5>
                    </div>
                    <div class="d-flex justify-content-between mb-4">
                      <h5 class="text-uppercase">Gastos de envío</h5>
                      <h5><?php echo number_format($gastos_envio,2,',','.').' €' ?></h5>
                    </div>
                   



                 
                    <hr class="my-4">

                    <div class="d-flex justify-content-between mb-5">
                      <h5 class="text-uppercase">Total</h5>
                      <h5><?php echo number_format($total + $gastos_envio,2,',','.').' €' ?></h5>
                    </div>

                    <a href="<?php echo base_url('checkout') ?>" type="button" class="btn btn-dark btn-block btn-lg" data-mdb-ripple-color="dark">Tramitar</a>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
   
    
    
  </div>
</main>