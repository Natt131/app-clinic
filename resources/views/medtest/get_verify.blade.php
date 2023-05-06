
@extends('layouts.master')
@section(('styles'))
    <style>
        .hidden {
            display:none; !important;
        }
    </style>
@endsection
@section('content')
    <div class="bg-gray" style="padding-top: 20px !important; padding-bottom: 20px !important;">
        <section class="medica-contact-area section_padding_100">
            <div class="container" >
                <div class="row">
                    <!-- Contact Form Area -->
                    <div class="col-12 col-lg-16" style="background-color: white">
                        <div class="contact-form">
                            <h5 class="mb-50">Получить подтверждение профиля специалиста </h5>

                            <form action="{{route('createVerify')}}" enctype="multipart/form-data" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <input type="text" class="form-control" name="phone" id="phone" placeholder="Рабочий телефон">
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <input type="text" class="form-control" name="email" id="email" placeholder="Рабочая почта">
                                    </div>
                                    <div class="col-12">
                                        <textarea name="message" class="form-control" id="message" cols="30" rows="10" placeholder="Сообщение для администратора с дополнительной информацией о себе"></textarea>
                                    </div>
                                    <div class="col-12">
                                        <label style="color: #0a53be" for="file">Загрузите файл, подтверждающий вашу специальность*(При их отсутвии заявка будет проигнорирована)</label>
                                        <input  type="file" name="file" id="file"></br>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <input type="text" class="form-control hidden"  name="id_user" id="id_user" value="{{auth()->user()->id}}" >
                                    </div>

                                    <div class="col-12">
                                        <button type="submit" class="btn medica-btn btn-3 mt-3">Отправить заявку</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                   {{-- <div class="col-12 col-lg-4">
                        <div class="content-sidebar">
                            <!-- Medica Emergency Card -->
                            <div class="medica-emergency-card mb-4">
                                <h5>For Emergencies</h5>
                                <h4>+0080 954 4557 884</h4>
                                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                            </div>
                            <!-- Medica Appointment Card -->
                            <div class="medica-contact-card">
                                <h5>Useful Information</h5>
                                <div class="mt-50"></div>
                                <div class="single-contact-info d-flex align-items-center">
                                    <div class="contact-icon mr-30">
                                        <img src="../../../img/icons/alarm-clock.png" alt="">
                                    </div>
                                    <div class="contact-meta">
                                        <p>Monday - Friday 08:00 - 21:00 <br> Saturday and Sunday - CLOSED</p>
                                    </div>
                                </div>
                                <div class="single-contact-info d-flex align-items-center">
                                    <div class="contact-icon mr-30">
                                        <img src="../../../img/icons/envelope.png" alt="">
                                    </div>
                                    <div class="contact-meta">
                                        <p>673 729 766 | 234 5678 900 <br> contact@business.com</p>
                                    </div>
                                </div>
                                <div class="single-contact-info d-flex align-items-center">
                                    <div class="contact-icon mr-30">
                                        <img src="../../../img/icons/map-pin.png" alt="">
                                    </div>
                                    <div class="contact-meta">
                                        <p>Lamas Carbajal Str, no 14-18 <br> 41770 Montellano</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>--}}
                </div>
            </div>
        </section>
    </div>

@endsection
@section(('scripts'))
@endsection
