/*=============================================
CAMBIAR INFORMACIÓN DE COMERCIO
=============================================*/



var email = $("#email").val();
var name = $("#nombre").val();
var slogan = $("#slogan").val();
var phone = $("#telefono").val();
var business_hours = $("#business_hours").val();
var address = $("#direccion").val();

var contact1 = {"nombre": $("#NombreContacto").val(),
				"titulo": $("#titulo").val()};

var contact1String =JSON.stringify(contact1);

var contact2 = {"nombre": $("#NombreContacto2").val(),
				"titulo": $("#titulo2").val()};

var contact2String =JSON.stringify(contact2);				




var validaEmail = validarEmail($("#email").val(), "email");



/*=============================================
GUARDAR LA INFORMACION
=============================================*/
$(".cambioInformacion").change(function(event) {
	/* Act on the event */
	name = $("#nombre").val();
	email = $("#email").val();	
	console.log('Línea 38. email => ', email);
	slogan = $("#slogan").val();
	phone = $("#telefono").val();
	business_hours = $("#business_hours").val();
	address = $("#direccion").val();

	contact1 = {"nombre": $("#NombreContacto").val(),
				"titulo": $("#titulo").val()};
	contact1String =JSON.stringify(contact1);

	contact2 = {"nombre": $("#NombreContacto2").val(),
				"titulo": $("#titulo2").val()};
	contact2String =JSON.stringify(contact2);

	$("#guardarInformacion").click(function(event) {
		
		/* Act on the event */
		cambiarInformacion();

	});			


});
/*=============================================
FUNCIÓN PARA CAMBIAR LA INFORMACIÓN
=============================================*/

function cambiarInformacion(){

		

	if(email=="" || validaEmail==false ){
		email= " ";
	};

	var datos = new FormData();

	datos.append('name', name);
	datos.append("slogan", slogan);
	datos.append("name_contact1", contact1String);
	datos.append("name_contact2", contact2String);
	datos.append("address", address);
	datos.append("email_contact", email);
	datos.append("phone_contact", phone);
	datos.append("business_hours", business_hours);
	



	$.ajax({
		url:"ajax/commerce.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
	})
	.done(function(respuesta) {
		console.log('Línea 96. respuesta => ', respuesta);
		console.log("success");


		Swal.fire({
		  title: 'Cambios guardados!',
		  text: '¡El comercio ha sido actualizado correctamente!',
		  icon: 'success',
		  confirmButtonText: '¡Cerrar!'
		})

	})
	.fail(function() {
		console.log("error");
	});
	


}

/*=============================================
FORMATEAR LOS INPUT
=============================================*/

$("#email").focus(function(){

	$(".alert").remove();
})


/*=============================================
VALIDA EMAIL CUANDO PIERDE EL ENFOQUE
=============================================*/

$("#email").blur(function(){
    		
    validaEmail= validarEmail($("#email").val(), "email");
	console.log('Línea 622. validaEmail => ', validaEmail);		
});


/*===================================================
	=         Validar Email         =
===================================================*/


function validarEmail($mailval, $type) {

	/* Act on tevent */

	if($mailval != ""){

		var expresion= /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;

		if(! expresion.test($mailval)){

			

			if($type == "email"){

				$("#email").parent().after('<div class="alert alert-warning"><strong>Error! </strong>No es un correo valido</div>');
		
			}

			if($type == "emailContact"){

				$("#emailContacto").parent().after('<div class="alert alert-warning"><strong>Error! </strong>No es un correo valido</div>');
		
			}

			
			return false;


		}else{

			return true;

		}

	
	}else{



		return true;

	}



};


/*=====================================
=            SUBIR LOGOTIPO           =
======================================*/

