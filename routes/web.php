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
use App\Http\Controllers\ProfileController;

use App\Mail\SubscriberMail;

use App\Http\Middleware\Admin;


Route::get('/',[BlogController::class,"index"]);

Route::get("/blogs/{blog:slug}",[BlogController::class,"show"]);

Route::get('/artist',[ArtistController::class,"index"]);



// auth

Route::get("/register",[AuthController::class,"create"])->middleware("guest");
Route::get("/login",[AuthController::class,"index"])->middleware("guest");

Route::post("/register",[AuthController::class,"store"]);
Route::post("/login",[AuthController::class,"login"]);
Route::post("/logout", [AuthController::class,"logout"])->middleware("auth");

Route::get("/password", [AuthController::class,"editPassword"]);

Route::post("/password", [AuthController::class,"updatePassword"]);

Route::get('/password/reset/{token}',[AuthController::class,"showResetPassword"]);

Route::put('/password/reset',[AuthController::class,"updateResetPassword"]);



//comment

Route::post("/blogs/{blog:slug}/comment",[CommentController::class,"store"]);


//subscribe
Route::post("/blogs/{blog:slug}/subscribe",[SubscribeController::class,"subscribeToggle"]);


//profile

Route::prefix('profile')->group(function () {

	Route::get('/password',[ProfileController::class,"editPassword"]);

	Route::put('/password',[ProfileController::class,"updatePassword"]);


	Route::get("/{user}",[ProfileController::class,"index"]);


	Route::post("/",[ProfileController::class,"picUpdate"])->middleware("auth");
});



//admin

Route::middleware(Admin::class)->prefix("admin")->group(function(){

	Route::get("/create",[AdminController::class,"create"]);

	Route::get("/blogs",[AdminController::class,"adminBlog"]);

	Route::post("/create",[AdminController::class,"store"]);

	Route::delete("/blogs/{blog}",[AdminController::class,"destroy"]);

	Route::get("/blogs/up/{blog}",[AdminController::class,"updatepage"]);

	Route::put("/blogs/up/{blog}",[AdminController::class,"update"]);
});





