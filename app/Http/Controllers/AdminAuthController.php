<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class AdminAuthController extends Controller
{
    //
    
        //register
        public function registerPage()
        {
            return Inertia::render('admin/adminauth/register');
        }
        // loginPage
        public function loginPage()
        {
            return Inertia::render('admin/adminauth/login');
        }

        // register
        public function register(Request $request)
        {
            $data = $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:admins',
                'gender' => 'required',
                'password' => ['required',"regex:/[A-Z]/",
                "regex:/[a-z]/","regex:/[0-9]/","regex:/[!@#$%&*()<>]/"],
            ]);
            $data['password'] = Hash::make($request->password);
            Admin::create($data);
            return redirect('/admin/loginpage');
        }
        //login 
        public function login(Request $request)
        {
            $data =  $request->validate([
                'email' => "required|email",
                'password' => "required",
            ]);
            if(Auth::guard('admins')->attempt($data)){
                return redirect('/admin/home');
            }
            return back()->withErrors(["status" => "Something went wrong"]);
        }

        //forget pass page 
        public function forgetPassPage()
        {
            return Inertia::render('admin/adminauth/forget');
        }

        // getEmail
        public function getEmail(Request $request)
        {
            $request->validate([
                "email" => "required|email"
            ]);
            $user_email  =  $request->email;
            $db_email  = Admin::where("email",$user_email)->first();
            if($db_email){
                $id = $db_email->id;
                return redirect('/admin/changepasswordpage/'.$id);
            }
            return back()->withErrors(['status' => "Email does not exist."]);
        }

        // changPassPage
        public function changPassPage()
        {
            $id = request("id");
            return Inertia::render("admin/adminauth/changepassword",["user_id" => $id]);
        }
        // changePass
        public function changePass(Request $request)
        {
            $data =  $request->validate([
                "password" => ['required',"regex:/[A-Z]/",
                "regex:/[a-z]/","regex:/[0-9]/","regex:/[!@#$%&*()<>]/"],
            ]);
            $id = $request->user_id;
        Admin::where("id",$id)->update([
                'password' => Hash::make($request->password),
            ]);
            return redirect('/admin/loginpage');
        }

        //redirct to github
        public function redirect()
        {
            return Socialite::driver("github")->redirect();
        }

        // loginAdminGithub
        public function loginAdminGitHub()
        {

        $github_user = Socialite::driver("github")->user();
        $user  = Admin::where("github_id",$github_user->getId())->first();
        if(!$user){
            $new_user = Admin::create([
                'name' => $github_user->nickname,
                'email' => $github_user->email,
                'github_id' => $github_user->id,
            ]);
            Auth::guard('admins')->login($new_user);
            return redirect('/admin/home');

        }
        Auth::guard('admins')->login($user);
        return redirect("/admin/home");
    }

    //logout
    public function logout()
    {
        Auth::guard("admins")->logout();
        return redirect('/admin/loginpage');
    }

}








