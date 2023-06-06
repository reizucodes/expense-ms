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
        //check if authenticated and is user role (0)
        if (auth::check() && Auth::user()->role == 0) {
            return $next($request);
        } else {
            return redirect()->route('login')->with('error', 'User access only!');
        }
        //return back()->with('error', 'User access only!');
    }
}
