<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
     public function index()
    {
        $books = Book::all();
        // $request->session()->flush();
        // dd('ini halaman buku');
        return view('book',['books'=>$books]);
    }
    public function add()
    {
        return view('book-add');
    }
}
