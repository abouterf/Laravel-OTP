<?php
namespace Abouterf\LaravelMobileAuth\routes;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;

Route::get('mobile-auth', function () {
    dd('Hello from package');
});

Route::namespace('\Abouterf\LaravelMobileAuth\Http\Controllers')->group(function(){
    Route::get('login', 'AuthController@login')->name('laravel_mobile_auth.login');
    Route::get('password-login', 'AuthController@passwordLogin')->name('laravel_mobile_auth.password');
    Route::post('password-login', 'AuthController@passwordCheck')->name('laravel_mobile_auth.password.check');
    Route::get('otp-login', 'AuthController@otpLogin')->name('laravel_mobile_auth.otp');
    Route::post('auth','AuthController@checkAuth')->name('laravel_mobile_auth.auth');
    Route::get('dashboard', 'AuthController@dashboard')->name('laravel_mobile_auth.dashboard');
    Route::get('logout', 'AuthController@logout')->name('laravel_mobile_auth.logout');
});
