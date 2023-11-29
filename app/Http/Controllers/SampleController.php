<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use DateTime;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;


class SampleController extends BaseController
{
    public function processRequest(Request $request, $id, $employee_id)
    {
        $currentDateTime = date('Y-m-d H:i:s');
        $action = $request->input('action');
        $user = Session::get('user');
        if ($action === 'reject') {
            DB::select("UPDATE pendings
            SET penstatus_id = 3
            WHERE pending_id = $id;");

            // Recents Log 
            
            DB::insert('INSERT INTO recents (datetime, recstats_id, users_id, employee_id) VALUES (?, ?, ?, ?)', [
                $currentDateTime, 10, $user->users_id, $employee_id
            ]);

            return redirect()->back()->with('success', 'The request has been rejected.');
        } elseif ($action === 'approve') {
            DB::select("UPDATE pendings
            SET penstatus_id = 2
            WHERE pending_id = $id;");

            // Recents Log 
            DB::insert('INSERT INTO recents (datetime, recstats_id, users_id, employee_id) VALUES (?, ?, ?, ?)', [
                $currentDateTime, 11, $user->users_id, $employee_id
            ]);
            return redirect()->back()->with('success', 'The request has been accepted.');
        }

    }

    public function index(){
        $user = Session::get('user');
        $count = DB::select('SELECT COUNT(*) as count FROM employees');
        $active = DB::select('SELECT COUNT(*) as count FROM EMPLOYEES
        WHERE activate = 1');
        $inactive = DB::select('SELECT COUNT(*) as count FROM EMPLOYEES
        WHERE activate = 0');
        $blacklist = DB::select('SELECT COUNT(DISTINCT employee_id) AS count
        FROM employees 
        WHERE employees.blacklist = 1
        ');
        $certificate = DB::select('SELECT COUNT(*) as count FROM logs');
        $totalCert = $blacklist[0]->count + $certificate[0]->count;
        $pendings = DB::select('SELECT 
        pendings.*, 
        employees.lastname AS e_last, 
        employees.firstname AS e_first,
        employees.middlename AS e_middle,
        employees.name_ext AS e_ext,
        educations.educ_name,
        users.lastname AS u_last, 
        users.firstname AS u_first,
        users.middlename AS u_middle,
        pendings.training AS training
        FROM pendings
        INNER JOIN employees ON pendings.employee_id = employees.employee_id
        INNER JOIN users ON users.users_id = pendings.users_id
        INNER JOIN (
        SELECT educ_id, LEFT(educ_name, 100000) AS educ_name
        FROM educations
        ) AS educations ON employees.educ_id = educations.educ_id;
        ');
        $recents = DB::select('SELECT  recents.*, 
                users.lastname AS u_last, 
                users.firstname AS u_first, 
                users.middlename AS u_mid, 
                employees.lastname AS e_last, 
                employees.firstname AS e_first, 
                employees.middlename AS e_mid, 
                recents_status.action as action 
        FROM recents
        INNER JOIN recents_status
            ON recents_status.recstats_id = recents.recstats_id
        INNER JOIN users
            ON users.users_id = recents.users_id
        INNER JOIN employees
            ON employees.employee_id = recents.employee_id
        ORDER BY recents.recent_id DESC;
        ');
//dd($recents);
        function time_elapsed_string($datetime, $full = false) {
            $now = new DateTime;
            $ago = new DateTime($datetime);
            $diff = $now->diff($ago);
        
            $diff->w = floor($diff->d / 7);
            $diff->d -= $diff->w * 7;
        
            $string = array(
                'y' => 'year',
                'm' => 'month',
                'w' => 'week',
                'd' => 'day',
                'h' => 'hr',
                'i' => 'min',
                's' => 'sec',
            );
            foreach ($string as $k => &$v) {
                if ($diff->$k) {
                    $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
                } else {
                    unset($string[$k]);
                }
            }
        
            if (!$full) $string = array_slice($string, 0, 1);
            return $string ? implode(', ', $string) . ' ' : 'just now';
        }
        
        $elapsed = [];
        
        foreach($recents as $key => $data){
            $elapsed[$key] = time_elapsed_string($data->datetime);
        }

        if($user != NULL){
            return view('/home', [
                'count' => $count,
                'active' => $active,
                'inactive' => $inactive,
                'blacklist' => $blacklist,
                'certificate' => $certificate,
                'totalCert' => $totalCert,
                'pendings' => $pendings,
                'recents' => $recents,
                'elapsed' => $elapsed,
                'user' => $user
            ]);
        }
        else{
            return view('/try');
        }
        
    }
}

