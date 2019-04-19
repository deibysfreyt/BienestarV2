<?php
	
	if (is_file("vista/vista_".$action.".php")) {
		
		require_once("modelos/modelo_tipoSolicitud.php");

		$tipoSolicitudMol = new TipoSolicitudMol();

		//Preguntamos si la variable esta definida o declarada, es decir que no sea NULL
		if (isset($_GET["id"])) {
			$datos = $_GET["id"];
			$respuesta = $tipoSolicitudMol->mostrarTS($datos);
		}

		if (isset($_POST["id_tipo_solicitud"])) {
			
			$id_tipo_solicitud = isset($_POST["id_tipo_solicitud"])? limpiarCadena($_POST["id_tipo_solicitud"]): "";

			if (empty($id_tipo_solicitud)) {

				if ( preg_match('/[[:alpha:]]/', $_POST["solicitud"]) && preg_match('/[[:alpha:]]/', $_POST["descripcion"]) && preg_match('/^[[:digit:]]+$/', $_POST["condicion"]) ) {
					
					$tipoControl = array(	'solicitud' => isset($_POST["solicitud"])? limpiarCadena($_POST["solicitud"]):"",
											'descripcion' => isset($_POST["descripcion"])? limpiarCadena($_POST["descripcion"]):"",
											'condicion' => isset($_POST["condicion"])? limpiarCadena($_POST["condicion"]): ""
										);

					$respuesta = $tipoSolicitudMol->insertarTS($tipoControl);

					if ($respuesta) {

						header("location:tablaSolicitud");
						
					}else{
						echo "ERRRooo..!!!!";
						echo " - ";
						echo $respuesta[3];
						echo " - ";
						echo $tipoControl["condicion"];
					}
				}
			}else{

				if ( preg_match('/[[:alpha:]]/', $_POST["solicitud"]) && preg_match('/[[:alpha:]]/', $_POST["descripcion"]) &&  preg_match('/^[[:digit:]]+$/', $_POST["condicion"]) ) {
					
					$tipoControl = array(	'solicitud' => isset($_POST["solicitud"])? limpiarCadena($_POST["solicitud"]):"",
											'descripcion' => isset($_POST["descripcion"])? limpiarCadena($_POST["descripcion"]):"",
											'condicion' => isset($_POST["condicion"])? limpiarCadena($_POST["condicion"]): "",
											'id_tipo_solicitud' => $id_tipo_solicitud
										);
				
					$respuesta = $tipoSolicitudMol->actualizarTS($tipoControl);

					if ($respuesta) {

						header("location:tablaSolicitud");
						
					}
					echo "ERROOOOOOOOO..............!!!!!!!!!!!";
				}		
			}
		}

		require_once("vista/vista_".$action.".php");
			
	} else{
			echo "Error 404 : Pagina no encontrada";
	}
