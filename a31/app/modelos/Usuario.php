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
	}

?>