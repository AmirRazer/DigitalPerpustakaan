<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
     public function index()
    {
        // $request->session()->flush();
        // dd('ini halaman buku');
        return view('book');
    }
}
