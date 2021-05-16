<?php
include '../conexion.php';

$sql = "SELECT d.id_detalle, d.fecha_detalle, d.consumo_detalle, d.estado_detalle, d.id_medidor, 			d.id_pago, d.id_cartola, 
		m.id_medidor, m.numero_medidor, m.direccion_medidor, m.id_socio,
		s.id_socio, CONCAT (s.nombre_socio, ' ',s.apellido_socio) AS nombre_completo, s.cedula_socio, s.direccion_socio,
		c.id, c.idMedidor, c.numero, c.direccion, c.socio, c.costo, c.mes, c.anio, c.estado
		FROM detalle_pago d
		INNER JOIN medidor m ON d.id_medidor = m.id_medidor
		INNER JOIN socio s ON m.id_socio = s.id_socio
		INNER JOIN cartola c ON d.id_cartola = c.id  
		WHERE id_cartola='" . $_GET['id'] . "'";
$query = mysql_query($sql);
$total_fin = 0;
$a_fin = 0;
$b_fin = 0;
$c_fin = 0;
$d_fin = 0;
$estado = '';
$a_1 = '';
$a_2 = '';
$b_1 = '';
$b_2 = '';
$c_1 = '';
$c_2 = '';
$d_1 = '';
$d_2 = '';

//////
$lant = '';
$lact = '';
$meterConsumed = 0;
$meterConsumed1 = 0;
$zeroTenMeters = 1.25;
$tenTwentyMeters = 0.00;

$val1 = 0;
$val2 = 0;
$val3 = 0;
$total = 0;

$range10_20 = 0;
$range20_30 = 0;
$range30 = 0;

$et1 = 0;
$et2 = 0;
$et3 = 0;


while ($row = mysql_fetch_array($query)) {

    $lact = $row['costo'];
    $pastMonth = pastMonth($row['mes']);
    //buscar lectura del mes anterior
    $query1 = "SELECT * FROM cartola WHERE idMedidor = " . $row['idMedidor'] . " AND mes = '$pastMonth' ";
    $res = mysql_query($query1);
    while ($row1 = mysql_fetch_array($res)) {
        $lant = $row1['costo'];
    }

    //metros consumidos
    $meterConsumed = metersConsumed($lact, $lant);

    if($meterConsumed >= 0 && $meterConsumed <=10){//8
        $val1 = 1.25;
        $total =$val1;
        $et1 = '0.00';
        $et2 = '0.00';
        $et3 = '0.00';

    }elseif ($meterConsumed >= 11 && $meterConsumed <= 20) {//17
        $meterConsumed1 = $meterConsumed - 10; //17 - 10 = 7
        $val1 = 1.25; // 10 = 1.25
        $val2 = $meterConsumed1 * 0.18; // 7 * 0.18 = 1.26
        $total = $val1 + $val2; //1.25 + 1.26 = 2.51

        $range10_20 = $meterConsumed1;
        $et1 = $val2;
        $et2 = '0.00';
        $et3 = '0.00';

    }elseif ($meterConsumed >= 21 && $meterConsumed <= 30){//22
        $meterConsumed1 = $meterConsumed - 10; //22 - 10 = 12
        $val1 = 1.25; // 10 = 1.25
        $val2 = $meterConsumed1 * 0.24; // 12 * 0.24 = 2.88
        $total = $val1 + $val2; //1.25 + 2.88 = 4.13
        $range20_30 = $meterConsumed1;
        $et2 = $val2;
        $et1 = '0.00';
        $et3 = '0.00';
    }elseif ($meterConsumed > 30){//40
        $meterConsumed1 = $meterConsumed - 10; //40 - 10 = 30
        $val1 = 1.25; // 10 = 1.25
        $meterConsumed2 = $meterConsumed1 - 20; //30 -20 = 10
        $val2 = 20 *  0.18; //20  * 0.18  = 3.60
        $val3 = $meterConsumed2 * 0.30; // 10 * 0.30 = 3.00
        $total = $val1 + $val2 + $val3; //1.25 + 3.60 + 3.00 = 7.85

        $range10_20 = 20;
        $range30 = $meterConsumed2;
        $et1 = $val2;
        $et2 = '0.00';
        $et3 = $val3;
    }


    require_once("../dompdf/dompdf_config.inc.php");
    $codigoHTML = '<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        *{
         font-family: DejaVu Sans, sans-serif;
        }
        .container {
            width: 100%;
            border-top: solid 1px #ccc;
            border-right: solid 1px #ccc;
            border-left: solid 1px #ccc;
            height: auto;
        }
        .title{
            margin-left: 30px;
            font-size: 12px;
            margin-bottom: 2px;
            text-align: left;
        }
        

        .table-cebra {
            width: 100%;
            font-size: 10px;
           /* border-top: solid 1px #ccc;*/
            border-spacing: 0;
        }

       /* .table-cebra thead th {
            border-bottom: solid 1px #ccc;
            color: black;
        }*/

        .table-cebra th{
            padding: 0.5em;
            text-align: center;
            min-width: 100px;
            vertical-align: middle;
        }
        .table-cebra td {
            border-right: solid 1px #ccc;
            padding: 0.5em;
            text-align: center;
            min-width: 100px;
            vertical-align: middle;
        }

        .table-cebra td {
           border-top: solid 1px #ccc;
        }

        .table-cebra tbody tr {
            background: white;
        }

        .table-cebra tbody tr:nth-child(2n) {
            background: #f2f2f2;
        }

        .table-container {
            border-bottom: solid 1px #ccc;
            width: 100%;
            height:auto;
        }
        
           .title img{
            margin-top: -40px;
            width: 150px;
            height: 50px;
            margin-left: 46em;
        }
        
    </style>
