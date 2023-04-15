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
                                написать сообщение специалисту.</p>
                            <ul>
                                <li>Педиатрия</li>
                                <li>Кардиология</li>
                                <li>Офтальмология</li>
                                <li>Аллергология</li>
                                <li>Гастроэнтерология</li>
                                <li>Психология</li>
                            </ul>
    {{--                        <a href="#" class="btn medica-btn btn-2">Read More</a>--}}
                        </div>
                    </div>
                    <div class="col-12 col-lg-5">
                        <div class="medica-about-thumbnail">
                            <img src="../../../img/bg-img/doctor.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </section>
        <!-- ***** About Us Area End ***** -->
    =
        <section class="medica-doctors-area bg-darkgray section_padding_100">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section_heading">
                            <img src="../../../img/icons/doctor.png" alt="">
                            <h2>Доктора</h2>
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

    <!-- ***** About Us Area Start ***** -->
    <section class="medica-about-us-area">
        <!-- Card Area -->
        <div class="medica-card-area">
            <div class="container">
                <div class="row no-gutters">
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="medica-emergency-card wow fadeInUp" data-wow-delay="0.2s">
                            <h5>Для пациентов</h5>
                            <p>Вы можете обратиться за консультацией к специалисту, посмотреть некоторые статьи и новсти.</p>
                            <a href="#">Узнать больше</a>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="medica-doctors-card wow fadeInUp" data-wow-delay="0.4s">
                            <h5>Для Докторов</h5>
                            <p>Вы можете вести собственый блог, заполнить информацию о расписании приема, просмотреть список записей и личных сообщений от пользователей ресурса.</p>
                            <a href="#">Узнать больше</a>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="medica-appointment-thumb">
                            <img src="../../../img/bg-img/medical1.png" alt="">
                        </div>
                    </div>
    {{--                <div class="col-12 col-lg-4">--}}
    {{--                    <div class="medica-appointment-card wow fadeInUp" data-wow-delay="0.6s">--}}
    {{--                        <h5>Заявка на прием</h5>--}}
    {{--                        <form action="#" method="post">--}}
    {{--                            <div class="form-group">--}}
    {{--                                <input type="text" class="form-control text-white" name="name" id="name" placeholder="Имя">--}}
    {{--                            </div>--}}
    {{--                            <div class="form-group">--}}
    {{--                                <input type="text" class="form-control" name="number" id="number" placeholder="Номер">--}}
    {{--                            </div>--}}
    {{--                            <div class="form-group">--}}
    {{--                                <input type="email" class="form-control" name="email" id="email" placeholder="E-mail">--}}
    {{--                            </div>--}}
    {{--                            <button type="submit" class="btn medica-btn mt-15">Создать обращение</button>--}}
    {{--                        </form>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
                </div>
            </div>
        </div>

{{--    <!-- ***** Appointment Area Start ***** -->--}}
{{--        <section class="medica-book-an-appointment-area section_padding_100_0">--}}
{{--            <div class="container">--}}
{{--                <div class="row align-items-center">--}}
{{--                    <div class="col-12 col-lg-6">--}}
{{--                        <div class="medica-appointment-card">--}}
{{--                            <h5>Создать заявку</h5>--}}

{{--                            <form action="#" method="post">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-12 col-md-6">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <input type="text" class="form-control text-white" name="name" id="appointmentName" placeholder="ФИО">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-12 col-md-6">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <i class="fa fa-angle-down" aria-hidden="true"></i>--}}
{{--                                            <select class="form-control" id="speciality">--}}
{{--                                                <option>Педиатрия</option>--}}
{{--                                                <option>Терапевтия</option>--}}
{{--                                                <option>Кардилогия</option>--}}
{{--                                                <option>Офтальмология</option>--}}
{{--                                                <option>Психиатрия</option>--}}
{{--                                            </select>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-12 col-md-6">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <input type="text" class="form-control" name="number" id="appointmentNumber" placeholder="Номер">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-12 col-md-6">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <i class="fa fa-angle-down" aria-hidden="true"></i>--}}
{{--                                            <select class="form-control" id="doctors">--}}
{{--                                                <option>Dr. Riyadh Khan</option>--}}
{{--                                                <option>Dr. Kumkum Rashid</option>--}}
{{--                                                <option>Dr. Lim Sarah</option>--}}
{{--                                            </select>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-12 col-md-6">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <input type="email" class="form-control" name="email" id="appointmentEmail" placeholder="E-mail">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-12 col-md-6">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <i class="fa fa-calendar" aria-hidden="true"></i>--}}
{{--                                            <input type="date" class="form-control" name="date" id="date">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-12">--}}
{{--                                        <button type="submit" class="btn medica-btn mt-15">Создать заяку</button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </form>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="col-12 col-lg-6">--}}
{{--                        <div class="medica-appointment-thumb">--}}
{{--                            <img src="../../../img/bg-img/medical1.png" alt="">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </section>--}}
    </div>
<!-- ***** Appointment Area End ***** -->
@endsection
<!-- ***** Partners Area End ***** -->
@section(('scripts'))
@endsection



