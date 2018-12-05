<?php
require_once("../app/model/Pelicula.php");

/**
 * Controlador de peliculas
 */
class Peliculas extends Controlador{

		public $session;

	public function __construct(){

		$this->session = new Session();
		$this->session->init();

		if($this->session->getStatus() === 1 ||empty($this->session->get('email')))
    	die('
  			<h1>Se requiere el inicio de la sesión</h1>
  			<a href="/proyecto_dsw_mvc/logins">Please login in</a>
		');

    	$this->peliculaModelo = $this->CargaModelo('Pelicula');
	}

/**
 * El método por defecto cargara todas las peliculas
 */

public function index(){

		$peliculas = $this->peliculaModelo->MostrarPelis();

		$datos = [

			'peliculas' => $peliculas
		];

		$this->CargaVista('/peliculas/peliculas',$datos);
}

/**
 * Método buscar
 * @param  [int] $id [recibe como parámetro el ID de la pelicula]
 * @return [devuelve los datos de esa pelicula]
 */
public function buscar($id){

		if(isset($id)){

			$datos = $this->peliculaModelo->Buscar($id);

			$this->CargaVista('peliculas/buscar',$datos);

			}else{			//Si no se proporciona un ID al método se envia un 404

				http_response_code(404);
				die("404 NOT FOUND");
			}
}

/**
 * Metodo añadir pelicula (Se incluye tanto la automática como manual)
 */
public function add(){

/**
 * Si el Usuario busca una pelicula se realizara lo siguiente:
 * Cuando se reciba el nombre de la pelicula, si esta tiene espacios
 * le añadimos un '_' y consultamos con la API
 */
		if(isset($_POST["busca_peli"])){

				$vacio = " ";
				$guion = "_";
				$pelicula = $_POST["pelicula"];

				$filter_pelicula = str_replace($vacio, $guion, $pelicula); //	Recibe 3 parámetros el carácter a buscar
																																	//El carácter a reemplazar y el string donde lo hará
				$url = "http://www.omdbapi.com/?t=".$filter_pelicula."&apikey=c3d7f030";

				//Almacenamos el response en una variable y conviertimos a un JSON
				$json = file_get_contents($url);
				$objeto = json_decode($json);

				if($objeto->Error){

					$_SESSION["notfound"] = "Pelicula no Encontrada Vuelva a intentarlo";
					header("Location: /proyecto_dsw_mvc/peliculas/add");
					return;
				}

				$this->CargaVista('/peliculas/InsertarPelicula',$objeto);
			}

/**
 * SI el usuario introduce la Película a Mano realizamos los siguientes pasos
 */

			if(isset($_POST["envia_manual"])){

				//RECIBIMOS DATOS DE LA IMAGEN
				$nombre_imagen = $_FILES['imagen']['name'];
				$tipo_imagen = $_FILES['imagen']['type'];
				$tamanio_imagen = $_FILES['imagen']['size'];

				//Establecemos donde se almacenara la imagen
				$carpeta_destino = $_SERVER["DOCUMENT_ROOT"] . '/proyecto_dsw_mvc/public/img/';

				  //Mover la imagen del directorio temporal a imagenes
  			move_uploaded_file($_FILES['imagen']['tmp_name'],$carpeta_destino.$nombre_imagen);

				$datos = [

					'titulo' => $_POST["titulo"],
					'anio' => $_POST["anio"],
					'genero' => $_POST["genero"],
					'calificacion' => $_POST["calificacion"],
					'imagen' => $nombre_imagen
				];

			$this->peliculaModelo->InsertarManual($datos);
			header("Location: /proyecto_dsw_mvc/peliculas/add");

		}

		/**
		 * Cuando el usuario ha buscado la PELICULA mediante la API  y esta de acuerdo
		 * se envían los datos
		 */
			if(isset($_POST["envia_auto"])){

				$datos = [

					'titulo' => $_POST["titulo"],
					'anio' => $_POST["anio"],
					'genero' => $_POST["genero"],
					'calificacion' => $_POST["calificacion"],
					'imagen' => $_POST["imagen"]
				];

				$this->peliculaModelo->InsertarAuto($datos);

				header("Location: /proyecto_dsw_mvc/peliculas/add");
				return;

			}//fin del if

	$this->CargaVista('peliculas/InsertarPelicula');
}

/**
 * Metodo editar la pelicula
 * @param  [int ($_POST)] $id [recibe como parámetro el ID de la pelicula]
 */

public function editar($id){

		if(isset($_POST["envia"])){

			$datos = [

				'id_pelicula' => $id,
				'titulo' => $_POST["titulo"],
				'anio' => $_POST["anio"],
				'genero' => $_POST["genero"],
				'calificacion' => $_POST["calificacion"]
			];

			if($this->peliculaModelo->Actualizar($datos)){
					header("Location: /proyecto_dsw_mvc/peliculas");
					return;
				}
					header("Location: /proyecto_dsw_mvc/peliculas");

			}else{

				$pelicula = $this->peliculaModelo->Buscar($id);

				$datos = [

					'id_pelicula' => $pelicula["id_pelicula"],
					'titulo' => $pelicula["titulo"],
					'anio' => $pelicula["anio"],
					'genero' => $pelicula["genero"],
					'calificacion' => $pelicula["calificacion"]
				];

				$this->CargaVista('peliculas/EditarPelicula',$datos);
			}
		}

public function eliminar($id){

		if(isset($_POST["elimina"])){

			if(isset($id)){

				$datos = [
					'id_pelicula' => $id
				];

				if($this->peliculaModelo->Eliminar($id)){

					$this->CargaVista('peliculas/EliminaPelicula',$datos);
				}

			}else{ 	//Si no se proporciona id se envia un 404

					http_response_code(404);
					die("404 NOT FOUND");
				}

				header("Location: /proyecto_dsw_mvc/peliculas");
			}

			$this->CargaVista('peliculas/EliminaPelicula');
		}
	}
?>
