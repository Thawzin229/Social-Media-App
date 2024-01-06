<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use App\Models\Story;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class StoryController extends Controller
{
    //create story
    public function CreateStory(Request $request)
    {
        if($request->hasFile("image"))
        {
            $filename = uniqid().$request->file("image")->getClientOriginalName();
            $request->file("image")->storeAs("public",$filename);
            Story::create(['image'=>$filename,'user_id'=>Auth::user()->id]);
            return redirect('/');
        }
        return back();
    }

    // StoryPage
    public function StoryPage()
    {
        $search = request("search");
        $user_list = User::paginate();
        $stories = Story::query()
        ->select('stories.*','users.name as user_name','users.image as user_image')
        ->join("users",'users.id','stories.user_id')
        ->when($search,function($table,$search){
            $table->where("users.name","like","%{$search}%")->paginate(10);
        })
        ->paginate(10)
        ->withQueryString();
        return Inertia::render("user/stories/story",['user_list'=>$user_list,'stories'=>$stories]);
    }
    // DeleteStory
    public function DeleteStory($id)
    {
        $img =  Story::where("id",$id)->first()->toArray()['image'];
        if($img!== null){
            Storage::delete('public/'.$img);
        }
        Story::where("id",$id)->delete();
        return back();
    }
    // UserStory
    public function UserStory($id)
    {
        $stories = Story::select('stories.*','users.name as user_name','users.image as user_image')
        ->join("users",'users.id','stories.user_id')
        ->where("stories.user_id",$id)->paginate();
        $user_list = User::paginate();
        return Inertia::render("user/stories/userstory",['user_list'=>$user_list,"stories"=>$stories]);
    }
}
