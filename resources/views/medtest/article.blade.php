@extends('layouts.master')
@section(('styles'))
@endsection
@section('content')

    <div style="background-color: white">
        <section class="medica-about-content section_padding_100">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12 col-lg-7">
                        <div class="medica-about-text">
                            <h2>{{$article->name}}</h2>
                            <p>{{$article->description}}</p>
                            <p>{{$article->text}}</p>

                        </div>
                    </div>
                    <div class="col-12 col-lg-5">
                        <div class="medica-about-thumbnail">
                            <img src="/public/{{$article->image}}" alt="">
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
