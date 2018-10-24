<?php
session_start();

foreach ($_GET as $indice => $valor) {
  echo $indice;
  echo $valor;
       if (isset($_SESSION[$indice])) {
            unset($_SESSION[$indice]);
        }
    }
//var_dump($_SESSION);
header("Location: index.php");

?>
