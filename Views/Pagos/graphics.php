<?php
include 'conexion.php';

function month($month)
{
    $m = '';
    switch ($month) {
        case 01:
            $m = 'enero';
            break;
        case 02:
            $m = 'febrero';
            break;
        case 03:
            $m = 'marzo';
            break;
        case 04:
            $m = 'abril';
            break;
        case 05:
            $m = 'mayo';
            break;
        case 06:
            $m = 'junio';
            break;
        case 07:
            $m = 'julio';
            break;
        case 8:
            $m = 'agosto';
            break;
        case 9:
            $m = 'septiembre';
            break;
        case 10:
            $m = 'octubre';
            break;
        case 11:
            $m = 'noviembre';
            break;
        case 12:
            $m = 'diciembre';
            break;

    }
    return $m;
}

function loadData($month, $year, $state)
{
    $query = "SELECT c.id, c.numero, c.direccion, c.socio, c.costo, c.mes, c.anio, c.estado,
                s.id_socio, s.nombre_socio, s.apellido_socio, s.cedula_socio, s.direccion_socio
                FROM cartola  c
                INNER JOIN socio s ON c.socio = s.id_socio                
                WHERE mes = '$month' AND anio = $year AND estado =$state";

    $res = mysql_query($query);
    $topTen = array();
    while ($row = mysql_fetch_array($res)) {
        $topTen[] = array(
            //socio
            'id' => $row['id_socio'],
            'dni' => $row['cedula_socio'],
            'name' => $row["nombre_socio"],
            'lasName' => $row['apellido_socio'],
            'address' => $row['direccion_socio'],
            //cartola
            'cost' => $row['costo'],
            'measurer' => $row['numero']
        );
    }
    return json_encode($topTen);
}

function detailData($month, $year,$state,$meterNumber)
{
    $query = "SELECT c.id, c.numero, c.direccion, c.socio, c.costo, c.mes, c.anio, c.estado,
                s.id_socio, s.nombre_socio, s.apellido_socio, s.cedula_socio, s.direccion_socio
                FROM cartola  c
                INNER JOIN socio s ON c.socio = s.id_socio                
                WHERE mes = '$month' AND anio = $year AND estado =$state AND numero = $meterNumber";

    $res = mysql_query($query);
    $topTen = array();
    while ($row = mysql_fetch_array($res)) {
        $topTen[] = array(
            //socio
            'id' => $row['id_socio'],
            'dni' => $row['cedula_socio'],
            'name' => $row["nombre_socio"],
            'lastName' => $row['apellido_socio'],
            'address' => $row['direccion_socio'],
            //cartola
            'cost' => $row['costo'],
            'measurer' => $row['numero'],
            'month' => $row['mes']
        );
    }
    return json_encode($topTen);
}

//default
if ($_GET['action'] == 1) {
    $month = month(date('m'));
    $year = date('Y');
    $state = 1;
    echo loadData($month, $year, $state);

} elseif ($_GET['action'] == 2) {
    $month = $_POST['month'];
    $year = $_POST['year'];
    $state = $_POST['state'];
    echo loadData($month, $year, $state);
} elseif ($_GET['action'] == 3){
    $month = $_POST['month'];
    $year = $_POST['year'];
    $state = $_POST['state'];
    $meterNumber = $_POST['meterNumber'];
    echo detailData($month,$year,$state,$meterNumber);
}

?>