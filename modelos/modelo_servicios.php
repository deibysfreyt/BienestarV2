<?php 
	/**
	 * 
	 */

	require_once("modelo_conexion.php");

	class Servicios extends C_conexion
	{
		private $nombre,
				$condicion,
				$descripcion,
				$id_servicios;

		
		function __construct()
		{
			parent::__construct();
		}
		
		public function setNombre($nombre){
			$this->nombre = limpiarCadena($nombre);
		}

		public function setDescripcion($descripcion){
			$this->descripcion = limpiarCadena($descripcion);
		}

		public function setCondicion($condicion){
			$this->condicion = limpiarCadena($condicion);
		}

		public function setIdServicios($id_servicios){
			$this->id_servicios = limpiarCadena($id_servicios);
		}


		public function insertarSr() {

			$stmt = C_conexion::getConexion()->prepare("INSERT INTO servicios (nombre,condicion,descripcion) VALUES (:nombre,:condicion,:descripcion)");

			$stmt->bindParam(":nombre",$this->nombre,PDO::PARAM_STR);
			$stmt->bindParam(":condicion",$this->condicion,PDO::PARAM_INT);
			$stmt->bindParam(":descripcion",$this->descripcion,PDO::PARAM_STR);

			return $stmt->execute();

			$stmt->clouse();
		}

		public function listarSr(){
			
			$stmt = C_conexion::getConexion()->prepare("SELECT * FROM servicios");
			
			$stmt->execute();

			return $stmt->fetchAll();
			
			$stmt->clouse();
		}

		public function mostrarSr($id){
			
			$stmt = C_conexion::getConexion()->prepare("SELECT * FROM servicios WHERE id_servicios = :id");
			
			$stmt->bindParam(":id",$id,PDO::PARAM_INT);

			$stmt->execute();

			return $stmt->fetch();

			$stmt->close();
		}

		public function actualizarSr(){
			
			$stmt = C_conexion::getConexion()->prepare("UPDATE servicios SET nombre = :nombre,condicion = :condicion,descripcion = :descripcion WHERE id_servicios = :id_servicios");

			$stmt->bindParam(":nombre",$this->nombre,PDO::PARAM_STR);
			$stmt->bindParam(":condicion",$this->condicion,PDO::PARAM_INT);
			$stmt->bindParam(":descripcion",$this->descripcion,PDO::PARAM_STR);
			$stmt->bindParam(":id_servicios",$this->id_servicios,PDO::PARAM_INT);

			return $stmt->execute();
			$stmt->clouse();
		}

		public function seleccionarSr(){

			$stmt = C_conexion::getConexion()->prepare("SELECT id_servicios,nombre FROM servicios WHERE condicion = true");

			$stmt->execute();

			return $stmt->fetchAll();

			$stmt->clouse();
		}
	}





