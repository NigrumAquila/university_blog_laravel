<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class AdminOrModerMiddleware
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
        $role = (substr(request()->route()->getName(), 0, 6) == 'users.') ? 'is_admin' : 'is_moder'; // prevent users routes against not admin
        
        if(Auth::check() && Auth::user()->{"$role"})
        {
            return $next($request);
        }

        abort(403);

    }
}
