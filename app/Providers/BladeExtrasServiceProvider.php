<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Auth;
use App\User;

class BladeExtrasServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
       Blade::if('hasRole', function($string){
        if(Auth::user()){
            if(Auth::user()->hasAnyRole($string)){
                return true;
            }
        }
        return false;
       });
    }
}
