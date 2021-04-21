<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Http\Request;

class Employer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check()&&Auth::user()->user_type=='employer'){
            //if the authenticated user_type is employer
            return $next($request);
    
        
        }else{
            //if not go back to home
             return redirect('/');
        }
    }
}

//you have to reigster your middleware in your kernal.php folder


//Middleware provide a convenient mechanism for inspecting and filtering HTTP requests entering your application. 
//For example, Laravel includes a middleware that verifies the user of your application is authenticated.
// If the user is not authenticated, the middleware will redirect the user to your application's login screen.
// However, if the user is authenticated, the middleware will allow the request to proceed further into the application.