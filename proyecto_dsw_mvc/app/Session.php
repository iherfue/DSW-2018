<?php
/**
 * Clase session
 */
	class Session {

		/**
		 * Inicia la sesion
		 */
		public function init(){

			session_start();
		}

		/**
		 * Devuelve un elemento a la sesion
		 * @param  [string] $key [la clave del array de sesion]
		 * @return [string] devuelve el valor del array sesion si existe
		 */
		public function get($key){

			return !empty($_SESSION[$key]) ? $_SESSION[$key] : null;
		}

		/**
		 * Se añade a la sesion el valor
		 * @param [string] $key   [La clave seria 'email']
		 * @param [string] $value [el valor es el valor de email]
		 */
		public function add($key,$value){

			$_SESSION[$key] = $value;
		}

	/**
	 * Obtiene el estado de la sesion
	 * @return [devuelve el estado de la sesion(si se ha inicializado) 0,1,2]
	 */

	public function getStatus(){

		session_status();
	}

	/**
	* getAll
 	* @return [devuelve el array de sesion completo]
 	*/
		public function getAll(){

			return $_SESSION;
		}

	/**
	 * Destruye la sesion
	 */
		public function destruyeSesion(){

			session_destroy();
		}
	}


 ?>
