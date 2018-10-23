<?php
session_start();
require_once('conexion.php');
if (!isset($_SESSION['name']) ) {
  die('No has iniciado sesión');
}

if(isset($_POST["eliminar"])){
  header("Location: del.php");
  return;
}

if(isset($_SESSION["success"])){
  echo "<div class='alert alert-success' role='alert'>" .htmlentities($_SESSION['success'])."</div>";
  unset($_SESSION["success"]);
}

if(isset($_SESSION["eliminar"])){
  echo "<div class='alert alert-success' role='alert'>" .htmlentities($_SESSION['eliminar'])."</div>";
  unset($_SESSION["eliminar"]);
}
?>
<!DOCTYPE HTML>
<html>
<head>
  <title>Iván Hernández Fuentes</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
  <h5>Bienvenido <?php echo $_SESSION["name"] ?></h5>
   <table class="table table-striped" style="text-align:center">
      <?php
      echo "<h2>Coches en el Sistema</h2>";
         $consulta = $pdo->query("select auto_id,make,year,mileage from autos");
           while($row = $consulta->fetch(PDO::FETCH_ASSOC) ){  //array asociativo

             echo "<tr><td>";
             echo(($row['make']));
             echo("</td><td>");
             echo(strtoupper($row['year']));
             echo("</td><td>");
             echo($row['mileage']);
             echo("</td><td>");
             echo('<form method="POST">');
             echo('<input type="submit" value="Delete" name="eliminar">');
             echo("\n</form>\n");
             echo("</td></tr>\n");
           }

         ?>
   </table>
   <a href="add.php">Añadir un vehiculo</a><br/>
  <!-- <a href="del.php">Eliminar un Vehículo</a><br/>-->
   <a href="logout.php">Cerrar sesión</a>
</body>
</html>
