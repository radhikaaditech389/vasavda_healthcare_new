<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Preventive Onco-Gynecology & Health Checkup - Vasavada womens hospital Bopal</title>
    <meta name="author" content="Vasavada Women's Hospital">
    <meta name="description" content="Preventive Onco-Gynecology & Health Checkup at top womens hospital bopal and lady gynecologist bopal">
    <meta name="keywords" content="Preventive Onco-Gynecology bopal, Womens hospital bopal, Women's hospital bopal, gynecologist bopal, lady gynecologist bopal, womens hospital near by, gynecologist near by, lady gynecologist near by">
    <link rel="canonical" href="https://www.vasavadahospitals.org/preventive_oncogynecology" />
    @include('patient.layout.head')
    </head>

<body class="">
    @include('patient.layout.mobile_menu')
    @include('patient.layout.side_menu')
    @include('patient.layout.header', ['footer' => $footer])
    <div class="breadcumb-wrapper " style="margin-top: -30px !important;">
        <div class="parallax" data-parallax-image="{{ asset('patient/img/breadcurmb/preventive_breadcrumb.jpg') }}"></div>
        <div class="container z-index-common">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title" style="-webkit-text-stroke: 2px black;
    -webkit-text-fill-color: #702840;">Preventive Onco-Gynecology & Health Checkup</h1>
                <div class="breadcumb-menu-wrap">
                    <i class="far fa-home-lg"></i>
                    <ul class="breadcumb-menu">
                        <li><a href="/">Home</a></li>
                        <li class="active">Preventive Onco-Gynecology & Health Checkup</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Main menu items (Breast Cancer and Cervical Cancer) */
        .nav-item .nav-link.main-option {
            width: 100%;
            font-weight: bold;
        }

        /* Sub menu items */
        .nav-item .nav-link.sub-option {
            width: 80%; /* Reduced width */
            margin-left: 20px; /* Indent to show hierarchy */
            font-size: 0.95em; /* Slightly smaller font */
        }
    </style>


    <section class="main-section space" data-bg-src="{{ asset('patient/img/bg/ser-bg9-1.jpg') }}">
        <!-- service-section-nine -->
        <div class="service-section-nine">
            <div class="container-style8">
                <div class="title-area-four text-center  wow fadeInUp" data-wow-delay="400ms">
                    <span class="sub-title8">Medical Services</span>
                    <h2>Preventive Onco-Gynecology & Health Checkup</h2>
                </div>
                <div class="row">
                    <div class="col-lg-5 col-md-12 col-sm-12">
                        <div class="service-tabs">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <!-- Main Option 1: Breast Cancer -->
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link main-option" id="breastcancer-tab" data-bs-toggle="tab" data-bs-target="#breastcancer" type="button" role="tab" aria-controls="breastcancer" aria-selected="false">
                                        <i class="fa fa-plus"></i>Breast Cancer Screening
                                    </button>
                                </li>
                                <!-- Sub-option under Breast Cancer -->
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link sub-option" id="mammography-tab" data-bs-toggle="tab" data-bs-target="#mammography" type="button" role="tab" aria-controls="mammography" aria-selected="true">
                                        <i class="fa fa-plus"></i>Mammography
                                    </button>
                                </li>

                                <!-- Main Option 2: Cervical Cancer -->
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link main-option" id="cervicalcancer-tab" data-bs-toggle="tab" data-bs-target="#cervicalcancer" type="button" role="tab" aria-controls="cervicalcancer" aria-selected="false">
                                        </i>Cervical Cancer
                                    </button>
                                </li>
                                <!-- Sub-options under Cervical Cancer -->
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link sub-option" id="paptest-tab" data-bs-toggle="tab" data-bs-target="#paptest" type="button" role="tab" aria-controls="paptest" aria-selected="false">
                                        <i class="fa fa-plus"></i>Pap Test
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link sub-option" id="hpvvaccination-tab" data-bs-toggle="tab" data-bs-target="#hpvvaccination" type="button" role="tab" aria-controls="hpvvaccination" aria-selected="false">
                                        <i class="fa fa-plus"></i>HPV Vaccination
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link sub-option" id="colposcopy-tab" data-bs-toggle="tab" data-bs-target="#colposcopy" type="button" role="tab" aria-controls="colposcopy" aria-selected="false">
                                        <i class="fa fa-plus"></i>Colposcopy
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-12 col-sm-12">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade" id="mammography" role="tabpanel" aria-labelledby="mammography-tab">
                                <div class="service-tab-content">
                                    <h4 class="title">Mammography</h4>
                                    <p> Mammography is an X-ray imaging method used to detect early signs of breast cancer, often before physical symptoms develop. It’s particularly effective in identifying small tumors and abnormalities. </p>

                                    <a href="#mammography-section" class="ser-btn-nine">Learn More</a>
                                    <div class="ser-img-nine">
                                        <img src="{{ asset('patient/img/service/mammography_960X792.jpg') }}" alt="">
                                        <div class="icon-box"><img src="{{ asset('patient/img/service/ser9-2.svg') }}" class="image" alt=""></div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="paptest" role="tabpanel" aria-labelledby="paptest-tab">
                                <div class="service-tab-content">
                                    <h4 class="title">Pap Test</h4>
                                    <p>  The Pap test (or Pap smear) screens for cervical cancer by detecting precancerous or cancerous cells on the cervix. It’s a vital test that has greatly reduced cervical cancer incidence.</p>

                                    <a href="#paptest-section" class="ser-btn-nine">Learn More</a>
                                    <div class="ser-img-nine">
                                        <img src="{{ asset('patient/img/service/pap_test_960X792.jpg') }}" alt="">
                                        <div class="icon-box"><img src="{{ asset('patient/img/service/ser9-2.svg') }}" class="image" alt=""></div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="hpvvaccination" role="tabpanel" aria-labelledby="hpvvaccination-tab">
                                <div class="service-tab-content">
                                    <h4 class="title">HPV Vaccination</h4>
                                    <p> The HPV vaccine protects against the most common strains of the human papillomavirus, particularly those linked to cervical cancer and other cancers (e.g., throat, anal).</p>

                                    <a href="#hpvvaccination-section" class="ser-btn-nine">Learn More</a>
                                    <div class="ser-img-nine">
                                        <img src="{{ asset('patient/img/service/hpv-vaccine_960X792.jpg') }}" alt="">
                                        <div class="icon-box"><img src="{{ asset('patient/img/service/ser9-2.svg') }}" class="image" alt=""></div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade show active" id="breastcancer" role="tabpanel" aria-labelledby="breastcancer-tab">
                                <div class="service-tab-content">
                                    <h4 class="title">Breast Cancer Screening</h4>
                                    <p> Breast cancer screening is essential for detecting cancer at an early stage when it’s most treatable. In addition to mammography, clinical breast exams and self-exams play a role in ongoing breast health monitoring. </p>

                                    <a href="#breastcancer-section" class="ser-btn-nine">Learn More</a>
                                    <div class="ser-img-nine">
                                        <img src="{{ asset('patient/img/service/breast_cancer_960X792.jpg' )}}" alt="">
                                        <div class="icon-box"><img src="{{ asset('patient/img/service/ser9-2.svg') }}" class="image" alt=""></div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="colposcopy" role="tabpanel" aria-labelledby="colposcopy-tab">
                                <div class="service-tab-content">
                                    <h4 class="title">Colposcopy</h4>
                                    <p>Colposcopy is a diagnostic procedure to closely examine the cervix, vagina, and vulva for signs of disease, often following an abnormal Pap test result.</p>

                                    <a href="#colposcopy-section" class="ser-btn-nine">Learn More</a>
                                    <div class="ser-img-nine">
                                        <img src="{{ asset('patient/img/about/colposcopy.jpg') }}" alt="">
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

    {{--Breast Cancer Screening section start --}}

    <section class="vs-accordion-wrapper space-top space-md-bottom" id="breastcancer-section">
        <div class="container">
            <div class="title-area-four text-center  wow fadeInUp" data-wow-delay="400ms">
                <span class="sub-title8"><h2>Breast Cancer Screening</h2></span>
            </div>
            <div class="row">
                <div class="col-xl-6 mb-30 mb-xl-0">
                    <div class="about-content">
                        <span class="h3 text-theme sec-subtitle mb-2 mb-md-0"></span>
                        <h3>Overview</h3>
                        <p class="pe-xl-2 text-title">Breast cancer screening is essential for detecting cancer at an early stage when it’s most treatable. In addition to mammography, clinical breast exams and self-exams play a role in ongoing breast health monitoring.
                        </p>

                    </div>

                    <div class="about-content">
                        <span class="h3 text-theme sec-subtitle mb-2 mb-md-0"></span>
                        <h3>Methods</h3>
                        <h4>Clinical Breast Exam</h4>
                        <p class="pe-xl-2 text-title">A healthcare provider checks for lumps or changes in the breast tissue.
                        </p>
                        <h4>Self-Exam</h4>
                        <p class="pe-xl-2 text-title">Women can monitor changes in their breast appearance and texture, such as lumps or discharge, and report them to their doctor.
                        </p>

                    </div>
                </div>

                <div class="col-xl-6 mb-30 mb-xl-0">
                    <div class="about-content">
                        <span class="h3 text-theme sec-subtitle mb-2 mb-md-0"></span>
                        <h3>Frequency</h3>
                        <p class="pe-xl-2 text-title">Mammograms are generally recommended annually or biennially from age 40, while self-exams and clinical exams vary based on individual risk.
                        </p>

                    </div><br>

                    <div class="about-content">
                        <span class="h3 text-theme sec-subtitle mb-2 mb-md-0"></span>
                        <h3>Benefits</h3>
                        <p class="pe-xl-2 text-title"> Regular screening allows for early intervention, significantly improving survival rates in breast cancer patients.
                        </p>

                    </div>


                </div>

            </div>

            <div class="row mt-40 mb-20">
                <center>
                <div class="col-lg-6 mb-30">
                    <img src="{{ asset('patient/img/service/breast_cancer.jpg') }}" style="width:650px;">
                </div></center>
            </div>
        </div>
    </section>
    {{-- Breast Cancer Screening Section ends --}}


    {{-- Mammography section start --}}

    <section class="vs-accordion-wrapper space-top space-md-bottom" id="mammography-section">
        <div class="container">
            <div class="title-area-four text-center  wow fadeInUp" data-wow-delay="400ms">
                <span class="sub-title8"><h2>Mammography</h2></span>
            </div>
            <div class="row">
                <div class="col-xl-6 mb-30 mb-xl-0">
                    <div class="about-content">
                        <span class="h3 text-theme sec-subtitle mb-2 mb-md-0"></span>
                        <h3>Overview</h3>
                        <p class="pe-xl-2 text-title">Mammography is an X-ray imaging method used to detect early signs of breast cancer, often before physical symptoms develop. It’s particularly effective in identifying small tumors and abnormalities.
                        </p>

                    </div>

                    <div class="about-content">
                        <span class="h3 text-theme sec-subtitle mb-2 mb-md-0"></span>
                        <h3>Procedure</h3>
                        <p class="pe-xl-2 text-title">During a mammogram, each breast is compressed to get clear X-ray images, helping identify lumps, calcifications, or other unusual findings.
                        </p>

                    </div>
                </div>

                <div class="col-xl-6 mb-30 mb-xl-0">
                    <div class="about-content">
                        <span class="h3 text-theme sec-subtitle mb-2 mb-md-0"></span>
                        <h3>Frequency</h3>
                        <p class="pe-xl-2 text-title">Generally recommended every 1–2 years for women aged 40 and above or earlier for those with a family history of breast cancer.
                        </p>

                    </div>

                    <div class="about-content">
                        <span class="h3 text-theme sec-subtitle mb-2 mb-md-0"></span>
                        <h3>Benefits</h3>
                        <p class="pe-xl-2 text-title">Early detection through mammography can significantly improve the prognosis of breast cancer, making treatment more effective.
                        </p>

                    </div>


                </div>

            </div>

            <div class="row mt-40 mb-20">
                <center>
                <div class="col-lg-6 mb-30">
                    <img src="{{ asset('patient/img/service/memography.jpg') }}" style="width:650px;">
                </div></center>
            </div>
        </div>
    </section>
    {{-- Mammography Section ends --}}

    {{-- Pap Test section start --}}

    <section class="vs-accordion-wrapper space-top space-md-bottom" id="paptest-section">
        <div class="container">
            <div class="title-area-four text-center  wow fadeInUp" data-wow-delay="400ms">
                <span class="sub-title8"><h2>Cervical Cancer</h2></span><br>
                <span><h2>Pap Test</h2></span>
            </div>
            <div class="row">
                <div class="col-xl-6 mb-30 mb-xl-0">
                    <div class="about-content">
                        <span class="h3 text-theme sec-subtitle mb-2 mb-md-0"></span>
                        <h3>Overview</h3>
                        <p class="pe-xl-2 text-title">The Pap test (or Pap smear) screens for cervical cancer by detecting precancerous or cancerous cells on the cervix. It’s a vital test that has greatly reduced cervical cancer incidence.
                        </p>

                    </div>

                    <div class="about-content">
                        <span class="h3 text-theme sec-subtitle mb-2 mb-md-0"></span>
                        <h3>Procedure</h3>
                        <p class="pe-xl-2 text-title">A small sample of cells is gently scraped from the cervix and examined under a microscope for abnormalities.
                        </p>

                    </div>
                </div>

                <div class="col-xl-6 mb-30 mb-xl-0">
                    <div class="about-content">
                        <span class="h3 text-theme sec-subtitle mb-2 mb-md-0"></span>
                        <h3>Frequency</h3>
                        <p class="pe-xl-2 text-title"> Recommended by your gynecologist.
                        </p>

                    </div><br><br>

                    <div class="about-content">
                        <span class="h3 text-theme sec-subtitle mb-2 mb-md-0"></span>
                        <h3>Benefits</h3>
                        <p class="pe-xl-2 text-title">By catching abnormal cells early, the Pap test can help prevent cervical cancer or treat it in very early stages. This is a painless procedure.
                        </p>

                    </div>


                </div>

            </div>

            <div class="row mt-40 mb-20">
                <center>
                <div class="col-lg-6 mb-30">
                    <img src="{{ asset('patient/img/service/pap_test.jpg') }}" style="width:650px;">
                </div></center>
            </div>
        </div>
    </section>
    {{-- Pap Test Section ends --}}

    {{-- HPV Vaccination section start --}}

    <section class="vs-accordion-wrapper space-top space-md-bottom" id="hpvvaccination-section">
        <div class="container">
            <div class="title-area-four text-center  wow fadeInUp" data-wow-delay="400ms">
                <span class="sub-title8"><h2>HPV Vaccination</h2></span>
            </div>
            <div class="row">
                <div class="col-xl-6 mb-30 mb-xl-0">
                    <div class="about-content">
                        <span class="h3 text-theme sec-subtitle mb-2 mb-md-0"></span>
                        <h3>Overview</h3>
                        <p class="pe-xl-2 text-title">The HPV vaccine protects against the most common strains of the human papillomavirus, particularly those linked to cervical cancer and other cancers (e.g., throat, anal).
                        </p>

                    </div>

                    <div class="about-content">
                        <span class="h3 text-theme sec-subtitle mb-2 mb-md-0"></span>
                        <h3>Administration</h3>
                        <p class="pe-xl-2 text-title">Typically administered in two or three doses over six months, ideally before becoming sexually active (often recommended at ages 11-12).
                        </p>
                    </div>
                </div>

                <div class="col-xl-6 mb-30 mb-xl-0">
                    <div class="about-content">
                        <span class="h3 text-theme sec-subtitle mb-2 mb-md-0"></span>
                        <h3>Benefits</h3>
                        <p class="pe-xl-2 text-title">Prevents HPV infections that are responsible for the majority of cervical cancer cases, reducing the likelihood of developing cervical and other HPV-related cancers later in life.
                        </p>
                    </div>
                </div>
            </div>

            <div class="row mt-40 mb-20">
                <center>
                <div class="col-lg-6 mb-30">
                    <img src="{{ asset('patient/img/service/hpv.jpg') }}" style="width:650px;">
                </div></center>
            </div>
        </div>
    </section>
    {{-- HPV Vaccination Section ends --}}


    {{-- Colposcopy section start --}}

    <section class="vs-accordion-wrapper space-top space-md-bottom" id="colposcopy-section">
        <div class="container">
            <div class="title-area-four text-center  wow fadeInUp" data-wow-delay="400ms">
                <span class="sub-title8"><h2>Colposcopy</h2></span>
            </div>
            <div class="row">
                <div class="col-xl-6 mb-30 mb-xl-0">
                    <div class="about-content">
                        <span class="h3 text-theme sec-subtitle mb-2 mb-md-0"></span>
                        <h3>Overview</h3>
                        <p class="pe-xl-2 text-title">Colposcopy is a diagnostic procedure to closely examine the cervix, vagina, and vulva for signs of disease, often following an abnormal Pap test result.
                        </p>

                    </div>

                    <div class="about-content">
                        <span class="h3 text-theme sec-subtitle mb-2 mb-md-0"></span>
                        <h3>Procedure</h3>
                        <p class="pe-xl-2 text-title">A colposcope (a magnifying instrument with a light) is used to view and evaluate any abnormal areas more clearly. Biopsies may be taken if necessary.
                        </p>

                    </div>
                </div>

                <div class="col-xl-6 mb-30 mb-xl-0">

                    <div class="about-content">
                        <span class="h3 text-theme sec-subtitle mb-2 mb-md-0"></span>
                        <h3>Benefits</h3>
                        <p class="pe-xl-2 text-title"> Helps diagnose issues in the cervix early, allowing for targeted treatment to prevent cervical cancer. It’s also useful in assessing and monitoring abnormal cervical cells over time.
                        </p>

                    </div>


                </div>

            </div>

            <div class="row mt-40 mb-20">
                <center>
                <div class="col-lg-6 mb-30">
                    <img src="{{ asset('patient/img/service/coloscopy.jpg') }}" style="width:650px;">
                </div></center>
            </div>
        </div>
    </section>
    {{-- Colposcopy Section ends --}}

    <section class="vs-accordion-wrapper space-top space-md-bottom">
        <div class="container">
            <div class="row">

                    <div class="about-content">

                    <h4 class="h4">Preventive Cancer</h4>
<ul class="ser-list-nine">
  <li>Lifestyle Changes</li>
  <li>Regular Pap Test</li>
  <li>HPV Vaccination</li>
  <li>Contraceptive Planning</li>
  <li>Awareness of Menstrual Hygiene</li>
</ul>


                        <span class="h3 text-theme sec-subtitle mb-2 mb-md-0"></span>
    <h2>Conclusion:</h2>
    <p>Preventive onco-gynecology and regular health checkups, including mammography, Pap tests,
         HPV vaccination, breast cancer screening, and colposcopy, are crucial for maintaining women’s
         health and catching potential issues early. These preventative measures help reduce the risk of cancers,
          enable early detection, and increase the effectiveness of treatment when necessary. Women are encouraged
          to consult with their healthcare provider to establish a screening and vaccination schedule tailored to
           their personal health needs and risk factors.</p>
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
