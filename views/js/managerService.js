/*=============================================
CARGAR LA TABLA DINÁMICA DE SUBCATEGORÍAS
=============================================*/


$.ajax({

 	url:"ajax/tableService.ajax.php",

 	success:function(respuesta){
		
		//console.log("respuesta", respuesta);

 	}

});


$(".tablaServicios").DataTable({

    "ajax": "ajax/tableService.ajax.php",
    "deferRender":true,
    "retrieve": true,
    "processing":true,
    "lengthMenu":[[4, 5, 10, 20, 25, 50, -1], [4, 5, 10, 20, 25, 50, "Todos"]],
    "iDisplayLength": 4,
    "language": {

        "sProcessing":     "Procesando...",
       "sLengthMenu":     "Mostrar _MENU_ registros",
       "sZeroRecords":    "No se encontraron resultados",
       "sEmptyTable":     "Ningún dato disponible en esta tabla",
       "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
       "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
       "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
       "sInfoPostFix":    "",
       "sSearch":         "Buscar:",
       "sUrl":            "",
       "sInfoThousands":  ",",
       "sLoadingRecords": "Cargando...",
       "oPaginate": {
           "sFirst":    "Primero",
           "sLast":     "Último",
           "sNext":     "Siguiente",
           "sPrevious": "Anterior"
       },
       "oAria": {
               "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
               "sSortDescending": ": Activar para ordenar la columna de manera descendente"
       }

    }

});

/*=============================================
Busca el servicio para la ediciòn
=============================================*/

$(".tablaServicios").on('click', '.btnEditService', function(event) {

    var idCategory = $(this).attr("idService");
    console.log('Línea 63. idCategory => ', idCategory);
    
    var datos = new FormData();
	datos.append("idCategory", idCategory);

    $.ajax({

		url:"ajax/blocks.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
    })
    .done(function(respuesta) {

        console.log('Línea 80. respuesta => ', respuesta);

        $("#modalEditService .idServicio").val(respuesta[0]["id"]);

        $("#modalEditService .titulo").val(respuesta[0]["title"]);

        $("#modalEditService #description").val(respuesta[0]["short_Description"]);

        $("#modalEditService .previsualizarImagen").attr("src", respuesta[0]["img"]);
        
        $("#modalEditService .antiguaFotoPortada").val(respuesta[0]["img"]);





    })

});


/*=============================================
=            Modal Agrega un Servicio         =
=============================================*/
$("#modalAddService").on('click', '.guardarServicio', function(event){


    /*=============================================
    PREGUNTAMOS SI LOS CAMPOS OBLIGATORIOS ESTÁN LLENOS
    =============================================*/
    if(  $("#modalAddService .titulo").val() != "" && 
         $("#modalAddService #description").val() != ""
        
    ){
        
            var title = $("#modalAddService .titulo").val();
            var short_Description = $("#modalAddService #description").val();
            var type ="service"; 

            console.log(title);
            console.log(short_Description);
            console.log(type);


            var datos = new FormData();
            datos.append("title", title);
            datos.append("short_Description", short_Description);
            datos.append("type", type);
            datos.append("img", imagen);

            $.ajax({
                url:"ajax/blocks.ajax.php",
                method: "POST",
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
            })
            .done(function(respuesta) {

                console.log('Línea 483. respuesta => ', respuesta);
                if(respuesta == "ok"){


                    Swal.fire({
                        title: 'Guardado!',
                        text: 'El servicio se ha agregado correctamente',
                        icon: 'success',
                        confirmButtonText: '¡Cerrar!'
                    }).then(function(result){
                          
                        if (result.value) {
        
                           window.location = window.location.href;
            
                        }
                    })
                   
                }


            })
            .fail(function() {
                console.log("error");
        
                Swal.fire({
                    title: 'Error al guardar!',
                    text: '¡Hubo problemas al guardar!',
                    icon: 'error',
                    confirmButtonText: '¡Cerrar!'
                  })
            });




    }else{

        Swal.fire({
			title: 'Error al guardar!',
			text: 'Debe ingresar el Titulo y/o la descripción',
			icon: 'error',
			confirmButtonText: '¡Cerrar!'
		  });
        

    }






});


/*=============================================
=           Modal Guarda cambios         =
=============================================*/