$("#subirLogo").change(function() {
	/* Act on the event */

	var imagenLogo = this.files[0];
	console.log('Línea 195. imagenLogo => ', imagenLogo);

	/*==============================================================
	=    VALIDAMOS EL FORMATO  DE LA IMAGE SEA JPG O PNG	     =
	===============================================================*/

	if(imagenLogo["type"] !="image/jpeg" && imagenLogo["type"] !="image/png"){

		$("#subirLogo").val();



		Swal.fire({

			title: "Error al subir la imagen",
			text : "¡La imagen debe estar en formato JPG o PNG",
			icon : "error",
			confirmButtonText: "¡Cerrar!"

		});

		/*==============================================================
		=    VALIDAMOS EL TAMAÑO  DE LA IMAGE      =
		===============================================================*/

	}else if(imagenLogo["size"]> 2000000){

		$("#subirLogo").val();

	
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

		datosImagen.readAsDataURL(imagenLogo);

		$(datosImagen).on('load', function(event) {
			var rutaImagen = event.target.result;

			$(".previsualizarLogo").attr('src', rutaImagen);
		});


	}

	/*==============================================================
				=   GUARDAR EL LOGO	     =
	===============================================================*/
	 $("#guardarLogo").click(function(){

	 
  		var datos = new FormData();
  		datos.append("imagenLogo", imagenLogo);


  		$.ajax({
  			url:"ajax/commerce.ajax.php",
			method: "POST",
			data: datos,
			cache: false,
			contentType: false,
			processData: false,
  		})
  		.done(function(respuesta) {
  			console.log('Línea 271. respuesta => ', respuesta);
  			console.log("success");

  			

  			Swal.fire({
				      title: "Cambios guardados",
				      text: "¡La plantilla ha sido actualizada correctamente!",
				      icon: "success",
				      confirmButtonText: "¡Cerrar!"
				    });
  		})
  		.fail(function() {
  			console.log("error");
  		});
  		




  	})



});


/*=====================================
=            SUBIR ICONO          =
======================================*/

$("#subirIcono").change(function() {
	/* Act on the event */

	var imagenIcono = this.files[0];

	/*==============================================================
	=    VALIDAMOS EL FORMATO  DE LA IMAGE SEA JPG O PNG	     =
	===============================================================*/

	if(imagenIcono["type"] !="image/jpeg" && imagenIcono["type"] !="image/png"){

		$("#subirIcono").val();

		

		Swal.fire({

			title: "Error al subir la imagen",
			text : "¡La imagen debe estar en formato JPG o PNG",
			icon : "error",
			confirmButtonText: "¡Cerrar!"

		});

		/*==============================================================
		=    VALIDAMOS EL TAMAÑO  DE LA IMAGE      =
		===============================================================*/

	}else if(imagenIcono["size"]> 2000000){

		$("#subirIcono").val();

		

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

		datosImagen.readAsDataURL(imagenIcono);

		$(datosImagen).on('load', function(event) {
			var rutaImagen = event.target.result;

			$(".previsualizarIcono").attr('src', rutaImagen);
		});


	}

	/*==============================================================
				=   GUARDAR EL ICONO	     =
	===============================================================*/
	 $("#guardarIcono").click(function(){

  		var datos = new FormData();
  		datos.append("imagenIcono", imagenIcono);
		console.log("icono", imagenIcono );
		
  		$.ajax({

  			url:"ajax/commerce.ajax.php",
			method: "POST",
			data: datos,
			cache: false,
			contentType: false,
			processData: false,
  		})
  		.done(function(res) {
			  console.log("success");
			  console.log(res);
  			Swal.fire({
			  title: 'Cambios guardados!',
			  text: '¡La plantilla ha sido actualizada correctamente!',
			  icon: 'success',
			  confirmButtonText: '¡Cerrar!'
			})

  		})
  		.fail(function() {
  			console.log("error");
  		});
  		

  		

  	})



});



/*================================================
=       Activar/Desactivar check de transparencia     =
=================================================*/

$(".seleccionarTransp").change(function(event) {
	/* Act on the event */
	var checkboxChecked = $(this).is(':checked');

	if (checkboxChecked){

		$(this).attr('validarTransparecia','1');


	}else{


		$(this).attr('validarTransparecia', '0');

	}



});


/*=====================================
=        CAMBIAR COLOR       =
======================================*/
var tituloSite = $("#tituloSite").val();

$(".cambioTitulo").change(function(event) {
	/* Act on the event */
	 tituloSite = $("#tituloSite").val();

});


