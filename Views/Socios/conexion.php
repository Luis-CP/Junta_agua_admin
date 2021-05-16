<?php
$hostname_db = "localhost";
$database_db = "pago_agua";
$username_db = "root";
$password_db = "";
//Conectar a la base de datos
$conexion = mysqli_connect($hostname_db, $username_db, $password_db);
//Seleccionar la base de datos
$conexion->set_charset("utf8");
mysqli_select_db($conexion,$database_db) or die ("Ninguna DB seleccionada");
?>