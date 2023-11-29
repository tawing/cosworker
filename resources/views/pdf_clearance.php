<?php

$pdf = new FPDF();
$pdf->AliasNbPages();
$pdf->AddPage('P', 'Legal', 0);
$pdf->Image('assets/img/finalclearancebg.png', 0, 0, 215, 345);

$projname = array_map(function($n) { return rand(0, 1) == 0 ? 'Community Based Managaement System (CBMS)' : 'PhilSYS'; }, range(1, 50));

$choices = ['Data Encoder', 'Statistical Analyst', 'Focal Person'];
$position = array_map(function($n) use ($choices) {
    return $choices[array_rand($choices)];
}, range(1, 50));

$startdate = array_map(function($n) { $timestamp = rand(strtotime('-1 year'), time()); $date = date('Y-m-d', $timestamp); return $date; }, range(1, 50));
$enddate = array_map(function($n) { $timestamp = rand(strtotime('-1 year'), time()); $date = date('Y-m-d', $timestamp); return $date; }, range(1, 50));


$status = array_map(function($n) { return rand(0, 1) == 0 ? 'Ongoing' : 'Completed'; }, range(1, 50));
$projrem = array_map(function($n) { return rand(0, 1) == 0 ? 'Good' : 'Always late'; }, range(1, 50));

$pdf->SetMargins(7.5, 30, 10, 20);
$pdf->SetFont('Times','B',15);

$Lastname = 'Bombeo';
$Firstname = 'Joshua Mark';
$Middlename = 'Amoguis';
$Suffix = 'Jr.';
$email = 'jm.bombeo@gmail.com';
$contact = '09351431433';
$edattain = 'College Graduate';
$eligib = 'CPA, HRM';
$bday = 'June 29, 2000';
$sex = 'Male';
$address = 'Zone 13, Assumption Village, Patag, Cagayan De Oro City';
$marstat = 'Married';
$blkst = 'Yes';
$blksttype = 'Pending case';
$remarks = 'Too good to all co-workers, he is over qualified for the job. Too good to all co-workers, he is over qualified for the job. Too good to all co-workers, he is over qualified for the job. Too good to all co-workers, he is over qualified for the job.Too good to all co-workers, he is over qualified for the job. Too good to all co-workers, he is over qualified for the job. Too good to all co-workers, he is over qualified for the job. Too good to all co-workers, he is over qualified for the job. ';

$pdf->Ln(42);
$pdf->setFillColor(0,0,0);
$pdf->Cell(200,0.5,'',1,1,'C',true);
$pdf->setFillColor(255,255,255);
$pdf->SetFont('Times','B',11);
$pdf->Cell(10, 6, ' I', '1', 0, 'L');
$pdf->Cell(190, 6, 'PURPOSE', 'TRB', 1, 'L');

$pdf->SetFont('Times','',11);
$pdf->Cell(10, 6, ' ', '0', 0, 'L');
$pdf->Cell(120, 6, '', 'L', 0, 'L');
$pdf->Cell(66, 7, 'JUNE 22, 2022', 'B', 0, 'C');
$pdf->Cell(5, 6, '', '0', 1, 'L');

$pdf->Cell(10, 6, ' ', '0', 0, 'L');
$pdf->Cell(120, 6, '', 'L', 0, 'L');
$pdf->Cell(66, 6, 'Date of Application', '0', 0, 'C');
$pdf->Cell(5, 6, '', '0', 1, 'L');

$pdf->SetFont('Times','B',11);
$pdf->Cell(10, 6, ' ', '0', 0, 'L');
$pdf->Cell(14, 6, 'TO:', 'L', 0, 'L');
$pdf->SetFont('Times','BU',11);
$pdf->Cell(177, 6, 'PHILIPPINES STATISTICS AUTHORITY', '0', 1, 'L');

$pdf->SetFont('Times','',11);
$pdf->Cell(10, 6, ' ', '0', 0, 'L');
$pdf->Cell(14, 6, '', 'L', 0, 'L');
$pdf->Cell(177, 6, 'I hereby apply for clearance from money, property and work-related accountabilities for:', '0', 1, 'L');

$pdf->SetFont('Times','',11);
$pdf->Cell(10, 6, ' ', '0', 0, 'L');
$pdf->Cell(14, 6, '', 'L', 0, 'L');
$pdf->Cell(20, 5, 'Purpose: ', '0', 0, 'L');
$pdf->Cell(5, 5, '', '1', 0, 'L');
$pdf->Cell(30, 5, 'Transfer ', '0', 0, 'L');
$pdf->Cell(5, 5, '', '1', 0, 'L');
$pdf->Cell(30, 5, 'Registration', '0', 0, 'L');
$pdf->Cell(5, 5, '', '1', 0, 'L');
$pdf->Cell(82, 5, 'Other Mode of Separation', '0', 1, 'L');

