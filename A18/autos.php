<?php
require_once('conexion.php');

//comprobacion del coche
try {
  if(isset($_POST["enviar"])){

    if(!is_numeric($_POST["km"]) || (!is_numeric($_POST["age"]))){

      throw new Exception('Kilometraje y año deben ser numéricos.');
  }

  if($_POST["marca"] == ""){

    throw new Exception('El campo marca es obligatorio');
  }

  $sql = "insert into autos (make,year,mileage) values(:make,:year,:mileage)";
  //echo("<pre>\n" .$sql."\n</pre>\n");
  $prepar = $pdo->prepare($sql);   //pepara la consulta y ejecuta (solo si recibe parametros)
  $prepar->execute(array(
    ':make' => htmlentities($_POST['marca']),
    ':year' => htmlentities($_POST['age']),
    ':mileage' => htmlentities($_POST['km'])
  ));

  echo "<div class='alert alert-success' role='alert'>Registro insertado</div>";

}

}catch(Exception $ex){
  echo("Exception message: ".$ex->getMessage());
  return;
}

//Eliminar coche
if(isset($_POST["eliminar"])){

  $sql = "delete from autos where auto_id = :id";

  $prepare = $pdo->prepare($sql);
  $prepare->execute(array(
    ':id' => $_POST['id_auto']
  ));
  echo "<div class='alert alert-success' role='alert'>Registro Borrado</div>";
}
?>


<!DOCTYPE HTML>
<html>
<head>
  <title>Iván Hernández Fuentes</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>

  <?php
require_once('conexion.php');
  if($_GET["name"] == ""){

    die("Name parameter missing");
}
   ?>
<a href="index.php">Cerrar Sesión</a>
   <h3>Insertar un nuevo coche</h3>
   <form  METHOD = "POST" style="width: 30%">
     <div class="form-group">
        <label for="marca">Marca</label>
        <input type="text" name="marca" class="form-control" id="marca" placeholder="marca" >
     </div>
     <div class="form-group">
        <label for="km">Kilometros</label>
        <input type="text" name="km" class="form-control" id="km" placeholder="km" required="required">
     </div>
     <div class="form-group">
        <label for="km">Año</label>
        <input type="text" name="age" class="form-control" id="age" placeholder="age" required="required">
     </div>
     <input type="submit" value="enviar" name="enviar">
   </form>


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
</body>
</html>
