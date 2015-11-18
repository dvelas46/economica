var efectiva;
var interesPeriodico;
var periodos;
var nominal;
var dias;


$('input[name="periodo"]').click(function(){
	switch($(this).val()){
		case 'MENSUAL':
			periodos = 12/1;
			dias = 30*1;
		break;
		case 'BIMESTRAL':
			periodos = 12/2;
			dias = 30*2;
		break;
		case 'TRIMESTRAL':
			periodos = 12/3;
			dias = 30*3;
		break;
	}
});

function calcularBaseNominal(valor){
	interesPeriodico = ((parseFloat(valor)/100)/periodos);
	efectiva = (1+interesPeriodico);
	efectiva = Math.pow(efectiva,(360/dias));
	efectiva = efectiva-1;
	efectiva = efectiva*100;
	$('#ea').val(efectiva.toFixed(2));
	$('#ip').val(interesPeriodico*100);
}

function calcularBaseEfectivo(valor){
	nominal = (1+(parseFloat(valor)/100));
	nominal = Math.pow(nominal,(dias/360));
	nominal = nominal-1;
	nominal = nominal * periodos;
	nominal = nominal * 100;
	interesPeriodico = ((nominal/100)/periodos);
	$('#tn').val(nominal.toFixed(2));
	$('#ip').val((interesPeriodico*100).toFixed(2));
}


function calcularBasePeriodico(valor){
	interesPeriodico = parseFloat(valor)/100;
	efectiva = (1+interesPeriodico);
	efectiva = Math.pow(efectiva,(360/dias));
	efectiva = efectiva - 1;
	efectiva = efectiva * 100;
	$('#ea').val(efectiva.toFixed(2));
	nominal = (1+(parseFloat(efectiva)/100));
	nominal = Math.pow(nominal,(dias/360));
	nominal = nominal-1;
	nominal = nominal*periodos;
	nominal = nominal*100;
	$('#tn').val(nominal.toFixed(2));
}


function obtenerDatos(){
	var datosFormularios = $('#formulario').serializeArray();
	var datos = {};
	datos.aceptar = 1;
	$.each(datosFormularios, function(i, obj){
		datos[obj.name] = obj.value;
	});		
//	console.log(datos);
	enviarDatos(datos);
}


function enviarDatos(datos){
	$.ajax({
		url:'php/operaciones.php',
		type:'post',
		data:datos,
	}).success(function(resp){
		$('#resultados').html('');
		var resultados = JSON.parse(resp);
		$.each(resultados, function(i, val){
			$('<tr/>',{
			html: "<td>"+val.periodo+"</td><td>"+val.fecha+"</td><td>"+val.saldo+"</td><td>"+val.amortizacion+"</td><td>"+val.interes+"</td><td>"+val.cuota+"</td><td>"+val.seguro+"</td><td>"+val.flujo+"</td>",
			}).appendTo('#resultados');
		});
	});
}


$('#btn-aceptar').click(function(){
	obtenerDatos();
});