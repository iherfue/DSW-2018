<?php
/**
 * Clase logins es el controlador que se encarga de los logins y registros
 */
class Logins extends Controlador {

	private $session;

	public function __construct(){

		$this->session = new Session();
		$this->session->init();
		$this->loginModelo = $this->CargaModelo('Login');

	}

/**
 * Index es el método por defecto
 */
	public function index(){

		if(isset($_SESSION["error"])){
		echo('<p style="color: red;">'.htmlentities($_SESSION['error'])."</p>\n");
				 unset($_SESSION['error']);
			}

		if($_SERVER['REQUEST_METHOD'] == 'POST'){

		$datos = [

			'email' => $_REQUEST["email"],
			'password' => $_REQUEST["password"]
		];

		if($this->loginModelo->Comprobar($datos)){

			echo "correcto";
		}

		$this->CargaVista('login/login',$datos);

	}else {

				$datos = [

						'email' => '',
						'password' => ''
					];

					$this->CargaVista('login/login',$datos);

			}

	}


/**
 * Método Registrar
 */
	public function Registrar(){

	if($_SERVER['REQUEST_METHOD'] == 'POST'){

		$datos = [

			'email' => $_REQUEST["email"],
			'password' => $_REQUEST["pass"]
		];

		if($this->loginModelo->Insertar($datos)){

			echo "insertado";

		}

	}else{

		$datos = [

			'email' => '',
			'password' => ''

		];

	}

		$this->CargaVista('login/Registrar',$datos);
	}

}
 ?>
