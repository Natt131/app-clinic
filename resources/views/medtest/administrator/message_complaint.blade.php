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
                    <p>Здесь можно посмотреть жалобы пользователей из диалогов</p>
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
                <th scope="col">Причина жалобы</th>
                <th scope="col">Просмотреть</th>
            </tr>
            </thead>
            <tbody>
            @foreach($chats as $chat)
                <tr>
                    <th scope="row">{{$chat->created_at}}</th>
                    <td>{{$chat->name}}</td>
                    <td>{{$chat->reason}}</td>
                    <td>

                        <a href="message_complaint/{{$chat->id}}" style="background-color: #0a4ffc; !important;
                         padding: 5px;
                         color:white;
                         border-radius: 5px;"> Подробнее</a>
                        {{--                    <a href="services/{{$post->id}}">--}}

                    </td>
                </tr>
            @endforeach
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>

                    <a href="message_complaint/{{1}}" style="background-color: #0a4ffc; !important;
                         padding: 5px;
                         color:white;
                         border-radius: 5px;"> Подробнее</a>
{{--                    <a href="services/{{$post->id}}">--}}

                </td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>Larry</td>
                <td>the Bird</td>
                <td>@twitter</td>
            </tr>
            </tbody>
        </table>

    </div>
    </div>
@endsection
@section(('scripts'))
@endsection



