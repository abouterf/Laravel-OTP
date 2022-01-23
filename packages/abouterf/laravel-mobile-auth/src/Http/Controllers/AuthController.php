<?php

namespace Abouterf\LaravelMobileAuth\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends BaseController
{
    public function login()
    {
        return view('LaravelMobileAuth::login');
    }

    public function passwordLogin()
    {
        return view('LaravelMobileAuth::password');
    }

    public function otpLogin()
    {
        return view('LaravelMobileAuth::otp');
    }

    public function checkAuth(Request $request)
    {

        $request->validate([
            'phone' => 'required|numeric|digits:11'
        ], [
            'phone.required' => 'شماره موبایل الزامیست.',
            'phone.numeric' => 'شماره موبایل باید عدد باشد.',
            'phone.digits' => 'شماره موبایل باید ۱۱ رقم باشد.'
        ]);

        $phone = $request->input('phone');

        $user = User::where('phone', $phone)->first();

        if(!$user)
            return redirect()->route('laravel_mobile_auth.otp')->with([
                'phone' => $phone
            ]);

            //user exists

        //check user can login with password permission
        if(!$user->password || $user->most_login_with_otp || $user->attempts_left <= 0)
            return redirect()->route('laravel_mobile_auth.otp')->with([
                'phone' => $phone,
                'can_login_with_password' => false
            ]);

        //User has pass
        if ($user->attempts_left > 0)
            return redirect()->route('laravel_mobile_auth.password')->with([
                'phone' => $phone
            ]);
        dd('OK');
    }
}
