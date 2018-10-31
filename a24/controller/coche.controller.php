<?php
require_once 'model/coche.php';

class CocheController{

    private $model;

    public function __CONSTRUCT(){
        $this->model = new Coche();
    }

    public function Index(){
        require_once 'view/header.php';
        require_once 'view/coche/coche.php';
        require_once 'view/footer.php';
    }

    public function Crud(){

      if (!isset($_SESSION['name']) ) {
        
        die('ACCESS DENIED');

      }

        $coch = new Coche();

        if(isset($_REQUEST['id'])){
            $coch = $this->model->Obtener($_REQUEST['id']);
        }

        require_once 'view/header.php';
        require_once 'view/coche/coche-editar.php';
        require_once 'view/footer.php';
    }

    public function Guardar(){
        $coch = new Coche();

        $coch->auto_id = $_REQUEST['id'];
        $coch->make = $_REQUEST['make'];
        $coch->year = $_REQUEST['year'];
        $coch->mileage = $_REQUEST['mileage'];

        if($coch->auto_id > 0){ //se comprueba si se esta editando un coche en ese caso se realizan las validaciones siguientes si todo sale bien Actualiza

          if(!is_numeric($_REQUEST["mileage"]) || (!is_numeric($_REQUEST["year"]))){
      					$_SESSION["error"] = "Kilometraje y año deben ser numéricos.";
      					header("Location: index.php?c=Coche&a=Crud&id=".urlencode($_REQUEST['id']));
      					return;
      			}
      			if($_REQUEST["make"] == ""){
      				$_SESSION["error"] = "El campo marca es obligatorio";
      				header("Location: index.php?c=Coche&a=Crud&id=".urlencode($_REQUEST['id']));
      				return;
      			}
            $this->model->Actualizar($coch);
            header('Location: index.php');

          }else { //en otro caso se trata de un registro por tanto a la hora de validar hay que tener cuidado a la hora de redirigir

            if(!is_numeric($_REQUEST["mileage"]) || (!is_numeric($_REQUEST["year"]))){
        					$_SESSION["error"] = "Kilometraje y año deben ser numéricos.";
        					header("Location: index.php?c=Coche&a=Crud");
        					return;
        			}
        			if($_REQUEST["make"] == ""){
        				$_SESSION["error"] = "El campo marca es obligatorio";
        				header("Location: index.php?c=Coche&a=Crud");
        				return;
        			}
            $this->model->Registrar($coch);
            header('Location: index.php');
          }

    }

    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id']);
        header('Location: index.php');
    }
}
