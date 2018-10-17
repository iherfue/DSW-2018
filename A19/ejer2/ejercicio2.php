<?php
session_start();
if(!isset($_SESSION['pizza'])){
  $_SESSION['pizza'] = 0;
}

/*Ejercicio 2

Escribe un programa de dos páginas que muestre un valor numérico y permita subirlo o bajarlo mediante dos botones.

La primera página contiene un formulario con tres botones de tipo submit con el mismo name.
La segunda página recibe el dato, modifica el número y redirige a la primera página.
El número se guarda en una variable de sesión. Si la variable no está definida, se le dará el valor 0.
En el siguiente enlace tienes un ejemplo de cómo debe funcionar el programa: http://www.mclibre.org/consultar/php/ejercicios/sesiones/sesiones-1/sesiones-1-03-1.php
*/
?>

<html>
<head></head>
<body>

<form action="pagina2.php" method="GET">
  <input type="submit" name="numero" value ="+">
  <span style="font-size: 4rem"><?php echo $_SESSION['pizza']?></span>
  <input type="submit" name="numero" value="-">
  <input type="submit" name="numero" value="Poner a cero">

</form>

</body>
</html>
