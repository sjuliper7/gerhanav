<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\User;

class AdminMiddleware
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
        if ($request->is('home'))
        {
            if (!Auth::user()->hasPermissionTo('Admin roles & permissions'))
                abort('401');
            else return $next($request);
        }

//        //status products
//        if ($request->is('status-products'))
//        {
//            if (!Auth::user()->hasPermissionTo('Access Status Products'))
//                abort('401');
//            else return $next($request);
//        }
//
//        if ($request->is('status-products/create'))
//        {
//            if (!Auth::user()->hasPermissionTo('Create Status Product'))
//                abort('401');
//            else return $next($request);
//        }
//
//        if ($request->is('status-products/*/edit'))
//        {
//            if (!Auth::user()->hasPermissionTo('Edit Status Product'))
//                abort('401');
//            else return $next($request);
//        }
//
//        if ($request->is('status-products/*'))
//        {
//            if (!Auth::user()->hasPermissionTo('Delete Product'))
//                abort('401');
//            else return $next($request);
//        }
//
//        if ($request->is('status-products/*'))
//        {
//            if (!Auth::user()->hasPermissionTo('Delete Product'))
//                abort('401');
//            else return $next($request);
//        }



        return $next($request);
    }
}
