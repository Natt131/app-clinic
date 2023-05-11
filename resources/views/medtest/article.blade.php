@extends('layouts.master')
@section(('styles'))
    <style>
        /*
        a .author{
            font-size: 18px;
        }
        a .author:hover{
            color: #0a4ffc;
        }
        */

    </style>
@endsection
@section('content')
    @if(session()->has('message'))
        <p class="alert alert-success" style="margin-bottom:  -10px; text-align: center"> {{ session()->get('message') }}</p>
    @endif
    <div style="background-color: white">
        <section class="medica-about-content section_padding_100">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12 col-lg-7">
                        <div class="medica-about-text">
                            <h2>{{$article->name}}</h2>
                            <h4> Автор статьи: <a  href="/doc_profile/{{$doctor->id}}"> {{$doctor->name}} {{$doctor->family}}</a></h4>
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
        <div style="color:grey; text-align: center">
        Что-то не так? Вы можете  <a style="color: blue"  data-toggle="modal" data-target="#exampleModal"> связаться </a>с модератором
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Сообщить о нарушении</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form  method="post" action="{{route('complain_article')}}" enctype="multipart/form-data">
                        @csrf
                        <label for="recipient-name" class="col-form-label">Отправить жалобу модератору</label>
                        <input type="text" name="id_article" class="form-control hidden" style="display:none !important;" id="id_article" value="{{$article->id}}">
                        <input type="text" name="id_user_indicted" class="form-control hidden" style="display:none !important;" id="id_user_indected" value="{{$article->id_user}}">
                        <input type="text" name="id_user" class="form-control hidden" style="display:none !important;" id="id_user" value="{{auth()->user()->id}}">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="reason">Причина</label>
                            </div>
                            <select class="custom-select" name="reason" id="reason">
                                <option selected value="другое">Другое</option>
                                <option value="Спам">Неккоретная информация</option>
                                <option value="Оскорбления">Оскорбления</option>
                                <option value="Мошенничество">Мошенничество</option>
                                <option value="Мошенничество">Реклама</option>
                            </select>
                        </div>
                        <button class="btn btn-primary">Отправить!</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
<!-- ***** Partners Area End ***** -->
@section(('scripts'))
@endsection
