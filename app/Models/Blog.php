<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    public function artist(){
        return $this->belongsTo(User::class,"artist_id");
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function comment(){
        return $this->hasMany(Comment::class);
    }

    public function subscribedUsers(){
        return $this->belongsToMany(User::class,"blog-user");
    }


    public function scopeFilter($query,$filter){

        // dd($filter);

        //conditional query    
        $query->when($filter["search"] ?? false , function($query , $search){
            $query = $query
                        ->where(function($query) use($search){
                            $query
                                ->where("title","LIKE","%"."$search"."%")
                                ->orWhere("body","LIKE","%"."$search"."%");
                        });
        });


        $query->when($filter["category"] ?? false, function($query, $slug){

            $query->whereHas("category",function($query) use($slug){
                $query
                    ->where("slug","LIKE","$slug");
            });
        });
        
    }


}
