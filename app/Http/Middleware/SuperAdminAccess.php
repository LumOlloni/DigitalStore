<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class SuperAdminAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$role)
    {

        if(Auth::user()->hasAnyRole($role) ){
                return $next($request);
            }
        else {
            session()->flash('unathorizedPage');
            return redirect('/menage/error');
        }
            
     }    
}
