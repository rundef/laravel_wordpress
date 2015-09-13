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
    public function handle($request, Closure $next, $role = '', $capability = '')
    {
        if(!function_exists('is_user_logged_in') || !is_user_logged_in())
            return response('Unauthorized.', 401);
        else {
            if(!empty($role) && !current_user_can($role))
                return response('Unauthorized.', 401);
            if(!empty($capability) && !current_user_can($capability))
                return response('Unauthorized.', 401);
        }

        return $next($request);
    }
}
