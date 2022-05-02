<?php

require_once "../controller/icon.controller.php";
require_once "../model/icons.model.php";


class AjaxIcon
{


	/*=============================================================
	// FUNCIÓN PARA ACTUALIZAR LOS VALORES DEL INTRO
	=============================================================*/
	public $icon;
	public $code;
	

	public function ajaxAddIcon(){

		$datos = array(
			'icon' =>$this->icon,
			'code' =>$this->code
	
			);
	
		$answer = ControllerIcon::ctrAddIcon($datos);
		
		echo $answer; 


	}





}


/*=============================================================
// FUNCIÓN PARA ACTUALIZAR LOS VALORES DEL INTRO
=============================================================*/
if(isset($_POST["icon"])){

	$updateIntro = new AjaxIcon();

	$updateIntro->icon = $_POST["icon"];

	$updateIntro->code = $_POST["code"];

	

	$updateIntro->ajaxAddIcon();






}


