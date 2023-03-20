@extends('layouts.master')
@section(('styles'))
@endsection
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

    <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900|Material+Icons'>

<!-- Form-->
<div class="form">
    <div class="form-toggle"></div>
    <div class="form-panel one">
        <div class="form-header">
            <h1>Account Login</h1>
        </div>
        <div class="form-content">
            <form>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required="required"/>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required="required"/>
                </div>
                <div class="form-group">
                    <label class="form-remember">
                        <input type="checkbox"/>Remember Me
                    </label><a class="form-recovery" href="#">Forgot Password?</a>
                </div>
                <div class="form-group">
                    <button type="submit">Log In</button>
                </div>
            </form>
        </div>
    </div>
    <div class="form-panel two">
        <div class="form-header">
            <h1>Register Account</h1>
        </div>
        <div class="form-content">
            <form>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required="required"/>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required="required"/>
                </div>
                <div class="form-group">
                    <label for="cpassword">Confirаукпкупm Password</label>
                    <input type="password" id="cpassword" name="cpassword" required="required"/>
                </div>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" required="required"/>
                </div>
                <div class="form-group">
                    <button type="submit">Register</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
<!-- ***** Partners Area End ***** -->
@section(('scripts'))
@endsection
