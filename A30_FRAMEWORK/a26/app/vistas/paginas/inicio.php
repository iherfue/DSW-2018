<?php
//require_once "header.php";

//echo var_dump($datos);
echo "<ul>";
foreach ($datos['articulos'] as $articulos) {

    echo "<li>" . $articulos->titulo . "</li>";
}

print_r($datos["cantidad"]);
echo "</ul>";
/*
echo "<br/>" . RUTA_APP;
echo "<br/>" . RUTA_URL;
echo "<br/>" . NOMBRE_SITIO;
*/
//require_once "footer.php";
 ?>
