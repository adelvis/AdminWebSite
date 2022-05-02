<?php

require_once "../controller/sections.controller.php";
require_once "../model/sections.model.php";



class AjaxBlocks{


    /*=============================================================
	// FUNCIÓN PARA ACTUALIZAR LOS DATOS DE UN BLOQUE
	=============================================================*/
     
    public $id;
    public $route;
    public $title;
    public $navbar_title;
    public $description;
    public $imgOld;
    public $imgNew;
    public $backgroundcolor;
    public $published;

    public function ajaxUpdateBlock(){



        $datos = array(
			'id' =>$this->id,
			'route' =>$this->route,
			'title'=>$this->title,
			'navbar_title'=>$this->navbar_title,
			'description'=>$this->description,
            'imgOld'=>$this->imgOld,
            'imgNew'=>$this->imgNew,
            'backgroundcolor'=>$this->backgroundcolor,						
			'published' =>$this->published
			);

     
        $answer = ControllerSections::ctrUpdateBlock($datos);
        
        echo $answer;


    }

     /*=============================================================
	// FUNCIÓN PARA OBTENER LOS DATOS DE UN BLOQUE
	=============================================================*/
     
    public $item; 

	public $value;

    public function ajaxGetBlock(){

        $answer = ControllerSections::ctrGetBlocks($this->item, $this->value);

               
        echo json_encode($answer);


    }

    /*===================================================
	=  SUBIR MULTIMEDIA        =
	===================================================*/

    public $imageMultimedia;
    public $blockType;


    public function ajaxSendMultimedia(){

        $datos = $this->imageMultimedia;

        $type = $this->blockType;
        
        $answer = ControllerSections::ctrSendMultimedia($datos, $type);

        echo $answer;


    }

    /*================================================================
	// FUNCIÓN PARA ACTUALIZAR LOS DATOS DE UN BLOQUE CON MULTIMEDIA
	=================================================================*/
    public $idMultimedia;

    public function ajaxUpdateBlockMultimedia(){

        $datos = array(
			'id' =>$this->idMultimedia,
			'route' =>$this->route,
			'title'=>$this->title,
			'navbar_title'=>$this->navbar_title,
			'description'=>$this->description,
            'multimedia'=>$this->imgNew,
            'backgroundcolor'=>$this->backgroundcolor,						
			'published' =>$this->published
			);

         
        
        $answer = ControllerSections::ctrUpdateBlockMultimedia($datos);

        echo $answer;





    }
    /*================================================================
	// FUNCIÓN PARA OBTENER UNA CATEGORIA
	=================================================================*/
    public $idCategory;

    public function ajaxGetCategories(){

        $answer = ControllerSections::ctrGetCategories("id", $this->idCategory);

               
        echo json_encode($answer);

    }
    /*================================================================
	// FUNCIÓN PARA GUARDAR UNA CATEGORIA
    =================================================================*/
    
    public function ajaxAddCategory(){



        $datos = array(
            'title'=>$this->title,
            'description'=>$this->description,
            'type'=>$this->blockType,
            'icon'=>$this->imgOld,        
            'imgNew'=>$this->imgNew);

  

       $answer = ControllerSections::ctrAddCategory($datos);

       echo $answer;


    }

      
    /*================================================================
	// FUNCIÓN PARA ACTUALIZAR UNA CATEGORIA
    =================================================================*/
    public $id_categotyEdit;

    public function ajaxEditCategory(){


        $datos = array(
            'id'=>$this->id_categotyEdit,
            'title'=>$this->title,
            'description'=>$this->description,
            'imgOld'=>$this->imgOld, 
            'type'=>$this->blockType,              
            'imgNew'=>$this->imgNew);

    

        $answer = ControllerSections::ctrEditCategory($datos);

        echo $answer;
       


    }

    /*================================================================
	// FUNCIÓN PARA ELIMINAR UNA CATEGORIA
	=================================================================*/
    public $idCatDelete;
    
    public function ajaxDeleteCategory(){


        $datos = array(
            'id'=>$this->idCatDelete,
            'type'=>$this->blockType,              
            'imgOld'=>$this->imgOld);

        $answer = ControllerSections::ctrDeleteCategory($datos);

        echo $answer;


    }

    /*================================================================
	// FUNCIÓN PARA ACTUALIZAR EL ESTATUS DE PUBLICACIÒN
	=================================================================*/
    
    
    public function ajaxUpdatePublished(){


        $datos = array(
            'id'=>$this->id,
            'published'=>$this->published);

        $answer = ControllerSections::ctrUpdatePublished($datos);

        echo $answer;


    }



}

/*=============================================================
// FUNCIÓN PARA ACTUALIZAR LOS DATOS DE UN BLOQUE
=============================================================*/
    
