<?php
session_start();

if(isset($_SESSION['number']) && $_GET['numero'] == '+'){
  $_SESSION['number'] = $_SESSION['number'] +1;
  header("Location: ejercicio2.php");
}
if(isset($_SESSION['number']) && $_GET['numero'] == '-'){
  $_SESSION['number'] = $_SESSION['number'] -1;
  header("Location: ejercicio2.php");
}

if(isset($_SESSION['number']) && $_GET['numero'] == 'Poner a cero'){
  $_SESSION['number'] = $_SESSION['number'] =0;
  header("Location: ejercicio2.php");
}

 ?>
