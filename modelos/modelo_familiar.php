<?php 
	/**
	 * cedulaes
	 */

	require_once("modelo_conexion.php");

	class Familiar extends C_conexion
	{
		private $id_familiar_solicitud,
				$id_familiar,
				$id_solicitud,
				$id_familiar,
				$nombre_apellido,
				$edad,
				$parentesco,
				$ocupacion,
				$observacion;
		
		function __construct()
		{
			parent::__construct();
		}

		public function setid_familiar_solicitud($id_familiar_solicitud){
			$this->id_familiar_solicitud = $id_familiar_solicitud;
		}

		public function setTipo_vivienda($tipo_vivienda){
			$this->tipo_vivienda = $tipo_vivienda;
		}

		public function setTenencia($tenencia){
			$this->tenencia = $tenencia;
		}

		public function setid_familiar($id_familiar){
			$this->id_familiar = $id_familiar;
		}

		public function setnombre_apellido($nombre_apellido){
			$this->nombre_apellido = $nombre_apellido;
		}
		

		public function insertarF() {

			$stmt = C_conexion::getConexion()->prepare("INSERT INTO area_fisica (tipo_vivienda,tenencia,id_familiar,nombre_apellido) VALUES (:tipo_vivienda,:tenencia,:id_familiar,:nombre_apellido)");

			$stmt->bindParam(":tipo_vivienda", limpiarCadena($this->tipo_vivienda), PDO::PARAM_STR);
			$stmt->bindParam(":tenencia", limpiarCadena($this->tenencia), PDO::PARAM_STR);
			$stmt->bindParam(":id_familiar", limpiarCadena($this->id_familiar), PDO::PARAM_STR);
			$stmt->bindParam(":nombre_apellido", limpiarCadena($this->nombre_apellido), PDO::PARAM_STR);

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





