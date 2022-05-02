<?php

require_once "../controller/sections.controller.php";
require_once "../model/sections.model.php";


class TableService {

    	/*===================================================
				=    MOSTRAR TABLA DE SERVICIOS        =
		===================================================*/
		public function viewTable(){


			$item="type";

			$value="service";

            $services = ControllerSections::ctrGetCategories($item, $value);
            
            $dataJson ='{
                "data": [ ';

            for ($i=0; $i < count($services) ; $i++) { 
               
                /*=============================================
	  			TRAER IMAGEN OFERTA
	  			=============================================*/

	  			if($services[$i]["img"] != ""){

                    $img = "<img src='".$services[$i]["img"]."' class='img-thumbnail imgTablaService' width='100px'>";

                }else{
                  
                    $img = "<img src='views/img/services/default.jpg' class='img-thumbnail imgTablaService' width='100px'>";

                }

                /*=============================================
	  			TRAER LAS ACCIONES
	  			=============================================*/
                
                  $action = "<div class='btn-group'><button type='button' class='btn btn-warning btnEditService' idService='".$services[$i]["id"]."' data-toggle='modal' data-target='#modalEditService'><i class='fas fa-pencil-alt'></i></button><button type='button' class='btn btn-danger btnDeleteService' idService='".$services[$i]["id"]."' img='".$services[$i]["img"]."'><i class='fa fa-times'></i></button></div>";

                  $dataJson .='[
				
                    "'.($i+1).'",
                    "'.$services[$i]["title"].'",
                    "'.$services[$i]["short_Description"].'",
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

$getService = new TableService();

$getService->viewTable();