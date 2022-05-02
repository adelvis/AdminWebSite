/*=============================================
=        Actualiza el switch Publicar         =
=============================================*/

$("#formGallery #switchPublic").change(function(){

    /* Video checked */
	  var switchChecked = $(this).is(':checked');

    console.log("publcar-gallery", switchChecked);

    if(switchChecked){

      $(".guardarGallery").attr('published', 1);

    }else{

      $(".guardarGallery").attr('published', 0);

    }


});

/*=============================================
=            Actualiza el titulo          =
=============================================*/
$("#formGallery .cambioTitle").change(function(){

  


	var title = $(this).val();

	$(".guardarGallery").attr('title', title);

	$(".titleBlock").html(title);


});

/*=============================================
=     Actualiza el titulo de Barra de navegaciòn       =
=============================================*/
$("#formGallery .cambioTitleNavbar").change(function(event) {

  

	var navbarTitle = $(this).val();

  $(".guardarGallery").attr('navbar_title', navbarTitle);
  
 

});

/*==========================================================
=            configura <!-- Color Picker -->         =
=============================================================*/

//color picker with addon inicializa el datapicker

$('.my-colorpicker').colorpicker();

$('#formGallery #fondoColor').on('colorpickerChange', function(event) {
	
	$('#fondoColor .fa-square').css('color', event.color.toString());
	
	var color = event.color.toString();

	$(".guardarGallery").attr('backgroundcolor', color);

	$("#fondoBlock").css('background', color); 


	
	     
});

/*=============================================
AGREGAR MULTIMEDIA CON DROPZONE
=============================================*/

var arrayFiles = [];

$(".multimediaDropzone").dropzone({
	
	url: "/",
	addRemoveLinks: true,
	acceptedFiles: "image/jpeg, image/png",
	maxFilesize: 2,
	maxFiles: 10,
	init: function(){

		this.on('addedfile',function(file) {

			arrayFiles.push(file);
			//console.log('Línea 219. arrayFiles => ', arrayFiles);
		
		});

		this.on('removedfile',function(file) {

			var index = arrayFiles.indexOf(file);

			arrayFiles.splice(index, 1);
			//console.log('Línea 219. arrayFiles => ', arrayFiles);
		
		});

    this.on('error', function(file, message){

			alert(message);
			this.removeFile(file);

		})

	}

})



/*==================================================
DESPUES DE LA CARGA DE LAS IMAGENES ALMACENADAS
===================================================*/
var photoMultimedia = null;

$("#formGallery .previsualizarImagenes").append(function(){

		console.log("cambio de previsualizarImgFisico");

		var  item  = "type_block"; 
		var  value = "gallery";

		var datos = new FormData();

		datos.append('item', item);
		datos.append('value', value);

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
		//	console.log(respuesta);
		//	console.log(respuesta["img"]);

			photoMultimedia = JSON.parse(respuesta["img"]);
			localStorage.setItem("multimediaPhoto", JSON.stringify(photoMultimedia));
		

		})
		.fail(function() {
			console.log("error");
		});

		
});

/*=============================================
CUANDO ELIMINAMOS UNA IMAGEN DE LA LISTA
=============================================*/

$("#formGallery .removerImagenes").click(function(){

 
  $(this).parent().parent().remove();

  var imagenesRestantes = $(".imagenesRestantes");
  var arrayImgRestantes = [];

  for(var i = 0; i < imagenesRestantes.length; i++){

    arrayImgRestantes.push({"foto":$(imagenesRestantes[i]).attr("src")})
    
  }

  localStorage.setItem("multimediaPhoto", JSON.stringify(arrayImgRestantes));
  
})

/*=============================================
GALERIA EN GRILLA
=============================================*/

baguetteBox.run('.tz-gallery');

/*=============================================
=      Despliega las pre-visualzacion        =
=============================================*/

$("#formGallery #radioGrilla").change(function(){

	
	// valida si esta chequeado
	var checkboxChecked = $(this).is(':checked');


	if(checkboxChecked){

		$("#carousel-thumb").hide();
		$(".tz-gallery").show();
		$("#demo").hide();

		$(".guardarGallery").attr("route", $("#radioGrilla").val());
	}
	
});

$("#formGallery #radioCarrucel").change(function(){

	
	// valida si esta chequeado
	var checkboxChecked = $(this).is(':checked');


	if(checkboxChecked){

		$("#carousel-thumb").show();
		$(".tz-gallery").hide();
		$("#demo").hide();

		$(".guardarGallery").attr("route", $("#radioCarrucel").val());
	}
	
});

