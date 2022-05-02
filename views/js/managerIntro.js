
/*=============================================
=      Despliega las pre-visualzacion           =
=============================================*/

$("#radioPrimary1").change(function(event) {
	/* Video checked */
	var checkboxChecked = $(this).is(':checked');
	
	// configura la visualizaciòn de los controles de acuerdo a la opciòn 
	if (checkboxChecked){

		$("#video").show();
		$("#intro").hide();


		$("#loadVideo").show();
		$("#loadImagen").hide();

		$(".subirImgProducto").val("");
		$(".subirVideo").val("");

	}else{

		$("#intro").show();
		$("#video").hide();

		$("#loadVideo").hide();
		$("#loadImagen").show();

		$(".subirImgProducto").val("");
		$(".subirVideo").val("");
	}


	// Trae la informaciòn de la base de datos
	var type = "video";

	var datos = new FormData();

	datos.append('type', type);

	$.ajax({
		url:"ajax/intro.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
	})
	.done(function(respuesta) {

		var id = respuesta["id"];

		var title1 = JSON.parse(respuesta["title1"]);

		var title2 = JSON.parse(respuesta["title2"]);

		var url = respuesta["url"];


		// Actualiza los atributos del boton guardar
		$(".guardarIntro").attr('id', id);
		$(".guardarIntro").attr('title', title1["texto"]);
		$(".guardarIntro").attr('colorTitle', title1["color"]);
		$(".guardarIntro").attr('subtitle', title2["texto"]);
		$(".guardarIntro").attr('colorsubtitle', title2["color"]);
		$(".guardarIntro").attr('url', url);
		$(".guardarIntro").attr('urlNew', url);
		$(".guardarIntro").attr('typeInt', respuesta["type"]);

		//actualiza los controles input / video

		$(".cambioTituloTexto1").val(title1["texto"]);
		$(".cambioColorTexto1").val(title1["color"]);
		$("#ColorTexto1").css({color: title1["color"]});


		$(".cambioSubTituloTexto").val(title2["texto"]);
		$(".cambioColorTexto2").val(title2["color"]);
		$("#ColorTexto2").css({color: title2["color"]});
		

		$("#loadVideo video").attr('src', url);


		//actualiza la pre-visualizacion

		$("#video video").attr('src', url);
		$("#video h1").html(title1["texto"]);
		$("#video h1").css({color: title1["color"]});
		$("#video p").html(title2["texto"]);
		$("#video p").css({color: title2["color"]});



		
	})
	.fail(function() {
		console.log("error");
	});
	

});

$("#radioPrimary2").change(function(event) {
	/* imagen checked */
	var checkboxChecked = $(this).is(':checked');
	
		// configura la visualizaciòn de los controles de acuerdo a la opciòn 
	if (checkboxChecked){

		$("#intro").show();
		$("#video").hide();

		$("#loadVideo").hide();
		$("#loadImagen").show();
		
	}else{

		$("#video").show();
		$("#intro").hide();

		$("#loadVideo").show();
		$("#loadImagen").hide();



	}


	// Trae la informaciòn de la base de datos
	var type = "imagen";

	var datos = new FormData();

	datos.append('type', type);

	$.ajax({
		url:"ajax/intro.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
	})
	.done(function(respuesta) {
		console.log('Línea 146. respuesta => ', respuesta);

		var id = respuesta["id"];

		var title1 = JSON.parse(respuesta["title1"]);

		var title2 = JSON.parse(respuesta["title2"]);

		var url = respuesta["url"];


		// Actualiza los atributos del boton guardar
		$(".guardarIntro").attr('id', id);
		$(".guardarIntro").attr('title', title1["texto"]);
		$(".guardarIntro").attr('colorTitle', title1["color"]);
		$(".guardarIntro").attr('subtitle', title2["texto"]);
		$(".guardarIntro").attr('colorsubtitle', title2["color"]);
		$(".guardarIntro").attr('url', url);
		$(".guardarIntro").attr('urlNew', url);
		$(".guardarIntro").attr('typeInt', respuesta["type"]);

		//actualiza los controles

		$(".cambioTituloTexto1").val(title1["texto"]);
		$(".cambioColorTexto1").val(title1["color"]);
		$("#ColorTexto1").css({color: title1["color"]});


		$(".cambioSubTituloTexto").val(title2["texto"]);
		$(".cambioColorTexto2").val(title2["color"]);
		$("#ColorTexto2").css({color: title2["color"]});
		

		$("#loadImagen img").attr('src', url);

		//actualiza la pre-visualizacion


		$("#intro").css({ 'background':'url("'+url+'")no-repeat center center fixed'});

		$("#intro h1").html(title1["texto"]);
		$("#intro h1").css({color: title1["color"]});
		$("#intro h4").html(title2["texto"]);
		$("#intro h4").css({color: title2["color"]});



		
	})
	.fail(function() {
		console.log("error");
	});
	

});


var typeIntrovideo =$("#radioPrimary1").is(':checked');
//console.log('Línea 7. typeIntro => ', typeIntrovideo);

if(typeIntrovideo){


	$("#video").show();
	$("#loadVideo").show();
	$("#intro").hide();
	$("#loadImagen").hide();
	

}else {

	$("#intro").show();
	$("#loadImagen").show();
	$("#video").hide();
	$("#loadVideo").hide();



}


/*==========================================================
=            Intro configura la image de fondo            =
=============================================================*/


urlIntro = $("#urlIntro").val();

$("#intro").css({ 'background':'url("'+urlIntro+'")no-repeat center center fixed'});


