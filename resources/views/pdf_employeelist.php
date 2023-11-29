<?php

class MyPDF extends FPDF
{
    // Override the Footer() method
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
        $this->Cell(0, 10, 'ALL COSW List Page '.$this->PageNo().'/{nb}', 0, 0, 'R');
    }
}

$pdf = new FPDF();
$pdf->AliasNbPages();

$pdf->AddPage('L', 'A4', 0);
$pdf->Image("assets/img/vbackg1.png", 0, 0, 300, 210);

$pdf->SetFont('Times', 'B', 15);
$pdf->Text(95, 30, 'ALL CONTRACT ON SERVICE WORKER LIST');

// Column headers
$pdf->Ln(25);
$pdf->SetFont('Times', 'B', 10);
$pdf->Cell(10, 6, '#', 1, 0);
$pdf->Cell(20, 6, 'ID', 1, 0);
$pdf->Cell(35, 6, 'Lastname', 1, 0);
$pdf->Cell(40, 6, 'Firstname', 1, 0);
$pdf->Cell(35, 6, 'Middlename', 1, 0);
$pdf->Cell(15, 6, 'Suffix', 1, 0);
$pdf->Cell(15, 6, 'Sex', 1, 0);
$pdf->Cell(40, 6, 'Educational Attainment', 1, 0);
$pdf->Cell(48, 6, 'Eligibility', 1, 0);
$pdf->Cell(20, 6, 'Status', 1, 0);

foreach($employees as $key => $data) {
    $pdf->Ln();
    $pdf->SetFont('Times', '', 10);
    $pdf->Cell(10, 6, $key+1, 1, 0);
    $pdf->Cell(20, 6, $data->employee_id, 1, 0);
    $pdf->Cell(35, 6, $data->lastname, 1, 0);
    $pdf->Cell(40, 6, $data->firstname, 1, 0);
    $pdf->Cell(35, 6, $data->middlename, 1, 0);
    $pdf->Cell(15, 6, $data->name_ext, 1, 0);
    $pdf->Cell(15, 6, $data->gender, 1, 0);
    $pdf->Cell(40, 6, $data->educ_name, 1, 0);
    $pdf->Cell(48, 6, $data->eligibility, 1, 0);
    $status = $data->activate == 1 ? "Active" : "Inactive";
    $pdf->Cell(20, 6, $status, 1, 0);
}

$pdf->Output();
exit();
