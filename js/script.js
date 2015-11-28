var efectiva;
var interesPeriodico;
var periodos;
var nominal;
var dias;
var dtf;
var spread;

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
			html: "<td>"+val.periodo+"</td><td>"+val.fecha+"</td><td>"+val.saldo.toFixed(2)+"</td><td>"+val.amortizacion.toFixed(2)+"</td><td>"+val.interes.toFixed(2)+"</td><td>"+val.cuota.toFixed(2)+"</td><td>"+val.seguro.toFixed(2)+"</td><td>"+val.flujo.toFixed(2)+"</td>",
			}).appendTo('#resultados');
		});
	});
}
function sumar() {
    dtf = parseFloat ($('#dtf').val());
    spread = parseFloat($('#spread').val());
    if(dtf!== 0 && spread!== 0){
        var resultado = (dtf + spread);
        $('#ea').val(resultado.toFixed(2));
        calcularBaseEfectivo(resultado);
    }
}

$('#btn-aceptar').click(function(){
	obtenerDatos();
});