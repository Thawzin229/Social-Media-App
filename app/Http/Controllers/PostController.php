<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Inertia\Inertia;
use App\Models\Social;
use App\Models\Commnet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    //post create 
    public function PostCreate(Request $request)
    {
        $data = $request->validate([
            "description" => "required",
        ]);
        if($request->hasFile("image")){
            $filename = uniqid(). $request->file("image")->getClientOriginalName();
            $request->file("image")->storeAs("public",$filename);
            $data['image'] = $filename;
        }
        $data['user_id'] = Auth::user()->id;
        Post::create($data);
        return redirect("/");
    }
    // profile page 
    public function ProfilePage($id)
    {
        $post = Post::select('posts.*','users.name as user_name','users.image as user_image')
        ->join("users",'posts.user_id',"users.id")
        ->orderBy("posts.created_at","desc")
        ->where("user_id",$id)->paginate();
        $social = Social::select('socials.*','users.name as user_name',"users.image as user_image","users.email as user_email")
        ->join("users",'socials.user_id',"users.id")
        ->where("socials.user_id",$id)
        ->first()->toArray();
        $user_list  = User::paginate(4);
        $likes = Like::groupBy("post_id")
        ->selectRaw('post_id, COUNT(*) as count')
        ->get()
        ->toArray();
        $comment = Commnet::groupBy("post_id")
        ->selectRaw('post_id, COUNT(*) as count')
        ->get()
        ->toArray();
        return Inertia::render("user/profile/profile",['post' =>  $post,"social" => $social,"user_list"=>$user_list,'likes'=>$likes,"comment"=>$comment]);
    }
    // edit page 
    public function EditPage($id)
    {
        $post  = Post::where("id",$id)->first();
        return Inertia::render('user/profile/edit',["post" => $post]);
    }
    // UpdatePost
    public function UpdatePost(Request $request)
    {
        $data = $request->validate([
            "description" => "required",
        ]);
        if($request->hasFile("image")){
            $oldfile = Post::where("id",$request->id)->first()->toArray();
            $oldimg = $oldfile['image'];
            if($oldimg!==null){
                Storage::delete('public/'.$oldimg);
            }
            $filename = uniqid().$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public',$filename);
            $data['image'] = $filename;
        }
        Post::where('id',$request->id)->update($data);
        return redirect('/user/profile/'.$request->user_id);

    }
    // DeletePost
    public function DeletePost($id)
    {
        $oldfile = Post::where("id",$id)->first()->toArray();
        $oldimg = $oldfile['image'];
        if($oldimg!==null){
            Storage::delete('public/'.$oldimg);
        }
        Post::where("id",$id)->delete();
        Like::where("post_id",$id)->delete();
        Commnet::where("post_id",$id)->delete();
        return back();
        
    }
}
