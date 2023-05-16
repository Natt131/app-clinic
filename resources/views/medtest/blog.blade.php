@extends('layouts.master')
@section(('styles'))
@endsection
@section('content')
    @if(session()->has('message'))
        <p class="alert alert-success" style="margin-bottom:  -10px; text-align: center"> {{ session()->get('message') }}</p>
    @endif
    <div style="background-color: white">
<section class="breadcumb-area bg-img gradient-background-overlay" style="background-image: url(../../../img/bg-img/hero4.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="breadcumb-content">
                    <!-- Title -->
                    <h3 class="breadcumb-title">Последние новости медицины</h3>
                    <!-- Breadcumb -->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">Новости с сайта www.mk.ru</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="medica-blog-area section_padding_100">
    <div class="container">
        <div class="row">

            <div class=" col-lg-12">
@foreach($response as $resp)
                <!-- Single Blog Area Start  -->
                <div class="single-blog-area" style="display:inline-block; margin-bottom: -20px;">
                    <!-- Post Thumb -->
                    <div class="post-thumb">

                        <!-- Post Date -->

                    </div>
                    <!-- Post Content -->
                    <div class="post-content" style="padding:10px">
                  {{--      <div class="post-date">
                            <a href="#">Dec 05, 2017</a>
                        </div>--}}
                        <img  src="{{$resp['articleImg']}} " style="float:left; margin-right: 10px;" alt="">

                            <h4 >{{$resp['articleName']}}</h4>
           {{--                 <div class="post-meta mb-30 d-flex align-items-center">
                                <p class="author mb-0">Author:<a href="#"> Loredana Papp</a> |</p>
                                <p class="author mb-0">in<a href="#"> Medicine Breacktrough</a> |</p>
                                <p class="author mb-0"><a href="#">3 Comments</a></p>
                            </div>--}}
                            <p> {{$resp['articleContent']}} <a style="color: #0a4ffc" href="news/{{$resp['articleUrl']}}">Читать далее</a> </p>


                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
    </div>
@endsection
<!-- ***** Partners Area End ***** -->
@section(('scripts'))
@endsection
