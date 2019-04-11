//var tabla;

//Funcion que se ejecuta al inicio
function init(){
	//mostrarform(false);
	//listar();

	/*$("#formulario").on("submit",function(e){
		guardaryeditar(e);
	})
	*/

	//Cargamos los items al select Tipo solicitud
	/*$.post("../ajax/informe_social.php?op=selectTipoSolicitud",function(r){
		$("#id_tipo_solicitud").html(r);
		$('#id_tipo_solicitud').selectpicker('refresh');
	})
	*/

	limpiar();
	//Obtenemos la fecha actual

	var now = new Date();
	var day = ("0" + now.getDate()).slice(-2);
	var month = ("0" + (now.getMonth() + 1)).slice(-2);
	var today = now.getFullYear()+"-"+(month)+"-"+(day);

	var fecha = now.getDate()+'-'+(now.getMonth()+1)+'-'+now.getFullYear();

    $('#fecha_actual').val(fecha);
 
}

//Funcion limpiar
function limpiar(){

	//Solicitante
	$("#id_solicitante").val("");
	$("#cedula").val("");
	$("#nombre_apellido").val("");
	$("#sexo").val("");
	$("#direccion").val("");
	$("#telefono_1").val("");
	$("#telefono_2").val("");
	$("#email").val("");
	$("#parroquia").val("");
	$("#estado_civil").val("");
	$("#ocupacion").val("");
	$("#esterilizada").val("");
	$("#beneficio_gubernamental").val("");
	$("#num_hijos").val("");
	$("#ingreso").val("");

	//Beneficiario
	$("#id_beneficiario").val("");
	$("#cedula_b").val("");
	$("#nombre_apellido_b").val("");
	$("#parentesco").val("");
	$("#semana_embarazo").val("");
	$("#talla_zapato").val("");
	$("#talla_pantalon").val("");
	$("#talla_franela").val("");

	//Solicitud
	$("#id_solicitud").val("");
	$("#id_tipo_solicitud").val("");
	$("#medio_informacion").val("");
	$("#tipo_vivienda").val("");
	$("#tenencia").val("");
	$("#construccion").val("");
	$("#tipo_piso").val("");
	$("#observacion").val("");

	//removemos las filas de los familiares
	$(".filas").remove();

	//Obtenemos la fecha actual
	var now = new Date();
	var day = ("0" + now.getDate()).slice(-2);
	var month = ("0" + (now.getMonth() + 1)).slice(-2);
	var today = now.getFullYear()+"-"+(month)+"-"+(day);

	var fecha = now.getDate()+'-'+(now.getMonth()+1)+'-'+now.getFullYear();

	$('#fecha_nacimiento').val(fecha);
	$('#fecha_nacimiento_b').val(fecha);
    $('#fecha').val(fecha);

}

