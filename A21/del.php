<?php
session_start();
require_once('conexion.php');

//Eliminar coche
if(isset($_POST["eliminar"])){

  $sql = "delete from autos where auto_id = :id";

  $prepare = $pdo->prepare($sql);
  $prepare->execute(array(
    ':id' => $_POST['id_auto']
  ));

  header("Location: view.php");
  $_SESSION["eliminar"] = "Registro Borrado";
}

 ?>
<!DOCTYPE HTML>
<html>
<head>
  <title>Iván Hernández Fuentes</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
   <table class="table table-striped" style="text-align:center">
      <?php
      echo "<h2>Coches en el Sistema</h2>";
         $consulta = $pdo->query("select auto_id,make,year,mileage from autos");
           while($row = $consulta->fetch(PDO::FETCH_ASSOC) ){  //array asociativo

             echo "<tr><td>";
             echo(strtoupper($row['make']));
             echo("</td><td>");
             echo(strtoupper($row['year']));
             echo("</td><td>");
             echo($row['mileage']);
             echo("</td><td>");
             echo('<form method="POST"><input type="hidden" ');
             echo('name="id_auto" value="'.$row['auto_id'].'">'."\n");
             echo('<input type="submit" value="Eliminar" name="eliminar">');
             echo("\n</form>\n");
             echo("</td></tr>\n");
           }

         ?>
   </table>
   <input type="button" value="Cancelar" onclick="location = 'view.php'";
</body>
</html>
