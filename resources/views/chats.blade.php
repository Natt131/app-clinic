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
                            <h5>Our Departments</h5>
                            <ul class="department-menu">
                                <li><a href="#">Radiology</a></li>
                                <li><a href="#">Cardiology</a></li>
                                <li><a href="#">Gastroenterology</a></li>
                                <li><a href="#">Neurology</a></li>
                                <li><a href="#">General surgery</a></li>
                                <li><a href="#">Haematology</a></li>
                                <li><a href="#">Nutrition</a></li>
                                <li><a href="#">Obstetrics</a></li>
                                <li><a href="#">Ophthalmology</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-8">
                    <div class="all-services">
                        <div class="row">
                            @foreach($chats as $chat)
                            <!-- Single Service -->

                                <div class="col-8 " style="background-color:
                                <?php
                                if($chat->user_id == auth()->user()->id)
                                    print('gray');
                                else
                                    print('blue');
                                ?>
                                ; border-radius: 8px; margin: 10px">
                                    <p style="color: #0b0b0b"> {{$chat->message}}</p>
                                </div>
                            @endforeach
                            <!-- Single Service -->

                        </div>
                    </div>


                    <div class="medica-apposintment-card">
                        <h5>send message</h5>
                        <form  method="post" action="/chats" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="user_id" id="user_id" value="<?php echo($_GET["user_id"]); ?>">
                                <textarea rows="10" cols="45" class="form-control" name="message" id="message"></textarea>
                            </div>

                            <button type="submit" class="btn medica-btn mt-15">Написать</button>
                        </form>
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

