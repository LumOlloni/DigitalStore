<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AccessAdmin
{
 
    protected $redirectTo = '/menage';
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        try {
            $userRoles = Auth::user()->roles->pluck('name');
            

            if(Auth::user()->hasAnyRoles(['superadmin' , 'admin' , 'Editor']) ){
                return $next($request);
            }
        }   
        catch (\Throwable $th) {
            session()->flash('unathorizedPage');
            return redirect('/error');
     }

    }
}
