<?php
	
	if (is_file("vista/vista_".$action.".php")) {
		
		require_once("modelos/modelo_".$action.".php");

		if (isset($_POST["id_tipo_solicitud"])) {

			//$id_tipo_solicitud=isset($_POST["id_tipo_solicitud"])? $_POST["id_tipo_solicitud"]:"";

			if (empty($id_tipo_solicitud)) {

				
				if (preg_match('/[[:alpha:]]/', $_POST["solicitud"]) && preg_match('/[[:alpha:]]/', $_POST["descripcion"])) {
					
					$tipoControl = array(	'solicitud' => $_POST["solicitud"],
											'descripcion' => $_POST["descripcion"]);

					$tipoSolicitudMol = new TipoSolicitudMol();

					$respuesta = $tipoSolicitudMol->insertarTS($tipoControl);

					if ($respuesta) {

						header("location:tipoSolicitud");
						

					}
				}
				
			}
		}

		require_once("vista/vista_".$action.".php");
		
	} else{
		echo "Error 404 : Pagina no encontrada";
	}