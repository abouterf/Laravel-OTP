<?php

namespace Abouterf\LaravelMobileAuth\Http\Controllers;


class AuthController extends BaseController{
    public function index(){
        return view('LaravelMobileAuth::auth');
    }
}