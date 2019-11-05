<?php 
	/**
	 * cedulaes
	 */

	require_once("modelo_conexion.php");

	class ServiciosMedicos extends C_conexion
	{
		private $id_servicios_medicos,
				$id_servicios,
				$id_medicos;
		
		function __construct()
		{
			parent::__construct();
		}

		public function setIdServiciosMedicos($id_servicios_medicos){
			$this->id_servicios_medicos = limpiarCadena($id_servicios_medicos);
		}

		public function setIdServicios($id_servicios){
			$this->id_familiar = limpiarCadena($idFamiliar);
		}
		
		public function setIdMedicos($id_medicos){
			$this->id_medicos = limpiarCadena($id_medicos);
		}

		public function insertarSM() {

			$stmt = C_conexion::getConexion()->prepare("INSERT INTO servicios_medicos (id_servicios,id_medicos) VALUES (:id_servicios,:id_medicos)");

			$stmt->bindParam(":id_servicios",$this->id_servicios,PDO::PARAM_STR);
			$stmt->bindParam(":id_medicos",$this->id_medicos,PDO::PARAM_STR);

			return $stmt->execute();
			//return $stmt->lastInsertId();

			$stmt->clouse();

		}
	}