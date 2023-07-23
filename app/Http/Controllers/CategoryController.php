<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $cotegories = Category::all();
        return view('category',['categories'=>$cotegories]);
    }
    public function add(){
        return view('category-add');
    }
}
