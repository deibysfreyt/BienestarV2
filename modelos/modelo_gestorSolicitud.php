<?php 
	/**
	 * solicitudes
	 */

	require_once("modelo_conexion.php");

	class GestorSolicitud extends C_conexion
	{
		private $solicitud,
				$descripcion,
				$condicion,
				$id_tipo_solicitud;

		
		function __construct()
		{
			parent::__construct();
		}
		

		public function setSolicitud($solicitud){
			$this->solicitud = $solicitud;
		}

		public function setDescripcion($descripcion){
			$this->descripcion = $descripcion;
		}

		public function setCondicion($condicion){
			$this->condicion = $condicion;
		}

		public function setIdTipoSolicitud($id_tipo_solicitud){
			$this->id_tipo_solicitud = $id_tipo_solicitud;
		}


		public function insertarGS() {

			$stmt = C_conexion::getConexion()->prepare("INSERT INTO tipo_solicitud (solicitud,descripcion,condicion) VALUES (:solicitud,:descripcion,:condicion)");

			$stmt->bindParam(":solicitud", limpiarCadena($this->solicitud), PDO::PARAM_STR);
			$stmt->bindParam(":descripcion", limpiarCadena($this->descripcion), PDO::PARAM_STR);
			$stmt->bindParam(":condicion", limpiarCadena($this->condicion), PDO::PARAM_INT);

			return $stmt->execute();
			$stmt->clouse();

		}

		public function listarGS(){
			
			$stmt = C_conexion::getConexion()->prepare("SELECT * FROM tipo_solicitud");
			
			$stmt->execute();

			return $stmt->fetchAll();
			
			$stmt->clouse();
		}

		public function mostrarGS($id){
			
			$stmt = C_conexion::getConexion()->prepare("SELECT * FROM tipo_solicitud WHERE id_tipo_solicitud = :id");
			
			$stmt->bindParam(":id", $id, PDO::PARAM_INT);

			$stmt->execute();

			return $stmt->fetch();

			$stmt->close();
		}

		public function actualizarGS(){
			
			$stmt = C_conexion::getConexion()->prepare("UPDATE tipo_solicitud SET solicitud = :solicitud, descripcion = :descripcion , condicion = :condicion WHERE id_tipo_solicitud = :id_tipo_solicitud");

			$stmt->bindParam(":solicitud", limpiarCadena($this->solicitud), PDO::PARAM_STR);
			$stmt->bindParam(":descripcion", limpiarCadena($this->descripcion), PDO::PARAM_STR);
			$stmt->bindParam(":condicion", limpiarCadena($this->condicion), PDO::PARAM_INT);
			$stmt->bindParam(":id_tipo_solicitud", $this->id_tipo_solicitud, PDO::PARAM_INT);

			return $stmt->execute();
			$stmt->clouse();
		}
	}





