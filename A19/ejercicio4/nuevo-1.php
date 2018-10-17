<?php
session_start();

?>

<html>
<body>
  Escriba el nuevo dato:
  <form action="nuevo-2.php" method="GET">
    Nombre del dato<input type="text" name="nombre_dato">
    Valor del dato<input type="text" name="valor_dato">
    <input type="submit" name="enviar" value="guardar">
  </form>
</body>
</html>
