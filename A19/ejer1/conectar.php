<?php
session_start();
$_SESSION['sesion'] = 1;
print_r($_SESSION);
  $id = session_id();
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
  <p>Usted se ha conectado</p>
  <p>ID DE SESIÓN <?php echo $id;?></p>
</body>
</html>
