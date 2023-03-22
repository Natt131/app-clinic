@extends('layouts.master')
@section(('styles'))
@endsection
@section('content')


    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

    <div class="container">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card chat-app">
                    <div id="plist" class="people-list">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-search"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Search...">
                        </div>
                        <ul class="list-unstyled chat-list mt-2 mb-0">
                            @foreach($users as $use)
                                <li class="clearfix">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="avatar">
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
                                <div class="col-lg-6">
                                    <a href="javascript:void(0);" data-toggle="modal" data-target="#view_info">
                                        <img src="/public/{{$doctor->avatar}}" alt="avatar">
                                    </a>
                                    <div class="chat-about">
                                        <h6 class="m-b-0">{{$doctor->name}} {{$doctor->family}}</h6>
                                        <small>Last seen: 2 hours ago</small>
                                    </div>
                                </div>
                                <div class="col-lg-6 hidden-sm text-right">
                                    <a href="javascript:void(0);" class="btn btn-outline-secondary"><i class="fa fa-camera"></i></a>
                                    <a href="javascript:void(0);" class="btn btn-outline-primary"><i class="fa fa-image"></i></a>
                                    <a href="javascript:void(0);" class="btn btn-outline-info"><i class="fa fa-cogs"></i></a>
                                    <a href="javascript:void(0);" class="btn btn-outline-warning"><i class="fa fa-question"></i></a>
                                </div>
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
    @endsection
    <!-- ***** Partners Area End ***** -->
    @section(('scripts'))
    @endsection

