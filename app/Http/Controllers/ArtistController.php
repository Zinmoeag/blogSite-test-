<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artist;

class ArtistController extends Controller
{
    public function index(Artist $artist){
       $blogs = $artist->blog->load("artist","category");
        return view("artist",[
            "artist"=>$artist,
            "blogs"=>$blogs
        ]);
    }
}
