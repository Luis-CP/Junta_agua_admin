<?php
session_start();
if (!$_SESSION['verificar']) {
    header("Location: ../../index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Proyecto</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
    <link href="../../Static/toastr/build/toastr.min.css" rel="stylesheet">
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
</head>
<body>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="#" style="font-family: cursive;"><span>Siste</span>ma</a>
				<ul class="nav navbar-top-links navbar-right">
				</ul>
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<img src="../../Static/img/1.png" style="width: 100%;height: 100px;">
		<div class="profile-sidebar">
			<div class="profile-usertitle">
				<div class="profile-usertitle-name" style="font-family: cursive;">Administrador</div>
				<div class="profile-usertitle-status" style="font-family: cursive;"><span class="indicator label-success"></span>Sistema</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		<ul class="nav menu">
			<li><a href="../Administrador/lista.php"><em class="fa fa-suitcase">&nbsp;</em> Administrador</a></li>
			<li><a href="../Socios/lista.php"><em class="fa fa-users">&nbsp;</em> Socios </a></li>
			<li class="active"><a href="lista.php"><em class="fa fa-clone">&nbsp;</em> Medidores </a></li>
			<li><a href="../Cartolas/crear.php"><em class="fa fa-book">&nbsp;</em> Cartolas </a></li>
			<li><a href="../Pagos/lista.php"><em class="fa fa-bookmark">&nbsp;</em> Pagos </a></li>
			<li class=""><a href="../Pagos/reportes.php"><em class="fa fa-bookmark">&nbsp;</em> Reportes </a></li>
			<li><a href="../../System/conexion/logout.php"><em class="fa fa-power-off">&nbsp;</em> Salir </a></li>
		</ul>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			
			<div class="col-md-12">
				<div class="panel panel-default ">
					