<?php

if (isset($_POST["aceptar"])) {

    $array = array();

    $NOMBRE = $_POST["NOMBRE"];
    $APELLIDO = $_POST["APELLIDO"];
    $cc = $_POST["CC"];
    $p = floatval($_POST["PRESTAMO"]);
    $PLAZO = floatval($_POST["PLAZO"]);
    $periodo = $_POST["periodo"];
    $tn = floatval($_POST["tn"]);
    $ea = floatval($_POST["ea"]);
    $ip = floatval($_POST["ip"]) / 100;
    $per;

    switch ($periodo) {
        case 'MENSUAL':
            $per = 1;
            break;
        case 'BIMESTRAL':
            $per = 2;
            break;
        case 'TRIMESTRAL':
            $per = 3;
            break;
    }

    if ($_POST["linea"] == "1") {

        $totalPeriodos = (12 / $per) * $PLAZO;
        $amortizacion = $p / $totalPeriodos;

        $fecha = date('Y-m-d');
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
                $interes = $p * $ip;
                //echo "interes p: $ip - $p";
                $p = $p - $amortizacion;
                $seguro = ($p * 0.005) * $per;
                $flujo = (($amortizacion + $interes) + $seguro) * (-1);

                
                $fecha = strtotime('+'.$per.' month', strtotime($fecha));
                $fecha = date('Y-m-d', $fecha);

                $fila->periodo = $i;
                $fila->fecha = $fecha;
                $fila->saldo = $p;
                $fila->amortizacion = $amortizacion;
                $fila->interes = $interes;
                $fila->cuota = 0;
                $fila->seguro = $seguro;
                $fila->flujo = $flujo;

                $array[] = $fila;
            }
        }

        die(json_encode($array));
    } else if ($_POST["linea"] == "2") {
        
    } else if ($_POST["linea"] == "3") {
        
    }
}
