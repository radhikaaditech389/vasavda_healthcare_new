<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Clinic - Vasavada womens hospital Bopal</title>
    <meta name="author" content="Vasavada Women's Hospital">
    <meta name="description" content="Womens clinic at top womens hospital bopal and lady gynecologist bopal">
    <meta name="keywords" content="Womens clinic bopal, Womens hospital bopal, Women's hospital bopal, gynecologist bopal, lady gynecologist bopal, womens hospital near by, gynecologist near by, lady gynecologist near by">
    <link rel="canonical" href="https://www.vasavadahospitals.org/clinic" />
    @include('patient.layout.head')
</head>

<body class="">
    @include('patient.layout.mobile_menu')
    @include('patient.layout.side_menu')
    @include('patient.layout.header', ['footer' => $footer])
    <div class="breadcumb-wrapper " style="margin-top: -30px !important;">
        <div class="parallax" data-parallax-image="{{ asset('patient/img/breadcurmb/special_clinic_breadcrumb.jpg') }}"></div>
        <div class="container z-index-common">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title" style="-webkit-text-stroke: 2px black;
    -webkit-text-fill-color: #702840; ">Our Special Clinics</h1>
                <div class="breadcumb-menu-wrap">
                    <i class="far fa-home-lg"></i>
                    <ul class="breadcumb-menu">
                        <li><a href="/">Home</a></li>
                        <li class="active">Clinic</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <section class=" space-top space-md-bottom">
        <div class="container">
            <div class="section-title text-center wow fadeInUp" data-wow-delay="0.3s">
                <h2 class="sec-title h1"> <span class="inner-text">Our Special Clinics</span></h2>
                {{-- <p class="sec-text">Search or browse by hospital, treatment or consultant to see what can do for you</p> --}}
                <div class="sec-icon2"><img src="{{ asset('patient/img/icon/sec-icon-754.png')}} " alt="icon"></div>
            </div>
            <div class="row wow fadeInUp" data-wow-delay="0.4s"  data-center-mode="true">
                <div class="col-xl-4 feature-style1">
                    <div class="feature-body">
                        <div class="feature-content">
                            <h3 class="feature-title"><a href="#" class="text-inherit">Paediatric Clinic</a></h3>
                            {{-- <p class="feature-text">Sample text is here..!</p> --}}
                        </div>
                        <div class="clinic-image">
                            <img src="{{ asset('patient/img/service/paediatric_clinic 410X190.jpg')}}" alt="icon">
                            <div class="overlay">
                                <a href="/appointment" class="appointment-button">Appointment Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 feature-style1">
                    <div class="feature-body">
                        <div class="feature-content">
                            <h3 class="feature-title"><a href="#" class="text-inherit">Menopause Clinic</a></h3>
                            {{-- <p class="feature-text">Sample text is here..!</p> --}}
                        </div>
                        <div class="clinic-image">
                            <img src="{{ asset('patient/img/service/menopause_clinic 410X190.jpg') }}" alt="icon">
                            <div class="overlay">
                                <a href="/appointment" class="appointment-button">Appointment Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 feature-style1">
                    <div class="feature-body">
                        <div class="feature-content">
                            <h3 class="feature-title"><a href="#" class="text-inherit">Adolescent Clinic</a></h3>
                            {{-- <p class="feature-text">Sample text is here..!</p> --}}
                        </div>
                        <div class="clinic-image">
                            <img src="{{ asset('patient/img/service/our_special_clinic_breadcrumb 410X190.jpg') }}" alt="icon">
                            <div class="overlay">
                                <a href="/appointment" class="appointment-button">Appointment Now</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 feature-style1">
                    <div class="feature-body">
                        <div class="feature-content">
                            <h3 class="feature-title"><a href="#" class="text-inherit">Pregnancy Termination Clinic</a></h3>
                            {{-- <p class="feature-text">Sample text is here..!</p> --}}
                        </div>
                        <div class="clinic-image">
                            <img src="{{ asset('patient/img/service/pregnancy_termination_clinic 410X190.jpg') }}" alt="icon">
                            <div class="overlay">
                                <a href="/appointment" class="appointment-button">Appointment Now</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 feature-style1">
                    <div class="feature-body">
                        <div class="feature-content">
                            <h3 class="feature-title"><a href="#" class="text-inherit">Family Planning & Contraception</a></h3>
                            {{-- <p class="feature-text">Sample text is here..!</p> --}}
                        </div>
                        <div class="clinic-image">
                            <img src="{{ asset('patient/img/service/family_planning_contraception 410X190.jpg') }}" alt="icon">
                            <div class="overlay">
                                <a href="/appointment" class="appointment-button">Appointment Now</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 feature-style1">
                    <div class="feature-body">
                        <div class="feature-content">
                            <h3 class="feature-title"><a href="#" class="text-inherit">Heavy Bleeding Clinic</a></h3>
                            {{-- <p class="feature-text">Sample text is here..!</p> --}}
                        </div>
                        <div class="clinic-image">
                            <img src="{{ asset('patient/img/service/heavy_bleeding_clinic 410X190.jpg') }}" alt="icon">
                            <div class="overlay">
                                <a href="/appointment" class="appointment-button">Appointment Now</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 feature-style1">
                    <div class="feature-body">
                        <div class="feature-content">
                            <h3 class="feature-title"><a href="#" class="text-inherit">Sexual Health <br>Clinic</a></h3>
                            {{-- <p class="feature-text">Sample text is here..!</p> --}}
                        </div>
                        <div class="clinic-image">
                            <img src="{{ asset('patient/img/service/landing_page_world_sexual_health_day_illustration-01  410X190.jpg') }}" alt="icon">
                            <div class="overlay">
                                <a href="/appointment" class="appointment-button">Appointment Now</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 feature-style1">
                    <div class="feature-body">
                        <div class="feature-content">
                            <h3 class="feature-title"><a href="#" class="text-inherit">Twins/Triplets <br>Clinic</a></h3>
                            {{-- <p class="feature-text">Sample text is here..!</p> --}}
                        </div>
                        <div class="clinic-image">
                            <img src="{{ asset('patient/img/service/twins_triplets 410X190.jpg') }}" alt="icon">
                            <div class="overlay">
                                <a href="/appointment" class="appointment-button">Appointment Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 feature-style1">
                    <div class="feature-body">
                        <div class="feature-content">
                            <h3 class="feature-title"><a href="#" class="text-inherit">High-risk Pregnancy Clinic</a></h3>
                            {{-- <p class="feature-text">Sample text is here..!</p> --}}
                        </div>
                        <div class="clinic-image">
                            <img src="{{ asset('patient/img/service/432med 410X190.jpg')}}" alt="icon">
                            <div class="overlay">
                                <a href="/appointment" class="appointment-button">Appointment Now</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 feature-style1">
                    <div class="feature-body">
                        <div class="feature-content">
                            <h3 class="feature-title"><a href="#" class="text-inherit">PCOS Clinic</a></h3>
                            {{-- <p class="feature-text">Sample text is here..!</p> --}}
                        </div>
                        <div class="clinic-image">
                            <img src="{{ asset('patient/img/service/4333739 410X190.jpg') }}" alt="icon">
                            <div class="overlay">
                                <a href="/appointment" class="appointment-button">Appointment Now</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 feature-style1">
                    <div class="feature-body">
                        <div class="feature-content">
                            <h3 class="feature-title"><a href="#" class="text-inherit">Infertility clinic</a></h3>
                            {{-- <p class="feature-text">Sample text is here..!</p> --}}
                        </div>
                        <div class="clinic-image">
                            <img src="{{ asset('patient/img/service/18043470 410X190.jpg') }}" alt="icon">
                            <div class="overlay">
                                <a href="/appointment" class="appointment-button">Appointment Now</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 feature-style1">
                    <div class="feature-body">
                        <div class="feature-content">
                            <h3 class="feature-title"><a class="text-inherit">Physician Clinic</a></h3>
                            {{-- <p class="feature-text">Sample text is here..!</p> --}}
                        </div>
                        <div class="clinic-image">
                            <img src="{{ asset('patient/img/service/4990224 410X190.jpg') }}" alt="icon">
                            <div class="overlay">
                                <a href="/appointment" class="appointment-button">Appointment Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    @include('patient.layout.footer')

    <a href="#" class="scrollToTop scroll-bottom  style2"><i class="fas fa-arrow-alt-up"></i></a>

    <!-- Jquery -->
    <script src="{{ asset('patient/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <!-- Slick Slider -->
    <script src="{{ asset('patient/js/slick.min.js') }}"></script>
    <script src="{{ asset('patient/js/slick-animation.min.js') }}"></script>
    <!-- <script src="{{ asset('patient/js/app.min.js') }}"></script> -->
    <!-- Layerslider -->
    <script src="{{ asset('patient/js/layerslider.utils.js') }}"></script>
    <script src="{{ asset('patient/js/layerslider.transitions.js') }}"></script>
    <script src="{{ asset('patient/js/layerslider.kreaturamedia.jquery.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('patient/js/bootstrap.min.js') }}"></script>
    <!-- jQuery Datepicker -->
    <script src="{{ asset('patient/js/jquery.datetimepicker.min.js') }}"></script>
    <!-- Magnific Popup -->
    <script src="{{ asset('patient/js/jquery.magnific-popup.min.js') }}"></script>
    <!-- Isotope Filter -->
    <script src="{{ asset('patient/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('patient/js/isotope.pkgd.min.js') }}"></script>
    <!-- Parallax Scroll -->
    <script src="{{ asset('patient/js/universal-parallax.min.js') }}"></script>
    <!-- WOW Animation -->
    <script src="{{ asset('patient/js/wow.min.js') }}"></script>
    <!-- Custom Carousel -->
    <script src="{{ asset('patient/js/vscustom-carousel.min.js') }}"></script>
    <!-- Form Js -->
    <script src="{{ asset('patient/js/ajax-mail.js') }}"></script>
    <!-- Main Js File -->
    <script src="{{ asset('patient/js/main.js') }}"></script>

</body>

</html>
<style>
    .clinic-image {
    position: relative;
}

.clinic-image img {
    width: 100%; /* Ensure the image is responsive */
}

.overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent black */
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.clinic-image:hover .overlay {
    opacity: 1; /* Show overlay on hover */
}

.appointment-button {
    color: white; /* Text color */
    text-decoration: none;
    padding: 10px 20px;
    background-color: #E11F5E; /* Button color */
    border-radius: 5px;
    transition: all 0.3s ease; /* Smooth transition */
}

.appointment-button:hover {
    color: #E11F5E; /* Change text color to button color on hover */
    background-color: white; /* Change background to white on hover */
}
</style>