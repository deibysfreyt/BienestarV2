var tabla; // Variable Global para almacenar todos los Datos en el Data Table

	//Función que se ejecuta al inicio
function init(){ 	
	mostrarform(false); //No mostramos el formulario
	//listar(); //Listamos los datos en el Data Table

	/*$("#formulario").on("submit",function(e){ //Si en el formulario se activa el evento submit
		guardaryeditar(e); //Llamamos a la función
	})*/

	 //Obtenemos la fecha actual
	var now = new Date();
	var day = ("0" + now.getDate()).slice(-2);
	var month = ("0" + (now.getMonth() + 1)).slice(-2);
	var today = now.getFullYear()+"-"+(month)+"-"+(day) ;
    $('#fecha_actual').val(today);
}

	//Función limpiar los objetos del formulario ID
function limpiar()
{
	$("#id_tipo_solicitud").val("");
	$("#tipo_solicitud").val("");
	$("#descripcion").val("");
}

	//Función mostrar formulario
		//"flag" es una bandera puede ser true o false
function mostrarform(flag){
	limpiar(); //Limpiamos el formulario
	if (flag){ //Si es true va mostrar el formulario y ocultar el listado
		$("#listadoregistros").hide(); //Ocultamos el listado
		$("#formularioregistros").show(); //Mostramos el formulario
		$("#btnGuardar").prop("disabled",false); //Cuando muestre el formulario el botón va a estar activo
		$("#btnagregar").hide(); //Ocultamos el botón de agregar nuevo formulario
	}else{ //Si es false va ocultar el formulario y muestra el listado 
		$("#listadoregistros").show(); //Mostramos el listado
		$("#formularioregistros").hide(); //Ocultamos el formulario
		$("#btnagregar").show();  //Mostramos el botón para agregar nuevo formulario
	}
}

 ///Función para cancelar el Formulario
function cancelarform(){
	limpiar(); //Limpiamos el formulario
	mostrarform(false); //le enviamos el flag = false  para que no este visible
}

	//Función Listar
/*function listar(){
	tabla=$('#tbllistado').dataTable(
	{
		"aProcessing": true,//Activamos el procesamiento del datatables
	    "aServerSide": true,//Paginación y filtrado realizados por el servidor
	    dom: 'Bfrtip',//Definimos los elementos del control de tabla
	    buttons: [ // Los botones para exporta el listado de Data Table en diferentes documentos   
		            'copyHtml5',
		            'excelHtml5',
		            'csvHtml5',
		            'pdf'
		        ],
		"ajax":
				{
					url: '../ajax/tipo_solicitud.php?op=listar',
					type : "get",
					dataType : "json",						
					error: function(e){ //Si tenemos un error,
						//lo mostramos en un texto plano en la consola del navegador
						console.log(e.responseText);	
					}
				},
		"bDestroy": true,
		"iDisplayLength": 5, //Paginación
	    "order": [[ 0, "desc" ]] //Ordenar según la table (Columna de referencia,tipo de orden)
	}).DataTable();
}

	//Función para guardar o editar
function guardaryeditar(e){
	e.preventDefault(); // Nose activara la acción predeterminada del evento del formulario sutmit
	$("#btnGuardar").prop("disabled",true); //Al darle click al botón guardar lo deshabilitamos
	var formData = new FormData($("#formulario")[0]); //Obtenemos los datos de todo el formulario

	$.ajax({
		url: "../ajax/tipo_solicitud.php?op=guardaryeditar",
	    type: "POST",
	    data: formData, //Los datos que estemos enviando lo vamos a obtener de la "var formData"
	    contentType: false,
	    processData: false,
	    	//Si se ejecuta correctamente
	    success: function(datos){                    
	          bootbox.alert(datos); //Muestro los datos que estoy recibiendo en el alert (el "echo $rspta")        
	          mostrarform(false);  //Ocultamos el formulario flag = false
	          tabla.ajax.reload(); //Actualizo o recargo el Data Table
	    }

	});
	limpiar(); //Limpiamos el formulario
}


	//Mostramos los datos referente al ID
function mostrar(id_tipo_solicitud){
		//Mediante JQuery enviamos la opción y la variable ID
	$.post("../ajax/tipo_solicitud.php?op=mostrar",{id_tipo_solicitud : id_tipo_solicitud}, function(data, status) //La función va a obtener un valor que lo vamos almacenar en data
	{
		data = JSON.parse(data); //Convierto los datos que recibo en objeto JavaScrip	
		mostrarform(true); //Mostramos el formulario flag = true
			//Busco los objeto cuyo ID y le enviamos el nuevo objeto
		$("#tipo_solicitud").val(data.tipo_solicitud); 
		$("#tipo_solicitud").selectpicker('refresh');
		$("#descripcion").val(data.descripcion);
 		$("#id_tipo_solicitud").val(data.id_tipo_solicitud);

 	})
}

	//Función para desactivar registros referente al ID
function desactivar(id_tipo_solicitud){
		//Preguntamos si esta seguro de desactivar mediante bootbox
	bootbox.confirm("¿Está Seguro de desactivar la Categoría?", function(result){
		if(result) //En el caso de SI (result) se ejecutara la funcion
        {
        		//Mediante JQuery le enviamos la opcion y la ID
        	$.post("../ajax/tipo_solicitud.php?op=desactivar", {id_tipo_solicitud : id_tipo_solicitud}, function(e){
        		bootbox.alert(e); //Muestro los datos que estoy recibiendo en el alert (el "echo $rspta")
	            tabla.ajax.reload(); //Actualizo o recargo el Data Table
        	});	
        }
	})
}

	//Función para activar registros referente al ID
function activar(id_tipo_solicitud){
		//Preguntamos si esta seguro de activar mediante bootbox
	bootbox.confirm("¿Está Seguro de activar la Categoría?", function(result){
		if(result) //En el caso de SI (result) se ejecutara la funcion
        {		//Mediante JQuery le enviamos la opcion y la ID
        	$.post("../ajax/tipo_solicitud.php?op=activar", {id_tipo_solicitud : id_tipo_solicitud}, function(e){
        		bootbox.alert(e); //Muestro los datos que estoy recibiendo en el alert (el "echo $rspta")
	            tabla.ajax.reload(); //Actualizo o recargo el Data Table
        	});	
        }
	})
}
*/

init(); //AL finalizar el código siempre ejecute la función init()