$("#modalEditService").on('click', '.guardarCambiosServicio', function(event){



     /*=============================================
    PREGUNTAMOS SI LOS CAMPOS OBLIGATORIOS ESTÁN LLENOS
    =============================================*/
    if(  $("#modalEditService .titulo").val() != "" && 
         $("#modalEditService #description").val() != ""
        
    ){  
        
        var id = $(".idServicio").val();
        var title = $("#modalEditService .titulo").val();
        var short_Description = $("#modalEditService #description").val();
        var type ="service"; 
        var imgOld =  $("#modalEditService .antiguaFotoPortada").val();

        console.log(title);
        console.log(short_Description);
        console.log(id);
        console.log(imgOld);



        var datos = new FormData();
        datos.append("title", title);
        datos.append("short_Descrip", short_Description);
        datos.append("id_categotyEdit", id);
        datos.append("type", type);
        datos.append("imgOld", imgOld);
        datos.append("img", imagen);

        $.ajax({
            url:"ajax/blocks.ajax.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
        })
        .done(function(respuesta) {

            console.log('Línea 243. respuesta => ', respuesta);
     
            if(respuesta == "ok"){


                Swal.fire({
                    title: 'Guardado!',
                    text: 'El servicio se ha agregado correctamente',
                    icon: 'success',
                    confirmButtonText: '¡Cerrar!'
                }).then(function(result){
                                         
                    if (result.value) {
    
                       window.location = window.location.href;
        
                    }
                })
               
            }


        })
        .fail(function() {
            console.log("error");
    
            Swal.fire({
                title: 'Error al guardar!',
                text: '¡Hubo problemas al guardar!',
                icon: 'error',
                confirmButtonText: '¡Cerrar!'
              })
        });

        


    }else{

        Swal.fire({
			title: 'Error al guardar!',
			text: 'Debe ingresar el Titulo y/o la descripción',
			icon: 'error',
			confirmButtonText: '¡Cerrar!'
		  });
        

    }



});

/*=============================================
=          Eliminar un servicio         =
=============================================*/
$(".tablaServicios").on('click', '.btnDeleteService', function(event){

       

        var idCatDelete = $(this).attr("idservice");
        var imgPrincipal = $(this).attr("img");

        console.log(idCatDelete);

        Swal.fire({
            title: '¿Está seguro de borrar el Servicio?',
            text: '¡Si no lo está puede cancelar la accíón!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Si, borrar Servicio!'
        }).then(function(result){
              
            if (result.value) {

                var datos = new FormData();
                datos.append('idCatDelete', idCatDelete);
                datos.append('imgPrincipal', imgPrincipal);
                $.ajax({
                    url:"ajax/blocks.ajax.php",
                    method: "POST",
                    data: datos,
                    cache: false,
                    contentType: false,
                    processData: false,
                })
                .done(function(respuesta) {

                    console.log('Línea 243. respuesta => ', respuesta);
                    if(respuesta == "ok"){
                        Swal.fire({
                            title: "Borrado!",
                            text: "El servicio se ha sido borrado correctamente!",
                            icon: "success",
                            confirmButtonText: "¡Cerrar!"
                        }).then(function(result){
                            
                            if (result.value) {
            
                                window.location = window.location.href;
                
                            }
                        })
    

                    }        
                })
                .fail(function() {
                    console.log("error");
            
                    Swal.fire({
                        title: 'Error al borrar!',
                        text: '¡Hubo problemas al borrar!',
                        icon: 'error',
                        confirmButtonText: '¡Cerrar!'
                      })
                });
        
            }
        })

       



});



/*=============================================
=            Actualiza la Imagen         =
=============================================*/
var imagen = null;

$(".subirImagen").change(function(){



    imagen = this.files[0];

  

    /*==============================================================
	=    VALIDAMOS EL FORMATO  DE LA IMAGE SEA JPG O PNG	     =
	===============================================================*/

	if(imagen["type"] !="image/jpeg" && imagen["type"] !="image/png"){

		  $(".subirImagen").val("");

      Swal.fire({

        title: "Error al subir la imagen",
        text : "¡La imagen debe estar en formato JPG o PNG",
        icon : "error",
        confirmButtonText: "¡Cerrar!"

      });

      /*==============================================================
      =    VALIDAMOS EL TAMAÑO  DE LA IMAGE      =
      ===============================================================*/
  }else if(imagen["size"]> 2000000){

		$(".subirImagen").val("");

		

		Swal.fire({

			title: "Error al subir la imagen",
			text : "¡La imagen no debe pesar más de 2MB!",
			icon : "error",
			confirmButtonText: "¡Cerrar!"

        });
  
  }else{  


          /*==============================================================
          =    PREVISUALIZAMOS LA IMAGE    =
          ===============================================================*/

          var datosImagen = new FileReader;

          datosImagen.readAsDataURL(imagen);

          $(datosImagen).on('load', function(event) {
                  
          var rutaImagen = event.target.result;

          //console.log(rutaImagen);

          $(".previsualizarImagen").attr('src', rutaImagen);
      
      

  });


  }   





});


/*=============================================
=        Actualiza el switch Publicar         =
=============================================*/

$("#formServices #switchPublic").change(function(){

    /* Video checked */
	  var switchChecked = $(this).is(':checked');

    console.log("publcar", switchChecked);

    if(switchChecked){

      $(".guardaConfigBlock").attr('published', 1);

    }else{

      $(".guardaConfigBlock").attr('published', 0);

    }


});

/*=============================================
=            Actualiza el titulo          =
=============================================*/
$("#formServices .cambioTitle").change(function(){

  


	var title = $(this).val();

	$(".guardaConfigBlock").attr('title', title);

	$(".titleBlock").html(title);


});

/*=============================================
=     Actualiza el titulo de Barra de navegaciòn       =
=============================================*/
$("#formServices .cambioTitleNavbar").change(function(event) {

  

	var navbarTitle = $(this).val();

    $(".guardaConfigBlock").attr('navbar_title', navbarTitle);
  
 

});


