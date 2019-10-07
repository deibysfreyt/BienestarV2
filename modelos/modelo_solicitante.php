<?php 
	/**
	 * cedulaes
	 */

	require_once("modelo_conexion.php");

	class Solicitante extends C_conexion
	{
		private $id_solicitante,
				$cedula,
				$nombre_apellido,
				$fecha_nacimiento,
				$direccion,
				$tlf_movil,
				$tlf_fijo,
				$parroquia,
				$ocupacion,
				$ingreso,
				$estado_civil;

		
		function __construct()
		{
			parent::__construct();
		}

		public function setId_Solicitante($id_solicitante){
			$this->id_solicitante = limpiarCadena($id_solicitante);
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

		public function setDireccion($direccion){
			$this->direccion = $direccion;
		}

		public function setTlf_movil($tlf_movil){
			$this->tlf_movil = $tlf_movil;
		}

		public function setTlf_fijo($tlf_fijo){
			$this->tlf_fijo = $tlf_fijo;
		}

		public function setParroquia($parroquia){
			$this->parroquia = $parroquia;
		}

		public function setOcupacion($ocupacion){
			$this->ocupacion = $ocupacion;
		}

		public function setIngreso($ingreso){
			$this->ingreso = $ingreso;
		}

		public function setEstado_civil($estado_civil){
			$this->estado_civil = $estado_civil;
		}
		

		public function insertarS() {

			$stmt = C_conexion::getConexion()->prepare("INSERT INTO solicitante (cedula,nombre_apellido,fecha_nacimiento,direccion,tlf_movil,tlf_fijo,parroquia,ocupacion,ingreso,estado_civil) VALUES (:cedula,:nombre_apellido,:fecha_nacimiento,:direccion,:tlf_movil,:tlf_fijo,:parroquia,:ocupacion,:ingreso,:estado_civil)");

			$stmt->bindParam(":cedula", limpiarCadena($this->cedula), PDO::PARAM_STR);
			$stmt->bindParam(":nombre_apellido", limpiarCadena($this->nombre_apellido), PDO::PARAM_STR);
			$stmt->bindParam(":fecha_nacimiento", limpiarCadena($this->fecha_nacimiento), PDO::PARAM_STR);
			$stmt->bindParam(":direccion", limpiarCadena($this->direccion), PDO::PARAM_STR);
			$stmt->bindParam(":tlf_movil", limpiarCadena($this->tlf_movil), PDO::PARAM_STR);
			$stmt->bindParam(":tlf_fijo", limpiarCadena($this->tlf_fijo), PDO::PARAM_STR);
			$stmt->bindParam(":parroquia", limpiarCadena($this->parroquia), PDO::PARAM_STR);
			$stmt->bindParam(":ocupacion", limpiarCadena($this->ocupacion), PDO::PARAM_STR);
			$stmt->bindParam(":ingreso", limpiarCadena($this->ingreso), PDO::PARAM_STR);
			$stmt->bindParam(":estado_civil", limpiarCadena($this->estado_civil), PDO::PARAM_STR);

			$stmt->execute();
			return C_conexion::getConexion()->lastInsertId();

			$stmt->clouse();

		}

		public function actualizarS(){
			$stmt = C_conexion::getConexion()->prepare("UPDATE solicitante SET cedula= :cedula,nombre_apellido= :nombre_apellido,fecha_nacimiento= :fecha_nacimiento,direccion= :direccion,tlf_movil= :tlf_movil,tlf_fijo= :tlf_fijo,parroquia= :parroquia,ocupacion= :ocupacion,ingreso= :ingreso,estado_civil= :estado_civil WHERE id_solicitante = :id_solicitante");

			$stmt->bindParam(":cedula", limpiarCadena($this->cedula), PDO::PARAM_STR);
			$stmt->bindParam(":nombre_apellido", limpiarCadena($this->nombre_apellido), PDO::PARAM_STR);
			$stmt->bindParam(":fecha_nacimiento", limpiarCadena($this->fecha_nacimiento), PDO::PARAM_STR);
			$stmt->bindParam(":direccion", limpiarCadena($this->direccion), PDO::PARAM_STR);
			$stmt->bindParam(":tlf_movil", limpiarCadena($this->tlf_movil), PDO::PARAM_STR);
			$stmt->bindParam(":tlf_fijo", limpiarCadena($this->tlf_fijo), PDO::PARAM_STR);
			$stmt->bindParam(":parroquia", limpiarCadena($this->parroquia), PDO::PARAM_STR);
			$stmt->bindParam(":ocupacion", limpiarCadena($this->ocupacion), PDO::PARAM_STR);
			$stmt->bindParam(":ingreso", limpiarCadena($this->ingreso), PDO::PARAM_STR);
			$stmt->bindParam(":estado_civil", limpiarCadena($this->estado_civil), PDO::PARAM_STR);
			$stmt->bindParam("id_solicitante",$this->id_solicitante);

			return $stmt->execute();
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





