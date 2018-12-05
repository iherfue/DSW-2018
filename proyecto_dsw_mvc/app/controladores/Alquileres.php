<?php
error_reporting(0);
/**
 * [Clase Alquileres extiende de controlador]
 */
	class Alquileres extends Controlador{

		public $session;

		public function __construct(){

			$this->session = new Session();
			$this->session->init();

			if($this->session->getStatus() === 1 ||empty($this->session->get('email')))
    		die('
  				<h1>Se requiere el inicio de la sesión</h1>
  				<a href="/proyecto_dsw_mvc/logins">Please login in</a>
			');

    		$this->alquilaModelo = $this->CargaModelo('Alquila');
		}

/**
 * [index metodo por defecto]
 */
		public function index(){

			$alquileres = $this->alquilaModelo->MostrarAlquileres();

			$datos = [

				'alquiladas' => $alquileres
			];

			$this->CargaVista('/alquiler/Alquiladas',$datos);
		}

/**
 * [Metodo añadir un alquiler]
 */
		public function add(){

			if(isset($_SESSION["mensaje_enviado"])){
				echo $_SESSION["mensaje_enviado"];
				unset($_SESSION["mensaje_enviado"]);

			}
		/**
		 * [if Si el usuario envia se le asigna al array datos,
		 *  una clave y un valor, este que sera lo que se recibe por POST]
		 */
			if(isset($_POST["envia"])){

				$datos = [

					'id_socio' => $_POST["socios"],
					'id_pelicula' => $_POST["peliculas"],
					'email' => $_POST["email"],
					'imagen' => $_POST["imagen"]
				];

				if(isset($_POST["enviar_correo"])){  //Si hace el ckecbox llamamos al metodo EnviarCorreo
					
						echo "Correo enviado";
						$this->alquilaModelo->EnviarCorreo($datos);
					}


				if($this->alquilaModelo->InsertarAlquiler($datos)){

					header("Location: /proyecto_dsw_mvc/alquileres/");
				}

			}

			//Si el usuario no envia el formulario, se llama a los metodos
			//correspondientes para rellenar los datalist con la información
			$alquileres = $this->alquilaModelo->MostrarSocios();
			$peliculas = $this->alquilaModelo->MostrarPeliculas();

			$datos = [

				'socios' => $alquileres,
				'peliculas' => $peliculas
			];

			$this->CargaVista('/alquiler/NuevoAlquiler',$datos);
		}

/**
 * [El método eliminar, elimina un alquiler al socio]
 * @param [int] $id_socio    [recibe el ID del socio]
 * @param [int] $id_pelicula [recibe el ID de la pelicula]
 */
		public function Eliminar($id_socio,$id_pelicula){

			if(!isset($id_socio,$id_pelicula)){			//Si no se le han pasado los parámetros al método
																							//envia un 404
					http_response_code(404);
					die("404 NOT FOUND");
			}

			if(isset($_POST["elimina"])){

				if(isset($id_socio,$id_pelicula)){

					$datos = [
						'id_socio' => $id_socio,
						'id_pelicula' => $id_pelicula
 					];


					if($this->alquilaModelo->Eliminar($id_socio,$id_pelicula)){

						$this->CargaVista('/alquiler/EliminaAlquiler',$datos);
					}

				}

				header("Location: /proyecto_dsw_mvc/alquileres");

			}//fin del IF  del post elimina

			$this->CargaVista('/alquiler/EliminaAlquiler');
		}
	}
?>
