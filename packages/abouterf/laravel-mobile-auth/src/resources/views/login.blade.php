@extends('LaravelMobileAuth::layouts.master')

@section('title', 'ورود به حساب کاربری')
@section('content')

    <section class="mt-4 bg-white rounded-lg shadow-sm p-8">
        <!-- card Header -->
        <div>
            <h1 class="text-sky-500 font-bold text-center text-xl">
                ورود به حساب کاربری
            </h1>
            <p class="mt-2 text-gray-500 text-sm text-center">
                برای ورود به حساب کاربری شماره موبایل خود را وارد کنید.
            </p>
        </div>

        <!-- Card Body -->
        @if(\Illuminate\Support\Facades\Session::has('is_logout'))
            <div class="my-2 bg-rose-200 text-rose-500 rounded px-4 py-2 text-center">
                خروج شما از حساب کاربری موفقیت آمیز بود.
            </div>
        @endif
        <form action="{{route('laravel_mobile_auth.auth')}}" method="post" class="flex flex-col">
            @csrf
            <label for="phone">
                <span class="text-sm text-gray-700">شماره موبایل</span>
                <span class="text-rose-500">*</span>
            </label>
            <input dir="ltr" class="text-sm bg-slate-50 border border-slate-100 rounded p-2"
                   placeholder="09123456789"
                   type="tel"
                   name="phone"
                   value="{{old('phone')}}"
                   id="phone">
            @error('phone')
            <span class="text-sm text-rose-500 mt-2">
                    {{$message}}
                </span>
            @enderror

            <div class="flex flex-end justify-end">
                <button class="bg-blue-500 text-white rounded p-2 mt-4 w-1/2 text-sm"
                        type="submit">
                    تایید شماره موبایل
                </button>
            </div>
        </form>
        <div class="mt-4">
        </div>
    </section>
@endsection

