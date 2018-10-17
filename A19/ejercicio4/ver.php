<?php
session_start();
if(isset($_SESSION['nombre']) && isset($_SESSION['valor'])){

echo "<p>Datos Introducidos:</p>";
echo $_SESSION['nombre'] . ': ' . $_SESSION['valor'];
echo "<br/> <a href='index.php'>Volver al inicio</a>";
}else{
  echo "No se han introducido datos";
  echo "<br/><a href='index.php'>Volver al principio</a>";
}
?>
