<?php

require_once "../controller/sections.controller.php";
require_once "../model/sections.model.php";


class AjaxSectionsBlocks{

    /*=============================================================
	// FUNCIÓN PARA ACTUALIZAR LA POSICION DE UN BLOQUE
    =============================================================*/
    public $id;
    public $position;

    public function ajaxUpdatePosition(){

        $datos = array(
			'id' =>$this->id,
			'position' =>$this->position
			);

        //echo $datos['id']. " position ".$datos['position'] ;


        $answer = ControllerSections::ctrUpdatePositionBlock($datos);
        
        echo $answer;


    }
}    

/*=============================================================
// FUNCIÓN PARA ACTUALIZAR LA POSICION DE UN BLOQUE
=============================================================*/

if(isset($_POST['id'])){

    $update = new AjaxSectionsBlocks();

    $update-> id = $_POST['id'];

    $update-> position= $_POST['position'];

    $update->ajaxUpdatePosition();


}

