<?php
session_start();
error_reporting(0);
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
        header("Location: view.php");
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
</head>
<body>
  <h3>Inicia Sesión</h3>
  <?php
  //SI HAY UN ERROR MUESTRA LO QUE ESTA ALMACENADO EN ESE ERROR
  if ( isset($_SESSION['error']) ) {
      echo('<p style="color: red;">'.htmlentities($_SESSION['error'])."</p>\n");
        unset($_SESSION['error']);
  }
  ?>
  
<form action ="login.php" method="POST">
	Email<input type="text" name="email" value=<?php echo htmlentities($email_introducido)?>>
	contraseña<input type="password" name="password">
	<input type="submit" name="envia" value="iniciar sesion">
</form>
</body>
</html>
