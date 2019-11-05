<?php 
	/**
	 * cedulaes
	 */

	require_once("modelo_conexion.php");

	class Medicos extends C_conexion
	{
		private $id_medico,
				$id_especialidad,
				$nombre_apellido,
				$cedula,
				$cargo,
				$tlf,
				$condicion;
		
		function __construct()
		{
			parent::__construct();
		}

		public function setIdMedicos($id_medicos){
			$this->id_medicos = limpiarCadena($id_medicos);
		}

		public function setEspecialidad($especialidad){
			$this->especialidad = limpiarCadena($especialidad);
		}
		
		public function setNombre_apellido($nombre_apellido){
			$this->nombre_apellido = limpiarCadena($nombre_apellido);
		}
		
		public function setCedula($cedula){
			$this->cedula = limpiarCadena($cedula);
		}

		public function setCargo($cargo){
			$this->cargo = limpiarCadena($cargo);
		}
		
		public function setTlf($tlf){
			$this->tlf = limpiarCadena($tlf);
		}

		public function setCondicion($condicion){
			$this->condicion = limpiarCadena($condicion);
		}

		public function insertarM() {

			$stmt = C_conexion::getConexion()->prepare("INSERT INTO medicos (especialidad,nombre_apellido,cedula,cargo,tlf,condicion) VALUES (:especialidad,:nombre_apellido,:cedula,:cargo,:tlf,:condicion)");

			$stmt->bindParam(":especialidad",$this->especialidad,PDO::PARAM_STR);
			$stmt->bindParam(":nombre_apellido",$this->nombre_apellido,PDO::PARAM_STR);
			$stmt->bindParam(":cedula",$this->cedula,PDO::PARAM_STR);
			$stmt->bindParam(":cargo",$this->cargo,PDO::PARAM_STR);
			$stmt->bindParam(":tlf",$this->tlf,PDO::PARAM_STR);
			$stmt->bindParam(":condicion",$this->condicion,PDO::PARAM_INT);

			return $stmt->execute();
			$stmt->clouse();

		}

		public function actualizarM(){
			$stmt = C_conexion::getConexion()->prepare("UPDATE medicos SET especialidad= :especialidad,nombre_apellido= :nombre_apellido,cedula= :cedula,cargo= :cargo,tlf= :tlf,condicion= :condicion WHERE id_medicos = :id_medicos");
			$stmt->bindParam(":especialidad",$this->especialidad,PDO::PARAM_STR);
			$stmt->bindParam(":nombre_apellido",$this->nombre_apellido,PDO::PARAM_STR);
			$stmt->bindParam(":cedula",$this->cedula,PDO::PARAM_STR);
			$stmt->bindParam(":cargo",$this->cargo,PDO::PARAM_STR);
			$stmt->bindParam(":tlf",$this->tlf,PDO::PARAM_STR);
			$stmt->bindParam(":condicion",$this->condicion,PDO::PARAM_INT);
			$stmt->bindParam(":id_medicos",$this->id_medicos,PDO::PARAM_INT);

			return $stmt->execute();
		}

		public function listarM(){
			
			$stmt = C_conexion::getConexion()->prepare("SELECT * FROM medicos");
			
			$stmt->execute();

			return $stmt->fetchAll();
			
			$stmt->clouse();
		}

		public function mostrarM($id){
			
			$stmt = C_conexion::getConexion()->prepare("SELECT * FROM medicos WHERE id_medicos = :id");
			
			$stmt->bindParam(":id",$id,PDO::PARAM_INT);

			$stmt->execute();

			return $stmt->fetch();

			$stmt->close();
		}

		public function seleccionarM(){

			$stmt = C_conexion::getConexion()->prepare("SELECT id_medicos,nombre_apellido FROM medicos WHERE condicion = true");

			$stmt->execute();

			return $stmt->fetchAll();

			$stmt->clouse();
		}
	}





