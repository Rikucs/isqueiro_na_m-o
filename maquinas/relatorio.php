<?php

include '../assets/pdf/fpdf/fpdf.php';
include '../user/config.php';

$banco = $link;
$sql = "SELECT * FROM maquinas where reciclagem = '0' ORDER BY id_maquinas";
$maquinasado = $banco->query($sql);
$banco->close();
while ($row = mysqli_fetch_array($maquinasado)) {
$grupo[] = $row;
}

$maquinas = $grupo;

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(190,10,utf8_decode('Relatório de cadastros'),0,0,"C");
$pdf->Ln(15);

$pdf->SetFont("Arial","I",10);
$pdf->Cell(20,7,"Nome",1,0,"C");
$pdf->Cell(20,7,"Matricula",1,0,"C");
$pdf->Cell(20,7,"Combustivel",1,0,"C");
$pdf->Cell(10,7,"Ano",1,0,"C");
$pdf->Cell(27,7,"Kilometros",1,0,"C");
$pdf->Cell(13,7,"Horas",1,0,"C");
$pdf->Cell(30,7,"Kilometros iniciais",1,0,"C");
$pdf->Cell(22,7,"Horas iniciais",1,0,"C");
$pdf->Cell(33,7,utf8_decode("Observações"),1,0,"C");

$pdf->Ln();
    
    foreach ($maquinas as $maquinas){
    	$pdf->Cell(20,7,utf8_decode($maquinas["Nome"]),1,0,"C");
    	$pdf->Cell(20,7,utf8_decode($maquinas["matricula"]),1,0,"C");
    	$pdf->Cell(20,7,utf8_decode($maquinas["combustivel"]),1,0,"C");
    	$pdf->Cell(10,7,$maquinas["ano"],1,0,"C");
    	$pdf->Cell(27,7,$maquinas["km"],1,0,"C");
    	$pdf->Cell(13,7,$maquinas["h"],1,0,"C");
    	$pdf->Cell(30,7,$maquinas["km_iniciais"],1,0,"C");
    	$pdf->Cell(22,7,$maquinas["h_iniciais"],1,0,"C");
    	$pdf->Cell(33,7,utf8_decode($maquinas["observacoes"]),1,0,"C");
    	$pdf->Ln();
	}

	  
$pdf->Output();