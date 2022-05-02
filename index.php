<?php session_start(); 


require_once "controller/template.controller.php";
require_once "controller/usuarios.controller.php";
require_once "controller/commerce.controller.php";
require_once "controller/intro.controller.php";
require_once "controller/sections.controller.php";
require_once "controller/icon.controller.php";

//require_once "controller/categorias.controller.php";



require_once "model/usuarios.model.php";
require_once "model/commerce.model.php";
require_once "model/intro.model.php";
require_once "model/sections.model.php";
require_once "model/template.model.php";
require_once "model/route.model.php";
require_once "vendor/autoload.php";
require_once "model/icons.model.php";

//require_once "model/connection.php";
//require_once "model/categorias.model.php";


$plantilla = new ControllerTemplate();
$plantilla-> ctrTemplate();





