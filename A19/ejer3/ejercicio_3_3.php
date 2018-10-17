<?php
session_start();
$_SESSION['apellido'] = $_GET['apellido'];
 ?>

 <html>
  <head></head>
<body>
<h3>Su nombre y apellido es <?php echo $_SESSION['nombre']?> <?php echo $_GET['apellido']?></h3>
<form action="ejercicio_3_4.php" method="GET">
  ¿Es correcto?<input type="submit" value="Si" name="si">
  <input type="submit" value="No" name="no">
</form>

</body>
 </html>
