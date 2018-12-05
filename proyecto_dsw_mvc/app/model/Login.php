<?php
/**
 * Modelo LOGIN
 */
	class Login {

	private $pdo;
	private $session;

	public $email;
	public $password;

	public function __construct(){

		$this->session = new Session();
		try {

			$this->pdo = Database::Conectar();

		}catch(Exception $e){

			die($e->getMessage());
		}
	}

/**
 * Iniciar sesión
 * @param [array] $datos [se recibe un array con el email y contraseña]
 */
	public function Insertar($datos){

		$email = $datos["email"];
		$password = $datos["password"];

		//Comprobamos si el email ya existe
		$comprueba = $this->pdo->query("select * from usuarios where email = '$email'");

		//Realizamos el cifrado
		$cifrado = password_hash($password,PASSWORD_DEFAULT);

		if($comprueba->fetchColumn() == 0){	//Se comprueba si no devuelve ninguna columna el Email proporcinado
																				//En ese caso se inserta
		$sql = "insert into usuarios (email,password) values(:email,:password)";

		$this->pdo->prepare($sql)->execute(array(

				':email' => htmlentities($datos["email"]),
				':password' => htmlentities($cifrado)
			));
			header("Location: /proyecto_dsw_mvc/logins");

		}else{	//Si no es igual a 0 ha devuelto una fila por lo que el email esta en uso

			echo 'El email ya esta en uso';
		}

	}

/**
 * Función para iniciar sesion en el sistema
 * @param [array] $datos [recibe en un array el email y contraseña que proporciona el usuario]
 */
	public function Comprobar($datos){

		$email = $datos["email"];
		$password = $datos["password"];

		$contador = 0;
		$sql = "select * from usuarios where email = :email";

		$resultado=$this->pdo->prepare($sql);

       $resultado->bindValue(":email",$email);
       //$resultado->bindValue(":password",$password);
      // var_dump($resultado);

       $resultado->execute(array(":email" =>$email));

			 //Mientras la consulta devuelva una fila con un array asociativo se verifica la contraseña
		while($registro = $resultado->fetch(PDO::FETCH_ASSOC)){

				if(password_verify($password,$registro["password"])){

                $contador++; //Si la contraseña coincide con el hash se suma al contador
          }
		}

		//Almacenamos el numero de filas devueltas
		$numero_registro = $resultado->rowCount();

		if(($numero_registro != 0) && ($contador > 0)){ //Se comprueba si el $numero_registro es distinto a 0
																										//quiere decir que existe en la BD y si además el contador
			echo "Bienvenido";														//es mayor a 0 quiere decir que la contraseña coincide, deja entrar al sistema

			$this->session->init();
			$this->session->add('email',$email);
			var_dump($this->session->getAll());
			header("Location: /proyecto_dsw_mvc/home");

		}else {	//Si no se cumple lo anterior se notifica al usuario

			  $_SESSION['error'] = "Contraseña incorrecta";
				header("Location: /proyecto_dsw_mvc/logins");

		}
	}
}

 ?>
