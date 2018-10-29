<?php
session_start();
require_once('conexion.php');

if ( ! isset($_SESSION['name']) ) {
  die('ACCESS DENIED');
}

  if(isset($_POST["enviar"])){

    if(!is_numeric($_POST["km"]) || (!is_numeric($_POST["age"]))){

      $_SESSION["error"] = "Kilometraje y año deben ser numéricos.";
      header("Location: add.php");
      return;
  }

  if($_POST["marca"] == ""){

    $_SESSION["error"] = "El campo marca es obligatorio";
    header("Location: add.php");
    return;
  }

  $sql = "insert into autos (make,year,mileage) values(:make,:year,:mileage)";
  //echo("<pre>\n" .$sql."\n</pre>\n");
  $prepar = $pdo->prepare($sql);   //pepara la consulta y ejecuta (solo si recibe parametros)
  $prepar->execute(array(
    ':make' => htmlentities($_POST['marca']),
    ':year' => htmlentities($_POST['age']),
    ':mileage' => htmlentities($_POST['km'])
  ));

/*  echo "<div class='alert alert-success' role='alert'>Registro insertado</div>";*/
  $_SESSION['success'] = "Record inserted";
  header("Location: index.php");
  return;

}

if (isset($_SESSION['error'])) {
    echo('<p style="color: red;">'.htmlentities($_SESSION['error'])."</p>\n");
      unset($_SESSION['error']);
}

?>

<!DOCTYPE HTML>
<html>
<head>
  <title>Iván Hernández Fuentes</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
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
     <input type="button" value="Cancelar" name="cancelar" onclick="location= 'view.php'">
   </form>
</body>
</html>
