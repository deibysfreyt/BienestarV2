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
		require_once("modelos/modelo_".$action.".php");
		$solicitud = new Solicitud();
		//Preguntamos si la variable esta definida o declarada, es decir que no sea NULL
		if (isset($_GET["id_s"])) {
			if (preg_match('/^[[:digit:]]+$/', $_GET["id_s"])) {
				$id_s = (int)$_GET["id_s"];
				$datos = $solicitud->mostrarS($id_s);
			}
		}
		if (isset($_GET["id_sb"])) {
			if (preg_match('/^[[:digit:]]+$/', $_GET["id_sb"])) {
				$id_sb = (int)$_GET["id_sb"];
				$datos = $solicitud->mostrarSB($id_sb);
			}
		}
		if (isset($_POST["id_solicitud"])) {
			$id_solicitante = limpiarCadena($_POST["id_solicitante"]);
			$id_beneficiario = limpiarCadena($_POST["id_beneficiario"]);

			if ( preg_match('/[[:digit:]]/', $_POST["cedula"]) && preg_match('/[[:alpha:]]/', $_POST["nombre_apellido"]) && preg_match('/[[:alpha:]]/', $_POST["nombre_apellido_b"]) ) {
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
					//$idSolicitante = $solicitante->insertarS();
					// Beneficiario
					//$beneficiario->setId_solicitante($idSolicitante);
				$beneficiario->setCedula($_POST["cedula_b"]);
				$beneficiario->setNombre_apellido($_POST["nombre_apellido_b"]);
				$beneficiario->setFecha_nacimiento($_POST["fecha_nacimiento_b"]);
					//$idBeneficiario = $beneficiario->insertarB();
					// Area Fisica
				$areaFisica->setTipo_vivienda($_POST["tipo_vivienda"]);
				$areaFisica->setTenencia($_POST["tenencia"]);
				$areaFisica->setConstruccion($_POST["construccion"]);
				$areaFisica->setTipo_piso($_POST["tipo_piso"]);
					//$idArea_Fisica = $areaFisica->insertarAF();
					//Solicitud $idArea_Fisica = 13;
				$id_usuario = 1; // Mientras tanto
				$solicitud->setId_usuario($id_usuario);
					//$solicitud->setId_beneficiario($idBeneficiario);
				$solicitud->setId_tipo_solicitud($_POST["id_tipo_solicitud"]);
					//$solicitud->setId_area_fisica($idArea_Fisica);
				$solicitud->setFecha($_POST["fecha"]);
				$solicitud->setSemana_embarazo($_POST["semana_embarazo"]);
				$solicitud->setEstado($_POST["estado"]);
					//$idSolicitud = $solicitud->insertarSlt();

				if (!empty($id_solicitante) && empty($id_beneficiario)) {
					$solicitante->setId_Solicitante($id_solicitante);
					$actualizacion_S = $solicitante->actualizarS();
					if ($actualizacion_S) {
						 $beneficiario->setId_solicitante($id_solicitante);
						$idBeneficiario = $beneficiario->insertarB();
						$solicitud->setId_beneficiario($idBeneficiario);
						$idArea_Fisica = $areaFisica->insertarAF();
						$solicitud->setId_area_fisica($idArea_Fisica);
						$idSolicitud = $solicitud->insertarSlt();
						}
				}else if (empty($id_solicitante) && !empty($id_beneficiario)) {
					$idSolicitante = $solicitante->insertarS();
					$beneficiario->setId_solicitante($idSolicitante);
					$beneficiario->setId_beneficiario($id_beneficiario);
					$actualizar_B = $beneficiario->actualizarB();
					if ($actualizar_B) {
						$solicitud->setId_beneficiario($id_beneficiario);
						$idArea_Fisica = $areaFisica->insertarAF();
						$solicitud->setId_area_fisica($idArea_Fisica);
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
							$idArea_Fisica = $areaFisica->insertarAF();
							$solicitud->setId_area_fisica($idArea_Fisica);
							$idSolicitud = $solicitud->insertarSlt();
						}
					}
				}else{
					$idSolicitante = $solicitante->insertarS();
					$beneficiario->setId_solicitante($idSolicitante);
					$idBeneficiario = $beneficiario->insertarB();
					$solicitud->setId_beneficiario($idBeneficiario);
					$idArea_Fisica = $areaFisica->insertarAF();
					$solicitud->setId_area_fisica($idArea_Fisica);
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
				header("Location:consultaSolicitud");
				exit;
			}
		}
		require_once("vista/vista_".$action.".php");
	} else{
		echo "Error 404 : Pagina no encontrada";
	}