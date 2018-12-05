<?php
/**
 * Modelo Pelicula
 */
	class Pelicula {

		private $pdo;

		public $id_pelicula;
		public $titulo;
		public $anio;
		public $genero;
		public $calificacion;
		public $imagen;

		public function __construct(){

			try {

				$this->pdo = Database::Conectar();

			}catch(Exception $e){

				die($e->getMessage());
			}
		}

/**
 * Función que permite mostrar todas las peliculas
 * @return [devuelve un abjeto ]
 */
		public function MostrarPelis(){

			$stm = $this->pdo->prepare("select * from peliculas");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}

/**
 * Función buscar permite buscar una pelicula
 * @param [int] $id [recibe como parámetro el id de la pelicula a buscar]
 * @return [devuelve un array asociativo]
 */
		public function Buscar($id){

			$stm = $this->pdo->prepare("select * from peliculas where id_pelicula = ?");
			$stm->execute(array($id));
			return $stm->fetch(PDO::FETCH_ASSOC);
		}

/**
 * Inertar una pelicula de forma manual
 * @param [array] $datos [Array con todas los valores]
 */
		public function InsertarManual($datos){

			try {
			//	var_dump($datos);
				$sql = "insert into peliculas(titulo,anio,genero,calificacion,imagen) values(:titulo, :anio, :genero, :calificacion, :imagen)";

				 $array = $datos["genero"];
			 	$d = implode(',',$array); //convertir array en string primer parameto opcional (en mi caso ,) segundo parámetro el array

				$this->pdo->prepare($sql)->execute(array(

				':titulo' => htmlentities($datos["titulo"]),
				':anio' => htmlentities($datos["anio"]),
				':genero' => htmlentities($d),
				':calificacion' => htmlentities($datos["calificacion"]),
				':imagen' => htmlentities($datos["imagen"])

				));

			}catch(Exception $e){

				die($e->getMessage());
			}
		}

/**
 * Funcion para insertar las peliculas cuando se utiliza la API
 * @param [array] $datos [recibe todos los datos que devuelve la API]
 */
		public function InsertarAuto($datos){

			try {

				$sql = "insert into peliculas(titulo,anio,genero,calificacion,imagen) values(:titulo, :anio, :genero, :calificacion, :imagen)";

				$this->pdo->prepare($sql)->execute(array(

				':titulo' => htmlentities($datos["titulo"]),
				':anio' => htmlentities($datos["anio"]),
				':genero' => htmlentities($datos["genero"]),
				':calificacion' => htmlentities($datos["calificacion"]),
				':imagen' => htmlentities($datos["imagen"])

				));

			}catch(Exception $e){

				error_log('ocurrio el siguiente error' .  $e->getMessage());
				echo '<h2><a href="/proyecto_dsw_mvc/peliculas">Volver</a></h2>';
				die("Ha ocurrido un error consulte el log de errores para más información");

			}
		}

/**
 * Permine actualizar la pelicula
 * @param [array] $datos [recibe un array con los datos de la pelicula]
 */
		public function Actualizar($datos){

			$sql = "update peliculas set titulo = :titulo, anio = :anio, genero = :genero, calificacion = :calificacion where id_pelicula = :id";

			 $array = $datos["genero"];
			 $d = implode(',',$array); //convertir array en string primer parameto opcional (en mi caso ,) segundo parámetro el array
			 echo $d;
			$this->pdo->prepare($sql)->execute(

				array(

					':titulo' => htmlentities($datos["titulo"]),
					':anio' => htmlentities($datos["anio"]),
					':genero' => htmlentities($d),
					':calificacion' => htmlentities($datos["calificacion"]),
					':id' => htmlentities($datos["id_pelicula"])
				)//fin array
			);//fin execute
		}

/**
 * Permite eliminar una pelicula
 * @param [int] $id [recibe el id de la pelicula a eliminar]
 */
		public function Eliminar($id){

			try {

				$stm = $this->pdo->prepare("delete from peliculas where id_pelicula = :id");
				$stm->execute(array(
					':id'=> $id
				));

				}catch(Exception $e){

					error_log("Ocurrio el siguiente error: ". $e->getMessage());

					die("Ha ocurrido un error Consulte el log de errores para más información
					<a href='/proyecto_dsw_mvc/home/log'>Ir al log</a>
					");
			}
		}
	}
?>
