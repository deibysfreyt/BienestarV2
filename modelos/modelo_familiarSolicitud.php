<?php 
	/**
	 * cedulaes
	 */

	require_once("modelo_conexion.php");

	class FamiliarSolicitud extends C_conexion
	{
		private $id_familiar_solicitud,
				$id_familiar,
				$id_solicitud;
		
		function __construct()
		{
			parent::__construct();
		}

		public function setId_familiarSolicitud($id_familiar_solicitud){
			$this->id_familiar_solicitud = limpiarCadena($id_familiar_solicitud);
		}

		public function setId_familiar($idFamiliar){
			$this->id_familiar = limpiarCadena($idFamiliar);
		}
		
		public function setId_solicitud($id_solicitud){
			$this->id_solicitud = limpiarCadena($id_solicitud);
		}

		public function insertarFS() {

			$stmt = C_conexion::getConexion()->prepare("INSERT INTO familiar_solicitud (id_familiar,id_solicitud) VALUES (:id_familiar,:id_solicitud)");

			$stmt->bindParam(":id_familiar",$this->id_familiar,PDO::PARAM_STR);
			$stmt->bindParam(":id_solicitud",$this->id_solicitud,PDO::PARAM_STR);

			return $stmt->execute();
			//return $stmt->lastInsertId();

			$stmt->clouse();

		}
	}