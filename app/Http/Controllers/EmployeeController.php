<?php

namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Validator; 
    use Illuminate\Validation\Rule;  
    use Illuminate\Support\Facades\Hash;
    use App\Models\User;
    use Illuminate\Support\Facades\Session;


    class EmployeeController extends Controller
    {   
        public function requestblacklist(Request $request)
        {
            $user = Session::get('user');
            $training = $request->input('training');
            $mandays = $request->input('mandays');
            $startdate1 = $request->input('startdate1');
            $enddate1 = $request->input('enddate1');
            $startdate2 = $request->input('startdate2');
            $enddate2 = $request->input('enddate2');
            $password = $request->input('password');
            $currentDateTime = date('Y-m-d H:i:s');
            $employee_id = $request->input('employee_id');
            $employee = DB::select("SELECT * FROM users WHERE users_ID = $user->users_id");
            if ($employee && Hash::check($password, $employee[0]->password)){
                
                // Pending Log 
                DB::insert('INSERT INTO pendings (date, employee_id, users_id, penstatus_id, training, mandays, startdate1, enddate1, startdate2, enddate2) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [
                    $currentDateTime, $employee_id, $user->users_id, 1, $training, $mandays, $startdate1, $enddate1, $startdate2, $enddate2
                ]);

                // Recents Log 
                DB::insert('INSERT INTO recents (datetime, recstats_id, users_id, employee_id) VALUES (?, ?, ?, ?)', [
                    $currentDateTime, 9, $user->users_id, $employee_id
                ]);

                // make validation nga humana ug deactivate then back to employee list
                return redirect()->back()->with('success', 'success nga message naunsa');
            }
             // make validation nga if mag error ug deactivate then back to employee profile
            return redirect()->back()->with('error', 'Invalid employee ID or password.');
        }
        
        // public function projectupdate(Request $request, $projemploy_id)
        // {
        //     $projemploy_id =  $request->input('projemploy_id');
        //     $m_projectname = $request->input('m_projectname');
        //     $position = $request->input('position');
        //     $salary = $request->input('salary');
        //     $start_date = $request->input('start_date');
        //     $end_date = $request->input('end_date');
        //     $barangaycity = $request->input('barangaycity');
        //     $region = $request->input('region');
        //     $province = $request->input('province');
        //     $projremarks = $request->input('projremarks');
        //     $blacklist = $request->input('blacklist');
        //     $blacklist_remarks = $request->input('blacklist_remarks');
        //     // dd($request);

        //     $project_id = DB::select("SELECT project_id FROM projects WHERE projects.projectname = '$m_projectname'  LIMIT 1");

        //     $proj_pos_id = DB::select("SELECT proj_pos_id FROM project_positions WHERE position = '$position' AND project_id =  $projemploy_id LIMIT 1");
          
        //     // DB::update("UPDATE project_employee
        //     // SET project_id = " . $project_id[0]->project_id . ", Salary = $salary, start = '$start_date',
        //     // end = '$end_date', brgycity = '$barangaycity', place_region = '$region', place_province = '$province', remarks = " . ($projremarks !== null ? "'$projremarks'" : "NULL") . ",
        //     // blacklist_id = " . ($blacklist !== "--SELECT--" ? $blacklist : "NULL") . ", blacklist_remarks = " . ($blacklist_remarks !== null ? "'$blacklist_remarks'" : "NULL") . "
        //     // WHERE projemploy_id = " . $projemploy_id);

        //     $start_date_formatted = date('Y-m-d H:i:s', strtotime($start_date));
        //     $end_date_formatted = date('Y-m-d H:i:s', strtotime($end_date));
            
        //     if (!empty($project_id) && isset($project_id[0])) {
        //         $project_id_value = $project_id[0]->project_id;
        //     } else {
        //         $project_id_value = "NULL"; // Set a default value if the array is empty or does not have an element at index 0
        //     }
            
        //     DB::update("UPDATE project_employee
        //                 SET project_id = " . $project_id_value . ", proj_pos_id = " . $proj_pos_id[0]->proj_pos_id . ", Salary = $salary, start = '$start_date_formatted',
        //                 end = '$end_date_formatted', brgycity = '$barangaycity', place_region = '$region', place_province = '$province', remarks = " . ($projremarks !== null ? "'$projremarks'" : "NULL") . ",
        //                 blacklist_id = " . ($blacklist !== null ? "'$blacklist'" : "NULL") . ", blacklist_remarks = " . ($blacklist_remarks !== null ? "'$blacklist_remarks'" : "NULL") . "
        //                 WHERE projemploy_id = " . $projemploy_id);
            

        //      // make validation nga if mag error ug activate then back to employee profile
        //     return redirect()->back()->with('error', 'Invalid employee ID or password.');
        // }

        public function deleteproject(Request $request)
        { 
            $user = Session::get('user');
            $empid = $request->input('employee_id');
            $password = $request->input('password');
            $projemploy_id = $request->input('projemploy_id');
            $employee = DB::select("SELECT * FROM users WHERE users_ID = $user->users_id");
            $currentDateTime = date('Y-m-d H:i:s');
            if ($employee && Hash::check($password, $employee[0]->password)){
                
                // Update the employees table
                DB::select("DELETE FROM project_employee
                WHERE employee_id = $empid AND projemploy_id = $projemploy_id;");

                // Recents 
                DB::insert('INSERT INTO recents (datetime, recstats_id, users_id, employee_id) VALUES (?, ?, ?, ?)', [
                    $currentDateTime, 8, $user->users_id, $empid
                ]);

                // make validation nga humana ug deactivate then back to employee list
                return redirect()->back()->with('success', 'success nga message naunsa');
            }
             // make validation nga if mag error ug deactivate then back to employee profile
            return redirect()->back()->with('error', 'Invalid employee ID or password.');
        }




        public function activate(Request $request)
        {
            $user = Session::get('user');
            $empid = $request->input('empid');
            $password = $request->input('password');
            $employee = DB::select("SELECT * FROM users WHERE users_ID = $user->users_id");
            $currentDateTime = date('Y-m-d H:i:s');

            if ($employee && Hash::check($password, $employee[0]->password)) {
                // Update the employees table
                DB::select("UPDATE employees
                    SET deactivate = 0, activate = 1
                    WHERE employee_id = $empid;");

                // Add transaction to Activate Logs
                DB::insert('INSERT INTO logs (date, users_id, employee_id) VALUES (?, ?, ?)', [$currentDateTime, $user->users_id, $empid]);

                // Recents
                DB::insert('INSERT INTO recents (datetime, recstats_id, users_id, employee_id) VALUES (?, ?, ?, ?)', [
                    $currentDateTime, 6, $user->users_id, $empid
                ]);

                // make validation nga humana ug activate then back to employee list
                return redirect()->back()->with('success', 'success nga message naunsa');
            }

             // make validation nga if mag error ug activate then back to employee profile
            return redirect()->back()->with('error', 'Invalid employee ID or password.');
        }

        public function deactivate(Request $request)
        { 
            $user = Session::get('user');
            $empid = $request->input('empid');
            $password = $request->input('password');
            $employee = DB::select("SELECT * FROM users WHERE users_ID = $user->users_id");
            $currentDateTime = date('Y-m-d H:i:s');
            if ($employee && Hash::check($password, $employee[0]->password)){
                
                // Update the employees table
                DB::select("UPDATE employees
                SET deactivate = 1, activate = 0
                WHERE employee_id = $empid;");

                // Add transaction to Deactivate Logs
                DB::insert('INSERT INTO logs (date, users_id, employee_id) VALUES (?, ?, ?)', [$currentDateTime, $user->users_id, $empid]);

                // Recents 
                DB::insert('INSERT INTO recents (datetime, recstats_id, users_id, employee_id) VALUES (?, ?, ?, ?)', [
                    $currentDateTime, 5, $user->users_id, $empid
                ]);

                // make validation nga humana ug deactivate then back to employee list
                return redirect()->back()->with('success', 'success nga message naunsa');
            }
             // make validation nga if mag error ug deactivate then back to employee profile
            return redirect()->back()->with('error', 'Invalid employee ID or password.');
        }

        public function views(){
            $user = Session::get('user');
            $emp_list = DB::table('employees')
            ->select('*')
            ->join('educations', 'educations.educ_id', '=', 'employees.educ_id')
            ->get();
            //dd($emp_list);

            $educattain = DB::table('educations')
            ->select('*')
            ->get();
            //dd($educattain);

            $projects = DB::table('projects')
            ->select('*')
            ->get();
            //dd($projects);

            
        return view('employee',[
            'employees' => $emp_list,
            'educattains' => $educattain,
            'projectlist' => $projects,
            'user' => $user
        ]);

        }

        public function profile($id){
            $user = Session::get('user');
            $emp_data = DB::table('employees')
                ->where('employee_id', '=', $id)
                ->join('educations', 'educations.educ_id', '=', 'employees.educ_id')
                ->get();
            
            $educattain = DB::table('educations')
            ->select('*')
            ->get();

            $geteduc = DB::table('educations')
            ->select('*')
            ->join('employees','educations.educ_id','=','employees.educ_id')
            ->where('employee_id',$id)
            ->get();

            $projects = DB::table('projects')
            ->select('*')
            ->get();

            $projectemp = DB::table('project_employee')
            ->select('*')
            ->where('employee_id',$id)
            ->join('projects','projects.project_id','=','project_employee.project_id')
            ->get();

            $projectempremarks = DB::table('project_employee')
            ->select('remarks')
            ->get();
            //dd($projectempremarks);

            $region = DB::table('regions')
            ->select('*')
            ->get();

            // $regionid = DB::table('regions')
            
            
            //dd($projectemp, $projects);

            //dd($emp_data);
            $signatory  = DB::select("SELECT * FROM authorizedsignatory");
            return view('employeeprofile', [
                'employees' => $emp_data,
                'educations' => $educattain,
                'choseneduc' => $geteduc,
                'empid' => $id,
                'projectlist' => $projects,
                'projectemp' => $projectemp,
                'user' => $user,
                'regions' => $region,
                'empremarks' => $projectempremarks,
                'employee_id' => $id,
                'signatory' => $signatory
            ]);
        }
 
        public function addemployee(Request $request){
            $request->validate([
                'lastname' => 'alpha',
                'firstname' => 'string',
                'middlename' => 'alpha',
                'ressuffix' => 'alpha',
                'bday' => 'before_or_equal:'.now()->format('d-m-Y'),
                'number' => 'size:11',
            ]);
            
            $first_name = $request->input('firstname');
            $last_name = $request->input('lastname');
            $middle_name = $request->input('middlename');
            $suffix = $request->input('ressufix');
            $educ = $request->input('educ');
            $eligibility = $request->input('eligibility');
            $bday = $request->input('bday');
            $sex = $request->input('sex');
            $address = $request->input('address');
            $phonenum = $request->input('number');
            $email = $request->input('email');
            $mstatus = $request->input('mstatus');
            $tin = $request->input('tin');
            $agencyempno = $request->input('agencyempno');
            //dd($bday);

            //pag check sa duplicate
            $duplicatecheck = DB::table('employees')
            ->where('lastname',$last_name)
            ->where('firstname',$first_name)
            ->where('middlename',$middle_name)
            ->where('birthdate',$bday)
            ->get();
            if ($duplicatecheck->count() > 0) {
                return redirect()->back()->with('error', 'Duplicate record found!');
            }
            //dd($duplicatecheck,$bday);

            //pag kuha sa ID sa kada keys
            $educid = DB::table('educations')
            ->select('educ_id')
            ->where('educ_name',$educ)
            ->value('educ_id');

            //dd($educid);
            $employeedata=array(
                "firstname"=>$first_name,
                "lastname"=>$last_name,
                "middlename"=>$middle_name,
                "name_ext"=>$suffix,
                "educ_id"=>$educid,
                "gender"=>$sex,
                "address"=>$address,
                "contact_no"=>$phonenum,
                "email"=>$email,
                "eligibility"=>$eligibility,
                "birthdate"=>$bday,
                "marital_status"=>$mstatus, 
                "tin_no"=>$tin,
                "agencyemp_no"=>$agencyempno,           
            );

            DB::table('employees')->insert($employeedata);

            //get employee id
            $getemployeeid = DB::table('employees')
            ->select('employee_id')
            ->orderBy('employee_id','desc')
            ->first();

            //dd($employeedata);
            $employee = (object) $employeedata;
            $currentDateTime = date('Y-m-d H:i:s');
            $user = Session::get('user');

            DB::table('recents')->insert([
                'datetime' => $currentDateTime,
                'users_id' => $user->users_id,
                'employee_id' => $getemployeeid->employee_id
            ]);

            return redirect()->route('employee')
            ->with('status','Employee added successfully.');

            // return redirect()->route('employee.profile', ['id' => $getemployeeid->employee_id])
            // ->with('status','Employee added successfully.');
        }
        public function updateemployee(Request $request){
            $request->validate([
                'lastname' => 'alpha',
                'firstname' => 'string',
                'middlename' => 'alpha',
                'ressuffix' => 'alpha',
                'bday' => 'before_or_equal:'.now()->format('d-m-Y'),
                'contactno' => 'size:11',
            ]);
            
            $empid = $request->input('empid');
            $first_name = $request->input('firstname');
            $last_name = $request->input('lastname');
            $middle_name = $request->input('middlename');
            $suffix = $request->input('ressuffix');
            $educ = $request->input('educ');
            $eligibility = $request->input('eligibility');
            $bday = $request->input('bday');
            $sex = $request->input('sex');
            $address = $request->input('address');
            $phonenum = $request->input('contactno');
            $email = $request->input('email');
            $mstatus = $request->input('mstatus');
            $tin = $request->input('tinno');
            $agencyempno = $request->input('agencyempno');
            //dd($suffix);

            $educid = DB::table('educations')
            ->select('educ_id')
            ->where('educ_name',$educ)
            ->value('educ_id');
           // dd($educid);
            DB::table('employees')
            ->where('employee_id', $empid)
            ->update([
                'firstname' => $first_name,
                'lastname' => $last_name,
                'middlename' => $middle_name,
                'name_ext' => $suffix,
                'educ_id' => $educid,
                'gender' => $sex,
                'address' => $address,
                'contact_no' => $phonenum,
                'email' => $email,
                'eligibility' => $eligibility,
                'birthdate' => $bday,
                'marital_status' => $mstatus,
                'tin_no' => $tin,
                'agencyemp_no'=> $agencyempno
            ]);

            $currentDateTime = date('Y-m-d H:i:s');
            $user = Session::get('user');
            $insert = DB::insert('INSERT INTO recents (datetime, recstats_id, users_id, employee_id) VALUES (?, ?, ?, ?)', [
                $currentDateTime, 4, $user->users_id, $empid
            ]);


            return redirect()->route('employee.profile',['id'=>$empid]);
        }
        
        public function findpositions($projectname){
            $projectid = DB::table('projects')
            ->select('project_id')
            ->where('projectname', $projectname)
            ->value('project_id');
            
            $positions = DB::table('project_positions')
            ->select('position')
            ->where('project_id', $projectid)
            ->get();
            //dd($positions);
            return response()->json($positions);
            //return view('employee');
        }

        public function findprovinces($regionname){

            $regionid = DB::table('regions')
            ->select('region_id')
            ->where('region_name', $regionname)
            ->value('region_id');

            $province = DB::table('provinces')
            ->select('province_name')
            ->where('region_id',$regionid)
            ->get();
            
            return response()->json($province);
        }

        public function addproject(Request $request){
            //dd($request);
            $brgycity = $request->input('barangaycity');
            $remarks = $request->input('projremarks');
            $projectname = $request->input('projectname');
            $position = $request->input('position');
            $startdate = $request->input('startdate');
            $enddate = $request->input('enddate');
            $poa = $request->input('placeofassignment');
            $region = $request->input('region');
            $province = $request->input('province');
            $empid = $request->input('empid');
            $salary = $request->input('salary');

            $projectid = DB::table('projects')
            ->select('project_id')
            ->where('projectname',$projectname)
            ->value('project_id');

            $positionid = DB::table('project_positions')
            ->select('proj_pos_id')
            ->where('position',$position)
            ->value('proj_pos_id');
            //dd($projectid);

            $project = array(
                'employee_id'=>$empid,
                'project_id'=>$projectid,
                'start'=>$startdate,
                'end'=>$enddate,
                'place_region'=>$region,
                'place_province'=>$province,
                'emp_status_id'=>1,
                'proj_pos_id'=>$positionid,
                'brgycity'=>$brgycity,
                'remarks'=>$remarks,
                'salary'=>$salary,
            );
        
            DB::table('project_employee')->insert($project);
            //dd($project);
            return redirect()->route('employee.profile',['id'=>$empid]);
        }

        public function editempemodal($id){
            //dd($id);
            return response()->json($id);
        }

    }
    //view all sa projects ni employee