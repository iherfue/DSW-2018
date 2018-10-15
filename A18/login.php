<?php
$email_introducido = isset($_POST["email"]) ? $_POST["email"] : '';
?>
<html>
<head>
  <title>Iván Hernández Fuentes</title>
</head>
<body>
<form action ="login.php" method="POST">

	Email<input type="text" name="email" value=<?php echo htmlentities($email_introducido)?>>
	contraseña<input type="password" name="password">
	<input type="submit" name="envia" value="iniciar sesion">

	<?php
	$salt = 'XyZzy12 * _';

	$contrasenia = $salt . $_POST["password"];

    $md5 = hash('md5',$contrasenia);

	$stored_hash = 'd111c788996c190d5f77ff67e30b0a28';

	//echo $md5 = hash ('md5', 'XyZzy12 * _php123');


	if (isset($_POST["envia"])) {

	    if((($_POST["email"] == "")) || ($_POST["password"] == "")){

	       echo "Se requiere email y contraseña";
	    }

	    if(($md5 == $stored_hash ) && filter_var($_POST["email"],FILTER_VALIDATE_EMAIL)){

          error_log("Login Success " . $_POST['email']."$md5");
	        echo "bienvenido";
	        header("Location: autos.php?name=".urlencode($_POST['email']));
      }

      if(!filter_var($_POST["email"],FILTER_VALIDATE_EMAIL)){

        echo "El correo debe tener un @";
      }

      if(!($md5 == $stored_hash)){
        echo "contraseña incorrecta";
        error_log("Login fail " . $_POST['email']."$md5");
        //phpinfo();
      }


	}

	?>

</form>
</body>
</html>
