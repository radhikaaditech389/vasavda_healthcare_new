<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>FAQ - Vasavada womens hospital Bopal</title>
    <meta name="author" content="Vasavada Women's Hospital">
    <meta name="description" content="FAQ to visit best womens hospital bopal and lady gynecologist bopal">
    <meta name="keywords"
        content="FAQ, Womens hospital bopal, Women's hospital bopal, gynecologist bopal, lady gynecologist bopal, womens hospital near by, gynecologist near by, lady gynecologist near by">
    <link rel="canonical" href="https://www.vasavadahospitals.org/faq" />
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
                <h1 class="breadcumb-title"
                    style="-webkit-text-stroke: 2px black;
    -webkit-text-fill-color: #702840; ">FAQ</h1>
                <div class="breadcumb-menu-wrap">
                    <i class="far fa-home-lg"></i>
                    <ul class="breadcumb-menu">
                        <li><a href="/">Home</a></li>
                        <li class="active">FAQ</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="space">
        <div class="container">
            <div class="title-area text-center">
                <span class="sub-title">Questions & Answers</span>
                <h2 class="sec-title">Frequently Asked Questions</h2>
            </div>
            <br />

            <div class="row">
                <!-- Left Column -->
                <div class="col-lg-6">
                    <div class="accordion-style1">
                        <div class="accordion" id="faqAccordionLeft">
                            @foreach ($faqs->slice(0, ceil($faqs->count() / 2)) as $faq)
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#faq{{ $faq->id }}"
                                            aria-expanded="false">
                                            {{ $faq->question }}
                                        </button>
                                    </h2>
                                    <div id="faq{{ $faq->id }}" class="accordion-collapse collapse"
                                        data-bs-parent="#faqAccordionLeft">
                                        <div class="accordion-body">
                                            <p>{!! $faq->answer !!}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="col-lg-6">
                    <div class="accordion-style1">
                        <div class="accordion" id="faqAccordionRight">
                            @foreach ($faqs->slice(ceil($faqs->count() / 2)) as $faq)
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#faq{{ $faq->id }}"
                                            aria-expanded="false">
                                            {{ $faq->question }}
                                        </button>
                                    </h2>
                                    <div id="faq{{ $faq->id }}" class="accordion-collapse collapse"
                                        data-bs-parent="#faqAccordionRight">
                                        <div class="accordion-body">
                                            <p>{!! $faq->answer !!}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .accordion-style1 .accordion-button {
            padding: 20px;
            background: #fff;
            border: none;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px !important;
            margin-bottom: 15px;
            transition: all 0.3s ease;
        }

        .accordion-style1 .accordion-button:not(.collapsed) {
            background-color: #702840;
            color: white;
        }

        .accordion-style1 .accordion-button.collapsed:hover {
            background-color: #f8f9fa;
        }

        .accordion-item {
            margin-bottom: 20px;
        }

        .accordion-body {
            padding: 20px;
            background: #f8f9fa;
            border-radius: 0 0 10px 10px;
        }

        .faq-img {
            position: relative;
            padding: 20px;
        }

        .faq-img .exp-box {
            position: absolute;
            bottom: 40px;
            right: 40px;
            background: #702840;
            color: white;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
        }

        .exp-box .number {
            font-size: 36px;
            margin: 0;
        }

        @media (max-width: 991px) {
            .col-lg-6 {
                margin-bottom: 20px;
            }
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
