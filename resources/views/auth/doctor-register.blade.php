
    @extends('layouts.master')
@section(('styles'))
@endsection
@section('content')
    <div class="bg-gray" style="padding-top: 20px !important; padding-bottom: 20px !important;">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

    <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900|Material+Icons'>

    <x-auth-validation-errors class="mb-4" :errors="$errors" />


    <form  method="post" action="{{route('doctor-register')}}">
        @csrf
        <div class="container rounded bg-white mt-5 mb-5">
            <div class="row">
{{--                <div class="col-md-3 border-right">--}}
{{--                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">--}}
{{--                        <label class="labels">Загузить фото: </label>--}}
{{--                        <img class="rounded-circle mt-5" width="150px" src="../../../img/bg-img/d1.jpg">--}}
{{--                        <input type="file" name="file" id="inputfile">--}}
{{--                        <span class="font-weight-bold"> </span>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <div class="col-md-5 border-right">
                    <div class="p-3 py-5">
                        <div class="row mt-3">
                            <div class="col-md-12 form-group"> <label class="labels">Фамилия: </label>
                                <input id="family" type="text"  name="family" :value="old('family')" class="form-control" placeholder="Фамилия" value="">
                            </div>

                            <div class="col-md-12 form-group"> <label class="labels">Имя: </label>
                                <input id="name" type="text" name="name"  :value="old('name')" class="form-control" placeholder="Имя" value="">
                            </div>

                            <div class="col-md-12 form-group"> <label class="labels">Отчество: </label>
                                <input input id="surname"   type="text" name="surname" :value="old('surname')" class="form-control" placeholder="Отчество" value="">
                            </div>

                            <div  class="col-md-12 form-group">
                                <label for="email" :value="__('Email')" > email: </label>

                                <input id="email" class="form-control" type="email" name="email" :value="old('email')" required />
                            </div>

{{--                            <div class="col-md-12 form-group"> <label class="labels">email: </label>--}}
{{--                                <input  id="email"   type="text" name="email" :value="old('email')" class="form-control" placeholder="email" value="">--}}
{{--                            </div>--}}

                            <div  class=" col-md-12 form-group">
                                <label  class="labels" for="birth" :value="__('дата рождения')" > Дата рождения: </label>
                                <input class="form-control" id="birth"  type="date" name="birth" :value="old('birth')" required/>
                            </div>

                            {{--            <div class="col-md-12 form-group"><label  for="city-select" class="labels">Город: </label>
                                            <select class="form-control input-lg" name="id_сity" id="id_city" data-dependent="city" onclick="getClinic();">
                                                <option value="">-- Выберите город --</option>
                                             --}}{{--   @foreach ($cities as $city)
                                                    <option class="dynamic" value={{$city->id}}>{{$city->name}}</option>
                                                @endforeach--}}{{--
                                            </select>
                                        </div>--}}

                            <p></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="p-3 py-5">
                        <br/>
                        <div class="line" style="margin-left: 20px">
                            <div class="col-md-12 form-group">
                                <label class="labels" for="id_city" :value="__('Город')"> Город: </label>
                                <input id="id_city"   type="text" name="id_city" :value="old('id_city')" placeholder="Город" required autofocus />
                            </div>
                            <div class="col-md-12 form-group">
                                <label class="labels" for="id_clinic" :value="__('Клиника')" >Медицинское учреждение: </label>
                                <input id="id_clinic"   type="text" name="id_clinic" :value="old('surname')" placeholder="Больница"required autofocus />
                            </div>

                            <div  class="col-md-12 form-group">

                                <label class="labels" for="id_speciality" :value="__('Специальность')"> Специальность: </label>
                                <select class="form-control input-lg" name="id_speciality" id="id_speciality" data-dependent="cat">
                                    <option value="">-- Выберите специальность --</option>
                                    @foreach ($specialities as $cat)
                                        <option name="{{$cat->id}}" value={{$cat->name}}> {{$cat->name}}</option>
                                    @endforeach
                                </select>

                               {{-- <label class="labels" for="id_speciality" :value="__('Специальность')"> Специальность: </label>
                                <input id="id_speciality"   type="text" name="id_speciality" :value="old('surname')" placeholder="Специальность"required autofocus />--}}
                            </div>
                            <!-- Password -->
                            <div  class="col-md-12 form-group">
                                <label class="labels" for="password" :value="__('Пароль')">Пароль: </label>
                                <input id="password" type="password" name="password" required autocomplete="new-password" />
                            </div>
                            <div  class="col-md-12 form-group">
                                <label class="labels" for="password_confirmation" :value="__('Подтвердите пароль')"> Подтвердите пароль: </label>
                                <input id="password_confirmation"  type="password"   name="password_confirmation" required />
                            </div>
                            {{ csrf_field() }}
                            <button class="btn medica-btn mt-15" style="margin-left: 20px"> Зарегистироваться! </button>

                                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                                    {{ __('Уже есть аккаунт?') }}
                                </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </form>

{{--    old-version--}}
{{--    <div class="form">
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
    </div>--}}
</div>
@endsection
<!-- ***** Partners Area End ***** -->
@section(('scripts'))
@endsection
