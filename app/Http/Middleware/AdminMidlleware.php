<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMidlleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated and has the role of admin
        if ($request->user() && $request->user()->role->name === 'admin') {
            return $next($request);
        }

        // If not an admin, redirect to home or unauthorized page
        return redirect()->route('Home')->with('error', 'Unauthorized access');
    }
}
