<?php
 Class Controlador{

   public function cargaModelo($modelo){
     //carga el modelo
     require_once "../app/model/" .$modelo. ".php";
     //instanciamos el modelo(las tablass) y lo devuelve
     return new $modelo();

   }

   public function cargaVista($vista,$datos=[],$data=[],$pelis=[]){

     //si el fichero existe lo carga , en caso contrario informa del error y muere
     if (file_exists("../app/vistas/" .$vista. ".php")) {
       require_once "../app/vistas/" .$vista. ".php";
      // echo "La vista ha cargado";
     }else {
       die("No existe la vista" . $vista);
     }

   }
}
?>
