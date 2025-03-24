<?php

namespace App\Providers;

use App\Services\Auth\JWTGuard;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class JwtServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Auth::extend('jwt', function (Application $app,string $name, array $config){

            return new JWTGuard(Auth::createUserProvider($config['provider']));
        });

    }
}
