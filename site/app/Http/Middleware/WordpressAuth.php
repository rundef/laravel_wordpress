<?php

namespace App\Http\Middleware;

use Closure;

class WordpressAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if(!function_exists('is_user_logged_in') || !is_user_logged_in()) {
            if(!is_null($role)) {
                if(!function_exists('get_current_user_role') || !user_has_role($role))
                    return response('Unauthorized.', 401);
            }
            else
                return response('Unauthorized.', 401);
        }
        
        return $next($request);
    }
}
