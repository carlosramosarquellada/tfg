
   
   
   
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
 $(document).delegate('.qty_select_up', 'click', function(){
	var item = $(this).attr('item');
    var qty = $(this).attr('qty');
    qty = parseInt(qty) +1;
	$.ajax({
        url : 'http://localhost/tfg/public/productos/update_carrito_ajax',
        type : 'POST',
        data : {
		
            'item':item,
            'qty':qty,
            
        },
       
        success:function(data){
            console.log(data);
            json=JSON.parse(data);
            $("main").html(json);
          



        }

    });
    })
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
    $(document).delegate('.qty_select_down', 'click', function(){
        var item = $(this).attr('item');
        var qty = $(this).attr('qty');
        qty = parseInt(qty) -1;
        $.ajax({
            url : 'http://localhost/tfg/public/productos/update_carrito_ajax',
            type : 'POST',
            data : {
            
                'item':item,
                'qty':qty,
                
            },
           
            success:function(data){
                console.log(data);
                json=JSON.parse(data);
                $("main").html(json);
              
    
    
    
            }
    
        })
    })
    $(document).delegate('#otra_direccion', 'change', function(){
        var dir = $('#otra_direccion :selected');
        var nombre = dir.attr('nombre');
        var numero = dir.attr('numero');
        var ciudad= dir.attr('ciudad');
        var codigo_postal = dir.attr('codigo_postal');
        var provincia = dir.attr('provincia');
        var pais= dir.attr('pais');
        $('#direccion').val(nombre);
        $('#numero').val(numero);
        $('#ciudad').val(ciudad);
        $('#codigo_postal').val(codigo_postal);
        $('#provincia').val(provincia);
        $('#pais').val(pais);


    })
    $(document).delegate('#transportista', 'change', function(){
        var transportista = $('#transportista :selected');
        
        var tasas=transportista.attr('tasas');
        $('.gastos_envio').html(tasas+'€');
        var total=$('.total').val();
        $('.total_con_envio').html(parseFloat(total)+parseFloat(tasas)+'€');
       


    })
   


