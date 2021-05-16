<?php
include '../conexion.php';

$sql = "SELECT * FROM detalle_pago,pago,socio,medidor where id_detalle='".$_GET['id']."'";
$query = mysql_query($sql);
while ($row=mysql_fetch_array($query))
{
	$fecha = split('-', $row['fecha_detalle']);
	require_once("../dompdf/dompdf_config.inc.php");	
	$codigoHTML='
	<!DOCTYPE html>
	<html>
	<head>
	<title>Planilla</title>
	</head>
	<body>
	<h3>JUNTA ADMINISTRADORA DE AGUA POTABLE DE TANDACATO</h3>
	<h4>COMPROBANTE DE PAGO</h4>
	<table>
		<tr><td colspan="8">Senor (a): '.$row['nombre_socio'].''.$row['apellido_socio'].'</td><td colspan="3">Mes: '.$fecha[1].'</td><td>BARRIO </td></tr>
		<tr><td colspan="8">Fecha de Pago: </td><td colspan="3">Anio: '.$fecha[0].'</td><td>TANDACATO</td></tr>
	</table>
	<table border="1">
		<thead>
			<tr><td colspan="2">LECTURAS</td><td colspan="11">CONSUMO EN METROS CUBICOS</td></tr>
			<tr>
				<td>L. ANT</td>
				<td>L. ACT</td>
				<td>M3.COM</td>
				<td>1OM3</td>
				<td>E.10-20M</td>
				<td>0.18</td>
				<td>E.T</td>
				<td>E.20-30M</td>
				<td>0.24</td>
				<td>E.T</td>
				<td>E.30..?</td>
				<td>0.30</td>
				<td>E.T</td>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>0</td>
				<td>1</td>
				<td>'.$row['consumo_detalle'].'</td>
				<td>1.25</td>
				<td>0</td>
				<td>0.18</td>
				<td>0</td>
				<td>0</td>
				<td>0.24</td>
				<td>0</td>
				<td>0</td>
				<td>0.30</td>
				<td>0</td>
			</tr>
			<tr>
				<td colspan="13">
				<div>
					<h5>MONTO A COBRAR 0.00</h5>
					<h5>BASICO 10M3    0.00</h5>
					<h5>EX.10-20M3     0.00</h5>
					<h5>EX.20-30M3     0.00</h5>
					<h5>EX.30M3...?    0.00</h5>
					<h5>MINGAS         0.00</h5>
					<h5>SESIONES       0.00</h5>
					<h5>TOTAL A PAGAR  0.00</h5>
				</div>	
				</td>
			</tr>
		</tbody>
	</table>
	</center>
	</body>
	</html>';
	$codigoHTML=utf8_encode($codigoHTML);
	$dompdf=new DOMPDF();
	$dompdf->load_html($codigoHTML);
	ini_set("memory_limit","128M");
	$dompdf->render();
	$dompdf->stream("Planilla.pdf");
    header("Location: ../lista.php");
}