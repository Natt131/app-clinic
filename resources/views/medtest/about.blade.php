@extends('layouts.master')
@section(('styles'))
@endsection
@section('content')
<!-- ***** Header Area End ***** -->
<section class="medica-doctors-area bg-gray section_padding_100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section_heading">
                    <img src="../../../img/icons/doctor.png" alt="">
                    <h2>Доктора</h2>
                    <p>Здесь можно посмотреть профили зарегистрированных специалистов</p>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach($doctors as $doct)
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="single-doctor-area wow fadeInUp" data-wow-delay="0.2s">
                    <div class="doctor-thumbnail">
                        <a href="doc_profile/{{$doct->id}}">
                            <img src="/public/{{$doct->avatar}}" alt=""> </a>
                    </div>
                    <div class="doctor-meta">
                        <h5> {{$doct->name}}  {{$doct->family}}</h5>
                        <h6></h6>
                        <div class="doctor-social-info">
                            <a href="#"><i class="fa fa-google"></i></a>
                            <a href="#"><i class="fa fa-vk"></i></a>
                            <a href="chats?user_id={{$doct->id}}"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            <div class="col-12">
                <div class="see-all-doctors text-center wow fadeInUp" data-wow-delay="1s">
                    <a href="#" class="btn medica-btn btn-2">Загрузить еще</a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
<!-- ***** Partners Area End ***** -->
@section(('scripts'))
@endsection
