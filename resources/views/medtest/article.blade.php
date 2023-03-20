@extends('layouts.master')
@section(('styles'))
@endsection
@section('content')

    <div style="background-color: white">
        <section class="breadcumb-area bg-img gradient-background-overlay" style="background-image: url(../../../img/bg-img/hero2.jpg);">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <div class="breadcumb-content">
                            <!-- Title -->
                            <h3 class="breadcumb-title">About us</h3>
                            <!-- Breadcumb -->
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">About us</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="medica-about-content section_padding_100">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12 col-lg-7">
                        <div class="medica-about-text">
                            <h2>{{$article->name}}</h2>
                            <p>Phasellus at nunc orci. Donec ipsum metus, pharetra quis nunc sit amet, maximus vehicula nibh. Praesent pulvinar porta elit, a commodo erat accumsan sed. Vivamus vel tristique nibh. Donec imperdiet congue orci consequat mattis. Donec rutrum porttitor sollicitudin. Pellentesque id dolor tempor sapien feugiat ultrices nec sed neque. Fusce ac mattis nulla. Morbi eget ornare dui. Donec nec fringilla mi. Pellentesque molestie consequat felis vitae elementum. Proin ut tempor urna.</p>
                            <ul>
                                <li>Cardiovascular Diseases</li>
                                <li>Neonatology</li>
                                <li>Ophthalmology</li>
                                <li>Toracic Surgery</li>
                                <li>Gastroenterology</li>
                                <li>Plastic Surgery</li>
                                <li>Neurology</li>
                                <li>Ortopedy</li>
                            </ul>
                            <img src="../../../img/bg-img/signature.png" alt="">
                        </div>
                    </div>
                    <div class="col-12 col-lg-5">
                        <div class="medica-about-thumbnail">
                            <img src="../../../img/bg-img/about1.png" alt="">
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
