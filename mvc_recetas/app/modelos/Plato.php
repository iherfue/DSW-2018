<?php
require_once('../app/librerias/Base.php');

class Plato {

  private $db;

  public $id_plato;
  public $nombre;
  public $comensales;
  public $ingredientes;
  public $descripcion;
  public $foto;
  public $tiempo;
  public $dificultad;
  public $fecha_publicacion;

  public $id_categoria;


  public function __CONSTRUCT(){

    $db = new Base();
  }

  public function Mostrar(){

    try
  {
    $result = array();

    $stm = $this->pdo->prepare("SELECT * FROM plato");
    $stm->execute();

    return $stm->fetchAll(PDO::FETCH_OBJ);
  }
  catch(Exception $e)
  {
    die($e->getMessage());
  }
  }

}

 ?>
