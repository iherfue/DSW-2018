<?php
error_reporting(0);
class Core {

    protected $controladorActual ="Paginas"; //Controlador por defecto
    protected $metodoActual = "index"; // Método por defecto
    protected $parametros = []; // Por defecto no hay parámetros

//constructor donde se pasa a la variable url la funcion getUrl()
public function __construct() {

        $url = $this->getUrl();

        // Busca en controladores si el controlador existe
        if (file_exists("../controladores/" . ucwords($url[0]) . ".php")) {
            $this->controladorActual = ucwords($url[0]);

            //unset Paginas que es el controlador por defecto
            unset($url[0]);
        }

        //Importamos el controlador nuevo
        require_once "../controladores/" . $this->controladorActual . ".php";
        $this->controladorActual = new $this->controladorActual;
}

//funcion que obtiene el get
    public function getURL(){

        if (isset($_GET["url"])) { //si existe parametro en la url
            $url = rtrim($_GET["url"], "/"); //rtrim quita los espacios en blanco o / del final del string
            $url = filter_var($url, FILTER_SANITIZE_URL);//elimina todos los caracteres excepto letras y digitos
            $url = explode("/", $url);//divide el string en varios

            if($url[0] == "articulos"){ //cogemos la posicion 0 del array y detectamos si es articulos en ese caso el
                                        //controaldor pasara a ser Articulos
              $this->controladorActual = "Articulos";

            }
            return print_r($url);
        }

        echo $_GET["url"];

    }
}

 ?>