$pdf->Cell(10, 1, '', '0', 0, 'L');
$pdf->Cell(191, 1, '', 'L', 1, 'L');

$pdf->Cell(10, 6, ' ', '0', 0, 'L');
$pdf->Cell(14, 6, '', 'L', 0, 'L');
$pdf->Cell(20, 5, '', '0', 0, 'L');
$pdf->Cell(5, 5, '', '1', 0, 'L');
$pdf->Cell(30, 5, 'Retirement ', '0', 0, 'L');
$pdf->Cell(5, 5, '', '1', 0, 'L');
$pdf->Cell(30, 5, 'Leave', '0', 0, 'L');
$pdf->Cell(5, 5, '', '0', 0, 'L');
$pdf->Cell(25, 5, 'Please specify:', '0', 0, 'L');
$pdf->Cell(52, 5, '', 'B', 1, 'L');

$pdf->Cell(10, 1, '', '0', 0, 'L');
$pdf->Cell(191, 1, '', 'L', 1, 'L');

$pdf->Cell(10, 6, ' ', '0', 0, 'L');
$pdf->Cell(14, 6, '', 'L', 0, 'L');
$pdf->Cell(45, 6, 'Effective/Inclusive Period:', '0', 0, 'L');
$pdf->SetFont('Times','BU',11);
$pdf->Cell(132, 6, 'SEPTEMBER 1, 2022 TO DECEMBER 14, 2022', '0', 1, 'L');

$pdf->Cell(10, 1, '', '0', 0, 'L');
$pdf->Cell(191, 1, '', 'L', 1, 'L');

$pdf->SetFont('Times','',11);
$pdf->Cell(10, 7, ' ', 'LRT', 0, 'L');
$pdf->Cell(36, 7, 'Office of Assignment: ', 'T', 0, 'L');
$pdf->SetFont('Times','B',11);
$pdf->Cell(65, 7, 'PSA-MISAMIS ORIENTAL ', 'T', 0, 'C');
$pdf->SetFont('Times','BU',11);
$pdf->Cell(89, 7, '        JOSHUA MARK A. BOMBEO       ', 'LT', 1, 'C');
$pdf->SetFont('Times','',11);

$pdf->Cell(10, 5, ' ', 'RB', 0, 'L');
$pdf->Cell(101, 5, '', 'B', 0, 'L');
$pdf->Cell(89, 5, 'Name and Signature of Employee', 'LRB', 1, 'C');

$pdf->setFillColor(0,0,0);
$pdf->Cell(200,0.5,'',1,1,'C',true);
$pdf->setFillColor(255,255,255);
$pdf->SetFont('Times','B',11);
$pdf->Cell(10, 6, ' II', '1', 0, 'L');
$pdf->Cell(190, 6, 'CLEARANCE FROM WORK-RELATED ACCOUNTABILITIES', 'TRB', 1, 'L');

$pdf->SetFont('Times','',11);
$pdf->Cell(10, 6, ' ', '0', 0, 'L');
$pdf->Cell(5, 6, '', 'L', 0, 'L');
$pdf->Cell(186, 6, 'We hereby certify that this applicant is cleared of work-related accountabilities from this Unit/Office/Dept.', '0', 1, 'L');

$pdf->Cell(10, 2, '', '0', 0, 'L');
$pdf->Cell(5, 2, '', 'L', 0, 'L');
$pdf->Cell(186, 2, '', '0', 1, 'L');

$pdf->Cell(10, 6, ' ', 'R', 0, 'L');
$pdf->SetFont('Times','B',11);
$pdf->Cell(95.5, 6, 'JULIETA M. NACARIO', '0', 0, 'C');
$pdf->Cell(95.5, 6, 'JANITH C. AVES, C.E., D.M', '0', 1, 'C');
$pdf->SetFont('Times','',11);

$pdf->Cell(10, 4, ' ', 'R', 0, 'L');
$pdf->Cell(95.5, 4, 'Immediate Supervisor', '0', 0, 'C');
$pdf->Cell(95.5, 4, 'Head of Office', '0', 1, 'C');

