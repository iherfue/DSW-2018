<?php
session_start();
if(count(($_SESSION))){

echo "<p>Datos Introducidos:</p>";
echo "<ul>";

foreach ($_SESSION as $indice => $valor) {

    echo " <li>$indice: $valor</li>";
}
echo "</ul>";
echo "<br/> <a href='index.php'>Volver al inicio</a>";
}else{
  echo "No se han introducido datos";
  echo "<br/><a href='index.php'>Volver al principio</a>";
}
?>
