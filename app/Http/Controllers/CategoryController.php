<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class CategoryController extends Controller
{
    public function index(){
        $cotegories = Category::all();
        return view('category',['categories'=>$cotegories]);
    }
    public function add(){
        return view('category-add');
    }
    public function store (Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:categories|max:100',
        ]);
        $category = Category::create($request->all());
        return redirect('categories')->with('status','Category added successfully!');
    }
}
