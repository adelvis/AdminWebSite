<?php


class ControllerSections
{

	/*===================================================
	=  BUSCAR LOS DATOS DE UN BLOQUE        =
	===================================================*/
    static public function ctrGetBlocks($item, $value)
	{

		$table = "blocks";

	
		$answer = ModelSections::mdlGetBlocks($table, $item, $value);

		return $answer;




	}

	/*===================================================
	=  ACTUALIZA LOS DATOS DE UN BLOQUE        =
	===================================================*/
	static public function ctrUpdateBlock($value){

		$table = "blocks";

		

		/*==========================================
		=          Validar imagen          =
		==========================================*/
		$route = $value["imgOld"];	

		if(isset($value["imgNew"]["tmp_name"]) && !empty($value["imgNew"]["tmp_name"])){


				/*====================================================
				=         Definimos medidad imagen portada          =
				====================================================*/
				list($width, $height) = getimagesize($value["imgNew"]["tmp_name"]);

				$new_Width =1366;

				$new_height=768;


				/*==================================================================================
				=    De acurdo al tipo de la imagen aplicamos  las funciones por defecto         =
				===================================================================================*/

				if($value["imgNew"]["type"]=="image/jpeg"){
					
					/*==========================================
					=    Guardamos la imagen        =
					==========================================*/
					$route ="../views/img/photos/". $value["imgNew"]["name"];

					$origin = imagecreatefromjpeg($value["imgNew"]["tmp_name"]);

					$destiny = imagecreatetruecolor($new_Width, $new_height);

					imagecopyresized($destiny, $origin, 0, 0, 0, 0, $new_Width, $new_height, $width, $height);

					imagejpeg($destiny, $route);


				}

				if($value["imgNew"]["type"]=="image/png"){

					/*==========================================
					=    Guardamos la imagen        =
					==========================================*/
					$route ="../views/img/photos/". $value["imgNew"]["name"];

					$origin = imagecreatefrompng($value["imgNew"]["tmp_name"]);

					$destiny = imagecreatetruecolor($new_Width, $new_height);

					imagealphablending($destiny, FALSE);

					imagesavealpha($destiny, TRUE);

					imagecopyresized($destiny, $origin, 0, 0, 0, 0, $new_Width, $new_height, $width, $height);

					imagepng($destiny, $route);



				}


				$route = substr($route, 3);

		
		}
		

		$answer = ModelSections::mdlUpdateBlock($table, $value, $route);

		return $answer;







	}

	/*===================================================
	=  SUBIR MULTIMEDIA        =
	===================================================*/
	static public function ctrSendMultimedia($datos, $typeBlock){

		

		if(isset($datos["tmp_name"]) && !empty($datos["tmp_name"])){

			/*====================================================
			=         Definimos medidad imagen      =
			====================================================*/
			list($width, $height) = getimagesize($datos["tmp_name"]);

			$new_Width =1280;
			$new_height=720;

			/*===============================================================================
			=        Creamos el directorios donde vamos a guardar  la foto multimedia      =
			===============================================================================*/
			//admin:///var/www/html/AdminWebSite/views/img/clientes/Frimarca.jpeg
			if ($typeBlock=="customers"){

				$new_Width =1000;
				$new_height=1000;

				$directorio = "../views/img/clientes";

			}elseif ($typeBlock=="gallery") {
				# code...
				$directorio = "../views/img/gallery";
				
			}
			 

			/*==================================================================================
			=    De acuerdo al tipo de la imagen aplicamos  las funciones por defecto         =
			===================================================================================*/

			if($datos["type"]=="image/jpeg"){

				/*==========================================
				=    Guardamos la imagen        =
				========================================== */

				
				$rutaMultimedia = $directorio."/".$datos["name"];

				$origin = imagecreatefromjpeg($datos["tmp_name"]);

				$destiny = imagecreatetruecolor($new_Width, $new_height);

				imagecopyresized($destiny, $origin, 0, 0, 0, 0, $new_Width, $new_height, $width, $height);

				imagejpeg($destiny, $rutaMultimedia);



			} 
			if($datos["type"]=="image/png"){

				/*==========================================
				=    Guardamos la imagen        =
				==========================================*/

			

				$rutaMultimedia =$directorio."/".$datos["name"];

				$origin = imagecreatefrompng($datos["tmp_name"]);

				$destiny = imagecreatetruecolor($new_Width, $new_height);

				imagealphablending($destiny, FALSE);

				imagesavealpha($destiny, TRUE);

				imagecopyresized($destiny, $origin, 0, 0, 0, 0, $new_Width, $new_height, $width, $height);

				imagepng($destiny, $rutaMultimedia);


				
			}


			return $rutaMultimedia;

		}



	}

