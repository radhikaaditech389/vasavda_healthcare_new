<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Book Appointment - Vasavada womens hospital Bopal</title>
    <meta name="author" content="Vasavada Women's Hospital">
    <meta name="description" content="Book Appointment best womens hospital bopal and lady gynecologist bopal">
    <meta name="keywords" content="Book Appointment Womens hospital bopal, Women's hospital bopal, gynecologist bopal, lady gynecologist bopal, womens hospital near by, gynecologist near by, lady gynecologist near by">
    <link rel="canonical" href="https://www.vasavadahospitals.org/why_vasavada/" />
    @include('patient.layout.head')
</head>

<body class="">
    @include('patient.layout.mobile_menu')
    @include('patient.layout.side_menu')
    @include('patient.layout.header', ['footer' => $footer])
    <div class="breadcumb-wrapper " style="margin-top: -30px !important;">
        <div class="parallax" data-parallax-image="{{ asset('patient/img/breadcurmb/bookappointment.jpg') }}"></div>
        <div class="container z-index-common">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title" style="-webkit-text-stroke: 2px black;
    -webkit-text-fill-color: #702840; ">Book Appointment</h1>
                <div class="breadcumb-menu-wrap">
                    <i class="far fa-home-lg"></i>
                    <ul class="breadcumb-menu">
                        <li><a href="/">Home</a></li>
                        <li class="active">Book Appointment</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <style>
        .form-container {
    width: 70%;
    margin: 0 auto; /* Centers the form */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Optional: Adds a shadow effect */
    padding: 20px; /* Optional: Adds spacing around the form */
    background-color: #fff; /* Optional: Sets a background color */
    border-radius: 10px; /* Optional: Adds rounded corners */
}
</style>
    <div class="form-container">
        <div class="testi-form-title">
            <div class="icon-box"><img src="{{ asset('patient/img/testimonial/testi8-1.svg') }}" alt=""></div>
            <div class="content-box">
                <h4 class="title">Book An Appointment</h4>
                <span>Please Call Us To Ensure</span>
            </div>
        </div>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('appointments.store') }}" method="POST" class="form-wrap4">
            @csrf
            <div class="form-box-three">
                <div class="row">
                    <div class="col-lg-6 col-md-6 form-group wow fadeInUp" data-wow-delay="500ms">
                        <input type="text" name="name" class="form-control" placeholder="Name" required>
                        <i class="fa fa-user"></i>
                    </div>
                    <div class="col-lg-6 col-md-6 form-group wow fadeInUp" data-wow-delay="600ms">
                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                        <i class="fa fa-envelope"></i>
                    </div>
                    <div class="col-lg-6 col-md-6 form-group wow fadeInUp" data-wow-delay="600ms">
                        <input type="tel" name="phone" class="form-control" placeholder="Phone No" required>
                        <i class="fa fa-phone"></i>
                    </div>
                    <div class="col-lg-6 col-md-6 form-group wow fadeInUp" data-wow-delay="600ms">
                        <input type="text" name="area" class="form-control" placeholder="Area" required>
                        <i class="fa fa-map-marker"></i>
                    </div>
                    <div class="col-lg-6 col-md-6 form-group wow fadeInUp" data-wow-delay="400ms">
                        <input type="text" name="appointment_date" class="dateTime-pick form-control" placeholder="Appointment Date" required>
                        <i class="fa fa-calendar"></i>
                    </div>
                    <div class="col-lg-12 col-md-6 form-group wow fadeInUp" data-wow-delay="600ms">
                        <textarea name="message" class="form-control" rows="2" placeholder="Enter your message"></textarea>
                        <i class="fa fa-comment"></i>   
                    </div>           
                   
                    <div class="col-xl-6 col-lg-7 col-md-6 col-sm-6 form-group mb-0 wow fadeInUp" data-wow-delay="600ms">
                        <button type="submit" class="btn-style8 v10">Make Appointment</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <style>
        .input-group {
    display: flex;
    align-items: center;
}

.input-group .form-control {
    border-radius: 50px 0 0 50px; /* Rounded corners (left side) */
}

.input-group-text {
    background-color: #f8f9fa; /* Light background */
    border: 1px solid #ddd;
    border-radius: 0 50px 50px 0; /* Rounded corners (right side) */
    padding: 10px 15px;
    color: #6c757d; /* Icon color */
}
</style>


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
