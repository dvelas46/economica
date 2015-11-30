<?php
//include('php/operaciones.php'); 
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Banco el Consuelo S.A.</title>
        <link href="css/style.css" rel="stylesheet" type="text/css">
        <script src="js/jquery.js" type="text/javascript"></script>
        <script src="js/format.js" type="text/javascript"></script>
    </head>

    <body>

        <div class="container">
            <div class="content"  style="background-image:
          url('./IMAGENES/BEC1.jpg'); background-size:100% auto">

                <table width="400" border='2' align="center" class="table-form">
                    <tr>
                        <td colspan="2">
                            <span class="post-title Estilo5"> <center> 
                                    <strong><font color="DC1F14">BANCO EL CONSUELO S.A</strong></font>
                                </center></span>
                        </td> 
                    </tr>
                    <form id="formulario">
                        <tr>
                            <td><label form="NOMBRE"> <font color="28306D"><strong>NOMBRE:</strong></font> </label></td>
                            <td><input type="text"  name="NOMBRE" id="NOMBRE" maxlength="12" required></td>
                        </tr>
                        <tr>
                            <td><label form="APELLIDO"><font color="28306D"> <strong>APELLIDO:</strong></font></label></td>
                            <td><input type="text"  name="APELLIDO" id="APELLIDO" maxlength="12" required></td>
                        </tr>
                        <tr>
                            <td><label form="cc"><font color="28306D"><strong>CEDULA:</strong></font></label></td>
                            <td><input type="text" name="CC" id="cc" maxlength="12" required></td>
                        </tr>
                        <tr>
                            <td><label form="p"><font color="28306D"><strong>VALOR PRESTAMO:$</strong></font></label></td>
                            <td><input type="text"   name="PRESTAMO" id="p" maxlength="12" required></td>
                        </tr>
                        <tr>
                            <td><label form="PLAZO"><font color="28306D"><strong>PLAZO:</strong></font> </label></td>
                          
                            <td><input type="text"   name="PLAZO" id="PLAZO" maxlength="12" required><strong><font color="28306D">AÑOS</font></strong><br></td>
                        </tr>
                        <tr>
                            <td><strong><font color="28306D">AMORTIZACION</font></strong></td>
                            <td>
                                <input type="radio" name="periodo" value="MENSUAL" required><strong><font color="28306D">MENSUAL</strong></font> <br>
                                <input type="radio" name="periodo" value="BIMESTRAL" required><strong><font color="28306D">BIMESTRAL</strong></font> <br>
                                <input type="radio" name="periodo" value="TRIMESTRAL" required><strong><font color="28306D">TRIMESTRAL</font></strong> <br>
                            </td>
                        </tr>
                        <tr>
                            <td><label form="tn"><strong><font color="28306D">TASA NOMINAL:</font></strong></label></td>
                            <td><input type="text"  name="tn" id="tn" onKeyUp="calcularBaseNominal(this.value)" required><strong><font color="28306D">%</strong></font><br></td>
                        </tr>
                        <tr>
                            <td><label form="ea"><strong><font color="28306D">EFECTIVO ANUAL:</font></strong></label></td>
                            <td><input type="text"  name="ea" id="ea" onKeyUp="calcularBaseEfectivo(this.value)" required><strong><font color="28306D">%</strong></font><br></td>
                        </tr>
                        <tr>
                            <td><label form="ip"><strong><font color="28306D">INTERES PERIODICO:</font></strong></label></td>
                            <td><input type="text"  name="ip" id="ip" onKeyUp="calcularBasePeriodico(this.value)" required><strong><font color="28306D">%</strong></font><br></td>
                        </tr>
                        <tr>
                            <td><label for="dtf"><strong><font color="28306D">DTF</font></strong></label></td>
                            <td><input type="text" name="dtf"  id="dtf" onKeyUp="sumar(this.value)"  required></td>
                        </tr>
                        <tr>
                            <td><label for="spread"><strong><font color="28306D">SPREAD</font></strong></label></td>
                            <td><input type="text"  name="spread" id="spread" onKeyUp="sumar(this.value)"  required ></td>
                        </tr>        
                        <tr>
                            <td><strong><font color="28306D">LINEA</font></strong></font></td>
                            <td>
                                <input type="radio" name="linea" value="1" required><strong><font color="28306D">LINEA 1</font></strong> <br>
                                <input type="radio" name="linea" value="2" required><strong><font color="28306D">LINEA 2</font></strong> <br>
                                <input type="radio" name="linea" value="3" required><strong><font color="28306D">LINEA 3</font></strong> <br>
                            </td>
                        </tr>  
                        <tr>
                            <td colspan="2">
                                <button type="button" id="btn-aceptar" class="btn" name="aceptar"><font color="DC1F14"><strong>ACEPTAR</strong></font></button>
                            </td>
                        </tr>      
                    </form>

                </table>                        

            </div>    <!-- end .content -->

            <div class="content">
                 
                <table border class="tabla-resultados">
                    <thead>
                        <tr>
                            <th><strong><font color="DC1F14">PERIODO</font></strong></th>
                            <th><strong><font color="DC1F14">FECHA</font></strong></th>
                            <th><strong><font color="DC1F14">SALDO</font></strong></th>
                            <th><strong><font color="DC1F14">AMORTIZACION</font></strong></th>
                            <th><strong><font color="DC1F14">INTERESES</font></strong></th>
                            <th><strong><font color="DC1F14">CUOTA FIJA</font></strong></th>
                            <th><strong><font color="DC1F14">SEGURO</font></strong></th>
                            <th><strong><font color="DC1F14">FLUJO DE CAJA</font></strong></th>
                        </tr>
                    </thead>
                    <tbody id="resultados"></tbody>
                </table> 
            </div>
            
            <div>
                <center><button class="imprimir" name="button" id="button" onclick="imprimir()">Imprimir</button></cennter>
            </div>

        </div>  <!-- end .container -->

        <script src="js/script.js" type="text/javascript"></script>
    </body>
</html>