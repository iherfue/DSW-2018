<?php
session_start(); //indicamos la sesion abierta para poder cerrarla
$_SESSION['sesion'] = 0;
print_r($_SESSION);
session_destroy(); //destruir la sesion del usuario
echo session_id();
?>
<!DOCTYPE HTML>
<html>
  <head>
    <title>Iván Hernández Fuentes</title>
  </head>
<body>
  <ul>
    <li><a href="conectar.php">Conectar</a></li>
    <li><a href="desconectar.php">Desconectar</a></li>
    <li><a href="comprobar.php">Comprobar</a></li>
  </ul>
  <p>Usted se ha desconectado</p>
</body>
</html>
