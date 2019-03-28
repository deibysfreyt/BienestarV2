$(document).ready(function(){

	$("#botonEnviar").on("click",function(){
		
			$("#b").val($(this).val());
			enviar_ajax();
			
		
	});
  
});


function enviar_ajax(){

	$.post('',
        function(data){
                //Al evaluar "data"
            if (data != 'false'){ // Si el data es distinto de false es que los datos son correctos
                    //lo direcciona al index del sistema
                $(location).attr("href","informe_social.php");                  
            }else{ // Al no tener coincidencia con la base de datos el data es false
                alert("Usuario y/o Password incorrectos"); // Emite un mansaje
        }
    });
	
	/*$.ajax({
            url: '', //la pagina a donde se envia
            type: 'POST',//tipo de envio 
            data: $("#entrar").serialize(),//asigna a los datos a enviar el formulario con codificacion url
            success: function(data) {//si resulto exitosa la transmision
				

				if (data != 'false'){ // Si el data es distinto de false es que los datos son correctos
                    //lo direcciona al index del sistema
                	//$(location).attr("href","informe_social.php");
                	$(location).attr("href","index.php?do=index");                  
            	}else{ // Al no tener coincidencia con la base de datos el data es false
                	bootbox.alert("Usuario y/o Password incorrectos"); // Emite un mansaje
        		}
				
            },
            
    }); */
}
/*


//funcion para envio de formulario por ajax
function enviar_ajax(){
	
	$.ajax({
            url: '', //la pagina a donde se envia
            type: 'POST',//tipo de envio 
            data: $("#entrar").serialize(),//asigna a los datos a enviar el formulario con codificacion url
            success: function(respuesta) {//si resulto exitosa la transmision
				
				//tranforma el formato json 
				//para leerlo desde js
				var lee = JSON.parse(respuesta);
				
				var cadena = "";
				if(lee.bien=='si'){
					cadena += "EXITO EN OPERACION \b"+
					lee.accion;
				}
				else{
					cadena += "ERROR EN OPERACION "+
					lee.accion+" con resultado "+
					lee.html;
				}
				alert(cadena);
				
            },
            error: function(){
              alert('Error con ajax!');
            }
    }); 
}


// Funcion para Guardar y Editar
function guardaryeditar(e){
	e.preventDefault(); // Nose activara la accion predeterminada del evento
	$("btnGuardar").prop("disabled",true);
	var formData = new FormData($("#formulario")[0]);

	$.ajax({
		url: "../ajax/informe_social.php?op=guardaryeditar",
		type: "POST",
		data: formData,
		contentType: false,
		processData: false,

		success: function(datos){
			bootbox.alert(datos);
			mostrarform(false);
			tabla.ajax.reload();
		}
	});
	limpiar();
}*/