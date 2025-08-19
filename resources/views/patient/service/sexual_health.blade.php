<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Sexual Health - Vasavada womens hospital Bopal</title>
    <meta name="author" content="Vasavada Women's Hospital">
    <meta name="description" content="Sexual Health at top womens hospital bopal and lady gynecologist bopal">
    <meta name="keywords" content="Sexual Health bopal, Womens hospital bopal, Women's hospital bopal, gynecologist bopal, lady gynecologist bopal, womens hospital near by, gynecologist near by, lady gynecologist near by">
    <link rel="canonical" href="https://www.vasavadahospitals.org/sexual_health" />
    @include('patient.layout.head')
    </head>

<body class="">
    @include('patient.layout.mobile_menu')
    @include('patient.layout.side_menu')
    @include('patient.layout.header', ['footer' => $footer])
    <div class="breadcumb-wrapper " style="margin-top: -30px !important;">
        <div class="parallax" data-parallax-image="{{ asset('patient/img/breadcurmb/sexual-health_breadcrumb.jpg') }}"></div>
        <div class="container z-index-common">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title" style="-webkit-text-stroke: 2px black;
    -webkit-text-fill-color: #702840; ">Sexual Health</h1>
                <div class="breadcumb-menu-wrap">
                    <i class="far fa-home-lg"></i>
                    <ul class="breadcumb-menu">
                        <li><a href="/">Home</a></li>
                        <li class="active">Sexual Health</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <section class="main-section space" data-bg-src="{{ asset('patient/img/bg/ser-bg9-1.jpg') }}">
        <!-- service-section-nine -->
        <div class="service-section-nine">
            <div class="container-style8">
                <div class="title-area-four text-center  wow fadeInUp" data-wow-delay="400ms">
                    <span class="sub-title8">Medical Services</span>
                    <h2>Sexual Health</h2>
                </div>
                <div class="row">
                    <div class="col-lg-5 col-md-12 col-sm-12">
                        <div class="service-tabs">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="vaginismus-tab" data-bs-toggle="tab" data-bs-target="#vaginismus" type="button" role="tab" aria-controls="vaginismus" aria-selected="true"><i class="fa fa-plus"></i>Vaginismus (Painful Sex)</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                <button class="nav-link" id="dilatation-tab" data-bs-toggle="tab" data-bs-target="#dilatation" type="button" role="tab" aria-controls="dilatation" aria-selected="false"><i class="fa fa-plus"></i>Dilatation</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                <button class="nav-link" id="sexualhealth-tab" data-bs-toggle="tab" data-bs-target="#sexualhealth" type="button" role="tab" aria-controls="sexualhealth" aria-selected="false"><i class="fa fa-plus"></i>Sexual Health Counseling</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="botox-tab" data-bs-toggle="tab" data-bs-target="#botox" type="button" role="tab" aria-controls="botox" aria-selected="false"><i class="fa fa-plus"></i>Botox Surgery for Vaginal Conditions</button>
                                </li>


                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-12 col-sm-12">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="vaginismus" role="tabpanel" aria-labelledby="vaginismus-tab">
                                <div class="service-tab-content">
                                    <h4 class="title">Vaginismus (Painful Sex)</h4>
                                    <p>  Vaginismus is an involuntary spasm of the vaginal muscles, making penetration painful or impossible. It’s often related to psychological factors, past trauma, or physical conditions.</p>

                                    <a href="#vaginismus-section" class="ser-btn-nine">Learn More</a>
                                    <div class="ser-img-nine">
                                        <img src="{{ asset('patient/img/service/painful_sex_960X792.jpg') }}" alt="">
                                        <div class="icon-box"><img src="{{ asset('patient/img/service/ser9-2.svg') }}" class="image" alt=""></div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="dilatation" role="tabpanel" aria-labelledby="dilatation-tab">
                                <div class="service-tab-content">
                                    <h4 class="title">Dilatation</h4>
                                    <p>Dilatation is a common treatment approach for vaginismus and other conditions that cause vaginal tightness. It involves gradually increasing the size of inserted dilators to reduce muscle tension and build tolerance.</p>

                                    <a href="#dilatation-section" class="ser-btn-nine">Learn More</a>
                                    <div class="ser-img-nine">
                                        <img src="{{ asset('patient/img/service/dilatation_960X792.jpg') }}" alt="">
                                        <div class="icon-box"><img src="{{ asset('patient/img/service/ser9-2.svg') }}" class="image" alt=""></div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="sexualhealth" role="tabpanel" aria-labelledby="sexualhealth-tab">
                                <div class="service-tab-content">
                                    <h4 class="title">Sexual Health Counseling</h4>
                                    <p> Sexual health counseling provides support for individuals or couples facing sexual health challenges. It addresses issues such as intimacy, relationship dynamics, and psychological factors that may impact sexual health. </p>

                                    <a href="#sexualhealth-section" class="ser-btn-nine">Learn More</a>
                                    <div class="ser-img-nine">
                                        <img src="{{ asset('patient/img/service/sexual_health_counseling_960X792.jpg' )}}" alt="">
                                        <div class="icon-box"><img src="{{ asset('patient/img/service/ser9-2.svg') }}" class="image" alt=""></div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="botox" role="tabpanel" aria-labelledby="botox-tab">
                                <div class="service-tab-content">
                                    <h4 class="title">Botox Surgery for Vaginal Conditions</h4>
                                    <p>Botox injections can be used to relax the pelvic floor muscles in cases of severe vaginismus or other muscular issues, allowing for pain-free intercourse or vaginal exams.</p>

                                    <a href="#botox-section" class="ser-btn-nine">Learn More</a>
                                    <div class="ser-img-nine">
                                        <img src="{{ asset('patient/img/service/botox_surgery_960X792.jpg') }}" alt="">
                                        <div class="icon-box"><img src="{{ asset('patient/img/service/ser9-2.svg') }}" class="image" alt=""></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br><br><br><br>

    {{-- Vaginismus (Painful Sex) section start --}}

    <section class="vs-accordion-wrapper space-top space-md-bottom" id="vaginismus-section">
        <div class="container">
            <div class="title-area-four text-center  wow fadeInUp" data-wow-delay="400ms">
                <span class="sub-title8"><h2>Vaginismus (Painful Sex)</h2></span>
            </div>
            <div class="row">
                <div class="col-xl-6 mb-30 mb-xl-0">
                    <div class="about-content">
                        <span class="h3 text-theme sec-subtitle mb-2 mb-md-0"></span>
                        <h3>Overview</h3>
                        <p class="pe-xl-2 text-title">Vaginismus is an involuntary spasm of the vaginal muscles, making penetration painful or impossible. It’s often related to psychological factors, past trauma, or physical conditions.
                        </p>

                    </div>

                    <div class="about-content">
                        <span class="h3 text-theme sec-subtitle mb-2 mb-md-0"></span>
                        <h3>Symptoms</h3>
                        <p class="pe-xl-2 text-title">Pain during intercourse, insertion of tampons, or even gynecological exams due to muscle tightness.
                        </p>

                    </div>
                </div>

                <div class="col-xl-6 mb-30 mb-xl-0">
                    <div class="about-content">
                        <span class="h3 text-theme sec-subtitle mb-2 mb-md-0"></span>
                        <h3>Treatment </h3>
                        <p class="pe-xl-2 text-title">Therapy often includes gradual desensitization exercises, pelvic floor physical therapy, counseling, and always medication to reduce pain.
                        </p>

                    </div>

                    <div class="about-content">
                        <span class="h3 text-theme sec-subtitle mb-2 mb-md-0"></span>
                        <h3>Benefits</h3>
                        <p class="pe-xl-2 text-title">Treatment for vaginismus can significantly improve a woman’s comfort, confidence, and ability to engage in sexual intimacy without pain.
                        </p>

                    </div>


                </div>

            </div>

            <div class="row mt-40 mb-20">
                <div class="col-lg-4 mb-30">
                    <img src="{{ asset('patient/img/service/vaginismus1_1200X800.jpg') }}" alt="Service Image" class="w-100">
                </div>
                <div class="col-lg-4 mb-30">
                    <img src="{{ asset('patient/img/service/vaginismus3_1200X800.jpg') }}" alt="Service Image" class="w-100">
                </div>
                <div class="col-lg-4 mb-30">
                    <img src="{{ asset('patient/img/service/vaginismus2_1200X800.jpg') }}" alt="Service Image" class="w-100">
                </div>
            </div>
        </div>
    </section>
    {{-- Vaginismus (Painful Sex) Section ends --}}

    {{-- Dilatation section start --}}

    <section class="vs-accordion-wrapper space-top space-md-bottom" id="dilatation-section">
        <div class="container">
            <div class="title-area-four text-center  wow fadeInUp" data-wow-delay="400ms">
                <span class="sub-title8"><h2>Dilatation</h2></span>
            </div>
            <div class="row">
                <div class="col-xl-6 mb-30 mb-xl-0">
                    <div class="about-content">
                        <span class="h3 text-theme sec-subtitle mb-2 mb-md-0"></span>
                        <h3>Overview</h3>
                        <p class="pe-xl-2 text-title">Dilatation is a common treatment approach for vaginismus and other conditions that cause vaginal tightness. It involves gradually increasing the size of inserted dilators to reduce muscle tension and build tolerance.
                        </p>

                    </div>

                    <div class="about-content">
                        <span class="h3 text-theme sec-subtitle mb-2 mb-md-0"></span>
                        <h3>Procedure</h3>
                        <p class="pe-xl-2 text-title">Patients may use a series of dilators in increasing sizes, always under the guidance of a pelvic floor therapist or healthcare provider.
                        </p>

                    </div>
                </div>

                <div class="col-xl-6 mb-30 mb-xl-0">


                    <div class="about-content">
                        <span class="h3 text-theme sec-subtitle mb-2 mb-md-0"></span>
                        <h3>Benefits</h3>
                        <p class="pe-xl-2 text-title"> Helps improve comfort during intercourse, reduce anxiety, and increase vaginal flexibility, benefiting women’s sexual and overall reproductive health.
                        </p>

                    </div>


                </div>

            </div>

            <div class="row mt-40 mb-20">
                <div class="col-lg-4 mb-30">
                    <img src="{{ asset('patient/img/service/dilatation2_1200X800.jpg') }}" alt="Service Image" class="w-100">
                </div>
                <div class="col-lg-4 mb-30">
                    <img src="{{ asset('patient/img/service/dilatation1_1200X800.jpg') }}" alt="Service Image" class="w-100">
                </div>
                <div class="col-lg-4 mb-30">
                    <img src="{{ asset('patient/img/service/dilatation3_1200X800.jpg') }}" alt="Service Image" class="w-100">
                </div>
            </div>
        </div>
    </section>
    {{-- Dilatation Section ends --}}

    {{-- Sexual Health Counseling section start --}}

    <section class="vs-accordion-wrapper space-top space-md-bottom" id="sexualhealth-section">
        <div class="container">
            <div class="title-area-four text-center  wow fadeInUp" data-wow-delay="400ms">
                <span class="sub-title8"><h2>Sexual Health Counseling</h2></span>
            </div>
            <div class="row">
                <div class="col-xl-6 mb-30 mb-xl-0">
                    <div class="about-content">
                        <span class="h3 text-theme sec-subtitle mb-2 mb-md-0"></span>
                        <h3>Overview</h3>
                        <p class="pe-xl-2 text-title">Sexual health counseling provides support for individuals or couples facing sexual health challenges. It addresses issues such as intimacy, relationship dynamics, and psychological factors that may impact sexual health.
                        </p>

                    </div>

                    <div class="about-content">
                        <span class="h3 text-theme sec-subtitle mb-2 mb-md-0"></span>
                        <h3>Focus Areas</h3>
                        <p class="pe-xl-2 text-title">Counseling can address challenges like libido, emotional concerns, relationship dynamics, past trauma, and body image.
                        </p>
                    </div>
                </div>

                <div class="col-xl-6 mb-30 mb-xl-0">
                    <div class="about-content">
                        <span class="h3 text-theme sec-subtitle mb-2 mb-md-0"></span>
                        <h3>Benefits</h3>
                        <p class="pe-xl-2 text-title"> Counseling promotes a healthy, open approach to sexual well-being, helping individuals and couples to address concerns and improve satisfaction and intimacy.
                        </p>
                    </div>
                </div>
            </div>

            <div class="row mt-40 mb-20">
                <div class="col-lg-4 mb-30">
                    <img src="{{ asset('patient/img/service/sexual_health_counseling1_1200X800.jpg') }}" alt="Service Image" class="w-100">
                </div>
                <div class="col-lg-4 mb-30">
                    <img src="{{ asset('patient/img/service/sexual_health_counseling3_1200X800.jpg') }}" alt="Service Image" class="w-100">
                </div>
                <div class="col-lg-4 mb-30">
                    <img src="{{ asset('patient/img/service/sexual_health_counseling2_1200X800.jpg') }}" alt="Service Image" class="w-100">
                </div>
            </div>
        </div>
    </section>
    {{-- Sexual Health Counseling Section ends --}}

    {{--Botox Surgery for Vaginal Conditions section start --}}

    <section class="vs-accordion-wrapper space-top space-md-bottom" id="botox-section">
        <div class="container">
            <div class="title-area-four text-center  wow fadeInUp" data-wow-delay="400ms">
                <span class="sub-title8"><h2>Botox Surgery for Vaginal Conditions</h2></span>
            </div>
            <div class="row">
                <div class="col-xl-6 mb-30 mb-xl-0">
                    <div class="about-content">
                        <span class="h3 text-theme sec-subtitle mb-2 mb-md-0"></span>
                        <h3>Overview</h3>
                        <p class="pe-xl-2 text-title">Botox injections can be used to relax the pelvic floor muscles in cases of severe vaginismus or other muscular issues, allowing for pain-free intercourse or vaginal exams.
                        </p>

                    </div>

                    <div class="about-content">
                        <span class="h3 text-theme sec-subtitle mb-2 mb-md-0"></span>
                        <h3>Procedure</h3>

                        <p class="pe-xl-2 text-title">Botox is injected into the muscles around the vagina under local or general anesthesia. The effects generally last for several months, helping the muscles to relax and reduce pain.
                        </p>

                    </div>
                </div>

                <div class="col-xl-6 mb-30 mb-xl-0">

                    <div class="about-content">
                        <span class="h3 text-theme sec-subtitle mb-2 mb-md-0"></span>
                        <h3>Benefits</h3>
                        <p class="pe-xl-2 text-title"> By temporarily relaxing the muscles, Botox can provide relief from pain, allowing for greater comfort and confidence in sexual and gynecological experiences.
                        </p>

                    </div>


                </div>

            </div>

            <div class="row mt-40 mb-20">
                <div class="col-lg-4 mb-30">
                    <img src="{{ asset('patient/img/service/botox_surgery3_1200X800.jpg') }}" alt="Service Image" class="w-100">
                </div>
                <div class="col-lg-4 mb-30">
                    <img src="{{ asset('patient/img/service/botox_surgery2_1200X800.jpg') }}" alt="Service Image" class="w-100">
                </div>
                <div class="col-lg-4 mb-30">
                    <img src="{{ asset('patient/img/service/botox_surgery1_1200X800.jpg') }}" alt="Service Image" class="w-100">
                </div>
            </div>
        </div>
    </section>
    {{-- Botox Surgery for Vaginal Conditions Section ends --}}



    <section class="vs-accordion-wrapper space-top space-md-bottom">
        <div class="container">
            <div class="row">

                    <div class="about-content">
                        <span class="h3 text-theme sec-subtitle mb-2 mb-md-0"></span>
    <h2>Conclusion:</h2>
    <p>Sexual health is essential to women’s well-being, and addressing conditions like vaginismus, discomfort from tightness,
        or psychological barriers to intimacy can greatly enhance a woman's quality of life. Through options like dilatation,
        counseling, and, in some cases, Botox treatment, healthcare providers can offer personalized care that promotes comfort,
        confidence, and intimacy in relationships. Women are encouraged to speak openly with their healthcare providers to find the
         best solutions for their unique needs and concerns.</p>
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
