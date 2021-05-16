<?php
	include 'conexion.php';

	if($_POST['ver']=="crear"){ 
       $detail = $_POST["item"];
       $socio = $_POST["socio"];
       $fecha= date("Y-m-d");
	   $sentencia="INSERT INTO pago (fecha_pago,id_socio) VALUES ('".$fecha."', '".$socio."')";
		mysql_query($sentencia) or die (mysql_error());
		$id_pago = mysql_insert_id();
       for ($i = 0; $i < sizeof($detail['fecha']); $i++) {
           NuevoFactura($detail['fecha'][$i], $detail['consumo'][$i], $detail['medidor'][$i],$id_pago);	
       }	
	header("Location:lista.php");	
	}
	if($_GET['ver']=="eliminar"){
		$sentencia="DELETE  FROM cartola WHERE id=".$_GET['id']."";
		mysql_query($sentencia) or die (mysql_error());	
	header("Location:lista.php");	
	}

	function NuevoFactura($fe,$con,$me,$pa)
	{
		$sentencia="INSERT INTO detalle_pago(fecha_detalle,consumo_detalle,id_medidor,id_pago) VALUES ('".$fe."', '".$con."', '".$me."', '".$pa."')";
		mysql_query($sentencia) or die (mysql_error());
	}
?>