<?php
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

		public function insertarSlt(){

			$stmt = C_conexion::getConexion()->prepare("INSERT INTO solicitud (id_usuario,id_beneficiario,id_tipo_solicitud,id_area_fisica,fecha,semana_embarazo,estado) VALUES (:id_usuario,:id_beneficiario,:id_tipo_solicitud,:id_area_fisica,:fecha,:semana_embarazo,:estado)");
			$stmt->bindParam(":id_usuario", limpiarCadena($this->id_usuario), PDO::PARAM_STR);
			$stmt->bindParam(":id_beneficiario", limpiarCadena($this->id_beneficiario), PDO::PARAM_STR);
			$stmt->bindParam(":id_tipo_solicitud", limpiarCadena($this->id_tipo_solicitud), PDO::PARAM_STR);
			$stmt->bindParam(":id_area_fisica",$this->id_area_fisica);
			$stmt->bindParam(":fecha",$this->fecha);
			$stmt->bindParam(":semana_embarazo",$this->semana_embarazo);
			$stmt->bindParam(":estado",$this->estado);
			//return $stmt->execute();
			$stmt->execute();
			return C_conexion::getConexion()->lastInsertId();
			$stmt->clouse();
		}

		public function listarD(){

			$stmt = C_conexion::getConexion()->prepare("SELECT * FROM datos_s_b");
			$stmt->execute();
			return $stmt->fetchAll();
			$stmt->clouse();
		}

		public function mostrarSB($id_b){
			
			$stmt = C_conexion::getConexion()->prepare("SELECT * FROM mostrar_s_b WHERE id_beneficiario = :id_b");
			
			$stmt->bindParam(":id_b", $id_b, PDO::PARAM_INT);

			$stmt->execute();

			return $stmt->fetch();

			$stmt->close();
		}
	}