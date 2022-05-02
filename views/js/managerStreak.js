/*==========================================================
=       Streak configuraciòn de la image de fondo            =
=============================================================*/

//background: url("https://mdbootstrap.com/img/Photos/Horizontal/Nature/full%20page/img%20%283%29.jpg")no-repeat center center fixed

urlImgStreak = $("#urlStreak").val();

$(".streak_custom").css({ 'background':'url("'+urlImgStreak+'")'});

/*=============================================
=            Actualiza la Imagen         =
=============================================*/
var imagen = null;

$("#formStreak .subirImgen").change(function(){

  imagen = this.files[0];

  $(".guardarStreak").attr('img', imagen);

    /*==============================================================
	=    VALIDAMOS EL FORMATO  DE LA IMAGE SEA JPG O PNG	     =
	===============================================================*/

	if(imagen["type"] !="image/jpeg" && imagen["type"] !="image/png"){

		  $(".subirImgen").val("");

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

		$(".subirImgen").val("");

		

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

          $(".guardarStreak").attr('img',rutaImagen);

          $(".streak_custom").css({ 'background':'url("'+rutaImagen+'")'});

      
      

  });


  }   





});

/*=============================================
=        Actualiza el switch Publicar         =
=============================================*/

$("#formStreak #switchPublic").change(function(){

    /* Video checked */
	var switchChecked = $(this).is(':checked');

    console.log("publcar", switchChecked);

    if(switchChecked){

      $(".guardarStreak").attr('published', 1);

    }else{

      $(".guardarStreak").attr('published', 0);

    }


});

/*=============================================
=            Actualiza el titulo          =
=============================================*/
$("#formStreak .cambioTitle").change(function(){

	var title = $(this).val();

	$(".guardarStreak").attr('title', title);

	$("#autor").html(title);


});
/*=============================================
=            Actualiza el Descripciòn          =
=============================================*/
$("#formStreak .cambioDescripcion").change(function(){

    let descript = $(this).val();
    console.log(descript);

	$(".guardarStreak").attr('description', descript);

	$(".descriptBlock").html('<i class="fas fa-quote-left" aria-hidden="true"></i>'+descript+'<i class="fas fa-quote-right" aria-hidden="true"></i>');


});

/*==========================================================
=         Guarda la Configuracion general del sevicio     =
=============================================================*/
$(".guardarStreak").click(function(){

  

  if( $(".cambioTitle").val() != "" ){
    
        var id = $(this).attr('id');
        var title = $(this).attr('title');
        var route = $(this).attr('route');
        var navbar_title = "";
        var description = $(this).attr('description');
        var backgroundcolor = "";
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
                  text: 'El bloque Streak se ha actualizado correctamente',
                  icon: 'success',
                  confirmButtonText: '¡Cerrar!'
                })
  
  
          }else{
  
  
              Swal.fire({
                  title: 'Error al guardar!',
                  text: 'No se pudo actualizar los datos del bloque Streak',
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
