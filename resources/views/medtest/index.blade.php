@extends('layouts.master')
@section(('styles'))
 @endsection
@section('content')
    <div class="bg-gray" style="padding-top: 20px !important; padding-bottom: 20px !important;">
        <!-- About Contact -->
        <div class="bg-gray section_padding_100">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-7">
                        <div class="medica-about-text">
                            <h2> Сайт консультативной клиники<span>WebMED</span> </h2>
                            <p> На сайте Вы можете ознакомиться со статьями, опубликованными уже зарегестрированными докторами,
                                оставить отзыв о докторе, а также связаться с ним в мессенджере.</p>
                            <ul>
                                <li>Педиатрия</li>
                                <li>Кардиология</li>
                                <li>Офтальмология</li>
                                <li>Стоматология</li>
                                <li>Хирургия</li>
                                <li>Реаниматология</li>
                                <li>Психология</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-lg-5">
                        <div class="medica-about-thumbnail">
                            <img src="../../../img/bg-img/index2.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </section>
        <section class="medica-doctors-area bg-darkgray section_padding_100">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section_heading">
                            <img src="../../../img/icons/doctor.png" alt="">
                            <h2>Доктора сайта</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach($doctors as $doctor)
                        <!-- Single Service -->
                        <div class="col-12 col-sm-6 col-lg-3">
                            <div class="single-doctor-area">
                                <div class="doctor-thumbnail">
                                    <img  src="/public/{{$doctor->avatar}}" alt="">
                                </div>
                                <div class="doctor-meta">
                                    <h5>{{$doctor->name}} {{$doctor->family}}</h5>
                                    <h6>{{$doctor->id_speciality}}</h6>
                                    <div class="doctor-social-info">
                                        <a href="#"><i class="fa fa-google"></i></a>
                                        <a href="#"><i class="fa fa-vk"></i></a>
                                        <a href="chats?user_id={{$doctor->id}}"><i class="fa fa-linkedin"></i></a>
                                    </div>
                                    @if(auth()->user())
                                        <a href="chats?user_id={{$doctor->id}}">Написать</a>
                                    @endif
                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- ***** Doctors Area End ***** -->
    <section class="medica-about-us-area">
        <!-- Card Area -->
        <div class="medica-card-area">
            <div class="container">
                <div class="row no-gutters">
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="medica-emergency-card wow fadeInUp" data-wow-delay="0.2s">
                            <h5>Для пациентов</h5>
                            <p>Вы можете обратиться за консультацией к специалисту, посмотреть профиль и отзывы отзывы.</p>
                            <a href="/about">Посмотреть всех специлистов сайта</a>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="medica-appointment-thumb">
                            <img src="../../../img/bg-img/medical1.png" alt="">
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="medica-doctors-card fadeInUp" data-wow-delay="0.2s">
                            <h5>Для Докторов</h5>
                            <p>Вы можете заполнить информацию о себе, восспользоваться мессенджером и опубликовать статьи</p>
                            <a href="/services">Посмотреть статьи</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section(('scripts'))
@endsection



