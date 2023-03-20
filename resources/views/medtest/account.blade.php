@extends('layouts.master')
@section(('styles'))
@endsection
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900|Material+Icons'>
    <div class="form">
        <div class="form-toggle"></div>
        <div class="form-panel one">
            <div class="form-header">
                <h1 style="text-align: center">Rewrite Account</h1>
            </div>
            <div class="form-content">
                <div class="form-content">
                    <form method="post" action="{{route('/account' )}}">
                        @csrf
                        <div class="form-group">
                            <label for="name">Имя</label>
                            <input type="text" id="name" name="name" required="required"/>
                        </div>
                        <div class="form-group">
                            <label for="surname">Surname</label>
                            <input type="text" id="surname" name="surname" required="required"/>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" id="address" name="address" required="required"/>
                        </div>


                        <div class="form-group">
                            <button type="submit" style="margin-bottom: 10px">Сохранить изменения</button>
                        </div>
                    </form>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <div class="form-group">
                            <button type="submit" >
                                {{ __('Log Out') }}
                            </button>
                            </div>
                        </form>

                </div>
            </div>
                </div>
    </div>
@endsection
<!-- ***** Partners Area End ***** -->
@section(('scripts'))
@endsection
