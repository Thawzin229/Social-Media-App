<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    //redirect
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    //login with google
    public function loginWithGoogle()
    {
        $google_user = Socialite::driver("google")->user();
        $user  = User::where("google_id",$google_user->getId())->first();
        if(!$user){
            $new_user = User::create([
                'name' => $google_user->getName(),
                'email' => $google_user->getEmail(),
                'google_id' => $google_user->getId(),
            ]);
            Auth::login($new_user);
            return redirect('/');

        }
        Auth::login($user);
        return redirect("/");
    }
}
