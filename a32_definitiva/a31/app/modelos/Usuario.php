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
			
			if($this->db->execute()){

				return true;
			}else {

				return false;
			}
		}

		public function obtenerUsuario($id){

			$this->db->query("Select * from usuarios where id_usuario = :id_usuario");
			$this->db->bind(':id_usuario',$id);

			$fila = $this->db->registro();
			return $fila;
		}

		public function editarUsuario($datos){

			$this->db->query("update usuarios set nombre = :nombre, email = :email, tlf = :tlf where id_usuario = :id_usuario");
			
			$this->db->bind('id_usuario',$datos["id_usuario"]);
			$this->db->bind('nombre',$datos["nombre"]);
			$this->db->bind('email',$datos["email"]);
			$this->db->bind('tlf',$datos["telefono"]);

			if($this->db->execute()){

				return true;
			}else {

				return false;
			}
		}

		public function Eliminar($datos){
			var_dump($datos);
			$this->db->query("delete from usuarios where id_usuario = :id_usuario");
			$this->db->bind(':id_usuario',$datos["id_usuario"]);

			if($this->db->execute()){

				return true;
			}else {

				return false;
			}

		
		}
	}

?>