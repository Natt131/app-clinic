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


    <!-- Form-->
    <div class="form">
        <div class="form-toggle"></div>
        <div class="form-panel one">
            <div class="form-header">
                <h1>Account Login</h1>
            </div>
            <div class="form-content">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <label for="email" :value="__('Email')">Username</label>
                        <input type="email" id="email" name="email" :value="old('email')" required autofocus />
                    </div>
                    <div class="form-group">
                        <label for="password" :value="__('Password')" >Password</label>
                        <input id="password" class="block mt-1 w-full"
                               type="password"
                               name="password"
                               required autocomplete="current-password"/>
                    </div>
                    <div class="form-group">
                        <div class="block mt-4">
                            <label for="remember_me" class="inline-flex items-center">
                                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                            </label>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif
                    </div>
                    <div class="form-group">
                        <button type="submit"> {{ __('Log in') }}</button>
                    </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
<!-- ***** Partners Area End ***** -->
@section(('scripts'))
@endsection
