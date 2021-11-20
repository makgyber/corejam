<?php

namespace App\Http\Middleware;

use Closure;

class Admin
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
        $roles = explode(',', $request->user()->menuroles);

        foreach($roles as $role) {
            if(in_array(trim($role), ['admin','site_admin'])) {
                return $next($request);
            }
        }


        return abort( 401 );
        
    }
}
