<?php

include '../assets/pdf/fpdf/fpdf.php';
include '../user/config.php';

$data1 = $_GET["data1"];
$data2 = $_GET["data2"];

$banco = $link;
$sql = "SELECT adata,maquinas.Nome, obras.nome, combustiveis.NOME, litros, abastecimentos.km, abastecimentos.horas, assinatura 
FROM abastecimentos 
INNER JOIN obras ON abastecimentos.obra = obras.id_obras 
INNER JOIN maquinas ON abastecimentos.maquina = maquinas.id_maquinas 
INNER JOIN combustiveis ON abastecimentos.combustivel = combustiveis.id_combustiveis 
where abastecimentos.reciclagem = 0 
AND abastecimentos.adata BETWEEN '$data1' AND '$data2' 
AND obra = " . $_GET["obras"] . "
ORDER BY id_abastecimentos DESC";

$abastecimentosado = $banco->query($sql);
$banco->close();
while ($row = mysqli_fetch_array($abastecimentosado)) {
	$grupo[] = $row;
}

$abastecimentos = $grupo;

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(190, 10, utf8_decode('Relatório de Abastecimentos'), 0, 0, "C");
$pdf->Ln(15);

$pdf->SetFont("Arial", "I", 10);
$pdf->Cell(25, 7, "Data", 1, 0, "C");
$pdf->Cell(30, 7, "Maquina", 1, 0, "C");
$pdf->Cell(30, 7, "Obra", 1, 0, "C");
$pdf->Cell(30, 7, "Combustivel", 1, 0, "C");
$pdf->Cell(15, 7, "Litros", 1, 0, "C");
$pdf->Cell(25, 7, "Kilometros", 1, 0, "C");
$pdf->Cell(15, 7, "Horas", 1, 0, "C");
$pdf->Cell(25, 7, "Assinatura ", 1, 0, "C");

$pdf->Ln();

foreach ($abastecimentos as $abastecimentos) {
	$pdf->Cell(25, 7, utf8_decode($abastecimentos["adata"]), 1, 0, "C");
	$pdf->Cell(30, 7, utf8_decode($abastecimentos["Nome"]), 1, 0, "C");
	$pdf->Cell(30, 7, utf8_decode($abastecimentos["nome"]), 1, 0, "C");
	$pdf->Cell(30, 7, utf8_decode($abastecimentos["NOME"]), 1, 0, "C");
	$pdf->Cell(15, 7, utf8_decode($abastecimentos["litros"]), 1, 0, "C");
	$pdf->Cell(25, 7, $abastecimentos["km"], 1, 0, "C");
	$pdf->Cell(15, 7, $abastecimentos["horas"], 1, 0, "C");
	$pdf->Cell(25, 7, $abastecimentos["assinatura"], 1, 0, "C");

	$pdf->Ln();
}


$pdf->Output();
