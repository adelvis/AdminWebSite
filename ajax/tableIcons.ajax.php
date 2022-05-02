<?php
require_once "../controller/sections.controller.php";
require_once "../model/sections.model.php";


require_once "../controller/icon.controller.php";
require_once "../model/icons.model.php";


class TableIcons {

    	/*===================================================
				=    MOSTRAR TABLA DE CARACTERISTICAS        =
		===================================================*/
		public function viewTable(){

            $item="";

			$value="";

            $icons2 = ControllerSections::ctrGetCategories($item, $value);

            $icons= ControllerIcon::ctrGetIcons($item, $value);

            $dataJson ='{
                "data": [ ';

            for ($i=0; $i < count($icons) ; $i++) { 
               
                /*=============================================
	  			TRAER ICONO
                =============================================*/
                $img = "<i class='".$icons[$i]["code"]." pr-2'  ></i>";

                /*=============================================
	  			TRAER LAS ACCIONES
	  			=============================================*/
                
                  $action = "<div class='btn-group'><button type='button' class='btn btn-danger btnDeleteIcon' idIcon='".$icons[$i]["id"]."'><i class='fa fa-times'></i></button></div>";

                  $dataJson .='[
				
                    "'.($i+1).'",
                    "'.$img.'",
                    "'.$icons[$i]["code"].'",
                    "'.$action.'"
                    ],';


            }    

            $dataJson = substr($dataJson,0, -1);

			$dataJson .=']
						}';


			echo $dataJson;


        }


}

/*===================================================
				=    MOSTRAR TABLA DE SERVICIOS        =
===================================================*/

$getIcons = new TableIcons();

$getIcons->viewTable();