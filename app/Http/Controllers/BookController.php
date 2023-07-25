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
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'book_code' => 'required|unique:books|max:255',
            'title' => 'required|max:255',
        ]);
        $newName = '';
        if($request->file('image')){
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->title.'-'.now()->timestamp.'.'.$extension;
            $request->file('image')->storeAs('covers',$newName);
        }
        $request['cover'] = $newName;
        $book = Book::create($request->all());
        return redirect('books')->with('status','Data Buku Berhasil Ditambahkan');
    }
}
