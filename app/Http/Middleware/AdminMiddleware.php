<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {  // user ...? if there is got to next condition ->>
        if(!empty(auth()->check()))
    
        {  //is user an admin .??? if it is login if not logout and redirect to login page with false credential msg
            if(auth()->user()->is_admin==1)
           { 
         return $next($request);
              }
           else
            {
            auth()->logout();
            return redirect('admin');
            }
        }
        
        else
        {
            auth()->logout();
            return redirect('admin');
        }
    
    }
}
