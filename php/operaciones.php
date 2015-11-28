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

//    function val_PLAZO($var_PLAZO) {
//        if ($PLAZO !="" &&  is_numeric($PLAZO) ) {
//            if ($PLAZO > 1 && $PLAZO <=5 )
//                return true;
////'plazo' $PLAZO;
//            else
////echo “plazo fuera de rango”;
//                return false;
//        }
//        else

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


                    $fecha = strtotime('+' . $per . ' month', strtotime($fecha));
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

            // aqui termina la linea 1 
            //        
//
        } else if ($_POST["linea"] == "2") {
            $totalPeriodos = (12 / $per) * $PLAZO;
            $amortizacion = $p / $totalPeriodos;
            $fecha = date('Y-m-d');

//formula para hacer CUOTA FIJA 
            $base = 1 + $ip;
            $exponente = $totalPeriodos;
            $res = pow($base, $exponente);
            $cuota_fija = $p * (($res * $ip) / ($res - 1));
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

                    $interes = $p * $ip;
// FORMULA DE AMORTIZACION DE LA LINEA 2,3.
                    $amortizacion = $cuota_fija - $interes;
//echo "interes p: $ip - $p";
// $p = $p - $amortizacion;
                    $p = $p - $amortizacion;
                    $seguro = ($p * 0.005) * $per;
// esto por -1 para que de negativo
                    $flujo = ($cuota_fija + $seguro) * (-1);

// suma fecha 
                    $fecha = strtotime('+' . $per . ' month', strtotime($fecha));
                    $fecha = date('Y-m-d', $fecha);

                    $fila->periodo = $i;
                    $fila->fecha = $fecha;
                    $fila->saldo = $p;
                    $fila->amortizacion = $amortizacion;
                    $fila->interes = $interes;
                    $fila->cuota = $cuota_fija;
                    $fila->seguro = $seguro;
                    $fila->flujo = $flujo;

                    $array[] = $fila;
                }
            }

            die(json_encode($array));
        } else if ($_POST["linea"] == "3") {
            $totalPeriodos = (12 / $per) * $PLAZO;
            $amortizacion = $p / $totalPeriodos;
            $fecha = date('Y-m-d');

//formula para hacer CUOTA FIJA 
            $base = 1 + $ip;
            $exponente = $totalPeriodos;
            $res = pow($base, $exponente);
            $cuota_fija = $p * (($res * $ip) / ($res - 1));
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

                    $interes = $p * $ip;
// FORMULA DE AMORTIZACION DE LA LINEA 2,3.
                    $amortizacion = $cuota_fija - $interes;
//echo "interes p: $ip - $p";
// $p = $p - $amortizacion;
                    $p = $p - $amortizacion;
                    $seguro = ($p * 0.005) * $per;
// esto por -1 para que de negativo
                    $flujo = ($cuota_fija + $seguro) * (-1);

// suma fecha 
                    $fecha = strtotime('+' . $per . ' month', strtotime($fecha));
                    $fecha = date('Y-m-d', $fecha);

                    $fila->periodo = $i;
                    $fila->fecha = $fecha;
                    $fila->saldo = $p;
                    $fila->amortizacion = $amortizacion;
                    $fila->interes = $interes;
                    $fila->cuota = $cuota_fija;
                    $fila->seguro = $seguro;
                    $fila->flujo = $flujo;

                    $array[] = $fila;
                }
            }

            die(json_encode($array));
        }
    }
    