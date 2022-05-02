<?php



require_once "../controller/intro.controller.php";
require_once "../model/intro.model.php";


class AjaxIntro
{
	
	/*=============================================================
	// FUNCIÓN PARA OBTENER LOS VALORES DEL INTRO
	=============================================================*/
	public $type;

	public function ajaxGetIntro(){

		$item= "type";

		$value= $this->type;

		$answer = ControllerIntro::ctrGetIntroByItem($item, $value);

		echo json_encode($answer);




	}

	/*=============================================================
	// FUNCIÓN PARA ACTUALIZAR LOS VALORES DEL INTRO
	=============================================================*/
	public $id;
	public $state;
	public $title1;
	public $title2; 
	public $url;
	public $urlNew;

	public function ajaxUpdateIntro(){

		$datos = array(
			'id' =>$this->id,
			'state' =>$this->state,
			'title1'=>$this->title1,
			'title2'=>$this->title2,
			'url'=>$this->url,
			'urlNew'=>$this->urlNew,						
			'type' =>$this->type
			);
		
		


		$answer = ControllerIntro::ctrUpdateIntro($datos);
		
		echo $answer; 


	}





}

/*=============================================================
	// FUNCIÓN PARA OBTENER LOS VALORES DEL INTRO
=============================================================*/


if(isset($_POST["type"])){


	$intro = new AjaxIntro();

	$intro->type	= $_POST["type"];
	

	$intro->ajaxGetIntro();



}
/*=============================================================
// FUNCIÓN PARA ACTUALIZAR LOS VALORES DEL INTRO
=============================================================*/
if(isset($_POST["id"])){

	$updateIntro = new AjaxIntro();

	$updateIntro->type = $_POST["type2"];

	$updateIntro->id = $_POST["id"];

	$updateIntro->state = $_POST["state"];

	$updateIntro->title1 = $_POST["title1"];

	$updateIntro->title2 = $_POST["title2"];

	$updateIntro->url = $_POST["url"];

	$updateIntro->urlNew= $_FILES["urlNew"];;

	$updateIntro->ajaxUpdateIntro();






}


