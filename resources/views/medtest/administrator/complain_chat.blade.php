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
                                            <small>{{$info[1]}}</small>
                                        </div>
                                        <div class="chat-about" style="float:right">
                                            <h6 class="m-b-0">Обвиняемый</h6>
                                            <small>{{$info[0]}}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="chat-history">
                                <div class="chat-history">
                                    <ul class="m-b-0">

                                        @foreach($chats as $chat)
                                            <!-- Single Service -->
                                            <li class="clearfix">
                                                <div class="message-data
                                <?php
                                if($chat->user_id == $info[1])
                                    print('text-right">');
                                else
                                    print('">');
                                ?>
                                 <span class="message-data-time"> {{$chat->created_at}}</span>
                                </div>
                                <div class="message other-message
                        <?php
                        if($chat->user_id == $info[1])
                            print('float-right">');
                        else
                            print('">');
                        ?>

                       {{$chat->message}} </div>
                        </li>
               {{--                 ; border-radius: 8px; margin: 10px">
                                        <p style="color: #0b0b0b"> {{$chat->message}}</p>
                                    </div>--}}
                                @endforeach
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
                                    <a href="/deleteChatComplain/{{$info[2]}}" type="submit" class="input-group-text look-button"> Удалить жалобу </a>
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



