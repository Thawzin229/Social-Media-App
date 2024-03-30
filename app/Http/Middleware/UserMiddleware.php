<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!Auth::user()){
            if(Auth::guard("admins")->user()){
                return redirect('admin/home')->withErrors(["error" => "you cannt enter user"]);
            }
            return redirect("/loginpage");
        }
        return $next($request);
    }
}
