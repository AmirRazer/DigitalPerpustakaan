<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Termwind\Components\Dd;

class AuthController extends Controller
{
    public function login ()
    {
        return view('login');
    }
     public function register ()
    {
        return view('register');
    }

       public function authenticating(Request $request)
    {
       $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
        
        //cek apakah login valid
        //cek apakah user status = active
        
         if (Auth::attempt($credentials)) {
            //cek apakah user status = active
            if(Auth::user()->status != 'active'){
                Session::flash('status', 'faild');
                Session::flash('message', 'your account is not active. Please contact admin');
                return redirect('/login');
            }
            $request->session()->regenerate();

            if(Auth::user()->role_id == 1){
                return redirect('/dashboard');
            }
            if(Auth::user()->role_id == 2){
                return redirect('/profile');
            }
            
   
        }
         Session::flash('status', 'faild');
         Session::flash('message', 'login invalid');
        return redirect('/login');

    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
  
}