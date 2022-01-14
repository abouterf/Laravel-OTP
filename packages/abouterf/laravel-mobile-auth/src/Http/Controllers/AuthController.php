<?php

namespace Abouterf\LaravelMobileAuth\Http\Controllers;


class AuthController extends BaseController{
    public function login(){
        return view('LaravelMobileAuth::login');
    }

    public function passwordLogin(){
        return view('LaravelMobileAuth::password');
    }

    public function otpLogin(){
        return view('LaravelMobileAuth::otp');
    }
}