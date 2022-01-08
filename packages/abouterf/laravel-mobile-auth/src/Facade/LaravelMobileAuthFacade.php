<?php

namespace Abouterf\LaravelMobileAuth\Facade;

use Illuminate\Support\Facades\Facade;


//we use @method and @see to activate autoComplete.

/**
 * class LaravelMobileAuthFacade
 * 
 * 
 * @method static string doSomething
 * 
 * @see \Abouterf\LaravelMobileAuth\
 * 
 * @package Abouterf\laravelMobileAuth\Facade
 */


class LaravelMobileAuthFacade extends Facade{

    protected static function getFacadeAccessor()
    {
        //this name is the name we set in service provider. :)
        return 'LaravelMobileAuth';
    }
}