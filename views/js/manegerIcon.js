/*=============================================
CARGAR LA TABLA DINÁMICA DE SUBCATEGORÍAS
=============================================*/


$.ajax({

    url:"ajax/tableIcons.ajax.php",

    success:function(respuesta){
       
     //  console.log("respuesta", respuesta);

    }

});

$(".tableIcons").DataTable({

    "ajax": "ajax/tableIcons.ajax.php",
    "deferRender":true,
    "retrieve": true,
    "processing":true,
    "lengthMenu":[[4, 5, 10, 20, 25, 50, -1], [4, 5, 10, 20, 25, 50, "Todos"]],
    "iDisplayLength": 10,
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

$(".icono").change(function(){

    $(".idIconCode").val("")

    cadena  = $(".icono").val()
   
    patron = /^<i class="./

    if(patron.test(cadena)){

                // se crea un div con el elemento del icono
                $("#iconoView").html($(".icono").val())
                // se crea un objeto nuevo con el contenido del div iconoView 
                let objeto= $("div#iconoView i");
            
                // se crea un objeto con el elemento seleccionado i

                let clase = objeto[0];
                // se dibuja el icono seleccionado
                $("#iconSel2").html('<i class="'+clase.className+ ' fa-5x"></i>')

                $(".idIconCode").val(clase.className)


    }else{

        Swal.fire({
            title: 'Error!',
            text: '¡Solo ingrese el codigo HTML del icono. Ejemplo: <i class="fas fa-atlas"></i>!',
            icon: 'error',
            confirmButtonText: '¡Cerrar!'
          });

        return;




    }
})

$("#modal-default").on("click", ".btnaddIcon", function(event){

    if($("#modal-default .icono").val() != "" && $("#modal-default .idIconCode").val() != ""){

        //let icon = $(".icono").val()
        let icon = $(".icono").val()
        let code = $(".idIconCode").val()

      
        var datos = new FormData()
        datos.append('icon', icon)
        datos.append('code', code)
        
        $.ajax({
            url:"ajax/icon.ajax.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
        })
        .done(function(respuesta) {

            console.log('Línea 483. respuesta => ', respuesta);
            //if(respuesta == "ok"){


                Swal.fire({
                    title: 'Guardado!',
                    text: 'El icono se ha agregado correctamente',
                    icon: 'success',
                    confirmButtonText: '¡Cerrar!'
                }).then(function(result){
                      
                    if (result.value) {
    
                       window.location = window.location.href;
        
                    }
                })
               
        //


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
			text: 'Debe ingresar el codigo HTML del icono',
			icon: 'error',
			confirmButtonText: '¡Cerrar!'
          });
          
        
    }


})

/*=============================================
ELIMINAR USUARIO
=============================================*/
$(".tableIcons").on("click", ".btnDeleteIcon", function(){

    var idIcon = $(this).attr("idIcon");
    console.log('Línea 157. idPerfil => ', idIcon);
    
  
  
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
  
        window.location = "index.php?ruta=admIcon&id="+idIcon;
  
      }
  
    })
  
  })
