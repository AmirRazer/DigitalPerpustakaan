<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
   public function profile(Request $request)
   {    
    dd('ini halaman profile');
    
    // $request->session()->flush();
       
   }
}
