@extends('layouts.master')
@section(('styles'))
    <style>
        .article a {
        color: #0258c4; !important;
    }
        .article a:hover {
        color:lightskyblue; !important;
    }
        .rating-area {
            overflow: hidden;
            margin: 0 auto;

        }
        .rating-area:not(:checked) > input {
            display: none;
        }
        .rating-area:not(:checked) > label {
            float: right;
            /*width: 42px;*/
            padding: 0;
            cursor: pointer;
            font-size: 32px;
            line-height: 32px;
            color: lightgrey;
            text-shadow: 1px 1px #bbb;
        }
        .rating-area:not(:checked) > label:before {
            content: '★';
        }
        .rating-area > input:checked ~ label {
            color: gold;
            text-shadow: 1px 1px #c60;
        }
        .rating-area:not(:checked) > label:hover,
        .rating-area:not(:checked) > label:hover ~ label {
            color: gold;
        }
        .rating-area > input:checked + label:hover,
        .rating-area > input:checked + label:hover ~ label,
        .rating-area > input:checked ~ label:hover,
        .rating-area > input:checked ~ label:hover ~ label,
        .rating-area > label:hover ~ input:checked ~ label {
            color: gold;
            text-shadow: 1px 1px goldenrod;
        }
        .rate-area > label:active {
            position: relative;
        }
    </style>
@endsection
@section('content')

    <div class="bg-gray" style="padding-top: 20px !important; padding-bottom: 20px !important;">

        <div class="container rounded bg-white mt-10 mb-10" style="margin-bottom: 20px; padding-bottom: 20px" >
            <div class="row" >
                <div class="col-md-4 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-6">

                        <img class="rounded-circle mt-5" width="150px" src="/public/{{$doctor->avatar}}">
                        <span class="font-weight-bold">{{$doctor->id_speciality}} </span><span class="text-black-50"></span><span> email: {{$doctor->email}}  </span>

                    <span class="text-black-50"></span><span> Средняя оценка: {{$doctor->grade}} </span></div>
                    @if  (Auth::check()&&$user = auth()->user()->email==$doctor->email)
                        <div class="text-center" >
                            <a class="btn btn-primary profile-button" style="background-color: #721c24"
                               href="edit_profile">Редактировать</a>
                        </div>
                    @else
                        <div class="text-center" ><a class="btn btn-primary profile-button" href="/chats?user_id={{$doctor->id_user}}">Написать</a></div>
                    <br>
                        {{--<div class="rating-area" >
                            <input type="radio" id="star-5" name="rating" value="{{$grade=5}}">
                            <label for="star-5" title="Оценка «5»"></label>
                            <input type="radio" id="star-4" name="rating" value="{{$grade=4}}">
                            <label for="star-4" title="Оценка «4»"></label>
                            <input type="radio" id="star-3" name="rating" value="{{$grade=3}}">
                            <label for="star-3" title="Оценка «3»"></label>
                            <input type="radio" id="star-2" name="rating" value="{{$grade=2}}">
                            <label for="star-2" title="Оценка «2»"></label>
                            <input type="radio" id="star-1" name="rating" value="{{$grade=1}}">
                            <label for="star-1" title="Оценка «1»"></label>
                            <a class="btn btn-primary profile-button" style="float:right; background-color: #a761cf" href="/grade/{{$doctor->id_user}}/garde/{{$grade}}">Поставить оценку</a>
                        </div>--}}
                    @endif
                </div>
                <div class="col-md-5 border-right">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">{{$doctor->name}} {{$doctor->surname}} {{$doctor->family}} </h4>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12"><label class="labels">Место работы: </label> <span class="label"> {{$doctor->id_clinic}} </span></div>
                            <div class="col-md-12"><label class="labels">Специальность: </label> <span class="label">{{$doctor->id_speciality}} </span></div>
                            <div class="col-md-12"><label class="labels">Образование: </label> {{$doctor->education}} <span class="label"></span></div>
                           {{-- <?php
                            $spec=explode(',', $doctor->certificate);
                            ?>--}}
                            <div class="col-md-12"><label class="labels">Повышение квалификации, курсы: </label>

                        @foreach(explode(',', $doctor->certificate) as $s)
                                {{$s}}<br>
                           @endforeach
                        </div>
                            <div class="col-md-12"><label class="labels">Специализация: </label> <span class="label">{{$doctor->spec}} </span></div>
                        </div>

