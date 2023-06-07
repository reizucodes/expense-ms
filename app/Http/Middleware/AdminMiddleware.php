<?php

namespace App\Http\Middleware;

use Closure;
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
        //check if authenticated and is Admin role (1)
        //print($next);
        if (auth::check()) {
            if (Auth::user()->role == 1) {
                return $next($request);
            }
            return back()->with('success', 'Admin access only.');
        }
        //return redirect()->route('login')->with('error', 'You are not logged in.');
        //return back()->with('error', 'Admin access only!');
    }
}
