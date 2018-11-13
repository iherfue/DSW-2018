<?php

 Class Controlador{

   public function cargaModelo($modelo){

     //carga el modelo
     require_once "../app/modelos/" .$modelo. ".php";

     //instanciamos el modelo(las tablass) y lo devuelve
     return new $modelo();

   }

   public function cargaVista($vista,$datos=[]){

     //si el fichero existe lo carga , en caso contrario informa del error y muere

     if (file_exists("../app/vistas/paginas/" .$vista. ".php")) {

       require_once "../app/vistas/paginas/" .$vista. ".php";
       echo "La vista ha cargado";

     }else {
       die("No existe la vista" . $vista);
     }
   }
}

?>
