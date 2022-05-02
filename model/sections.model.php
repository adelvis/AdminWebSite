<?php

require_once "connection.php";

/**
 * Clase Modelo Sections
 */
class ModelSections
{

    static public function mdlGetBlocks($table, $item, $value){



		if($item != null) {

            $stmt = Connection::connectionBd()->prepare("SELECT * FROM $table WHERE $item = :$item");

           	$stmt-> bindParam(":".$item, $value, PDO::PARAM_STR);

			$stmt->execute();

			return $stmt-> fetch();




		} else {

			$stmt = Connection::connectionBd()->prepare("SELECT * FROM $table");

			$stmt->execute();

			return $stmt-> fetchAll();



		}

		$stmt->close();

		$stmt = null; 




	}


	static public function mdlUpdateBlock($table, $value, $route){


		$stmt = Connection::connectionBd()->prepare("UPDATE $table SET `route`= :route,`title`=:title,`navbar_title`=:navbar_title,`description`=:description,`img`=:img,`backgroundcolor`=:backgroundcolor,`published`=:published WHERE `id`= :id");

		//return $value['id']." ".$value['route']." ".$value['title']." ".$value['navbar_title']." ".$value['description']." ".$value['backgroundcolor']." ".$value['published']." img->".$route;

		$stmt -> bindParam(":id", $value["id"], PDO::PARAM_INT);
		$stmt -> bindParam(":route", $value["route"], PDO::PARAM_STR);
		$stmt -> bindParam(":title", $value["title"], PDO::PARAM_STR);
		$stmt -> bindParam(":navbar_title", $value["navbar_title"], PDO::PARAM_STR);
		$stmt -> bindParam(":description", $value["description"], PDO::PARAM_STR);
		$stmt -> bindParam(":img", $route, PDO::PARAM_STR);
		$stmt -> bindParam(":backgroundcolor", $value["backgroundcolor"], PDO::PARAM_STR);
		$stmt -> bindParam(":published", $value["published"], PDO::PARAM_INT);
		
		if($stmt -> execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt->close();

		$stmt = null;




	}


	static public function mdlGetCategories($table, $item, $value){



		if($item != null) {

            $stmt = Connection::connectionBd()->prepare("SELECT * FROM $table WHERE $item = :$item");

           	$stmt-> bindParam(":".$item, $value, PDO::PARAM_STR);

			$stmt->execute();

			return $stmt-> fetchAll();




		} else {

			$stmt = Connection::connectionBd()->prepare("SELECT * FROM $table");

			$stmt->execute();

			return $stmt-> fetchAll();



		}

		$stmt->close();

		$stmt = null; 




	}

	static public function mdlAddCategory($table, $datos, $img){

	
		$stmt = Connection::connectionBd()->prepare("INSERT INTO $table (title, short_Description, img, type) VALUES (:title, :short_Description, :img, :type)");

		$stmt -> bindParam(":title", $datos["title"], PDO::PARAM_STR);
		$stmt -> bindParam(":short_Description", $datos["description"], PDO::PARAM_STR);
		$stmt -> bindParam(":img", $img , PDO::PARAM_STR);
		$stmt -> bindParam(":type",$datos["type"], PDO::PARAM_STR);
		

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt->close();

		$stmt =null;





	}

	static public function mdlEditCategory($table, $datos, $img){

	
		$stmt = Connection::connectionBd()->prepare("UPDATE $table SET title= :title, short_Description = :short_Description, img = :img WHERE id =:id");
		

		$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt -> bindParam(":title", $datos["title"], PDO::PARAM_STR);
		$stmt -> bindParam(":short_Description", $datos["description"], PDO::PARAM_STR);
		$stmt -> bindParam(":img", $img , PDO::PARAM_STR);
		
		

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt->close();

		$stmt =null;





	}

	static public function mdlDeleteCategory($table,$id){

		$stmt = Connection::connectionBd()->prepare("DELETE FROM $table WHERE id =:id");

		$stmt -> bindParam(":id", $id, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;




	}

	static public function mdlGetIcons($table, $item, $value){



		if($item != null) {

            $stmt = Connection::connectionBd()->prepare("SELECT * FROM $table WHERE $item = :$item");

           	$stmt-> bindParam(":".$item, $value, PDO::PARAM_STR);

			$stmt->execute();

			return $stmt-> fetchAll();




		} else {

			$stmt = Connection::connectionBd()->prepare("SELECT * FROM $table");

			$stmt->execute();

			return $stmt-> fetchAll();



		}

		$stmt->close();

		$stmt = null; 




	}


	/*=========================================================
	=  Las secciones o bloques de una pagina activos(publicada)       =
	===========================================================*/
	static public function mdlGetSetions($table){


		$query = "SELECT a.id, a.id_block, bl.route, bl.navbar_title, bl.path_navbar, bl.position FROM $table AS a ";
		$query .= "INNER JOIN blocks as bl ON bl.id = a.id_block ";
		$query .= "WHERE bl.published =1 ";
		$query .= "ORDER BY bl.position ASC ";

		//$query = "SELECT * FROM $table";


		$stmt = Connection::connectionBd()->prepare($query);

		$stmt->execute();

		return $stmt-> fetchAll();



		$stmt->close();

		$stmt = null; 




	}

	/*=========================================================
	= Actualiza la posiciòn u orden de un bloque      =
	===========================================================*/
	static public function mdlUpdatePositionBlock($table, $value)
	{
		# code...
		$stmt = Connection::connectionBd()->prepare("UPDATE $table SET position= :position WHERE id =:id");

		$stmt -> bindParam(":id", $value["id"], PDO::PARAM_INT);
		$stmt -> bindParam(":position", $value["position"], PDO::PARAM_INT);
		
				

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt->close();

		$stmt =null;

	}

	/*=========================================================
	= Actualiza el estatus published     =
	===========================================================*/
	static public function mdlUpdatePublished($table, $value)
	{
		# code...
		$stmt = Connection::connectionBd()->prepare("UPDATE $table SET published= :published WHERE id =:id");

		$stmt -> bindParam(":id", $value["id"], PDO::PARAM_INT);
		$stmt -> bindParam(":published", $value["published"], PDO::PARAM_INT);
		
				

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt->close();

		$stmt =null;

	}


	/*=========================================================
	=  Bloques sin publicacion    =
	===========================================================*/
	static public function mdlGetBlocksPublished($table){


		//$query = "SELECT a.navbar_title, a.route a.id FROM $table AS a ";
	    //$query .= "WHERE a.published =0 ";
		

		$query = "SELECT navbar_title, route, id FROM $table WHERE published =0";


		$stmt = Connection::connectionBd()->prepare($query);

		$stmt->execute();

		return $stmt-> fetchAll();



		$stmt->close();

		$stmt = null; 




	}

}

