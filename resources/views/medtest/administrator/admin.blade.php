@extends('layouts.admin_master')
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
                            <h2> Страница для администратора сайта<span>WebMED</span> </h2>
                            <p> ааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааа.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </section>
        <!-- ***** About Us Area Start ***** -->
        <section class="medica-about-us-area">
            <!-- Card Area -->
            <div class="medica-card-area">
                <div class="container">
                    <div class="row no-gutters">
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="medica-emergency-card wow fadeInUp" data-wow-delay="0.2s">
                                <h5>Сообщения</h5>
                                <p>Просмотреть входщие жалобы пользователей из диалогов</p>
                                <a href="/admin/message_complaint">Перейти</a>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="medica-doctors-card wow fadeInUp" data-wow-delay="0.4s">
                                <h5>Статьи</h5>
                                <p> Просмотреть входщие жалобы пользователей на статьи</p>
                                <a href="/admin/article_complaint">Перейти</a>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="medica-doctors-card wow fadeInUp" data-wow-delay="0.4s">
                                <h5>Подтверждение профиля</h5>
                                <p>Подтвердить профиль специалиста на сайте</p>
                                <a href="/conf_profile">Перейти</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection
@section(('scripts'))
@endsection