{{--                            <a class="btn btn-primary profile-button" style="float:right;" href="/grade/{{$doctor->id_user}}/garde/{{3}}">Оценить</a>--}}


                    </div>
                </div>
                <div class="col-md-3">
                    <div class="p-3 py-5">
                        <div class="line">
                            <div class="col-md-12"><label class="labels">Опубликованные статьи </label> <br>
                                @foreach($articles as $article)
                                <div class="col-md-12"><a  href="/services/{{$article->id}}" class="label article">{{$article->name}}</a></div>
                                @endforeach
                            </div>
                        </div>
                 </div>
              </div>

            </div>
        </div>

@if(count($doctor->comments)!=0)
        <section class="medica-testimonials-area section_padding_100 " style="background-color: #92b5f8 !important;">
            <div class="testimonials-slider owl-carousel">
                @foreach($doctor->comments as $comment)
                    <!-- Single Testimonials Slide -->
                    <div class="single-testimonial-slide">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="section_heading white-heading">
                                        {{--                            <img src="../../../img/icons/stethoscope.png" alt="">--}}
                                        <h2>Отзывы</h2>
                                    </div>
                                    <div class="testimonial-given-author-info">
                                        <h6>{{$comment->name}}</h6>
                                        <p>Оценка: {{$comment->grade}}</p>
                                    </div>
                                    <h6>"{{$comment->text}}"</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <!-- Single Testimonials Slide -->
            </div>
        </section>
        @endif
{{--    new comm--}}
{{--    <div class="col-12 col-lg-16" style="background-color: white">--}}
    <div class="container rounded bg-white mt-2 mb-2" style="margin-bottom: 20px; padding-bottom: 20px" >
        <div class="contact-form" >
            <h5 class="mb-50" style="text-align: center; padding-top: 10px">Поделитесь впечатлениями </h5>
            <form action="/store_comment" enctype="multipart/form-data" method="post">
                @csrf
                <div class="row">

                    <div class="rating-area">
                        <input type="radio" id="star-5" name="rating" value="5">
                        <label for="star-5" title="Оценка «5»"></label>
                        <input type="radio" id="star-4" name="rating" value="4">
                        <label for="star-4" title="Оценка «4»"></label>
                        <input type="radio" id="star-3" name="rating" value="3">
                        <label for="star-3" title="Оценка «3»"></label>
                        <input type="radio" id="star-2" name="rating" value="2">
                        <label for="star-2" title="Оценка «2»"></label>
                        <input type="radio" id="star-1" name="rating" value="1">
                        <label for="star-1" title="Оценка «1»"></label>
                        <p style="margin-left:20px !important; float:right; font-size: 20px" >Ваша оценка:      </p><br>
                    </div>
                    <div class="col-md-6 " >
                        <div class="medica-about-thumbnail">
                            <img src="/public/products/22.jpg" alt="">
                        </div>
                    </div>
                    <br>
                    <div class="col-6" style="margin-top:-320px;">
                        <textarea name="text" class="form-control" id="text" cols="30" rows="10" placeholder="Расскажите о впечатленияx"></textarea>
                        <button type="submit" class="btn medica-btn btn-3 mt-3 align-center">Отправить отзыв</button>
                    </div>

                    <div >
                        <input type="number" class="form-control" style="display:none !important;" name="id_doc" id="id_doc" value="{{$doctor->id}}">
                    </div>
                </div>

            </form>
        </div>
    </div>
    {{--    endnewcomm--}}
    </div>
    </div>
    </div>
@endsection
<!-- ***** Partners Area End ***** -->
@section(('scripts'))
@endsection
