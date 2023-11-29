<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BlacklistController extends Controller
{
    public function display (){
        $user = Session::get('user');

        $black = DB::select('SELECT *, remarks FROM project_employee 
        INNER JOIN employees
        ON employees.employee_id = project_employee.employee_id
        WHERE blacklist=1');
        return view('blacklist', [
            'black'=> $black,
            'user' => $user
        ]);
    }  
    
}
