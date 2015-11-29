< ?php

<!--//DTF
var DTF;
var Spred;


function sumar() {
    DTF = parseFloat($('#DTF').val());
    Spred = parseFloat($('#Spred').val());
    if(DTF !== 0 && Spred !== 0){
        var resultado = (DTF + Spred);
        $('#Efectivo_Anual').val(resultado.toFixed(2));
        calcularBaseEfectivo(resultado);
    }
}





// COLOR DEFINIDOS PARA LA LETRAS
AZUL= 28306D;
ROJO= DC1F14;        


<td><label form="PLAZO"><font color=" 28306D"><strong>PLAZO:</strong></font> </label></td>
                            <td>
                                <input type="radio" name="PLAZO" value="1" required><strong>1</strong> <br>
                                <input type="radio" name="PLAZO" value="2" required><strong>2</strong> <br>
                                <input type="radio" name="PLAZO" value="3" required><strong>3</strong> <br>
                                <input type="radio" name="PLAZO" value="4" required><strong>4</strong> <br>    
                                <input type="radio" name="PLAZO" value="5" required><strong>5</strong> <br>
                            </td>
                            prueba para saber si el plazo funciona con typr =radio
                            <td><input type="text"   name="PLAZO" id="PLAZO" maxlength="12" required><strong>AÑOS</strong><br></td>
                        




<td><label form="PLAZO"><font color=" 28306D"><strong>PLAZO:</strong></font> </label></td>
<select name="PLAZO">
<option value="1">1 AÑO</option>
<option value="2">2 AÑOS</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
</select>






// CALCULAR CUOTA FIJA 
$base= 1+$ip;
$exponente =$totalPeriodos;

$res=pow($base,$exponente);

$cuota_fija= ($res*$ip)/($res-1);


//calcular taza nominal
$linea3=$DTF+$SPRING;




// CALCULAR AMORTIZACION    

$amorti_linea2=$cuota_fija-$interes;
//
//        
//        
//
    } else if ($_POST["linea"] == "2") {
        $totalPeriodos = (12 / $per) * $PLAZO;
        $amortizacion = $p / $totalPeriodos;
// FORMULA DE AMORTIZACION DE LA LINEA 2,3.
        $amorti_2 = $cuota_fija - $interes;
        $fecha = date('Y-m-d');

//formula para hacer CUOTA FIJA 
        $base = 1 + $ip;
        $exponente = $totalPeriodos;
        $res = pow($base, $exponente);
        $cuota_fija = $p * ($res * $ip) / ($res - 1);
// VALIDAR SI ESTA BN   
        for ($i = 0; $i <= $totalPeriodos; $i++) {
            $fila = new stdClass();


            if ($i == 0) {
                $seguro = ($p * 0.005) * $per;
                $flujo = ($p - $seguro);

                $fila->periodo = $i;
                $fila->fecha = $fecha;
                $fila->saldo = $p;
                $fila->amortizacion = 0;
                $fila->interes = 0;
                $fila->cuota = 0;
                $fila->seguro = $seguro;
                $fila->flujo = $flujo;

                $array[] = $fila;
            } else {
//echo "interes p: $ip - $p";
                $interes = $p * $ip;
// $p = $p - $amortizacion;
                $p = $p - $amorti_2;
                $seguro = ($p * 0.005) * $per;
// esto por -1 para que de negativo
                $flujo = ($cuota_fija + $seguro) * (-1);


                $fecha = strtotime('+' . $per . ' month', strtotime($fecha));
                $fecha = date('Y-m-d', $fecha);

                $fila->periodo = $i;
                $fila->fecha = $fecha;
                $fila->saldo = $p;
                $fila->amortizacion = $amorti_2;
                $fila->interes = $interes;
                $fila->cuota = $cuota_fija;
                $fila->seguro = $seguro;
                $fila->flujo = $flujo;

                $array[] = $fila;
            }
        }

        die(json_encode($array));
    } else if ($_POST["linea"] == "3") {
        
    }











-->



        
?>
