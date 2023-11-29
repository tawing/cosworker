<?php

$pdf = new FPDF();
$pdf->AliasNbPages();
$pdf->AddPage('P', 'A4', 0);
$pdf->Image('assets/img/hbackg.png', 0, 5, 210, 295);
$pdf->SetMargins(20, 20, 40, 20);

    $municity = "Cagayan de Oro City";
    $province = "Misamis Oriental";
    $date = date("Y-m-d");
    $year = date('Y', strtotime($date));
    $month = date('F', strtotime($date));
    $day1 = date('j', strtotime($date));
    $day = date('S', strtotime($date)); 

    $start1year = date('Y', strtotime($startDate1));
    $start1month = date('F', strtotime($startDate1));
    $start1day1 = date('j', strtotime($startDate1));
    $start1day = date('S', strtotime($startDate1));  

    $end1year = date('Y', strtotime($endDate1));
    $end1month = date('F', strtotime($endDate1));
    $end1day1 = date('j', strtotime($endDate1));
    $end1day = date('S', strtotime($endDate1));  
    $daysfrom = "$start1day1-$end1day1";

    $start2year = date('Y', strtotime($startDate2));
    $start2month = date('F', strtotime($startDate2));
    $start2day2 = date('j', strtotime($startDate2));
    $start2day = date('S', strtotime($startDate2));  

    $end2year = date('Y', strtotime($endDate2));
    $end2month = date('F', strtotime($endDate2));
    $end2day2 = date('j', strtotime($endDate2));
    $end2day = date('S', strtotime($endDate2));  
    $daysfrom2 = "$start2day2-$end2day2";

$pdf->SetFont('Times','U',40);
$pdf->Cell(170, 25, '', 0, 1, 'C');
$pdf->Cell(170, 40, 'CERTIFICATION', 0, 1, 'C');
$pdf->Ln(15);
$pdf->SetFont('Times','',14);
$pdf->Cell(170, 5, 'TO WHOM IT MAY CONCERN:', 0, 1,'L');
$pdf->Cell(170, 6, '', 0, 'L');
$pdf->setFillColor(255,255,255); 
if($start1month == $end1month){
    $pdf->MultiCell(170, 9, '           This is to certify that '.$coe[0]->lastname.', '.$coe[0]->firstname. ' '.$coe[0]->middlename.' '.$coe[0]->name_ext. 
                            ' has been employed in this office as ' .$coe[0]->position.' on contract basis assigned in '.$coe[0]->place_region.', '
                            .$coe[0]->place_province.' during the ' .$start1year.' ' .$coe[0]->projectname. ', covering the period from '
                            .$start1month.' '.$daysfrom. ' (training - '.$training.' mandays) and '.$end1month.' '.$daysfrom2. ' ('.$mandays.' mandays).', 0, 'J');
}else{
    $pdf->MultiCell(170, 9, '           This is to certify that '.$coe[0]->lastname.', '.$coe[0]->firstname. ' '.$coe[0]->middlename.' '.$coe[0]->name_ext. 
                            ' has been employed in this office as ' .$coe[0]->position.' on contract basis assigned in '.$coe[0]->place_region.', '
                            .$coe[0]->place_province.' during the ' .$start1year.' ' .$coe[0]->projectname. ', covering the period from '
                            .$start1month.' '.$daysfrom. ' (training - '.$training.' mandays) and '.$end1month.' '.$daysfrom2. ' ('.$mandays.' mandays).', 0, 'J');
}

$pdf->Ln(5);
$pdf->MultiCell(170, 9, '              Further, the above-mentioned person is CLEARED of all his/her accountabilities during the said operation. This certification is issued upon the request of above-named person for whatever purpose it may serve.', 0, 'J');

$pdf->Ln(5);
$pdf->MultiCell(170, 9, '           Issued this '.$day1.$day. ' Day of '.$month.' '.$year. ' at '.$municity.', '.$province.', Philippines.', 0, 'J');


$pdf->Ln(5);
$pdf->Cell(170, 6, '', 0, 1,'L');
$pdf->SetFont('Times','B',11);
$pdf->Cell(100, 6, '', 0, 0,'L');
$pdf->Cell(70, 6, ' '.$signatory[0]->FirstName.' '.$signatory[0]->MiddleName.'. '.$signatory[0]->LastName.' ', 0, 1,'C');
$pdf->Cell(100, 5, '', 0, 0,'L');
$pdf->SetFont('Times','',11);
$pdf->Cell(70, 5, $signatory[0]->Auth_Position, 0, 1,'C');
$pdf->Cell(100, 5, '', 0, 0,'L');
$pdf->Cell(70, 5, 'Officer-In-Charge', 0, 0,'C');

$pdf->Output();
exit();