@extends('layouts.master')
@section(('styles'))
@endsection
@section('content')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

    <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900|Material+Icons'>

    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <div class="form">
        <div class="form-toggle"></div>
        <div class="form-panel one">
            <div class="form-header">
                <h1>Registration</h1>
            </div>
            <div class="form-content">
                <form method="POST" action="{{route('doctor-register')}}">
                    @csrf
                    <!-- Name -->
                    <div class="form-group">
                        <x-label for="family" :value="__('Фамилия')" />
                        <x-input id="family" class="block mt-1 w-full" type="text" name="family" :value="old('family')" required autofocus />
                    </div>

                    <div class="form-group">
                        <x-label for="name" :value="__('Имя')" />
                        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                    </div>

                    <div class="form-group">
                        <x-label for="surname" :value="__('Отчество')" />
                        <x-input id="surname" class="block mt-1 w-full" type="text" name="surname" :value="old('surname')" required autofocus />
                    </div>

                    <!-- Email Address -->
                    <div  class="form-group">
                        <x-label for="email" :value="__('Email')" />

                        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                    </div>

                    <div  class="form-group">
                        <x-label for="birth" :value="__('дата рождения')" />
                        <x-input id="birth" class="block mt-1 w-full" type="date" name="birth" :value="old('birth')" required />
                    </div>
                    <!-- city and other -->
                    <div class="form-group">
                        <x-label for="id_city" :value="__('Город')" />
                        <x-input id="id_city" class="block mt-1 w-full" type="text" name="id_city" :value="old('id_city')" required autofocus />
                    </div>
                    <div class="form-group">
                        <x-label for="id_clinic" :value="__('Клиника')" />
                        <x-input id="id_clinic" class="block mt-1 w-full" type="text" name="id_clinic" :value="old('surname')" required autofocus />
                    </div>
                    <div class="id_speciality">
                        <x-label for="id_speciality" :value="__('Специальность')" />
                        <x-input id="id_speciality" class="block mt-1 w-full" type="text" name="id_speciality" :value="old('surname')" required autofocus />
                    </div>
                    <!-- Password -->
                    <div  class="form-group">
                        <x-label for="password" :value="__('Пароль')" />

                        <x-input id="password" class="block mt-1 w-full"
                                 type="password"
                                 name="password"
                                 required autocomplete="new-password" />
                    </div>


                    <!-- Confirm Password -->
                    <div  class="form-group">
                        <x-label for="password_confirmation" :value="__('Подтвердите пароль')" />

                        <x-input id="password_confirmation" class="block mt-1 w-full"
                                 type="password"
                                 name="password_confirmation" required />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>
                    </div>
                    <x-button class="form-group">
                        {{ __('Register') }}
                    </x-button>

                </form>
            </div>
        </div>
    </div>s

@endsection
<!-- ***** Partners Area End ***** -->
@section(('scripts'))
@endsection
