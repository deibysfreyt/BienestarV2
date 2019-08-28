<?php
	
	if (is_file("vista/vista_".$action.".php")) {
		
		require_once("modelos/modelo_".$action.".php");

		$gestorSolicitud = new GestorSolicitud();

		//Preguntamos si la variable esta definida o declarada, es decir que no sea NULL
		if (isset($_GET["id"])) {

			if (preg_match('/^[[:digit:]]+$/', $_GET["id"])) {

				$id = (int)$_GET["id"];
				$tipo_solicitud = $gestorSolicitud->mostrarGS($id);

			}
			
		}

		if (isset($_POST["id_tipo_solicitud"])) {
			
			$id_tipo_solicitud = limpiarCadena($_POST["id_tipo_solicitud"]);

			if (empty($id_tipo_solicitud)) {


				if ( preg_match('/[[:alpha:]]/', $_POST["solicitud"]) && preg_match('/[[:alpha:]]/', $_POST["descripcion"]) && preg_match('/^[[:digit:]]+$/', $_POST["condicion"]) ) {
					

					$gestorSolicitud->setSolicitud($_POST["solicitud"]);
					$gestorSolicitud->setDescripcion($_POST["descripcion"]);
					$gestorSolicitud->setCondicion($_POST["condicion"]);

					$tipo_solicitud = $gestorSolicitud->insertarGS();

					
					if ($tipo_solicitud) {

						header('Status: 301 Moved Permanently', false, 301);
						header("location:tablaSolicitud");
						exit();
						
					}
				}

			}else{

				if ( preg_match('/[[:alpha:]]/', $_POST["solicitud"]) && preg_match('/[[:alpha:]]/', $_POST["descripcion"]) &&  preg_match('/^[[:digit:]]+$/', $_POST["condicion"]) && preg_match('/^[[:digit:]]+$/', $id_tipo_solicitud) ) {

					$gestorSolicitud->setSolicitud($_POST["solicitud"]);
					$gestorSolicitud->setDescripcion($_POST["descripcion"]);
					$gestorSolicitud->setCondicion($_POST["condicion"]);
					$gestorSolicitud->setIdTipoSolicitud($id_tipo_solicitud);
					
					$tipo_solicitud = $gestorSolicitud->actualizarGS();

					if ($tipo_solicitud) {

						header('Status: 301 Moved Permanently', false, 301);
						header("location:tablaSolicitud");
						exit();
						
					}
				}		
			}
		}

		require_once("vista/vista_".$action.".php");
			
	} else{
			echo "Error 404 : Pagina no encontrada";
	}
