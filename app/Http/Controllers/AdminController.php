<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;
use App\Models\Blog;

use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public function index(){
        return view("admin.index");
    }


    public function create(){

        return view("admin.create",[
           "categories"=>Category::all(),
           "userCount" => User::all()->count()
        ]);
    }

    public function store(){
        $cleanData = request()->validate([
            "title"=>["required"],
            "slug"=>["required",'unique:blogs,slug'],
            "category"=>["required",'exists:blogs,category_id'],
            "body"=>["required"],
        ]);

        // dd($cleanData);

        $blog = new Blog;

        $blog->title = $cleanData['title'];
        $blog->slug = $cleanData['slug'];
        $blog->category_id = $cleanData['category'];
        $blog->body = $cleanData['body'];
        $blog->artist_id = Auth()->id();

        $blog->save();


        return redirect("/admin/blogs");

    }


    public function adminBlog(){
        // dd("hit");

        return view("admin.admin-blog",[
            "blogs" => Blog::latest()->paginate(10)
        ]);
    }



}
