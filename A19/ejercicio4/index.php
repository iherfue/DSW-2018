<?php
session_start();
if(count($_SESSION)){

    echo "Hay datos guardados";
}else{
  echo "No hay datos guardados";
}

 ?>

 <html>
 <body>
   <p>Elija una opción:</p>
  <ul>
    <li><a href="nuevo-1.php">Guardar un nuevo dato</a></li>
    <li><a href="ver.php">Ver los datos actuales</a></li>
    <li><a href="borrar-1.php">Borrar datos</a></li>
    <li><a href="cerrar.php">Cerrar la sesión</a></li>
  </ul>
 </body>
 </html>