$pdf->setFillColor(0,0,0);
$pdf->Cell(200,0.5,'',1,1,'C',true);
$pdf->setFillColor(255,255,255);
$pdf->SetFont('Times','B',11);
$pdf->Cell(10, 6, ' III', '1', 0, 'L');
$pdf->Cell(190, 6, 'CLEARANCE FROM MONEY AND PROPERTY ACCOUNTABILITIES', 'TRB', 1, 'L');

$pdf->SetFont('Times','B',10);
$pdf->Cell(10, 7, ' ', 'R', 0, 'L');
$pdf->Cell(86, 7, 'Name of Unit/Office/Department', '1', 0, 'L');
$pdf->SetFont('Times','B',7.5);
$pdf->Cell(15, 7, 'Cleared', '1', 0, 'C');
$pdf->Cell(15, 7, 'Not Cleared', '1', 0, 'C');
$pdf->SetFont('Times','B',10);
$pdf->Cell(60, 7, 'Name of Clearing Officer/Official', '1', 0, 'L');
$pdf->SetFont('Times','B',8);
$pdf->Cell(14, 7, 'Signature', '1', 1, 'L');

$pdf->setFillColor(192,192,192);
    $pdf->SetFont('Times','',11);
$pdf->Cell(10,5,'',1,0,'C',true);
$pdf->Cell(190,5,'1. Administration Services',1,1,'L',true);

$pdf->setFillColor(255,255,255);
$pdf->Cell(10,1,'','TLR',0,'C',true);
$pdf->Cell(86,1,'','TLR',0,'C',true);
$pdf->Cell(15,1,'','TLR',0,'C',true);
$pdf->Cell(15,1,'','TLR',0,'C',true);
$pdf->Cell(60,1,'','TLR',0,'C',true);
$pdf->Cell(14,1,'','TLR',1,'C',true);

$pdf->setFillColor(255,255,255);
$pdf->Cell(10, 7, ' ', 'R', 0, 'L');
$pdf->Cell(86, 3.5, '', 'LR', 0, 'L');
    $pdf->SetFont('Times','B',7.5);
$pdf->Cell(15, 3.5, '', 'R', 0, 'C');
$pdf->Cell(15, 3.5, '', '0', 0, 'C');
    $pdf->SetFont('Times','B',8);
$pdf->Cell(60, 3.5, 'CINDY B. DUMALOAN', 'LR', 0, 'C');
    $pdf->SetFont('Times','',11);
$pdf->Cell(14, 3.5, '', '0', 1, 'L');

$pdf->Cell(10, 7, ' ', 'R', 0, 'L');
$pdf->Cell(10, 7, ' ', '0', 0, 'L');
$pdf->Cell(76, 3.5, 'a. Supply and Property', 'R', 0, 'L');
$pdf->Cell(15, 3.5, '', 'BR', 0, 'C');
$pdf->Cell(15, 3.5, '', 'B', 0, 'C');
$pdf->SetFont('Times','',8);
$pdf->Cell(60, 3.5, 'Property Custodian-Designate (PSO)', 'LRB', 0, 'C');
$pdf->Cell(14, 3.5, '', 'B', 1, 'L');

$pdf->setFillColor(255,255,255);
$pdf->Cell(10,1,'','LR',0,'C',true);
$pdf->Cell(86,1,'','LR',0,'C',true);
$pdf->Cell(15,1,'','TLR',0,'C',true);
$pdf->Cell(15,1,'','TLR',0,'C',true);
$pdf->Cell(60,1,'','TLR',0,'C',true);
$pdf->Cell(14,1,'','TLR',1,'C',true);

$pdf->setFillColor(255,255,255);
$pdf->Cell(10, 7, ' ', 'R', 0, 'L');
    $pdf->SetFont('Times','',11);
$pdf->Cell(10, 7, ' ', '0', 0, 'L');
$pdf->Cell(76, 3.5, 'Procurement and Management', 'R', 0, 'L');
    $pdf->SetFont('Times','B',7.5);
$pdf->Cell(15, 3.5, '', 'R', 0, 'C');
$pdf->Cell(15, 3.5, '', '0', 0, 'C');
    $pdf->SetFont('Times','B',8);
$pdf->Cell(60, 3.5, 'Atty. REVELYN C. ABDUHALIM', 'LR', 0, 'C');
    $pdf->SetFont('Times','',11);
$pdf->Cell(14, 3.5, '', '0', 1, 'L');

$pdf->Cell(10, 7, ' ', 'R', 0, 'L');
$pdf->Cell(86, 3.5, '', 'LRB', 0, 'L');
$pdf->Cell(15, 3.5, '', 'BR', 0, 'C');
$pdf->Cell(15, 3.5, '', 'B', 0, 'C');
    $pdf->SetFont('Times','',8);
