<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
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
        $categories = Category::all();
        return view('book-add',['categories'=>$categories]);
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
        $book->categories()->sync($request->categories);
        return redirect('books')->with('status','Data Buku Berhasil Ditambahkan');
    }
    public function edit($slug)
    {
        $book = Book::where('slug',$slug)->first();
        $categories = Category::all();
        return view('book-edit',['categories'=>$categories,'book'=>$book]);
    }

    public function update(Request $request,$slug)
    {

        if($request->file('image')){
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->title.'-'.now()->timestamp.'.'.$extension;
            $request->file('image')->storeAs('covers',$newName);
            $request['cover'] = $newName;
        }
        
        $book = Book::where('slug',$slug)->first();
        $book->update($request->all()); 
        $book->categories()->sync($request->categories);
        
        if($request->categories){
        $book->categories()->sync($request->categories);
        }
        return redirect('books')->with('status','Data Buku Berhasil Diubah');
    }

    public function delete($slug)
    {
        $book  = Book::where('slug',$slug)->first();
        return view('book-delete',['book'=>$book]);
    }
    public function destroy($slug)
    {
        $book = Book::where('slug',$slug)->first();
        $book->delete();
        return redirect('books')->with('status','Data Buku Berhasil Dihapus');
    }
}
