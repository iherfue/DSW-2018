<?php

class Paginas {

    public function __construct() {
        echo "Controlador páginas cargado";
    }

    public function actualizar($id){

      print("metodo actualizar\n");
      echo $id;
    }

    public function eliminar(){

      echo "Metodo eliminar";
    }

}
 ?>
