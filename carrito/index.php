<?php


class Cart {

//Propiedades

public $articulos = array('id_articulo' => '');


  function __construct($id,$cantidad)
  {
    $this->articulos[$id] = $cantidad;

  }

  //metodos

  function MeterArticulos($newarticulo,$newcantidad){

    if(array_key_exists($newarticulo,$this->articulos)){

      $this->articulos[$newarticulo] += $newcantidad;

    }else{

      $this->articulos[$newarticulo] = $newcantidad;
    }

  }

  function SacarArticulos($newarticulo,$newcantidad){

    if(array_key_exists($newarticulo,$this->articulos)){

      $this->articulos[$newarticulo] -= $newcantidad;

    }else{

      $this->articulos[$newarticulo] = $newcantidad;
    }

  }

}//fin de la clase



class Cliente extends Cart{

  public $cliente = "";

    function __construct(){

      $this->articulos['10'] = 1;

  }

  function Propietario($nuevo){

    $this->cliente = $nuevo;

  }


}

 $carrito = new Cliente();
 $carrito->Propietario("Ivan");
 $carrito->MeterArticulos("caramelo","40");
 $carrito->MeterArticulos("Yogur","10");
 $carrito->MeterArticulos("Coca Cola","16");
 $carrito->MeterArticulos("Fanta","7");

echo "<h2>Hola " . $carrito->cliente . " este es tu carrito:</h2>";

$i = 0;
foreach($carrito->articulos as $a => $b){

  if($i != 0){
    echo "Has añadido el articulo " , $a,", con una cantidad de ",$b,"<br>";
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
