<?php

	class Usuario {

		private $db;

		public function __construct(){

			$this->db = new Base;
		}

		public function Mostrar(){

			$this->db->query("select * from usuarios");

			$resultados = $this->db->registros();

			return $resultados;
		}

		public function agregarUsuario($datos){

			$this->db->query("insert into usuarios(nombre,email,tlf) value(:nombre,:email,:tlf)");

			$this->db->bind(':nombre',$datos["nombre"]);
			$this->db->bind(':email' ,$datos["email"]);
			$this->db->bind(':tlf' ,$datos["telefono"]);

			if($this->dbh->execute()){

				return true;
			}else {

				return false;
			}
		}
	}

?>
