<?php
class MyPDF extends FPDF
{
    function Footer()
    {
        $date = date("Y-m-d");
        $year = date('Y', strtotime($date));
        $month = date('F', strtotime($date));
        $day1 = date('j', strtotime($date));
        $day = date('S', strtotime($date));

        $this->SetY(-20);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, $month.' '.$day1.$day.' '.$year, 0, 0, 'R');
        $this->Ln(5);
        $this->Cell(0, 10, 'Page '.$this->PageNo().'/{nb}', 0, 0, 'R');
    }
}

$pdf = new MyPDF();
$pdf->AliasNbPages();
$pdf->AddPage('L', 'A4', 0);
$pdf->Image('assets/img/vbackg1.png', 0, 0, 300, 210);

$pdf->SetFont('Times', 'B', 15);
$pdf->Text(85, 30, 'CONTRACT ON SERVICE WORKER PROJECT LIST');

$pdf->Ln(25);
$pdf->SetFont('Times', 'B', 10);
$pdf->Cell(10, 6, '#', 1, 0);
$pdf->Cell(25, 6, 'Project ID', 1, 0);
$pdf->Cell(78, 6, 'Project Name', 1, 0);
$pdf->Cell(50, 6, 'Focal Person', 1, 0);
$pdf->SetFont('Times', 'B', 7);
$pdf->Cell(25, 6, 'Duration', 1, 0);
$pdf->SetFont('Times', 'B', 10);
$pdf->Cell(25, 6, 'Start Date', 1, 0);
$pdf->Cell(25, 6, 'End Date', 1, 0);
$pdf->SetFont('Times', 'B', 7);
$pdf->Cell(20, 6, 'Total Employees', 1, 0);
$pdf->SetFont('Times', 'B', 10);
$pdf->Cell(20, 6, 'Status', 1, 0);

foreach ($projects as $key => $data) {
    $pdf->Ln();
    $pdf->SetFont('Times', '', 10);
    $pdf->Cell(10, 6, $key + 1, 1, 0);
    $pdf->Cell(25, 6, $data->project_id, 1, 0);
    $pdf->Cell(78, 6, $data->projectname, 1, 0);
    $pdf->Cell(50, 6, $data->focalperson, 1, 0);
    $pdf->Cell(25, 6, $data->project_duration, 1, 0);
    $pdf->Cell(25, 6, $data->start, 1, 0);
    $pdf->Cell(25, 6, $data->end, 1, 0);
    $pdf->Cell(20, 6, $data->totalperproject, 1, 0);
    $pdf->Cell(20, 6, $data->projstatus_type, 1, 0);
}
$pdf->Output();
exit();
