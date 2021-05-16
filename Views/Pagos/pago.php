<?php
	include 'conexion.php';

	if(isset($_GET['consumo'])&&isset($_GET['detalle'])){ 
		$sql = "SELECT * FROM detalle_pago where id_detalle='".$_GET['detalle']."'";
		    $query = mysql_query($sql);
		    while($row=mysql_fetch_array($query))
		      {
		      	$sentencia="UPDATE detalle_pago SET fecha_detalle='".$row['fecha_detalle']."',consumo_detalle='".$_GET['consumo']."',id_medidor='".$row['id_medidor']."',id_pago='".$row['id_pago']."' WHERE id_detalle='".$_GET['detalle']."'";
				mysql_query($sentencia) or die (mysql_error());
		      }
		header('Location:lista.php');
	}
?>