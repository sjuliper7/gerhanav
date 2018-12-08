<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CustomerMiddleware
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
        if (Auth::user()->hasPermissionTo('Access Store')) //If user has this //permission
        {
            return $next($request);
        }

        if ($request->is('my-store'))//If user is creating a post
        {
            if (!Auth::user()->hasPermissionTo('My Store'))
            {
                abort('401');
            }
            else {
                return $next($request);
            }
        }

        return $next($request);
    }
}
