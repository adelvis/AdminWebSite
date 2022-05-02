<?php

require_once "connection.php";
/**
 * 
 */
class ModelCommerce
{
	

	/*=============================================
	=        SELECCIONAR COMERCIO    =
	=============================================*/
	static public function mdlSelectCommerce($table)
	{
		# code...

		$stmt = Connection::connectionBd()->prepare("SELECT * FROM $table ");

	
		$stmt->execute();

		return $stmt-> fetch();

		$stmt->close();

		$stmt =null;




	}


	/*====================================================
	// FUNCIÓN PARA CAMBIAR LA INFORMACIÓN DEL COMERCIO
	=====================================================*/
	static public function mdlUpdateCommerce($table, $id, $datos){


		$stmt = Connection::connectionBd()->prepare("UPDATE $table SET  name = :name, address = :address, slogan = :slogan, name_contact1 = :name_contact1, name_contact2 = :name_contact2, phone_contact = :phone_contact, business_hours = :business_hours, email_contact = :email_contact WHERE id= :id");


		$stmt -> bindParam(":name", $datos["name"], PDO::PARAM_STR);
		$stmt -> bindParam(":address", $datos["address"], PDO::PARAM_STR);
		$stmt -> bindParam(":slogan", $datos["slogan"], PDO::PARAM_STR);
		$stmt -> bindParam(":name_contact1", $datos["name_contact1"], PDO::PARAM_STR);
		$stmt -> bindParam(":name_contact2", $datos["name_contact2"], PDO::PARAM_STR);
		$stmt -> bindParam(":phone_contact", $datos["phone_contact"], PDO::PARAM_STR);
		$stmt -> bindParam(":business_hours", $datos["business_hours"], PDO::PARAM_STR);
		$stmt -> bindParam(":email_contact", $datos["email_contact"], PDO::PARAM_STR);
		$stmt->  bindParam(":id", $id, PDO::PARAM_INT);

	

		if($stmt -> execute()){


			return "ok";


		}else{

			return "error";

		}

		$stmt->close();

		$stmt = null;



	}



	/*=============================================
		=  OBTIENE INFORMACIÒN DE LA PLANTILLA       =
	=============================================*/

	static public function mdlSelectTemplate($table)
	{
		# code...


		
		$stmt = Connection::connectionBd()->prepare("SELECT * FROM $table ");

	
		$stmt->execute();

		return $stmt-> fetch();

		$stmt->close();

		$stmt =null;



	}

	/*=============================================
	=     ACTUALIZAR LOGO -ICONO- REDES SOCIALES  =
	=============================================*/
	static public function mdlUpdateLogoIcono($table, $id, $item, $value){


		$stmt = Connection::connectionBd()->prepare("UPDATE $table SET $item = :$item WHERE id= :id");



		$stmt -> bindParam(":".$item, $value, PDO::PARAM_STR);

		$stmt-> bindParam(":id", $id, PDO::PARAM_STR);

	

		if($stmt -> execute()){


			return "ok";


		}else{

			return "error";

		}

		$stmt->close();

		$stmt = null;




	}

	/*=============================================
	=         ACTUALIZAR COLORS      =
	=============================================*/
	static public function mdlUpdateColors($table, $id, $datos){


		$stmt = Connection::connectionBd()->prepare("UPDATE $table SET top_bar = :top_bar, title_Site = :title_Site, top_text = :top_text, transperent = :transperent, top_text_transp = :top_text_transp, bottom_bar = :bottom_bar, bottom_text = :bottom_text, footer_color =:footer_color, title_text_color = :title_text_color WHERE id= :id");


		$stmt -> bindParam(":top_bar", $datos["barraSuperior"], PDO::PARAM_STR);
		$stmt -> bindParam(":title_Site", $datos["tituloSite"], PDO::PARAM_STR);
		$stmt -> bindParam(":top_text", $datos["textoSuperior"], PDO::PARAM_STR);
		$stmt -> bindParam(":transperent", $datos["transparet"], PDO::PARAM_STR);
		$stmt -> bindParam(":top_text_transp", $datos["topTextTransp"], PDO::PARAM_STR);
		$stmt -> bindParam(":bottom_bar", $datos["bottom_bar"], PDO::PARAM_STR);
		$stmt -> bindParam(":bottom_text", $datos["bottom_text"], PDO::PARAM_STR);
		$stmt -> bindParam(":footer_color", $datos["footer_color"], PDO::PARAM_STR);
		$stmt -> bindParam(":title_text_color", $datos["title_text_color"], PDO::PARAM_STR);

		$stmt-> bindParam(":id", $id, PDO::PARAM_INT);

	

		if($stmt -> execute()){


			return "ok";


		}else{

			return "error";

		}

		$stmt->close();

		$stmt = null;




	}




}