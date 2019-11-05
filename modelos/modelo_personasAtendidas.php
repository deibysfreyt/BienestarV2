<?php 
	/**
	 * lugares
	 */

	require_once("modelo_conexion.php");

	class Atendidas extends C_conexion
	{
		private $id_atendidas,
				$id_medicos,
				$id_beneficiario,
				$fecha,
				$lugar,
				$peso,
				$talla,
				$diagnostico,
				$edad;
		
		function __construct()
		{
			parent::__construct();
		}

		public function setIdAtendidas($id_atendidas){
			$this->id_atendidas = limpiarCadena($id_atendidas);
		}
		public function setIdMedicos($id_medicos){
			$this->id_medicos = limpiarCadena($id_medicos);
		}

		public function setIdBeneficiario($id_beneficiario){
			$this->id_beneficiario = limpiarCadena($id_beneficiario);
		}
		
		public function setFecha($fecha){
			$this->fecha = limpiarCadena($fecha);
		}
		
		public function setLugar($lugar){
			$this->lugar = limpiarCadena($lugar);
		}

		public function setPeso($peso){
			$this->peso = limpiarCadena($peso);
		}
		
		public function setTalla($talla){
			$this->talla = limpiarCadena($talla);
		}

		public function setDiagnostico($diagnostico){
			$this->diagnostico = limpiarCadena($diagnostico);
		}

		public function setEdad($edad){
			$this->edad = limpiarCadena($edad);
		}

		public function insertarPA() {

			$stmt = C_conexion::getConexion()->prepare("INSERT INTO atendidas (id_medicos,id_beneficiario,fecha,lugar,peso,talla,diagnostico,edad) VALUES (:id_medicos,:id_beneficiario,:fecha,:lugar,:peso,:talla,:diagnostico,:edad)");

			$stmt->bindParam(":id_medicos",$this->id_medicos,PDO::PARAM_INT);
			$stmt->bindParam(":id_beneficiario",$this->id_beneficiario,PDO::PARAM_INT);
			$stmt->bindParam(":fecha",$this->fecha,PDO::PARAM_STR);
			$stmt->bindParam(":lugar",$this->lugar,PDO::PARAM_STR);
			$stmt->bindParam(":peso",$this->peso,PDO::PARAM_STR);
			$stmt->bindParam(":talla",$this->talla,PDO::PARAM_STR);
			$stmt->bindParam(":diagnostico",$this->diagnostico,PDO::PARAM_STR);
			$stmt->bindParam(":edad",$this->edad,PDO::PARAM_STR);

			return $stmt->execute();
			$stmt->clouse();

		}
		/*
		public function actualizarM(){
			$stmt = C_conexion::getConexion()->prepare("UPDATE medico SET id_beneficiario= :id_beneficiario,fecha= :fecha,lugar= :lugar,peso= :peso,talla= :talla,diagnostico= :diagnostico WHERE id_medico = :id_medico");
			$stmt->bindParam(":id_beneficiario",$this->id_beneficiario,PDO::PARAM_STR);
			$stmt->bindParam(":fecha",$this->fecha,PDO::PARAM_STR);
			$stmt->bindParam(":lugar",$this->lugar,PDO::PARAM_STR);
			$stmt->bindParam(":peso",$this->peso,PDO::PARAM_STR);
			$stmt->bindParam(":talla",$this->talla,PDO::PARAM_STR);
			$stmt->bindParam(":diagnostico",$this->diagnostico,PDO::PARAM_INT);
			$stmt->bindParam(":id_medico",$this->id_medico,PDO::PARAM_INT);

			return $stmt->execute();
		}*/

		public function listarPA(){
			
			$stmt = C_conexion::getConexion()->prepare("SELECT * FROM atendidas");
			
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

			$stmt = C_conexion::getConexion()->prepare("SELECT * FROM medicos WHERE diagnostico = true");

			$stmt->execute();

			return $stmt->fetchAll();

			$stmt->clouse();
		}
	}





