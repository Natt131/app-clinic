@extends('layouts.admin_master')
@section(('styles'))
    <style>
        .look-button{
            background-color: #0a4ffc; !important;
            border-radius: 10px;
        }
    </style>
@endsection
@section('content')
    <div class="bg-gray" style="padding-top: 20px !important; padding-bottom: 20px !important;">
        <div class="row">
            <div class="col-12">
                <div class="section_heading">
                    {{--    <img src="../../../img/icons/doctor.png" alt="">--}}
                    <h2>Сообщения</h2>
                    <p>Заявки на подтверждение профиля</p>
                </div>
            </div>
        </div>
        <div class="container bg-white " style="margin-top: -20px;margin-bottom: 20px; padding-bottom: 20px; width:80% !important;" >
            <!-- About Contact -->
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Дата</th>
                    <th scope="col">Пользователь</th>
                    <th scope="col">Специальность</th>
                    <th scope="col">Просмотреть</th>
                    <th scope="col">Удалить</th>
                </tr>
                </thead>
                <tbody>
                @foreach($doctors as $doctor)
                    <tr>
                        <th scope="row">{{$doctor->created_at}}</th>
                        <td>{{$doctor->name}} {{$doctor->surname}} {{$doctor->family}}</td>
                        <td>{{$doctor->id_speciality}}</td>
                        <td>

                            <a href="verify_doctor/{{$doctor->id}}" style="background-color: #0a4ffc; !important;
                         padding: 5px;
                         color:white;
                         border-radius: 5px;"> Подробнее</a>
                            {{--                    <a href="services/{{$post->id}}">--}}

                        </td>
                        <td>

                            <a href="/delete/{{0}}" style="background-color: #ff0000; !important;
                         padding: 5px;
                         color:white;
                         border-radius: 5px;"> Удалить</a>
                            {{--                    <a href="services/{{$post->id}}">--}}

                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>

        </div>
    </div>
@endsection
@section(('scripts'))
@endsection



