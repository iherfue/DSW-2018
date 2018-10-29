<?php
require_once('conexion.php');
session_start();

if(isset($_POST['eliminar']) && isset($_POST['auto_id'])){

  $sql = "delete from autos where auto_id = :auto_id";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(array(
    ':auto_id' => $_POST['auto_id']
  ));
  $_SESSION['success'] = 'Registro eliminado';
  header("Location: index.php");
  return;
}

$stmt = $pdo->prepare("select auto_id, make from autos where auto_id = :auto_id");
$stmt->execute(array(":auto_id" => $_GET['auto_id']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

 ?>

 <!DOCTYPE html>
 <html lang="es" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
     <p>Esta seguro que desea borrar el registro <?php echo $row['make']?></p>
     <form method="post">
       <input type="hidden" name="auto_id" value="<?php echo $row['auto_id']?>">
       <input type="submit" value="eliminar" name="eliminar">
       <a href="index.php">Cancel</a>
     </form>
   </body>
 </html>
