/*=============================================
ACTIVAR USUARIO
=============================================*/

$(".tableProfile tbody").on("click", ".btnActive", function(){

	var idPerfil = $(this).attr("idPerfil");
	var estadoPerfil = $(this).attr("estadoPerfil");

	var datos = new FormData();
 	datos.append("activarId", idPerfil);
  	datos.append("activarPerfil", estadoPerfil);

  	$.ajax({
  		url:"ajax/administrators.ajax.php",
  		method: "POST",
	  	data: datos,
	  	cache: false,
      	contentType: false,
      	processData: false,
  	})
  	.done(function(respuesta) {
  		console.log('Línea 76. respuesta => ', respuesta);
  		//console.log("success");
  	})
  	.fail(function() {
  		console.log("error");
  	});
  	

  	
  if(estadoPerfil == 0){

      $(this).removeClass('btn-success');
      $(this).addClass('btn-danger');
      $(this).html('Desactivado');
      $(this).attr('estadoPerfil',1);

    }else{

      $(this).addClass('btn-success');
      $(this).removeClass('btn-danger');
      $(this).html('Activado');
      $(this).attr('estadoPerfil',0);

    }

})

/*=============================================
=            Actualiza la Imagen         =
=============================================*/
var imagen = null;

$(".subirImgen").change(function(){

    imagen = this.files[0];

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

                console.log(rutaImagen);

                $(".previsualizarImagen").attr('src', rutaImagen);
          });
    }   

});

/*=============================================
EDITAR PERFIL
=============================================*/
$(".tableProfile").on("click", ".btnEditProfile", function(){

  

    var idPerfil = $(this).attr("idPerfil");
    
    var datos = new FormData();
    datos.append("idPerfil", idPerfil);
  
    $.ajax({
      url:"ajax/administrators.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
    })
    .done(function(respuesta) {
      console.log('Línea 120. respuesta => ', respuesta);
  
        $("#editPassword").val("");
        $("#editPassword1").val("");
     
  
        $("#editName").val(respuesta["name"]);
        $("#idPerfil").val(respuesta["id"]);
        $("#editEmail").val(respuesta["email"]);
        $("#editProfile").html(respuesta["profile"]);
        $("#editProfile").val(respuesta["profile"]);
        $("#fotoActual").val(respuesta["photo"]);
        $("#passwordActual").val(respuesta["password"]);
  
        if(respuesta["photo"] != ""){
  
          $(".previsualizarImagen").attr("src", respuesta["photo"]);
  
        }else{
  
          $(".previsualizarImagen").attr("src", "");
        }
  
  
    })
    .fail(function() {
      console.log("error");
    });
    
  
  
  
  });


  $("#editPassword1").change(function(event) {

    /* Act on the event */
  
    if ($("#editPassword1").val() !=""){
  
          $("#editPassword").val( $("#editPassword1").val());
  
    }else{
  
           $("#editPassword").val("");
  
    }
  
  
  
  
  
  });

  /*=============================================
ELIMINAR USUARIO
=============================================*/
$(".tableProfile").on("click", ".btnDeleteProfile", function(){

  var idPerfil = $(this).attr("idPerfil");
  console.log('Línea 157. idPerfil => ', idPerfil);
  var fotoPerfil = $(this).attr("fotoPerfil");


  Swal.fire({

    title: '¿Está seguro de borrar el perfil?',
    text: "¡Si no lo está puede cancelar la accíón!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar perfil!'
  }).then(function(result){

    if(result.value){

      window.location = "index.php?ruta=usuarios&idPerfil="+idPerfil+"&fotoPerfil="+fotoPerfil;

    }

  })

})
  

$("#formProfile #editPassword1").change(function(){

    
    if ($("#editPassword1").val() !=""){
  
      $("#editPassword").val( $("#editPassword1").val());

    }else{

          $("#editPassword").val("");

    }

    console.log($("#editPassword1").val());
    console.log($("#editPassword").val());

});
