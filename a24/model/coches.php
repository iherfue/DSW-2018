<?php

class Coche{

  private $pdo;

  public $id_coche;
  public $make;
  public $year;
  public $mileage;

  public function __CONSTRUCT(){

    try
		{
			$this->pdo = Database::Conectar();
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
  }

  public function Mostrar(){
    try{

			$stm = $this->pdo->prepare("SELECT * FROM autos");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
   }
   catch(Exception $e){
     die($e->getMessage());
   }
  }
}

 ?>