</head>
<body>
<div class="container">
    <div class="title">
        <label><strong>JUNTA ADMINISTRADORA DE AGUA POTABLE DE TANDACATO</strong></label>
        <br>
        <label><strong>COMPROBANTE DE PAGO</strong></label>
        <br>
          <img src="../../../Static/img/logo.png" alt="" >
    </div>

   <div class="table-container">
       <table class="table-cebra">
           <thead>
           <tr>
               <th colspan="5" style="text-align: left" ><strong>Señor(a): </strong>' . $row['nombre_completo'] . '</th>
               <th colspan="5" style="text-align: left" ><strong>Mes de consumo: </strong>' . $row['mes'] . '</th>
               <th colspan="3" style="text-align: left" ><strong>BARRIO SAN JOSE</strong></th>
           </tr>
           <tr>
               <th colspan="5" style="text-align: left" ><strong>Fecha de Pago: </strong>' . $row['fecha_detalle'] . '</th>
               <th colspan="5" style="text-align: left" ><strong>Estado del Pago: </strong>' . $estado . '</th>
               <th colspan="3" style="text-align: left" ></th>
           </tr>
           <tr><th></th><th></th><th></th></tr>

           </thead>
           <tbody>
           <tr>
               <td colspan="2">LECTURAS</td>
               <td colspan="11">CONSUMO EN METROS CUBICOS</td>
           </tr>
           <tr>
               <td>L. ANT</td>
               <td>L. ACT</td>

               <td>M3.COM</td>
               <td>1OM3</td>
               <td>E.10-20M</td>
               <td>0.18</td>
               <td>E.T</td>
               <td>E.20-30M</td>
               <td>0.24</td>
               <td>E.T</td>
               <td>E.30..?</td>
               <td>0.30</td>
               <td>E.T</td>
           </tr>
           <tr>
                <td>' . $lant . '</td>
				<td>' . $row['costo'] . '</td>
				
				<td>' . $meterConsumed . '</td>
				<td>' . $zeroTenMeters . '</td>
				<td>' . $range10_20 . '</td>
				<td>0.18</td>
				<td>' . $et1 . '</td>
				<td>' .$range20_30 . '</td>
				<td>0.24</td>
				<td>'.$et2.'</td>
				<td>' . $range30 . '</td>
				<td>0.30</td>
				<td>'.$et3.'</td>
           </tr>

           <tr><td colspan="7">MONTO A COBRAR</td>  <td class="tb-child" colspan="6"></td></tr>
           <tr><td colspan="7">BASICO 10M3</td>     <td class="tb-child" colspan="6">$' . $val1 . '</td></tr>
           <tr><td colspan="7">EX.10-20M3</td>      <td class="tb-child" colspan="6">$' . $et1 . '</td></tr>
           <tr><td colspan="7">EX.20-30M3</td>      <td class="tb-child" colspan="6">$' . $et2 . '</td></tr>
           <tr><td colspan="7">EX.30M3...?</td>     <td class="tb-child" colspan="6">$' . $et3 . '</td></tr>
           <tr><td colspan="7"><strong>TOTAL A PAGAR</strong></td>   <td class="tb-child" colspan="6"><strong><label style="font-size: 13px">$' . $total . '</label></strong></td></tr>
           </tbody>
       </table>
   </div>
</div>

</body>
</html>
	';

    $dompdf = new DOMPDF();
    $dompdf->load_html(utf8_decode(utf8_encode($codigoHTML)));
    ini_set("memory_limit", "128M");
    $dompdf->render();
    $dompdf->stream("Planilla.pdf");
    header("Location: ../lista.php");
}

function pastMonth($month)
{
    $pastMonth = '';
    switch ($month) {
        case 'enero':
            return $pastMonth = 'diciembre';
            break;
        case 'febrero':
            return $pastMonth = 'enero';
            break;
        case 'marzo':
            return $pastMonth = 'febrero';
            break;
        case 'abril':
            return $pastMonth = 'marzo';
            break;
        case 'mayo':
            return $pastMonth = 'abril';
            break;
        case 'junio':
            return $pastMonth = 'mayo';
            break;
        case 'julio':
            return $pastMonth = 'junio';
            break;
        case 'agosto':
            return $pastMonth = 'julio';
            break;
        case 'septiembre':
            return $pastMonth = 'agosto';
            break;
        case 'octubre':
            return $pastMonth = 'septiembre';
            break;
        case 'noviembre':
            return $pastMonth = 'octubre';
            break;
        case 'diciembre':
            return $pastMonth = 'noviembre';
            break;
        default:
            return $pasMonth = '';
            break;
    }
}

function metersConsumed($lact, $lant)
{
    if ($lact > $lant)
        return $meter = $lact - $lant;
    elseif ($lant > $lact)
        return $meter = $lant - $lact;
    else
        return $meter = $lact - $lant;
}
