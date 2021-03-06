<?php
	


	/**
	 * Model User
	 */

	
	require_once "connection.php";

	class ModelUser 
	{
		


		static public function MdlMostrarUsuarios($tabla, $item, $valor)
		{
			# code...
			
			$stmt = Connection::connectionBd()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
			

			$stmt ->bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt ->execute();

			
			return $stmt ->fetch();





		}

		/*===============================================
		=            Mostrar administradores            =
		===============================================*/

		static public function  mdlViewAdministrators($table, $item, $value){

			if($item != null){


					$stmt = Connection::connectionBd()->prepare("SELECT * FROM $table WHERE $item = :$item");

					$stmt-> bindParam(":".$item, $value, PDO::PARAM_STR);

					$stmt->execute();

					return $stmt-> fetch();

			}else{



					$stmt = Connection::connectionBd()->prepare("SELECT * FROM $table");

					$stmt->execute();

					return $stmt-> fetchAll();



			}
			$stmt->close();

			$stmt =null;
			
		}

		/*===================================================
		=            UNSERTAR UN PERFIL            =
		===================================================*/

		static public function mdlInsertProfile($table, $datos){


			$stmt = Connection::connectionBd()->prepare("INSERT INTO $table (name, password, email, photo, profile, state) VALUES (:name, :password, :email, :photo, :profile, :state)");


			$stmt -> bindParam(":name", $datos["name"], PDO::PARAM_STR);		
			$stmt -> bindParam(":password", $datos["password"], PDO::PARAM_STR);
			$stmt -> bindParam(":email", $datos["email"], PDO::PARAM_STR);
			$stmt -> bindParam(":photo", $datos["photo"], PDO::PARAM_STR);
			$stmt -> bindParam(":profile", $datos["profile"], PDO::PARAM_STR);
			$stmt -> bindParam(":state", $datos["state"], PDO::PARAM_STR);

			if($stmt->execute()){

				return "ok";

			}else{

				return "error";

			}

			$stmt->close();

			$stmt =null;

		}


		/*===================================================
		=            ACTUALIZAR EL PERFIL            =
		===================================================*/

		static public function mdlEditProfile($table, $datos){


			$stmt = Connection::connectionBd()->prepare("UPDATE  $table SET name = :name, password= :password, email= :email, photo= :photo, profile= :profile  WHERE id =:id");


			$stmt -> bindParam(":name", $datos["name"], PDO::PARAM_STR);		
			$stmt -> bindParam(":password", $datos["password"], PDO::PARAM_STR);
			$stmt -> bindParam(":email", $datos["email"], PDO::PARAM_STR);
			$stmt -> bindParam(":photo", $datos["photo"], PDO::PARAM_STR);
			$stmt -> bindParam(":profile", $datos["profile"], PDO::PARAM_STR);
			$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);



			if($stmt->execute()){

				return "ok";

			}else{

				return "error";

			}

			$stmt->close();

			$stmt =null;


		}

		/*===================================================
		=            ACTUALIZAR EL ESTADO DEL PERFIL            =
		===================================================*/

		static public function mdlActiveProfile($table, $item1, $value1, $item2, $value2){

			$stmt = Connection::connectionBd()->prepare("UPDATE $table SET $item1 = :$item1 WHERE $item2 = :$item2");

			$stmt -> bindParam(":".$item1, $value1, PDO::PARAM_STR);
			
			$stmt -> bindParam(":".$item2, $value2, PDO::PARAM_STR);

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

		static public function mdlDeleteProfile($table, $datos){



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

		/*=============================================
		Actualizar UN CAMPO DEL USUARIO
		=============================================*/

		static public function mdlUpdateItemUser($table,$id, $item, $value  ){


			$stmt = Connection::connectionBd()->prepare("UPDATE $table SET $item = :$item WHERE id =:id");

			$stmt-> bindParam(":".$item, $value, PDO::PARAM_STR);
			$stmt-> bindParam(":id", $id, PDO::PARAM_INT);


			if($stmt->execute()){

				return "ok";

			}else{

				return "error";
			
			}

			$stmt->close();
			$stmt = null;


		}


		}