/*==========================================================
=            configura <!-- Color Picker -->         =
=============================================================*/

//color picker with addon inicializa el datapicker

$('.my-colorpicker').colorpicker()


$('#title1Color').on('colorpickerChange', function(event) {
	
	$('#title1Color .fa-square').css('color', event.color.toString());
	
	var colorTitle = event.color.toString();

	$(".guardarIntro").attr('colorTitle', colorTitle);

	$(".title1").css('color', colorTitle); 


	//console.log($(".guardarIntro").attr('colorTitle'));
	     
});


$('#title2Color').on('colorpickerChange', function(event) {
	
	$('#title2Color .fa-square').css('color', event.color.toString());
	
	var colorSubTitle = event.color.toString();

	$(".guardarIntro").attr('colorSubTitle', colorSubTitle);

	$(".title2").css('color', colorSubTitle)
     
});


/*=============================================
=            Actualiza el titulo          =
=============================================*/
$(".cambioTituloTexto1").change(function(event) {

	
	var title = $(this).val();
	var typeIntro = $(".guardarIntro").attr('typeint');
	//console.log('Línea 268. typeIntro => ', typeIntro);
	
	$(".guardarIntro").attr('title', title);

	$(".title1").html(title);

	//console.log('Línea 274. title1 => ', $(".title1").html());

});

/*=============================================
=            Actualiza el subtitulo          =
=============================================*/
$(".cambioSubTituloTexto").change(function(event) {

	
	var subtitle = $(this).val();

	$(".guardarIntro").attr('subTitle', subtitle);

	$(".title2").html(subtitle);

	//console.log('Línea 274. title2 => ', $(".title2").html());

});

/*=============================================
=            Actualiza la Imagen         =
=============================================*/
var imagen = null;

$(".subirImgProducto").change(function(){


	imagen = this.files[0];

	//console.log(imagen);

	$(".guardarIntro").attr('urlNew', imagen);

	//console.log($(".guardarIntro").attr('urlNew'));

	/*==============================================================
	=    VALIDAMOS EL FORMATO  DE LA IMAGE SEA JPG O PNG	     =
	===============================================================*/

	if(imagen["type"] !="image/jpeg" && imagen["type"] !="image/png"){

		$(".subirImgProducto").val("");

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

		$(".subirImgProducto").val("");

		

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

			$(".previsualizarImagen").attr('src', rutaImagen);

			urlIntro = rutaImagen;

			$("#intro").css({ 'background':'url("'+urlIntro+'")no-repeat center center fixed'});

		

		});






	}



});

/*=============================================
=            Actualiza la Video         =
=============================================*/
var video = null;
$(".subirVideo").change(function(){


	video = this.files[0];





	/*==============================================================
	=    VALIDAMOS EL FORMATO  DEL VIDEO DEBE SER MP4	     =
	===============================================================*/
	if(video["type"] !="video/mp4"){

		$(".subirVideo").val("");

		

		Swal.fire({

			title: "Error al subir el video",
			text : "¡El video debe estar en formato MP4",
			icon : "error",
			confirmButtonText: "¡Cerrar!"

		});



		/*==============================================================
		=    VALIDAMOS EL TAMAÑO  DEL VIDEO MAX 15 MB      =
		===============================================================*/


	}else if(video["size"]> 15000000){

		$(".subirVideo").val("");

		

		Swal.fire({

			title: "Error al subir el video",
			text : "¡El video no debe pesar más de 15MB!",
			icon : "error",
			confirmButtonText: "¡Cerrar!"

		});



	}else{


		/*==============================================================
		=    PREVISUALIZAMOS DEL VIDEO    =
		===============================================================*/

		var datosvideo = new FileReader;

		datosvideo.readAsDataURL(video);

		$(datosvideo).on('load', function(event) {
			var rutavideo = event.target.result;

			// Actualiza la previsualizacion del video
			$("#video video").attr('src', rutavideo);

			$("#preview-video").attr('src', rutavideo);

			
		});	


	}



});

/*=============================================
=           Guarda cambios       =
=============================================*/
$(".guardarIntro").click(function(event) {
	
	var id = $(this).attr('id');
	var title = $(this).attr('title');
	var colorTitle = $(this).attr('colorTitle');
	var subTitle = $(this).attr('subTitle');
	var colorSubTitle = $(this).attr('colorSubTitle');
	var url = $(this).attr('url');
	
	var type = $(this).attr('typeInt');
	var urlNew = null;
	
	if(type =="imagen"){

		urlNew= imagen;

	}else{
		urlNew = video;
	}
	


	/*console.log('Línea 289. title => ', title);
	console.log('Línea 289. id => ', id);
	console.log('Línea 289. colorTitle => ', colorTitle);
	console.log('Línea 289. subTitle => ', subTitle);
	console.log('Línea 289. colorSubTitle => ', colorSubTitle);
	console.log('Línea 289. url => ', url);
	console.log('Línea 289. urlNew => ', urlNew);
	console.log('Línea 289. type => ', type); */

	var title1 = {"texto": title, 
				"color": colorTitle};

	var title1Json = JSON.stringify(title1);

	var title2 = {"texto": subTitle, 
				"color": colorSubTitle};

	var title2Json = JSON.stringify(title2);

	var datos = new FormData();

	datos.append('id', id);
	datos.append('state', "1");
	datos.append('title1', title1Json);
	datos.append('title2', title2Json); 
	datos.append('url', url);
	datos.append('urlNew', urlNew);
	datos.append('type2', type);

	

	$.ajax({
		url:"ajax/intro.ajax.php",
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



