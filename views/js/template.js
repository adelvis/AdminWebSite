 
/*=============================================
=  enable all tooltips in the document       =
=============================================*/

 $('[data-toggle="tooltip"]').tooltip();


/*===========================================
=  Obtine los datos de configuración     =
===========================================*/

$.ajax({
	url: 'ajax/template.ajax.php',
	
})
.done(function(respuesta) {
	
  
	
	/*===========================================
	=   Color de los titulos de la secciones       =
	===========================================*/

	colorTitleBlock = JSON.parse(respuesta).title_text_color;

	$(".colorTitle").css({"color":colorTitleBlock});


})
.fail(function() {
	console.log("error");
});


 
