<?php 
	/**
	 * cedulaes
	 */

	require_once("modelo_conexion.php");

	class Medico extends C_conexion
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

		public function setIdMedico($id_medico){
			$this->id_medico = limpiarCadena($id_medico);
		}

		public function setIdEspecialidad($id_especialidad){
			$this->id_especialidad = limpiarCadena($id_especialidad);
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

			$stmt = C_conexion::getConexion()->prepare("INSERT INTO medico (id_especialidad,nombre_apellido,cedula,cargo,tlf,condicion) VALUES (:id_especialidad,:nombre_apellido,:cedula,:cargo,:tlf,:condicion)");

			$stmt->bindParam(":id_especialidad",$this->id_especialidad,PDO::PARAM_STR);
			$stmt->bindParam(":nombre_apellido",$this->nombre_apellido,PDO::PARAM_STR);
			$stmt->bindParam(":cedula",$this->cedula,PDO::PARAM_STR);
			$stmt->bindParam(":cargo",$this->cargo,PDO::PARAM_STR);
			$stmt->bindParam(":tlf",$this->tlf,PDO::PARAM_STR);
			$stmt->bindParam(":condicion",$this->condicion,PDO::PARAM_INT);

			return $stmt->execute();
			$stmt->clouse();

		}

		public function actualizarM(){
			$stmt = C_conexion::getConexion()->prepare("UPDATE medico SET id_especialidad= :id_especialidad,nombre_apellido= :nombre_apellido,cedula= :cedula,cargo= :cargo,tlf= :tlf,condicion= :condicion WHERE id_medico = :id_medico");
			$stmt->bindParam(":id_especialidad",$this->id_especialidad,PDO::PARAM_STR);
			$stmt->bindParam(":nombre_apellido",$this->nombre_apellido,PDO::PARAM_STR);
			$stmt->bindParam(":cedula",$this->cedula,PDO::PARAM_STR);
			$stmt->bindParam(":cargo",$this->cargo,PDO::PARAM_STR);
			$stmt->bindParam(":tlf",$this->tlf,PDO::PARAM_STR);
			$stmt->bindParam(":condicion",$this->condicion,PDO::PARAM_INT);
			$stmt->bindParam(":id_medico",$this->id_medico,PDO::PARAM_INT);

			return $stmt->execute();
		}

		public function listarM(){
			
			$stmt = C_conexion::getConexion()->prepare("SELECT * FROM medico");
			
			$stmt->execute();

			return $stmt->fetchAll();
			
			$stmt->clouse();
		}

		public function mostrarM($id){
			
			$stmt = C_conexion::getConexion()->prepare("SELECT * FROM medico WHERE id_medico = :id");
			
			$stmt->bindParam(":id",$id,PDO::PARAM_INT);

			$stmt->execute();

			return $stmt->fetch();

			$stmt->close();
		}

		public function seleccionarM(){

			$stmt = C_conexion::getConexion()->prepare("SELECT e.nombre,m.nombre_apellido,m.id_medico FROM especialidad e INNER JOIN medico m ON e.id_especialidad=m.id_medico WHERE m.condicion = true");

			$stmt->execute();

			return $stmt->fetchAll();

			$stmt->clouse();
		}
	}





