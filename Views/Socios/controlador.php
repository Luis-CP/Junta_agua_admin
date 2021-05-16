<?php
    include "conexion.php";   

    if($_POST['ver']=="crear"){ 
    	$ce=$_POST['cedula'];
    	$c_cedula="SELECT * FROM socio WHERE cedula_socio = '$ce'";
    	$c=mysql_query($c_cedula);
    	if (mysql_num_rows($c) > 0) {
    		echo"<script>alert('LA CÉDULA DEL USUARIO YA EXISTE, INTENTE NUEVAMENTE CON OTRO NÚMERO'); window.location='lista.php';</script>"; 
    	} else {
			$sentencia="INSERT INTO socio (nombre_socio,apellido_socio,cedula_socio,direccion_socio) VALUES ('".$_POST['nombre']."', '".$_POST['apellido']."', '".$_POST['cedula']."','".$_POST['direccion']."')";
			if(mysql_query($sentencia)){
				header("Location:lista.php?state=create");
			}
		}
	}
	if($_POST['ver']=="modificar"){
		$sentencia="UPDATE socio SET  nombre_socio='".$_POST['nombre']."', apellido_socio='".$_POST['apellido']."', cedula_socio='".$_POST['cedula']."',direccion_socio='".$_POST['direccion']."' WHERE id_socio='".$_POST['id']."'";
		if(mysql_query($sentencia)){
			header("Location:lista.php?state=update");
		}
	}
	if(isset($_GET["eliminar"])){	
	    $sentencia="DELETE  FROM socio WHERE id_socio=".$_GET['id']."";
		if(mysql_query($sentencia)){
			header("Location:lista.php");	
		}	
	}
?>