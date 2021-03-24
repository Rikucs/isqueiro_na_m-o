<?php

include '../assets/pdf/fpdf/fpdf.php';
include '../user/config.php';

$banco = $link;
$sql = "SELECT * FROM combustiveis where reciclagem = '0' ORDER BY id_combustiveis";
$combustiveisado = $banco->query($sql);
$banco->close();
while ($row = mysqli_fetch_array($combustiveisado)) {
$grupo[] = $row;
}

$combustiveis = $grupo;

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(190,10,utf8_decode('Relatório de cadastros'),0,0,"C");
$pdf->Ln(15);

$pdf->SetFont("Arial","I",10);
$pdf->Cell(20,7,"id",1,0,"C");
$pdf->Cell(50,7,"Nome",1,0,"C");
$pdf->Cell(50,7,"Preco",1,0,"C");


$pdf->Ln();
    
    foreach ($combustiveis as $combustiveis){
    	$pdf->Cell(20,7,$combustiveis["id_combustiveis"],1,0,"C");
    	$pdf->Cell(50,7,utf8_decode($combustiveis["NOME"]),1,0,"C");
    	$pdf->Cell(50,7,utf8_decode($combustiveis["preco"]),1,0,"C");

    	$pdf->Ln();
	}

	  
$pdf->Output();