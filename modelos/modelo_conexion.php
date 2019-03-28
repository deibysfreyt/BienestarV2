<?php 
	/**
	 * 
	 */
	class C_conexion {
	
		private 
			$DB_HOST 	 = 	"localhost",
			$PUERTO  	 = 	"5432",
			$DB_NAME 	 = 	"personal",
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