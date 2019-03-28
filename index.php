<?php

	//configura la zona horaria
	date_default_timezone_set('America/Caracas');
	//hace que apache capture todos los errores de php
	error_reporting(E_ALL);
	//muestra los errores en el navegador
	ini_set('display_errors', 1);

	//variable para indicar que pagina
	//se muestra 
	$action = "login";
	//condicional que lee la solicitud
	//de cambio de paction  
	if (!empty($_GET['do'])) {
		$action = $_GET['do'];
	}

	//pregunta si existe el archivo
 	//si existe lo trae, si no escribe pagina en costrucción
	if (is_file("controlador/controlador_" . $action . ".php")) {
	    require_once("controlador/controlador_" . $action . ".php");
	} else {
	    echo "Error 404 : Pagina no encontrada";
	}
