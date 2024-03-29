<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function blogs(){
        return $this->hasMany(Blog::class,"artist_id");
    }


    public function subscribedBlogs(){
        return $this->belongsToMany(Blog::class,"blog-user");
    }

    public function isSubscribed($blog){
        return auth()->user()->subscribedBlogs && 
                auth()->user()->subscribedBlogs->contains($blog->id);
    }


    //mutator

    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }


    //assesor

    public function getNameAttribute($value){
        return ucfirst($value);
    }

    public function getImageAttribute($value){

        return $value ? "/storage/".$value : "/assets/default_pic/default_user_pic.jpg" ;
    }

}
