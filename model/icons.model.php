

<?php

require_once "connection.php";

class ModelIcons {

    static public function mdlGetIcon($table, $item, $value){

		if($item != null) {

            $stmt = Connection::connectionBd()->prepare("SELECT * FROM $table WHERE $item = :$item");

           	$stmt-> bindParam(":".$item, $value, PDO::PARAM_STR);

			$stmt->execute();

			return $stmt-> fetch();

		} else {

			$stmt = Connection::connectionBd()->prepare("SELECT * FROM $table ORDER by `id` DESC");

			$stmt->execute();

			return $stmt-> fetchAll();
		}

		$stmt->close();

        $stmt = null; 
        
	}
	
	static public function mdlAddIcon($table, $value){

		$sql = "INSERT INTO $table (icon, code) VALUES (:icon, :code)";
	
		$stmt = Connection::connectionBd()->prepare($sql);


		$stmt -> bindParam(":icon", $value["icon"], PDO::PARAM_STR);
		$stmt -> bindParam(":code", $value["code"], PDO::PARAM_STR);
	
		if($stmt->execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt->close();

		$stmt =null;





	}


	/*===================================================
	=            ELIMINIAR EL PERFIL            =
	===================================================*/

	static public function mdlDeleteIcon($table, $datos){



		$stmt = Connection::connectionBd()->prepare("DELETE FROM  $table WHERE id =:id");


		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt->close();

		$stmt =null;



	}



}