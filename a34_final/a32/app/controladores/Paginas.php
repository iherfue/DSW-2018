<?php

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

    public function en_US(){

      $usuarios = $this->usuarioModelo->Mostrar();
       $datos = [
         'usuarios' => $usuarios

       ];

      $user_locale = 'en_US.utf8';

      // Establece variables de entorno en el idioma del usuario
      putenv("LANGUAGE=$user_locale");
      putenv("LANG=$user_locale");  // Por si LANGUAGE falla

      if (!defined('LC_MESSAGES')) define('LC_MESSAGES', 5);
      // Establece la información de la configuración regional
      setlocale(LC_MESSAGES, $user_locale);

      textdomain("en_US");

      $this->cargaVista('inicio',$datos);

    }

    public function es_ES(){

      $usuarios = $this->usuarioModelo->Mostrar();
       $datos = [
         'usuarios' => $usuarios

       ];

      $user_locale = 'es_ES.utf8';

      // Establece variables de entorno en el idioma del usuario
      putenv("LANGUAGE=$user_locale");
      putenv("LANG=$user_locale");  // Por si LANGUAGE falla

      if (!defined('LC_MESSAGES')) define('LC_MESSAGES', 5);
      // Establece la información de la configuración regional
      setlocale(LC_MESSAGES, $user_locale);

      textdomain("es_ES");

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

        $datos = [

          'nombre' => '',
          'email' => '',
          'telefono' => ''
        ];

        $this->cargaVista('agregar',$datos);
      }
    }
  }
}
