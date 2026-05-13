<?php
require('./fpdf.php');
class PDF extends FPDF
{
function Header() // Cabecera de página
{
    $this->Image('../images/logo.png',10,8,33);    // Logo
    $this->SetFont('Arial','B',10);    // Arial bold 15
    $this->Cell(75);    // Movernos a la derecha
    $this->Cell(45,10,'AGENDA PENDIENTE O ANTERIOR` A:',0,0,'C');    // Título
    $this->Cell(40,10,date('d/m/Y'),0,1,'R'); 
    $this->Ln(15);    // Salto de línea
    $this->Cell(16,8, 'FECHA',1,0,'C',0);
    $this->Cell(36,8, 'TAREA',1,0,'C',0);
    $this->Cell(20,8, 'ESTADO',1,0,'C',0);
    $this->Cell(120,8,'DESCRIPCION',1,1,'C',0);
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
$query = "SELECT * FROM fav_agenda WHERE fav_age_fecha < CURDATE() && fav_age_estado = 'no' ORDER BY fav_age_fecha";
$resultado = mysqli_query($conexion, $query);
$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial','',8);
while ($row = mysqli_fetch_array($resultado)){
    $pdf->Cell(16,6, utf8_decode($row['fav_age_fecha']),1,0,'C',0);
    $pdf->Cell(36,6, utf8_decode($row['fav_age_tareas']),1,0,'C',0);
    $pdf->Cell(20,6, utf8_decode($row['fav_age_estado']),1,0,'C',0);
    $pdf->MultiCell(120,6, utf8_decode($row['fav_age_descripcion']),1,1,false);
}
$pdf->Output();
?>