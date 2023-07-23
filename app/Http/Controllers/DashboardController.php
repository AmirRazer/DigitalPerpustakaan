<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // $request->session()->flush();
        dd('ini halaman dahboard');
    }
}
