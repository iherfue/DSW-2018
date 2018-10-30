<?php
session_start();
require_once('conexion.php');

if ( ! isset($_SESSION['name']) ) {
  die('ACCESS DENIED');
}

if(isset($_POST['make']) && isset($_POST['year']) && isset($_POST['mileage'])){

  if(isset($_POST["update"])){

    if(!is_numeric($_POST["mileage"]) || (!is_numeric($_POST["year"]))){

      $_SESSION["error"] = "Kilometraje y año deben ser numéricos.";
      header("Location: edit.php?auto_id=".urlencode($_GET['auto_id']));
      return;
  }

  if($_POST["make"] == ""){

    $_SESSION["error"] = "El campo marca es obligatorio";
    header("Location: edit.php?auto_id=".urlencode($_GET['auto_id']));
    return;
  }

  $sql = "Update autos set make = :make,
          year = :year, mileage = :mileage where auto_id = :auto_id";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(array(
    ':make' => htmlentities($_POST['make']),
    ':year' => htmlentities($_POST['year']),
    ':mileage' => htmlentities($_POST['mileage']),
    ':auto_id' => htmlentities($_POST['auto_id'])
  ));

  $_SESSION['success'] = 'Registro modificado';
  header('location: index.php');
  return;
 }
}

$stmt = $pdo->prepare("select * from autos where auto_id = :auto_id");
$stmt->execute(array(":auto_id" => $_GET['auto_id']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if($row == false){

  $_SESSION['error'] = "Falta valor para autos_id";
  header("Location: index.php");
  return;
}

?>

<?php
$m = htmlentities($row ['make']);
$y = htmlentities($row ['year']);
$km = htmlentities($row ['mileage']);
$auto_id = $row['auto_id'];


 if (isset($_SESSION['error'])) {
     echo('<p style="color: red;">'.htmlentities($_SESSION['error'])."</p>\n");
       unset($_SESSION['error']);
 }

?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <p>Editar coche</p>
    <form  method="post">
      <p>
        Make
        <input type="text" name="make" value="<?php echo $m ?>"></p>
      </p>
      <p>
        Year
        <input type="text" name="year" value="<?php echo $y ?>"></p>
      </p>
      <p>
        Mileage
        <input type="text" name="mileage" value="<?php echo $km ?>"></p>
      </p>
      <input type="submit" name="update" value="enviar">
      <input type="hidden" name="auto_id" value="<?= $auto_id?>">
      <a href="index.php">Cancelar</a>
    </form>
  </body>
</html>
