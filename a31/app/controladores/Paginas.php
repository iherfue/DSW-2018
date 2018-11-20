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

    public function articulo(){

      $this->cargaVista('articulo');
    }
}
 ?>
