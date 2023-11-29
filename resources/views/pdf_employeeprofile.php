<?php
class PDF extends FPDF
{
    function Footer()
    {
        $date = date("Y-m-d");
        $year = date('Y', strtotime($date));
        $month = date('F', strtotime($date));
        $day1 = date('j', strtotime($date));
        $day = date('S', strtotime($date));

        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        $this->Cell(0, 10, '' .$month.' '.$day1.$day. ' '.$year .'',0,0,'R');
        $this->Ln(5);
        $this->Cell(0,10,'COSW Employee Profile '.$this->PageNo().'/{nb}',0,0,'R');
    }
}

$pdf = new FPDF();
$pdf->AliasNbPages();
$pdf->AddPage('P', 'A4', 0);
$pdf->Image('assets/img/hbackg.png', 0, 5, 210, 295);

$pdf->SetFont('Times','B',15);
$pdf->Text(80, 40, 'COSW Employee Profile');

$pdf->Ln(35);
$pdf->SetFont('Times','',10);
$pdf->Cell(50, 6, 'AGENCY EMPLOYEE NO.', '0', 0, 'L');
if (!empty($employee)) {
    $pdf->Cell(141, 6, ': ' . $employee[0]->agencyemp_no . '', '0', 0, 'L');
} else {
    $pdf->Cell(141, 6, ':  ', '0', 0, 'L');
}

$pdf->Ln();
$pdf->Cell(50, 6, 'TIN NO.', '0', 0, 'L');

if (!empty($employee)) {
    $pdf->Cell(141, 6, ': ' . $employee[0]->tin_no . '', '0', 0, 'L');
} else {
    $pdf->Cell(141, 6, ':  ', '0', 0, 'L');
}

$pdf->Ln();
$pdf->SetFont('Times','B',10);
$pdf->setFillColor(255,255,255); 
$pdf->Cell(110, 6, 'NAME:', 'TLR', 0, 'L');
$pdf->SetFont('Times','',10);
$pdf->SetFont('Times','B',10);
$pdf->Cell(25, 6, 'CONTACT # :', 'TB', 0, 'L');
$pdf->SetFont('Times','',10);
if (!empty($employee)) {
    $pdf->Cell(56, 6, ''.$employee[0]->contact_no . '', 'RTB', 1, 'L');
} else {
    $pdf->Cell(56, 6, '', 'RTB', 1, 'L');
}

$pdf->SetFont('Times','B',12);
$pdf->Cell(10, 6,'' , 'LB', 0, 'L');
$pdf->Cell(100, 6,'' .$employee[0]->lastname.',   '.$employee[0]->firstname. '  '.$employee[0]->middlename.'  '.$employee[0]->name_ext.' ' , 'RB', 0, 'L');
$pdf->SetFont('Times','',10);
$pdf->SetFont('Times','B',10);
$pdf->Cell(25, 6, 'EMAIL ADD :', 'LB', 0, 'L');
$pdf->SetFont('Times','',10);
$pdf->Cell(56, 6, ''.$employee[0]->email. '', 'RTB', 1, 'L');

$pdf->SetFont('Times','',10);
$pdf->setFillColor(255,255,255);
$pdf->SetFont('Times','B',10); 
$pdf->Cell(25, 6, 'ELIGIBILITY:', 'TLB', 0, 'L');
$pdf->SetFont('Times','',10);
$pdf->Cell(105, 6, ''.$employee[0]->eligibility. '', 'B', 0, 'L');
$pdf->SetFont('Times','',10);
$pdf->SetFont('Times','B',10);
$pdf->Cell(24, 6, 'BIRTHDAY :', 'TLB', 0, 'L');
$pdf->SetFont('Times','',10);
$pdf->Cell(37, 6, ''.$employee[0]->birthdate. '', 'TRB', 1, 'L');

$pdf->SetFont('Times','B',10);
$pdf->setFillColor(255,255,255); 
$pdf->Cell(55, 6, 'EDUCATIONAL ATTAINMENT:', 'TLB', 0, 'L');
$pdf->SetFont('Times','',10);
$pdf->Cell(45, 6, ''.$employee[0]->educ_name. '', 'TRB', 0, 'L');
$pdf->SetFont('Times','',10);
$pdf->SetFont('Times','B',10);
$pdf->Cell(15, 6, 'SEX :', 'TLB', 0, 'L');
$pdf->SetFont('Times','',10);
$pdf->Cell(15, 6, ''.$employee[0]->gender. '', 'TRB', 0, 'L');
$pdf->SetFont('Times','B',10);
$pdf->Cell(35, 6, 'MARITAL STATUS:', 'TLB', 0, 'L');
$pdf->SetFont('Times','',10);
$pdf->Cell(26, 6, ''.$employee[0]->marital_status. '', 'TRB', 1, 'L');

$pdf->SetFont('Times','B',10);
$pdf->Cell(21, 6, 'ADDRESS :', 'TLB', 0, 'L');
$pdf->SetFont('Times','',10);
$pdf->Cell(170, 6, ''.$employee[0]->address. '', 'TRB', 1, 'L');

$pdf->SetFont('Times','B',10);
$pdf->Cell(28, 6, 'BLACKLISTED :', 'TLB', 0, 'L');
$pdf->SetFont('Times','',10);

if($employee[0]->blacklist_id != 5) {
    $blacklisted = "Yes";
    $pdf->Cell(10, 6, $blacklisted, 'TB', 0, 'L');
    // $pdf->Cell(23, 6, $employee[0]->blacklist_type. ':', '1', 0, 'L');
    $pdf->setFillColor(255,255,255); 
    $pdf->Multicell(130, 6, $employee[0]->remarks, '1', 1, 'L');
} else {
    $blacklisted = "No";
    $pdf->Cell(10, 6, $blacklisted, 'TB', 0, 'L');
    $pdf->Cell(23, 6, '', '1', 0, 'L');
    $pdf->setFillColor(255,255,255); 
    $pdf->Multicell(130, 6, '', '1', 1, 'L');
}

$pdf->Ln(5);
$pdf->SetFont('Times','B',10);
$pdf->Cell(61, 6, 'PROJECT NAME', 1, 0);
$pdf->Cell(40, 6, 'POSITION', 1, 0);
$pdf->SetFont('Times','B',8);
$pdf->Cell(20, 6, 'START DATE', 1, 0);
$pdf->Cell(20, 6, 'END DATE', 1, 0);
$pdf->SetFont('Times','B',10);
$pdf->Cell(20, 6, 'STATUS', 1, 0);
$pdf->Cell(30, 6, 'REMARKS', 1, 0);

foreach ($projects as $key => $data) {
    $pdf->Ln();
    $pdf->SetFont('Times', '', 8);
    $pdf->Cell(61, 6, $data->projectname, 1, 0);
    $pdf->SetFont('Times', '', 10);
    $pdf->Cell(40, 6, $data->position, 1, 0);
    $pdf->SetFont('Times', '', 8);
    $pdf->Cell(20, 6, $data->start, 1, 0);
    $pdf->Cell(20, 6, $data->end, 1, 0);
    $pdf->SetFont('Times', '', 10);

    $status = ($data->emp_status_id == 1) ? "Active" : "Inactive";
    $pdf->Cell(20, 6, $status, 1, 0);
    $pdf->Cell(30, 6, $data->remarks, 1, 0);
}

$pdf->Output();
exit();