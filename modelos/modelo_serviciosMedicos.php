<?php 
	/**
	 * cedulaes
	 */

	require_once("modelo_conexion.php");

	class ServiciosMedicos extends C_conexion
	{
		private $id_servicios_medicos,
				$id_servicios,
				$id_medicos,
				$id_atendidas,
				$id_citas;
		
		function __construct()
		{
			parent::__construct();
		}

		public function setIdServiciosMedicos($id_servicios_medicos){
			$this->id_servicios_medicos = limpiarCadena($id_servicios_medicos);
		}

		public function setIdServicios($id_servicios){
			$this->id_servicios = limpiarCadena($id_servicios);
		}
		
		public function setIdMedicos($id_medicos){
			$this->id_medicos = limpiarCadena($id_medicos);
		}

		public function setIdAtendidas($id_atendidas){
			$this->id_atendidas = limpiarCadena($id_atendidas);
		}

		public function setIdCitas($id_citas){
			$this->id_citas = limpiarCadena($id_citas);
		}

		public function insertarSM() {

			$stmt = C_conexion::getConexion()->prepare("INSERT INTO servicios_medicos (id_servicios,id_medicos,id_atendidas,id_citas) VALUES (:id_servicios,:id_medicos,:id_atendidas,:id_citas)");

			$stmt->bindParam(":id_servicios",$this->id_servicios,PDO::PARAM_INT);
			$stmt->bindParam(":id_medicos",$this->id_medicos,PDO::PARAM_INT);
			$stmt->bindParam(":id_atendidas",$this->id_atendidas,PDO::PARAM_INT);
			$stmt->bindParam(":id_citas",$this->id_citas,PDO::PARAM_INT);

			return $stmt->execute();
			//return $stmt->lastInsertId();

			$stmt->clouse();

		}
	}