<?php
error_reporting(0);

if($_SESSION["lang"]){

$user_locale = $_SESSION["lang"]. '.'.utf8;
  // Establece variables de entorno en el idioma del usuario
  putenv("LANGUAGE=$user_locale");
  putenv("LANG=$user_locale");  // Por si LANGUAGE falla

  if (!defined('LC_MESSAGES')) define('LC_MESSAGES', 5);
  // Establece la información de la configuración regional
  setlocale(LC_MESSAGES, $user_locale);
  textdomain($_SESSION["lang"]);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Iván Hernández Fuentes</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
    	<style type="text/css">


 		.form-dos {

 			display: none;
 		}
 	</style>
</head>
<body>
<div class="container">
