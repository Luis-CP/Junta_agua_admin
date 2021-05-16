<?php
	$mysqli= new mysqli("localhost", "root", "", "pago_agua");
	if(mysqli_connect_errno()){
		echo "<p>Este sitio esta presentando problemas</p>";
	}
	$mysqli->set_charset("utf8");
