<?php

$fpdf = new Fpdf();

foreach ($setors as $setor) {
	$fpdf->AddPage();

	$fpdf->SetFont('Arial', 'B', 14);
	$fpdf->Cell(60, 10, 'Frizelo Frigorificos Ltda.');
	$fpdf->Ln();

	$fpdf->SetFont('Arial', 'I', 12);
	$fpdf->Cell(100, 10, $setor->descricao, 0, 0, 1);
	$fpdf->Cell(60, 10, 'DATA: '.$data);
	$fpdf->Ln();

	$fpdf->SetFont('Arial', 'B', 8);
	$fpdf->SetFillColor(200);
	$fpdf->Cell(60, 5, 'Nome', 1, 0, 1, 1);
	$fpdf->Cell(30, 5, 'Entrada', 1, 0, 1, 1);
	$fpdf->Cell(30, 5, 'Saida', 1, 0, 1, 1);
	$fpdf->Cell(60, 5, 'Assinatura', 1, 0, 1, 1);
	$fpdf->Ln();

	$fpdf->SetFont('Arial', '', 8);
	foreach ($setor->internos()->where('situacao', 1)->get() as $interno) {
		$fpdf->Cell(60, 6, utf8_decode($interno->nome), 1, 'LBTR', 1, 0);
		$fpdf->Cell(30, 6, '_____:_____', 1, 0, 1, 0);
		$fpdf->Cell(30, 6, '_____:_____', 1, 0, 1, 0);
		$fpdf->Cell(60, 6, '', 1, 0, 1, 0);
		$fpdf->Ln();
	}

}

$fpdf->Output();
exit;

?>