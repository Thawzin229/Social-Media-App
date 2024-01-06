<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;

class ListController extends Controller
{
    //page 
    public function ListPage()
    {
        $search = request("search");
        $user_list = User::query()
        ->when($search,function($table,$search){
            $table->where("name","like","%{$search}%")->paginate(6);
        })
        ->paginate(6)
        ->withQueryString();
        return Inertia::render('user/userlist/list',["user_list"=>$user_list]);
    }
}
