<?php

use Abouterf\LaravelMobileAuth\LaravelMobileAuth;
use App\ServiceContainer;
use App\Services\UserService;
use Illuminate\Support\Facades\Route;

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


Route::get('/', function () {

    // dd(resolve('LaravelMobileAuth'));
    dd(LaravelMobileAuth::doSomething());
    // dd($userService->getUsers());

    return view('welcome');
});

