<?php
	use PHPMailer\PHPMailer\PHPMailer;
/**
 * Clase alquila
 */
	class Alquila {

		private $pdo;

		public $id_socio;
		public $id_pelicula;

		public function __construct(){

			try {

				$this->pdo = Database::Conectar();

			}catch(Exception $e){

				die($e->getMessage());
			}
		}

/**
 * [Muestra todos los alquileres que hay en la base de datos]
 * @return [Devuelve un objeto de todas las filas en la BD]
 */

	public function MostrarAlquileres(){

		$stm = $this->pdo->prepare("select nombre,apellidos,dni,titulo,socios.id_socio,peliculas.id_pelicula from socios,peliculas,alquiladas where socios.id_socio = alquiladas.id_socio and peliculas.id_pelicula = alquiladas.id_pelicula;");
		$stm->execute();

		return $stm->fetchAll(PDO::FETCH_OBJ);

	}

/**
 * [Método que muestra los socios para poder Realizar el ALQUILER]
 * @return [devuelve un objeto con todas las filas de la BD]
 */

	public function MostrarSocios(){

		$stm = $this->pdo->prepare("select nombre,apellidos,id_socio from socios");
		$stm->execute();

		return $stm->fetchAll(PDO::FETCH_OBJ);

	}

	public function MostrarPeliculas(){

		$stm = $this->pdo->prepare("select titulo,anio,id_pelicula,imagen from peliculas");
		$stm->execute();

		return $stm->fetchAll(PDO::FETCH_OBJ);
	}

/**
 * Funcion para insertar un alquiler
 * @param [array] $datos [se recibe el array asociativo del controlador]
 */
		public function InsertarAlquiler($datos){

			try{

				$sql = "insert into alquiladas select id_socio,id_pelicula from socios,peliculas where socios.id_socio = :id_socio and peliculas.id_pelicula = :id_pelicula;";

				$this->pdo->prepare($sql)->execute(array(

					':id_socio' => htmlentities($datos["id_socio"]),
					':id_pelicula' => htmlentities($datos["id_pelicula"])
					));

			}catch(Exception $e){

				error_log("Ocurrio el siguiente error: <pre> ". $e->getMessage() ."</pre>");
				echo '<h2><a href="/proyecto_dsw_mvc/alquileres/add">Volver</a></h2><br/>';
				die("Ha ocurrido un error Consulte el <a href='/proyecto_dsw_mvc/home'>log de errores</a> para más información");
			}
		}

/**
 * Elimina el alquiler de un socio
 * @param [int] $id_socio    [recibe el id del socio que se desea eliminar el alquiler]
 * @param [int] $id_pelicula [recibe el id de la pelicula donde se eliminara el alquiler al socio]
 */
	public function Eliminar($id_socio,$id_pelicula){

			try {

			$stm = $this->pdo->prepare("delete from alquiladas where id_socio = :id_socio and id_pelicula = :id_pelicula");
			var_dump($id);
			$stm->execute(array(

			':id_socio'=> $id_socio,
			':id_pelicula' => $id_pelicula
			));

		}catch(Exception $e){

			error_log("Ocurrio el siguiente error: <pre> ". $e->getMessage() ."</pre>");
			echo '<h2><a href="/proyecto_dsw_mvc/alquileres/add">Volver</a></h2><br/>';
			die("Ha ocurrido un error Consulte el <a href='/proyecto_dsw_mvc/home'>log de errores</a> para más información");
		}
	}

/**
 * Función para enviar un correo al usuario
 * @param [array] $datos [se reciben todos los datos de la pelicula]
 */
		public function EnviarCorreo($datos){

			$id = $datos["id_pelicula"];	//Almacenamos en una variable el id de la pelicula
			$stm = $this->pdo->prepare("select * from peliculas where id_pelicula = ?");
			$stm->execute(array($id));

			//Devolvemos un array asociativo con todos los datos de la pelicula
			$devuelve = $stm->fetch(PDO::FETCH_ASSOC);
			$imagen =  $devuelve['imagen'];
			$nombre = $devuelve["titulo"];
			$calificacion = $devuelve["calificacion"];
			$genero = $devuelve["genero"];

			//Almacenamos el ID del socio y realizamos una consulta con todos los datos de ese usuario
			$id_socio = $datos["id_socio"];
			$sql = $this->pdo->prepare("select * from socios where id_socio = ?");
			$sql->execute(array($id_socio));

			//Devovlemos un array asociativo con los datos de ese socio
			$devuelve_socio = $sql->fetch(PDO::FETCH_ASSOC);
			$nombre_socio =  "Hola " . $devuelve_socio["nombre"];

			//CONSTRUIMOS EL MENSAJE

        $string = "<h2>Gracias por alquilar una pelicula, a continuación se muestra información sobre la misma : </h2><br/><br/>";
        $string_dos = "<table style='border-radius: 10px; background-color: #CB4335; padding:10px;'><tr><td><img src='". $imagen . "'></td><tr><td><b>" . $nombre . "</td></tr><tr><td>Género:" .$genero ."</td></tr><tr><td>Calificación: " . $calificacion."</td></tr></b></tr></table>
		<pre>!!Atención si visualiza este mensaje no se preocupe, no ha realizado ningun alquiler de la pelicula que se especifica en el mensaje. Este mensaje se ha generado exclusivamente para aprendizaje educativo. Si ha llegado a su correo ha sido debido a las pruebas que se han realizado para enviar un mensaje a un email especificado en una página web creada para uso educativo.</pre>
        ";
        $string_final = $string.$string_dos;

			//ENVIAMOS EL CORREO
      $mail = new PHPMailer(true);

      try {
                 //Create a new PHPMailer instance
        $mail = new PHPMailer;
        //Tell PHPMailer to use SMTP
        $mail->isSMTP();

        $mail->SMTPDebug = '0'; //No devuelve el debug
        $mail->Host = 'smtp.gmail.com'; //Establece el SMTP a usar
        $mail->Port = 587; //Puerto
        $mail->SMTPSecure = 'tls'; //cifrado
        $mail->SMTPAuth = true;
        //Cuenta desde donde se envia el mensaje
        $mail->Username = "atrapa108@gmail.com";
        //Contraseña de la cuenta
        $mail->Password = "Ivan_2@17";
        //Quien envia el correo
        $mail->setFrom('atrapa108@gmail.com', 'ivan');
				//A quien responder el correo
        $mail->addReplyTo('atrapa108@gmail.com', 'ivan');
        //email al que se envia (SOCIO), se añade un asunto
        $mail->addAddress($datos["email"], 'Hola');
        //Se añade el nombre del socio al asunto
        $mail->Subject = $nombre_socio;

				//Se establece el body del mensaje
        $mail->Body = $string_final;
        //Replace the plain text body with one created manually
        $mail->AltBody = 'This is a plain-text message body';
        //Attach an image file
        $mail->addAttachment('');
        //send the message, check for errors
        //Se comprueba si no se ha enviado el mensaje
        if (!$mail->send()) {
            echo "<div class='alert alert-danger' role='alert'>
  								Ha ocurrido un error al enviar el mensaje
									</div> "; //$mail->ErrorInfo;
        } else {

            $_SESSION["mensaje_enviado"] = "<div class='alert alert-primary' role='alert'>
  								El mensaje ha sido enviado
									</div>";
									header("Location: /proyecto_dsw_mvc/alquileres/add");
            //Section 2: IMAP
            //Uncomment these to save your message in the 'Sent Mail' folder.
            #if (save_mail($mail)) {
            #    echo "Message saved!";
            #}
					}

      } catch (Exception $e) {

          echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
      }
		}
	}

?>
