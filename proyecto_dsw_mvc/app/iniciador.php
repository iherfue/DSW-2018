<?php
error_reporting(0);

bindtextdomain("en_US", "/var/www/html/proyecto_dsw_mvc/app/locale");

	spl_autoload_register(function($nombreClase){
       require_once "controladores/" . $nombreClase . ".php";
   });

/*
require_once "controladores/Controlador.php";
require_once "controladores/Core.php";
require_once "controladores/Socio.php";*/
require_once 'model/database.php';
require_once '../vendor/autoload.php';
require_once("../app/model/Alquila.php");
require_once("../app/model/Socio.php");
require_once("../app/Session.php");

//Archivos necesarios para el PHPMAILER
require '../vendor/phpmailer/phpmailer/src/Exception.php';
require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../vendor/phpmailer/phpmailer/src/SMTP.php';
?>
