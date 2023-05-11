
<!-- ***** Header Area Start ***** -->
<header class="header-area" style="margin-top: -20px !important;">
    <!-- Top Header Area -->
    <div class="top-header-area gradient-background">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-12 h-100">
                    <div class="h-100 d-md-flex justify-content-between align-items-center">
                        <div class="top-header-social-info" >
                            <a href="" data-placement="left" > Добро пожаловать! </a>
                        </div>
                        <div class="top-header-menu">
                            <nav class="top-menu">
                                <ul>
                                  {{--  @if  (Auth::check())--}}
                                        <li><a href="#">Cтраница администратора сайта</a></li>
                                        <form method="POST" action="">{{--{{ route('admin.logout') }}">--}}
                                            @csrf
                                            <div class="form-group">
                                                <button type="submit" >
                                                    {{ __('Выход') }}
                                                </button>
                                            </div>
                                        </form>
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
                            <a class="navbar-brand" href="/index.blade.php"><img src="../../../img/core-img/logonew1.png" alt="Logo"></a>

                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#medicaMenu" aria-controls="medicaMenu" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i> Menu</button>

                            <div class="collapse navbar-collapse" id="medicaMenu">
                                <!-- Menu Area -->
                                <ul class="navbar-nav ml-auto">
                               {{--     <li class="nav-item active">
                                        <a class="nav-link" href="/"> Вернуться на сайт<span class="sr-only">(current)</span></a>
                                    </li>--}}
                                    <li class="nav-item active">
                                        <a class="nav-link" href="/admin">Главная <span class="sr-only">(current)</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="/admin/message_complaint">Нарушения из диалогов</a>

                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="/admin/verify_list">Подтверждение профиля</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="/admin/article_complaint">Нарушения в статьях</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
