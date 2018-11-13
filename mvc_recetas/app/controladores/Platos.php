 <?php

class Platos extends Controlador {

  public function __construct() {
      echo "Controlador platos cargado";
      $this->platoModelo = $this->cargaModelo("Plato");

  }

  public function indexes(){

/*    $datos = [
      "Titulo" => "Framework de Ivan"

    ];*/
      $this->cargaVista('recetas');
 }
}

 ?>
