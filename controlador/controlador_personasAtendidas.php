<?php
	if (is_file("vista/vista_".$action.".php")) {
		require_once("modelos/modelo_serviciosMedicos.php");
		$SM = new ServiciosMedicos();
		require_once("modelos/modelo_servicios.php");
		$servicios = new Servicios();
		require_once("modelos/modelo_medicos.php");
		$medicos = new Medicos();
		require_once("modelos/modelo_solicitante.php");
		$solicitante = new Solicitante();
		require_once("modelos/modelo_beneficiario.php");
		$beneficiario = new Beneficiario();
		require_once("modelos/modelo_".$action.".php");
		$atendidas = new Atendidas();
		//Preguntamos si la variable esta definida o declarada, es decir que no sea NULL
		if (!empty($_POST)) {

			if ( preg_match('/[[:digit:]]/', $_POST["id_medico"]) && preg_match('/[[:digit:]]/', $_POST["id_servicios"]) ) {
				
				$id_medicos = $_POST["id_medicos"];
				$id_servicios = $_POST["id_servicios"];

				$id_atendidas = $_POST["id_atendidas"];
				$cedula = $_POST["cedula"];
				$nombre_apellido = $_POST["nombre_apellido"];
				$tlf_movil = $_POST["tlf_movil"];
				$parroquia = $_POST["parroquia"];
				$nombre_apellido_b = $_POST["nombre_apellido_b"];
				$fecha = $_POST["fecha"];
				$lugar = $_POST["lugar"];
				$peso = $_POST["peso"];
				$talla= $_POST["talla"];
				$diagnostico = $_POST["diagnostico"];
				$edad = $_POST["edad"];
					
				$num_elementos=0;
				$CPVO = false;

				while ($num_elementos < count($id_atendidas)) {

					$medicos->setIdMedicos($id_medicos);
					$servicios->setIdServicios($id_servicios);

					$solicitante->setCedula($cedula[$num_elementos]);
					$solicitante->setTlf_movil($tlf_movil[$num_elementos]);
					$solicitante->setParroquia($parroquia[$num_elementos]);

					$datos = $solicitante->ConsultaCI($cedula[$num_elementos]);
					$id_S = $datos["id_solicitante"];


					if (empty($id_S)) {
						$solicitante->setNombre_apellido($nombre_apellido[$num_elementos]);
						$id_S = $solicitante->insertarS();
					}else{
						$solicitante->setId_Solicitante($id_S);
						$solicitante->actualizarPAS();
					}
				
					$beneficiario->setId_solicitante($id_S);
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

					$rsp = $atendidas->insertarPA();

					$num_elementos=$num_elementos + 1;

				}

				if ($rsp) {
					header("Location:index.php?do=tablaEspecialidad");
					echo $id_S;
					exit;
				} else {
					//header("Location:index.php?do=personasAtendidas");
					echo $id_S;
					exit;
				}
				//header("Location:consultaSolicitud");
				
			}
		}
		require_once("vista/vista_".$action.".php");
	} else{
		echo "Error 404 : Pagina no encontrada";
	}