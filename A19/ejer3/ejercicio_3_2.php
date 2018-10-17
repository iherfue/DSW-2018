<?php
session_start();
$_SESSION["nombre"] = $_GET['nombre'];
 ?>

 <html>
  <head></head>
<body>
<h3>Su nombre es <?php echo $_GET['nombre']?></h3>
<h3>Introduzca su apellido</h3>
<form action="ejercicio_3_3.php" method="GET">
  <input type="text" name="apellido">
  <input type="submit" name="envia" value="Siguiente">
</form>

</body>
 </html>
