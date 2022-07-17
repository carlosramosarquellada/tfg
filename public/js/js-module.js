
   
   
   
$(document).ready(function()
 {
   if($('.bbb_viewed_slider').length)
   {
       var viewedSlider = $('.bbb_viewed_slider');

       viewedSlider.owlCarousel(
       {
           loop:true,
           margin:30,
           autoplay:true,
           autoplayTimeout:6000,
           nav:false,
           dots:false,
           responsive:
           {
               0:{items:1},
               575:{items:2},
               768:{items:3},
               991:{items:4},
               1199:{items:6}
           }
       });

       if($('.bbb_viewed_prev').length)
       {
           var prev = $('.bbb_viewed_prev');
           prev.on('click', function()
           {
               viewedSlider.trigger('prev.owl.carousel');
           });
       }

       if($('.bbb_viewed_next').length)
       {
           var next = $('.bbb_viewed_next');
           next.on('click', function()
           {
               viewedSlider.trigger('next.owl.carousel');
           });
       }
   }


 });
 $(document).delegate('.btn-carrito', 'click', function(){
	var id_product = $(this).attr('id_product');

	var qty = $('#select_qty_view_'+id_product).val();
	$.ajax({
        url : 'http://localhost/tfg/public/productos/add_carrito_ajax',
        type : 'POST',
        data : {
		
            'id_product':id_product,
            'qty':qty,
            
        },
        dataType : 'json',
        success:function(data){
            $('#modal_add_carrito').modal('show');
            $('#modal_add_carrito').delay(1000).fadeOut(450);

            setTimeout(function(){
              $('#modal_add_carrito').modal("hide");
            }, 1500);



        }

    })
	
   
})

