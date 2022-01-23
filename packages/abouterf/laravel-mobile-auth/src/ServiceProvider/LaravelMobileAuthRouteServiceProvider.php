<?php

namespace abouterf\LaravelMobileAuth\ServiceProvider;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class LaravelMobileAuthRouteServiceProvider extends RouteServiceProvider
{
    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            /*Route::prefix('api')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('packages/abouterf/laravel-mobile-auth/src/routes/api.php'));*/

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('packages/abouterf/laravel-mobile-auth/src/routes/web.php'));
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });
    }
}
