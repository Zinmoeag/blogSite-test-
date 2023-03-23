<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Hash;    

use App\Models\User;

class ProfileController extends Controller
{
    public function index(User $user){

        //if user was auth user

        if(auth()->check()){
            if(auth()->user()->can("auth", $user)){
              return view("profile.index",[
                "user" => $user,
                "blogs" => $user->blogs()->filter(request(["search","category"]))->with(["category","artist"])->paginate(5),
            ]);  
        } 
        }

       

        return view("profile.show",[
                "user"=>$user,
                "blogs" => $user->blogs()->filter(request(["search","category"]))->with(["category","artist"])->paginate(3)
         ]);

        
    }

    public function picUpdate(){

        // dd(request("edit-photo"));

        
        $cleanData = request()->validate([
            "name" => "max:10",
            "edit-photo" => ['mimes:jpg,bmp,png',"nullable"],
            "description"=> "max:200"
        ]);




         $authUser = User::find(auth()->id());
         $max_file_size = 1024 * 1024; 

        
        if(request("edit-photo")){

            $path = request("edit-photo")->store("user-pic","public");

            //resize if exceed max file size

            if(request("edit-photo")->getSize() > $max_file_size){

                $userImage = Image::make(Storage::get("public/".$path))->resize(800,null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })->encode();

                Storage::put("public/".$path,$userImage);
            }

            $authUser->image = $path;
        }

        $authUser->name = $cleanData["name"];
        $authUser->description = $cleanData["description"];
        $authUser->save();

        return back();

    }


    public function editPassword(){
        return view("profile.editPassword");
    }


    public function updatePassword(){

        // dd(request(["Old-password","New-password"]));

        $cleanData = request()->validate([
            "Old-password"=>"required",
            "New-password"=>"required"
        ]);





        //old value must be same with auth user password
       $passwordCheck = Hash::check($cleanData["Old-password"], auth()->user()->password);

       if($passwordCheck){

        //new value must be same with old value

                //update value

                    $user = User::where("password",auth()->user()->password)->first();

                    // $user->$cleanData["New-password"];

                    // dd($cleanData["New-password"]);

                    $user->password = $cleanData["New-password"];

                    $user->save();

                    return redirect("/profile/".auth()->user()->id)->with("paschange","Successfully update Password");
            
       }

       // dd($passwordCheck);

        return  back()->with("IncorrectPas","Incorrect Password"); 
    }



}
