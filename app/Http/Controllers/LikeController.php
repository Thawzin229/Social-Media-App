<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\UserNotification;
use Illuminate\Support\Facades\Notification;

class LikeController extends Controller
{
    //like 
    public function Like(Request $request)
    {
        $data = $request->validate([
            'user_id' => "required",
            'post_id' => "required",
        ]);
        $NotiUser =  User::where("id",$request->post_user_id)->first();
        $datapresnet = Like::where("post_id",$request->post_id)->where('user_id',$request->user_id)->first();
        if($datapresnet){
            return back()->withErrors(['message'=>"you cannt like the same post"]);
        }
        Like::create($data);
        Notification::send($NotiUser,new UserNotification($request->user_id));
        return back();
    }
}
