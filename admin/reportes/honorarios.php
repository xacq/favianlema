<?php
require('./fpdf.php');
class PDF extends FPDF
{
function Header() // Cabecera de página
{
    $this->Image('../images/logo.png',10,8,33);    // Logo
    $this->SetFont('Arial','B',10);    // Arial bold 15
    $this->Cell(75);    // Movernos a la derecha
    $this->Cell(45,10,'LISTA DE CUENTAS',0,0,'C');    // Título
    $this->Ln(15);    // Salto de línea
    
    $this->Cell(10,8, 'CODE',1,0,'C',0);
    $this->Cell(70,8, 'NOMBRE',1,0,'C',0);
    $this->Cell(15,8, 'TOTAL',1,0,'C',0);
    $this->Cell(10,8, 'AB. 1',1,0,'C',0);
    $this->Cell(15,8, 'FECHA',1,0,'C',0);
    $this->Cell(10,8, 'AB. 2',1,0,'C',0);
    $this->Cell(15,8, 'FECHA',1,0,'C',0);
    $this->Cell(10,8, 'AB. 3',1,0,'C',0);
    $this->Cell(15,8, 'FECHA',1,0,'C',0);
    $this->Cell(10,8,'AB. 4',1,0,'C',0);
    $this->Cell(15,8, 'FECHA',1,1,'C',0);
}
// Pie de página
function Footer()
{
    $this->SetY(-15);    // Posición: a 1,5 cm del final
    $this->SetFont('Arial','I',10);    // Arial italic 8
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');    // Número de página
}
}
require '../config/db.php';
$query = "SELECT * FROM fav_honorarios, fav_clientes WHERE fav_hon_codigo = fav_cli_codigo";
$resultado = mysqli_query($conexion, $query);
$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial','',7);
while ($row = mysqli_fetch_array($resultado)){

    $pdf->Cell(10,6, $row['fav_hon_codigo'],1,0,'C',0);
    $pdf->Cell(70,6, utf8_decode($row['fav_cli_nombre']),1,0,'C',0);
    $pdf->Cell(15,6, $row['fav_hon_total'],1,0,'C',0);
    $pdf->Cell(10,6, $row['fav_hon_abo_1'],1,0,'C',0);
    $pdf->Cell(15,6, $row['fav_hon_abo_fecha_1'],1,0,'C',0);
    $pdf->Cell(10,6, $row['fav_hon_abo_2'],1,0,'C',0);
    $pdf->Cell(15,6, $row['fav_hon_abo_fecha_2'],1,0,'C',0);
    $pdf->Cell(10,6, $row['fav_hon_abo_3'],1,0,'C',0);
    $pdf->Cell(15,6, $row['fav_hon_abo_fecha_3'],1,0,'C',0);
    $pdf->Cell(10,6, $row['fav_hon_abo_4'],1,0,'C',0);
    $pdf->Cell(15,6, $row['fav_hon_abo_fecha_4'],1,1,'C',0);
}
$pdf->Output();
?>