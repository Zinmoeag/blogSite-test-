<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;
use App\Models\Blog;

use Illuminate\Support\Facades\Storage;

use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{


    public function create(){

        return view("admin.create",[
           "categories"=>Category::all(),
           "userCount" => User::all()->count()
        ]);
    }

    public function store(){

        $cleanData = request()->validate([
            "title"=>["required"],
            "slug"=>["required",'unique:blogs,slug'],
            "photo"=>"image",
            "category"=>["required",'exists:blogs,category_id'],
            "body"=>["required"],
        ]);

        $path = request('photo') ? request("photo")->store("blog-photo","public") : null;

        $blog = new Blog;

        $blog->title = $cleanData['title'];
        $blog->slug = $cleanData['slug'];
        $blog->category_id = $cleanData['category'];
        $blog->body = $cleanData['body'];
        $blog->artist_id = Auth()->id();
        $blog->photo = $path;

        $blog->save();


        return redirect("/admin/blogs");

    }


    public function adminBlog(){

         $blogs = Blog::latest()->filter(request(['search']))->with(["artist","category"])->paginate(10)->withQueryString();

        if(request("sort")=== "asc"){
           $blogs =  Blog::Oldest()->filter(request(['search']))->with(["artist","category"])->paginate(10)->withQueryString();
        }
           

        return view("admin.admin-blog",[
            "blogs" => $blogs
        ]);
    }

    public function destroy(Blog $blog){

       $blog->delete();

       return back();
    }


    public function updatePage(Blog $blog){
        
        return view("admin.editBlog",[
            "categories" => Category::all(),
            "blog" => $blog
        ]);
    }


    public function update(Blog $blog){
       $cleanData = request()->validate([
            "title"=>["required"],
            "slug"=>["required"],
            "photo"=>"image",
            "category"=>["required",'exists:blogs,category_id'],
            "body"=>["required"],
        ]);

       $max_file_size = 1024 * 1024;  // 1MB

       if(request('photo')){

            //save first to storage 
            $path = request("photo")->store("blog-photo", "public");        


            //get content from storage 
            $photo = Image::make(Storage::get("public/".$path))->resize(800,null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->encode();

            //overwrite it 
            Storage::put("public/".$path,$photo);

            $blog->photo = $path;

       }
        

        $blog->title = $cleanData['title'];
        $blog->slug = $cleanData['slug'];
        $blog->category_id = $cleanData['category'];
        $blog->body = $cleanData['body'];
        $blog->artist_id = Auth()->id();
        

        $blog->save();

        return redirect("/admin/blogs");

    }


}
