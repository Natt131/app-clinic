@extends('layouts.master')
@section(('styles'))
@endsection
@section('content')
    <div style="background-color: white">
        <section class="medica-services-area section_padding_100">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-8">
                        <div class="all-services">
                            <div class="row">
                                @foreach($response as $resp)
                                    <!-- Single Service -->
                                    <div class="col-12 col-lg-6">
                                        <div class="single-service">
                                            <a href="">
                                                <img src="{{$resp['articleImg']}}" alt="">
                                                <h5>{{$resp['articleName']}}</h5>
                                                <p> {{$resp['articleContent']}}</p>
                                                <a href="">Читать</a>
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

