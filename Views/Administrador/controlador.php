<?php
    include "conexion.php";   

    if($_POST['ver']=="crear"){

        //consultar si el numero de medidor existe
        $user = $_POST['usuario'];
        $query = "SELECT * FROM administrador WHERE usuario_admin = '$user'";
        $res = mysql_query($query);
        if (mysql_num_rows($res) > 0) {
            header("Location:lista.php?state=repeat");
        } else {
            $sentencia="INSERT INTO administrador (usuario_admin,clave_admin) VALUES ('".$_POST['usuario']."', '".$_POST['pass']."')";
            if(mysql_query($sentencia)){
                header("Location:lista.php?state=create");
            }
        }


	}
	if($_POST['ver']=="modificar"){
		$sentencia="UPDATE administrador SET  usuario_admin='".$_POST['usuario']."', clave_admin='".$_POST['pass']."' WHERE id_admin='".$_POST['id']."'";
		if(mysql_query($sentencia)){
			header("Location:lista.php?state=update");
		}
	}
	if(isset($_GET["eliminar"])){	
	    $sentencia="DELETE  FROM administrador WHERE id_admin=".$_GET['id']."";
		if(mysql_query($sentencia)){
			header("Location:lista.php");	
		}	
	}
?>