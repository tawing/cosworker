<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PDFController extends Controller
{
    public function generatePDF()
    {
        $employees = DB::table('employees')
        ->select('*')
        ->join('educations', 'educations.educ_id', '=', 'employees.educ_id')
        ->get();

        return view('pdf_employeelist', [
            'employees' => $employees
        ]);
    }

    public function employeePDF($id)
    {
        $emp_data = DB::select("SELECT *
        FROM employees
        INNER JOIN educations ON educations.educ_id = employees.educ_id
        INNER JOIN project_employee ON project_employee.employee_id = employees.employee_id
        INNER JOIN blacklist_remarks ON blacklist_remarks.remarkid = project_employee.blacklist_id
        WHERE employees.employee_id = $id
        LIMIT 1;
        ");

   
        $projects = DB::select("SELECT *
        FROM project_employee
        INNER JOIN projects ON projects.project_id = project_employee.project_id
        INNER JOIN employees ON project_employee.employee_id = employees.employee_id
        INNER JOIN project_positions ON project_positions.proj_pos_id = project_employee.proj_pos_id
        WHERE project_employee.employee_id = $id
        ORDER BY project_employee.projemploy_id DESC
        LIMIT 1;
        ");

        // Recents 
        $currentDateTime = date('Y-m-d H:i:s');
        $user = Session::get('user');
        DB::insert('INSERT INTO recents (datetime, recstats_id, users_id, employee_id) VALUES (?, ?, ?, ?)', [
            $currentDateTime, 8, $user->users_id, $id
        ]);
        // Recents 

        return view('pdf_employeeprofile', [
            'employee' => $emp_data,
            'projects' => $projects
        ]);
    }

    public function clearancePDF($id)
    {
        $emp_data = DB::select("SELECT *
        FROM employees
        INNER JOIN educations ON educations.educ_id = employees.educ_id
        INNER JOIN project_employee ON project_employee.employee_id = employees.employee_id
        INNER JOIN blacklist_remarks ON blacklist_remarks.remarkid = project_employee.blacklist_id
        WHERE employees.employee_id = $id
        LIMIT 1;
        ");

        $projects = DB::select("SELECT *
        FROM project_employee
        INNER JOIN projects ON projects.project_id = project_employee.project_id
        INNER JOIN employees ON project_employee.employee_id = employees.employee_id
        INNER JOIN project_positions ON project_positions.proj_pos_id = project_employee.proj_pos_id
        WHERE project_employee.employee_id = $id
        ORDER BY project_employee.projemploy_id DESC
        LIMIT 1;
        ");

        return view('pdf_clearance', [
            'employee' => $emp_data,
            'projects' => $projects
        ]);
    }

    public function projectsPDF()
    {
        $projects = DB::select("SELECT * FROM projects
        INNER JOIN project_status 
        ON project_status.projstatus_id = projects.projstatus_id
        ");

        return view('pdf_projects', [
            'projects' => $projects
        ]);
    }

    public function allemployeePDF()
    {
        $employees = DB::select("SELECT employees.*, educations.*
            FROM employees
            INNER JOIN educations ON educations.educ_id = employees.educ_id
        ");

        $employeeData = [];
        foreach ($employees as $employee) {
            $employeeId = $employee->employee_id;

            $projects = DB::select("SELECT projects.*, project_positions.*, project_employee.*
            FROM project_employee
            INNER JOIN projects ON projects.project_id = project_employee.project_id
            INNER JOIN project_positions ON project_positions.proj_pos_id = project_employee.proj_pos_id
            WHERE project_employee.employee_id = $employeeId 
            ");

            $blacklist = DB::select("SELECT *
            FROM project_employee
            INNER JOIN blacklist ON blacklist.blacklist_id = project_employee.blacklist_id
            WHERE project_employee.employee_id = $employeeId AND blacklist.blacklist_id <> 1
            ORDER BY project_employee.projemploy_id DESC
            LIMIT 1;
            ");

            $employeeData[$employeeId] = [
                'employee' => $employee,
                'projects' => $projects,
                'blacklist' => $blacklist
            ];
        }
       
        return view('pdf_allemployeeprofile', [
            'employeeData' => $employeeData
        ]);
    }

    public function deactivatedPDF()
    {
        $deactivated = DB::select("SELECT * FROM employees 
        INNER JOIN educations ON educations.educ_id = employees.educ_id
        WHERE deactivate = 1
        ");

        return view('pdf_deactivated', [
            'deactivated' => $deactivated
        ]);
    }

    public function blacklistPDF()
    {
        $blacklist = DB::select("SELECT * FROM employees 
        INNER JOIN educations ON educations.educ_id = employees.educ_id
        WHERE blacklist = 1
        ");

        return view('pdf_blacklist', [
            'blacklist' => $blacklist
        ]);
    }

    public function coePDF($id, $projid)
    {
        $coe = DB::select("SELECT * FROM project_employee
        INNER JOIN employees ON project_employee.employee_id = employees.employee_id
        INNER JOIN project_positions ON project_positions.proj_pos_id = project_employee.proj_pos_id
        WHERE project_employee.employee_id = $id AND project_employee.projemploy_id = $projid
        ");

        // Recents 
        $currentDateTime = date('Y-m-d H:i:s');
        $user = Session::get('user');
        DB::insert('INSERT INTO recents (datetime, recstats_id, users_id, employee_id) VALUES (?, ?, ?, ?)', [
            $currentDateTime, 2, $user->users_id, $id
        ]);
        // Recents 

        return view('pdf_coe', [
            'coe' => $coe
        ]);
    }

    public function postcoepdf(Request $request)
    {   
        $training = $request->input('training');
        $mandays = $request->input('mandays');
        $startDate1 = $request->input('startDate1');
        $endDate1 = $request->input('endDate1');
        $startDate2 = $request->input('startDate2');
        $endDate2 = $request->input('endDate2');
        $signatory = $request->input('signatory');

        $coe = DB::select("SELECT *
        FROM project_employee
        INNER JOIN projects ON projects.project_id = project_employee.project_id
        INNER JOIN employees ON project_employee.employee_id = employees.employee_id
        INNER JOIN project_positions ON project_positions.proj_pos_id = project_employee.proj_pos_id
        WHERE project_employee.employee_id = $request->employee_id AND project_employee.projemploy_id = $request->projemploy_id
        LIMIT 1
        ");
        $selectedsignatory  = DB::select("SELECT * FROM authorizedsignatory where authorizedID = $signatory");

        // Recents 
        $currentDateTime = date('Y-m-d H:i:s');
        $user = Session::get('user');
        DB::insert('INSERT INTO recents (datetime, recstats_id, users_id, employee_id) VALUES (?, ?, ?, ?)', [
            $currentDateTime, 2, $user->users_id, $request->employee_id
        ]);
        // Recents 

        DB::insert('INSERT INTO logs (date, users_id, employee_id) VALUES (?, ?, ?)', [
            $currentDateTime, $user->users_id, $request->employee_id
        ]);

        return view('pdf_coe', [
            'coe' => $coe,
            'mandays' => $mandays,
            'training' => $training,
            'startDate1' => $startDate1,
            'endDate1' => $endDate1,
            'startDate2' => $startDate2,
            'endDate2' => $endDate2,
            'signatory' => $selectedsignatory

        ]);
    }

    
    
}