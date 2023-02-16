<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index (Category $category){
       $blogs = $category->blog->load("category","artist");


       return view("home",[
        "blogs"=>$blogs,
        'categories'=>Category::all(),
        'categoryDisplay'=> $category
       ]);
    }
}
