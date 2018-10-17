<?php
session_start();

  $_SESSION['nombre'] = $_GET['nombre_dato'];
  $_SESSION['valor'] = $_GET['valor_dato'];
  header("Location: index.php");


?>