$("#guardarColores").click(function() {

	var barraSuperior = $("#barraSuperior").val();
	console.log('Línea 458. barraSuperior => ', barraSuperior);
	

	var textoSuperior = $("#textoSuperior").val();
	console.log('Línea 462. textoSuperior => ', textoSuperior);

	var topTextTransp = $("#topTextTransp").val();
	console.log('Línea 465. topTextTransp => ', topTextTransp);
	
	var bottom_bar = $("#bottom_bar").val();
	console.log('Línea 468. bottom_bar => ', bottom_bar);
	
	var bottom_text = $("#bottom_text").val();
	console.log('Línea 471. bottom_text => ', bottom_text);

	var footer_color = $("#footer_color").val();
	console.log('Línea 474. footer_color => ', footer_color);

	var title_text_color = $("#title_text_color").val();
	console.log('Línea 477. title_text_color => ', title_text_color);

	var transparencia = $(".seleccionarTransp").attr('validarTransparecia');
	console.log('Línea 480. transparencia => ', transparencia);

	
		var datos = new FormData();

		datos.append('tituloSite', tituloSite);
		datos.append('barraSuperior', barraSuperior);
		datos.append('textoSuperior', textoSuperior);
		datos.append('topTextTransp', topTextTransp);
		datos.append('bottom_bar', bottom_bar);
		datos.append('bottom_text', bottom_text);
		datos.append('footer_color', footer_color);
		datos.append('title_text_color', title_text_color);
		datos.append('transparet', transparencia);

		$.ajax({
			url:"ajax/commerce.ajax.php",
			method: "POST",
			data: datos,
			cache: false,
			contentType: false,
			processData: false,
		})
		.done(function(respuesta) {
			console.log('Línea 483. respuesta => ', respuesta);
			//console.log("success");

			Swal.fire({
			  title: 'Cambios guardados!',
			  text: '¡La plantilla ha sido actualizada correctamente!',
			  icon: 'success',
			  confirmButtonText: '¡Cerrar!'
			})

			
		})
		.fail(function() {
			console.log("error");
		});
		




	});








/*=============================================
=    List of pre selected colors (hex format)         =
=============================================*/
 $('#bottomBar, #top_bar').colorpicker({
            colorSelectors: {
            	'#2BBBAD': '#2BBBAD',
                '#4285F4': '#4285F4',
                '#aa66cc': '#aa66cc',
                '#37474F': '#37474F',
                '#2E2E2E': '#2E2E2E',
                '#4B515D': '#4B515D',
                '#3F729B': '#3F729B'
                

              }
 });

  $('#footerColor').colorpicker({
            colorSelectors: {
            	'#00695c': '#00695c',
                '#0d47a1': '#0d47a1',
                '#9933CC': '#9933CC',
                '#212121': '#212121',
                '#3E4551': '#3E4551',
                '#1C2331': '#1C2331',
                '#263238': '#263238'
                

              }
 });


 /*================================================
=        CAMBIAR COLOR DE REDES SOCIALES     =
=================================================*/


var checkBox=  $(".seleccionarRed");

$("input[name='colorRedSocial']").change(function(event) {

	
	var color = $(this).val();
	
	var colorNet= null;

	var iconos = $(".redSocial");
	var network = ["facebook-f", "youtube", "twitter", "google-plus-g", "instagram"];
	var network2 = ["facebook", "youtube", "twitter", "google-plus", "instagram"];


	if(color == "color"){

		colorNet= "Color";

	}else if (color=="blanco"){

		colorNet= "Blanco";

	}else{

		colorNet= "Negro";

	}

	for (var i = 0; i < iconos.length; i++) {
		$(iconos[i]).attr("class", "fab fa-"+network[i]+" "+network2[i]+colorNet+" redSocial");
		$(checkBox[i]).attr('estilo', network2[i]+colorNet);

	}

	crearDatosJsonRedes();



});

/*================================================
=        CAMBIAR URL DE REDES SOCIALES     =
=================================================*/

