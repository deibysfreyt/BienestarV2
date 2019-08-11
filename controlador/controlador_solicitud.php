<?php
	
	if (is_file("vista/vista_".$action.".php")) {
		
		require_once("modelos/modelo_".$action.".php");

		// Listamos Las Solicitudes Habilitadas
		require_once("modelos/modelo_gestorSolicitud.php");
		$gestorSolicitud = new GestorSolicitud();

		if (isset($_POST["id_solicitud"])) {
			
			$id_solicitud = limpiarCadena($_POST["id_solicitud"]);

			if (empty($id_solicitud)) {


				if ( preg_match('/[[:alpha:]]/', $_POST["solicitud"]) && preg_match('/[[:alpha:]]/', $_POST["descripcion"]) && preg_match('/^[[:digit:]]+$/', $_POST["condicion"]) ) {
					

					$gestorSolicitud->setSolicitud($_POST["solicitud"]);
					$gestorSolicitud->setDescripcion($_POST["descripcion"]);
					$gestorSolicitud->setCondicion($_POST["condicion"]);

					$tipo_solicitud = $gestorSolicitud->insertarGS();

					if ($tipo_solicitud) {

						header("location:tablaSolicitud");
						
					}
				}

			}else{

				if ( preg_match('/[[:alpha:]]/', $_POST["solicitud"]) && preg_match('/[[:alpha:]]/', $_POST["descripcion"]) &&  preg_match('/^[[:digit:]]+$/', $_POST["condicion"]) && preg_match('/^[[:digit:]]+$/', $id_solicitud) ) {

					$gestorSolicitud->setSolicitud($_POST["solicitud"]);
					$gestorSolicitud->setDescripcion($_POST["descripcion"]);
					$gestorSolicitud->setCondicion($_POST["condicion"]);
					$gestorSolicitud->setIdTipoSolicitud($id_solicitud);
					
					$tipo_solicitud = $gestorSolicitud->actualizarGS();

					if ($tipo_solicitud) {

						header("location:tablaSolicitud");
						
					}
				}		
			}
		}

		require_once("vista/vista_".$action.".php");
		
	} else{
		echo "Error 404 : Pagina no encontrada";
	}