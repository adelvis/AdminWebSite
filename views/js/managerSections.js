/*=============================================
=  jQuery UI sortable for the todo list   =
=============================================*/
var itemSlider = $(".itemList");

$('.todo-list').sortable({
    placeholder         : 'sort-highlight',
    handle              : '.handle',
    forcePlaceholderSize: true,
    zIndex              : 999999,
    stop: function(event){

        let resp = "error";
        
    	for (var i = 0; i < itemSlider.length; i++) {
    		
            var datos  = new FormData();
    		datos.append('id', event.target.children[i].id);
            datos.append('position', (i+1));
           
    		$.ajax({
    			url:"ajax/sections.ajax.php",
				method: "POST",
				data: datos,
				cache: false,
				contentType: false,
				processData: false,
    		})
    		.done(function(respuesta) {
                console.log("success");
                console.log(respuesta);
                if(i== itemSlider.length){


                        if(respuesta=="ok"){

                            Swal.fire({
                                title: 'Actualizado!',
                                text: 'El orden de los bloques se han actualizado correctamente',
                                icon: 'success',
                                confirmButtonText: '¡Cerrar!'
                            })


                        }else{


                            Swal.fire({
                                title: 'Error al guardar!',
                                text: 'No se pudo actualizar el orden de los bloques',
                                icon: 'error',
                                confirmButtonText: '¡Cerrar!'
                            });


                        }
        
                }

    		})
    		.fail(function() {
    			console.log("error");
    		});
    		


        }

      
        

    }
  })

  var id=0;

  $(".btnEditSection").click(function(){

        id = $(this).attr('id');

        console.log("id", id);

        $("#status").html(`<div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
        <input type="checkbox" class="custom-control-input" id="switchPublic" checked>
        <label class="custom-control-label" for="switchPublic">Publicar</label>
        </div>`)


  });


  $("#modalEdit").on("click", ".updatePublished", function(){

   
    var switchChecked = $("#switchPublic").is(':checked');

    if (!switchChecked ){

      
        var id_block = id;
        var published =0;

        console.log(id_block);
        console.log(published);

        var datos = new FormData();

        datos.append('id_block', id_block);
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

            console.log('Línea 121. respuesta => ', respuesta);
            if(respuesta=="ok"){

                Swal.fire({
                    title: 'Actualizado!',
                    text: 'se ha actualizado el estatus de publicación correctamente',
                    icon: 'success',
                    confirmButtonText: '¡Cerrar!'
                  }).then(function(result){
                                         
                    if (result.value) {
    
                       window.location = window.location.href;
        
                    }
                })
    
    
            }else{
    
    
                Swal.fire({
                    title: 'Error al guardar!',
                    text: 'No se pudo actualizar el estatus de publicación',
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
                text: 'No se pudo actualizar los datos',
                icon: 'error',
                confirmButtonText: '¡Cerrar!'
            });   
            
        });


    }else{
        
        Swal.fire({
            title: 'Error!',
            text: 'No ha realizado ningun cambio',
            icon: 'error',
            confirmButtonText: '¡Cerrar!'
        });

    }


  });

  $("#modalAdd").on("click", ".addPublished", function(){

        var id_block = $(".selectBlock").val();

        console.log(id_block);

        if(id_block !=""){

            Swal.fire({
                title: '¿Está seguro de publicar el bloque?',
                text: '¡Si no lo está puede cancelar la accíón!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Cancelar',
                confirmButtonText: 'Si, publicar!'
            }).then(function(result){
                  
                if (result.value) {

     
                    var datos = new FormData();
                    datos.append('id_block', id_block);
                    datos.append('published', 1);
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
                                title: "Actualizado!",
                                text: "El bloque se a publicado correctamente!",
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
                            title: 'Error al publicar!',
                            text: '¡Hubo problemas al publicar!',
                            icon: 'error',
                            confirmButtonText: '¡Cerrar!'
                          })
                    });
            
                }
            })





        }else{

            Swal.fire({
                title: 'Oops..',
                text: 'No ha seleccionado ningùn valor',
                icon: 'error',
                confirmButtonText: '¡Cerrar!'
            });


        }




  })