	/*===================================================
	= ACTUALIZA LOS DATOS DE UN BLOQUE CON MULTIMEDIA     =
	===================================================*/
	static public function ctrUpdateBlockMultimedia($datos){

		/*======================================================================
		=            ELIMINAR LAS FOTOS DE MULTIMEDIA DE LA CARPETA            =
		======================================================================*/

		$item = "id";

		$value = $datos['id'];

		$table = "blocks";
			
		$getBlock = ModelSections::mdlGetBlocks($table, $item, $value);
			
		# Busca las imagenes originales
		$multimediaBD = json_decode($getBlock["img"], true);

		$multimediaEdit  = json_decode($datos["multimedia"], true);

		$objectMultimediaBD = array();
		$objectMultimediaEdit  = array();

		foreach ($multimediaBD as $key => $value) {
			# code...
			array_push($objectMultimediaBD, $value["foto"]);

		}

		foreach ($multimediaEdit as $key => $value) {
			# code...
			array_push($objectMultimediaEdit, $value["foto"]);
			
		}
	
		

		$deletePhoto = array_diff($objectMultimediaBD, $objectMultimediaEdit);
	
		foreach ($deletePhoto as $key => $value) {
			# code...

			unlink("../".$value);

		}
	

		$route = $datos["multimedia"];
		$answer = ModelSections::mdlUpdateBlock($table, $datos, $route);

		return $answer;


	}

	/*===================================================
	= BUSCA LOS SERVICIOS EN LA TABLA DE CATEGORIA     =
	===================================================*/
	static public function ctrGetCategories($item, $value){

		$table = "categories";
	
		$answer = ModelSections::mdlGetCategories($table, $item, $value);

		return $answer;


	}

	/*===================================================
	= AGREGA A LA TABLA DE CATEGORIA     =
	===================================================*/
	static public function ctrAddCategory($datos){

		$table = "categories";

		$route= null;


		if($datos['type']=="service"){

			/*==========================================
			=          Validar imagen          =
			==========================================*/
			$route = "../views/img/services/default.jpg";	

		
			if(isset($datos["imgNew"]["tmp_name"]) && !empty($datos["imgNew"]["tmp_name"])){


				/*====================================================
				=         Definimos medidad imagen portada          =
				====================================================*/
				list($width, $height) = getimagesize($datos["imgNew"]["tmp_name"]);

				$new_Width =1366;

				$new_height=768;


				/*==================================================================================
				=    De acurdo al tipo de la imagen aplicamos  las funciones por defecto         =
				===================================================================================*/

				if($datos["imgNew"]["type"]=="image/jpeg"){
					
					/*==========================================
					=    Guardamos la imagen        =
					==========================================*/
					$route ="../views/img/services/".$datos["imgNew"]["name"];

					$origin = imagecreatefromjpeg($datos["imgNew"]["tmp_name"]);

					$destiny = imagecreatetruecolor($new_Width, $new_height);

					imagecopyresized($destiny, $origin, 0, 0, 0, 0, $new_Width, $new_height, $width, $height);

					imagejpeg($destiny, $route);


				}

				if($datos["imgNew"]["type"]=="image/png"){

					/*==========================================
					=    Guardamos la imagen        =
					==========================================*/
					$route ="../views/img/services/".$datos["imgNew"]["name"];

					$origin = imagecreatefrompng($datos["imgNew"]["tmp_name"]);

					$destiny = imagecreatetruecolor($new_Width, $new_height);

					imagealphablending($destiny, FALSE);

					imagesavealpha($destiny, TRUE);

					imagecopyresized($destiny, $origin, 0, 0, 0, 0, $new_Width, $new_height, $width, $height);

					imagepng($destiny, $route);



				}


				$route = substr($route, 3);

			

		
			}

			


		}else{

			$route = $datos['icon'];
		}



		$answer = ModelSections::mdlAddCategory($table, $datos, $route);


		return $answer;

		
		
	}

