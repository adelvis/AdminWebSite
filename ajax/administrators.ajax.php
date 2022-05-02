<?php

require_once "../controller/usuarios.controller.php";
require_once "../model/usuarios.model.php";


class AjaxAdministrators{

    /*=============================================
	ACTUALIZAR PROCESO DE ENVÍO
	=============================================*/

  	public $activarId;
  	public $activarPerfil;

  	public function ajaxActiveProfile(){

  		$answer = ModelUser::mdlActiveProfile("administrators", "state", $this->activarPerfil, "id", $this->activarId);

  		echo $answer;

	}

    /*=============================================
	EDITAR PERFIL
	=============================================*/
	public $idPerfil;

	public function ajaxViewProfile(){


		$answer = ControllerUser::ctrViewAdministrators("id", $this->idPerfil);


		echo json_encode($answer);

	}



}

/*=============================================
ACTUALIZAR PROCESO DE ENVÍO
=============================================*/


if(isset($_POST["activarId"])){

	$sendSales = new AjaxAdministrators();
	$sendSales -> activarId = $_POST["activarId"];
	$sendSales -> activarPerfil = $_POST["activarPerfil"];
	$sendSales -> ajaxActiveProfile();

}
/*=============================================
	EDITAR PERFIL
=============================================*/

if(isset($_POST["idPerfil"])){

	$view = new AjaxAdministrators();

	$view-> idPerfil=$_POST["idPerfil"];

	$view-> ajaxViewProfile();



}