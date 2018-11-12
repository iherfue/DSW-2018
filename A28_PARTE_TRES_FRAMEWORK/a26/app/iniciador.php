<?php
spl_autoload_register(function($nombreClase){
       require_once "librerias/" . $nombreClase . ".php";
   });
//require_once('librerias/Base.php');
//require_once('librerias/Controlador.php');
//require_once('librerias/Core.php');
require_once "../app/config/configurar.php";

 ?>
