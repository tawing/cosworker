<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


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
        $usern = trim($request->input('username'));
        $passw = trim($request->input('password'));

        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $checkdb = DB::table('users')
        ->where('username', $usern)
        ->where('deactivate', 0)
        ->first();
        
        //dd($usern);
        

        if ($checkdb && Hash::check($passw, $checkdb->password))
        {
            
            $checkuser = DB::table('users')     // original
                ->join('positions', 'users.position_id', '=', 'positions.position_id')
                ->where('users.username', $usern)
                ->select('users.users_id', 'users.firstname', 'users.lastname', 'positions.position_name as position_name', 'users.usertype_id')
                ->first();
          
             Session::put('user', $checkuser);
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->intended('home');
            }
        }
        //dd($checkdb->password);
        //return redirect()->intended('home');
        return back()->withErrors(['username'=>'Invalid credentials']);
      
    }
    public function signOut() {
        Session::flush();
        Auth::logout();
  
        return Redirect('/');
    }
}
