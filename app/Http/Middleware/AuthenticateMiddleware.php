<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AuthenticateMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {   
        $response = $next($request);
        if (Auth::check()) { 
            return $response;
             // Redirect to login route if user is not authenticated
        }

       else{
        //return $response;
        return redirect()->route('auth.login');
       }
    }
}
