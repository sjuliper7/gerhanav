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
        if (!Auth::user()->hasPermissionTo('Administer Roles')) {
            abort('401');
        }elseif (!Auth::user()->hasPermissionTo('Administer Permissions')) {
            abort('401');
        } elseif (!Auth::user()->hasPermissionTo('Administer Products')) {
            abort('401');
        }elseif (!Auth::user()->hasPermissionTo('Administer Product Category')) {
            abort('401');
        }elseif (!Auth::user()->hasPermissionTo('Administer Product Status')) {
            abort('401');
        }elseif (!Auth::user()->hasPermissionTo('Administer Product Catalog')) {
            abort('401');
        }elseif (!Auth::user()->hasPermissionTo('Administer Refund Status')) {
            abort('401');
        }elseif (!Auth::user()->hasPermissionTo('Administer Bank Reference')) {
            abort('401');
        }
//        elseif (!Auth::user()->hasPermissionTo('Administer Roles')) {
//            abort('401');
//        }elseif (!Auth::user()->hasPermissionTo('Administer Roles')) {
//            abort('401');
//        }

        return $next($request);
    }
}
