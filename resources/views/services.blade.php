@extends('layouts.master')
@section(('styles'))
@endsection
@section('content')
<div style="background-color: white">
     <section class="breadcumb-area bg-img gradient-background-overlay" style="background-image: url(../../../img/bg-img/hero3.jpg);">
     <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcumb-content">
                        <!-- Title -->
                        <h3 class="breadcumb-title">Services</h3>
                        <!-- Breadcumb -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Services</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="medica-services-area section_padding_100">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="medica-services-sidebar-area">
                        <!-- Medica Doctors Card -->
                        <div class="medica-department-card">
                            <h5>Категории </h5>
                            @foreach($categories as $category)
                            <ul class="department-menu">
                                <li><a href="services/{{$category->category}}">{{$category->category}}</a></li>
                            </ul>
                            @endforeach
                        </div>
                        <!-- Вводим новые данные -->

                        <div class="medica-apposintment-card">
                        <a class="btn medica-btn mt-15"  href="create_article" >Создать статqью</a>
                        </div>

                        <!-- Medica Appointment Card -->
                        <div class="medica-contact-card">
                            <h5>Useful Information</h5>
                            <div class="mt-50"></div>
                            <div class="single-contact-info d-flex align-items-center">
                                <div class="contact-icon mr-30">
                                    <img src="../../../img/icons/alarm-clock.png" alt="">
                                </div>
                                <div class="contact-meta">
                                    <p>Monday - Friday 08:00 - 21:00 <br> Saturday and Sunday - CLOSED</p>
                                </div>
                            </div>
                            <div class="single-contact-info d-flex align-items-center">
                                <div class="contact-icon mr-30">
                                    <img src="../../../img/icons/envelope.png" alt="">
                                </div>
                                <div class="contact-meta">
                                    <p>673 729 766 | 234 5678 900 <br> contact@business.com</p>
                                </div>
                            </div>
                            <div class="single-contact-info d-flex align-items-center">
                                <div class="contact-icon mr-30">
                                    <img src="../../../img/icons/map-pin.png" alt="">
                                </div>
                                <div class="contact-meta">
                                    <p>Lamas Carbajal Str, no 14-18 <br> 41770 Montellano</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-8">
                    <div class="all-services">
                        <div class="row">
                            @foreach($posts as $post)
                            <!-- Single Service -->
                            <div class="col-12 col-lg-6">
                                <div class="single-service">
                                    <a href="services/{{$post->id}}">
                                    <img src="/public/{{$post->image}}" alt="">
                                    <h5>{{$post->name}}</h5>
                                    <p> {{$post->description}}</p>
                                    <p> {{$post->id_user}}</p>
                                    <a href="services/{{$post->id}}">Read More</a>
                                </div>
                            </div>
                            @endforeach
                            <!-- Single Service -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
    @endsection
    <!-- ***** Partners Area End ***** -->
    @section(('scripts'))
    @endsection

