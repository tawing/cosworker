<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ProjectsController extends Controller
{
    public function index()
    { 
        $projects = DB::select('SELECT * FROM projects');
        $project_positions = DB::select("SELECT * FROM positions");
        $user = Session::get('user');
        return view('/projects', [
            'user' => $user,
            'projects' => $projects,
            'project_positions' => $project_positions,
        ]);
        
    }

    function getPositions($projectId)
    {
        $positions = DB::select("SELECT * FROM project_positions WHERE project_id = $projectId");
        $positionsArray = [];
        foreach ($positions as $position) {
            $positionsArray[] = $position->name;
        }
        session(['positionarray' => $request->positionarray]);
        return redirect('/projects')->with(['positions' => $positions]);
    }

    public function store(Request $request)
    {   
        dd($request);

        $projectname = $request->input('projectname');
        $focalperson = $request->input('focalperson');
        $description = $request->input('description');
        $duration = $request->input('duration');
        $start = $request->input('start');
        $end = $request->input('end');
        $remarks = $request->input('remarks');

        $positions = $request->input('positions');

        if (is_array($positions)) {
            $positions = implode(",", $positions); // join the array values into a string separated by newline character
        }
        $positions_array = explode(",", $positions); // split the string into an array using the newline character delimiter
        $positions_array = array_filter($positions_array, 'trim'); // remove any blank spaces from the array

        function isDatePassed($date)
        {
            $timestamp = strtotime($date);
            return $timestamp < time();
        }

        $projstatus_id = 0;
        if (isDatePassed($end)) {
            $projstatus_id = 1;
        } else {
            $projstatus_id = 2;
        }

        // check if projectname already exists
        
        $existing_project = DB::table('projects')
            ->where('projectname', $projectname)
            ->first();
        if ($existing_project != null) {
            return redirect('/projects')->with('error', 'Project name already exists.');
        } else {
            // insert new project
            $insert = DB::insert('INSERT INTO projects (projectname, focalperson, project_desc, project_duration, start, end, project_remarks, projstatus_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)', [
                $projectname,
                $focalperson,
                $description,
                $duration,
                $start,
                $end,
                $remarks,
                $projstatus_id,
            ]);
        }

        $project_id = DB::getPdo()->lastInsertId();

        // insert project positions
        foreach ($positions_array as $position) {
            $insert_position = DB::insert('INSERT INTO project_positions (project_id, position) VALUES (?, ?)', [$project_id, $position]);
        }
        return redirect('/projects')->with('success', 'Project added successfully.');
    }


    public function viewproject($id)
    {
        $user = Session::get('user');
        $projectname = DB::select("SELECT * FROM projects where project_id = $id");
        $project = DB::select("SELECT * FROM project_employee
        INNER JOIN employees
        ON project_employee.employee_id = employees.employee_id
        INNER JOIN project_positions 
        ON project_positions.proj_pos_id = project_employee.proj_pos_id
        WHERE project_positions.project_id = $id");
        $totalperproject = DB::select("SELECT COUNT(*) FROM project_employee WHERE project_id = $id ");
        $project_positions = DB::select("SELECT * FROM project_positions where project_id = $id");
        return view('/project_list', [
            'statement' => 'list_projects',
            'projectname' => $projectname,
            'projects' => $project,
            'totalperproject' => $totalperproject,
            'positions' => $project_positions,
            'user' => $user
        ]);
    }


    public function update(Request $request)
    {
        $request->validate([
            'project_id' => 'required|numeric',
        ]);

        $project_id = $request->input('project_id');
        $projectname = $request->input('projectname');
        $focalperson = $request->input('focalperson');
        $project_duration = $request->input('project_duration');
        $description = $request->input('description');
        $start = $request->input('start');
        $end = $request->input('end');
        $totalperproject = $request->input('totalperproject');
        $projstatus_id = $request->input('projstatus_id');
        $remarks = $request->input('remarks');
        $positions = $request->input('positions');

        DB::table('projects')
            ->where('project_id', $project_id)
            ->update([
                'projectname' => $projectname,
                'focalperson' => $focalperson,
                'project_duration' => $project_duration,
                'start' => $start,
                'end' => $end,
                'totalperproject' => $totalperproject,
                'project_remarks' => $remarks,
            ]);

        //$positions = $request->input('positions');
        $orig = [];
        $orig = DB::table('project_positions')
            ->select('position')
            ->where('project_id', $project_id)
            ->pluck('position')
            ->toArray();
        
        if (is_array($positions)) {
            $positions = implode(",", $positions); // join the array values into a string separated by newline character
        }

        $positions_array = explode(",", $positions); // split the string into an array using the newline character delimiter
        $positions_array = array_filter($positions_array, 'trim'); // remove any blank spaces from the array
        $positions_array = array_filter($positions_array, 'strlen');
        //dd($positions_array, $orig);

        // $orig = ["Manager", "Focal Persons"]; // original array
        // $positions_array = ["Manager", "Team Lead", "Developer"]; // array to compare with
        $loopcount = 0;
        $countf = 0;
        $countn = 0;
        //update = same position name dapat
        //what if e 
        foreach ($positions_array as $item) {
            if (in_array($item, $orig)) {
                $countf++;
                //dd($item);
                $projposid = DB::table('project_positions')
                ->select('proj_pos_id')
                ->where('position',$item)
                ->where('project_id',$project_id)
                ->value('proj_pos_id');
                dd($projposid, $item);
                DB::table('project_positions')
                ->where('position',$item)
                ->where('project_id',$project_id)
                ->where('proj_pos_id',$proj_pos_id)
                ->update(['position' => $item]);
            } else {
                $countn++;
                // Value doesn't exist in $orig
            }
            $loopcount++;
        }
        dd($project_id, $orig, $positions_array, $countf, $countn, $loopcount);
        return redirect()->back();
    }
    public function updateTable(Request $request)
    {
        $positions = DB::table('project_positions')
            ->where('project_id', $project_id)
            ->pluck('position');

        // return a JSON response that includes the updated data
        return response()->json([
            'success' => true,
            'positions' => $positions,
        ]);
    }

    public function updatepos(Request $request){
       //dd($request);
       $positionID = $request->input('position_id');
       $positionName = $request->input('position_name');

       DB::table('project_positions')
       ->where('proj_pos_id',$positionID)
       ->update(['position'=> $positionName]);

        return response()->json($positionName);
    }

    public function addpos(Request $request,$id){
        $positionName = $request->input('positions');
        //$projectID = $request->input('project_id');

        //put positionName into an array
        $arrayposname = array();
        foreach($positionName as $position){
            $arrayposname[] = array(
                'position'=>$position
            );
        }
        $origposname = DB::table('project_positions')
        ->select('position')
        ->where('project_id',$id)
        ->get()
        ->toArray();

        foreach ($arrayposname as $key => $value) {
            foreach ($origposname as $origValue) {
                if ($value['position'] === $origValue->position) {
                    // If position already exists in $origposname, remove it from $arrayposname
                    unset($arrayposname[$key]);
                    break;
                }
            }
        }
        
        $uniquePositions = array_values($arrayposname); // Remove keys from array
        $positionsWithoutKey = array_column($uniquePositions, 'position'); // Extract all position values
        foreach($positionsWithoutKey as $posname){
        $positiondata = array(
            'project_id'=>$id,
            'position'=>$posname,   
        );

        DB::table('project_positions')
        ->insert($positiondata);
        return response()->json($positiondata);
    }


        
        return response()->json();
    }
}
