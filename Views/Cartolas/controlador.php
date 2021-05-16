<?php
include 'conection.php';

$monto = $_POST['monto'];
$mes = $_POST['mes'];
$id = $_POST['id'];
$anio = $_POST['anio'];
$numMedidor = $_POST['numMedidor'];


$validarCarola = "SELECT mes, anio FROM cartola WHERE mes='$mes' AND anio = $anio";
$result = mysqli_query($concection, $validarCarola);

$count = mysqli_num_rows($result);

if ($count == 0) {

	if ($_POST['monto'] && $_POST['mes'] && $_POST['id'] && $_POST['anio']) {

		$query =	"INSERT INTO cartola (idMedidor, numero, direccion, socio, mes, anio)
					select id_medidor, numero_medidor, direccion_medidor,id_socio,'$mes',$anio as mes from medidor";
		mysqli_query($concection, $query);


		for ($i = 0; $i < sizeof($monto); $i++) {
			$upQquery =	"UPDATE cartola SET costo =$monto[$i] WHERE mes = '$mes' AND  socio = $id[$i] AND anio=$anio AND numero=$numMedidor[$i]";
			mysqli_query($concection, $upQquery);
		}

		header("Location:../Pagos/lista.php");
	}
}else{
	echo "<script type='text/javascript'>alert('El mes ya se habia ingresado');</script>";
	
}

header("Location:../Pagos/lista.php");