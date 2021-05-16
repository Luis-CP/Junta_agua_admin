
<?php
require('fpdf/fpdf.php');


class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    
    // Arial bold 15
    $this->SetFont('Arial','B',14);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(50,10,'Reportes Pendientes',1,0,'C');
    // Salto de línea
    $this->Ln(20);

    $this->Cell(25,10,utf8_decode('Medidor'),1,0,'C',0);
    $this->Cell(35,10,utf8_decode('Dirección'),1,0,'C',0);
    $this->Cell(35,10,'Nombre',1,0,'C',0);
    $this->Cell(25,10,'Consumo',1,0,'C',0);
    $this->Cell(25,10,'Mes',1,0,'C',0);
    $this->Cell(35,10,utf8_decode('Año'),1,1,'C',0);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');


}
}

// Creación del objeto de la clase heredada


require_once "conection.php";

$consulta = "SELECT c.id, c.numero, c.direccion, c.socio, c.costo, c.mes, c.anio, c.estado,
                s.id_socio, s.nombre_socio, s.apellido_socio, s.cedula_socio, s.direccion_socio
                FROM cartola  c
                INNER JOIN socio s ON c.socio = s.id_socio
                WHERE estado=0";
$resultado = mysqli_query($connection,$consulta);

$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial','',11);
while ($row = mysqli_fetch_array($resultado)){
    $pdf->Cell(25,10,$row['numero'],1,0,'C',0);
    $pdf->Cell(35,10,$row['direccion'],1,0,'C',0);
    $pdf->Cell(35,10,$row['nombre_socio'],1,0,'C',0);
    $pdf->Cell(25,10,$row['costo'],1,0,'C',0);
    $pdf->Cell(25,10,$row['mes'],1,0,'C',0);
    $pdf->Cell(35,10,$row['anio'],1,1,'C',0);
}
$pdf->Output();
?>
