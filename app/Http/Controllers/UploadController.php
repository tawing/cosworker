<?php

namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Validator; 
    use Illuminate\Validation\Rule;  
    use Illuminate\Support\Facades\Hash;
    use App\Models\User;
    use Illuminate\Support\Facades\Session;
    use League\Csv\Reader;
    use DateTime;
    class UploadController extends Controller
    {   
        public function index(){
            $user = Session::get('user');
            $employeeexist = [];
            $hasduplicate = [];
        
            //get timestamp
            $uploadlogs = DB::table('upload_recents')
            ->join('users', 'upload_recents.users_id', '=', 'users.users_id')
            ->select('upload_recents.*','users.firstname', 'users.middlename', 'users.lastname')
            ->orderByDesc('upload_recents.upload_id')
            ->get();
            //dd($uploadlogs);
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
            
            foreach($uploadlogs as $key => $data){
                $elapsed[$key] = time_elapsed_string($data->datetime);
                //dd($elapsed);
            }
            
            //dd($uploadlogs);
            return view('uploadfile',[
                'user' => $user,
                'exist' => $employeeexist,
                'message' => 'view',
                'elapsed' => $elapsed,
                'logs' => $uploadlogs,
            ]);
        }
    
    public function upload(Request $request)
    {
        $user = Session::get('user');
        //dd($user);
        $request->validate([
            'csv_file' => 'required|mimes:csv,txt',
        ]);

        $file = $request->file('csv_file');

        $filename = $file->getClientOriginalName();

        $data = array_map('str_getcsv', file($file));
        $data = array_filter($data, function ($row) {
            return count($row) > 0 && !empty(array_filter($row));
        });
        $headers = array_shift($data);
        
        $duplicateRows = [];
        $count = 0;
        $employees = [];
        $employeesdisplay = [];
        $employeeexist = [];
        $currentDateTime = date('Y-m-d H:i:s');
        //dd($rows);
            foreach($data as $row)
            {
                //dd($row[11]);
                $educid = DB::table('educations')
                ->select('educ_id')
                ->where('educ_name',$row[11])
                ->value('educ_id');
                
                $employees[] = array(
                    'lastname' => $row[0],
                    'firstname' => $row[1],
                    'middlename' => $row[2],
                    'name_ext' => $row[3],
                    'gender' => $row[4],
                    'marital_status' => $row[5],
                    'birthdate' => $row[6],
                    'address' => $row[7],
                    'contact_no' => $row[8],
                    'email' => $row[9],
                    'eligibility' => $row[10],
                    'educ_id' => $educid,
                );
                //dd($employees);

                $employeesdisplay[] = array(
                    'lastname' => $row[0],
                    'firstname' => $row[1],
                    'middlename' => $row[2],
                    'name_ext' => $row[3],
                    'gender' => $row[4],
                    'marital_status' => $row[5],
                    'birthdate' => $row[6],
                    'address' => $row[7],
                    'contact_no' => $row[8],
                    'email' => $row[9],
                    'eligibility' => $row[10],
                    'educ_id' => $row[11],
                );
                
                $existingRow = DB::table('employees')
                    ->join('educations', 'employees.educ_id', '=', 'educations.educ_id')
                    ->where('employees.lastname', $row[0])
                    ->where('employees.firstname', $row[1])
                    ->where('employees.middlename', $row[2])
                    ->where('employees.name_ext', $row[3])
                    ->select('employees.*', 'educations.educ_name')
                    ->first();

                if ($existingRow) {
                    array_push($duplicateRows, $row);
                    array_push($employeeexist, $existingRow);
                } else { 
                    DB::table('employees')->insert($employees[$count]);
                        $getempid = DB::table('employees')
                        ->orderBy('employee_id','desc')
                        ->first();
                }
               $count++;
            }
            $educ = DB::table('educations')
            ->select('*')
            ->get();
            //dd($employeeexist);
            //dd($count, $employeesdisplay, $duplicateRows, $row, $user->users_id, $currentDateTime);
            $uplogs = array(
                "users_id"=>$user->users_id,
                "filename"=>$filename,
                "datetime"=>$currentDateTime,
                "totalemp"=>$count, 
            );

            DB::table("upload_recents")
            ->insert($uplogs);

            //get time stamp
            $uploadlogs = DB::table('upload_recents')
            ->join('users', 'upload_recents.users_id', '=', 'users.users_id')
            ->select('upload_recents.*','users.firstname', 'users.middlename', 'users.lastname')
            ->orderByDesc('upload_recents.upload_id')
            ->get();

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
            
            foreach($uploadlogs as $key => $data){
                $elapsed[$key] = time_elapsed_string($data->datetime);
                //dd($elapsed);
            }

            //WIP = IPA DECIDE ANG USER NGA EITHER E CHANGE NIA KUNG E UPDATE BA NIA ANG DETAILS OR GAMITON NALANG ANG DATA NGA NAA SA DB (GUDS NA ATA??)

            //WIP = E RECENT ACTIVITY ANG GI UPLOAD
            //dd($uplogs, $getlogs);
        return view('uploadfile', [
            'duplicateRows' => $duplicateRows,
            'exist' => $employeeexist,
            'educ' => $educ,
            'message' => "success",
            'logs' => $uploadlogs,
            'elapsed' => $elapsed,
        ]);

    }
        public function save(Request $request)
        {
            //dd($request->all());
            // Get the form data from the request
            $data = $request->only([
                'last-name',
                'first-name',
                'middle-name',
                'suffix',
                'gender',
                'birthdate',
                'email',
            ]);
            // Update the row in the database
            DB::table('employees')
                ->where('id', $request->input('id'))
                ->update([
                    'LastName' => $data['last-name'],
                    'FirstName' => $data['first-name'],
                    'MiddleName' => $data['middle-name'],
                    'ExtName' => $data['suffix'],
                    'Sex' => $data['gender'],
                    'BirthDate' => $data['birthdate'],
                    'Email' => $data['email'],
                ]);

            // Redirect back to the previous page
            return view('uploadfile',[
                'existing' => $existingRow,
                'duplicateRows' => $duplicateRows 
            ]);
        }

        public function update(Request $request)
        {
            //dd($request);
            $empid = $request->input('employeeid');
            $t_lastname = $request->input('table_lastname');
            $t_firstname = $request->input('table_firstname');
            $t_middlename = $request->input('table_middlename');
            $t_ressuffix = $request->input('table_ressuffix');
            $t_educ = $request->input('table_educ');
            $t_eligibility = $request->input('table_eligibility');
            $t_bday = $request->input('table_bday');
            $t_sex = $request->input('table_sex');
            $t_address = $request->input('table_address');
            $t_contactno = $request->input('table_contactno');
            $t_email = $request->input('table_email');
            $t_mstatus = $request->input('table_mstatus');
            $t_tinno = $request->input('table_tinno');
            $t_agencyempno = $request->input('table_agencyempno');
            error_log($empid);
            $educid = DB::table('educations')
            ->select('educ_id')
            ->where('educ_name',$t_educ)
            ->value('educ_id');

            $newdata = array(
                "lastname"=>$t_lastname,
                "firstname"=>$t_firstname,
                "middlename"=>$t_middlename,
                "name_ext"=>$t_ressuffix,
                "gender"=>$t_sex,
                "marital_status"=>$t_mstatus,
                "birthdate"=>$t_bday,
                "address"=>$t_address,
                "contact_no"=>$t_contactno,
                "email"=>$t_email,
                "eligibility"=>$t_eligibility,
                "educ_id"=>$educid,
                "tin_no"=>$t_tinno,
                "agencyemp_no"=>$t_agencyempno,
            );
            //dd($empid,$request,$newdata);
            //update the data
            DB::table('employees')
            ->where("employee_id",$empid)
            ->update($newdata);
            
            //dd($empid,$request,$newdata);
            return response()->json([
                'message' => 'Update successful',
                'variable' => $empid,
            ]);
        }

    }