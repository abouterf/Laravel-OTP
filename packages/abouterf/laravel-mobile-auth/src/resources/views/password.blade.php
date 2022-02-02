@extends('LaravelMobileAuth::layouts.master')

@section('title', 'ورود با گذرواژه')
@section('content')
    <section class="mt-4 bg-white rounded-lg shadow-sm p-8">
        <!-- card Header -->
        <div>
            <h1 class="text-sky-500 font-bold text-center text-xl">
                ورود با گذرواژه
            </h1>
            <p class="mt-2 text-gray-500 text-sm text-center">
                برای ورود بع حساب خود، گذرواژه را وارد نمایید!
            </p>
        </div>

        <!-- Card Body -->
        <div class="mt-4">
            <form action="{{route('laravel_mobile_auth.password.check')}}" method="post" class="flex flex-col">
                @csrf
                <label for="phone" class="flex items-center justify-between">
                    <span class="text-sm text-gray-700">شماره موبایل</span>
                    <a href="{{route('laravel_mobile_auth.login')}}" class="flex items-center">
                        <span class="text-rose-500 text-sm hover:text-rose-600">ویرایش شماره</span>
                    </a>
                </label>
                <input dir="ltr" class="text-sm bg-slate-50 border border-slate-100 rounded p-2 text-gray-600"
                       value="{{Session::get('phone',old('phone'))}}"
                       placeholder="09123456789"
                       readonly
                       type="tel"
                       name="phone"
                       id="phone">

                @error('phone')
                <span class="text-sm text-rose-500 mt-2">
                    {{$message}}
                </span>
                @enderror

                <label for="password" class="mt-4">
                    <span class="text-sm text-gray-700">گذرواژه</span>
                    <span class="text-rose-500">*</span>
                </label>
                <input dir="ltr" class="text-sm bg-slate-50 border border-slate-100 rounded p-2 text-gray-600"
                       value=""
                       placeholder="*******"
                       type="password"
                       name="password"
                       id="password">
                @error('password')
                <span class="text-sm text-rose-500 mt-2">
                    {{$message}}
                </span>
                @enderror

                <div class="flex items-center justify-between mt-4">
                    <a href="{{route('laravel_mobile_auth.otp')}}" class="text-blue-500 text-sm hover:text-blue-700">ورود با رمز یکبارمصرف</a>
                    <button class="bg-blue-500 text-white rounded p-2 w-1/2 text-sm"
                            type="submit">
                        ورود به حساب من
                    </button>
                </div>
            </form>
        </div>
    </section>
@endsection
