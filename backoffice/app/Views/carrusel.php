<main role="main" class="col-md-9 ml-sm-auto col-lg-12 pt-3 px-4">

    <div class="row">
        <div class="col-md-9 ml-sm-auto col-lg-12 pt-3 px-4">
            <div class="py-5">  
                <h2>Configurar carrusel de Home 
                    <a href="<?php echo base_url('carrusel/add_diapositiva');?>" class="btn  btn-warning nueva_diapositiva" type="button">Añadir nueva diapositiva</a>
                </h2>
            </div>

            <div class="col-lg-12">
                <?php foreach ($carrusel as $diapositiva) : ?>
                    <div class="card shadow-sm p-0">
                        <div class="card-body">
                        <div class="text-center">
                            <img   src="<?php echo ('http://localhost/tfg/public/uploads/'.$diapositiva->imagen) ?>" width="200px" height="200px">
                         </div>
                            <p class="card-text"><b>Imagen: </b><?php echo $diapositiva->imagen ?></p>
                            <p class="card-text"><b>Título: </b><?php echo $diapositiva->titulo ?>
                            <p class="card-text"><b>Subtítulo: </b><?php echo $diapositiva->subtitulo ?></p>
                            <a href="<?php echo base_url('carrusel/edit/'.$diapositiva->id); ?>" type="button" class="btn btn-warning">Editar</a>
                            <a href="<?php echo base_url('carrusel/delete/'.$diapositiva->id); ?>" type="button" class="btn btn-danger">Eliminar</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</main>