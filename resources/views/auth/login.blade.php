@extends('layouts.master')
@section(('styles'))
@endsection
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

    <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900|Material+Icons'>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <div class="bg-gray" style="padding-top: 20px !important; padding-bottom: 20px !important;">
    <!-- Form-->
    <div class="form">
        <div class="form-toggle"></div>
        <div class="form-panel one">
            <div class="form-header">
                <h1>Войти на сайт</h1>
            </div>
            <div class="form-content">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <label for="email" :value="__('Email')">Email</label>
                        <input type="email" id="email" name="email" :value="old('email')" required autofocus />
                    </div>
                    <div class="form-group">
                        <label for="password" :value="__('Password')" >Пароль</label>
                        <input id="password" class="block mt-1 w-full"
                               type="password"
                               name="password"
                               required autocomplete="current-password"/>
                    </div>
                    <div class="form-group">
                        <div class="block mt-4">
                  {{--          <label for="remember_me" class="inline-flex items-center">
                                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                                <span class="ml-2 text-sm text-gray-600">{{ __('Запомнить меня') }}</span>
                            </label>--}}
                        </div>

                        <div class="flex items-center justify-end mt-4">

{{--                            @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                    {{ __('Забыли пароль?') }}
                                </a>
                            @endif--}}
                    </div>
                    <div class="form-group">
                        <button type="submit"> {{ __('Войти') }}</button>
                    </div>
                    </div>
                </form>
                <div class="form-group">
                    <a href=" "> {{ __('Зарегистрироваться') }}</a>
                </div>
                <div class="form-group">
                    <a href="" > {{ __('Зарегистрироваться как доктор') }}</a>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection
<!-- ***** Partners Area End ***** -->
@section(('scripts'))
@endsection
