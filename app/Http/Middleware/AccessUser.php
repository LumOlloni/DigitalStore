<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AccessUser
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

        if(Auth::user()->hasAnyRole('user') ){
            return $next($request);
        }
        session()->flash('unathorizedPage');
        return redirect('/error');
    
    }
}