$pdf->Cell(60, 3.5, 'OIC, General Services Division', 'LRB', 0, 'C');
$pdf->Cell(14, 3.5, '', 'B', 1, 'L');

$pdf->setFillColor(255,255,255);
$pdf->Cell(10,1,'','TL',0,'C',true);
$pdf->Cell(86,1,'','TLR',0,'C',true);
$pdf->Cell(15,1,'','TLR',0,'C',true);
$pdf->Cell(15,1,'','TLR',0,'C',true);
$pdf->Cell(60,1,'','TLR',0,'C',true);
$pdf->Cell(14,1,'','TLR',1,'C',true);

$pdf->SetFont('Times','',10);
$pdf->Cell(10, 7, ' ', 'LB', 0, 'L');
$pdf->Cell(10, 7, ' ', 'LB', 0, 'L');
$pdf->Cell(76, 7, 'b. Human Resources Division', 'B', 0, 'L');

$pdf->SetFont('Times','B',7.5);
$pdf->Cell(15, 7, '', 'LBR', 0, 'C');
$pdf->Cell(15, 7, '', 'B', 0, 'C');


$pdf->SetFont('Times','B',8);
$pdf->Cell(60, 3.5, 'CYNTHIA C. VALLESTEROS', 'LR', 0, 'C');
$pdf->SetFont('Times','B',8);
$pdf->Cell(14, 3.5, '', '0', 1, 'L');

$pdf->Cell(126, 3.5, '', '0', 0, 'L');
$pdf->SetFont('Times','',8);
$pdf->Cell(60, 3.5, 'Chief, HRD', 'LRB', 0, 'C');
$pdf->Cell(14, 3.5, '', 'B', 1, 'L');

$pdf->setFillColor(255,255,255);
$pdf->Cell(10,1,'','TLR',0,'C',true);
$pdf->Cell(86,1,'','TLR',0,'C',true);
$pdf->Cell(15,1,'','TLR',0,'C',true);
$pdf->Cell(15,1,'','TLR',0,'C',true);
$pdf->Cell(60,1,'','TLR',0,'C',true);
$pdf->Cell(14,1,'','TLR',1,'C',true);

$pdf->setFillColor(255,255,255);
$pdf->Cell(10, 7, ' ', 'R', 0, 'L');
$pdf->Cell(86, 3.5, '', 'LR', 0, 'L');
    $pdf->SetFont('Times','B',7.5);
$pdf->Cell(15, 3.5, '', 'R', 0, 'C');
$pdf->Cell(15, 3.5, '', '0', 0, 'C');
    $pdf->SetFont('Times','B',8);
$pdf->Cell(60, 3.5, 'SORAYA C. DE GUZMAN', 'LR', 0, 'C');
    $pdf->SetFont('Times','',11);
$pdf->Cell(14, 3.5, '', '0', 1, 'L');

$pdf->Cell(10, 7, ' ', 'R', 0, 'L');
$pdf->Cell(10, 7, ' ', '0', 0, 'L');
$pdf->Cell(76, 3.5, '', 'R', 0, 'L');
$pdf->Cell(15, 3.5, '', 'BR', 0, 'C');
$pdf->Cell(15, 3.5, '', 'B', 0, 'C');
$pdf->SetFont('Times','',8);
$pdf->Cell(60, 3.5, 'Chairperson, BOD, PSEMCO', 'LRB', 0, 'C');
$pdf->Cell(14, 3.5, '', 'B', 1, 'L');

$pdf->setFillColor(255,255,255);
$pdf->Cell(10,1,'','LR',0,'C',true);
$pdf->Cell(86,1,'','LR',0,'C',true);
$pdf->Cell(15,1,'','TLR',0,'C',true);
$pdf->Cell(15,1,'','TLR',0,'C',true);
$pdf->Cell(60,1,'','TLR',0,'C',true);
$pdf->Cell(14,1,'','TLR',1,'C',true);

$pdf->setFillColor(255,255,255);
$pdf->Cell(10, 7, ' ', 'R', 0, 'L');
    $pdf->SetFont('Times','',11);
$pdf->Cell(10, 7, ' ', '0', 0, 'L');
$pdf->Cell(76, 3.5, 'c. PSA-accredited Union/Coperative', 'R', 0, 'L');
    $pdf->SetFont('Times','B',7.5);
$pdf->Cell(15, 3.5, '', 'R', 0, 'C');
$pdf->Cell(15, 3.5, '', '0', 0, 'C');
    $pdf->SetFont('Times','B',8);
