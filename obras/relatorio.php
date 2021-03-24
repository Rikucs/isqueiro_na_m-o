<?php

include '../assets/pdf/fpdf/fpdf.php';
include '../user/config.php';

$banco = $link;
$sql = "SELECT * FROM obras where reciclagem = '0' ORDER BY id_obras";
$obrasado = $banco->query($sql);
$banco->close();
while ($row = mysqli_fetch_array($obrasado)) {
$grupo[] = $row;
}

$obras = $grupo;

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(190,10,utf8_decode('Relatório de cadastros'),0,0,"C");
$pdf->Ln(15);

$pdf->SetFont("Arial","I",10);
$pdf->Cell(20,7,"id",1,0,"C");
$pdf->Cell(100,7,"Nome",1,0,"C");


$pdf->Ln();
    
    foreach ($obras as $obras){
    	$pdf->Cell(20,7,$obras["id_obras"],1,0,"C");
    	$pdf->Cell(100,7,utf8_decode($obras["nome"]),1,0,"C");

    	$pdf->Ln();
	}

	  
$pdf->Output();