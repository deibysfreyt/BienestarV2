<?php
	
	if (is_file("vista/vista_".$action.".php")) {
		
		require_once("modelos/modelo_solicitud.php");

		$solicitud = new Solicitud();

		require_once("vista/vista_".$action.".php");
		
	} else{
		echo "Error 404 : Pagina no encontrada";
	}