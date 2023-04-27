@extends('layouts.admin_master')
@section(('styles'))
    <style>

        .look-button{
            margin-inline: auto;
            background-color: #0a4ffc; !important;
            border-radius: 10px;
            color:white;
        }
        .look-button-del{
            background-color: #ff0000; !important;
            border-radius: 10px;
            color:white;
            margin-inline: auto;
        }
    </style>
@endsection
@section('content')
    <meta http-equiv="Refresh" content="10">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <div class="bg-gray" style="padding-top: 20px !important; padding-bottom: 20px !important;">
        <div class="container">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="chat ">
                            <div class="chat-header clearfix" >
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="chat-about">
                                            <h6 class="m-b-0">Подавший жалобу</h6>
                                            <small>Такой-то вот...</small>
                                        </div>
                                        <div class="chat-about" style="float:right">
                                            <h6 class="m-b-0">Обвиняемый</h6>
                                            <small>И этот такой...</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="chat-history">
                                <ul class="m-b-0">

                                        <li class="clearfix">
                                            <div class="message-data text-right">
                                 <span class="message-data-time"> data-time</span>
                            </div>

                            <div class="message other-message float-right">
                               message 1
                            </div>
                        </li>
                                    <div class="message other-messaget">
                                        message 2
                                    </div>
                        </ul>
                        </div>
                        <div class="chat-message clearfix" style="background-color: #ebf0fa">
                            <form  method="" action="" enctype="multipart/form-data">
                                @csrf
                                <div class="input-group button-group">
                                        <button type="submit" class="input-group-text look-button-del"> Заблокировать пользователя</button>
                                        <a href="/admin/message_complaint" class="input-group-text look-button-back"> Вернуться к списку</a>
                                {{--</div>
                                <div class="input-group">--}}
                                    <button type="submit" class="input-group-text look-button"> Удалить жалобу </button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
    </div>
    <script type="text/javascript">
       //  setTimeout(function () { location.reload(true); }, 10000);
    </script>
@endsection
@section(('scripts'))
@endsection



