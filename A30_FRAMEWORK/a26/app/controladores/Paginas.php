<?php

class Paginas extends Controlador{

    public function __construct() {
        echo "Controlador páginas cargado";
        $this->articuloModelo = $this->cargaModelo("Articulo");
    }

    public function actualizar($id){

      print("metodo actualizar\n");
      echo $id;
    }

    public function eliminar(){

      echo "Metodo eliminar";
    }

    public function index(){

      $articulos = $this->articuloModelo->obtenerArticulos();
      $cantidad = $this->articuloModelo->obtenerFilas();
      $datos = [
        'articulos' => $articulos,
        'cantidad' => $cantidad

      ];
        $this->cargaVista('inicio',$datos);
    }

    public function articulo(){

      $this->cargaVista('articulo');
    }
}
 ?>
