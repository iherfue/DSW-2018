<?php
session_start();
 ?>

 <html>
  <head></head>
<body>

  <?php
    if(isset($_GET['si'])){
      echo "Su nombre y apellido son : " . $_SESSION['nombre'] . ' '. $_SESSION['apellido'];
    }else if(isset($_GET['no'])){
    echo "Su nombre y apellido NO son : " . $_SESSION['nombre'] . ' '. $_SESSION['apellido'];
    echo "<a href='ejercicio_3_1.php'>Volver al principio</a>";
}
  ?>

</body>
 </html>
