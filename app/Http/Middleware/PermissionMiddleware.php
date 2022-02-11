<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()->hasRole('Admin')) //If user has admin role
        {
            return $next($request);
        }
        if (Auth::user()->hasRole('User')) //If user has user role
        {
            if ($request->is('posts/create'))//If user is creating a post
            {
                if (!Auth::user()->hasPermissionTo('addPost'))
                {
                    abort('401');
                }
                else {
                    return $next($request);
                }
            }
        }
        return $next($request);
    }
}
