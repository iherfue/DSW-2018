<?php
//require_once('../app/librerias/Base.php');

class Articulo{

  private $db;

  public function __construct() {

  $this->db = new Base();

  }

  public function obtenerArticulos(){

    $this->db->query("SELECT * FROM articulos");

    return $this->db->registros();
  }

  public function obtenerFilas(){

    $this->db->query("select count(*) from articulos");

    return $this->db->fila();
  }
}

 ?>