$pdf->Cell(60, 3.5, 'EMELITA D. PORTODO', 'LR', 0, 'C');
    $pdf->SetFont('Times','',11);
$pdf->Cell(14, 3.5, '', '0', 1, 'L');

$pdf->Cell(10, 7, ' ', '0', 0, 'L');
$pdf->Cell(86, 3.5, '', 'R', 0, 'L');
$pdf->Cell(15, 3.5, '', 'BR', 0, 'C');
$pdf->Cell(15, 3.5, '', 'B', 0, 'C');
    $pdf->SetFont('Times','',8);
$pdf->Cell(60, 3.5, 'Accountant, CPFI', 'LRB', 0, 'C');
$pdf->Cell(14, 3.5, '', 'B', 1, 'L');

$pdf->setFillColor(255,255,255);
$pdf->Cell(10,1,'','LR',0,'C',true);
$pdf->Cell(86,1,'','LR',0,'C',true);
$pdf->Cell(15,1,'','LR',0,'C',true);
$pdf->Cell(15,1,'','LR',0,'C',true);
$pdf->Cell(60,1,'','LR',0,'C',true);
$pdf->Cell(14,1,'','LR',1,'C',true);

$pdf->setFillColor(255,255,255);
$pdf->Cell(10, 7, ' ', 'R', 0, 'L');
    $pdf->SetFont('Times','',11);
$pdf->Cell(10, 7, ' ', '0', 0, 'L');
$pdf->Cell(76, 3.5, '', 'R', 0, 'L');
    $pdf->SetFont('Times','B',7.5);
$pdf->Cell(15, 3.5, '', 'R', 0, 'C');
$pdf->Cell(15, 3.5, '', '0', 0, 'C');
    $pdf->SetFont('Times','B',8);
$pdf->Cell(60, 3.5, 'ENGR. FREDERICK O. SAGARINO', 'LR', 0, 'C');
    $pdf->SetFont('Times','',11);
$pdf->Cell(14, 3.5, '', '0', 1, 'L');

$pdf->Cell(10, 7, ' ', 'R', 0, 'L');
$pdf->Cell(86, 3.5, '', 'LRB', 0, 'L');
$pdf->Cell(15, 3.5, '', 'BR', 0, 'C');
$pdf->Cell(15, 3.5, '', 'B', 0, 'C');
    $pdf->SetFont('Times','',8);
$pdf->Cell(60, 3.5, 'President-USE', 'LRB', 0, 'C');
$pdf->Cell(14, 3.5, '', 'B', 1, 'L');

$pdf->setFillColor(192,192,192);
    $pdf->SetFont('Times','',11);
$pdf->Cell(10,5,'',1,0,'C',true);
$pdf->Cell(190,5,'2. Library',1,1,'L',true);

$pdf->setFillColor(255,255,255);
$pdf->Cell(10,1,'','TL',0,'C',true);
$pdf->Cell(86,1,'','TLR',0,'C',true);
$pdf->Cell(15,1,'','TLR',0,'C',true);
$pdf->Cell(15,1,'','TLR',0,'C',true);
$pdf->Cell(60,1,'','TLR',0,'C',true);
$pdf->Cell(14,1,'','TLR',1,'C',true);

$pdf->SetFont('Times','',11);
$pdf->Cell(10, 7, ' ', 'LB', 0, 'L');
$pdf->Cell(10, 7, ' ', 'LB', 0, 'L');
$pdf->Cell(76, 7, 'a. Legal Office Library', 'B', 0, 'L');

$pdf->SetFont('Times','B',7.5);
$pdf->Cell(15, 7, '', 'LBR', 0, 'C');
$pdf->Cell(15, 7, '', 'B', 0, 'C');

$pdf->SetFont('Times','B',8);
$pdf->Cell(60, 3.5, '', 'LR', 0, 'C'); //insert name of officer if naa na
$pdf->SetFont('Times','B',8);
$pdf->Cell(14, 3.5, '', '0', 1, 'L');


$pdf->Cell(126, 3.5, '', '0', 0, 'L');
$pdf->SetFont('Times','',8);
$pdf->Cell(60, 3.5, '', 'LRB', 0, 'C');//position of officer is naa na
$pdf->Cell(14, 3.5, '', 'B', 1, 'L');




$pdf->setFillColor(255,255,255);
$pdf->Cell(10,1,'','TL',0,'C',true);
$pdf->Cell(86,1,'','TLR',0,'C',true);
$pdf->Cell(15,1,'','TLR',0,'C',true);
$pdf->Cell(15,1,'','TLR',0,'C',true);
$pdf->Cell(60,1,'','TLR',0,'C',true);
$pdf->Cell(14,1,'','TLR',1,'C',true);


