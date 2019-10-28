<?php
	
	if (is_file("vista/vista_".$action.".php")) {
		
		require_once("modelos/modelo_".$action.".php");
		$medico = new Medico();
		require_once("modelos/modelo_especialidad.php");
		$especialidad = new Especialidad();

		//Preguntamos si la variable esta definida o declarada, es decir que no sea NULL
		if (isset($_GET["id"])) {

			if (preg_match('/^[[:digit:]]+$/', $_GET["id"])) {

				$id = (int)$_GET["id"];
				$medicos = $medico->mostrarM($id);
			}	
		}

		if (isset($_POST["id_medico"])) {
			
			if ( preg_match('/[[:alpha:]]/', $_POST["nombre_apellido"]) && preg_match('/[[:digit:]]/', $_POST["cedula"]) ) {
				
				$id_medico = limpiarCadena($_POST["id_medico"]);
				
				$medico->setIdEspecialidad($_POST["id_especialidad"]);
				$medico->setNombre_apellido($_POST["nombre_apellido"]);
				$medico->setCedula($_POST["cedula"]);
				$medico->setCargo($_POST["cargo"]);
				$medico->setTlf($_POST["tlf"]);
				$medico->setCondicion($_POST["condicion"]);

				if (empty($id_medico)) {
					$espd = $medico->insertarM();
				}else{
					$medico->setIdMedico($id_medico);
					$espd = $medico->actualizarM();
				}

				if ($espd) {
					header('Status: 301 Moved Permanently', false, 301);
					header("location:tablaMedico");
					exit();
				}
			}
		}

		require_once("vista/vista_".$action.".php");
			
	} else{
			echo "Error 404 : Pagina no encontrada";
	}
