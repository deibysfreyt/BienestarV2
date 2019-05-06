<?php
	
	if (is_file("vista/vista_".$action.".php")) {
		
		require_once("modelos/modelo_".$action.".php");

		$tipoSolicitudMol = new TipoSolicitudMol();

		//Preguntamos si la variable esta definida o declarada, es decir que no sea NULL
		if (isset($_GET["id"])) {

			if (preg_match('/^[[:digit:]]+$/', $_GET["id"])) {

				$datos = limpiarCadena($_GET["id"]);
				$respuesta = $tipoSolicitudMol->mostrarTS($datos);

			}
			
		}

		if (isset($_POST["id_tipo_solicitud"])) {
			
			$id_tipo_solicitud = isset($_POST["id_tipo_solicitud"])? limpiarCadena($_POST["id_tipo_solicitud"]): "";

			if (empty($id_tipo_solicitud)) {

				if ( preg_match('/[[:alpha:]]/', $_POST["solicitud"]) && preg_match('/[[:alpha:]]/', $_POST["descripcion"]) && preg_match('/^[[:digit:]]+$/', $_POST["condicion"]) ) {
					
					$tipoControl = array(	'solicitud' => limpiarCadena($_POST["solicitud"]),
											'descripcion' => limpiarCadena($_POST["descripcion"]),
											'condicion' => limpiarCadena($_POST["condicion"])
										);

					$respuesta = $tipoSolicitudMol->insertarTS($tipoControl);

					if ($respuesta) {

						header("location:tablaSolicitud");
						
					}
				}

			}else{

				if ( preg_match('/[[:alpha:]]/', $_POST["solicitud"]) && preg_match('/[[:alpha:]]/', $_POST["descripcion"]) &&  preg_match('/^[[:digit:]]+$/', $_POST["condicion"]) && preg_match('/^[[:digit:]]+$/', $id_tipo_solicitud) ) {
					
					$tipoControl = array(	'solicitud' => limpiarCadena($_POST["solicitud"]),
											'descripcion' => limpiarCadena($_POST["descripcion"]),
											'condicion' => limpiarCadena($_POST["condicion"]),
											'id_tipo_solicitud' => $id_tipo_solicitud
										);
				
					$respuesta = $tipoSolicitudMol->actualizarTS($tipoControl);

					if ($respuesta) {

						header("location:tablaSolicitud");
						
					}
				}		
			}
		}

		require_once("vista/vista_".$action.".php");
			
	} else{
			echo "Error 404 : Pagina no encontrada";
	}