$pdf->SetFont('Times','',11);
$pdf->Cell(10, 7, ' ', 'LB', 0, 'L');
$pdf->Cell(10, 7, ' ', 'LB', 0, 'L');
$pdf->Cell(76, 7, 'b. Library Services', 'B', 0, 'L');


$pdf->SetFont('Times','B',7.5);
$pdf->Cell(15, 7, '', 'LBR', 0, 'C');
$pdf->Cell(15, 7, '', 'B', 0, 'C');


$pdf->SetFont('Times','B',8);
$pdf->Cell(60, 3.5, 'CINDY B. DUMALOAN', 'LR', 0, 'C');
$pdf->SetFont('Times','B',8);
$pdf->Cell(14, 3.5, '', '0', 1, 'L');


$pdf->Cell(126, 3.5, '', '0', 0, 'L');
$pdf->SetFont('Times','',8);
$pdf->Cell(60, 3.5, 'Property Custodian-Designate (PSO)', 'LRB', 0, 'C');
$pdf->Cell(14, 3.5, '', 'B', 1, 'L');


$pdf->setFillColor(192,192,192);
    $pdf->SetFont('Times','',11);
$pdf->Cell(10,5,'',1,0,'C',true);
$pdf->Cell(190,5,'3. Finance and Assets Management',1,1,'L',true);


//
$pdf->setFillColor(255,255,255);
$pdf->Cell(10,1,'','TL',0,'C',true);
$pdf->Cell(86,1,'','TLR',0,'C',true);
$pdf->Cell(15,1,'','TLR',0,'C',true);
$pdf->Cell(15,1,'','TLR',0,'C',true);
$pdf->Cell(60,1,'','TLR',0,'C',true);
$pdf->Cell(14,1,'','TLR',1,'C',true);


$pdf->SetFont('Times','',11);
$pdf->Cell(10, 7, ' ', 'LB', 0, 'L');
$pdf->Cell(10, 7, ' ', 'LB', 0, 'L');
$pdf->Cell(76, 7, 'a. Cashier', 'B', 0, 'L');


$pdf->SetFont('Times','B',7.5);
$pdf->Cell(15, 7, '', 'LBR', 0, 'C');
$pdf->Cell(15, 7, '', 'B', 0, 'C');


$pdf->SetFont('Times','B',8);
$pdf->Cell(60, 3.5, 'NEIL LESTER A. GIMENO', 'LR', 0, 'C');
$pdf->SetFont('Times','B',8);
$pdf->Cell(14, 3.5, '', '0', 1, 'L');


$pdf->Cell(126, 3.5, '', '0', 0, 'L');
$pdf->SetFont('Times','',8);
$pdf->Cell(60, 3.5, 'Cashier (PSO)', 'LRB', 0, 'C');
$pdf->Cell(14, 3.5, '', 'B', 1, 'L');


//
$pdf->setFillColor(255,255,255);
$pdf->Cell(10,1,'','TL',0,'C',true);
$pdf->Cell(86,1,'','TLR',0,'C',true);
$pdf->Cell(15,1,'','TLR',0,'C',true);
$pdf->Cell(15,1,'','TLR',0,'C',true);
$pdf->Cell(60,1,'','TLR',0,'C',true);
$pdf->Cell(14,1,'','TLR',1,'C',true);


$pdf->SetFont('Times','',11);
$pdf->Cell(10, 7, ' ', 'LB', 0, 'L');
$pdf->Cell(10, 7, ' ', 'LB', 0, 'L');
$pdf->Cell(76, 7, 'b. Accounting (RSSO/PSO)', 'B', 0, 'L');


$pdf->SetFont('Times','B',7.5);
$pdf->Cell(15, 7, '', 'LBR', 0, 'C');
$pdf->Cell(15, 7, '', 'B', 0, 'C');


$pdf->SetFont('Times','B',8);
$pdf->Cell(60, 3.5, 'ELAINE CLAIRE D. ALALONG', 'LR', 0, 'C');
$pdf->SetFont('Times','B',8);
$pdf->Cell(14, 3.5, '', '0', 1, 'L');


$pdf->Cell(126, 3.5, '', '0', 0, 'L');
$pdf->SetFont('Times','',8);
$pdf->Cell(60, 3.5, 'Accounting I (PSO)', 'LRB', 0, 'C');
$pdf->Cell(14, 3.5, '', 'B', 1, 'L');


