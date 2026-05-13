<?php
require('./fpdf.php');
class PDF extends FPDF
{
function Header() // Cabecera de página
{
    $this->Image('../images/logo.png',10,5,40);    // Logo
    $this->SetFont('Arial','B',15);    // Arial bold 15
    $this->Cell(75);    // Movernos a la derecha
    $this->Cell(65,10,'LISTA DE CLIENTES - CASOS VARIOS',0,0,'C');    // Título
    $this->Ln(15);    // Salto de línea
    $this->SetFont('Arial','B',10);    // Arial bold 15
    $this->Cell(20,8, 'CODE',1,0,'C',0);
    $this->Cell(50,8,'PROCESO',1,0,'C',0);
    $this->Cell(20,8,'ID',1,0,'C',0);
    $this->Cell(70,8, 'NOMBRE',1,0,'C',0);
  	$this->Cell(35,8,'TELEFONO',1,1,'C',0);
  	
}
// Pie de página
function Footer()
{
    $this->SetY(-15);    // Posición: a 1,5 cm del final
    $this->SetFont('Arial','I',10);    // Arial italic 8
    $this->Cell(10,10,'Hoja '.$this->PageNo(),0,0,'C');    // Número de página
  	$this->Cell(325,10, date('F') .' / '. date('d'). ' / '. date('Y'), 0,1,'C');
}
}
require '../config/db.php';
$query = "SELECT * FROM fav_clientes INNER JOIN fav_varios WHERE fav_cli_codigo = fav_var_codigo";
$resultado = mysqli_query($conexion, $query);
$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial','',7);
while ($row = mysqli_fetch_array($resultado)){

    $pdf->Cell(20,6, utf8_decode($row['fav_cli_codigo']),1,0,'C',0);
    $pdf->Cell(50,6, utf8_decode($row['fav_var_proceso']),1,0,0);
    $pdf->Cell(20,6, utf8_decode($row['fav_cli_identificacion']),1,0,0);
    $pdf->Cell(70,6, utf8_decode($row['fav_cli_nombre']),1,0,0);
    $pdf->MultiCell(35,6, utf8_decode($row['fav_cli_telefono']),1,1,false);
}
$pdf->Output();
?>