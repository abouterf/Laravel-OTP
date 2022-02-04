@extends('LaravelMobileAuth::layouts.master')

@section('title', 'داشبورد کاربر')
@section('content')
    <section class="mt-4 bg-white rounded-lg shadow-sm p-8">
        <!-- card Header -->
        <div>
            <h1 class="text-sky-500 font-bold text-center text-xl">
                داشبورد کاربر
            </h1>
            <p class="mt-2 text-gray-500 text-sm text-center">
                خوش آمدید!
            </p>
        </div>

        <!-- Card Body -->
        <div class="mt-4">
            @if(\Illuminate\Support\Facades\Session::has('welcome_message'))
                <div class="mb-2 bg-green-200 text-green-500 rounded px-4 py-2 text-center">
                    ورود شما موفقیت آمیز بود.
                </div>
            @endif
            <div class="flex items-center">
                <h1 class="text-gray-700 font-medium">
                    شماره موبایل شما:
                </h1>
                <p class="text-rose-500 mr-2">
                    {{auth()->user()->phone}}
                </p>
            </div>
            <div class="flex items-center mt-4 justify-center">
                <a class="mt-4 p-3 bg-rose-200 text-rose-600 rounded" href="{{route('laravel_mobile_auth.logout')}}">خروج از حساب کاربری</a>
            </div>
        </div>
    </section>
@endsection
