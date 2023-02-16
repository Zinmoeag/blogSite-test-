<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Artist;
use App\Models\Category;


use App\Models\Blog;

class ArtistController extends Controller
{


   // public function getBlogs($slug){

   //      return Artist::Latest()->filter();
   // }

    public function index(){
      
        return view("home",[
            "blogs"=> Artist::Latest()->filter()->first()->blog()->paginate(6)->withQueryString(),
            'categories'=>Category::all()
        ]);
    }
}
