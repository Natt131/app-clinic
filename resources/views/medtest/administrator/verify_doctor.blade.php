@extends('layouts.admin_master')
@section(('styles'))
    <style>
        #myiframe {
            height: 100%;
        }
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
                                    <div class="col-lg-12" style="text-align: center">
                                        <div class="chat-about">
                                            <h6 class="m-b-0" >{{$doctor->name}} {{$doctor->surname}} {{$doctor->family}}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="chat-history">
                                <div style="background-color: white">
                                    <section class="medica-about-content section_padding_100">
                                        <div class="container">
                                            <div class="row align-items-center" style="margin-top: -20px">
                                                <div class="col-12 col-lg-4" >
                                                    <div class="medica-about-text" style="margin-top: -80px !important;">
                                                       <span style="color:#0a4ffc" > Рабочий email: </span>{{$doctor->email}}<br><br>

                                                       <span style="color:#0a4ffc" > Рабочий  телефон: </span>{{$doctor->phone}}<br><br>
                                                       <span style="color:#0a4ffc"> Специальность: </span>{{$doctor->id_speciality}}<br><br>

                                                        <p style="color:#a11616"> Сообщение*</p>.
                                                        <p> {{$doctor->message}}</p>

                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-8">
                                                    <div id="scroller">
                                                        <iframe style="width:100%; height: 500px"  src="/public/{{$doctor->file}}"></iframe>
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
                                <a href="/deleteUserComplain/{{0}}" type="submit" class="input-group-text look-button-del"> Заблокировать пользователя</a>
                                <a href="/admin/message_complaint" class="input-group-text look-button-back"> Вернуться к списку</a>
                                {{--</div>
                                <div class="input-group">--}}
                                <a href="/deleteArticleComplain/{{0}}" type="submit" class="input-group-text look-button"> Отклонить </a>
                                <a href="/verifyUser/{{$doctor->id_user}}" style="background-color: green" type="submit" class="input-group-text look-button"> Подтвердить </a>
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



