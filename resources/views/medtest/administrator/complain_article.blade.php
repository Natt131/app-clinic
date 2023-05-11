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
                                            <h6 class="m-b-0">Сообщивший о нарушении</h6>
                                            <small>{{$info[1]}}</small>
                                        </div>
                                        <div class="chat-about" style="float:right">
                                            <h6 class="m-b-0">Автор статьи</h6>
                                            <small>Александр</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="chat-history">
                                <div style="background-color: white">
                                    <section class="medica-about-content section_padding_100">
                                        <div class="container">
                                            <div class="row align-items-center">
                                                <div class="col-12 col-lg-7">
                                                    <div class="medica-about-text">
                                                        <h2>{{$article->name}}</h2>
                                                        <p>{{$article->description}}</p>
                                                        <p>{{$article->text}}</p>

                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-5">
                                                    <div class="medica-about-thumbnail">
                                                        <img src="/public/{{$article->image}}" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>

                                        </div>
                                    </div>
                                </div>
                            </div>
                    <div class="chat-message clearfix" style="background-color: #ebf0fa">
                        <form  method="" action="" enctype="multipart/form-data">
                            @csrf
                            <div class="input-group button-group">
                                <a href="/deleteUserComplain/{{$info[3]}}" type="submit" class="input-group-text look-button-del"> Заблокировать пользователя</a>
                                <a href="/admin/message_complaint" class="input-group-text look-button-back"> Вернуться к списку</a>
                                {{--</div>
                                <div class="input-group">--}}
                                <a href="/deleteArticleComplain/{{$info[2]}}" type="submit" class="input-group-text look-button"> Удалить жалобу </a>
                                <a href="/deleteArticle/{{$article->id}}" type="submit" class="input-group-text look-button"> Удалить статью </a>
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



