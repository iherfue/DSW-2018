<?php

class Base{

  private $host = DB_HOST;
  private $user = DB_USUARIO;
  private $pass = DB_PASSWORD;
  private $nombreBD = DB_NOMBRE;

  private $dbh; //DataBase Handler
  private $stmt;
  private $error;

  public function __construct() {
        //Configuramos la conexión
        $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->nombreBD;
        $opciones = array (
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
        );

        try {
            //TO DO: CONEXIÓN CON LA BBDD

            $this->dbh = new PDO($dsn, $this->user, $this->pass);
            echo "La conexión ha sido realizada correctamente";
//            $this->dbh->exec("set names:utf8");

        }
        catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    //prepara la consulta
    public function query($sql) {

        $this->stmt = $this->dbh->prepare($sql);
      }

      public function execute() {

        return $this->stmt->execute();
      }
      //obtiene los registros y los devuelve como objeto
      public function registros() {

        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
      }

      public function fila(){

        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
      }

      public function bind ($param, $valor, $tipo = null) {
        if (is_null($tipo)) {
            switch (true) {
                case is_int($valor):
                    $tipo = PDO::PARAM_INT;
                    break;
                case is_bool($valor):
                    $tipo = PDO::PARAM_BOOL;
                    break;
                case is_null($valor):
                    $tipo = PDO::PARAM_NULL;
                    break;
                default:
                    $tipo = PDO::PARAM_STR;

            }
        }
        $this->stmt->bindValue($param, $valor, $tipo);
}

}

 ?>
