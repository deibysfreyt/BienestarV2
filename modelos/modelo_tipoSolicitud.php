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

			$condicion = 1;
			$stmt->bindParam(":solicitud", $tipoModel["solicitud"], PDO::PARAM_STR);
			$stmt->bindParam(":descripcion", $tipoModel["descripcion"], PDO::PARAM_STR);
			$stmt->bindParam(":condicion", $condicion, PDO::PARAM_INT);

			return $stmt->execute();

		}
	}





