<?php
require('./fpdf.php');
class PDF extends FPDF
{
function Header() // Cabecera de página
{
    $this->Image('../images/logo.png',10,8,33);    // Logo
    $this->SetFont('Arial','B',10);    // Arial bold 15
    $this->Cell(75);    // Movernos a la derecha
    $this->Cell(45,10,'LISTA DE CLIENTES INACTIVOS',0,0,'C');    // Título
    $this->Ln(15);    // Salto de línea

    $this->Cell(30,8, 'CODE',1,0,'C',0);
    $this->Cell(20,8,'TIPO',1,0,'C',0);
    $this->Cell(30,8,'ID',1,0,'C',0);
    $this->Cell(30,8,'TELEFONO',1,0,'C',0);
    $this->Cell(80,8, 'NOMBRE',1,1,'C',0);
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
$query = "SELECT * FROM fav_clientes WHERE fav_cli_estado = 'si'";
$resultado = mysqli_query($conexion, $query);
$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial','',8);
while ($row = mysqli_fetch_array($resultado)){

    $pdf->Cell(30,6, utf8_decode($row['fav_cli_codigo']),1,0,'C',0);
    $pdf->Cell(20,6, utf8_decode($row['fav_cli_tipo']),1,0,'C',0);
    $pdf->Cell(30,6, utf8_decode($row['fav_cli_identificacion']),1,0,0);
    $pdf->Cell(30,6, utf8_decode($row['fav_cli_telefono']),1,0,0);
    $pdf->MultiCell(80,6, utf8_decode($row['fav_cli_nombre']),1,1,false);
}
$pdf->Output();
?>