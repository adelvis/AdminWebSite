<?php


require_once "../controller/template.controller.php";
require_once "../model/template.model.php";


/**
 * 
 */
class AjaxTemplate 
{
	/*=============================================
	=   Section call Template Style dinamic        =
	=============================================*/
	public function ajaxStyleTemplate()
	{
		# code...

		$answer = ControllerTemplate::ctrStyleTemplate();

		echo json_encode($answer);


	}


    

}


/*=============================================
	=         Configuracion del Template           =
=============================================*/
$object = new AjaxTemplate();
$object-> ajaxStyleTemplate();
