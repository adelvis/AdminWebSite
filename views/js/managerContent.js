
/*=============================================
=      Despliega las pre-visualzacion           =
=============================================*/


var descrip= $(".cambioDescripcion").val();


$("#radioDer").change(function(){

  descrip= $(".cambioDescripcion").val();

    /* Video checked */
	var checkboxChecked = $(this).is(':checked');

    // configura la visualizaciòn de los controles de acuerdo a la opciòn 
	if (checkboxChecked){
        
        $("#previsulizacion").html(` 
        
                <!--Grid column description-->
                <div class="col-md-7 mb-4 text-justify">

                    <!-- Description -->
                    <p class="text-justify" id="description">`+ descrip + `</p>

                </div>
                <!--Grid column-->
              
                <!--Grid column imagen-->
                <div class="col-md-5 mb-4">

                  <!--Featured image -->
                  <div class="view overlay z-depth-1-half" style="height: auto;">
                    <img src="`+$(".guardarContent").attr('img')+ `" class="card-img-top" alt="" >
                    <div class="mask rgba-white-light"></div>
                  </div>

                </div>

                <!--Grid column-->
        `);

        $(".guardarContent").attr("route", $("#radioDer").val());
        console.log("ruta", $("#radioDer").val());

    }

});

$("#radioIzq").change(function(){

  descrip= $(".cambioDescripcion").val();
  console.log(descrip);

    /* Video checked */
	var checkboxChecked = $(this).is(':checked');

    // configura la visualizaciòn de los controles de acuerdo a la opciòn 
	if (checkboxChecked){

       

        
        $("#previsulizacion").html(` 
        
       
      
              <!--Grid column imagen-->
              <div class="col-md-5 mb-4">

                <!--Featured image -->
                <div class="view overlay z-depth-1-half" style="height: auto;">
                  <img src="`+$(".guardarContent").attr('img')+ `" class="card-img-top" alt="" >
                  <div class="mask rgba-white-light"></div>
                </div>

              </div>

              <!--Grid column-->


              <!--Grid column description-->
              <div class="col-md-7 mb-4 text-justify">

                  <!-- Description -->
                  <p class="text-justify" id="description">`+ descrip + `</p>

              </div>
              <!--Grid column-->


        `);

        $(".guardarContent").attr("route", $("#radioIzq").val());

        console.log("ruta", $("#radioIzq").val());

    }

});

/*==========================================================
=            configura <!-- Color Picker -->         =
=============================================================*/

//color picker with addon inicializa el datapicker

$('.my-colorpicker').colorpicker();

$('#fondoColor').on('colorpickerChange', function(event) {
	
	$('#fondoColor .fa-square').css('color', event.color.toString());
	
	var color = event.color.toString();

	$(".guardarContent").attr('backgroundcolor', color);

	$("#fondo").css('background', color); 


	
	     
});

/*=============================================
=            Actualiza el titulo          =
=============================================*/
$(".cambioTituloTexto").change(function(event) {

	
	var title = $(this).val();

	$(".guardarContent").attr('title', title);

	$(".Title").html(title);

	//console.log('Línea 274. title2 => ', $(".title2").html());

});

/*=============================================
=            Actualiza la Imagen         =
=============================================*/
var imagen = null;

$(".subirImgen").change(function(){

  imagen = this.files[0];

  $(".guardarContent").attr('img', imagen);

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

          $(".card-img-top").attr("src",rutaImagen);
          
          $(".guardarContent").attr('img',rutaImagen);

      
      

  });


  }   





});




/*=============================================
=     Actualiza el titulo de Barra de navegaciòn       =
=============================================*/
$(".cambioTituloNavbar").change(function(event) {

	
	var navbarTitle = $(this).val();

  $(".guardarContent").attr('navbar_title', navbarTitle);
  
 

});

/*=============================================
=        Actualiza el switch Publicar         =
=============================================*/

$("#customSwitch3").change(function(){

    /* Video checked */
	  var switchChecked = $(this).is(':checked');

    console.log("publcar", switchChecked);

    if(switchChecked){

      $(".guardarContent").attr('published', 1);

    }else{

      $(".guardarContent").attr('published', 0);

    }


});


/*=============================================
=           Guarda cambios       =
=============================================*/
$(".guardarContent").click(function(event) {
	
	var id = $(this).attr('id');
	var title = $(this).attr('title');
	var route = $(this).attr('route');
  var navbar_title = $(this).attr('navbar_title');
  var description = $('#summerNote').summernote('code');
  var backgroundcolor = $(this).attr('backgroundcolor');
  var published = $(this).attr('published');
  var imgOld = $(this).attr('imgOld');
  var imgNew =imagen;


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
  datos.append('imgOld', imgOld);
  datos.append('imgNew', imgNew);
  datos.append('backgroundcolor', backgroundcolor);
  datos.append('published', published);


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
		//console.log("success");
		if(respuesta=="ErrorUploadFile"){

			Swal.fire({
				title: 'Error al guardar!',
				text: '¡Hubo problemas al subir el video!',
				icon: 'error',
				confirmButtonText: '¡Cerrar!'
			  })

		}else{

			Swal.fire({
				title: 'Cambios guardados!',
				text: '¡La plantilla ha sido actualizada correctamente!',
				icon: 'success',
				confirmButtonText: '¡Cerrar!'
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
	



}); 
/*=============================================
=            Actualiza el Descripcion          =
=============================================*/
/*=============================================
=          Editor      =
=============================================*/
// Summernote
$('#summerNote').summernote({
    toolbar: [
      ['style', ['style']],
      ['font', ['bold', 'underline', 'clear']],
      ['color', ['color']],
      ['para', ['ul', 'ol', 'paragraph']],
      ['table', ['table']],
      ['insert', ['link', 'picture']],
      ['view', ['fullscreen',  'help']]
    ],
    callbacks: {
      onChange: function(contents, $editable) {
        $(".cambioDescripcion").val(contents);

                
        $("#description").html("");
        $("#description").html(contents);
    
        console.log("onChange:", contents, $editable);
        console.log($(".guardarContent").attr('description'));
      }
    }



})