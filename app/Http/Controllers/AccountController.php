<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AccountController extends Controller
{
    public function index(){
        $user = Session::get('user');
        //dd($user);
        // $user->username = 'username';
        // $user->email = 'email';
        
        $userdata = DB::table('users')
        ->select('*')
        ->where('users_id',$user->users_id)
        ->first();
        
       // dd($userdata,$user);
        return view('accsetting',[
            'data' => $userdata


        ]);
    }
    public function updates(Request $request)
    {
       
        // $request->validate([
        //     'lastname' => 'regex:/^[a-zA-Z.,\s\/ ]+$/',
        //     'firstname' => 'regex:/^[a-zA-Z.,\s\/ ]+$/',
        //     'username' => 'regex:/^[a-zA-Z.,\s\/ ]+$/',
        //     'email' => 'regex:/^[a-zA-Z.,\s\/ ]+$/'
        // ]);
        
        
        $id = $request->input('id');
        $last_name = $request->input('lastname');
        $first_name = $request->input('firstname');
        $user_name = $request->input('username');
        $email = $request->input('email');
    
        // update instance and save to the database
        DB::table('users')
        ->where('users_id', $id)
        ->update([
            'lastname' => $last_name,
            'firstname' => $first_name,
            'username' => $user_name,
            'email' => $email
        ]);
          //dd($request); 
            
        return redirect('/logout');
    }
    // public function passupdate(Request $request)
    // {
    //     $request->validate([
    //         'lastname' => 'regex:/^[a-zA-Z.,\s\/ ]+$/',
    //         'firstname' => 'regex:/^[a-zA-Z.,\s\/ ]+$/',
    //         'middlename' => 'regex:/^[a-zA-Z.,\s\/ ]+$/',
    //         'position' => 'regex:/^[a-zA-Z.,\s\/ ]+$/'
    //     ]);
        
        
    //     $id = $request->input('id');
    //     $last_name = $request->input('lastname');
    //     $first_name = $request->input('firstname');
    //     $user_name = $request->input('username');
    //     $email = $request->input('email');
    
    //     // update instance and save to the database
    //     DB::table('users')
    //     ->where('users_id', $id)
    //     ->update([
    //         'lastname' => $last_name,
    //         'firstname' => $first_name,
    //         'username' => $user_name,
    //         'email' => $email
    //     ]);
            
    //     return back()->with('success', 'Admin Profile Updated Successfully!');
    // }
    public function updatePassword(Request $request)
    {
        // $request->validate([
        //     'old_pass' => ['required', function ($attribute, $value, $fail) {
        //         if (!Hash::check($value, Auth::user()->password)) {
        //             $fail(__('The :attribute is incorrect.'));
        //         }
        //     }],
        //     'new_pass' => 'required|min:8|confirmed',
        // ]);

        // Auth::user()->update([
        //     'password' => Hash::make($request->input('new_pass')),
        // ]);

        // return redirect()->route('account-settings')->with('success', 'Password updated successfully.');
        $request->validate([
            'old_password' => ['required', function ($attribute, $value, $fail) {
                if (!Hash::check($value, Auth::user()->password)) {
                    $fail(__('The :attribute is incorrect.'));
                }
            }],
            'new_password' => 'required|min:4|confirmed',
        ]);
    
        Auth::user()->update([
            'password' => Hash::make($request->input('new_password')),
        ]);
    
        return redirect()->route('profile.edit-password')->with('success', 'Password updated successfully.');
    }
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function editPassword()
    {
        return view('password.edit');
    }

}
