<?php 
	/**
	 * 
	 */

	require_once("modelo_conexion.php");

	class Especialidad extends C_conexion
	{
		private $nombre,
				$condicion,
				$descripcion,
				$id_especialidad;

		
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

		public function setIdEspecialidad($id_especialidad){
			$this->id_especialidad = limpiarCadena($id_especialidad);
		}


		public function insertarE() {

			$stmt = C_conexion::getConexion()->prepare("INSERT INTO especialidad (nombre,condicion,descripcion) VALUES (:nombre,:condicion,:descripcion)");

			$stmt->bindParam(":nombre",$this->nombre,PDO::PARAM_STR);
			$stmt->bindParam(":condicion",$this->condicion,PDO::PARAM_INT);
			$stmt->bindParam(":descripcion",$this->descripcion,PDO::PARAM_STR);

			return $stmt->execute();

			$stmt->clouse();
		}

		public function listarE(){
			
			$stmt = C_conexion::getConexion()->prepare("SELECT * FROM especialidad");
			
			$stmt->execute();

			return $stmt->fetchAll();
			
			$stmt->clouse();
		}

		public function mostrarE($id){
			
			$stmt = C_conexion::getConexion()->prepare("SELECT * FROM especialidad WHERE id_especialidad = :id");
			
			$stmt->bindParam(":id",$id,PDO::PARAM_INT);

			$stmt->execute();

			return $stmt->fetch();

			$stmt->close();
		}

		public function actualizarGS(){
			
			$stmt = C_conexion::getConexion()->prepare("UPDATE especialidad SET nombre = :nombre,condicion = :condicion,descripcion = :descripcion WHERE id_especialidad = :id_especialidad");

			$stmt->bindParam(":nombre",$this->nombre,PDO::PARAM_STR);
			$stmt->bindParam(":condicion",$this->condicion,PDO::PARAM_INT);
			$stmt->bindParam(":descripcion",$this->descripcion,PDO::PARAM_STR);
			$stmt->bindParam(":id_especialidad",$this->id_especialidad, PDO::PARAM_INT);

			return $stmt->execute();
			$stmt->clouse();
		}

		public function seleccionarE(){

			$stmt = C_conexion::getConexion()->prepare("SELECT * FROM especialidad WHERE condicion = true");

			$stmt->execute();

			return $stmt->fetchAll();

			$stmt->clouse();
		}
	}





