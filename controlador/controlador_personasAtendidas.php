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
		if (!empty($_POST)) {

			if ( preg_match('/[[:digit:]]/', $_POST["id_medico"]) && preg_match('/[[:alpha:]]/', $_POST["lugar"]) ) {
				
				$id_atendidas = $_POST["id_atendidas"];
				$cedula = $_POST["cedula"];
				$nombre_apellido = $_POST["nombre_apellido"];
				$tlf_movil = $_POST["tlf_movil"];
				$parroquia = $_POST["parroquia"];
				$nombre_apellido_b = $_POST["nombre_apellido_b"];
				$id_medico = $_POST["id_medico"];
				$fecha = $_POST["fecha"];
				$lugar = $_POST["lugar"];
				$peso = $_POST["peso"];
				$talla= $_POST["talla"];
				$diagnostico = $_POST["diagnostico"];
				$edad = $_POST["edad"];
					
				$num_elementos=0;
				$CPVO = false;

				while ($num_elementos < count($id_atendidas)) {

					$solicitante->setCedula($cedula[$num_elementos]);
					$solicitante->setTlf_movil($tlf_movil[$num_elementos]);
					$solicitante->setParroquia($parroquia[$num_elementos]);

					$Slt = NULL;
					$Slt = $solicitante->ConsultaCI();

					if (empty($Slt)) {
						$solicitante->setNombre_apellido($nombre_apellido[$num_elementos]);						
						$Slt = $solicitante->insertarS();
					}else{
						$solicitante->setId_Solicitante($Slt);
						$solicitante->actualizarPAS();
					}
				
					$beneficiario->setId_solicitante($Slt);
					$beneficiario->setNombre_apellido($nombre_apellido_b[$num_elementos]);
					$Bfo = $beneficiario->insertarB();

					$atendidas->setIdBeneficiario($Bfo);
					$atendidas->setIdMedico($id_medico);
					$atendidas->setFecha($fecha);
					$atendidas->setLugar($lugar);
					$atendidas->setPeso($peso[$num_elementos]);
					$atendidas->setTalla($talla[$num_elementos]);
					$atendidas->setDiagnostico($diagnostico[$num_elementos]);
					$atendidas->setEdad($edad[$num_elementos]);

					$atendidas->insertarPA();

					$num_elementos=$num_elementos + 1;
					$CPVO = true;

				}
				if ($CPVO) {
					header("Location:index.php?do=tablaEspecialidad");
					exit;
				} else {
					header("Location:index.php?do=personasAtendidas");
					exit;
				}
				//header("Location:consultaSolicitud");
				
			}
		}
		require_once("vista/vista_".$action.".php");
	} else{
		echo "Error 404 : Pagina no encontrada";
	}