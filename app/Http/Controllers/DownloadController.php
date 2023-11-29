<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Response;

class DownloadController extends Controller
{
    public function download()
    {
        $csvData = "Last Name,First Name,Middle Name,Suffix,Sex,Marital Status,Birth Date,Address,Contact Number,Email,Eligibility,Educational Attainment";
    
        return Response::make($csvData, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="PSAEmployeeDetail-Template.csv"',
        ]);
    }
}