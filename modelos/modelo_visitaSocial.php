<?php 
	/**
	 * cedulaes
	 */

	require_once("modelo_conexion.php");

	class VisitaSocial extends C_conexion
	{
		private $id_visita_social,
				$id_solicitud,
				$observacion,
				$fecha;
		
		function __construct()
		{
			parent::__construct();
		}

		public function setId_Visita_Social($id_visita_social){
			$this->id_visita_social = $id_visita_social;
		}

		public function setId_solicitud($id_solicitud){
			$this->id_solicitud = $id_solicitud;
		}

		public function setObservacion($observacion){
			$this->observacion = $observacion;
		}

		public function setFecha($fecha){
			$this->fecha = $fecha;
		}
		

		public function insertarVS() {

			$stmt = C_conexion::getConexion()->prepare("INSERT INTO visita_social (id_solicitud,observacion,fecha) VALUES (:id_solicitud,:observacion,:fecha)");

			$stmt->bindParam(":id_solicitud", limpiarCadena($this->id_solicitud), PDO::PARAM_STR);
			$stmt->bindParam(":observacion", limpiarCadena($this->observacion), PDO::PARAM_STR);
			$stmt->bindParam(":fecha", limpiarCadena($this->fecha), PDO::PARAM_STR);

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





