
@extends('layouts.master')
@section(('styles'))
{{--    <style>--}}
{{--        .hidden {--}}
{{--            display:none; !important;--}}
{{--        }--}}
{{--    </style>--}}
@endsection
@section('content')
    @if(session()->has('message'))
        <p class="alert alert-success" style="margin-bottom:  -10px; text-align: center"> {{ session()->get('message') }}</p>
    @endif
    {{--  <meta http-equiv="Refresh" content="10">--}}
    <meta name="csrf_token" content="{{ csrf_token() }}" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <div class="bg-gray" style="padding-top: 30px !important; padding-bottom: 20px !important;">
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
                                            <div class="name">{{$use->name}} {{$use->lastname}}</div>
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
                                        <div class="chat-about">
                                            <h6 class="m-b-0">Выберите диалог слева</h6>

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

                                                        </ul>
                        </div>
                        <div class="chat-message clearfix">


                        </div>
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
