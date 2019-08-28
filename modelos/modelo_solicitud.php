<?php 
	/**
	 * cedulaes
	 */

	require_once("modelo_conexion.php");

	class Solicitud extends C_conexion
	{
		private $id_solicitud,
				$id_usuario,
				$id_beneficiario,
				$id_tipo_solicitud,
				$id_area_fisica,
				$fecha,
				$semana_embarazo,
				$estado;
		
		function __construct()
		{
			parent::__construct();
		}

		public function setId_solicitud($id_solicitud){
			$this->id_solicitud = $id_solicitud;
		}

		public function setId_usuario($id_usuario){
			$this->id_usuario = $id_usuario;
		}

		public function setId_beneficiario($id_beneficiario){
			$this->id_beneficiario = $id_beneficiario;
		}

		public function setId_tipo_solicitud($id_tipo_solicitud){
			$this->id_tipo_solicitud = $id_tipo_solicitud;
		}

		public function setId_area_fisica($id_area_fisica){
			$this->id_area_fisica = $id_area_fisica;
		}

		public function setFecha($fecha){
			$this->fecha = $fecha;
		}

		public function setSemana_embarazo($semana_embarazo){
			$this->semana_embarazo = $semana_embarazo;
		}

		public function setEstado($estado){
			$this->estado = $estado;
		}

		public function insertarSlt() {

			$stmt = C_conexion::getConexion()->prepare("INSERT INTO solicitud (id_usuario,id_beneficiario,id_tipo_solicitud,id_area_fisica,fecha,semana_embarazo,estado) VALUES (:id_usuario,:id_beneficiario,:id_tipo_solicitud,:id_area_fisica,:fecha,:semana_embarazo,:estado)");

			$stmt->bindParam(":id_usuario", limpiarCadena($this->id_usuario), PDO::PARAM_STR);
			$stmt->bindParam(":id_beneficiario", limpiarCadena($this->id_beneficiario), PDO::PARAM_STR);
			$stmt->bindParam(":id_tipo_solicitud", limpiarCadena($this->id_tipo_solicitud), PDO::PARAM_STR);
			$stmt->bindParam(":id_area_fisica", limpiarCadena($this->id_area_fisica), PDO::PARAM_STR);
			$stmt->bindParam(":fecha", limpiarCadena($this->fecha), PDO::PARAM_STR);
			$stmt->bindParam(":semana_embarazo", limpiarCadena($this->semana_embarazo), PDO::PARAM_STR);
			$stmt->bindParam(":estado", limpiarCadena($this->estado), PDO::PARAM_STR);

			$stmt->execute();
			return C_conexion::getConexion()->lastInsertId();

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





