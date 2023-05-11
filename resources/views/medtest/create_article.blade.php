@extends('layouts.master')
@section(('styles'))
@endsection
@section('content')
    <div class="bg-gray" style="padding-top: 20px !important; padding-bottom: 20px !important;">
        <form  method="post" action="{{route('services')}}" enctype="multipart/form-data">
            @csrf
            <div class="container rounded bg-white mt-5 mb-5">
                <div class="row">
                    <div class="col-md-5 border-right">
                        <div class="p-3 py-5">
                            <div class="row mt-3">
                                <div class="col-md-12 form-group"><label class="labels">Название статьи: </label>
                                     <input  class="form-control"  type="text" name="name" id="name1" placeholder="Название" value="">
                                </div>
                                <div class="col-md-12 form-group"><label  for="city-select" class="labels">Описание: </label>
                                    <input  class="form-control"   type="text" name="description" placeholder="Текст">
                                </div>
                                <div class="col-md-12 form-group">
                                    <label class="labels">Выберите категорию: </label>
                                    <select class="form-control input-lg" name="id_cat" id="id_cat" data-dependent="cat">
                                        <option value="">-- Выберите категорию статьи --</option>
                                        @foreach ($categories as $cat)
                                            <option name="{{$cat->id}}" value={{$cat->id}}> {{$cat->category}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="p-3 py-5">
                            <div class="line" style="padding-left: 20px"> <br/>
                                <div class="col-12 form-group"><label  class="labels">Текст сатьи: </label><br>
{{--                                    <input  class="form-control"  style="height: 130px;" type="textarea" name="text">--}}

                                        <textarea style="width:500px" name="message" class="form-control" id="message" cols="30" rows="10" placeholder="Введите текст статьи..."></textarea>

                                </div>
                                <label class="labels">Выберите фото: </label>
                                <input type="file" name="file" id="inputfile"></br>
                                <button class="btn medica-btn mt-15">Опубликовать!</button>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
        </form>
            </div>


{{--


        <form  method="post" action="{{route('services')}}" enctype="multipart/form-data">
            @csrf
            <div class="container rounded bg-white mt-5 mb-5">
                <div class="row">
                    <div class="col-md-5 border-right">
                        <div class="p-3 py-5">
                            <div class="row mt-3">
                                <div class="col-md-12 form-group"><label class="labels">Название статьи: </label>
                                    <input  class="form-control"  type="text" name="name" id="name1" placeholder="Название" value="">
                                </div>
                                <div class="col-md-12 form-group"><label  for="city-select" class="labels">Описание: </label>
                                    <input  class="form-control"   type="text" name="description" placeholder="Текст">
                                </div>
                                <div class="col-md-12 form-group">
                                    @foreach ($categories as $cat)
                                        {{$cat->category}}
                                    @endforeach
                                    <select class="form-control input-lg" name="id_cat" id="id_cat" data-dependent="cat">
                                        <option value="">-- Выберите категорию статьи --</option>
                                        @foreach ($categories as $cat)
                                            <option name="{{$cat->id}}" value={{$cat->id}}> {{$cat->category}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                            <div class="col-md-4">
                                <div class="p-3 py-5">
                                    <div class="col-md-12 form-group"><label  class="labels">Текст сатьи: </label>
                                        <input  class="form-control"   type="textarea" name="text" placeholder="Текст">
                                    </div>
                                    <p></p>
                                    <label class="labels">Выберите фото: </label>
                                    <input type="file" name="file" id="inputfile"></br>
                                    <button class="btn medica-btn mt-15">Опубликовать!</button>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>--}}

{{--
    <div style="background-color: white
    ">
        <section class=" bg-img " style="background-image: url(../../../img/bg-img/ban2.jpg); height: 200px;">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <div class="breadcumb-content">
                            <!-- Title -->
                            <h3 class="breadcumb-title">Создать статью</h3>
                            <!-- Breadcumb -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div style="align-content: center; align-items: center">

            <form method="post" action="{{route('services')}}" enctype="multipart/form-data">
                @csrf
                <label style="margin:20px; font-size: 18px; color: #0a4ffc"> Название статьи: </label>
                <input style="outline: none; border-style: none; border-bottom: 1px solid; margin: 30px; width:250px;"
                       type="text" name="name" id="name1" placeholder="Название"><br>

                <label style="margin:20px; font-size: 18px; color: #0a4ffc"> Описание: </label>
                <input style="outline: none; border-style: none; border-bottom: 1px solid; margin: 30px; width:500px;"
                       type="textarea" name="description" placeholder="Текст">

                <input type="file" name="file" id="inputfile"></br>
                <button class="btn medica-btn mt-15">Создать статью</button>
            </form>

        </div>
        </section>

    </div>--}}
    </div>
@endsection
<!-- ***** Partners Area End ***** -->
@section(('scripts'))
@endsection

