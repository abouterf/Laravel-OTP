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
            return redirect()->back()->withErrors(
                ['phone' => 'کاربری با شماره وارد شده وجود ندارد.']
            );
        dd($user);
    }
}
