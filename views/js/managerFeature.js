/*=============================================
CARGAR LA TABLA DINÁMICA DE SUBCATEGORÍAS
=============================================*/


$.ajax({

    url:"ajax/tableFeature.ajax.php",

    success:function(respuesta){
       
       //console.log("respuesta", respuesta);

    }

});

$(".tablaFeature").DataTable({

    "ajax": "ajax/tableFeature.ajax.php",
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

$("#modalEditFeature .iconSelecionado").click(function(){
    let code = $(this).attr('code');
    let color = $('#modalEditFeature #inputIcon').val();
    console.log($(this).attr('code'));
    $("#iconSel").html(`<i class="far ${code} fa-3x" style="color:${color}" id="icono"></i>
    <input type="hidden" class="idIconCode" value="${code}"> 
    ` )
    

});

$("#modalAddFeature .iconSelecionado").click(function(){
    let code = $(this).attr('code');
    let color = $('#modalAddFeature #inputIcon2').val();
    console.log($(this).attr('code'));
    $("#iconSel2").html(`<i class="far ${code} fa-3x" style="color:${color}" id="icono"></i>
    <input type="hidden" class="idIconCode" value="${code}"> 
    ` )
    

});

/*=============================================
Busca la caracteristica para la ediciòn
=============================================*/

$(".tablaFeature").on('click', '.btnEditFeature', function(event) {

    var idCategory = $(this).attr("idFeature");
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

        $("#modalEditFeature .idFeature").val(respuesta[0]["id"]);

        $("#modalEditFeature .titulo").val(respuesta[0]["title"]);

        $("#modalEditFeature #description").val(respuesta[0]["short_Description"]);

        //$("#modalEditFeature .previsualizarImagen").attr("src", respuesta[0]["img"]);
        
        let icon = JSON.parse(respuesta[0]["img"]);
        var colorIcon= icon['color'];

        console.log(icon);

        $('#iconColor .fa-square').css('color', colorIcon);
        $('#modalEditFeature #inputIcon').val(colorIcon);
        $('#icono').css({"color": colorIcon});
        $('.idIconCode').val(icon['img']);
        $('#icono').addClass(icon['img']);




    })

});

/*==========================================================
=            configura <!-- Color Picker -->         =
=============================================================*/

//color picker with addon inicializa el datapicker

$('.my-colorpicker').colorpicker();

$('#formFeature #fondoColor').on('colorpickerChange', function(event) {
	
	$('#fondoColor .fa-square').css('color', event.color.toString());
	
	var color = event.color.toString();

	$(".guardaConfigBlock").attr('backgroundcolor', color);

	$("#fondoBlock").css('background', color); 


	
	     
});

/*==========================================================
=            configura <!-- Color Picker -->   MODAL      =
=============================================================*/

//color picker with addon inicializa el datapicker


$('#modalEditFeature #iconColor').on('colorpickerChange', function(event) {
	
	$('#iconColor .fa-square').css('color', event.color.toString());
	
    let color = event.color.toString();

    //console.log(color);
    
	$("#icono").css('color', color); 


	
	     
});

$('#modalAddFeature #iconColor').on('colorpickerChange', function(event) {
	
	$('#iconColor .fa-square').css('color', event.color.toString());
	
    let color = event.color.toString();

     console.log(color);
    
	$("#modalAddFeature #icono").css('color', color); 


	
	     
});

/*=============================================
=       Modal Guarda cambios a Editar        =
=============================================*/

