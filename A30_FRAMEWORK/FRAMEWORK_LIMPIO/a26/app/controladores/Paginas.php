<?php

class Paginas extends Controlador{

    public function __construct() {
        echo "Controlador páginas cargado";
        //desde aqui cargaremos los modelos
        $this->articuloModelo = $this->cargaModelo("Articulo");
    }
/*
    public function actualizar($id){

      print("metodo actualizar\n");
      echo $id;
    }

    public function eliminar(){

      echo "Metodo eliminar";
    }*/

    public function index(){

     
      $datos = [
        'Titulo' => "Framework de iván",
        'Texto' => "Bienvenido al Framework de ivan"

      ];
        $this->cargaVista('inicio',$datos);
    }

    public function articulo(){

      $this->cargaVista('articulo');
    }
}
 ?>
