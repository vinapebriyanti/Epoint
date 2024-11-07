<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth; // Correct case
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Ensure the user is authenticated and is an admin
        if (Auth::check() && Auth::user()->usertype != 'admin') {
            return redirect('dashboard');
        }

        return $next($request);
    }
}


