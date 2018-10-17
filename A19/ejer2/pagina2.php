<?php
session_start();

if(isset($_SESSION['pizza']) && $_GET['numero'] == '+'){
  $_SESSION['pizza'] = $_SESSION['pizza'] +1;
  header("Location: ejercicio2.php");
}
if(isset($_SESSION['pizza']) && $_GET['numero'] == '-'){
  $_SESSION['pizza'] = $_SESSION['pizza'] -1;
  header("Location: ejercicio2.php");
}

if(isset($_SESSION['pizza']) && $_GET['numero'] == 'Poner a cero'){
  $_SESSION['pizza'] = $_SESSION['pizza'] =0;
  header("Location: ejercicio2.php");
}

 ?>
