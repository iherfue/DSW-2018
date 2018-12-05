<?php

/**
 * Modelo de Socio
 */

class Socio {

	private $pdo;

	public $id_socio;
	public $nombre;
	public $apellidos;
	public $direccion;
	public $telefono;
	public $dni;

	public function __construct(){

		try {

			$this->pdo = Database::Conectar();

		}catch(Exception $e){

			die($e->getMessage());
		}
	}

/**
 * Metodo que permite mostrar todos los socios de la BD
 * @return [devuelve todas las filas de la BD en un objeto]
 */

	public function Mostrar(){

		$stm = $this->pdo->prepare("Select * from socios");
		$stm->execute();

		return $stm->fetchAll(PDO::FETCH_OBJ);
	}

/**
 * Metodo para buscar un socio
 * @param [int] $id [la funcion recibe un argumento que es el id del socio a buscar]
 * @return [devuelve una fila en un array asociativo]
 */

	public function Buscar($id){

		$stm = $this->pdo->prepare("select * from socios where id_socio = ?");
		$stm->execute(array($id));
		return $stm->fetch(PDO::FETCH_ASSOC);
	}

/**
 * [Cuenta las peliculas que tiene el socio]
 * @param [int] $id [recibe el id del socio]
 * @return [devuelve una fila en un array asociativo]
 */

	public function CuentaPelis($id){

		$sql = $this->pdo->prepare("select count(*) from alquiladas,socios where alquiladas.id_socio = socios.id_socio and socios.id_socio = ?");
		$sql->execute(array($id));
		return $sql->fetch(PDO::FETCH_ASSOC);
	}

/**
 * [Muestra las peliculas que tiene el socio alquiladas]
 * @param [int] $id [recibe como argumento el id del socio]
 * @return [devuelve todas las filas en un array asociativo]
 */

	public function MuestraPelis($id){

		$sql = $this->pdo->prepare("select titulo,anio,imagen from peliculas,socios,alquiladas where socios.id_socio = alquiladas.id_socio and peliculas.id_pelicula = alquiladas.id_pelicula and socios.id_socio = ?");
		$sql->execute(array($id));

		return $sql->fetchAll(PDO::FETCH_ASSOC);
	}

/**
 * Actualiza la información de un socio
 * @param [array] $datos [recibe un array con todos los datos de ese usuario]
 */

	public function Actualizar($datos){

		$sql = "Update socios set nombre = :nombre, apellidos = :apellidos, direccion = :direccion, telefono = :telefono, dni = :dni
		where id_socio = :id";

		$this->pdo->prepare($sql)->execute(

			array(

				':nombre' => htmlentities($datos["nombre"]),
				':apellidos' => htmlentities($datos["apellidos"]),
				':direccion' => htmlentities($datos["direccion"]),
				':telefono' => htmlentities($datos["telefono"]),
				':dni' => htmlentities($datos["dni"]),
				':id' => htmlentities($datos["id_socio"])
				)
			);//Fin del execute
	}

/**
 * Añade un nuevo socio a la BD
 * @param [array] $datos [recibe todos los datos que estan almacenados en el array]
 */

	public function Insertar($datos){

		try{

		$sql = "insert into socios(nombre,apellidos,direccion,telefono,dni) values(:nombre,:apellido,:direccion,:telefono,:dni)";

		$this->pdo->prepare($sql)->execute(array(

			':nombre' => htmlentities($datos["nombre"]),
			':apellido' => htmlentities($datos["apellidos"]),
			':direccion' => htmlentities($datos["direccion"]),
			':telefono' => htmlentities($datos["telefono"]),
			':dni' => htmlentities($datos["dni"])
			));

		}catch(Exception $e){

			die($e->getMessage());
		}
	}

/**
 * Permite eliminar un Socio
 * @param [int] $id [recibe el id del socio a eliminar]
 */
	
	public function Eliminar($id){

		try {

			$stm = $this->pdo->prepare("delete from socios where id_socio = :id");
			$stm->execute(array(

			':id'=> $id
			));

		}catch(Exception $e){

			error_log("Ocurrio el siguiente error (debido a las restricciones de las claves foráneas): <pre> ". $e->getMessage() ."</pre>");
			echo "<h3>No se puede eliminar al socio, es posible que este tenga una película alquilada</h3>
				<a href='/proyecto_dsw_mvc/socios'>Volver</a><br/>
				";
			die("Ha ocurrido un error Consulte el <a href='/proyecto_dsw_mvc/home'>log de errores</a> para más información");

		}

	}
}

?>
