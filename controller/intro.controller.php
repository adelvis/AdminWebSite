<?php


/**
 * 
 */

class ControllerIntro
{
	
	

	static public function ctrGetIntro()
	{
		# code...

		$table ="intro";

		$item ="state";
		$value = "1";

		$answer = ModelIntro::mdlGetIntro($table, $item, $value);

		return $answer;



	}

	static public function ctrGetIntroByItem($item, $value){


		$table ="intro";

		$answer = ModelIntro::mdlGetIntro($table, $item, $value);

		return $answer;



	}

	static public function ctrUpdateIntro($value){

		$table ="intro";

		/*==========================================
		=          Validar imagen          =
		==========================================*/
		$route = $value["url"];	
		
		if($value["type"]== "imagen"){

			

			if(isset($value["urlNew"]["tmp_name"]) && !empty($value["urlNew"]["tmp_name"])){

					/*====================================================
					=         Definimos medidad imagen portada          =
					====================================================*/
					list($width, $height) = getimagesize($value["urlNew"]["tmp_name"]);

					$new_Width =1920;

					$new_height=1280;

					/*==================================================================================
					=    De acurdo al tipo de la imagen aplicamos  las funciones por defecto         =
					===================================================================================*/

					if($value["urlNew"]["type"]=="image/jpeg"){

						/*==========================================
						=    Guardamos la imagen        =
						========================================== */
						
						$route ="../views/img/backgrounds/imagenIntro.jpg";

						$origin = imagecreatefromjpeg($value["urlNew"]["tmp_name"]);

						$destiny = imagecreatetruecolor($new_Width, $new_height);

						imagecopyresized($destiny, $origin, 0, 0, 0, 0, $new_Width, $new_height, $width, $height);

						imagejpeg($destiny, $route);



					} 


					if($value["urlNew"]["type"]=="image/png"){

						/*==========================================
						=    Guardamos la imagen        =
						==========================================*/
						$route ="../views/img/backgrounds/imagenIntro.png";

						$origin = imagecreatefrompng($value["urlNew"]["tmp_name"]);

						$destiny = imagecreatetruecolor($new_Width, $new_height);

						imagealphablending($destiny, FALSE);

						imagesavealpha($destiny, TRUE);

						imagecopyresized($destiny, $origin, 0, 0, 0, 0, $new_Width, $new_height, $width, $height);

						imagepng($destiny, $route);


						
					}

					$route = substr($route, 3);



			}
			






		}else{

			if(isset($value["urlNew"]["tmp_name"]) && !empty($value["urlNew"]["tmp_name"])){
				
		

				if($value["urlNew"]["type"]=="video/mp4"){

					$route ="../views/video/videoIntro.mp4";

					if(move_uploaded_file($value["urlNew"]["tmp_name"], $route))
					{
					  $message ='File is successfully uploaded.';
					  $route = substr($route, 3);
					}
					else
					{
						//$message = 'There was some error moving the file to upload directory. Please make sure the upload directory is writable by web server.';
						return "ErrorUploadFile";
					}
				}
			}



		}

				
		$answer = ModelIntro::mdlUpdateIntro($value, $route);


		return $answer;



	}
}