<?php


require_once "connection.php";


/**
 * Clase Modelo Intro
 */
class ModelIntro
{
	/*=============================================
	=  fuction call intro       =
	=============================================*/
	static public function mdlGetIntro($table, $item, $value){



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
	/*=============================================
	=  fuction update intro       =
	=============================================*/
	static public function mdlUpdateIntro($value, $route){

		//return $value["state"];

		$stmt = Connection::connectionBd()->prepare("UPDATE `intro` SET `state`= :state,`title1`= :title1,`title2`= :title2,`url`= :url,`type`= :type  WHERE `id`= :id");


		$stmt -> bindParam(":id", $value["id"], PDO::PARAM_INT);
		$stmt -> bindParam(":state", $value["state"], PDO::PARAM_INT);
		$stmt -> bindParam(":title1", $value["title1"], PDO::PARAM_STR);
		$stmt -> bindParam(":title2", $value["title2"], PDO::PARAM_STR);
		$stmt -> bindParam(":url", $route, PDO::PARAM_STR);
		$stmt -> bindParam(":type", $value["type"], PDO::PARAM_STR);
			

		if($stmt -> execute()){

			$state = 0;

			$stmt2 = Connection::connectionBd()->prepare("UPDATE `intro` SET `state`=:state  WHERE `id`<> :id");
			$stmt2 -> bindParam(":id", $value["id"], PDO::PARAM_INT);
			$stmt2 -> bindParam(":state", $state, PDO::PARAM_INT);

			if($stmt2 ->execute()){

				return "ok";



			}else{

				return "error";
			}
			
			$stmt2->close();

			$stmt2 = null;

		}else{

			return "error";

		}

		$stmt->close();

		$stmt = null;

		



	}


}	
