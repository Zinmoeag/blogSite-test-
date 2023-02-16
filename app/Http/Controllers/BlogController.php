<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;

class BlogController extends Controller
{   

    public function index()
    {
        return view("home",[
            'blogs'=> Blog::latest()->filter(request(["search","category","artist-Blog"]))->with(["category","artist"])->paginate(6)
                ->withQueryString(),
        ]);
    }


    public function show(Blog $blog){
        return view("poem",[
            "blog"=>$blog,
            "randomBlogs" =>Blog::inRandomOrder()->with(["category","artist"])->take(3)->get()
        ]);
    }
}
