<?php

use Illuminate\Support\Facades\Route;
use App\Models\Blog;
use App\Models\Artist;
use App\Models\Category;
use App\Models\User;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SubscribeController;
use App\Http\Controllers\AdminController;
use App\Mail\SubscriberMail;

use App\Http\Middleware\Admin;



Route::get('/',[BlogController::class,"index"]);

// Route::get('/test',function(){
// 	$users = User::take(4)->get();
// 	$users->each(function($user){
// 		Mail::to($user)->queue(new SubscriberMail($user));
// 	});
// 	return redirect("/");
// });

Route::get("/blogs/{blog:slug}",[BlogController::class,"show"]);

Route::get('/artist',[ArtistController::class,"index"]);



// auth

Route::get("/register",[AuthController::class,"create"])->middleware("guest");
Route::get("/login",[AuthController::class,"index"])->middleware("guest");

Route::post("/register",[AuthController::class,"store"]);
Route::post("/login",[AuthController::class,"login"]);
Route::post("/logout", [AuthController::class,"logout"]);


//comment

Route::post("/blogs/{blog:slug}/comment",[CommentController::class,"store"]);


//subscribe
Route::post("/blogs/{blog:slug}/subscribe",[SubscriberController::class,"subscribeToggle"]);


//admin

Route::get("/admin",[AdminController::class,"index"])->middleware(Admin::class);

Route::get("/admin/create",[AdminController::class,"create"])->middleware(Admin::class);

Route::get("/admin/blogs",[AdminController::class,"adminBlog"])->middleware(Admin::class);

Route::post("/admin/create",[AdminController::class,"store"])->middleware(Admin::class);


