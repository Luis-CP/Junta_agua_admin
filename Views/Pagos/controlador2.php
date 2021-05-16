<?php
    include 'conexion.php';

       $sentencia="DELETE  FROM detalle_pago WHERE id_pago=".$_POST['id_pago']."";
       mysql_query($sentencia) or die (mysql_error());
       $detail = $_POST["item"];
       $socio = $_POST["socio"];
       $fecha= $_POST['fecha'];
       $sentencia="UPDATE pago SET fecha_pago='".$fecha."',id_socio='".$socio."' where id_pago='".$_POST['id_pago']."'";
		mysql_query($sentencia) or die (mysql_error());
       for ($i = 0; $i < sizeof($detail['fecha']); $i++) {
           NuevoFactura($detail['fecha'][$i], $detail['consumo'][$i], $detail['medidor'][$i],$_POST['id_pago']);
       }	
	   header("Location:lista.php");

     function NuevoFactura($fe,$con,$me,$pa)
  {
    $sentencia="INSERT INTO detalle_pago(fecha_detalle,consumo_detalle,id_medidor,id_pago) VALUES ('".$fe."', '".$con."', '".$me."', '".$pa."')";
    mysql_query($sentencia) or die (mysql_error());
  }
?>