//
$pdf->setFillColor(255,255,255);
$pdf->Cell(10,1,'','TL',0,'C',true);
$pdf->Cell(86,1,'','TLR',0,'C',true);
$pdf->Cell(15,1,'','TLR',0,'C',true);
$pdf->Cell(15,1,'','TLR',0,'C',true);
$pdf->Cell(60,1,'','TLR',0,'C',true);
$pdf->Cell(14,1,'','TLR',1,'C',true);


$pdf->SetFont('Times','',11);
$pdf->Cell(10, 7, ' ', 'LB', 0, 'L');
$pdf->Cell(10, 7, ' ', 'LB', 0, 'L');
$pdf->Cell(76, 7, 'c. Accounting Division', 'B', 0, 'L');


$pdf->SetFont('Times','B',7.5);
$pdf->Cell(15, 7, '', 'LBR', 0, 'C');
$pdf->Cell(15, 7, '', 'B', 0, 'C');


$pdf->SetFont('Times','B',8);
$pdf->Cell(60, 3.5, 'MARIA CELESTE DL. BALANZA', 'LR', 0, 'C');
$pdf->SetFont('Times','B',8);
$pdf->Cell(14, 3.5, '', '0', 1, 'L');


$pdf->Cell(126, 3.5, '', '0', 0, 'L');
$pdf->SetFont('Times','',8);
$pdf->Cell(60, 3.5, 'OIC, Accounting Division', 'LRB', 0, 'C');
$pdf->Cell(14, 3.5, '', 'B', 1, 'L');


$pdf->setFillColor(192,192,192);
    $pdf->SetFont('Times','',11);
$pdf->Cell(10,5,'',1,0,'C',true);
$pdf->Cell(190,5,'4. Professional and Institutional Development',1,1,'L',true);


//
$pdf->setFillColor(255,255,255);
$pdf->Cell(10,1,'','TL',0,'C',true);
$pdf->Cell(86,1,'','TLR',0,'C',true);
$pdf->Cell(15,1,'','TLR',0,'C',true);
$pdf->Cell(15,1,'','TLR',0,'C',true);
$pdf->Cell(60,1,'','TLR',0,'C',true);
$pdf->Cell(14,1,'','TLR',1,'C',true);


$pdf->SetFont('Times','',10);
$pdf->Cell(10, 7, ' ', 'LB', 0, 'L');
$pdf->Cell(10, 7, ' ', 'LB', 0, 'L');
$pdf->Cell(76, 7, 'a. Scholarship Services', 'B', 0, 'L');


$pdf->SetFont('Times','B',7.5);
$pdf->Cell(15, 7, '', 'LBR', 0, 'C');
$pdf->Cell(15, 7, '', 'B', 0, 'C');


$pdf->SetFont('Times','B',8);
$pdf->Cell(60, 3.5, '', 'LR', 0, 'C'); //name of officer
$pdf->SetFont('Times','B',8);
$pdf->Cell(14, 3.5, '', '0', 1, 'L');


$pdf->Cell(126, 3.5, '', '0', 0, 'L');
$pdf->SetFont('Times','',8);
$pdf->Cell(60, 3.5, '', 'LRB', 0, 'C'); //position of officer
$pdf->Cell(14, 3.5, '', 'B', 1, 'L');


$pdf->setFillColor(0,0,0);
$pdf->Cell(200,0.5,'',1,1,'C',true);
$pdf->setFillColor(255,255,255);
$pdf->SetFont('Times','B',11);
$pdf->Cell(10, 6, ' IV', '1', 0, 'L');
$pdf->Cell(190, 6, 'CERTIFICATION OF NO PENDING ADMINISTRATIVE CASE:', 'TRB', 1, 'L');




//
$pdf->setFillColor(255,255,255);
$pdf->Cell(10,1,'','TL',0,'C',true);
$pdf->Cell(86,1,'','TLR',0,'C',true);
$pdf->Cell(15,1,'','TLR',0,'C',true);
$pdf->Cell(15,1,'','TLR',0,'C',true);
$pdf->Cell(60,1,'','TLR',0,'C',true);
$pdf->Cell(14,1,'','TLR',1,'C',true);


$pdf->SetFont('Times','',11);
$pdf->Cell(10, 7, ' ', 'LB', 0, 'L');
$pdf->Cell(10, 7, ' ', 'LB', 0, 'L');
$pdf->Cell(76, 7, '1. Legal Services', 'B', 0, 'L');


$pdf->SetFont('Times','B',7.5);
$pdf->Cell(15, 7, '', 'LBR', 0, 'C');
$pdf->Cell(15, 7, '', 'B', 0, 'C');


