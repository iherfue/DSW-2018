<?php


class Cart {  //creamos la clase cart

//Propiedades

public $articulos = array('id_articulo' => ''); //creamos el array articulos


  function __construct($id,$cantidad) //añadimos el constructor
  {
    $this->articulos[$id] = $cantidad;

  }

  //metodos

  function MeterArticulos($newarticulo,$newcantidad){  //creamos una funcion de meter articulos donde recibe dos argumentos el nuevo articulo y la cantidad

    if(array_key_exists($newarticulo,$this->articulos)){ //si la clave existe en el array se le añade la cantidad nueva a ese articulo

      $this->articulos[$newarticulo] += $newcantidad;

    }else{

      $this->articulos[$newarticulo] = $newcantidad;
    }

  }

  function SacarArticulos($newarticulo,$newcantidad){ //creamos una funcion donde sacamos los articulo, recibe dos parámetros o argumentos el articulo y la cantidad a sacar

    if(array_key_exists($newarticulo,$this->articulos)){ //si existe la clave en el array le resta esa cantidad al articulo

      $this->articulos[$newarticulo] -= $newcantidad;

    }else{

      $this->articulos[$newarticulo] = $newcantidad;
    }

  }

}//fin de la clase



class Cliente extends Cart{  //subclase cliente que hereda de cart

  public $cliente = ""; //propiedad cliente que sera el nombre del cliente

    function __construct(){   //constructor donde se le asigna al array articulos la clave y el valor respectivamente

      $this->articulos['10'] = 1;

  }

  function Propietario($nuevo){   //funcion que añade al carrito un propietario nuevo, recibe un argunmento que es el nombre del cliente

    $this->cliente = $nuevo; //le asignamos el nombre del cliente que recibe la funcion a la propiedad cliente de la clase

  }


}

 $carrito = new Cliente();  //creamos la instancia
 $carrito->Propietario("Ivan"); //añadimos un propietario al carrito
 $carrito->MeterArticulos("caramelo","40"); //metemos articulos ,recibe dos parámetros el id_articulo en este caso es un nombre para ver mejor y la cantidad
 $carrito->MeterArticulos("Yogur","10");
 $carrito->MeterArticulos("Coca Cola","16");
 $carrito->MeterArticulos("Fanta","7");
 $carrito->MeterArticulos("Fanta","2");//añadimos dos fantas nuevas el resultado deberia de ser 9

echo "<h2>Hola " . $carrito->cliente . " este es tu carrito:</h2>"; //imprime por pantalla el propietario del carrito entrando en la propiedad cliente del objeto carrito

$i = 0;
foreach($carrito->articulos as $a => $b){  //foreach para recorrer el array articulos asignadole la clave a la variable $a y el valor a $b

  if($i != 0){
    echo "Has añadido el articulo " , $a,", con una cantidad de ",$b,"<br>"; //imprimimos por pantalla el articulo que se ha añadido
  }else{
    $i = 1;
  }
}

 $carrito->SacarArticulos("caramelo","10");
 $carrito->SacarArticulos("Fanta","2");

 echo "Has quitado caramelos y ahora tienes ".$carrito->articulos["caramelo"];
 echo "<br>";
 echo "Has quitado Fanta y ahora tienes ".$carrito->articulos["Fanta"];

?>
