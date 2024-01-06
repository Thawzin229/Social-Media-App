<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Inertia\Inertia;
use App\Models\Admin;
use App\Models\Story;
use App\Models\Social;
use App\Models\Commnet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    // adminHome
    public function adminHome()
    {
        $user_data = User::paginate(4);
        $post_count = Post::count();
        $current_img = Auth::guard("admins")->user()->image;
        $name = User::latest()->first()->toArray()['name'];
        notify()->success($name ." ". "has registerd recently.");
        return Inertia::render('admin/home/home',['user_data'=> $user_data , "current_img" => $current_img, "post_count"=>$post_count]);
    }
    // UserList
    public function UserList()
    {
        $search = request('search');
        $user_data = User::query()
        ->select('name','email','image','id',DB::raw("DATE_FORMAT(created_at,'%M %e ,%Y') as date"))
        ->when($search,function($table,$search){
            $table->where("name","like","%{$search}%")->paginate(5);
        })
        ->paginate()
        ->withQueryString();
        return Inertia::render("admin/home/user",["user_data" => $user_data,"permission" => Auth::guard('admins')->user()->can('create',Admin::class)]);
    }
    // DeleteUser
    public function DeleteUser($id)
    {
        User::where("id",$id)->delete();
        Post::where("user_id",$id)->delete();
        Story::where("user_id",$id)->delete();
        Social::where("user_id",$id)->delete();
        return redirect('/admin/userlist');
    }

    // DetailPage
    public function DetailPage()
    {
        $admin_data  = Auth::guard("admins")->user();
        return Inertia::render("admin/account/info",["admin_data" => $admin_data]);
    }
    // UpdatInfo
    public function UpdatInfo(Request $request)
    {
        $data  = $request->validate([
            "name" => "required",
            "email" => "required|email",
            "gender" => "required",
        ]);
        if($request->hasFile("image")){
            $old_file = Admin::where("id",$request->id)->first()->toArray();
            $old_img = $old_file['image'];
            if($old_img !== null){
                Storage::delete('public/'.$old_img);
            }
            $filename = uniqid().$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs("public",$filename);
            $data['image'] = $filename;
        }
        Admin::where("id",$request->id)->update($data);
        return redirect('/admin/detail')->withErrors(["status" => "updated successfully"]);
    }
    // post 
    public function Post()
    {
    $search = request('search');
    $post = Post::select('posts.*','users.name as user_name',DB::raw("COUNT(likes.post_id) as like_count"))
    ->join('users',"users.id",'posts.user_id')
    ->join("likes","posts.id","likes.post_id")
    ->groupBy("likes.post_id")
    ->when($search,function($table,$search){
        $table->where("description","like","%{$search}%")->paginate();
    })
    ->paginate();
        return Inertia::render('admin/home/post',["post" => $post,"permission"=> Auth::guard('admins')->user()->can('create',Admin::class)]);
    }
    // post delte
    public function Delete($id)
    {
        $img = Post::where('id',$id)->first()->toArray()['image'];
        if($img !== null)
        {
            Storage::delete('public/'.$img);
        }
        Post::where("id",$id)->delete();
        Like::where("post_id",$id)->delete();
        Commnet::where("post_id",$id)->delete();
        return redirect('admin/posts');
    }
}