$("#modalEditFeature").on('click', '.guardarCambios', function(event){

     /*=============================================
    PREGUNTAMOS SI LOS CAMPOS OBLIGATORIOS ESTÁN LLENOS
    =============================================*/
    if( $("#modalEditFeature .titulo").val() != "" && 
        $("#modalEditFeature #description").val() != ""
       ){

            var id = $(".idFeature").val();
            var title = $("#modalEditFeature .titulo").val();
            var short_Description = $("#modalEditFeature #description").val();
            var type ="feature"; 

            var detail = {"img": $("#modalEditFeature .idIconCode").val(),							
                               "color": $("#modalEditFeature #inputIcon").val()};
                               
            var detailString = JSON.stringify(detail);                   
            let imagen = null;
            

            console.log(title);
            console.log(short_Description);
            console.log(id);
            console.log(detailString);
            console.log(imagen);




            var datos = new FormData();
            datos.append("id_categotyEdit", id);
            datos.append("title", title);
            datos.append("short_Descrip", short_Description);            
            datos.append("type", type);
            datos.append("imgOld", detailString);
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
                        text: 'La caracteristicas se ha agregado correctamente',
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
=       Modal Guarda cambios a Editar        =
=============================================*/

$("#modalAddFeature").on('click', '.addSave', function(event){

      /*=============================================
    PREGUNTAMOS SI LOS CAMPOS OBLIGATORIOS ESTÁN LLENOS
    =============================================*/
    if( $("#modalAddFeature .titulo").val() != "" && 
        $("#modalAddFeature #description").val() != ""
       ){
            var title = $("#modalAddFeature .titulo").val();
            var short_Description = $("#modalAddFeature #description").val();
            var type ="feature"; 
            var detail = {"img": $("#modalAddFeature .idIconCode").val(),							
            "color": $("#modalAddFeature #inputIcon2").val()};
                        
            var detailString = JSON.stringify(detail);                   
            var imagen = null;

            console.log(title);
            console.log(short_Description);
            console.log(type);
            console.log(detailString);

            var datos = new FormData();
            datos.append("title", title);
            datos.append("short_Description", short_Description);
            datos.append("type", type);
            datos.append("img", imagen);
            datos.append("icono", detailString )

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
                        text: 'La Caracteristica se ha agregado correctamente',
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
=          Eliminar una Caracteristica         =
=============================================*/
$(".tablaFeature").on('click', '.btnDeleteFeature', function(event){

       

    var idCatDelete = $(this).attr("idFeature");
    

    console.log(idCatDelete);

    Swal.fire({
        title: '¿Está seguro de borrar la característica?',
        text: '¡Si no lo está puede cancelar la accíón!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar característica!'
    }).then(function(result){
          
        if (result.value) {

            var datos = new FormData();
            datos.append('idCatDelete', idCatDelete);
            datos.append('imgPrincipal', null);
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
                        text: "La caracteristica se ha sido borrado correctamente!",
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

          console.log(rutaImagen);

          $(".previsualizarImagen").attr('src', rutaImagen);
      
      

  });


    }   





});

/*=============================================
=        Actualiza el switch Publicar         =
=============================================*/

$("#formFeature #switchPublic").change(function(){

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
$("#formFeature .cambioTitle").change(function(){

  


	var title = $(this).val();

	$(".guardaConfigBlock").attr('title', title);

	$(".titleBlock").html(title);


});
/*=============================================
=     Actualiza el titulo de Barra de navegaciòn       =
=============================================*/
$("#formFeature .cambioTitleNavbar").change(function(event) {

  	var navbarTitle = $(this).val();

    $(".guardaConfigBlock").attr('navbar_title', navbarTitle);
  
 
});

/*=============================================
=      Despliega las pre-visualzacion        =
=============================================*/
$("#formFeature #radioCard").change(function(){

	
	// valida si esta chequeado
	var checkboxChecked = $(this).is(':checked');


	if(checkboxChecked){

		$(".features").show();
		$(".featureslist").hide();
        $(".featureslist2").hide();
        
        $(".descript").show();
        $("#imgPrincipal").show();

		$(".guardaConfigBlock").attr("route", $("#radioCard").val());
	}
	
});

$("#formFeature #radioLista").change(function(){

	
	// valida si esta chequeado
	var checkboxChecked = $(this).is(':checked');


	if(checkboxChecked){

		$(".features").hide();
		$(".featureslist").show();
        $(".featureslist2").hide();
        
        $(".descript").hide();
        $("#imgPrincipal").hide();

		$(".guardaConfigBlock").attr("route", $("#radioLista").val());
	}
	
});

$("#formFeature #radioLista2").change(function(){

	
	// valida si esta chequeado
	var checkboxChecked = $(this).is(':checked');


	if(checkboxChecked){

		$(".features").hide();
		$(".featureslist").hide();
        $(".featureslist2").show();
        
        $(".descript").hide();
        $("#imgPrincipal").hide();

		$(".guardaConfigBlock").attr("route", $("#radioLista2").val());
	}
	
});

/*==========================================================
=         Guarda la Configuracion general del sevicio     =
=============================================================*/
$("#formFeature .guardaConfigBlock").click(function(){

    if( $(".cambioTitle").val() != "" ){

        var id = $(this).attr('id');
        var title = $(this).attr('title');
        var route = $(this).attr('route');
        var navbar_title = $(this).attr('navbar_title');
        var description = $(this).attr('description');
        var backgroundcolor = $(this).attr('backgroundcolor');
        var published = $(this).attr('published');
        var imgOld = $(this).attr('img');
        var imgNew =imagen;
        
    
            /*console.log("id", id);
            console.log("title", title);
            console.log("route", route);
            console.log("navbar_title", navbar_title);
            console.log("description", description);
            console.log("backgroundcolor", backgroundcolor);
            console.log("published", published);
            console.log("imgOld", imgOld);
            console.log("imgNew", imgNew);*/


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
                    text: 'El bloque Característica se ha actualizado correctamente',
                    icon: 'success',
                    confirmButtonText: '¡Cerrar!'
                  })
    
    
            }else{
    
    
                Swal.fire({
                    title: 'Error al guardar!',
                    text: 'No se pudo actualizar los datos del bloque Característica',
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


/*=============================================
=            Actualiza el Descripciòn          =
=============================================*/
$("#formFeature .cambioDescripcion").change(function(){

    let descript = $(this).val();
 

	$(".guardaConfigBlock").attr('description', descript);

	$(".descriptBlock").html(descript);


});
