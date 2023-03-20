@extends('layouts.master')
@section(('styles'))
@endsection
@section('content')



    <div class="container rounded bg-white mt-10 mb-10" style="margin-bottom: 20px; padding-bottom: 20px" >
    <div class="row" >
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <img class="rounded-circle mt-5" width="150px" src="../../../img/bg-img/d1.jpg">
                <span class="font-weight-bold">{{$doctor->id_speciality}} терапевт</span><span class="text-black-50"></span><span> email: {{$doctor->email}}  </span></div>
            <div class="text-center" style="margin-top: -40px;"><a class="btn btn-primary profile-button" href="/chats?user_id={{$doctor->id}}">Написать</a></div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">{{$doctor->family}} {{$doctor->name}} {{$doctor->surname}}</h4>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Место работы: </label> <span class="label"> {{$doctor->id_clinic}} </span></div>
                    <div class="col-md-12"><label class="labels">Специальность: </label> <span class="label">{{$doctor->id_speciality}} </span></div>
                    <div class="col-md-12"><label class="labels">Образование: </label> <span class="label">CREATE </span></div>
                    <div class="col-md-12"><label class="labels">Повышение квалификации: </label> </div>
                    <div class="col-md-12"><label class="labels"></label><span class="label">CREATE </span></div>
                </div>


            </div>
        </div>
        <div class="col-md-4">
            <div class="p-3 py-5">
                <div class="line">
                <div class="col-md-12"><label class="labels">Опубликованные статьи </label> <br>
                <div class="col-md-12"><label class="label">статьи....</label></div>
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
