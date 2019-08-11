<?php 
	/**
	 * cedulaes
	 */

	require_once("modelo_conexion.php");

	class Beneficiario extends C_conexion
	{
		private $id_beneficiario,
				$id_solicitante,
				$cedula,
				$nombre_apellido,
				$fecha_nacimiento;
		
		function __construct()
		{
			parent::__construct();
		}

		public function setIdBeneficiario($id_beneficiario){
			$this->id_beneficiario = $id_beneficiario;
		}

		public function setIdSolicitante($id_solicitante){
			$this->id_solicitante = $id_solicitante;
		}

		public function setCedula($cedula){
			$this->cedula = $cedula;
		}

		public function setNombre_apellido($nombre_apellido){
			$this->nombre_apellido = $nombre_apellido;
		}

		public function setFecha_nacimiento($fecha_nacimiento){
			$this->fecha_nacimiento = $fecha_nacimiento;
		}
		

		public function insertarB() {

			$stmt = C_conexion::getConexion()->prepare("INSERT INTO beneficiario (id_solicitante,cedula,nombre_apellido,fecha_nacimiento) VALUES (:id_solicitante,:cedula,:nombre_apellido,:fecha_nacimiento)");

			$stmt->bindParam(":id_solicitante", limpiarCadena($this->id_solicitante), PDO::PARAM_STR);
			$stmt->bindParam(":cedula", limpiarCadena($this->cedula), PDO::PARAM_STR);
			$stmt->bindParam(":nombre_apellido", limpiarCadena($this->nombre_apellido), PDO::PARAM_STR);
			$stmt->bindParam(":fecha_nacimiento", limpiarCadena($this->fecha_nacimiento), PDO::PARAM_STR);

			$stmt->execute();

			return $stmt->lastInsertId();

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