/*

//Funcion mostrar formulario
function mostrarform(flag){
	limpiar();
	if (flag) {
		$("#listadoregistros").hide();
		$("#formularioregistros").show();
		$("#btnGuardar").prop("disabled",false);
		$("#btnagregar").hide();
	}else{
		$("#listadoregistros").show();
		$("#formularioregistros").hide();
		$("#btnagregar").show();
	}
}

//Funcion para cancelar el Formulario
function cancelarform(){
	limpiar();
	mostrarform(false);
}

//funcion listar
function listar(){
	tabla = $('#tbllistado').dataTable({
		"aProcessing": true, //Activamos el procesamiento del datatables
		"aServerSide": true, //Paginacion y filtrado realizados por el servidor
		dom: 'Bfrtip', //Definimos los elementos del control de tabla
		buttons: [],
		"ajax": {
			url: '../ajax/informe_social.php?op=listar',
			type : "get",
			dataType: "json",
			error: function(e){
				console.log(e.responseText);
			}
		},
		"bDestroy": true,
		"iDisplayLength": 5, //Paginacion
		"order": [[0,"desc"]]//Ordenar (Columna,orden)
	}).DataTable();
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
}

function mostrart(id_solicitud){
	//mostrars(id_solicitante);
	//mostrarb(id_solicitud);
	mostrarform(true);
	$.post("../ajax/informe_social.php?op=mostrar",{id_solicitud : id_solicitud}, function(data, status)
	{
		data = JSON.parse(data);
		//mostrarform(true);

		//Devuelvo los datos del Solicitante
		$("#id_solicitante").val(data.id_solicitante);
		$("#cedula").val(data.cedula);
		$("#nombre_apellido").val(data.nombre_apellido);
		$("#fecha_nacimiento").val(data.fecha_nacimiento);
		$("#sexo").val(data.sexo);
		$("#sexo").selectpicker('refresh');
		$("#direccion").val(data.direccion);
		$("#telefono_1").val(data.telefono_1);
		$("#telefono_2").val(data.telefono_2);
		$("#email").val(data.email);
		$("#parroquia").val(data.parroquia);
		$("#parroquia").selectpicker('refresh');
		$("#estado_civil").val(data.estado_civil);
		$("#estado_civil").selectpicker('refresh');
		$("#ocupacion").val(data.ocupacion);
		$("#esterilizada").val(data.esterilizada);
		$("#esterilizada").selectpicker('refresh');
		$("#beneficio_gubernamental").val(data.beneficio_gubernamental);
		$("#num_hijo").val(data.num_hijo);
		$("#num_hijo").selectpicker('refresh');
		$("#ingreso").val(data.ingreso);
		
		//Devuelvo los datos del Beneficiario
		$("#id_beneficiario").val(data.id_beneficiario); 
		$("#cedula_b").val(data.cedula_b);
		$("#nombre_apellido_b").val(data.nombre_apellido_b);
		$("#fecha_nacimiento_b").val(data.fecha_nacimiento_b);
		$("#parentesco").val(data.parentesco);
		$('#parentesco').selectpicker('refresh');
		$("#semana_embarazo").val(data.semana_embarazo);
		$('#semana_embarazo').selectpicker('refresh');
		$("#talla_zapato").val(data.talla_zapato);
		$('#talla_zapato').selectpicker('refresh');
		$("#talla_pantalon").val(data.talla_pantalon);
		$('#talla_pantalon').selectpicker('refresh');
		$("#talla_franela").val(data.talla_franela);
		$('#talla_franela').selectpicker('refresh');
		
	})
}

function mostrars(id_solicitud){
	//mostrars(id_solicitante);
	//mostrarb(id_solicitud);
	$.post("../ajax/informe_social.php?op=mostrar",{id_solicitud : id_solicitud}, function(data, status)
	{
		data = JSON.parse(data);
		mostrarform(true);

		//Devuelvo los datos del Solicitante
		$("#id_solicitante").val(data.id_solicitante);
		$("#cedula").val(data.cedula);
		$("#nombre_apellido").val(data.nombre_apellido);
		$("#fecha_nacimiento").val(data.fecha_nacimiento);
		$("#sexo").val(data.sexo);
		$("#sexo").selectpicker('refresh');
		$("#direccion").val(data.direccion);
		$("#telefono_1").val(data.telefono_1);
		$("#telefono_2").val(data.telefono_2);
		$("#email").val(data.email);
		$("#parroquia").val(data.parroquia);
		$("#parroquia").selectpicker('refresh');
		$("#estado_civil").val(data.estado_civil);
		$("#estado_civil").selectpicker('refresh');
		$("#ocupacion").val(data.ocupacion);
		$("#esterilizada").val(data.esterilizada);
		$("#esterilizada").selectpicker('refresh');
		$("#beneficio_gubernamental").val(data.beneficio_gubernamental);
		$("#num_hijo").val(data.num_hijo);
		$("#num_hijo").selectpicker('refresh');
		$("#ingreso").val(data.ingreso);
		
	})
}


function mostrarb(id_solicitud){
	//mostrars(id_solicitante);
	//mostrarb(id_solicitud);
	$.post("../ajax/informe_social.php?op=mostrar",{id_solicitud : id_solicitud}, function(data, status)
	{
		data = JSON.parse(data);
		mostrarform(true);
		
		//Devuelvo los datos del Beneficiario
		$("#id_beneficiario").val(data.id_beneficiario);
		$("#cedula_b").val(data.cedula_p);
		$("#nombre_apellido_b").val(data.nombre_apellido_p);
		$("#fecha_nacimiento_b").val(data.fecha_nacimiento_p);
		$("#parentesco").val(data.parentesco);
		$('#parentesco').selectpicker('refresh');
		$("#semana_embarazo").val(data.semana_embarazo);
		$('#semana_embarazo').selectpicker('refresh');
		$("#talla_zapato").val(data.talla_zapato);
		$('#talla_zapato').selectpicker('refresh');
		$("#talla_pantalon").val(data.talla_pantalon);
		$('#talla_pantalon').selectpicker('refresh');
		$("#talla_franela").val(data.talla_franela);
		$('#talla_franela').selectpicker('refresh');
		
	})
}


//Función para desactivar registros
function aceptar(id_solicitud)
{
	bootbox.confirm("¿Está Seguro en Aceptar la solicitud?", function(result){
		if(result)
        {
        	$.post("../ajax/informe_social.php?op=aceptar", {id_solicitud : id_solicitud}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}
*/
var cont=0;
var detalles=0;

function agregarDetalle()
  {
    	var fila='<tr class="filas" id="fila'+cont+'">'+
    	'<td><button type="button" class="btn btn-danger" onclick="eliminarDetalle('+cont+')">X</button></td>'+
    	'<td><input class="form-control" type="text" name="nombre_apellido_f[]" id="nombre_apellido_f[]" placeholder="Nombre y Apellido" maxlength="30"></td>'+
    	'<td><input class="form-control" type="Date" name="fecha_nacimiento_f[]" id="fecha_nacimiento_f[]"></td>'+
    	'<td><input class="form-control" type="text" name="parentesco_f[]" id="parentesco_f[]" placeholder="Parentesco" maxlength="10"></td>'+
    	'<td><input class="form-control" type="text" name="ocupacion_f[]" id="ocupacion_f[]" placeholder="A que se dedica" maxlength="50"></td>'+
    	'<td><input class="form-control" type="text" name="ingreso_f[]" id="ingreso_f[]" placeholder="Ingreso Monetario" maxlength="7"></td>'+
    	'<td><input class="form-control" type="text" name="peso_f[]" id="peso_f[]" placeholder="Peso Kg" maxlength="6"></td>'+
    	'<td><input class="form-control" type="text" name="talla_f[]" id="talla_f[]" placeholder="Medida de Altura" maxlength="3"></td>'+
    	'<td><input type="hidden" name="id_familiar[]" id="id_familiar[] value="'+cont+'"></td>'+
    	'</tr>';
    	cont++;
    	detalles++;
    	$('#detalles').append(fila);
  }

function eliminarDetalle(indice){
  	$("#fila" + indice).remove();
  	detalles=detalles-1;
  }

//init();

