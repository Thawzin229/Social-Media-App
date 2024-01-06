<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;

class ErrorController extends Controller
{
    //page 
    public function Error()
    {
        return Inertia::render("user/error");
    }
}
