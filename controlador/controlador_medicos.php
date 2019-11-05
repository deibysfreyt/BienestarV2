<?php
	
	if (is_file("vista/vista_".$action.".php")) {
		
		require_once("modelos/modelo_".$action.".php");
		$medicos = new Medicos();

		//Preguntamos si la variable esta definida o declarada, es decir que no sea NULL
		if (isset($_GET["id"])) {

			if (preg_match('/^[[:digit:]]+$/', $_GET["id"])) {

				$id = (int)$_GET["id"];
				$Ms = $medicos->mostrarM($id);
			}	
		}

		if (!empty($_POST)) {
			
			if ( preg_match('/[[:alpha:]]/', $_POST["nombre_apellido"]) && preg_match('/[[:digit:]]/', $_POST["cedula"]) ) {
				
				$id_medicos = limpiarCadena($_POST["id_medicos"]);
				
				$medicos->setEspecialidad($_POST["especialidad"]);
				$medicos->setNombre_apellido($_POST["nombre_apellido"]);
				$medicos->setCedula($_POST["cedula"]);
				$medicos->setCargo($_POST["cargo"]);
				$medicos->setTlf($_POST["tlf"]);
				$medicos->setCondicion($_POST["condicion"]);

				if (empty($id_medicos)) {
					$espd = $medicos->insertarM();
				}else{
					$medicos->setIdMedicos($id_medicos);
					$espd = $medicos->actualizarM();
				}

				if ($espd) {
					header('Status: 301 Moved Permanently', false, 301);
					header("location:tablaMedicos");
					exit();
				}
			}
		}

		require_once("vista/vista_".$action.".php");
			
	} else{
			echo "Error 404 : Pagina no encontrada";
	}
