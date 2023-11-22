<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Termwind\Components\Dd;

class AdminLoggin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Prevent User Try To Go Admin Page
        // Check If User Was Loggin and Role Id
        if(Auth::check()){
            if(Auth::user()->role == 0){
                return redirect('/shop/');
            }
        }
        return $next($request);
    }
}
