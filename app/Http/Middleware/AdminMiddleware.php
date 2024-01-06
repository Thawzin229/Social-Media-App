<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        
        if(!Auth::guard("admins")->user()){
            if(Auth::user()){
                return redirect("/")->withErrors(['status' => "you cannt enter admin site"]);
            }
            return redirect('/admin/loginpage')->withErrors(["status" => "youre not authanticated , try login again!"]);
        }

        return $next($request);
    }
}