/*==========================================================
=            configura <!-- Color Picker -->         =
=============================================================*/

//color picker with addon inicializa el datapicker

$('.my-colorpicker').colorpicker();

$('#formServices #fondoColor').on('colorpickerChange', function(event) {
	
	$('#fondoColor .fa-square').css('color', event.color.toString());
	
	var color = event.color.toString();

	$(".guardaConfigBlock").attr('backgroundcolor', color);

	$("#fondoBlock").css('background', color); 


	
	     
});

/*=============================================
=      Despliega las pre-visualzacion        =
=============================================*/

$("#formServices #radioGrilla").change(function(){

	
	// valida si esta chequeado
	var checkboxChecked = $(this).is(':checked');


	if(checkboxChecked){

		$("#servCard").show();
		$("#servCardDark").hide();
		$("#carousel-example").hide();

		$(".guardaConfigBlock").attr("route", $("#radioGrilla").val());
	}
	
});

$("#formServices #radioCarrucel").change(function(){

	
	// valida si esta chequeado
	var checkboxChecked = $(this).is(':checked');


	if(checkboxChecked){

		$("#servCard").hide();
		$("#servCardDark").hide();
		$("#carousel-example").show();

		$(".guardaConfigBlock").attr("route", $("#radioCarrucel").val());
	}
	
});
$("#formServices #radioCarrucel2").change(function(){

	
	// valida si esta chequeado
	var checkboxChecked = $(this).is(':checked');


	if(checkboxChecked){

		$("#servCard").hide();
		$("#servCardDark").show();
		$("#carousel-example").hide();

		$(".guardaConfigBlock").attr("route", $("#radioCarrucel2").val());
	}
	
});

/*==========================================================
=         Guarda la Configuracion general del sevicio     =
=============================================================*/
$("#formServices .guardaConfigBlock").click(function(){

    if( $(".cambioTitle").val() != "" ){

        var id = $(this).attr('id');
        var title = $(this).attr('title');
        var route = $(this).attr('route');
        var navbar_title = $(this).attr('navbar_title');
        var description = $(this).attr('description');
        var backgroundcolor = $(this).attr('backgroundcolor');
        var published = $(this).attr('published');
        var imgOld = " ";
        var imgNew =null;
        
    
        console.log("id", id);
            console.log("title", title);
            console.log("route", route);
            console.log("navbar_title", navbar_title);
            console.log("description", description);
            console.log("backgroundcolor", backgroundcolor);
            console.log("published", published);
            console.log("imgOld", imgOld);
            console.log("imgNew", imgNew);

        var datos = new FormData();

        datos.append('id', id);
        datos.append('route', route);
        datos.append('title', title);
        datos.append('navbar_title', navbar_title );
        datos.append('description', description);
        datos.append('imgOld', imgOld)
        datos.append('imgNew', imgNew);
        datos.append('backgroundcolor', backgroundcolor);
        datos.append('published', published);	

        $.ajax({
            url:'ajax/blocks.ajax.php',
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
        })
        .done(function(respuesta) {

            console.log('Línea 672. respuesta => ', respuesta);
            if(respuesta=="ok"){

                Swal.fire({
                    title: 'Actualizado!',
                    text: 'El bloque Servicio se ha actualizado correctamente',
                    icon: 'success',
                    confirmButtonText: '¡Cerrar!'
                  })
    
    
            }else{
    
    
                Swal.fire({
                    title: 'Error al guardar!',
                    text: 'No se pudo actualizar los datos del bloque Servicio',
                    icon: 'error',
                    confirmButtonText: '¡Cerrar!'
                });
    
    
            }

        })
        .fail(function() {
            console.log("error");
            $("#status").remove();
    
            Swal.fire({
                title: 'Error al guardar!',
                text: 'No se pudo actualizar los datos del bloque Servicio',
                icon: 'error',
                confirmButtonText: '¡Cerrar!'
            });   
            
        });



    }else{

        Swal.fire({
			title: 'Error al guardar!',
			text: 'Debe ingresar el Titulo',
			icon: 'error',
			confirmButtonText: '¡Cerrar!'
		  });



    }





});

/*==========================================================
=          Configuracion del carrucel de sevicio     =
=============================================================*/

/*
Carousel
*/
$('#carousel-example').on('slide.bs.carousel', function (e) {

		
	var $e = $(e.relatedTarget);
	var idx = $e.index();
	
	var itemsPerSlide = 5;
	var totalItems = $('.carousel-item-serv').length;


	if (idx >= totalItems-(itemsPerSlide-1)) {
		var it = itemsPerSlide - (totalItems - idx);
		for (var i=0; i<it; i++) {
			// append slides to end
			if (e.direction=="left") {
				
				$('.carousel-item-serv').eq(i).appendTo('#carousel-example .carousel-inner');
			}
			else {
				
				$('.carousel-item-serv').eq(0).appendTo('#carousel-example .carousel-inner');
			}
		}
	}


});	


/*
Carousel
*/