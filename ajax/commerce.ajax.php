<?php

require_once "../controller/commerce.controller.php";

require_once "../model/commerce.model.php";



class AjaxCommerce{


	/*=============================================================
	// FUNCIÓN PARA CAMBIAR LA INFORMACIÓN DE COMERCIO
	=============================================================*/

	public $name;
	public $slogan;
	public $name_contact1;
	public $name_contact2;
	public $address;
	public $email_contact;
	public $phone_contact;
	public $business_hours;


	public function ajaxChangeCommerce(){

		$datos = array(
						'name' =>$this->name,
						'slogan' =>$this->slogan,
						'name_contact1'=>$this->name_contact1,
						'name_contact2'=>$this->name_contact2,
						'address'=>$this->address,						
						'phone_contact' =>$this->phone_contact,
						'email_contact' =>$this->email_contact,
						'business_hours' =>$this->business_hours
						);

		$asnwer = ControllerCommerce::ctrUpdateCommerce($datos);

		echo $asnwer;


	}

	/*=========================================
			=   CAMBIAR EL LOGO	     =
	=========================================*/


	public $imagenLogo;

	public function ajaxChangeLogotipo(){

		$item= "logo";

		$value= $this->imagenLogo;

			
		$asnwer = ControllerCommerce::ctrUpdateLogoIcono($item, $value);
		echo $asnwer;



	}


	/*=========================================
			=   CAMBIAR EL ICONO	     =
	=========================================*/


	public $imagenIcono;

	public function ajaxChangeIcono(){

		$item= "icon";

		$value= $this->imagenIcono;

		$asnwer = ControllerCommerce::ctrUpdateLogoIcono($item, $value);

		echo $asnwer;



	}

	/*=========================================
			=   CAMBIAR COLOR 	     =
	=========================================*/


	public $tituloSite;
	public $barraSuperior;
	public $textoSuperior;
	public $topTextTransp;
	public $bottom_bar;
	public $bottom_text;
	public $footer_color;
	public $title_text_color;
	public $transparet;

	

	public function ajaxChangeColor(){

		$datos  = array('barraSuperior' 	=>$this->barraSuperior,
						'textoSuperior' 	=>$this->textoSuperior,
						'tituloSite' 		=>$this->tituloSite,
						'topTextTransp' 	=>$this->topTextTransp,
						'bottom_bar' 		=>$this->bottom_bar,
						'bottom_text' 		=>$this->bottom_text,
						'footer_color' 		=>$this->footer_color,
						'title_text_color' 	=>$this->title_text_color,
						'transparet' 		=>$this->transparet


					);

		$asnwer = ControllerCommerce::ctrUpdateColors($datos);

		echo $asnwer;




	}

	/*================================================
	=     GUARDAR REDES SOCIALES    =
	=================================================*/

	public $socialNetwork;

	public function ajaxChangeSocialNetwork(){


		$item= "social_networks";

		$value= $this->socialNetwork;

		
		$asnwer = ControllerCommerce::ctrUpdateLogoIcono($item, $value);

		echo $asnwer;




	}



}



/*=============================================================
	// FUNCIÓN PARA CAMBIAR LA INFORMACIÓN DE COMERCIO
=============================================================*/
if(isset($_POST["name"])){


	$commerce = new AjaxCommerce();

	$commerce->name		 			= $_POST["name"];
	$commerce->slogan  			    = $_POST["slogan"];
	$commerce->name_contact1		= $_POST["name_contact1"];
	$commerce->name_contact2		= $_POST["name_contact2"];
	$commerce->address     			= $_POST["address"];
	$commerce->email_contact  		= $_POST["email_contact"];
	$commerce->phone_contact     	= $_POST["phone_contact"];
	$commerce->business_hours		= $_POST["business_hours"];
	

	$commerce->ajaxChangeCommerce();



}

/*=========================================
			=   CAMBIAR EL LOGO	     =
=========================================*/

if(isset($_FILES["imagenLogo"])){


	$logotipo = new AjaxCommerce();

	$logotipo->imagenLogo=$_FILES["imagenLogo"];

	$logotipo->ajaxChangeLogotipo();



}

/*=========================================
			=   CAMBIAR EL ICONO    =
=========================================*/

if(isset($_FILES["imagenIcono"])){


	$logotipo = new AjaxCommerce();

	$logotipo->imagenIcono=$_FILES["imagenIcono"];

	$logotipo->ajaxChangeIcono();



}

/*=========================================
			=   CAMBIAR COLOR 	     =
=========================================*/

if(isset($_POST["barraSuperior"])){

	$color = new AjaxCommerce();

	$color->barraSuperior			= $_POST["barraSuperior"];

	$color->textoSuperior			= $_POST["textoSuperior"];

	$color->tituloSite				= $_POST["tituloSite"];

	$color->topTextTransp			= $_POST["topTextTransp"];

	$color->bottom_bar				= $_POST["bottom_bar"];

	$color->bottom_text				= $_POST["bottom_text"];

	$color->footer_color			= $_POST["footer_color"];

	$color->title_text_color		= $_POST["title_text_color"];

	$color->transparet				= $_POST["transparet"];

	$color->ajaxChangeColor();



}


/*================================================
=     GUARDAR REDES SOCIALES    =
=================================================*/

if(isset($_POST["redesSociales"])){


	$network = new AjaxCommerce();

	$network->socialNetwork = $_POST["redesSociales"];

	$network->ajaxChangeSocialNetwork();


}