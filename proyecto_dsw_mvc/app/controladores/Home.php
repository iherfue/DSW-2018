<?php

/**
 * [Clase Home seria el panel de administración]
 */
class Home extends Controlador{

	public $model;
	private $session;

    public function __construct(){

      $this->session = new Session();
    	$this->session->init();

    	if($this->session->getStatus() === 1 ||empty($this->session->get('email')))

    		header("Location: /proyecto_dsw_mvc/logins");
    		return;
    }

	/**
	 * Index es el método por defecto
	 * Idioma por defecto Español y carga la vista
	 */

	public function index(){

		if(!$_SESSION["lang"]){			//Si no existe la sesión del lang por defecto es en español

			$_SESSION["lang"] = 'es_ES';
		}

		if(isset($_POST["cambia_idioma_en"])){ 	//Si cambia el idioam al en_US o es_ES se establece

			$_SESSION["lang"] = 'en_US';
			echo "El idioma es ingles";

				header("Location: /proyecto_dsw_mvc/home");
			}

			if(isset($_POST["cambia_idioma_es"])){

				$_SESSION["lang"] = 'es_ES';
				echo "El idioma es español";

					header("Location: /proyecto_dsw_mvc/home");
				}

				$this->CargaVista('home');
	}

/**
 * Método Log para ver los errores que van surgiendo
 */

	public function log(){

		require_once "../app/vistas/php-errors.log";

	}

/**
 * Método Logout
 * Destruye la sesión y redirige
 */
	public function logout(){

		$this->session-> destruyeSesion();

		header("Location: /proyecto_dsw_mvc/logins");
	}
}

?>
