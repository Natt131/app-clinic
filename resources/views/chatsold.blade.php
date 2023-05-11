@extends('layouts.master')
@section(('styles'))
    <style>
        .hidden {
            display:none; !important;
        }
    </style>
@endsection
@section('content')

  {{--  <meta http-equiv="Refresh" content="10">--}}
  <meta name="csrf-token" content="{{ csrf_token() }}" >
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <div class="bg-gray" style="padding-top: 20px !important; padding-bottom: 20px !important;">
    <div class="container">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card chat-app">
                    <div id="plist" class="people-list">
         {{--               <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-search"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Search...">
                        </div>--}}

                        <ul class="list-unstyled chat-list mt-2 mb-0">
                            @foreach($users as $use)
                                <li class="clearfix">
{{--                                    <img src="/public/public/avatars/default.png" alt="avatar">--}}
                                    <div class="about">
                                        <div class="name">{{$use->name}}</div>
                                        <a class="status" href="chats?user_id={{$use->id}}"> <i class="fa fa-circle offline"></i> Перейти к диалогу.. </a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="chat">
                        <div class="chat-header clearfix">
                            <div class="row">
                                <div class="col-lg-12">
                                    <a href="javascript:void(0);" data-toggle="modal" data-target="#view_info">
                                        <img src="/public/{{$doctor->avatar}}" alt="avatar">
                                    </a>
                                    <div class="chat-about">
                                        <h6 class="m-b-0">{{$doctor->name}} {{$doctor->family}}</h6>
                                        <small>Last seen: 2 hours ago</small>
                                    </div>
                                    <div class="chat-about" style="float:right">
                                        <button type="button" style="background-color: #bdbbbb" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Пожаловаться</button>
                                    </div>
                                </div>
{{--                                <div class="col-lg-6 hidden-sm text-right">--}}
{{--                                    <a href="javascript:void(0);" class="btn btn-outline-secondary"><i class="fa fa-camera"></i></a>--}}
{{--                                    <a href="javascript:void(0);" class="btn btn-outline-primary"><i class="fa fa-image"></i></a>--}}
{{--                                    <a href="javascript:void(0);" class="btn btn-outline-info"><i class="fa fa-cogs"></i></a>--}}
{{--                                    <a href="javascript:void(0);" class="btn btn-outline-warning"><i class="fa fa-question"></i></a>--}}
{{--                                </div>--}}
                            </div>
                        </div>
                        <div class="chat-history">
                            <ul class="m-b-0">

                                @foreach($chats as $chat)
                                    <!-- Single Service -->
                                    <li class="clearfix">
                                        <div class="message-data
                                <?php
                                if($chat->user_id == auth()->user()->id)
                                    print('text-right">');
                                else
                                    print('">');
                                ?>
                                 <span class="message-data-time"> {{$chat->created_at}}</span>
                        </div>

                        <div class="message other-message
                        <?php
                        if($chat->user_id == auth()->user()->id)
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
                        <div class="chat-message clearfix">

                            <form  method="post" action="/chats" enctype="multipart/form-data">
                                @csrf
                                <div class="input-group mb-0">
                                    <input type="hidden" class="form-control" name="user_id" id="user_id" value="<?php echo($_GET["user_id"]); ?>">
                                    <input rows="10" cols="45" class="form-control" name="message" id="message"></input>

                                <div class="input-group-prepend">
                                <button type="submit" class="input-group-text"><i class="fa fa-send"></i></button>
                                </div>  </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Отправить жалобу</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" id="chatComplain" action="/complain">
                        @csrf
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Отправить жалобу модератору</label>
                            <input type="text" class="form-control hidden" style="display:none !important;" id="id_indicted" value="{{$doctor->id_user}}">
                            <input type="text" class="form-control hidden" style="display:none !important;" id="id_user" value="{{auth()->user()->id}}">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="reason">Причина</label>
                            </div>
                            <select class="custom-select" id="reason">
                                <option selected>Другое</option>
                                <option value="1">Спам</option>
                                <option value="2">Оскорбления</option>
                                <option value="3">Мошенничество</option>
                            </select>
                        </div>

                        </div>
                        <div class="modal-footer">
                            <a class="btn btn-secondary" data-dismiss="modal">Закрыть</a>
                            {{csrf_field()}}
                            <button type="button" class="btn btn-primary" id="send" onclick="aaa()" >Отправить</button>
                        </div>
                  </form>
            </div>
        </div>
    </div>
<script src="../../../js/chat.js"></script>

  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    <script type="text/javascript">
        //запуск модальки
        $('#exampleModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var recipient = button.data('whatever'); // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this);
            modal.find('.modal-title').text('New message to ' + recipient);
            modal.find('.modal-body input').val(recipient);
        })

    </script>
    @endsection
    <!-- ***** Partners Area End ***** -->
{{--    @section(('scripts'))
    @endsection--}}

