<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Contact - Vasavada womens hospital Bopal</title>
    <meta name="author" content="Vasavada Women's Hospital">
    <meta name="description" content="Contact best womens hospital bopal and lady gynecologist bopal">
    <meta name="keywords"
        content="Contact Womens hospital bopal, Women's hospital bopal, gynecologist bopal, lady gynecologist bopal, womens hospital near by, gynecologist near by, lady gynecologist near by">
    <link rel="canonical" href="https://www.vasavadahospitals.org/contact" />
    @include('patient.layout.head')

    <style>
        .footer-address .addr p,
        .footer-address .addr div {
            display: inline;
            margin: 0;
        }
    </style>
</head>


<body class="">

    <!--==============================
    Mobile Menu
  ============================== -->
    @include('patient.layout.mobile_menu')

    <!--==============================
    Sidemenu
============================== -->
    @include('patient.layout.side_menu')

    <!--==============================
    Popup Search Box
    ============================== -->
    <div class="popup-search-box d-none d-lg-block">
        <button class="searchClose border-theme text-theme"><i class="fal fa-times"></i></button>
        <form action="#">
            <input type="text" class="border-theme" placeholder="What are you looking for">
            <button type="submit"><i class="fal fa-search"></i></button>
        </form>
    </div>
    <!--==============================
        Header Area
    ==============================-->
    @include('patient.layout.header', ['footer' => $footer])

    <!--==============================
    Breadcumb
============================== -->
    <div class="breadcumb-wrapper ">
        <div class="parallax" data-parallax-image="{{ asset('patient/img/breadcurmb/contact.jpg') }}"></div>
        <div class="container z-index-common">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title" style="color:#702840 !important;">Contact Us</h1>
                <div class="breadcumb-menu-wrap">
                    <i class="far fa-home-lg"></i>
                    <ul class="breadcumb-menu">
                        <li><a href="/">Home</a></li>
                        <li class="active" style="color:#04aeca !important;">Contact Us</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--==============================
      Contact Form Area
    ==============================-->
    <section class="vs-contact-wrapper vs-contact-layout1 space-top space-md-bottom">
        <div class="container">
            <div class="row gx-60 align-items-center">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">

                    <form action="{{ route('contact.store') }}" method="POST" class="ajax-contact form-wrap3 mb-30"
                        data-bg-color="#f3f6f7">
                        @csrf

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                                {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}
                            </div>
                        @endif
                        <div class="form-title">
                            <h3 class="mt-n2 fls-n2 mb-0">Send Us a Message</h3>
                            <p class="text-theme mb-4" style="color:#000 !important;">Your email address will not be
                                published *</p>
                        </div>
                        <div class="form-group mb-15">
                            <input type="text" class="form-control style3" name="name" id="name"
                                placeholder="Name">
                            <i class="fal fa-user"></i>
                        </div>
                        <div class="form-group mb-15">
                            <input type="text" class="form-control style3" name="email" id="email"
                                placeholder="E-mail">
                            <i class="fal fa-envelope"></i>
                        </div>
                        <div class="form-group mb-15">
                            <input type="phone" name="phone" id="phone" class="form-control style3"
                                placeholder="Phone"></input>
                            <i class="fal fa-phone-alt"></i>
                        </div>
                        <div class="form-group mb-15">
                            <textarea name="message" id="message" cols="30" rows="3" class="form-control style3" placeholder="Message"></textarea>
                            <i class="fal fa-pencil-alt"></i>
                        </div>
                        <div class="form-btn pt-15">
                            <button class="vs-btn style2">Send Message<i class="fas fa-chevron-right"></i></button>
                        </div>
                        <p class="form-messages mb-0 mt-3"></p>
                    </form>
                </div>
                <div class="col-lg-6">
                    <div class="contact-information mb-30">
                        <h3 class="mt-n2">We're Here to Support You. Schedule a Visit Today!</h3>
                        <div class="row">
                            <div class="col-xxl-10">
                                <p>At Vasavada Healthcare, we are dedicated to providing compassionate, personalized
                                    care for women at every stage of life. Whether you need a routine checkup,
                                    specialized treatment, or advice, our expert team is here to guide you every step of
                                    the way.
                                </p>
                            </div>
                        </div>
                        <h5 class="h5 pt-2 mb-10">Opening Hours</h5>
                        <table class="contact-info-table">
                            <tr>
                                {{-- <td>Monday- Saturday:</td>
                                <td>09:00 AM - 09:00 PM</td> --}}
                                <td>{{ $footer->days }}:</td>
                                <td>{{ $footer->hospital_time }}</td>
                            </tr>

                            <tr>
                                <td>Sunday:</td>
                                <td>Closed</td>
                            </tr>
                            <tr>
                                <td>Special Consulting:</td>
                                <td>{{ $footer->special_time }}</td>
                            </tr>
                        </table>
                        <h5 class="pt-2 mb-10">Address</h5>
                        <div class="fs-md d-flex align-items-start footer-address">
                            <i class="far fa-map-marker-alt me-2" style="color:black; margin-top:6px;"></i>
                            <div class="addr" style="color:black;">{!! $footer->address !!}</div>
                        </div>

                        {{-- <p class="fs-md"><i class="far fa-map-marker-alt me-2"></i>A-308, Maple Trade Centre, Surdhara Cir, nr. Sal Hospital Road, Thaltej, Ahmedabad, Gujarat 380052.</p> --}}

                        <h5 class="pt-2 mb-2" style="margin-top:10px;">Get In Touch</h5>
                        <h5 class="h5 font-theme2 mb-0"><a href="tel:+91 {{ $footer->phone_no }}"><i
                                    class="far fa-phone-alt me-2"></i>+91 {{ $footer->phone_no }}</a></h5>
                    </div>
                </div>
            </div>
            <div class="ratio ratio-21x9 contact-map mt-70 mb-30">
                {{-- <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3671.997573790188!2d72.46589959678953!3d23.0238613!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e9ba2222d106b%3A0x3e2bf5885a0a5fe0!2sVasavada%20Womens%20hospital!5e0!3m2!1sen!2sin!4v1733126859163!5m2!1sen!2sin"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe> --}}

                <iframe src="https://www.google.com/maps?q={{ $footer->map_address }}&output=embed" width="600"
                    height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </section>
    <!--==============================
   Footer Area
 ==============================-->
    @include('patient.layout.footer')


    <!--********************************
   Code End  Here
 ******************************** -->


    <!-- Scroll To Top -->
    <a href="#" class="scrollToTop scroll-bottom  style2"><i class="fas fa-arrow-alt-up"></i></a>



    <!--==============================
        All Js File
    ============================== -->
    <!-- Jquery -->
    <!-- Jquery -->
    <script src="{{ asset('patient/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <!-- Slick Slider -->
    <script src="{{ asset('patient/js/slick.min.js') }}"></script>
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
