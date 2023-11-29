<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class LogsController extends Controller
{
    public function certificate_log (){
        $user = Session::get('user');
        $certificate_log = DB::select("SELECT *, users.lastname AS userlname, users.firstname AS userfname, users.middlename AS usermname, employees.lastname AS emlname, employees.firstname AS emfname, employees.name_ext AS emmname FROM logs
        INNER JOIN users
        ON users.users_id = logs.users_id
        INNER JOIN employees
        ON employees.employee_id = logs.employee_id");
        //$certificatelog = DB::table('certificates')
        //->select('*')
        //->get();
        //dd($certificatelog);
        return view('certificatelogs', [
            'cer_logs' => $certificate_log,
            'user' => $user
        ]);
    }

    public function blacklist_log ()
    {
        $user = Session::get('user');
        $blacklist_log = DB::select("SELECT *, users.lastname AS ulast, users.firstname AS ufirst, users.middlename AS umid, employees.lastname AS elast, employees.firstname AS efirst, employees.middlename AS emid, employees.name_ext AS esuff FROM blacklistlogs 
        INNER JOIN users 
        ON users.users_id = blacklistlogs.users_id
        INNER JOIN employees
        ON employees.employee_id = blacklistlogs.employee_id");
        return view('blacklistlogs', [
            'user' => $user,
            'black_logs' => $blacklist_log
        ]);
    }

    public function total_cert (){
        $user = Session::get('user');
        $total_cert = DB::select("SELECT employees.blacklist, logs.*, users.lastname AS userlname, users.firstname AS userfname, users.middlename AS usermname, employees.lastname AS emlname, employees.firstname AS emfname, employees.name_ext AS emmname, NULL AS ulast, NULL AS ufirst, NULL AS umid, NULL AS elast, NULL AS efirst, NULL AS emid, NULL AS esuff
        FROM logs
        INNER JOIN users
        ON users.users_id = logs.users_id
        INNER JOIN employees
        ON employees.employee_id = logs.employee_id
        
        UNION
        
        SELECT employees.blacklist, blacklistlogs.*, users.lastname AS userlname, users.firstname AS userfname, users.middlename AS usermname, employees.lastname AS emlname, employees.firstname AS emfname, employees.middlename AS emmname, users.lastname AS ulast, users.firstname AS ufirst, users.middlename AS umid, employees.lastname AS elast, employees.firstname AS efirst, employees.middlename AS emid, employees.name_ext AS esuff
        FROM blacklistlogs
        INNER JOIN users
        ON users.users_id = blacklistlogs.users_id
        INNER JOIN employees
        ON employees.employee_id = blacklistlogs.employee_id");
        //dd($total_cert);
        return view('totalcertificates', [
            'total_cert' => $total_cert,
            'user' => $user
        ]);
    }
}