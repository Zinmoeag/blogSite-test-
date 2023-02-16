<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    public function artist(){
        return $this->belongsTo(Artist::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
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
