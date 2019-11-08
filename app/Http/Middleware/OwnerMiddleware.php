<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 05.11.2019
 * Time: 16:58
 */

namespace App\Http\Middleware;
use Closure;

class OwnerMiddleware
{
    public function handle($request, Closure $next, $role)
    {
        if(!$request->user()->hasRole($role)){
            return redirect('/');
        }
        return $next($request);
    }
}