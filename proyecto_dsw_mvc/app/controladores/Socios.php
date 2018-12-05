<?php

/**
 * [Clase Socio extiende de controlador]
 */
class Socios extends Controlador{

 	private $session;

    public function __construct(){

    	$this->session = new Session();
    	$this->session->init();

    	if($this->session->getStatus() === 1 ||empty($this->session->get('email')))
    		die('
  				<h1>Se requiere el inicio de la sesión</h1>
  				<a href="/proyecto_dsw_mvc/logins">Please login in</a>
			');

        $this->socioModelo = $this->CargaModelo('Socio');
    }

/**
 * [Método por defecto es index]
 * Llama al modelo de socio y muestra los socios
 */
	public function index(){

		$socios = $this->socioModelo->Mostrar();

		$datos = [

			'socios' => $socios
		];

		$this->CargaVista('/socio/socio',$datos);

	}

/**
 * [metodo buscar saca los detalles de un socio]
 * @param  [int] $id [ID del socio]
 */

	public function buscar($id){

		if(isset($id)){

			$data = $this->socioModelo->CuentaPelis($id);

			$datos = $this->socioModelo->Buscar($id); //REVISAR

			$pelis = $this->socioModelo->MuestraPelis($id);

			$this->CargaVista('socio/SocioBuscar',$datos,$data,$pelis);

		}else{      //Si no se proporciona un ID se manda un 404

			http_response_code(404);
			die("404 NOT FOUND");
		}
	}

/**
 * Metodo añadir un Socio
 */
	public function add(){

		if(isset($_POST["envia"]) && isset($_POST["nombre"])){

			if(is_numeric($_POST["nombre"]) || is_numeric($_POST["apellidos"])){

				$_SESSION["error"] = "El nombre y apellido deben ser de tipo texto";
      			header("Location: /proyecto_dsw_mvc/socios/add");
      			return;
			}

			if($_POST["telefono"] == "" || $_POST["dni"] == ""){

				$_SESSION["error"] = "Teléfono y DNI son campos obligatorios";
				header("Location: /proyecto_dsw_mvc/socios/add");
				return;
			}

			$datos = [

				'nombre' => $_REQUEST["nombre"],
				'apellidos' => $_REQUEST["apellidos"],
				'direccion' => $_REQUEST["direccion"],
				'dni' => $_REQUEST["dni"],
				'telefono' => $_REQUEST["telefono"]
			];

			   $this->socioModelo->Insertar($datos);

			header("Location: /proyecto_dsw_mvc/socios");

		}else {

			$datos = [

				'nombre' => '',
				'apellidos' => '',
				'direccion' => '',
				'dni' => '',
				'telefono' => ''
			];

			$this->CargaVista('socio/InsertarSocio',$datos);
		}
	}


/**
 * Metodo eliminar recibe el parametro ID del socio
 * @param  [int] $id [parametro que se pasa al metodo en la URL]
 */
	public function eliminar($id){

    if(!isset($id)){    //Si no se proporciona un ID al metodo envia 404
      http_response_code(404);
      die("404 NOT FOUND");
    }

		if(isset($_POST["elimina"])){

			if(isset($id)){

				$datos = [

					'id_socio' => $id

				];

			     $this->socioModelo->Eliminar($id);  //Se llama al metodo eliminar del controlador
			}

		    header("Location: /proyecto_dsw_mvc/socios");

	  }//fin if POST

		$this->CargaVista('socio/EliminarSocio');

	}

/**
 * Método editar socio
 * @param  [int] $id [se le pasa al metodo el id del socio]
 */
	public function editar($id){

    if(!isset($id)){
      http_response_code(400);
      die('404 NOT FOUND');
    }

		if(isset($_POST["envia"])){

			if(is_numeric($_POST["nombre"]) || is_numeric($_POST["apellidos"])){

				$_SESSION["error"] = "El nombre y apellido deben ser de tipo texto";
      			header("Location: ". $_SERVER['REQUEST_URI']);
      			return;
			}

			if($_POST["telefono"] == "" || $_POST["dni"] == ""){

				$_SESSION["error"] = "Teléfono y DNI son campos obligatorios";
				header("Location: " . $_SERVER['REQUEST_URI']);
				return;
			}

			$datos = [

				'id_socio' => $id,
				'nombre' => $_POST["nombre"],
				'apellidos' => $_POST["apellidos"],
				'direccion' => $_POST["direccion"],
				'dni' => $_POST["dni"],
				'telefono' => $_POST["telefono"]
			];

			$this->socioModelo->Actualizar($datos);    //llama al metodo actualizar del controlador Socios

		header("Location: /proyecto_dsw_mvc/socios");

		}else {

			$socio = $this->socioModelo->Buscar($id);

			$datos = [

				'id_socio' => $socio["id_socio"],
				'nombre' => $socio["nombre"],
				'apellidos' => $socio["apellidos"],
				'direccion' => $socio["direccion"],
				'dni' => $socio["dni"],
				'telefono' => $socio["telefono"]
			];

			$this->CargaVista('socio/EditarSocio',$datos);
		}
	}
}

?>
