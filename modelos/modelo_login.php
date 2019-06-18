<?php 

/**
 * 
 */
require_once("modelo_conexion.php");

class Login extends C_conexion
{
	private $username,
			$password;
	
	function __construct()
	{
		parent::__construct();
	}

	public function setUsername($username){
		$this->username = $username;
	}

	public function setPassword($password){
		$this->password = $password;
	}

	public function ingresoLogin(){


		$stmt = C_conexion::getConexion()->prepare("SELECT username, password, condicion FROM usuario WHERE username = :username AND password = :password");

		$stmt->bindParam(":username", limpiarCadena($this->username), PDO::PARAM_STR);
		$stmt->bindParam(":password", limpiarCadena($this->password), PDO::PARAM_STR);


		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_ASSOC);

		//Cerramos la conexion
		$stmt->clouse();

	}
}




