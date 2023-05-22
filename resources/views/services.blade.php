@extends('layouts.master')
@section(('styles'))
@endsection
@section('content')
<div style="background-color: white">
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
                                <li><a href="/services/slug/{{$category->category}}">{{$category->category}}</a></li>
                            </ul>
                            @endforeach
                        </div>

                        <div class="medica-apposintment-card">
                        <a class="btn medica-btn mt-15"  href="/create_article" >Создать статью</a>
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
                                    <a href="services/{{$post->id}}">Читать</a>
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
