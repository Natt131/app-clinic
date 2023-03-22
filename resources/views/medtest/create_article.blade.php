@extends('layouts.master')
@section(('styles'))
@endsection
@section('content')
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

    </div>
@endsection
<!-- ***** Partners Area End ***** -->
@section(('scripts'))
@endsection

