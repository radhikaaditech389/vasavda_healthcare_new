<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>3D & 4D Sonography - Vasavada womens hospital Bopal</title>
    <meta name="author" content="Vasavada Women's Hospital">
    <meta name="description" content="3D & 4D Sonography at top womens hospital bopal and lady gynecologist bopal">
    <meta name="keywords"
        content="Sonography bopal, Womens hospital bopal, Women's hospital bopal, gynecologist bopal, lady gynecologist bopal, womens hospital near by, gynecologist near by, lady gynecologist near by">
    <link rel="canonical" href="https://www.vasavadahospitals.org/3d_4d_sonography/" />
    @include('patient.layout.head')
</head>

<body class="">
    @include('patient.layout.mobile_menu')
    @include('patient.layout.side_menu')
    @include('patient.layout.header', ['footer' => $footer])
    <div class="breadcumb-wrapper " style="margin-top: -30px !important;">
        <div class="parallax" data-parallax-image="{{ asset('patient/img/breadcurmb/3d_4d_breadcrumb.jpg') }}"></div>
        <div class="container z-index-common">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title" style="-webkit-text-stroke: 2px black;
    -webkit-text-fill-color: #702840; ">3D & 4D Sonography</h1>
                <div class="breadcumb-menu-wrap">
                    <i class="far fa-home-lg"></i>
                    <ul class="breadcumb-menu">
                        <li><a href="/">Home</a></li>
                        <li class="active">3D & 4D Sonography</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <section id="doulabirthsection" class="about-section-eight space pt-0 space-md-bottom">
        <div class="container-style8">
            <div class="title-area-four text-center  wow fadeInUp" data-wow-delay="400ms">
                <span class="sub-title8">
                    <h2>{{$sonography_data->title}}</h2>
                </span>
            </div>
            <div class="row">
                <div class="col-lg-7 col-md-12 col-sm-12">
                    <div class="about-img-eight">
                        <img src="{{ asset('patient/img/service/3d-4d.png') }}" alt="">
                        {{-- <div class="exp-box-eight">
                            <div class="icon-box"><img src="{{ asset('patient/img/about/abicon1-1.svg') }}" alt="">
                    </div>
                    <div class="exp-content">
                        <h6 class="title">Inpatient Services</h6>
                        <p>It is a long established fact that a reader will be distracted.</p>
                    </div>
                </div> --}}
            </div>
        </div>
        <div class="col-lg-5 col-md-12 col-sm-12">
            <div class="about-content-eight">
                <p> {!!$sonography_data->description!!}
                </p><br>


                <div class="about-contact-box-eight">
                    <div class="icon-box"><img src="{{ asset('patient/img/about/about8-3.svg') }}" alt=""></div>
                    <div class="content-box">
                        <span>Book Appointment</span>
                        @php
                        $rawPhone = $sonography_data->contact_no ?? '9879009439'; // e.g. from DB
                        $cleanPhone = preg_replace('/\D+/', '', $rawPhone); // remove non-digits

                        // Format to +91 XXXXX YYYYY
                        $formattedPhone = '+91 ' . substr($cleanPhone, 0, 5) . ' ' . substr($cleanPhone, 5, 5);
                        @endphp

                        <h6>
                            <a href="tel:+91{{ $cleanPhone }}">{{ $formattedPhone }}</a>
                        </h6>
                    </div>
                </div>
                {{-- <a href="#" class="btn-style8 v9">Learn More</a> --}}
            </div>
        </div>
        </div>
        </div>
    </section>
    <section class="vs-accordion-wrapper space-top space-md-bottom">
        <div class="container">
            <div class="row">
                @php
                $details = json_decode($sonography_data->sonography_detail);
                @endphp
                @foreach($details as $sonography)
                <div class="col-xl-6 mb-30 mb-xl-0">
                    <div class="about-content">
                        <h2 class="h1">{{ $sonography->title }}</h2>
                        <p class="pe-xl-2 text-title">{{ $sonography->desc }}</p>
                    </div>
                </div>
                @endforeach


                <div class="row mt-40 mb-20">
                    <div class="col-lg-4 mb-30">

                        @if(!empty($sonography_data->sonography_image1))
                        <img src="{{ asset($sonography_data->sonography_image1) }}" alt="Service Image" class="w-100">
                        @endif
                    </div>
                    <div class="col-lg-4 mb-30">
                        @if(!empty($sonography_data->sonography_image2))
                        <img src="{{ asset($sonography_data->sonography_image2) }}" alt="Service Image" class="w-100">
                        @endif
                    </div>
                    <div class="col-lg-4 mb-30">
                        @if(!empty($sonography_data->sonography_image3))
                        <img src="{{ asset($sonography_data->sonography_image3) }}" alt="Service Image" class="w-100">
                        @endif
                    </div>
                </div>

                <section class="vs-accordion-wrapper space" style="background-color: #f9f9f9; padding: 40px 0;">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-12 pb-10 pb-xl-0 mb-50 mb-xl-0">
                                <div class="about-content text-left">
                                    <h2 class="h1 mb-3" style="color: #702840;">Benefits of 3D/4D Sonography</h2>
                                    <!-- Tab Area -->
                                    <ul class="nav about-tab-nav mb-3 mb-xl-4 mt-xl-4 pb-3 pt-4" id="myTab"
                                        role="tablist">
                                        @php
                                        $details = json_decode($sonography_data->benifits);
                                        @endphp

                                        @php
                                        // Group details by title (in Blade, using Collection helper)
                                        $groupedDetails = collect($details)->groupBy('title');
                                        @endphp
                                        <!-- @foreach(collect($details)->unique('title') as $index => $sonography)
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link vs-btn {{ $index == 0 ? 'active' : '' }}"
                                                id="menu{{ $index + 1 }}-tab" data-bs-toggle="tab"
                                                data-bs-target="#menu{{ $index + 1 }}" type="button" role="tab"
                                                aria-controls="menu{{ $index + 1 }}"
                                                aria-selected="{{ $index == 0 ? 'true' : 'false' }}">
                                                {{ $sonography->title }}
                                            </button>
                                        </li>
                                        @endforeach -->
                                        @foreach($groupedDetails as $title => $items)
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link vs-btn {{ $loop->first ? 'active' : '' }}"
                                                id="tab-{{ \Str::slug($title) }}" data-bs-toggle="tab"
                                                data-bs-target="#content-{{ \Str::slug($title) }}" type="button"
                                                role="tab" aria-controls="content-{{ \Str::slug($title) }}"
                                                aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                                                {{ $title }}
                                            </button>
                                        </li>
                                        @endforeach

                                        <!-- <li class="nav-item" role="presentation">
                                            <button class="nav-link vs-btn" id="menu2-tab" data-bs-toggle="tab"
                                                data-bs-target="#menu2" type="button" role="tab" aria-controls="menu2"
                                                aria-selected="false">Emotional Connection</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link vs-btn" id="menu3-tab" data-bs-toggle="tab"
                                                data-bs-target="#menu3" type="button" role="tab" aria-controls="menu3"
                                                aria-selected="false">Improved Diagnostic Accuracy</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link vs-btn" id="menu4-tab" data-bs-toggle="tab"
                                                data-bs-target="#menu4" type="button" role="tab" aria-controls="menu4"
                                                aria-selected="false">Non-Invasive Procedure</button>
                                        </li> -->
                                    </ul>
                                    <div class="tab-content" id="aboutTab">
                                        @foreach($groupedDetails as $title => $items)
                                        <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                                            id="content-{{ \Str::slug($title) }}" role="tabpanel"
                                            aria-labelledby="tab-{{ \Str::slug($title) }}">
                                            <div class="row pt-3">
                                                <div class="col-lg-8">
                                                    @foreach($items as $item)
                                                    <div class="d-flex mb-3 align-items-start">
                                                        <div>
                                                            <h5><i
                                                                    class="bi bi-check-circle-fill text-primary me-2"></i>{{ $item->sub_title }}
                                                            </h5>
                                                            <p>{{ $item->desc }}</p>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>

                                                <div class="col-lg-4">
                                                    @switch($title)
                                                    @case('Enhanced Visualization')                                                   
                                                    <img src="{{ asset('patient/img/service/3d-4d_inhance.jpg') }}"
                                                        alt="Enhanced Visualization" class="img-fluid rounded shadow">
                                                    @break

                                                    @case('Emotional Connection')                                                    
                                                    <img src="{{ asset('patient/img/service/3d_emotional 178X140.jpg') }}"
                                                        alt="Emotional Connection" class="img-fluid rounded shadow">
                                                    @break

                                                    @case('Improved Diagnostic Accuracy')
                                                    <img src="{{ asset('patient/img/service/selection-141-500x500 178X140.jpg') }}"
                                                        alt="Improved Diagnostic Accuracy"
                                                        class="img-fluid rounded shadow">
                                                    @break

                                                    @case('Non-Invasive Procedure')
                                                    <img src="{{ asset('patient/img/service/Non-Invasive Procedure 178X140.jpg') }}"
                                                        alt="Non-Invasive Procedure" class="img-fluid rounded shadow">
                                                    @break

                                                    @default
                                                    <img src="{{ asset('patient/img/service/default.jpg') }}"
                                                        alt="Default" class="img-fluid rounded shadow">
                                                    @endswitch
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


                <section class="features-wrapper  "
                    data-bg-src="{{asset('patient/img/service/gynecologist-performing-ultrasound-consultation.jpg') }}">
                    <div class="container vs-container p-0">
                        <div class="row gx-0">
                            {{-- <div class=" col-xl col-xxl">
                                <div class="features-video-box position-relative vs-surface wow" data-wow-delay="0.3s" data-bg-src="assets/img/about/video-img.jpg">
                                    <a href="https://www.youtube.com/watch?v=_sI_Ps7JSEk" class="play-btn popup-video style2 position-center"><i class="fas fa-play"></i></a>
                                </div>
                            </div> --}}
                            <div class=" col-xl-7 col-xxl-6">
                                <div class="features-inner">
                                    <div class="row justify-content-center justify-content-xl-start">
                                        <div class="col-md-10 col-lg-7 col-xl-9 mb-4">
                                            <div class="features-about text-center text-xl-start">
                                                <h2 class="h1 title-divider" style="color: white; !important">
                                                    Applications of 3D/4D Sonography</h2>
                                                <p p
                                                    style="color: black; !important;background-color: #ffffffa8;padding: 5px 5px 5px 5px;">
                                                    Proactively revolutionize granular customer service after pandemic
                                                    internal or "organic" sources impact proactive human</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-10 col-xl-11 col-xxl-12">
                                            <div class="row justify-content-center justify-content-xl-start">
                                                <div class="col-sm-6 col-xxl-auto mb-30">
                                                    <div class="feaures-mark text-center text-md-start">
                                                        <span class="mark-icon"><i class="far fa-check"></i></span>
                                                        <h3 class="mark-title h5 mb-1 ">Routine Prenatal Care</h3>
                                                        <p class="mark-text fs-xs mb-0">Used as part of routine prenatal
                                                            screenings to monitor fetal development and well-being.</p>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-xxl-auto mb-30">
                                                    <div class="feaures-mark text-center text-md-start">
                                                        <span class="mark-icon"><i class="far fa-check"></i></span>
                                                        <h3 class="mark-title h5 mb-1 ">Detection of Anomalies</h3>
                                                        <p class="mark-text fs-xs mb-0">Helps in identifying physical
                                                            defects or abnormalities in the fetus, such as cleft lip,
                                                            heart defects, or spinal abnormalities.</p>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6 col-xxl-auto mb-30">
                                                    <div class="feaures-mark text-center text-md-start">
                                                        <span class="mark-icon"><i class="far fa-check"></i></span>
                                                        <h3 class="mark-title h5 mb-1 ">Fetal Positioning</h3>
                                                        <p class="mark-text fs-xs mb-0">Provides insight into the baby's
                                                            position and helps in planning for labor and delivery.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="vs-accordion-wrapper space-top space-md-bottom">
                    <div class="container">
                        <div class="row">

                            <div class="about-content">
                                <span class="h3 text-theme sec-subtitle mb-2 mb-md-0"></span>


                                <h2>Conclusion:</h2>
                                <p>
                                    3D and 4D sonography have revolutionized prenatal care by providing clearer images
                                    and real-time visuals
                                    of the developing fetus. These advanced imaging techniques enhance emotional
                                    bonding, improve diagnostic
                                    capabilities, and support expectant parents throughout their pregnancy journey. If
                                    you're looking to
                                    experience the magic of seeing your baby before birth, 3D/4D sonography is an
                                    invaluable option to consider.
                                </p>


                            </div>
                        </div>
                    </div>
                </section>
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