<?php
require('C:\xampp\htdocs\fase_4\fpdf\fpdf.php');
date_default_timezone_set("America/Bogota");

$servername = "localhost";
$username = "unad";
$dbname = "bdunad301127_23";
$password = "12345678";

$pdf = new FPDF();

$pdf->SetFont('Arial','B',16);
$pdf->AddPage();
$pdf->Image('imagenes/logo.png',10,10,-150);
$pdf->Ln(20);
$pdf->Cell(90,20,'Fecha: '.date('d.m.Y.H.i.s').'',0);
$pdf->Ln(10);
$pdf->Cell(100,20,utf8_decode('REPORTES PDF'));
$pdf->Ln(10);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(10,20,'ID');
$pdf->Cell(20,20,'Codigo');
$pdf->Cell(30,20,'Nombre');
$pdf->Cell(30,20,'Marca');
$pdf->Cell(30,20,'Precio');
$pdf->Cell(30,20,'Cantidad');

$pdf->Ln(10);

$pdf->SetFont('Arial','',8);

$conec = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conec) {
    die("Connection failed: " . mysqli_connect_error());
}

$query_select = 'SELECT * FROM codigo_producto';
$result = mysqli_query($conec, $query_select);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while ($reg = mysqli_fetch_assoc($result)) {
        $pdf->Cell(10,20, $reg['id'], 0);
        $pdf->Cell(20,20, utf8_decode($reg['codigo_producto']), 0);
        $pdf->Cell(30,20, utf8_decode($reg['nombre_producto']), 0);
        $pdf->Cell(30,20, utf8_decode($reg['marca_producto']), 0);
        $pdf->Cell(30,20, utf8_decode($reg['precio_compra']), 0);
        $pdf->Cell(30,20, utf8_decode($reg['cantidad_comprada']), 0);
        $pdf->Ln(10);
    }
}

$pdf->Output();
?>
