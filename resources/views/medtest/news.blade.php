@extends('layouts.master')
@section(('styles'))
@endsection
@section('content')
    @if(session()->has('message'))
        <p class="alert alert-success" style="margin-bottom:  -10px; text-align: center"> {{ session()->get('message') }}</p>
    @endif
    <div style="background-color: white">
        <section class="medica-about-content section_padding_100">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12 col-lg-12">
                        <div class="medica-about-thumbnail">
                            <img src="{{$response['articleImg']}}" alt="">
                        </div>
                        <div class="medica-about-text">
                            <h2>{{$response['articleName']}}</h2>
{{--
         <h4> Автор статьи: <a  href="/doc_profile/{{$doctor->id}}"> {{$doctor->name}} {{$doctor->family}}</a></h4>--}}
                            <p>{{$response['articleDescription']}}</p>
                            <p>{{$response['articleText']}}</p>

                        </div>
                    </div>
{{--                    <div class="col-12 col-lg-5">--}}
                       {{-- <div class="medica-about-thumbnail">
                            <img src="{{$response['articleImg']}}" alt="">
                        </div>--}}
{{--                    </div>--}}
                </div>
            </div>
        </section>
    </div>
@endsection
<!-- ***** Partners Area End ***** -->
@section(('scripts'))
@endsection
