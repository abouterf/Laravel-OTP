<?php

namespace Abouterf\LaravelMobileAuth\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class AuthController extends BaseController
{
    public function login()
    {
        return view('LaravelMobileAuth::login');
    }

    public function logout()
    {
        Auth::logout();
        return Redirect::route('laravel_mobile_auth.login')->with([
            'is_logout' => true
        ]);
    }

    public function dashboard()
    {
        return view('LaravelMobileAuth::dashboard');
    }

    public function passwordLogin()
    {
        return view('LaravelMobileAuth::password');
    }

    public function passwordCheck(Request $request)
    {
        $request->validate([
            'phone' => 'numeric|required|digits:11|exists:users,phone',
            'password' => 'required'
        ], [
            'phone.required' => 'شماره موبایل اجباریست.',
            'password.required' => 'وارد کردن پسورد اجباریست.',
            'phone.numeric' => 'شماره موبایل باید به صورت عددی وارد شود.',
            'phone.digits' => 'شماره موبایل باید ۱۱ رقم باشد.',
            'phone.exists' => 'شماره وارد شده معتبر نمی‌باشد.',
        ]);


        $phone = $request->input('phone');
        $password = $request->input('password');

        $user = User::where('phone', $phone)->first();

        if ($user->attempts_left <= 0 || $user->must_login_with_otp){
            return redirect()->route('laravel_mobile_auth.otp')->with([
                'phone' => $phone,
                'is_redirected_from_password_login' => true
            ]);
        }

        if (Hash::check($password, $user->password)) {
            Auth::loginUsingId($user->id);
            $user->update([
                'attempts_left' => 3,
                'must_login_with_otp' => false
            ]);
            return redirect()->route('laravel_mobile_auth.dashboard')->with([
                'welcome_message' => true,
            ]);
        }

        //password not true.

        /*
         * be careful if you want to change the value using update you
         * have to add that value as fillable
        */

        $user->decrement('attempt_left', 1);
        return redirect()->back()->
        withInput([
            'phone' => $phone
        ])->
        withErrors([
            'password' => 'گذرواژه شما اشتباه است.'
        ]);

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

        if (!$user)
            return redirect()->route('laravel_mobile_auth.otp')->with([
                'phone' => $phone
            ]);

        //user exists

        //check user can login with password permission
        if (!$user->password || $user->most_login_with_otp || $user->attempts_left <= 0)
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
