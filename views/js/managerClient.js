


/*=============================================
=        Actualiza el switch Publicar         =
=============================================*/

$("#switchPubliClient").change(function(){

    /* Video checked */
	  var switchChecked = $(this).is(':checked');

    if(switchChecked){

      $(".guardarContent").attr('published', 1);

    }else{

      $(".guardarContent").attr('published', 0);

    }


});

/*=============================================
=            Actualiza el titulo          =
=============================================*/
$(".cambioTituloClient").change(function(event) {

	
	var title = $(this).val();

    $(".guardarContent").attr('title', title);
  
 	//$("#description").html(description);

	//console.log('Línea 274. title2 => ', $(".title2").html());

});


/*=============================================
AGREGAR MULTIMEDIA CON DROPZONE
=============================================*/

var arrayFiles = [];

$(".multimediaFisica").dropzone({
	
	url: "/",
	addRemoveLinks: true,
	acceptedFiles: "image/jpeg, image/png",
	maxFilesize: 2,
	maxFiles: 10,
	init: function(){

		var imagenesRestantes ;

		this.on('addedfile',function(file) {

			imagenesRestantes = $(".imagenesRestantes");
		
			arrayFiles.push(file);
			//console.log('Línea 219. arrayFiles => ', arrayFiles);

			/* ------ agregar imagen al carrucel--------
			-------------------------------------------*/
			var indiceFile =arrayFiles.indexOf(file);
			var img; 
			img= this.files[indiceFile];
			//console.log("ruta", img["size"]);

			if( img['size']<=2000000){

				var datosImagen = new FileReader;
				datosImagen.readAsDataURL(img);

				var index = arrayFiles.indexOf(file);
				var cantImg = imagenesRestantes.length-1;
				var i= cantImg +index +1;

		

				$(datosImagen).on("load", function(event){
	
					var rutaImagen = event.target.result;
					//console.log(rutaImagen);
					// carrucel
					$('.customer-logos').slick('slickAdd', ' <div class="slide center-img "><img src="'+rutaImagen+'" class="img-slider" style="display: block;margin-bottom: auto; margin-top: auto;"></div>');
					// grilla
					$(".gridClient").append(
						'<div class="col-md-3 flex-center" id="client'+i+'">' +
							'<img src="'+rutaImagen+'" class="imgClient wow fadeIn" data-wow-delay=".2s" id="'+i+'">' +
						'</div>'
			
					)
					
				})  

			}

		
		});

		this.on('removedfile',function(file) {

			
			imagenesRestantes = $(".imagenesRestantes");

			var index = arrayFiles.indexOf(file);
			
			var imgSize = file.size;

									
			arrayFiles.splice(index, 1);
			//console.log('Línea 219. arrayFiles => ', arrayFiles);


			/* ------ eliminar imagen al carrucel--------
			-------------------------------------------*/
			

			
			if (imgSize<=2000000){

				var cantImg = imagenesRestantes.length -1;
				
				var indexRemoved= cantImg +index +1;
				
				$('.customer-logos').slick('slickRemove', indexRemoved);

				// grilla de cliente
				RemoveImagenGrid(indexRemoved);




			}
			
			
			
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
$(".previsualizarImgFisico").append(function(){

		console.log("cambio de previsualizarImgFisico");

		var  item  = "type_block"; 
		var  value = "customers";

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

$(document).on("click", ".removerImagen", function(){



	var indiceRemove = $(this).parent().attr('indice');

	
	$(this).parent().parent().remove();

	var imagenesRestantes = $(".imagenesRestantes");
	
	var arrayImgRestantes = [];

	$(".previsualizarImgFisico").html("");
	
	
	for(var i = 0; i < imagenesRestantes.length; i++){

		arrayImgRestantes.push({"foto":$(imagenesRestantes[i]).attr("src")});

		$(".previsualizarImgFisico").append(

			'<div class="col-md-3">'+
			  '<div class="thumbnail text-center" indice="'+i+'" >'+
				'<img class="imagenesRestantes" src="'+$(imagenesRestantes[i]).attr("src")+'" style="width:45%">'+
				'<div class="removerImagen" style="cursor:pointer">Remove file</div>'+
			  '</div>'+

			'</div>' 

		);
				
	}

	localStorage.setItem("multimediaPhoto", JSON.stringify(arrayImgRestantes));

	$('.customer-logos').slick('slickRemove', indiceRemove);

	// grilla de cliente
	RemoveImagenGrid(indiceRemove);
	

	
})
/*============================================================
=    Funcion para remover una imagen de la cuadricula       =
=============================================================*/

function RemoveImagenGrid(indice){

	$("#client"+indice).remove();

	var listClient = $(".imgClient");

	
	$(".gridClient").html("");

	for(var x=0; x < listClient.length; x++){

		$(".gridClient").append(
			'<div class="col-md-3 flex-center" id="client'+x+'"  index="'+x+'">' +
				'<img src="'+$(listClient[x]).attr("src")+'" class="imgClient wow fadeIn" data-wow-delay=".2s" id="'+x+'">' +
			'</div>'

		)


	}




}

/*============================================================
=    Configura clients brand logo carousel slider -->        =
$(".slider").not('.slick-initialized').slick()
=============================================================*/

$('.customer-logos').slick({
	slidesToShow: 5,
	slidesToScroll: 1,
	autoplay: true,
	autoplaySpeed: 1000,
	arrows: false,
	dots: false,
		pauseOnHover: false,
		responsive: [{
		breakpoint: 768,
		settings: {
			slidesToShow: 3
		}
	}, {
		breakpoint: 520,
		settings: {
			slidesToShow: 2
		}
	}]
});
// clients brand logo carousel slider -->
/*=============================================
=            Actualiza el titulo          =
=============================================*/
$(".cambioTituloClient").change(function(){


	var title = $(this).val();

	$(".guardarClient").attr('title', title);

	$(".titleClient").html(title);


});

/*=============================================
=     Actualiza el titulo de Barra de navegaciòn       =
=============================================*/
$(".cambioTituloNavbarClient").change(function(event) {

	
	var navbarTitle = $(this).val();

  $(".guardarClient").attr('navbar_title', navbarTitle);
  
 

});

/*=============================================
=        Actualiza el switch Publicar         =
=============================================*/

$("#switchPubliClient").change(function(){

    /* Video checked */
	  var switchChecked = $(this).is(':checked');

    console.log("publcar", switchChecked);

    if(switchChecked){

      $(".guardarClient").attr('published', 1);

    }else{

      $(".guardarClient").attr('published', 0);

    }


});


/*==========================================================
=            configura <!-- Color Picker -->         =
=============================================================*/

//color picker with addon inicializa el datapicker

$('.my-colorpicker').colorpicker();

$('#fondoColorClient').on('colorpickerChange', function(event) {
	
	$('#fondoColorClient .fa-square').css('color', event.color.toString());
	
	var color = event.color.toString();

	$(".guardarClient").attr('backgroundcolor', color);

	$("#fondoClient").css('background', color); 


	
	     
});

/*=============================================
=      Despliega las pre-visualzacion        =
=============================================*/

$("#radioGrilla").change(function(){

	// valida si esta chequeado
	var checkboxChecked = $(this).is(':checked');

	if(checkboxChecked){

		var imagenes = $(".imagenesRestantes");


		$("#previsualizacionCliente").html(` 

			<div class="flex-center">

				<div class="row gridClient" >


				</div>
			</div>	

		`);
		for(var i = 0; i < imagenes.length; i++){
			$(".gridClient").append(
				'<div class="col-md-3 flex-center" id="client'+i+'"  index="'+i+'">' +
					'<img src="'+$(imagenes[i]).attr("src")+'" class="imgClient wow fadeIn" data-wow-delay=".2s" id="'+i+'">' +
				'</div>'
	
			)
		}

		var last= imagenes.length 
	
		for(var x=0; x < arrayFiles.length; x++){

			$(".gridClient").append(
				'<div class="col-md-3 flex-center" id="client'+last+'"  index="'+last+'">' +
					'<img src="'+arrayFiles[x]['dataURL']+'" class="imgClient wow fadeIn" data-wow-delay=".2s" id="'+last+'">' +
				'</div>'
	
			)
			
			last ++;


		}

		$(".guardarClient").attr("route", $("#radioGrilla").val());
		
	}

});

$("#radioCarrusel").change(function(){

	// valida si esta chequeado
	var checkboxChecked = $(this).is(':checked');

	if(checkboxChecked){

		var imagenes = $(".imgClient");

			
		$('.customer-logos').slick('unslick');


		$("#previsualizacionCliente").html(` 

			<div class="customer-logos slider" id="div-logo" >

				
			</div>	

			<br>

		`);

		$('.customer-logos').not('.slick-initialized').slick({
			slidesToShow: 5,
			slidesToScroll: 1,
			autoplay: true,
			autoplaySpeed: 1000,
			arrows: false,
			dots: false,
				pauseOnHover: false,
				responsive: [{
				breakpoint: 768,
				settings: {
					slidesToShow: 3
				}
			}, {
				breakpoint: 520,
				settings: {
					slidesToShow: 2
				}
			}]
		});
		
		var rutaImagen  ;

		
		for (let i = 0; i < imagenes.length; i++) {

			rutaImagen = $(imagenes[i]).attr("src")
			
			$('.customer-logos').slick('slickAdd', ' <div class="slide center-img "><img src="'+rutaImagen+'" class="img-slider" style="display: block;margin-bottom: auto; margin-top: auto;"></div>');
			
		}

		$(".guardarClient").attr("route", $("#radioCarrusel").val());

	}


});


/*==============================================================
		=    GUARDAR SECCION CLIENTE  =
===============================================================*/
var multimediaFisica = null;

/*==============================================================
	=  PREGUNTAMOS SI LOS CAMPOS OBLIGATORIOS ESTAN LLENOS =
===============================================================*/

$(".guardarClient").click(function(){

	if( $(".cambioTituloClient").val() != "" ){

		if(arrayFiles.length>0){

			var listaMultimedia = [];
			var finalFor = 0;

			for (let i = 0; i < arrayFiles.length; i++) {

				var datosMultimedia = new FormData();
				datosMultimedia.append("file", arrayFiles[i]);
				const blockType = $(".guardarClient").attr('type_block');
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


						guardarClient(multimediaFisica);
						finalFor=0;


					}

					finalFor++;
					console.log('Línea 679. finalFor => ', finalFor);


				}).fail(function() {
					console.log("error");
					
				});


				
			}






		}else{

			var jsonLocalStorage = JSON.parse(localStorage.getItem("multimediaPhoto"));

			multimediaFisica = JSON.stringify(jsonLocalStorage);

			guardarClient(multimediaFisica);	


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

function guardarClient(imagenes){

	console.log(imagenes);

	var id = $(".guardarClient").attr('id');
	var title = $(".guardarClient").attr('title');
	var route = $(".guardarClient").attr('route');
	var navbar_title = $(".guardarClient").attr('navbar_title');
	var description = $(".guardarClient").attr('description');
	var backgroundcolor = $(".guardarClient").attr('backgroundcolor');
	var published = $(".guardarClient").attr('published');
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
		//console.log("imgNew", imgNew);*/

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
				text: 'El bloque cliente se ha actualizado correctamente',
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
				text: 'No se pudo actualizar los datos del bloque clientes',
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
			text: 'No se pudo actualizar los datos del bloque clientes',
			icon: 'error',
			confirmButtonText: '¡Cerrar!'
		});


		
	});






}