<?php 
	/**
	 * 
	 */
	class C_conexion {
	
		private 
			$DB_HOST 	 = 	"localhost",
			$PUERTO  	 = 	"5432",
			$DB_NAME 	 = 	"bienestar_v2",
			$DB_USERNAME = 	"postgres",
			$DB_PASSWORD = 	"1234",
			$conexion; 

		function __construct()
		{
			try { // Conectamos con la base de Datos mediante PDO
				$this->conexion = new PDO("pgsql:host=$this->DB_HOST;port=$this->PUERTO;dbname=$this->DB_NAME;user=$this->DB_USERNAME;password=$this->DB_PASSWORD");
			} catch (PDOException $e){
		 		// report error message
			 	echo "No se puedo hacer conexión...!!!".$e->getMessage();
			}

		}

		public function getConexion() {
			return $this->conexion;
		}

		/*public function ejecutarConsulta($sql){
			$query = $this->getConexion()->query($sql);
			return $query;
		}*/


	}

	function limpiarCadena($str){
		
			//elimine los espacios en blanco (u otros caracteres especiales) desde el principio y el final de una cadena
			$str = trim($str);
			
			//Convertir caracteres especiales a entidades HTML
			$str = htmlspecialchars($str);

			//Filtra una variable con un filtro especificado. Eliminar etiquetas, opcionalmente eliminar o codificar caracteres especiales.
			return filter_var($str, FILTER_SANITIZE_STRING);
	}