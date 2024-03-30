<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use Inertia\Inertia;
use App\Models\Commnet;
use Illuminate\Http\Request;

class CommnetController extends Controller
{
    //page 
    public function CommentPage($id)
    {
        $post = Post::select("posts.*","users.name as user_name","users.image as user_image")
        ->join("users","users.id","posts.user_id") 
        ->where("posts.id",$id)->first()->toArray();
        $like = Like::where("post_id",$id)->count();
        $com_count = Commnet::where("post_id",$id)->count();
        $comments = Commnet::select('commnets.*',"users.name as user_name","users.image as user_image")
        ->join("users","commnets.user_id","users.id")
        ->where("commnets.post_id",$id)->paginate();
        return Inertia::render("user/comment/Comment",["post"=>$post,"like"=>$like,"comments"=>$comments,"com_count"=>$com_count]);
    }
    // CreateComment
    public function CreateComment(Request $request)
    {
        $data = $request->validate([
            'comment' => "required",
            'user_id' => "required",
            'post_id' => "required",
        ]);
        Commnet::create($data);
        return redirect('/comment/'.$request->post_id);
    }
}
