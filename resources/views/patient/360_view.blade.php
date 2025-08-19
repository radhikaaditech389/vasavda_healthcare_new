<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>360° Virtual Tour - Vasavada womens hospital Bopal</title>
    <meta name="author" content="Vasavada Women's Hospital">
    <meta name="description" content="W360° Virtual Tour Vasavada is top womens hospital bopal and gynecologist bopal">
    <meta name="keywords" content="Womens hospital bopal, Women's hospital bopal, gynecologist bopal, lady gynecologist bopal, womens hospital near by, gynecologist near by, lady gynecologist near by">
    <link rel="canonical" href="https://www.vasavadahospitals.org/360_view" />
    @include('patient.layout.head')
</head>

<body class="">
    @include('patient.layout.mobile_menu')
    @include('patient.layout.side_menu')
    @include('patient.layout.header', ['footer' => $footer])

    {{-- <div class="breadcumb-wrapper" style="margin-top: -30px !important;">
        <div class="parallax" data-parallax-image="{{ asset('patient/img/breadcurmb/about_us.jpg') }}"></div>
        <div class="container z-index-common">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title" style="-webkit-text-stroke: 2px black;
    -webkit-text-fill-color: #702840;">360° Virtual Tour</h1>
                <div class="breadcumb-menu-wrap">
                    <i class="far fa-home-lg"></i>
                    <ul class="breadcumb-menu">
                        <li><a href="/">Home</a></li>
                        <li class="active">360° Virtual Tour</li>
                    </ul>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="space-view-container">
        <div class="section-title">
            <center>
            <h2>Explore Our Hospital Space</h2>
            <p>Take a virtual tour of our state-of-the-art facilities</p>
            </center>
        </div>

        <div class="tour-container">
            <iframe src="https://app.cloudpano.com/tours/x0R1CKcU6"
                    allowfullscreen>
            </iframe>
        </div>
    </div>

    @include('patient.layout.footer')

    <a href="#" class="scrollToTop scroll-bottom style2"><i class="fas fa-arrow-alt-up"></i></a>

    <!-- Jquery -->
    <script src="{{ asset('patient/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <!-- Slick Slider -->
    <script src="{{ asset('patient/js/slick.min.js') }}"></script>
    <script src="{{ asset('patient/js/slick-animation.min.js') }}"></script>
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

    <script>
    window.addEventListener('beforeunload', function() {
        const iframe = document.querySelector('iframe');
        if (iframe) {
            iframe.src = iframe.src;
        }
    });
    </script>

    <style>
        .space-view-container {
            padding: 50px 0;
            background: #f8f9fa;
        }

        .tour-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 20px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            height: calc(100vh - 140px);
        }

        .tour-container iframe {
            width: 100%;
            height: 100%;
            border: none;
        }

        @media (max-width: 768px) {
            .tour-container {
                padding: 10px;
                height: calc(100vh - 120px);
            }
        }
    </style>
</body>
</html>