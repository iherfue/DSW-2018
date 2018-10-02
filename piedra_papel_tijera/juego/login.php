<?php 
error_reporting(0);
?>
<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
<title>Iván Piedra Papel Tijera</title>
</head>

<body>


<form action ="login.php" method="POST">

	Usuario<input type="text" name="usuario">
	contraseña<input type="password" name="password">
	<input type="submit" name="envia" value="iniciar sesion">
	
	<?php 

	$salt = 'XyZzy12 * _';
	
	$contrasenia = $salt . $_POST["password"];
	
    $md5 = hash('md5',$contrasenia);
	
	$stored_hash = 'd111c788996c190d5f77ff67e30b0a28';
	
	//echo $md5 = hash ('md5', 'XyZzy12 * _php123');
	
	   
	if (isset($_POST["envia"])) {
	    
	    if((($_POST["usuario"] == "")) || ($_POST["password"] == "")){
	        
	       echo "Se requiere nombre de usuario y clave para acceder";   
	    }else
	    
	    if(($md5 == $stored_hash )){
	        
	        
	        echo "bienvenido";
	        header("Location: game.php?name=".urlencode($_POST['usuario']));
	        
	    }else {
	        
	        echo "Contraseña incorrecta";
	       
	    }
	    
	}
	
	?>

</form>
</body>
</html>