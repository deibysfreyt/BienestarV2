<?php
	if (is_file("vista/vista_".$action.".php")) {
		require_once("modelos/modelo_medico.php");
		$medico = new Medico();
		require_once("modelos/modelo_solicitante.php");
		$solicitante = new Solicitante();
		require_once("modelos/modelo_beneficiario.php");
		$beneficiario = new Beneficiario();
		require_once("modelos/modelo_".$action.".php");
		$atendidas = new Atendidas();
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
		if (isset($_POST["id_atendidas"])) {
			

			if ( preg_match('/[[:digit:]]/', $_POST["cedula"]) && preg_match('/[[:alpha:]]/', $_POST["nombre_apellido"]) && preg_match('/[[:alpha:]]/', $_POST["nombre_apellido_b"]) ) {

				
				if (isset($_POST["id_atendidos"])) {
					//Familiares

					$cedula = $_POST["cedula"]









					

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
						$familiarSolicitud->setid_atendidas($idSolicitud);

						$familiarSolicitud->insertarFS();

						$num_elementos=$num_elementos + 1;

					}
				}
				
				
				$solicitante->setCedula();
				$Slt = $solicitante->ConsultaAtendidas();

				if (empty($Slt) ) {
					
					$solicitante->setNombre_apellido($_POST["nombre_apellido"]);
					$solicitante->setTlf_movil($_POST["tlf_movil"]);
					$solicitante->setParroquia($_POST["parroquia"]);
					$Slt = $solicitante->insertarS();
				}
				
				$beneficiario->setId_beneficiario($Slt);
				$beneficiario->setNombre_apellido($_POST["nombre_apellido"]);
				$Bfo = $beneficiario->insertarB();

				$atendidas->setIdMedico($_POST["id_medico"]);
				$atendidas->setFecha($_POST["fecha"]);
				$atendidas->setLugar($_POST["lugar"]);
				$atendidas->setPeso($_POST["peso"]);
				$atendidas->setTalla($_POST["talla"]);
				$atendidas->setDiagnostico($_POST["diagnostico"]);
				$atendidas->setEdad($_POST["edad"]);

				$atendidas->insertarPA();




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
					$areaMedica->setid_atendidas($idSolicitud);
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
						$familiarSolicitud->setid_atendidas($idSolicitud);

						$familiarSolicitud->insertarFS();

						$num_elementos=$num_elementos + 1;

					}
				}
				header("Location:index.php?do=consultaSolicitud&p=$idSolicitud");
				//header("Location:consultaSolicitud");
				echo $idSolicitud;
				exit;
			}
		}
		require_once("vista/vista_".$action.".php");
	} else{
		echo "Error 404 : Pagina no encontrada";
	}