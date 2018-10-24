<?php
session_start();

$nombre = $_GET['nombre'];
$valor = $_GET['valor'];
$_SESSION[$nombre] = $valor;

header("Location: index.php");

?>
