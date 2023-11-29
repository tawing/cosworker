<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class DeactivatedController extends Controller
{
    public function displaydeactivated (){
        $user = Session::get('user');
        $deact = DB::select('SELECT *, deactivation.deactivate_name FROM employees
        INNER JOIN deactivation ON deactivation.deactivation_id = employees.deactivation_id where deactivate = 1
        ');
        return view('deactivated', [
            'deact' => $deact,
            'user' => $user
        ]);
    }  
    
}
