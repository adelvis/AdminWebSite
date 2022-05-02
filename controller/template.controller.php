<?php



/**
 * Controller Template
 */



class ControllerTemplate 
{
	
	public function ctrTemplate()
	{

			include "views/template.php";
	}


	/*=============================================
	=   Section call Template Style dinamic        =
	=============================================*/
	public function ctrStyleTemplate(){

		$table="template";

		$answer = ModelTemplate::mdlStyleTemplate($table);

		return $answer; 


	}



	
}