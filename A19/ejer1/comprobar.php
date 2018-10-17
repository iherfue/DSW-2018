<?php

session_start();
print_r($_SESSION);

if(isset($_SESSION['sesion'])){

  echo "La sesión esta abierta";

}else{

  echo"La sesión se ha cerrado";
}

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
</body>
</html>
