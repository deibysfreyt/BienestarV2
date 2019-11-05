<?php
	
	if (is_file("vista/vista_".$action.".php")) {
		
		require_once("modelos/modelo_".$action.".php");

		$servicios = new Servicios();

		//Preguntamos si la variable esta definida o declarada, es decir que no sea NULL
		if (isset($_GET["id"])) {

			if (preg_match('/^[[:digit:]]+$/', $_GET["id"])) {

				$id = (int)$_GET["id"];
				$Sr = $servicios->mostrarSr($id);
			}	
		}

		if (!empty($_POST)) {
			
			if ( preg_match('/[[:alpha:]]/', $_POST["nombre"]) && preg_match('/^[[:digit:]]+$/', $_POST["condicion"]) && preg_match('/[[:alpha:]]/', $_POST["descripcion"]) ) {
				
				$id_servicios = limpiarCadena($_POST["id_servicios"]);
				
				$servicios->setNombre($_POST["nombre"]);
				$servicios->setDescripcion($_POST["descripcion"]);
				$servicios->setCondicion($_POST["condicion"]);

				if (empty($id_servicios)) {
					$espd = $servicios->insertarSr();
				}else{
					$servicios->setIdServicios($id_servicios);
					$espd = $servicios->actualizarSr();
				}

				if ($espd) {
					header('Status: 301 Moved Permanently', false, 301);
					header("location:tablaServicios");
					exit();
				}
			}
		}

		require_once("vista/vista_".$action.".php");
			
	} else{
			echo "Error 404 : Pagina no encontrada";
	}
