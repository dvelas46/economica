<?php

// CALCULAR CUOTA FIJA 
$base= 1+$ip;
$exponente =$totalPeriodos;

$res=pow($base,$exponente);

$cuota_fija= ($res*$ip)/($res-1);


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















        
?>
