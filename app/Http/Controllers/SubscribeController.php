<?php

namespace App\Http\Controllers;

use App\Models\Blog;

use Illuminate\Http\Request;

class SubscribeController extends Controller
{
   public function subscribeToggle(Blog $blog){
    // if subscribe
        if(auth()->user()->isSubscribed($blog)){
            $blog->subscribedUsers()->detach(auth()->user()->id);
        }else{
            //add record
            $blog->subscribedUsers()->attach(auth()->user()->id);
        }

        return back();
    }
}
