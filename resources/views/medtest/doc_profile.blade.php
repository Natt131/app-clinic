@extends('layouts.master')
@section(('styles'))
    <style>
        .article a {
        color: #0258c4; !important;
    }
        .article a:hover {
        color:lightskyblue; !important;
    }
    </style>
@endsection
@section('content')

    <div class="bg-gray" style="padding-top: 20px !important; padding-bottom: 20px !important;">

    <div class="container rounded bg-white mt-10 mb-10" style="margin-bottom: 20px; padding-bottom: 20px" >
    <div class="row" >
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <img class="rounded-circle mt-5" width="150px" src="/public/{{$doctor->avatar}}">
                <span class="font-weight-bold">{{$doctor->id_speciality}} </span><span class="text-black-50"></span><span> email: {{$doctor->email}}  </span></div>
            @if  (Auth::check()&&$user = auth()->user()->email==$doctor->email)
                <div class="text-center" >
                    <a class="btn btn-primary profile-button" style="background-color: #721c24"
                       href="edit_profile">Редактировать</a>
                </div>
            @else
                <div class="text-center" style="margin-top: -40px;"><a class="btn btn-primary profile-button" href="/chats?user_id={{$doctor->id_user}}">Написать</a></div>
            @endif
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">{{$doctor->family}} {{$doctor->name}} {{$doctor->surname}}</h4>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Место работы: </label> <span class="label"> {{$doctor->id_clinic}} </span></div>
                    <div class="col-md-12"><label class="labels">Специальность: </label> <span class="label">{{$doctor->id_speciality}} </span></div>
                    <div class="col-md-12"><label class="labels">Образование: </label> {{$doctor->education}} <span class="label"></span></div>
                    <div class="col-md-12"><label class="labels">Повышение квалификации, курсы: </label> </label> {{$doctor->certificate}}</div>
                    <div class="col-md-12"><label class="labels">Специализация: </label> <span class="label">{{$doctor->spec}} </span></div>
                </div>

            </div>
        </div>
        <div class="col-md-4">
            <div class="p-3 py-5">
                <div class="line">
                    <div class="col-md-12"><label class="labels">Опубликованные статьи </label> <br>
                        @foreach($articles as $article)
                        <div class="col-md-12"><a  href="/services/{{$article->id}}" class="label article">{{$article->name}}</a></div>
                        @endforeach
                    </div>
                </div>
         </div>
      </div>

</div>
</div>
</div>
    </div>
@endsection
<!-- ***** Partners Area End ***** -->
@section(('scripts'))
@endsection
