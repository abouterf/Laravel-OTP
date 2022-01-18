@extends('LaravelMobileAuth::layouts.master')

@section('title', 'ورود با رمز یکبار مصرف')
@section('content')
    <section class="mt-4 bg-white rounded-lg shadow-sm p-8">
        <!-- card Header -->
        <div>
            <h1 class="text-sky-500 font-bold text-center text-xl">
                ورود با رمز یکبار مصرف
            </h1>
            <p class="mt-2 text-gray-500 text-sm text-center">
                کد تایید ارسال شده به شماره زیر را وارد کنید.
            </p>
        </div>

        <!-- Card Body -->
        <div class="mt-4">
            <form action="#" method="post" class="flex flex-col">
                @csrf
                <label for="phone">
                    <span class="text-sm text-gray-700">شماره موبایل</span>
                </label>
                <input dir="ltr" class="text-sm bg-slate-50 border border-slate-100 rounded p-2 text-gray-600"
                       value="09123456789"
                       disabled
                       type="tel"
                       name="phone"
                       id="phone">
                <label for="otp" class="mt-4">
                    <span class="text-sm text-gray-700">رمز یکبار مصرف</span>
                    <span class="text-rose-500">*</span>
                </label>
                <input dir="ltr" class="text-sm bg-slate-50 border border-slate-100 rounded p-2 text-gray-600"
                       placeholder="******"
                       type="tel"
                       name="otp"
                       id="otp">

                <div class="flex items-center justify-between mt-4">
                    <a href="/password-login" class="text-blue-500 text-sm hover:text-blue-700">ورود با گذرواژه</a>
                    <button class="bg-blue-500 text-white rounded p-2 w-1/2 text-sm"
                            type="submit">
                            ورود به حساب من
                    </button>
                </div>
            </form>
        </div>
    </section>
@endsection
