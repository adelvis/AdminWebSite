<?php

require_once "../controller/sections.controller.php";
require_once "../model/sections.model.php";


class TableFeature {

    	/*===================================================
				=    MOSTRAR TABLA DE CARACTERISTICAS        =
		===================================================*/
		public function viewTable(){


			$item="type";

			$value="feature";

            $features = ControllerSections::ctrGetCategories($item, $value);
            
            $dataJson ='{
                "data": [ ';

            for ($i=0; $i < count($features) ; $i++) { 
               
                /*=============================================
	  			TRAER ICONO
                =============================================*/
                $style=json_decode($features[$i]["img"],true);

	  			if($features[$i]["img"] != ""){
                  
                    $img = "<i class='".$style["img"]." pr-2' style='color:".$style["color"]."' ></i>";
                 

                }

                /*=============================================
	  			TRAER LAS ACCIONES
	  			=============================================*/
                
                  $action = "<div class='btn-group'><button type='button' class='btn btn-warning btnEditFeature' idFeature='".$features[$i]["id"]."' data-toggle='modal' data-target='#modalEditFeature'><i class='fas fa-pencil-alt'></i></button><button type='button' class='btn btn-danger btnDeleteFeature' idFeature='".$features[$i]["id"]."'><i class='fa fa-times'></i></button></div>";

                  $dataJson .='[
				
                    "'.($i+1).'",
                    "'.$features[$i]["title"].'",
                    "'.$features[$i]["short_Description"].'",
                    "'.$img.'",
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

$getFeature = new TableFeature();

$getFeature->viewTable();