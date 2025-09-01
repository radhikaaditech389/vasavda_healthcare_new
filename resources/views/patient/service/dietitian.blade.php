<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Dietitian - Vasavada womens hospital Bopal</title>
    <meta name="author" content="Vasavada Women's Hospital">
    <meta name="description" content="Dietitian at top womens hospital bopal and lady gynecologist bopal">
    <meta name="keywords"
        content="Dietitian bopal, Womens hospital bopal, Women's hospital bopal, gynecologist bopal, lady gynecologist bopal, womens hospital near by, gynecologist near by, lady gynecologist near by">
    <link rel="canonical" href="https://www.vasavadahospitals.org/cosmetic_gynecology" />
    @include('patient.layout.head')

    <style>
        .text-pink,
        .text-pink * {
            color: #e91e63 !important;
            font-size: 20px !important;
        }

        .service-tabs {
            height: 500px;
        }
    </style>
</head>

<body class="">
    @include('patient.layout.mobile_menu')
    @include('patient.layout.side_menu')
    @include('patient.layout.header', ['footer' => $footer])

    <div class="breadcumb-wrapper " style="margin-top: -30px !important;">
        <div class="parallax" data-parallax-image="{{ $settings->banner_image }}"></div>
        <div class="container z-index-common">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title"
                    style="-webkit-text-stroke: 2px black;
                            -webkit-text-fill-color: #702840; ">
                    {{ $settings->page_title }}</h1>
                <div class="breadcumb-menu-wrap">
                    <i class="far fa-home-lg"></i>
                    <ul class="breadcumb-menu">
                        <li><a href="/">Home</a></li>
                        <li class="active">{{ $settings->page_title }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <section class="main-section space" data-bg-src="{{ asset('patient/img/bg/ser-bg9-1.jpg') }}">
        <div class="service-section-nine">
            <div class="container-style8">
                <div class="title-area-four text-center wow fadeInUp" data-wow-delay="400ms">
                    <h2>{{ $settings->page_title }}</h2>
                </div>
                <div class="row">
                    <div class="col-lg-5 col-md-12 col-sm-12">
                        <div class="service-tabs">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                @foreach ($facilities as $key => $service)
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link {{ $key == 0 ? 'active' : '' }}"
                                            id="{{ $service->slug }}-tab" data-bs-toggle="tab"
                                            data-bs-target="#{{ $service->slug }}" type="button" role="tab"
                                            aria-controls="{{ $service->slug }}"
                                            aria-selected="{{ $key == 0 ? 'true' : 'false' }}">
                                            <i class="fa fa-plus"></i>{{ $service->title }}
                                        </button>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-7 col-md-12 col-sm-12">
                        <div class="tab-content" id="myTabContent">
                            @foreach ($facilities as $key => $service)
                                <div class="tab-pane fade {{ $key == 0 ? 'show active' : '' }}"
                                    id="{{ $service->slug }}" role="tabpanel"
                                    aria-labelledby="{{ $service->slug }}-tab">
                                    <div class="service-tab-content">
                                        <h4 class="title">{{ $service->title }}</h4>
                                        {{-- <p class="text-pink">{!! preg_replace('/^<p>|<\/p>$/', '', $service->purpose_html) !!}</p> --}}
                                        <p class="text-pink">
                                            {!! preg_replace('/(<[^>]+) style=".*?"/i', '$1', $service->purpose_html) !!}
                                        </p>
                                        <a href="#{{ $service->slug }}-section" class="ser-btn-nine">Learn More</a>
                                        <div class="ser-img-nine">
                                            <img src="{{ $service->image }}" alt="">
                                            <div class="icon-box">
                                                <img src="{{ asset('patient/img/service/ser9-2.svg') }}" class="image"
                                                    alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @foreach ($facilities as $service)
        <section id="{{ $service->slug }}-section" class="vs-accordion-wrapper space-top space-md-bottom">
            <div class="container">
                <div class="title-area-four text-center wow fadeInUp" data-wow-delay="400ms">
                    <span class="sub-title8">
                        <h2>{{ $service->title }}</h2>
                    </span>
                </div>
                <div class="row">
                    <div class="col-xl-6">
                        <div class="vs-accordion accordion accordion-style2" id="vsaccordion-left-{{ $service->id }}">
                            <div class="accordion-item">
                                <h2 class="accordion-header">Purpose</h2>
                                <p>{!! $service->purpose_html !!}</p>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">Considerations</h2>
                                <p>{!! $service->considerations_html !!}</p>
                            </div>
                        </div>
                        <br>
                        <img src="{{ asset($service->image) }}" alt="Service Image"
                            style="width: 550px; height: 500px;">
                    </div>
                    <div class="col-xl-6">
                        <div class="vs-accordion accordion accordion-style2"
                            id="vsaccordion-right-{{ $service->id }}">
                            <div class="accordion-item">
                                <h2 class="accordion-header">Benefits</h2>
                                <p>{!! $service->benefits_html !!}</p>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">Key Areas of Focus</h2>
                                <p>{!! $service->services_html !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endforeach

    <section class="vs-accordion-wrapper space-top space-md-bottom">
        <div class="container">
            <div class="row">
                <div class="about-content">
                    <span class="h3 text-theme sec-subtitle mb-2 mb-md-0"></span>
                    <h2>Conclusion:</h2>
                    <p>{!! $settings->conclusion_html !!}</p>
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
