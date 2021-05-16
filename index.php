<?php
	if(isset($_POST['email']) && isset($_POST['password'])){
	   	require_once "System/conexion/connect.php";
	   	$email=$_POST['email'];
		$clave=$_POST['password'];
		$query="SELECT * FROM administrador WHERE usuario_admin='$email' AND clave_admin='$clave'";
		$consulta=$mysqli->query($query);
		if($consulta->num_rows>=1){
			$fila=$consulta->fetch_array(MYSQLI_ASSOC);
			session_start();
			$_SESSION['user']=$fila['usuario_admin'];
	        $_SESSION['user_id']=$fila['id_admin'];
			$_SESSION['verificar']=true;
			header("Location: Views/Administrador/lista.php");
		}else{
			header("Location: index.php");
		}                          
    }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<link href="Static/css/bootstrap.min.css" rel="stylesheet">
	<link href="Static/css/datepicker3.css" rel="stylesheet">
	<link href="Static/css/styles.css" rel="stylesheet">
</head>
<body style="overflow-x: hidden;">
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">
				<img src="Static/img/1.png" style="width: 100%;height: 100px;">
			    </div>
			    <br><br>
				<div class="panel-body">
					<form role="form" action="index.php" method="post">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="E-mail" name="email" type="text" autofocus="">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" value="">
							</div>
							<input type="submit" value="Ingresar" class="btn btn-primary" style="width: 100%;">
						</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->		
<script src="Static/js/jquery-1.11.1.min.js"></script>
<script src="Static/js/bootstrap.min.js"></script>
</body>
</html>
