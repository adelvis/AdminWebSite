<?php


class ControllerIcon{


	/*===================================================
	=  BUSCAR LOS ICONOS     =
	===================================================*/
    static public function ctrGetIcons($item, $value)
	{

		$table = "icons";

	
		$answer = ModelIcons::mdlGetIcon($table, $item, $value);

		return $answer;
	}


	/*===================================================
	=  AGREGAR LOS ICONOS     =
	===================================================*/
    static public function ctrAddIcon($value)
	{

		$table = "icons";
	
		$answer = ModelIcons::mdlAddIcon($table, $value);
	
		return $answer;
	}

	/*=============================================
	ELIMINAR PERFIL
	=============================================*/

	static public function ctrDeleteIcon(){

		if(isset($_GET["id"])){

			$table ="icons";
			$datos = $_GET["id"];

		    $answer = ModelIcons::mdlDeleteIcon($table, $datos);

			if($answer == "ok"){

				echo'<script>

				Swal.fire({

					  icon: "success",
					  title: "El icono ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  
					  }).then(function(result) {
								if (result.value) {

									let url = window.location.href;
									let pos = url.indexOf("&id");									
									url2= url.substring(0, pos);									
									window.location = url2;


								}
							})

				</script>';

			}		

		}

	}


}
