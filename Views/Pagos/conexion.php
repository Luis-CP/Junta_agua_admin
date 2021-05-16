<?php

  $conexion = mysql_connect("localhost","root","");
  mysql_select_db("pago_agua",$conexion);
  
  mysql_query("SET NAMES 'utf8'");

?>