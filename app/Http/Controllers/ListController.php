<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ListController extends Controller
{
    public function activeemp()
    {
        $active = DB::select('SELECT * FROM employees WHERE employees.activate = 1');
        $user = Session::get('user');
        return view('list', [
            'activelist' => $active,
            'title' => "Active Employee",
            'user' => $user
        ]);
    }

    public function inactiveemp()
    {
        $inactive = DB::select('SELECT * FROM employees WHERE employees.activate = 0');
        $user = Session::get('user');
        return view('list', [
            'inactivelist' => $inactive,
            'title' => "Inactive Employee",
            'user' => $user
        ]);
    }
}