$(".cambiarUrlRed").change(function() {
	/* Act on the event */

	var cambiarUrlRed = $(".cambiarUrlRed");

	for (var i = 0; i < cambiarUrlRed.length; i++) {
		$(checkBox[i]).attr("ruta", $(cambiarUrlRed[i]).val());
	}

	crearDatosJsonRedes();



});



/*=================================================================
=   AGREGAR RED SOCIAL SI MARCA DE LO CONTRARIO  QUITAR RED SOCIAL   =
====================================================================*/


$('.seleccionarRed').change(function(event) {
	/* Act on the event */
	var checkboxChecked = $(this).is(':checked');

	if (checkboxChecked){

		$(this).attr('validarRed', $(this).attr('red'));

		crearDatosJsonRedes();


	}else{

		$(this).attr('validarRed', '');

		crearDatosJsonRedes();




	}
    
});

/*================================================
=       CREAR DATOS JSON PARA ALMACENAR EN BD    =
=================================================*/

function crearDatosJsonRedes(){

	var redesSociales= [];

	for (var i = 0; i < checkBox.length; i++) {

		var checkboxChecked2 = $(checkBox[i]).is(':checked');
		
		
		if($(checkBox[i]).attr('validarRed') !="" && checkboxChecked2){


			redesSociales.push({"red": $(checkBox[i]).attr('red'),
								"estilo": $(checkBox[i]).attr('estilo'),
								"url": $(checkBox[i]).attr('ruta'),
								"activo": 1});


		}else{

			redesSociales.push({"red": $(checkBox[i]).attr('red'),
								"estilo": $(checkBox[i]).attr('estilo'),
								"url": $(checkBox[i]).attr('ruta'),
								"activo": 0});




		}


		$("#valorRedesSociales").val(JSON.stringify(redesSociales));



	}

}


/*================================================
=     GUARDAR REDES SOCIALES    =
=================================================*/

$("#guardarRedesSociales").click(function() {
	/* Act on the event */
	var valorRedesSociales = $("#valorRedesSociales").val();
	console.log('Línea 690. valorRedesSociales => ', valorRedesSociales);



	if(valorRedesSociales !=""){


		var datos = new FormData();

		datos.append('redesSociales', valorRedesSociales);


		$.ajax({

			url:"ajax/commerce.ajax.php",
			method: "POST",
			data: datos,
			cache: false,
			contentType: false,
			processData: false,
		})
		.done(function() {
			console.log("success");

			Swal.fire({
			  title: 'Cambios guardados!',
			  text: '¡La plantilla ha sido actualizada correctamente!',
			  icon: 'success',
			  confirmButtonText: '¡Cerrar!'
			})

			
		})
		.fail(function() {
			console.log("error");

			Swal.fire({
			  title: '¡Error!!',
			  text: '¡La plantilla no ha sido actualizada correctamente!',
			  icon: 'error',
			  confirmButtonText: '¡Cerrar!'
			})

			

		});
			





	}
	



});

//color picker with addon inicializa el datapicker

$('.my-colorpicker').colorpicker()


// Cambia el color de cuadro

$('#colorTitle').on('colorpickerChange', function(event) {
	
    $('#colorTitle .fa-square').css('color', event.color.toString());
     
});

$('#footerColor').on('colorpickerChange', function(event) {
	
    $('#footerColor .fa-square').css('color', event.color.toString());
     
});


$('#bottonTextColor').on('colorpickerChange', function(event) {
	
    $('#bottonTextColor .fa-square').css('color', event.color.toString());
     
});

$('#bottomBar').on('colorpickerChange', function(event) {
	
    $('#bottomBar .fa-square').css('color', event.color.toString());
     
});


$('#topTextTranspColor').on('colorpickerChange', function(event) {
	
    $('#topTextTranspColor .fa-square').css('color', event.color.toString());
     
});

$('#textSuperiorColor').on('colorpickerChange', function(event) {
	
    $('#textSuperiorColor .fa-square').css('color', event.color.toString());
     
});

$('#top_bar').on('colorpickerChange', function(event) {
	
    $('#top_bar .fa-square').css('color', event.color.toString());
     
});


