<?php 
	/**
	 * cedulaes
	 */

	require_once("modelo_conexion.php");

	class AreaFisica extends C_conexion
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

		public function setId_Area_fisica($id_area_medica){
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

		public function setRecursos_disponible($recursos_disponibles){
			$this->recursos_disponibles = $recursos_disponibles;
		}

		public function setMonto_aprobado($monto_aprobado){
			$this->monto_aprobado = $monto_aprobado;
		}

		public function setObservacion($observacion){
			$this->observacion = $observacion;
		}

		public function insertarAM() {

			$stmt = C_conexion::getConexion()->prepare("INSERT INTO area_medica (id_solicitud,diagnostico,motivo_solicitud,recursos_disponibles,monto_aprobado,observacion) VALUES (:id_solicitud,:diagnostico,:motivo_solicitud,:recursos_disponibles,:monto_aprobado,:observacion)");

			$stmt->bindParam(":id_solicitud", limpiarCadena($this->id_solicitud), PDO::PARAM_STR);
			$stmt->bindParam(":diagnostico", limpiarCadena($this->diagnostico), PDO::PARAM_STR);
			$stmt->bindParam(":motivo_solicitud", limpiarCadena($this->motivo_solicitud), PDO::PARAM_STR);
			$stmt->bindParam(":recursos_disponibles", limpiarCadena($this->recursos_disponibles), PDO::PARAM_STR);
			$stmt->bindParam(":monto_aprobado", limpiarCadena($this->monto_aprobado), PDO::PARAM_STR);
			$stmt->bindParam(":observacion", limpiarCadena($this->observacion), PDO::PARAM_STR);

			return $stmt->execute();

			$stmt->clouse();

		}

		/*

		public function listarGS(){
			
			$stmt = C_conexion::getConexion()->prepare("SELECT * FROM tipo_cedula");
			
			$stmt->execute();

			return $stmt->fetchAll();
			
			$stmt->clouse();
		}

		public function mostrarGS($id){
			
			$stmt = C_conexion::getConexion()->prepare("SELECT * FROM tipo_cedula WHERE id_solicitante = :id");
			
			$stmt->bindParam(":id", $id, PDO::PARAM_INT);

			$stmt->execute();

			return $stmt->fetch();

			$stmt->close();
		}

		public function actualizarGS(){
			
			$stmt = C_conexion::getConexion()->prepare("UPDATE tipo_cedula SET cedula = :cedula, nombre_apellido = :nombre_apellido , fecha_nacimiento = :fecha_nacimiento WHERE id_solicitante = :id_solicitante");

			$stmt->bindParam(":cedula", limpiarCadena($this->cedula), PDO::PARAM_STR);
			$stmt->bindParam(":nombre_apellido", limpiarCadena($this->nombre_apellido), PDO::PARAM_STR);
			$stmt->bindParam(":fecha_nacimiento", limpiarCadena($this->fecha_nacimiento), PDO::PARAM_INT);
			$stmt->bindParam(":id_solicitante", $this->id_solicitante, PDO::PARAM_INT);

			return $stmt->execute();
			$stmt->clouse();
		}

		public function seleccionarGS(){

			$stmt = C_conexion::getConexion()->prepare("SELECT * FROM tipo_cedula WHERE fecha_nacimiento = true");

			$stmt->execute();

			return $stmt->fetchAll();

			$stmt->clouse();
		}

		*/
	}





