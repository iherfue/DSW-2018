<?php
use PHPMailer\PHPMailer\PHPMailer;
      
class Paginas extends Controlador{

    public function __construct() {
        
        //desde aqui cargaremos los modelos
        $this->usuarioModelo = $this->cargaModelo("Usuario");
        
    }

    public function index(){

     $usuarios = $this->usuarioModelo->Mostrar();
      $datos = [
        'usuarios' => $usuarios

      ];
        $this->cargaVista('inicio',$datos);
    }

    public function articulo(){

      $this->cargaVista('articulo');

    }

    public function agregar(){

      if($_SERVER["REQUEST_METHOD"] == 'POST'){

        $datos = [

          'nombre' => trim($_POST["nombre"]),
          'email' => trim($_POST["email"]),
          'telefono' => trim($_POST["tlf"])
        ];

        if($this->usuarioModelo->agregarUsuario($datos)){

          redireccionar('/paginas');
        }else{

          die("hubo un error");

      }
    }else{

        $datos = [

          'nombre' => '',
          'email' => '',
          'telefono' => ''
        ];

        $this->cargaVista('agregar',$datos);
      }
    }

    public function editar($id){

     if($_SERVER["REQUEST_METHOD"] == 'POST'){

        $datos = [

          'id_usuario' =>$id,
          'nombre' => trim($_POST["nombre"]),
          'email' => trim($_POST["email"]),
          'telefono' => trim($_POST["tlf"])
        ];

        if($this->usuarioModelo->editarUsuario($datos)){

          redireccionar('/paginas');
        }else{

          die("hubo un error");

      }
    }else{

        $usuario = $this->usuarioModelo->obtenerUsuario($id);

        $datos = [

          'id_usuario' =>$usuario->id_usuario,
          'nombre' => $usuario->nombre,
          'email' => $usuario->email,
          'tlf' => $usuario->tlf
        ];

        $this->cargaVista('editar',$datos);
      }
    } 

    public function eliminar($id){

      if(isset($_POST["elimina"])){

          if(isset($id)){

            $datos = [

            'id_socio' => $id

            ];

          if($this->usuarioModelo->Eliminar($id)){

            $this->CargaVista('Eliminar',$datos);

            }

          }else{

            http_response_code(404);
            die("404 NOT FOUND");
        }

          redireccionar('/paginas');
      }

          $this->CargaVista('Eliminar');

      }

      public function datos($id){

        $usuario = $this->usuarioModelo->obtenerUsuario($id);

        if(isset($_POST["envia"])){

        $datos = [

          'id_usuario' =>$usuario->id_usuario,
          'nombre' =>$usuario->nombre,
          'email' =>$usuario->email,
          'tlf' =>$usuario->tlf,
          
        ];

        require_once '../vendor/autoload.php';
        $mpdf = new \Mpdf\Mpdf();

        // Write some HTML code:
        $mpdf->WriteHTML($datos['id_usuario']);
        $mpdf->WriteHTML($datos['nombre']);
        $mpdf->WriteHTML($datos['email']);
        $mpdf->WriteHTML($datos['tlf']);

        // Output a PDF file directly to the browser
        $mpdf->Output();

        
    }else{

        $usuario = $this->usuarioModelo->obtenerUsuario($id);

        $datos = [

          'id_usuario' =>$usuario->id_usuario,
          'nombre' => $usuario->nombre,
          'email' => $usuario->email,
          'tlf' => $usuario->tlf
        ];

        $this->cargaVista('datos',$datos);
      }

      }
      
      public function correo(){

        require '../vendor/PHPMailer/PHPMailer/src/Exception.php';
        require '../vendor/PHPMailer/PHPMailer/src/PHPMailer.php';
        require '../vendor/PHPMailer/PHPMailer/src/SMTP.php';

      $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
      try {
                 //Create a new PHPMailer instance
        $mail = new PHPMailer;
        //Tell PHPMailer to use SMTP
        $mail->isSMTP();
        //Enable SMTP debugging
        // 0 = off (for production use)
        // 1 = client messages
        // 2 = client and server messages
        $mail->SMTPDebug = 2;
        //Set the hostname of the mail server
        $mail->Host = 'smtp.gmail.com';
        // use
        // $mail->Host = gethostbyname('smtp.gmail.com');
        // if your network does not support SMTP over IPv6
        //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
        $mail->Port = 587;
        //Set the encryption system to use - ssl (deprecated) or tls
        $mail->SMTPSecure = 'tls';
        //Whether to use SMTP authentication
        $mail->SMTPAuth = true;
        //Username to use for SMTP authentication - use full email address for gmail
        $mail->Username = "";
        //Password to use for SMTP authentication
        $mail->Password = "";
        //Set who the message is to be sent from
        $mail->setFrom('', 'ivan');
        //Set an alternative reply-to address
        $mail->addReplyTo('', 'Hola');
        //Set who the message is to be sent to
        $mail->addAddress('', 'Hola');
        //Set the subject line
        $mail->Subject = 'Hola Jesus';
        //Read an HTML message body from an external file, convert referenced images to embedded,
        //convert HTML into a basic plain-text alternative body
        //$mail->msgHTML(file_get_contents('contents.html'), __DIR__);
        $mail->Body = "Hola";
        //Replace the plain text body with one created manually
        $mail->AltBody = 'This is a plain-text message body';
        //Attach an image file
        $mail->addAttachment('');
        //send the message, check for errors
        if (!$mail->send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            echo "Message sent!";
            //Section 2: IMAP
            //Uncomment these to save your message in the 'Sent Mail' folder.
            #if (save_mail($mail)) {
            #    echo "Message saved!";
            #}
}

          echo 'Message has been sent';
      } catch (Exception $e) {
          echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
      }
      }

    }

