<?php

	require_once("modelos/modelo_".$action.".php");

	if(is_file("vista/vista_".$action.".php")){

	  	
	  	if(isset($_POST["username"])){

	  		if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["username"]) && preg_match('/^[a-zA-Z0-9]+$/', $_POST["password"])) {
	  			
	  			$datosControl = array('username'=>$_POST["username"],
									'password'=>$_POST["password"]);

				$loginModel= new LoginModel();			
				$respuesta = $loginModel->ingresoLogin($datosControl);

				$user=trim($respuesta["username"]);
				$pass=trim($respuesta["password"]);
				

				if ($user==$_POST["username"] && $pass==$_POST["password"]) {

					header("location:index");

				}else{
					
					header("location:index.php");
				
		  		}

			}
		}

		require_once("vista/vista_".$action.".php");

	} else{

		echo "Error 404 : Pagina no encontrada";

	}
