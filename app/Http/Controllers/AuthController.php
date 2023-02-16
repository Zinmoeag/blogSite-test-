<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Validation\Rule;
use App\Models\User;
use Illuminate\Support\Facades\Hash;    

class AuthController extends Controller
{
        public function create(){
                     
            return view('register.create');
        }

        public function getValue(){
            $userData = request()->validate([
                "username"=>"required",
                "email"=>["required","email",'unique:users,email'],
                "password"=>["required","min:8"],
            ],[
                "email.required" => "We need to know your Email",
                "email.email" => "Invaild Email Address"
            ]);


            //input data

            $user = new User;

            $user->name = $userData['username'];
            $user->email = $userData['email'];
            $user->password =$userData['password'];
            $user->save();


            auth()->login($user);
            return redirect("/")->with('created',"Hello ".auth()->user()->name.", You created account successfully");
        }


        public function index(){
            return view('login.index');
        }

        public function login(){
            request()->validate([
                "email"=>["required","email"],
                "password"=>"required"
            ]);

            //CHECK EMAIL
            $user = User::where("email",request("email"))->first();

            //CHECK PASSWORD 
            if($user){
                $passwordCheck = Hash::check(request("password"),$user->password);

                if($passwordCheck){
                    auth()->login($user);
                    return back();
                }
            }
        }

}
