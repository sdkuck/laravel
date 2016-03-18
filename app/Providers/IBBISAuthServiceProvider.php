<?php

namespace App\Providers;

use App\User;
use App\Auth\IBBISUserProvider;
use Illuminate\Support\ServiceProvider;

class IBBISAuthServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app['auth']->extend('ibbis-auth',function()
        {
            return new IBBISUserProvider(new User);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
