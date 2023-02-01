<?php

use Illuminate\Support\Facades\Route;
use App\Models\Blog;
use App\Models\Artist;
use App\Models\Category;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\CategoryController;

Route::get('/',[BlogController::class,"index"]);

Route::get("/blogs/{blog:slug}",[BlogController::class,"show"]);

Route::get("/artist/{artist:slug}",[ArtistController::class,"index"]);

Route::get("/category/{category:slug}",[CategoryController::class,"index"]);

Route::get("/artist",function(){
    return view("artist_per");
});

