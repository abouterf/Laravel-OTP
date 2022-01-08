<?php

namespace Abouterf\LaravelMobileAuth\ServiceProvider;

use Abouterf\LaravelMobileAuth\LaravelMobileAuth;
use Illuminate\Support\ServiceProvider;

class LaravelMobileAuthServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('LaravelMobileAuth', function () {
            return new LaravelMobileAuth;
        });
    }

    /**
     * Bootstrap any package services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
    }
}
