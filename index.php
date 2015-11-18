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
</head>

<body>

<div class="container">
  <div class="content">
    
    <table width="400" border='2' align="center" class="table-form">
    	<tr>
            <td colspan="2">
            	<span class="post-title Estilo5"> <center> 
            	  <strong>BANCO EL CONSUELO S.A</strong>
           	  </center></span>
            </td> 
        </tr>
		<form id="formulario">
        <tr>
        	<td><label form="NOMBRE"> <strong>NOMBRE:</strong> </label></td>
            <td><input type="text"  name="NOMBRE" id="NOMBRE" maxlength="12" required></td>
        </tr>
        <tr>
        	<td><label form="APELLIDO"> <strong>APELLIDO:</strong></label></td>
            <td><input type="text"  name="APELLIDO" id="APELLIDO" maxlength="12" required></td>
        </tr>
        <tr>
        	<td><label form="cc"><strong>CEDULA:</strong></label></td>
            <td><input type="text" name="CC" id="cc" maxlength="12" required></td>
        </tr>
        <tr>
        	<td><label form="p"><strong>VALOR PRESTAMO: $</strong></label></td>
            <td><input type="text"   name="PRESTAMO" id="p" maxlength="12" required></td>
        </tr>
        <tr>
        	<td><label form="PLAZO"><strong>PLAZO:</strong> </label></td>
            <td><input type="text"   name="PLAZO" id="PLAZO" maxlength="12" required><strong>AÑO</strong><br></td>
        </tr>
        <tr>
        	<td><strong>AMORTIZACION</strong></td>
            <td>
            	<input type="radio" name="periodo" value="MENSUAL" required><strong>MENSUAL</strong> <br>
                <input type="radio" name="periodo" value="BIMESTRAL" required><strong>BIMESTRAL</strong> <br>
                <input type="radio" name="periodo" value="TRIMESTRAL" required><strong>TRIMESTRAL</strong> <br>
            </td>
        </tr>
        <tr>
        	<td><label form="tn"><strong>TASA NOMINAL:</strong></label></td>
            <td><input type="text"  name="tn" id="tn" onKeyUp="calcularBaseNominal(this.value)" required>%<br></td>
        </tr>
        <tr>
        	<td><label form="ea"><strong>EFECTIVO ANUAL:</strong></label></td>
            <td><input type="text"  name="ea" id="ea" onKeyUp="calcularBaseEfectivo(this.value)" required>%<br></td>
        </tr>
        <tr>
        	<td><label form="ip"><strong>INTERES PERIODICO:</strong></label></td>
            <td><input type="text"  name="ip" id="ip" onKeyUp="calcularBasePeriodico(this.value)" required>%<br></td>
        </tr>
        <tr>
        	<td><label for="dtf"><strong>DTF</strong></label></td>
           	<td><input type="text" id="dtf" class="" name="dtf"></td>
        </tr>
        <tr>
        	<td><label for="spread"><strong>SPREAD</strong></label></td>
           	<td><input type="text" id="spread" class="" name="spread"></td>
        </tr>        
        <tr>
        	<td><strong>LINEA</strong></td>
            <td>
            	<input type="radio" name="linea" value="1" required><strong>LINEA 1</strong> <br>
                <input type="radio" name="linea" value="2" required><strong>LINEA 2</strong> <br>
                <input type="radio" name="linea" value="3" required><strong>LINEA 3</strong> <br>
            </td>
        </tr>  
        <tr>
        	<td colspan="2">
            	<button type="button" id="btn-aceptar" class="btn" name="aceptar">ACEPTAR</button>
            </td>
        </tr>      
        </form>
        
   </table>                        
    
 </div>    <!-- end .content -->
 
 <div class="content">
 		<table border class="tabla-resultados">
        	<thead>
            	<tr>
                	<th>PERIODO</th>
                  	<th>FECHA</th>
                   	<th>SALDO</th>
                   	<th>AMORTIZACION</th>
                    <th>INTERESES</th>
                  	<th>CUOTA FIJA</th>
                   	<th>SEGURO</th>
                   	<th>FLUJO DE CAJA</th>
                </tr>
            </thead>
            <tbody id="resultados"></tbody>
        </table> 
 </div>
 
</div>  <!-- end .container -->

<script src="js/script.js" type="text/javascript"></script>
</body>
</html>