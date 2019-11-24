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

		public function setId_beneficiario($id_beneficiario){
			$this->id_beneficiario = limpiarCadena($id_beneficiario);
		}

		public function setId_solicitante($id_solicitante){
			$this->id_solicitante = limpiarCadena($id_solicitante);
		}

		public function setCedula($cedula){
			$this->cedula = isset($cedula) ? limpiarCadena($cedula) : "0" ;
		}

		public function setNombre_apellido($nombre_apellido){
			$this->nombre_apellido = limpiarCadena($nombre_apellido);
		}

		public function setFecha_nacimiento($fecha_nacimiento){
			$this->fecha_nacimiento = limpiarCadena($fecha_nacimiento);
		}
		

		public function insertarB() {

			$stmt = C_conexion::getConexion()->prepare("INSERT INTO beneficiario (id_solicitante,cedula,nombre_apellido,fecha_nacimiento) VALUES (:id_solicitante,:cedula,:nombre_apellido,:fecha_nacimiento)");

			$stmt->bindParam(":id_solicitante",$this->id_solicitante,PDO::PARAM_INT);
			$stmt->bindParam(":cedula",$this->cedula,PDO::PARAM_STR);
			$stmt->bindParam(":nombre_apellido",$this->nombre_apellido,PDO::PARAM_STR);
			$stmt->bindParam(":fecha_nacimiento",$this->fecha_nacimiento,PDO::PARAM_STR);

			$stmt->execute();
			return C_conexion::getConexion()->lastInsertId();

			$stmt->clouse();

		}

		public function actualizarB(){
			$stmt = C_conexion::getConexion()->prepare("UPDATE beneficiario SET id_solicitante= :id_solicitante,cedula= :cedula,nombre_apellido= :nombre_apellido,fecha_nacimiento= :fecha_nacimiento WHERE id_beneficiario = :id_beneficiario");
			$stmt->bindParam(":id_solicitante",$this->id_solicitante,PDO::PARAM_STR);
			$stmt->bindParam(":cedula",$this->cedula,PDO::PARAM_INT);
			$stmt->bindParam(":nombre_apellido",$this->nombre_apellido,PDO::PARAM_STR);
			$stmt->bindParam(":fecha_nacimiento",$this->fecha_nacimiento,PDO::PARAM_STR);
			$stmt->bindParam(":id_beneficiario",$this->id_beneficiario);

			return $stmt->execute();
		}

		public function mostrarB($id_b){
			
			$stmt = C_conexion::getConexion()->prepare("SELECT * FROM beneficiario WHERE id_beneficiario = :id_b");
			
			$stmt->bindParam(":id_b", $id_b, PDO::PARAM_INT);

			$stmt->execute();

			return $stmt->fetch();

			$stmt->close();
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





