<?php

use Illuminate\Support\Facades\Route;
use App\Models\Blog;
use App\Models\Artist;
use App\Models\Category;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthController;


Route::get('/',[BlogController::class,"index"]);

Route::get("/blogs/{blog:slug}",[BlogController::class,"show"]);

Route::get('/artist',[ArtistController::class,"index"]);


// auth

Route::get("/register",[AuthController::class,"create"]);
Route::get("/login",[AuthController::class,"index"]);

Route::post("/register",[AuthController::class,"getValue"]);
Route::post("/login",[AuthController::class,"login"]);




Route::post("/logout",function(){

	auth()->logout();

	return redirect('/');
});

// Route::get("/category/{category:slug}",[CategoryController::class,"index"]);

// Route::get("/artist",function(){
//     return view("artist_per");
// });

