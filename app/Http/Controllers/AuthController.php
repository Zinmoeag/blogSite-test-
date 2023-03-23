<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPassword;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;

use Carbon\Carbon;


class AuthController extends Controller
{
        public function create(){
                     
            return view('register.create');
        }

        public function store(){
            $userData = request()->validate([
                "username"=>"required",
                "email"=>["required","email",'unique:users,email'],
                "password"=>["required","min:8"],
            ],[
                "email.required" => "We need to know your Email",
                "email.email" => "Invaild Email Address"
            ]);

            $previousUrl = request('previousUrl');


            //input data

            $user = new User;

            $user->name = $userData['username'];
            $user->email = $userData['email'];
            $user->password =$userData['password'];
            $user->save();


            auth()->login($user);
            return redirect()->intended($previousUrl)->with('created',"Hello ".auth()->user()->name.", You created account successfully");
        }


        public function index(){
            return view('login.index');
        }

        public function login(){
            request()->validate([
                "email"=>["required","email"],
                "password"=>"required"
            ]);


            $previousUrl = request('previousUrl');

            //CHECK EMAIL
            $user = User::where("email",request("email"))->first();

            //CHECK PASSWORD 
            if($user){
                $passwordCheck = Hash::check(request("password"),$user->password);

                if($passwordCheck){
                    auth()->login($user);
                    return redirect()->intended($previousUrl)->with('welcome-back',"Welcome Back ".auth()->user()->name);
                }
            }

           return redirect("/login")->with('invalid',"Your password is incorrect");
        }


        public function logout(){

            auth()->logout();
            return redirect("/");

        }

        public function editPassword()
        {
            return view("login.reset-password");
        }


        public function updatePassword()
        {

            $cleanData = request()->validate([
                    "email" => ["required","email",Rule::exists('users', 'email')]
            ],[
                'email.exists' => "Email doesn't exist"
            ]);

            $tokenNum = Str::random(60);

            $user = User::where("email",$cleanData["email"])->first();

            if($this->sendEmail($tokenNum,$user,$cleanData)){
                 DB::table("password_resets")->insert([
                    "email" =>$cleanData["email"],
                    "token" => $tokenNum,
                    "created_at" =>Carbon::now()
                ]);
                return back()->with("email-sent","Check your Email to confirm");
            }

            return back()->with("server error","Server Error");
           

        }


        private function sendEmail($tokenNum,$user,$cleanData){

            $link = url("/")."/password/reset/".$tokenNum."?email=".urlencode($cleanData["email"]);

            try{
                 //send mail
                Mail::to($user)->send(new ResetPassword($link));

                return true;

            }catch (\Exception $e){

                return false;

            }

           

        }


        public function showResetPassword()
        {

           return view("login.comfirm-token");
        }


        public function updateResetPassword()
        {
            // dd(request());

             //compare new with confirm password
            $cleanData = request()->validate([
                "email" => ["required","email",Rule::exists('users', 'email')],
                "reset-token" => "required",
                "password" => ["required","min:8","confirmed"],
                "password_confirmation" => ["required","min:8"]
            ]);

            //validate token

            $tokenUser = DB::table("password_resets")->where("email",$cleanData["email"])->first();

            if($tokenUser->token === $cleanData["reset-token"]){
                //get user from user table with token
                $user = User::where("email",$tokenUser->email)->first();

                //update password
                $user->password = $cleanData["password"];
                $user->save();

                //delete token
                DB::table('password_resets')->where('email', $cleanData["email"])->delete();

                return redirect("/login");

            }
            return back()->with("Invalid Token","Invaild Token click link again");
            
        }


}
