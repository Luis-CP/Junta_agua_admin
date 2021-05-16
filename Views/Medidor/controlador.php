<?php
include "conexion.php";

if ($_POST['ver'] == "crear") {
    //consultar si el numero de medidor existe
    $num = $_POST['numero'];
    $query = "SELECT * FROM medidor WHERE numero_medidor = '$num'";
    $res = mysql_query($query);
    if (mysql_num_rows($res) > 0) {
        header("Location:lista.php?state=repeat");
    } else {
        $sentencia = "INSERT INTO medidor(numero_medidor, direccion_medidor, id_socio) VALUES ('" . $_POST['numero'] . "', '" . $_POST['direccion'] . "','" . $_POST['socio'] . "')";
        if (mysql_query($sentencia)) {
            header("Location:lista.php?state=create");
        }
    }


}
if ($_POST['ver'] == "modificar") {
    $sentencia = "UPDATE medidor SET  numero_medidor='" . $_POST['numero'] . "', direccion_medidor='" . $_POST['direccion'] . "', id_socio='" . $_POST['socio'] . "' WHERE id_medidor='" . $_POST['id'] . "'";
    if (mysql_query($sentencia)) {
        header("Location:lista.php?state=update");
    }
}
if (isset($_GET["eliminar"])) {
    $sentencia = "DELETE  FROM medidor WHERE id_medidor=" . $_GET['id'] . "";
    if (mysql_query($sentencia)) {
        header("Location:lista.php");
    }
}
?>