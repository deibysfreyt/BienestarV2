<?php 

/**
 * 
 */
require_once("modelo_conexion.php");

class LoginModel extends C_conexion
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function ingresoLogin($datosModel){


		$stmt = C_conexion::getConexion()->prepare("SELECT username, password FROM usuario WHERE username = :username");

		$stmt->bindParam(":username", $datosModel["username"], PDO::PARAM_STR);


		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_ASSOC);
		//return $stmt->fecth();

		$stmt->clouse();

	}
}




