<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Why Vasavada - Vasavada womens hospital Bopal</title>
    <meta name="author" content="Vasavada Women's Hospital">
    <meta name="description" content="Why Vasavada best womens hospital bopal and lady gynecologist bopal">
    <meta name="keywords"
        content="Vasavada Womens hospital bopal, Women's hospital bopal, gynecologist bopal, lady gynecologist bopal, womens hospital near by, gynecologist near by, lady gynecologist near by">
    <link rel="canonical" href="https://www.vasavadahospitals.org/why_vasavada/" />
    @include('patient.layout.head')
</head>

<body class="">
    @include('patient.layout.mobile_menu')
    @include('patient.layout.side_menu')
    @include('patient.layout.header', ['footer' => $footer])
    <div class="breadcumb-wrapper " style="margin-top: -30px !important;">
        <div class="parallax" data-parallax-image="{{ asset('patient/img/breadcurmb/whyvasavada.jpg') }}"></div>
        <div class="container z-index-common">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title"
                    style="-webkit-text-stroke: 2px black;
    -webkit-text-fill-color: #702840; ">Why Vasavada</h1>
                <div class="breadcumb-menu-wrap">
                    <i class="far fa-home-lg"></i>
                    <ul class="breadcumb-menu">
                        <li><a href="/">Home</a></li>
                        <li class="active">Why Vasavada</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <!-- why-choose-section -->
    <section class="why-choose-section7 space-top" data-bg-src="{{ asset('patient/img/bg/why-choose1-1.jpg') }}"
        style="margin-top: 70px;">
        <div class="container-style7">
            <style>
                .space-top {
                    padding-top: 85px;
                }

                .why-choose-section7 {
                    position: relative;
                    padding-bottom: 118px;
                }
            </style>

            <div class="row">
                @php
                    $why_vasavada = $sections->where('name', 'why_vasavada')->first();
                @endphp
                @if ($why_vasavada)
                    <div class="col-lg-6 col-md-12 col-sm-12 wow fadeInUp" data-wow-delay="400ms">
                        <div class="choose-content7">
                            <div class="title-area-three choose">
                                <h2>{{ $why_vasavada->title }}</h2>
                            </div><br>

                            {{-- Loop through section items --}}
                            @foreach ($why_vasavada->items as $item)
                                <div class="choose-block">
                                    <div class="icon-box">
                                        <img src="{{ asset($item->icon) }}" alt="" style="height:21px;">
                                    </div>
                                    <div class="content-box">
                                        <h4 class="title">{!! $item->title !!}</h4>
                                    </div>
                                </div><br>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12 col-sm-12 wow fadeInUp" data-wow-delay="500ms">
                        <div class="choose-img">
                            <img src="{{ asset($why_vasavada->image) }}" alt="">
                        </div>
                    </div>
                @endif
            </div>

            {{-- Vision & Mission --}}
            <div class="row" style="margin-top: 30px;">
                @php
                    $vision = $sections->where('name', 'vision_mission')->first();
                @endphp
                @if ($vision)
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 wow fadeInUp" data-wow-delay="400ms">
                            <div class="choose-content7">
                                <div class="title-area-three choose">
                                    <h2>{{ $vision->title }}</h2>
                                </div>
                                @if ($vision->subtitle)
                                    <h4>{{ $vision->subtitle }}</h4>
                                @endif
                                @if ($vision->description)
                                    {!! $vision->description !!}
                                @endif
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            {{-- Why Choose Us --}}
            <div class="row" style="margin-top: 30px;">
                @php
                    $why_choose = $sections->where('name', 'why_choose_us_for_big_day')->first();
                @endphp
                @if ($why_choose)
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 wow fadeInUp" data-wow-delay="400ms">
                            <div class="choose-content7">
                                <div class="title-area-three choose">
                                    <h2>{{ $why_choose->title }}</h2>
                                </div>

                                @foreach ($why_choose->items as $item)
                                    <div class="choose-block">
                                        <div class="icon-box">
                                            <img src="{{ asset($item->icon) }}" alt="" style="height:21px;">
                                        </div>
                                        <div class="content-box">
                                            <h4 class="title">{!! $item->title !!}</h4>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                @endif
            </div>

            {{-- Advantages --}}
            <div class="row" style="margin-top: 40px;">
                @php
                    $why_vasavada = $sections->where('name', 'advantages')->first();
                @endphp
                @if ($why_vasavada)
                    <div class="col-lg-6 col-md-12 col-sm-12 wow fadeInUp" data-wow-delay="400ms">
                        <div class="choose-content7">
                            <div class="title-area-three choose">
                                <h2>{{ $why_vasavada->title }}</h2>
                            </div><br>

                            {{-- Loop through section items --}}
                            @foreach ($why_vasavada->items as $item)
                                <div class="choose-block">
                                    <div class="icon-box">
                                        <img src="{{ asset($item->icon) }}" alt="" style="height:21px;">
                                    </div>
                                    <div class="content-box">
                                        <h4 class="title">{!! $item->title !!}</h4>
                                    </div>
                                </div><br>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12 col-sm-12 wow fadeInUp" data-wow-delay="500ms"
                        style="margin-top: 30px;">
                        <div class="choose-img">
                            <img src="{{ asset($why_vasavada->image) }}" alt="">
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
    <!-- End why-choose-section -->

    @include('patient.layout.footer')

    <a href="#" class="scrollToTop scroll-bottom  style2"><i class="fas fa-arrow-alt-up"></i></a>

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

</body>

</html>
