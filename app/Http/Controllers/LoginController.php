<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index ()
    {
        $user = Session::get('user');
        
        if (Auth::check()) {
            return redirect('/home');
        }
        return view('login', ['user' => $user]);
    }

    public function verify (Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $credentials = ['username' => $request->username, 'password' => $request->password];

        if(Auth::attempt($credentials)){

            $checkuser = DB::table('users')     // original
                ->join('positions', 'users.position_id', '=', 'positions.position_id')
                ->where('users.username', $request->username)
                ->select('users.users_id', 'users.firstname', 'users.lastname', 'positions.position_name as position_name', 'users.usertype_id')
                ->first();

            // $active = DB::table('users')
            //     ->where('users.username', $request->username)
            //     ->where('deactivate', 0)
            //     ->first();

            // $inactive = DB::table('users')
            //     ->where('users.username', $request->username)
            //     ->where('deactivate', 1)
            //     ->first();
            // $count = DB::table('employees')
            //     ->where('employees.users_id', $checkuser->users_id)
            //     ->count();
            
            Session::put('user', $checkuser);
            $request->session()->regenerate();
            return view('home')->with('user', $checkuser);
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ]);
    }
    public function signOut() {
        Session::flush();
        Auth::logout();
  
        return Redirect('/');
    }
}
