<?php

	
	if(is_file("vista/vista_".$action.".php")){

		require_once("modelos/modelo_".$action.".php");
	  	
	  	if(isset($_POST["username"])){


	  		if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["username"]) && preg_match('/^[a-zA-Z0-9]+$/', $_POST["password"])) {

	  			$login = new Login();

	  			$login->setUsername($_POST["username"]);
	  			$login->setPassword($_POST["password"]);

	  			$respuesta = $login->ingresoLogin();

	  			if ($respuesta["condicion"]) {

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
