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

        $this->mergeConfigFrom(__DIR__.'/../config/laravel-mobile-auth.php', 'LaravelMobileAuth');
    }

    /**
     * Bootstrap any package services.
     *
     * @return void
     */
    public function boot()
    {

     
        $this->_loadRoutes();
        $this->_loadViews();
        $this->_loadMigrations();



   
    }

    private function _loadViews() :void{
        //lara docs/overriding package views(lara package development)

        /*****
        after publishing if u changed the main code u have to use '--force' to override the
        published.

        ****/
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'LaravelMobileAuth');

        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/LaravelMobileAuth/')
        ], 'laravel-mobile-auth-views');
    }

    private function _loadRoutes() :void{
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
    }

    private function _loadMigrations() : void{
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->publishes([
            __DIR__ . '/../database/migrations' => database_path('migrations')
        ], 'laravel-mobile-auth-migrations');
    }
}
