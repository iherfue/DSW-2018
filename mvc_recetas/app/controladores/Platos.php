<?php

class Platos extends Controlador{

  public function __construct() {
      echo "Controlador platos cargado";
      $this->articuloModelo = $this->cargaModelo("Plato");

  }

  public function index(){

    $datos = [
      "Titulo" => "Framework de Ivan"

    ];
      $this->cargaVista('recetas',$datos);
  }

}

 ?>
