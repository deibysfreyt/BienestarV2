<?php 
	/**
	 * cedulaes
	 */

	require_once("modelo_conexion.php");

	class Familiar extends C_conexion
	{
		private $id_familiar,
				$nombre_apellido,
				$edad,
				$parentesco,
				$ocupacion,
				$observacion;
		
		function __construct()
		{
			parent::__construct();
		}

		public function setId_familiar($idFamiliar){
			$this->id_familiar = limpiarCadena($idFamiliar);
		}

		public function setNombre_apellido($nombre_apellido_f){
			$this->nombre_apellido = limpiarCadena($nombre_apellido_f);
		}
		
		public function setEdad($edad_f){
			$this->edad = limpiarCadena($edad_f);
		}

		public function setParentesco($parentesco_f){
			$this->parentesco = limpiarCadena($parentesco_f);
		}

		public function setOcupacion($ocupacion_f){
			$this->ocupacion = limpiarCadena($ocupacion_f);
		}

		public function setObservacion($observacion_f){
			$this->observacion = limpiarCadena($observacion_f);
		}

		public function insertarF() {

			$stmt = C_conexion::getConexion()->prepare("INSERT INTO familiar (nombre_apellido,edad,parentesco,ocupacion,observacion) VALUES (:nombre_apellido,:edad,:parentesco,:ocupacion,:observacion)");

			$stmt->bindParam(":nombre_apellido",$this->nombre_apellido,PDO::PARAM_STR);
			$stmt->bindParam(":edad",$this->edad,PDO::PARAM_STR);
			$stmt->bindParam(":parentesco",$this->parentesco,PDO::PARAM_STR);
			$stmt->bindParam(":ocupacion",$this->ocupacion,PDO::PARAM_STR);
			$stmt->bindParam(":observacion",$this->observacion,PDO::PARAM_STR);
			
			$stmt->execute();
			return C_conexion::getConexion()->lastInsertId();
			$stmt->clouse();
		}
	}





