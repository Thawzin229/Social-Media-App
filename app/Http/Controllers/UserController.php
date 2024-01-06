<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Inertia\Inertia;
use App\Models\Story;
use App\Models\Social;
use App\Models\Commnet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    //home page 
    public function homePage()
    {
        $search = request("search");
        $posts = Post::select('posts.*','users.name as user_name',"users.image as user_image")
        ->join('users','posts.user_id','users.id')
        ->orderBy('posts.created_at',"desc")
        ->paginate();
        $likes = Like::groupBy("post_id")
        ->selectRaw('post_id, COUNT(*) as count')
        ->get()
        ->toArray();
        $coment = Commnet::groupBy("post_id")
        ->selectRaw('post_id, COUNT(*) as count')
        ->get()
        ->toArray();
        $stories = Story::select('stories.*','users.name as user_name','users.image as user_image')
        ->join("users",'users.id','stories.user_id')
        ->paginate(7);
        $userlist = User::query()
        ->when($search,function($table,$search){
            $table->where("name","like","%{$search}%")->paginate(4);
        })
        ->paginate(4);
        return Inertia::render("user/home",['user_list' => $userlist,"posts"=>$posts,"likes"=> $likes,"comments"=>$coment,'stories'=>$stories]);
    }

    //User setting
    public function Setting()
    {
        $userlist = User::query()
        ->paginate(4);
        return Inertia::render('user/setting/setting',["user_list"=>$userlist]);
    }
    // account info
    public function AccountInfo()
    {
        $userlist = User::query()
        ->paginate(4);
        return Inertia::render('user/setting/account',["user_list"=>$userlist]);
    }

    //UpdateInfo
    public function UpdateInfo(Request $request)
    {
        $id = $request->id;
        $data = $request->validate([
            'name' => "required",
            'email' => "required",
            "gender" => "required",
        ]);

        if($request->hasFile("image")){
            //oldimage
            $oldfile = User::where("id",$id)->first()->toArray();
            $oldImg  = $oldfile['image'];
            if($oldImg !== null){
                Storage::delete('public/'.$oldImg);
            }
            $filename = uniqid(). $request->file("image")->getClientOriginalName();
            $request->file('image')->storeAs('public',$filename);
            $data['image'] = $filename;
        }
        
        User::where("id",$id)->update($data);
        return redirect('/account')->withErrors(["status" => "Save changes"]);
        
    }

    // Social page 
    public function SocialPage()
    {
        $social_data = Social::where("id",Auth::user()->id)->first();
        $userlist = User::query()->paginate(4);
        return Inertia::render("user/setting/social",["user_list" => $userlist,"social_data" => $social_data]);
    }
    // CreateSocial
    public function CreateSocial(Request $request)
    {
        $data = $request->validate([
            "facebook" => "required",
            "google" => "required",
            "instagram" => "required",
            "github" => "required",
            "twitter" => "required",
        ]);
        $data['user_id'] = Auth::user()->id;
        Social::create($data);
        return redirect('/social');
    }
    // UpdateSocial
    public function UpdateSocial(Request $request)
    {
        $data = $request->validate([
            "facebook" => "required",
            "google" => "required",
            "instagram" => "required",
            "github" => "required",
            "twitter" => "required",
        ]);
        Social::where("id",$request->id)->update($data);
        return redirect('/social')->withErrors(["status" => "save changes."]);

    }
    

    // ChangePassUser
    public function ChangePassUser()
    {
        $userlist = User::query()->paginate(4);
        return Inertia::render("user/setting/password",["user_list" => $userlist]);
    }
    // UpdatePassUser
    public function UpdatePassUser(Request $request)
    {
        $request->validate([
            "oldpassword" => "required",
            "currentpassword" => ["required","regex:/[A-Z]/",
            "regex:/[a-z]/","regex:/[0-9]/","regex:/[!@#$%&*()<>]/"],
        ]);
        $user = User::where("id",Auth::user()->id)->first()->toArray();
        $db_password = $user['password'];
        if(Hash::check($request->oldpassword,$db_password)){
            User::where("id",Auth::user()->id)->update(["password" => Hash::make($request->currentpassword)]);
            Auth::logout();
            return redirect('/loginpage');
        }
        return back()->withErrors(["status" => "Old Password is invalid."]);

    }

    // noti page 
    public function NotiPage()
    {
        $userlist = User::query()
        ->paginate(4);
        $notifications = Auth::user()->notifications;
        return Inertia::render("user/notification/noti",["user_list"=> $userlist,'notifications'=>$notifications]);
    }
}
