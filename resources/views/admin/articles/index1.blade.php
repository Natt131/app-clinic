@extends('layouts.admin')
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
                    </div>
                </div>
            </div>
    </div>
    <!-- ***** Appointment Area End ***** -->
@endsection
<!-- ***** Partners Area End ***** -->
@section(('scripts'))
@endsection



