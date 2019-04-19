<?php 
	/**
	 * 
	 */

	require_once("modelo_conexion.php");

	class TipoSolicitudMol extends C_conexion
	{
		
		function __construct()
		{
			parent::__construct();
		}

		public function insertarTS($tipoModel) {

			$stmt = C_conexion::getConexion()->prepare("INSERT INTO tipo_solicitud (solicitud,descripcion,condicion) VALUES (:solicitud,:descripcion,:condicion)");

			$stmt->bindParam(":solicitud", $tipoModel["solicitud"], PDO::PARAM_STR);
			$stmt->bindParam(":descripcion", $tipoModel["descripcion"], PDO::PARAM_STR);
			$stmt->bindParam(":condicion", $tipoModel["condicion"], PDO::PARAM_INT);

			return $stmt->execute();
			$stmt->clouse();

		}

		public function listarTS(){
			
			$stmt = C_conexion::getConexion()->prepare("SELECT * FROM tipo_solicitud");
			
			$stmt->execute();

			return $stmt->fetchAll();
			$stmt->clouse();
		}

		public function mostrarTS($id){
			
			$stmt = C_conexion::getConexion()->prepare("SELECT * FROM tipo_solicitud WHERE id_tipo_solicitud = :id");
			
			$stmt->bindParam(":id", $id, PDO::PARAM_INT);	
			$stmt->execute();

			return $stmt->fetch();

			$stmt->close();
		}

		public function actualizarTS($tipoModel){
			
			$stmt = C_conexion::getConexion()->prepare("UPDATE tipo_solicitud SET solicitud = :solicitud, descripcion = :descripcion , condicion = :condicion WHERE id_tipo_solicitud = :id_tipo_solicitud");

			$stmt->bindParam(":solicitud", $tipoModel["solicitud"], PDO::PARAM_STR);
			$stmt->bindParam(":descripcion", $tipoModel["descripcion"], PDO::PARAM_STR);
			$stmt->bindParam(":condicion",$tipoModel["condicion"], PDO::PARAM_INT);
			$stmt->bindParam(":id_tipo_solicitud", $tipoModel["id_tipo_solicitud"], PDO::PARAM_INT);
			
			return $stmt->execute();
			$stmt->clouse();
		}
	}