$pdf->SetFont('Times','B',8);
$pdf->Cell(60, 3.5, 'ELIEZER P. AMBATALI', 'LR', 0, 'C');
$pdf->SetFont('Times','B',8);
$pdf->Cell(14, 3.5, '', '0', 1, 'L');


$pdf->Cell(126, 3.5, '', '0', 0, 'L');
$pdf->SetFont('Times','',8);
$pdf->Cell(60, 3.5, 'Director III', 'LRB', 0, 'C');
$pdf->Cell(14, 3.5, '', 'B', 1, 'L');



$pdf->setFillColor(255,255,255);
$pdf->Cell(10,1,'','TLR',0,'C',true);
$pdf->Cell(86,1,'','TL',0,'C',true);
$pdf->Cell(15,1,'','T',0,'C',true);
$pdf->Cell(15,1,'','T',0,'C',true);
$pdf->Cell(60,1,'','T',0,'C',true);
$pdf->Cell(14,1,'','T',1,'C',true);




$pdf->SetFont('Times','',10);
$pdf->Cell(10, 4, ' ', 'L', 0, 'L');
$pdf->Cell(10, 4, ' ', 'L', 0, 'L');
$pdf->Cell(5, 4, ' ', '1', 0, 'L');
$pdf->Cell(5, 4, ' ', '0', 0, 'L');
$pdf->Cell(76, 4, 'With pending administrative case', '0', 1, 'L');


$pdf->setFillColor(255,255,255);
$pdf->Cell(10,1,'','L',0,'C',true);
$pdf->Cell(86,1,'','L',0,'C',true);
$pdf->Cell(15,1,'','0',0,'C',true);
$pdf->Cell(15,1,'','0',0,'C',true);
$pdf->Cell(60,1,'','0',0,'C',true);
$pdf->Cell(14,1,'','0',1,'C',true);


$pdf->SetFont('Times','',10);
$pdf->Cell(10, 4, ' ', 'L', 0, 'L');
$pdf->Cell(10, 4, ' ', 'L', 0, 'L');
$pdf->Cell(5, 4, ' ', '1', 0, 'L');
$pdf->Cell(5, 4, ' ', '0', 0, 'L');
$pdf->Cell(76, 4, 'With ongoing investigation (no formal charge yet)', '0', 1, 'L');


$pdf->setFillColor(255,255,255);
$pdf->Cell(10,1,'','LRB',0,'C',true);
$pdf->Cell(10,1,'','LB',0,'C',true);
$pdf->Cell(5,1,'','TB',0,'C',true);
$pdf->Cell(175,1,'','RB',1,'C',true);



$pdf->setFillColor(0,0,0);
$pdf->Cell(200,0.5,'',1,1,'C',true);
$pdf->setFillColor(255,255,255);
$pdf->SetFont('Times','B',11);
$pdf->Cell(10, 6, ' V', '1', 0, 'L');
$pdf->Cell(190, 6, 'CERTIFICATION', 'TRB', 1, 'C');

$pdf->SetFont('Times','',11);
$pdf->Cell(10, 5, ' ', 'LR', 0, 'L');
$pdf->Cell(190, 5, 'I hereby ceretify that this employee is cleared of work-related, money and property accountabilities from the Philippine', 'LR', 1, 'l');

$pdf->Cell(10, 5, ' ', 'LR', 0, 'L');
$pdf->Cell(190, 5, 'Statistics Authority (PSA). This certification includes no pending administrative case from the PSA.', 'LR', 1, 'l');


$pdf->Cell(10, 5, ' ', 'LR', 0, 'L');
$pdf->Cell(190, 5, '', 'LR', 1, 'l');
$pdf->Cell(10, 5, ' ', 'LR', 0, 'L');
$pdf->Cell(190, 5, '', 'LR', 1, 'l');

$pdf->SetFont('Times','B',11);
$pdf->Cell(10, 5, ' ', 'LR', 0, 'L');
$pdf->Cell(190, 5, 'CLAIRE DENNIS S. MAPA, Ph.D.', 'LR', 1, 'C');

$pdf->SetFont('Times','',11);
$pdf->Cell(10, 4, ' ', 'LR', 0, 'L');
$pdf->Cell(190, 4, 'Undersecretary', 'LR', 1, 'C');

$pdf->SetFont('Times','',11);
$pdf->Cell(10, 4, ' ', 'LR', 0, 'L');
$pdf->Cell(190, 4, 'National Statistics and Civil Registar General', 'LR', 1, 'C');


$pdf->Output();
exit();