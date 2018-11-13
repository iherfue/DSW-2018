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

}

 ?>
