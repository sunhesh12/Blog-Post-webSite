<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;




class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::user()->IsAdmin()){
            //redirect to admin page
            return $next($request);
        }else{
            return back();
            // redirect(route('admin.dashboard'));
            //redirectto user page
        }
        
    }
}
