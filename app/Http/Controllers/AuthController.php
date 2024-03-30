<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use App\Models\Admin;
use App\Mail\UserMail;
use App\Events\UserEvent;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Notifications\Register;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    //register page 
    public function registerPage()
    {
        return Inertia::render("auth/register");
    }

    //login page 
    public function loginPage()
    {
        return Inertia::render("auth/login");
    }
    //register the user 
    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'gender' => 'required',
            'password' => ['required',"regex:/[A-Z]/",
            "regex:/[a-z]/","regex:/[0-9]/","regex:/[!@#$%&*()<>]/"],
        ]);
        User::create($data);
        event(new UserEvent($request->name));
        return redirect('/loginpage');

    }
    // login the user 
    public function login(Request $request)
    {
        $data =  $request->validate([
            'email' => "required|email",
            'password' => "required",
        ]);
        if(Auth::attempt($data)){
            $request->session()->regenerate();
            return redirect()->intended("/");
        }
        return back()->withErrors(["status" => "Something went wrong"]);


    }
    //logout the user
     public function logout()
     {
        Auth::logout();
        return redirect('/loginpage');
     }

     //forget pass
    public function forgetPass()
    {
        return Inertia::render('auth/forget');
    }

    //get email
    public function getEmail(Request $request)
    {
        $request->validate([
            "email" => "required|email"
        ],['email.required' => 'We need your email sir.']);
        $user_email  =  $request->email;
        $db_email  = User::where("email",$user_email)->first();
        if($db_email){
            User::where("email",$db_email->email)->update(["remember_token" => Str::random(40)]);
            $token = User::where("email",$db_email->email)->first()->remember_token;
            return redirect('/changepasswordpage/'.$token);
        }
        return back()->withErrors(['status' => "Email does not exist."]);
    }
    // changePassPage
    public function changePassPage()
    {
        $token = request("id");
        return Inertia::render("auth/changepassword",["token"=> $token]);
    }

    //chnge pass
    public function changePass(Request $request)
    {
        $data =  $request->validate([
            "password" => ['required',"regex:/[A-Z]/",
            "regex:/[a-z]/","regex:/[0-9]/","regex:/[!@#$%&*()<>]/"],
        ]);
        $token = $request->token;
        User::where("remember_token",$token)->update([
            'password' => Hash::make($request->password),
        ]);
        return redirect('/loginpage');
    }
}
