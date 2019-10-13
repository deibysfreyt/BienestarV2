<?php
	
	if (is_file("vista/vista_".$action.".php")) {
		
		require_once("modelos/modelo_".$action.".php");

		$especialidad = new Especialidad();

		//Preguntamos si la variable esta definida o declarada, es decir que no sea NULL
		if (isset($_GET["id"])) {

			if (preg_match('/^[[:digit:]]+$/', $_GET["id"])) {

				$id = (int)$_GET["id"];
				$especialidades = $especialidad->mostrarE($id);
			}	
		}

		if (isset($_POST["id_especialidad"])) {
			
			$id_especialidad = limpiarCadena($_POST["id_especialidad"]);

			if ( preg_match('/[[:alpha:]]/', $_POST["nombre"]) && preg_match('/^[[:digit:]]+$/', $_POST["condicion"]) && preg_match('/[[:alpha:]]/', $_POST["descripcion"]) ) {

				$especialidad->setNombre($_POST["nombre"]);
				$especialidad->setDescripcion($_POST["descripcion"]);
				$especialidad->setCondicion($_POST["condicion"]);

				if (empty($id_especialidad)) {
					$espd = $especialidad->insertarE();
				}else{
					$especialidad->setIdEspecialidad($id_especialidad);
					$espd = $especialidad->actualizarE();
				}

				if ($espd) {
					header('Status: 301 Moved Permanently', false, 301);
					header("location:tablaSolicitud");
					exit();
				}
			}
		}

		require_once("vista/vista_".$action.".php");
			
	} else{
			echo "Error 404 : Pagina no encontrada";
	}
