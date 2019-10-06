<?php
	require_once("modelo_conexion.php");

	class AreaMedica extends C_conexion
	{
		private $id_area_medica,
				$id_solicitud,
				$diagnostico,
				$motivo_solicitud,
				$recursos_disponibles,
				$monto_aprobado,
				$observacion;
		
		function __construct()
		{
			parent::__construct();
		}

		public function setId_area_medica($id_area_medica){
			$this->id_area_medica = $id_area_medica;
		}

		public function setId_solicitud($id_solicitud){
			$this->id_solicitud = $id_solicitud;
		}

		public function setDiagnostico($diagnostico){
			$this->diagnostico = $diagnostico;
		}

		public function setMotivo_solicitud($motivo_solicitud){
			$this->motivo_solicitud = $motivo_solicitud;
		}

		public function setRecursos_disponibles($recursos_disponibles){
			$this->recursos_disponibles = $recursos_disponibles;
		}

		public function setMonto_aprobado($monto_aprobado){
			$this->monto_aprobado = $monto_aprobado;
		}

		public function setObservacion($observacion_am){
			$this->observacion = $observacion_am;
		}

		public function insertarAM(){
			$stmt = C_conexion::getConexion()->prepare("INSERT INTO area_medica (id_solicitud,diagnostico,motivo_solicitud,recursos_disponibles,monto_aprobado,observacion) VALUES (:id_solicitud,:diagnostico,:motivo_solicitud,:recursos_disponibles,:monto_aprobado,:observacion)");
			$stmt->bindParam(":id_solicitud",limpiarCadena($this->id_solicitud));
			$stmt->bindParam(":diagnostico",limpiarCadena($this->diagnostico),PDO::PARAM_STR);
			$stmt->bindParam(":motivo_solicitud",limpiarCadena($this->motivo_solicitud),PDO::PARAM_STR);
			$stmt->bindParam(":recursos_disponibles",limpiarCadena($this->recursos_disponibles),PDO::PARAM_STR);
			$stmt->bindParam(":monto_aprobado",limpiarCadena($this->monto_aprobado),PDO::PARAM_STR);
			$stmt->bindParam(":observacion",limpiarCadena($this->observacion),PDO::PARAM_STR);
			return $stmt->execute();
			$stmt->clouse();
		}
	}