if(isset($_POST['id'])){




    $updateBlock = new AjaxBlocks();

    $updateBlock-> id = $_POST['id'];

    $updateBlock-> route= $_POST['route'];

    $updateBlock-> title = $_POST['title'];

    $updateBlock-> navbar_title = $_POST['navbar_title'];

    $updateBlock-> description = $_POST['description'];

    $updateBlock-> imgOld = $_POST['imgOld'];

    $updateBlock-> imgNew = $_FILES['imgNew'];

    $updateBlock-> backgroundcolor = $_POST['backgroundcolor'];

    $updateBlock-> published = $_POST['published'];

    $updateBlock -> ajaxUpdateBlock();





}

/*=============================================================
// FUNCIÓN PARA OBTENER LOS DATOS DE UN BLOQUE
=============================================================*/

if(isset($_POST['item'])){

    $getBlock = new AjaxBlocks();

    $getBlock-> item = $_POST['item'];

    $getBlock-> value = $_POST['value'];

    $getBlock -> ajaxGetBlock();


}

/*===================================================
=  SUBIR MULTIMEDIA        =
===================================================*/
if(isset($_FILES["file"])){

    $sendMult = new AjaxBlocks();

    $sendMult-> imageMultimedia = $_FILES["file"];

    $sendMult-> blockType = $_POST["typeBlock"];

    $sendMult -> ajaxSendMultimedia();




}

 /*================================================================
// FUNCIÓN PARA ACTUALIZAR LOS DATOS DE UN BLOQUE CON MULTIMEDIA
=================================================================*/

if(isset($_POST['id_Multimedia'])){




    $updateBlock = new AjaxBlocks();

    $updateBlock-> idMultimedia = $_POST['id_Multimedia'];

    $updateBlock-> route= $_POST['route'];

    $updateBlock-> title = $_POST['title'];

    $updateBlock-> navbar_title = $_POST['navbar_title'];

    $updateBlock-> description = $_POST['description'];

    $updateBlock-> imgNew = $_POST['imgNew'];

    $updateBlock-> backgroundcolor = $_POST['backgroundcolor'];

    $updateBlock-> published = $_POST['published'];

    $updateBlock -> ajaxUpdateBlockMultimedia();



}

/*================================================================
// FUNCIÓN PARA OBTENER UNA CATEGORIA
=================================================================*/

if(isset($_POST['idCategory'])){

    $getCategory = new AjaxBlocks();

    $getCategory-> idCategory = $_POST['idCategory'];

    $getCategory->ajaxGetCategories();



}

 /*================================================================
    // FUNCIÓN PARA GUARDAR UNA CATEGORIA
=================================================================*/

if(isset($_POST['short_Description'])){

    $addCategory = new AjaxBlocks();

    $addCategory-> title = $_POST['title'];

    $addCategory-> description = $_POST['short_Description'];

    $addCategory-> blockType = $_POST["type"];

    $addCategory-> imgNew = $_FILES['img'];

    $addCategory-> imgOld = $_POST['icono'];

    $addCategory->ajaxAddCategory();



}

 /*================================================================
    // FUNCIÓN PARA ACTUALIZAR UNA CATEGORIA
=================================================================*/
if(isset($_POST['id_categotyEdit'])){

    $updateCategory = new AjaxBlocks();

    $updateCategory ->id_categotyEdit= $_POST['id_categotyEdit'];
    
    $updateCategory-> title = $_POST['title'];

    $updateCategory-> description = $_POST['short_Descrip'];

    $updateCategory-> blockType = $_POST["type"];

    $updateCategory-> imgNew = $_FILES['img'];

    $updateCategory-> imgOld = $_POST['imgOld'];

    
    $updateCategory->ajaxEditCategory();





}

 /*================================================================
    // FUNCIÓN PARA ELIMINAR UNA CATEGORIA
=================================================================*/
if(isset($_POST['idCatDelete'])){

    $deleteCategory = new AjaxBlocks();

    $deleteCategory ->idCatDelete= $_POST['idCatDelete'];
    
    $deleteCategory-> blockType = $_POST["type"];

    $deleteCategory-> imgOld = $_POST['imgPrincipal'];   

    $deleteCategory->ajaxDeleteCategory();





}

/*================================================================
// FUNCIÓN PARA ACTUALIZAR EL ESTATUS DE PUBLICACIÒN
=================================================================*/
if(isset($_POST['id_block'])){

    $updatePublished = new AjaxBlocks();

    $updatePublished->id = $_POST['id_block'];

    $updatePublished->published= $_POST['published'];

    $updatePublished->ajaxUpdatePublished();



}