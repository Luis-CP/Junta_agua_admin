<?php

if(!empty($_POST['check']) && !empty($_POST['id']) && !empty($_POST['anio']) && !empty($_POST['checkVal']) && !empty($_POST['idMedidor']) && !empty($_POST['numero'])) {

		$check = $_POST['check'];
		$id = $_POST['id'];
		$anio = $_POST['anio'];
		$checkVal = $_POST['checkVal'];
		$idMedidor = $_POST['idMedidor'];
		$numero = $_POST['numero'];
		$socio=$id;
		include 'conection.php';
		date_default_timezone_set('America/Guayaquil');
		$zonahoraria = date_default_timezone_get();
		
		$hora = date("H:i:s");
		$insertPago = "INSERT INTO pago(fecha_pago, id_socio, hora_pago) VALUES (CURRENT_DATE,$socio,'$hora')";
		mysqli_query($connection,$insertPago);

		$lastId = "SELECT id_pago FROM pago ORDER by id_pago DESC LIMIT 1";
		$last = mysqli_query($connection,$lastId);

		while($res= mysqli_fetch_array($last) ){
			$varLast = $res['id_pago'];
		}

		for ($i = 0; $i < sizeof($check); $i++) {
			$upQquery =	"UPDATE cartola SET estado = 1 WHERE mes = '$check[$i]' AND  socio = $id AND anio = $anio AND numero=$numero";
			mysqli_query($connection, $upQquery);

			$lastCar = "SELECT id, mes, socio, anio FROM cartola WHERE mes = '$check[$i]' AND  socio = $id AND anio = $anio AND numero=$numero ORDER by id DESC LIMIT 1";
			$lastC = mysqli_query($connection,$lastCar);

			while($res= mysqli_fetch_array($lastC) ){
				$varCart = $res['id'];
			}

			$insertDetallePago = "INSERT INTO detalle_pago(fecha_detalle, consumo_detalle, estado_detalle, id_medidor, id_pago, id_cartola) VALUES (CURRENT_DATE,$checkVal[$i],1,$idMedidor,$varLast,$varCart)";
			mysqli_query($connection,$insertDetallePago);
		}
	}
        header("Location:lista.php");	

?>