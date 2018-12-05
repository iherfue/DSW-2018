<?php
error_reporting(0);
session_start();

$email_introducido = isset($_POST["email"]) ? $_POST["email"] : '';
$salt = 'XyZzy12 * _';
$contrasenia = $salt . $_POST["password"];
$md5 = hash('md5',$contrasenia);
$stored_hash = 'd111c788996c190d5f77ff67e30b0a28';
//echo $md5 = hash ('md5', 'XyZzy12 * _php123');
  if (isset($_POST["envia"]) && isset($_POST["password"])) {
      unset($_SESSION["name"]);
        if(($_POST["email"] == "") || ($_POST["password"] == "")){
            echo "Se requiere email y contraseña";
    }

    if(($md5 == $stored_hash ) && filter_var($_POST["email"],FILTER_VALIDATE_EMAIL)){
        $_SESSION['name'] = $_POST['email'];
        header("Location: /proyecto_dsw_mvc/home");
        return;
    }

    if(!filter_var($_POST["email"],FILTER_VALIDATE_EMAIL)){
      $_SESSION['error'] = "Email must have an at-sign (@)";
      header("Location: login.php");
      return;
    }

    if(!($md5 == $stored_hash)){
      $_SESSION['error'] = "Contraseña incorrecta";
      error_log("Login fail " . $_POST['email']."$md5");
      header("Location: login.php");
      return;
    }
}
?>
<html>
<head>
  <title>Iván Hernández Fuentes</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
<div class="container-fluid">
  <?php
  //SI HAY UN ERROR MUESTRA LO QUE ESTA ALMACENADO EN ESE ERROR
  if ( isset($_SESSION['error']) ) {
      echo('<p style="color: red;">'.htmlentities($_SESSION['error'])."</p>\n");
        unset($_SESSION['error']);
  }
  ?>

<div class="row">
<div class="col-md-5">
		<form action="login.php" method="POST">
        <h3>Iniciar Sesión</h3>
  			<div class="form-group">
    			<label for="email">Email</label>
    			<input type="email" name ="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="email">
  			</div>
  			<div class="form-group">
    			<label for="pass">Contraseña</label>
    			<input type="password" name="password" class="form-control" id="pass" placeholder="Contraseña">
  			</div>
  
  		<button type="submit" name="envia" class="btn btn-primary">Enviar</button>

		</form>
</div>
</div>
</body>
</html>