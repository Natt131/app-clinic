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
                    <p>Phasellus at nunc orcidonec ipsum metus, pharetra quis nunc sit amet</p>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach($doctors as $doct)
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="single-doctor-area wow fadeInUp" data-wow-delay="0.2s">
                    <div class="doctor-thumbnail">
                        <a href="doc_profile/{{$doct->id}}">
                            <img src="../../../img/bg-img/d1.jpg" alt=""> </a>
                    </div>
                    <div class="doctor-meta">
                        <h5> {{$doct->name}} </h5>
                        <h6></h6>
                        <div class="doctor-social-info">
                            <a href="#"><i class="fa fa-google"></i></a>
                            <a href="#"><i class="fa fa-vk"></i></a>
                            <a href="#"><i class="fa fa-gmail"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="single-doctor-area wow fadeInUp" data-wow-delay="0.4s">
                    <div class="doctor-thumbnail">
                        <img src="../../../img/bg-img/d2.jpg" alt="">
                    </div>
                    <div class="doctor-meta">
                        <h5>Dr. Josh Henderson</h5>
                        <h6>Plastic Surgeon</h6>
                        <div class="doctor-social-info">
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="single-doctor-area wow fadeInUp" data-wow-delay="0.6s">
                    <div class="doctor-thumbnail">
                        <img src="../../../img/bg-img/d3.jpg" alt="">
                    </div>
                    <div class="doctor-meta">
                        <h5>Dr. Christinne Jones</h5>
                        <h6>Pediatrist</h6>
                        <div class="doctor-social-info">
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="single-doctor-area wow fadeInUp" data-wow-delay="0.8s">
                    <div class="doctor-thumbnail">
                        <img src="../../../img/bg-img/d4.jpg" alt="">
                    </div>
                    <div class="doctor-meta">
                        <h5>Dr. William Stan</h5>
                        <h6>General Practicioner</h6>
                        <div class="doctor-social-info">
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="single-doctor-area wow fadeInUp" data-wow-delay="0.2s">
                    <div class="doctor-thumbnail">
                        <img src="../../../img/bg-img/d5.jpg" alt="">
                    </div>
                    <div class="doctor-meta">
                        <h5>Dr. William Parker</h5>
                        <h6>Cardiologist</h6>
                        <div class="doctor-social-info">
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="single-doctor-area wow fadeInUp" data-wow-delay="0.4s">
                    <div class="doctor-thumbnail">
                        <img src="../../../img/bg-img/d6.jpg" alt="">
                    </div>
                    <div class="doctor-meta">
                        <h5>Dr. Maria Hernandez</h5>
                        <h6>Plastic Surgeon</h6>
                        <div class="doctor-social-info">
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="single-doctor-area wow fadeInUp" data-wow-delay="0.6s">
                    <div class="doctor-thumbnail">
                        <img src="../../../img/bg-img/d7.jpg" alt="">
                    </div>
                    <div class="doctor-meta">
                        <h5>Dr. Stella Jones</h5>
                        <h6>Pediatrist</h6>
                        <div class="doctor-social-info">
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="single-doctor-area wow fadeInUp" data-wow-delay="0.8s">
                    <div class="doctor-thumbnail">
                        <img src="../../../img/bg-img/d8.jpg" alt="">
                    </div>
                    <div class="doctor-meta">
                        <h5>Dr. Jack Gillian</h5>
                        <h6>General Practicioner</h6>
                        <div class="doctor-social-info">
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="see-all-doctors text-center wow fadeInUp" data-wow-delay="1s">
                    <a href="#" class="btn medica-btn btn-2">See All Doctors</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="cta-area section_padding_100 bg-img gradient-background-overlay" style="background-image: url(../../../img/bg-img/cta1.jpg);">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-md-7 col-lg-9">
                <div class="cta-content">
                    <h2>We have the best doctors in the country</h2>
                    <h6>Phasellus at nunc orcidonec ipsum metus, pharetra quis nunc sit amet</h6>
                </div>
            </div>
            <div class="col-12 col-md-5 col-lg-3">
                <div class="cta-btn">
                    <a href="#" class="btn medica-btn">Make an Appointment</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="medica-department-area section_padding_100_0">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section_heading">
                    <img src="img/icons/molecule.png" alt="">
                    <h2>Our Services</h2>
                    <p>Phasellus at nunc orcidonec ipsum metus, pharetra quis nunc sit amet</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-sm-4 col-md-3 col-lg-2">
                <div class="single-department-area text-center">
                    <img src="../../../img/icons/scanner.png" alt="">
                    <h6>Radiology</h6>
                </div>
            </div>
            <div class="col-12 col-sm-4 col-md-3 col-lg-2">
                <div class="single-department-area text-center">
                    <img src="../../../img/icons/cardiogram.png" alt="">
                    <h6>Cardiology</h6>
                </div>
            </div>
            <div class="col-12 col-sm-4 col-md-3 col-lg-2">
                <div class="single-department-area text-center">
                    <img src="../../../img/icons/blood-donation.png" alt="">
                    <h6>ENT</h6>
                </div>
            </div>
            <div class="col-12 col-sm-4 col-md-3 col-lg-2">
                <div class="single-department-area text-center">
                    <img src="../../../img/icons/stomach.png" alt="">
                    <h6>Gastroenterology</h6>
                </div>
            </div>
            <div class="col-12 col-sm-4 col-md-3 col-lg-2">
                <div class="single-department-area text-center">
                    <img src="../../../img/icons/head.png" alt="">
                    <h6>Neurology</h6>
                </div>
            </div>
            <div class="col-12 col-sm-4 col-md-3 col-lg-2">
                <div class="single-department-area text-center">
                    <img src="../../../img/icons/lungs.png" alt="">
                    <h6>General surgery</h6>
                </div>
            </div>
            <div class="col-12 col-sm-4 col-md-3 col-lg-2">
                <div class="single-department-area text-center">
                    <img src="../../../img/icons/microscope.png" alt="">
                    <h6>Haematology</h6>
                </div>
            </div>
            <div class="col-12 col-sm-4 col-md-3 col-lg-2">
                <div class="single-department-area text-center">
                    <img src="../../../img/icons/mortar.png" alt="">
                    <h6>Nutrition</h6>
                </div>
            </div>
            <div class="col-12 col-sm-4 col-md-3 col-lg-2">
                <div class="single-department-area text-center">
                    <img src="../../../img/icons/ribbon.png" alt="">
                    <h6>Obstetrics</h6>
                </div>
            </div>
            <div class="col-12 col-sm-4 col-md-3 col-lg-2">
                <div class="single-department-area text-center">
                    <img src="../../../img/icons/glasses.png" alt="">
                    <h6>Ophthalmology</h6>
                </div>
            </div>
            <div class="col-12 col-sm-4 col-md-3 col-lg-2">
                <div class="single-department-area text-center">
                    <img src="../../../img/icons/stretcher.png" alt="">
                    <h6>Physiotherapy</h6>
                </div>
            </div>
            <div class="col-12 col-sm-4 col-md-3 col-lg-2">
                <div class="single-department-area text-center">
                    <img src="../../../img/icons/injection.png" alt="">
                    <h6>Urology</h6>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
<!-- ***** Partners Area End ***** -->
@section(('scripts'))
@endsection
