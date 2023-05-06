<!-- Preloader -->
<div id="preloader">
    <div class="medica-load"></div>
    <img src="../../../img/core-img/plus.png" alt="logo">
</div>

<!-- ***** Header Area Start ***** -->
<header class="header-area" style="margin-top: -20px !important;">
    <!-- Top Header Area -->
    <div class="top-header-area gradient-background">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-12 h-100">
                    <div class="h-100 d-md-flex justify-content-between align-items-center">
                        <div class="top-header-social-info" >
                            <a @if  (Auth::check()&&$user = auth()->user()->role_user=='doctor') href="edit_profile" @else href="/account" @endif data-placement="left" > Добро пожаловать, @if  (Auth::check()) {{$user = auth()->user()->name}} @else гость! @endif </a>
                        </div>
                        <div class="top-header-menu">
                            <nav class="top-menu">
                                <ul>
                                    @if  (Auth::check())
                                        @if  ($user = auth()->user()->role_user=='doctor') <li>
                                            <a  href="/edit_profile"> Личный кабинет</a></li>@endif
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <div class="form-group">
                                                <button type="submit" >
                                                    {{ __('Выход') }}
                                                </button>
                                            </div>
                                        </form>
{{--                                        <li> <a href=" {{ route('logout') }}"> Выход </a></li>--}}
                                    @else
                                    <li><a href="login">Вход</a></li>
                                    <li><a href="register">Регистарция</a></li>
                                    @endif

                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Header Area -->
    <div class="main-header-area" id="stickyHeader">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12 h-100">
                    <div class="main-menu h-100">
                        <nav class="navbar h-100 navbar-expand-lg">
                            <!-- Logo Area  -->
                            <a class="navbar-brand" href="index.blade.php"><img src="../../../img/core-img/logonew1.png" alt="Logo"></a>

                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#medicaMenu" aria-controls="medicaMenu" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i> Menu</button>

                            <div class="collapse navbar-collapse" id="medicaMenu">
                                <!-- Menu Area -->
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item active">
                                        <a class="nav-link" href="/">Главная <span class="sr-only">(current)</span></a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Сервисы</a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="/about">Доктора</a>
                                            <a class="dropdown-item" href="/messanger">Мессенджер</a>
                                            <a class="dropdown-item" href="/get_verify">Подтвердить профиль</a>

{{--                                            <a class="dropdown-item" href="elements">Elements</a>--}}
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="/about">Доктора</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="/services">Статьи</a>
                                    </li>
{{--                                    <li class="nav-item">--}}
{{--                                        <a class="nav-link" href="blog">Новости</a>--}}
{{--                                    </li>--}}
                                    @if  (Auth::check()&&$user = auth()->user()->role_user=='doctor')
                                    <li class="nav-item">
                                        <a class="nav-link" style="color:#954de3" href="/get_verify"> Подтвердить профиль</a>
{{--                                        <a  href="/get_verify">Контакты</a>--}}
                                   {{--     href="contact"--}}
                                    </li>
                                    @endif
                                </ul>
                                <!-- Search Form -->
                  {{--              <div class="header-search-form ml-auto">
                                    <form action="#">
                                        <input type="search" class="form-control" placeholder="Найти..." id="search" name="search">
                                        <input class="d-none" type="submit" value="submit">
                                    </form>
                                </div>--}}
                                <!-- Search btn -->
{{--                                <div id="searchbtn">--}}
{{--                                    <i class="ti-search" aria-hidden="true"></i>--}}
{{--                                </div>--}}
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
