<?php

class Core {

    protected $controladorActual ="Paginas"; //Controlador por defecto
    protected $metodoActual = "index"; // Método por defecto
    protected $parametros = []; // Por defecto no hay parámetros

//constructor donde se pasa a la variable url la funcion getUrl()
public function __construct() {

        $url = $this->getUrl();

        // Busca en controladores si el controlador existe
        if (file_exists("../app/controladores/" . ucwords($url[0]) . ".php")) {
            $this->controladorActual = ucwords($url[0]);

            //unset Paginas que es el controlador por defecto
            unset($url[0]);
        }

          require_once "../app/controladores/" . $this->controladorActual . ".php";
          $this->controladorActual = new $this->controladorActual;

          //print_r($this->controladorActual);

        if(isset($url[1])){

            if(method_exists($this->controladorActual, $url[1])){

              $this->metodoActual = $url[1];
              unset($url[1]);
            }
        }


        echo $this->metodoActual;

        $this->parametros = $url ? array_values($url) : [];
        //llama a los metodos de una clase  dado  un array de parámetros, recibe 2 parámateros un array y el parametro
        //que se le pasa siguiendo (controlador/metodos/parametros)
        call_user_func_array ([$this->controladorActual, $this->metodoActual], $this->parametros);

}

//funcion que obtiene el get
    public function getURL(){

        if (isset($_GET["url"])) { //si existe parametro en la url
            $url = rtrim($_GET["url"], "/"); //rtrim quita los espacios en blanco o / del final del string
            $url = filter_var($url, FILTER_SANITIZE_URL);//elimina todos los caracteres excepto letras y digitos
            $url = explode("/", $url);//divide el string en varios

            return $url;
        }

//        echo $_GET["url"];

    }
}

 ?>