$("#formGallery #radioCarrucel2").change(function(){

	
	// valida si esta chequeado
	var checkboxChecked = $(this).is(':checked');


	if(checkboxChecked){

		$("#carousel-thumb").hide();
		$(".tz-gallery").hide();
		$("#demo").show();

		$(".guardarGallery").attr("route", $("#radioCarrucel2").val());
	}
	
});

/*==============================================================
		=    GUARDAR SECCION CLIENTE  =
===============================================================*/
var multimediaFisica = null;

/*==============================================================
	=  PREGUNTAMOS SI LOS CAMPOS OBLIGATORIOS ESTAN LLENOS =
===============================================================*/

$(".guardarGallery").click(function(){

	

	if( $(".cambioTitle").val() != "" ){

		if(arrayFiles.length>0){

			var listaMultimedia = [];
			var finalFor = 0;

			for (let i = 0; i < arrayFiles.length; i++) {

				var datosMultimedia = new FormData();
				datosMultimedia.append("file", arrayFiles[i]);
				const blockType = $(".guardarGallery").attr('type_block');
				datosMultimedia.append("typeBlock", blockType);
				console.log(arrayFiles[i]);

				$.ajax({
					url:"ajax/blocks.ajax.php",
					method: "POST",
					data: datosMultimedia,
					cache: false,
					contentType: false,
					processData: false,
					beforeSend: function(){

							$(".card-footer .preload").html(`
								<center>

									<img src="views/img/template/status.gif" id="status" />
									<br>

								</center>
							`);

					},
				}).done(function(respuesta) {

					$("#status").remove();
					console.log("foto nueva", respuesta);

					listaMultimedia.push({"foto": respuesta.substr(3)});
					multimediaFisica = JSON.stringify(listaMultimedia);

					if(localStorage.getItem("multimediaPhoto") != null){

						var jsonLocalStorage = JSON.parse(localStorage.getItem("multimediaPhoto"));

						var jsonMultimediaFisica = listaMultimedia.concat(jsonLocalStorage);

						multimediaFisica = JSON.stringify(jsonMultimediaFisica);												
					}


					if(multimediaFisica == null){

						Swal.fire({
							title: 'Error al guardar!',
							text: '¡El campo Multimedia no debe estar vacio!',
							icon: 'error',
							confirmButtonText: '¡Cerrar!'
						  });

						return;


					}
					if((finalFor +1)== arrayFiles.length){


						guardarGaleria(multimediaFisica);
						finalFor=0;


					}

					finalFor++;
					console.log('Línea 338. finalFor => ', finalFor);


				}).fail(function() {
					console.log("error");
					
				});




			}



		}else{

			var jsonLocalStorage = JSON.parse(localStorage.getItem("multimediaPhoto"));

			multimediaFisica = JSON.stringify(jsonLocalStorage);

			guardarGaleria(multimediaFisica);	


		}



	}else{
	
		Swal.fire({
			title: 'Error al guardar!',
			text: 'Debe ingresar el Titulo',
			icon: 'error',
			confirmButtonText: '¡Cerrar!'
		  });
		
	}

});


function guardarGaleria(imagenes){


	console.log(imagenes);

	var id = $(".guardarGallery").attr('id');
	var title = $(".guardarGallery").attr('title');
	var route = $(".guardarGallery").attr('route');
	var navbar_title = $(".guardarGallery").attr('navbar_title');
	var description = $(".guardarGallery").attr('description');
	var backgroundcolor = $(".guardarGallery").attr('backgroundcolor');
	var published = $(".guardarGallery").attr('published');
	var imgOld = "";
	var imgNew =imagenes;
	

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

	datos.append('id_Multimedia', id);
	datos.append('route', route);
	datos.append('title', title);
	datos.append('navbar_title', navbar_title );
	datos.append('description', description);
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
				text: 'El bloque Galeria se ha actualizado correctamente',
				icon: 'success',
				confirmButtonText: '¡Cerrar!'
			  }).then(function(result){
				  
				if (result.value) {

					localStorage.removeItem("multimediaPhoto");
					localStorage.clear();
					window.location = window.location.href;
	
				}
			  })


		}else{


			Swal.fire({
				title: 'Error al guardar!',
				text: 'No se pudo actualizar los datos del bloque Galeria',
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
			text: 'No se pudo actualizar los datos del bloque Galeria',
			icon: 'error',
			confirmButtonText: '¡Cerrar!'
		});


		
	});


}