<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory;

    protected $fillable = ["name", "slug","info","img_url"];

    public function blog(){
        return $this->hasMany(Blog::class);
    }

    public function scopeFilter($query){

        $query->when(Request('artist-Blog') ?? false , function($query,$slug){

            // $query->where("slug","LIKE",$slug)->blog;
           
          // dd(Artist::where()->blog);

            $query->where("slug","LIKE",$slug);
        });



        
        
    }


    
}