	/*===================================================
	= ACTUALIZA  TABLA DE CATEGORIA     =
	===================================================*/
	static public function ctrEditCategory($datos){

		$table = "categories";

		$route= null;

		if($datos['type']=="service"){

			/*==========================================
			=          Validar imagen          =
			==========================================*/
			$route = $datos['imgOld'];	

			if(isset($datos["imgNew"]["tmp_name"]) && !empty($datos["imgNew"]["tmp_name"])){


				/*==========================================
				=         Borramos la imagen anterior         =
				==========================================*/

				unlink("../".$route);

				/*====================================================
				=         Definimos medidad imagen portada          =
				====================================================*/
				list($width, $height) = getimagesize($datos["imgNew"]["tmp_name"]);

				$new_Width =1366;

				$new_height=768;

				/*==================================================================================
				=    De acurdo al tipo de la imagen aplicamos  las funciones por defecto         =
				===================================================================================*/

				if($datos["imgNew"]["type"]=="image/jpeg"){
					
					/*==========================================
					=    Guardamos la imagen        =
					==========================================*/
					$route ="../views/img/services/".$datos["imgNew"]["name"];

					$origin = imagecreatefromjpeg($datos["imgNew"]["tmp_name"]);

					$destiny = imagecreatetruecolor($new_Width, $new_height);

					imagecopyresized($destiny, $origin, 0, 0, 0, 0, $new_Width, $new_height, $width, $height);

					imagejpeg($destiny, $route);


				}

				if($datos["imgNew"]["type"]=="image/png"){

					/*==========================================
					=    Guardamos la imagen        =
					==========================================*/
					$route ="../views/img/services/".$datos["imgNew"]["name"];

					$origin = imagecreatefrompng($datos["imgNew"]["tmp_name"]);

					$destiny = imagecreatetruecolor($new_Width, $new_height);

					imagealphablending($destiny, FALSE);

					imagesavealpha($destiny, TRUE);

					imagecopyresized($destiny, $origin, 0, 0, 0, 0, $new_Width, $new_height, $width, $height);

					imagepng($destiny, $route);



				}


				$route = substr($route, 3);




			}


		}else{

			$route = $datos['imgOld'];	

		}
		
	
		
		$answer = ModelSections::mdlEditCategory($table, $datos, $route);


		return $answer;






	}

	/*===================================================
	= ELIMINAR UN REGISTRO DE LA  TABLA DE CATEGORIA     =
	===================================================*/
	static public function ctrDeleteCategory($datos){

		$table = "categories";

		$id = $datos["id"];

		if($datos['type']=="service"){

			if($datos["imgOld"] != "" && $datos["imgOld"] != "../views/img/services/default.jpg"){

				unlink($datos["imgOld"]);		

			}

		}

		$answer = ModelSections::mdlDeleteCategory($table,$id);

		return $answer;

		

	}
	/*===================================================
	= BUSCA LOS ICONOS EN LA TABLA DE ICONS     =
	===================================================*/
	static public function ctrGetIcons($item, $value){

		$table = "icons";
	
		$answer = ModelSections::mdlGetIcons($table, $item, $value);

		return $answer;


	}

	/*=========================================================
	=  Las secciones o bloques de una pagina activos       =
	===========================================================*/
	static public function ctrGetSections()
	{
		# code...

		$table ="sections";

		
		$answer = ModelSections::mdlGetSetions($table);

		return $answer;



	}
	/*=========================================================
	= Actualiza la posiciòn u orden de un bloque      =
	===========================================================*/
	static public  function ctrUpdatePositionBlock($value)
	{
		# code...
		$table ="blocks";

		
		$answer = ModelSections::mdlUpdatePositionBlock($table, $value);

		return $answer;


	}
	/*=========================================================
	= Actualiza la posiciòn u orden de un bloque      =
	===========================================================*/
	static public  function ctrUpdatePublished($value)
	{
		# code...
		$table ="blocks";

		
		$answer = ModelSections::mdlUpdatePublished($table, $value);

		return $answer;


	}

	/*=========================================================
	=  Bloques sin publicacion    =
	===========================================================*/
	static public function ctrGetBlocksNotPublished(){

		$table ="blocks";

		$answer = ModelSections::mdlGetBlocksPublished($table);

		return $answer;



	}
}