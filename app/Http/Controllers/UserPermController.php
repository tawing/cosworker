<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserPermController extends Controller
{
  

    public function updateauth(Request $request)
    {
        $request->validate([
            'lastname' => 'regex:/^[a-zA-Z.,\s\/ ]+$/',
            'firstname' => 'regex:/^[a-zA-Z.,\s\/ ]+$/',
            'middlename' => 'regex:/^[a-zA-Z.,\s\/ ]+$/',
            'position' => 'regex:/^[a-zA-Z.,\s\/ ]+$/'
        ]);
        
        
        $id = $request->input('id');
        $last_name = $request->input('lastname');
        $first_name = $request->input('firstname');
        $middle_name = $request->input('middlename');
        $position = $request->input('position');
    
        // update instance and save to the database
        DB::table('authorizedsignatory')
        ->where('authorizedID', $id)
        ->update([
            'LastName' => $last_name,
            'FirstName' => $first_name,
            'MiddleName' => $middle_name,
            'Auth_Position' => $position
        ]);
            
        return back()->with('success', 'Authorized Signatory updated successfully!');
    }
    public function updateclearstore(Request $request)
        {
            
            $request->validate([
                'last_name' => 'regex:/^[a-zA-Z., ]+$/',
                'first_name' => 'regex:/^[a-zA-Z., ]+$/',
                'middle_name' => 'regex:/^[a-zA-Z., ]+$/',
                'clearposition' => 'regex:/^[a-zA-Z., ]+$/'
            ]);

            $id = $request->input('clearsignatory');
            $last_name = $request->input('last_name');
            $first_name = $request->input('first_name');
            $middle_name = $request->input('middle_name');
            $position = $request->input('clearposition');
        
            //hash password
        

            // update instance and save to the database
            $auth= DB::table('clearancesignatory')
                    ->where('clearance_ID', $id)
                    ->update([
                        'Lastname' => $last_name,
                        'Firstname' => $first_name,
                        'Middlename' => $middle_name,
                        'Auth_pos' => $position
                    ]);

            
            return back()->with('success', 'Clearance Signatory Updated successfully!');
        }
    public function index()
    {
        $user = Session::get('user');
        // fetch all users from the database and pass them to the view
        $users = DB::select("SELECT * FROM `users`
        INNER JOIN usertypes
        ON USERTYPES.usertype_id = users.usertype_id ");
        $auth = DB::select("SELECT * FROM `authorizedsignatory`");
        $clear = DB::select("SELECT * FROM `clearancesignatory`");
        //dd($user);
        return view('usersperms', [
            'user' => $users,
            'auth' => $auth,
            'users' => $user,
            'clear' => $clear
        ]);
    }

    // public function update(Request $request)
    // {
    //     // Get the input data from the form
    //     $lastName = $request->input('lastname');
    //     $firstName = $request->input('firstname');
    //     $middleName = $request->input('middlename');
    //     $position = $request->input('position');
        
    //     // Update the authorized signatory in your database
    //     // Example using Eloquent:
    //     $user = User::find($userId);
    //     $user->last_name = $lastName;
    //     $user->first_name = $firstName;
    //     $user->middle_name = $middleName;
    //     $user->position = $position;
    //     $user->save();
        
    //     // Redirect back to the previous page with a success message
    //     return back()->with('success', 'Authorized signatory updated successfully.');
    // }

    

    public function deactivate($id)
    {
        $users = DB::select("UPDATE users SET deactivate = '1' WHERE users_id = $id;");

        return back()->with('success', 'User Deactivated successfully!');
    }

    public function activate($id)
    {
        DB::table('users')->where('users_id', $id)->update(['deactivate' => 0]);
        return back()->with('success', 'User Activated successfully!');
    }

    public function authdeactivate($authid)
    {
        $users = DB::select("UPDATE authorizedsignatory SET Deactivated = '1' WHERE authorizedID = $authid;");

        return back()->with('success', 'Authorized Signatory Deactivated successfully!');
    }

    public function authactivate($authid)
    {   
        DB::table('authorizedsignatory')->where('authorizedID', $authid)->update(['Deactivated' => 0]);
        return back()->with('success', 'Authorized Signatory Activated successfully!');
    }

    public function cleardeactivate($clearid)
    {
        $users = DB::select("UPDATE clearancesignatory SET Deactivate = '1' WHERE clearance_ID = $clearid;");

        return back()->with('success', 'Clearance Asignatory Deactivated successfully!');
    }

    public function clearactivate($clearid)
    {   
        $users = DB::select("UPDATE clearancesignatory SET Deactivate = '0' WHERE clearance_ID = $clearid;");
        return back()->with('success', 'Clearance Asignatory   Activated successfully!');
    }


    public function storeAdmin(Request $request)
    {
        // $request->validate([
        //     'last_name' => 'alpha:ascii',
        //     'first_name' => 'alpha:ascii',
        //     'middle_name' => 'alpha:ascii',
        //     'user_name' => 'alpha:ascii',
        //     'email' => 'email:rfc,dns',
        //     'position' => 'alpha:ascii'
        // ]);
        
        $last_name = $request->input('last_name');
        $first_name = $request->input('first_name');
        $middle_name = $request->input('middle_name');
        $suffix = $request->input('suffix');
        $user_name = $request->input('user_name');
        $email = $request->input('email');
        $position = $request->input('position');
        $usertype = $request->input('usertype');
       
        //hash password
        $password = "1234";//Hash::make('admin1234');

        
        // create a new user instance and save to the database
        $users = DB::select("INSERT INTO users (lastname, firstname, middlename, position_id, email, username, password, usertype_id)
        VALUES ('$last_name', '$first_name', '$middle_name', $position, '$email', '$user_name', '$password', $usertype);
        ");
        
        return back()->with('success', 'User created successfully!');
    }

    public function authstore(Request $request)
    {
        $request->validate([
            'lastname' => 'alpha:ascii',
            'firstname' => 'alpha:ascii',
            'middlename' => 'alpha:ascii',
            'position' => 'alpha:ascii'
        ]);
        
        $last_name = $request->input('lastname');
        $first_name = $request->input('firstname');
        $middle_name = $request->input('middlename');
        $position = $request->input('position');
       
       

       

        
        // create a new user instance and save to the database
        $auth= DB::select("INSERT INTO authorizedsignatory (LastName, FirstName, MiddleName, Auth_Position)
        VALUES ('$last_name', '$first_name', '$middle_name', '$position');
        ");
        
        return back()->with('success', 'Authorized Signatory created successfully!');
    }

    public function clearstore(Request $request)
    {
        
        $request->validate([
             'last_name' => 'alpha:ascii',
             'first_name' => 'alpha:ascii',
             'middle_name' => 'alpha:ascii',
             'clearposition' => 'alpha:ascii'
         ]);
        
        $last_name = $request->input('last_name');
        $first_name = $request->input('first_name');
        $middle_name = $request->input('middle_name');
        $position = $request->input('clearposition');
       
        //hash password
       

        
        // create a new user instance and save to the database
        $clear = DB::select("INSERT INTO clearancesignatory (Lastname, Firstname, Middlename, Auth_pos)
        VALUES ('$last_name', '$first_name', '$middle_name', '$position');
        ");
        
        return back()->with('success', 'Clearance Asignatory created successfully!');
    }
    
    

    

    //TIN TIN
    //MACABALAN CHAPTER

}
