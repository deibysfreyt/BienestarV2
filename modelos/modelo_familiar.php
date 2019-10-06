<?php 
	/**
	 * cedulaes
	 */

	require_once("modelo_conexion.php");

	class Familiar extends C_conexion
	{
		private $id_familiar_solicitud,
				$id_familiar,
				$id_solicitud,
				$id_familiar,
				$nombre_apellido,
				$edad,
				$parentesco,
				$ocupacion,
				$observacion;
		
		function __construct()
		{
			parent::__construct();
		}

		public function setid_familiar_solicitud($id_familiar_solicitud){
			$this->id_familiar_solicitud = $id_familiar_solicitud;
		}

		public function setid_familiar($id_familiar){
			$this->id_familiar = $id_familiar;
		}

		public function setnombre_apellido($nombre_apellido){
			$this->nombre_apellido = $nombre_apellido;
		}
		

		public function insertarF() {

			$stmt = C_conexion::getConexion()->prepare("INSERT INTO area_fisica (id_familiar,nombre_apellido) VALUES (:id_familiar,:nombre_apellido)");

			$stmt->bindParam(":id_familiar", limpiarCadena($this->id_familiar), PDO::PARAM_STR);
			$stmt->bindParam(":nombre_apellido", limpiarCadena($this->nombre_apellido), PDO::PARAM_STR);

			$stmt->execute();

			return $stmt->lastInsertId();

			$stmt->clouse();

		}
	}





