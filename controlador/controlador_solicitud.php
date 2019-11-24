<?php
	if (is_file("vista/vista_".$action.".php")) {
		require_once("modelos/modelo_gestorSolicitud.php");
		$gestorSolicitud = new GestorSolicitud();
		require_once("modelos/modelo_solicitante.php");
		$solicitante = new Solicitante();
		require_once("modelos/modelo_beneficiario.php");
		$beneficiario = new Beneficiario();
		require_once("modelos/modelo_areaFisica.php");
		$areaFisica = new AreaFisica();
		require_once("modelos/modelo_areaMedica.php");
		$areaMedica = new AreaMedica();
		require_once("modelos/modelo_familiar.php");
		$familiar = new Familiar();
		require_once("modelos/modelo_familiarSolicitud.php");
		$familiarSolicitud = new FamiliarSolicitud();
		require_once("modelos/modelo_".$action.".php");
		$solicitud = new Solicitud();
		//Preguntamos si la variable esta definida o declarada, es decir que no sea NULL
		if (isset($_GET["id_s"])) {
			if (preg_match('/^[[:digit:]]+$/', $_GET["id_s"])) {
				$id_s = (int)$_GET["id_s"];
				//$datos = $solicitud->mostrarS($id_s);
				$datos = $solicitante->mostrarS($id_s);
			}
		}
		if (isset($_GET["id_b"])) {
			if (preg_match('/^[[:digit:]]+$/', $_GET["id_b"])) {
				$id_b = (int)$_GET["id_b"];
				//$datos = $solicitud->mostrarSB($id_sb);
				
				$datosB = $beneficiario->mostrarB($id_b);
				$id_s = $datosB["id_solicitante"];
				$datos = $solicitante->mostrarS($id_s);
			}
		}
		if (!empty($_POST)) {

			if ( preg_match('/[[:digit:]]/', $_POST["cedula"]) && preg_match('/[[:alpha:]]/', $_POST["nombre_apellido"]) && preg_match('/[[:alpha:]]/', $_POST["nombre_apellido_b"]) ) {

				$id_solicitante = limpiarCadena($_POST["id_solicitante"]);
				$id_beneficiario = limpiarCadena($_POST["id_beneficiario"]);
					// Solicitante
				$solicitante->setCedula($_POST["cedula"]);
				$solicitante->setNombre_apellido($_POST["nombre_apellido"]);
				$solicitante->setFecha_nacimiento($_POST["fecha_nacimiento"]);
				$solicitante->setDireccion($_POST["direccion"]);
				$solicitante->setTlf_movil($_POST["tlf_movil"]);
				$solicitante->setTlf_fijo($_POST["tlf_fijo"]);
				$solicitante->setParroquia($_POST["parroquia"]);
				$solicitante->setOcupacion($_POST["ocupacion"]);
				$solicitante->setIngreso($_POST["ingreso"]);
				$solicitante->setEstado_civil($_POST["estado_civil"]);
				
					//Beneficiario
				$beneficiario->setCedula($_POST["cedula_b"]);
				$beneficiario->setNombre_apellido($_POST["nombre_apellido_b"]);
				$beneficiario->setFecha_nacimiento($_POST["fecha_nacimiento_b"]);

					// Area Fisica
				$areaFisica->setTipo_vivienda($_POST["tipo_vivienda"]);
				$areaFisica->setTenencia($_POST["tenencia"]);
				$areaFisica->setConstruccion($_POST["construccion"]);
				$areaFisica->setTipo_piso($_POST["tipo_piso"]);
				$idArea_Fisica = $areaFisica->insertarAF(); // se ejecuta y lo guada
				
				$id_usuario = 1; // Mientras tanto
				$solicitud->setId_usuario($id_usuario);
				$solicitud->setId_tipo_solicitud($_POST["id_tipo_solicitud"]);
				$solicitud->setFecha($_POST["fecha"]);
				$solicitud->setSemana_embarazo($_POST["semana_embarazo"]);
				$solicitud->setEstado($_POST["estado"]);
				$solicitud->setId_area_fisica($idArea_Fisica);
					//$idSolicitud = $solicitud->insertarSlt();

				if (!empty($id_solicitante) && empty($id_beneficiario)) {
					$solicitante->setId_Solicitante($id_solicitante);
					$actualizacion_S = $solicitante->actualizarS();
					if ($actualizacion_S) {
						 $beneficiario->setId_solicitante($id_solicitante);
						$idBeneficiario = $beneficiario->insertarB();
						$solicitud->setId_beneficiario($idBeneficiario);
						$idSolicitud = $solicitud->insertarSlt();
						}
				}else if (empty($id_solicitante) && !empty($id_beneficiario)) {
					$idSolicitante = $solicitante->insertarS();
					$beneficiario->setId_solicitante($idSolicitante);
					$beneficiario->setId_beneficiario($id_beneficiario);
					$actualizar_B = $beneficiario->actualizarB();
					if ($actualizar_B) {
						$solicitud->setId_beneficiario($id_beneficiario);
						$idSolicitud = $solicitud->insertarSlt();
					}
				}else if (!empty($id_solicitante) && !empty($id_beneficiario)) {
					$solicitante->setId_Solicitante($id_solicitante);
					$actualizacion_S = $solicitante->actualizarS();
					if ($actualizacion_S) {
						$beneficiario->setId_solicitante($id_solicitante);
						$beneficiario->setId_beneficiario($id_beneficiario);
						$actualizar_B = $beneficiario->actualizarB();
						if ($actualizar_B) {
							$solicitud->setId_beneficiario($id_beneficiario);
							$idSolicitud = $solicitud->insertarSlt();
						}
					}
				}else{
					$idSolicitante = $solicitante->insertarS();
					$beneficiario->setId_solicitante($idSolicitante);
					$idBeneficiario = $beneficiario->insertarB();
					$solicitud->setId_beneficiario($idBeneficiario);
					
					$idSolicitud = $solicitud->insertarSlt();
				}
					// Area Medica
				if (isset($_POST["diagnostico"])) {
					$areaMedica->setId_solicitud($idSolicitud);
					$areaMedica->setDiagnostico($_POST["diagnostico"]);
					$areaMedica->setMotivo_solicitud($_POST["motivo_solicitud"]);
					$areaMedica->setRecursos_disponibles($_POST["recursos_disponibles"]);
					$areaMedica->setMonto_aprobado($_POST["monto_aprobado"]);
					$areaMedica->setObservacion($_POST["observacion_am"]);
					$AreasMedicas = $areaMedica->insertarAM();
				}

				if (isset($_POST["id_familiar"])) {
					//Familiares
					$id_familiar = $_POST["id_familiar"];
					$nombre_apellido_f = $_POST["nombre_apellido_f"];
					$edad_f = $_POST["edad_f"];
					$parentesco_f = $_POST["parentesco_f"];
					$ocupacion_f = $_POST["ocupacion_f"];
					$observacion_f = $_POST["observacion_f"];

					$num_elementos=0;
					$sw=true;

					while ($num_elementos < count($id_familiar))
					{
						$familiar->setNombre_apellido($nombre_apellido_f[$num_elementos]);
						$familiar->setEdad($edad_f[$num_elementos]);
						$familiar->setParentesco($parentesco_f[$num_elementos]);
						$familiar->setOcupacion($ocupacion_f[$num_elementos]);
						$familiar->setObservacion($observacion_f[$num_elementos]);
					
						$idFamiliar = $familiar->insertarF();

						$familiarSolicitud->setId_familiar($idFamiliar);
						$familiarSolicitud->setId_solicitud($idSolicitud);

						$familiarSolicitud->insertarFS();

						$num_elementos=$num_elementos + 1;

					}
				}
				header("Location:index.php?do=consultaSolicitud&p=$idSolicitud");
				//header("Location:consultaSolicitud");
				//echo $idSolicitud;
				exit;
			}
		}
		require_once("vista/vista_".$action.".php");
	} else{
		echo "Error 404 : Pagina no encontrada";
	}