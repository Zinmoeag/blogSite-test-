<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::with("artist","category")->get();

        return view("home",[
            'blogs'=>$blogs 
        ]);
    }


    public function show(Blog $blog){
        
        return view("poem",[
            "blog"=>$blog
        ]);
    }
}
