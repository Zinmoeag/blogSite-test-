<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Http\Controllers\SubscribeController;
use Illuminate\Support\Facades\Mail;
use App\Mail\SubscriberMail;

class CommentController extends Controller
{
   public function store(Blog $blog){

    // dd("hit");
        $cleanData = request()->validate([
            "comment"=>"required",
        ]);

        $blog->comment()->create([
            "comment"=>$cleanData["comment"],
            "user_id"=>auth()->id()
        ]);

        // dd($blog->subscribedUsers);

        


        $blog->subscribedUsers->each(function($user) use($blog,$cleanData){

        //if !(sub's user same with auth user )

           if(!($user->id === auth()->id())){
             Mail::to($user)->queue(new SubscriberMail($user,$blog,$cleanData["comment"]));
           }
        // else

           
        });

        return back();
   }
}
