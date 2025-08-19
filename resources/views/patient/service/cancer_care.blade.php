<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Gynec Cancer Care - Vasavada womens hospital Bopal</title>
    <meta name="author" content="Vasavada Women's Hospital">
    <meta name="description" content="Gynec Cancer Care at top womens hospital bopal and lady gynecologist bopal">
    <meta name="keywords" content="Gynec Cancer Care Bopal, Womens hospital bopal, Women's hospital bopal, gynecologist bopal, lady gynecologist bopal, womens hospital near by, gynecologist near by, lady gynecologist near by">
    <link rel="canonical" href="https://www.vasavadahospitals.org/cancer_care/" />
    @include('patient.layout.head')
</head>


<body class="">
    @include('patient.layout.mobile_menu')
    @include('patient.layout.side_menu')
    @include('patient.layout.header', ['footer' => $footer])
    <div class="breadcumb-wrapper " style="margin-top: -30px !important;">
        <div class="parallax" data-parallax-image="{{ asset('patient/img/breadcurmb/breadcrumb_gynocology.jpg') }}"></div>
        <div class="container z-index-common">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title" style="-webkit-text-stroke: 2px black;
    -webkit-text-fill-color: #702840; ">Gynec Cancer Care</h1>
                <div class="breadcumb-menu-wrap">
                    <i class="far fa-home-lg"></i>
                    <ul class="breadcumb-menu">
                        <li><a href="/">Home</a></li>
                        <li class="active">Gynec Cancer Care</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <section id="doulabirthsection" class="about-section-eight space pt-0 space-md-bottom">
        <div class="container-style8">
            <div class="title-area-four text-center  wow fadeInUp" data-wow-delay="400ms">
                <span class="sub-title8"><h2>Gynec Cancer Care</h2></span>
            </div>
            <div class="row">
                <div class="col-lg-7 col-md-12 col-sm-12">
                    <div class="about-img-eight">
                        <img src="{{ asset('patient/img/service/gynacology1.jpg') }}" alt="">
                        {{-- <div class="exp-box-eight">
                            <div class="icon-box"><img src="{{ asset('patient/img/about/abicon1-1.svg') }}" alt=""></div>
                            <div class="exp-content">
                                <h6 class="title">Awareness and prompt treatment will save lives.</h6>
                                <p>We celebrate September as Gynecological Awareness Month.</p>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <div class="col-lg-5 col-md-12 col-sm-12">
                    <div class="about-content-eight">
                        <p>  Gynecologic Cancer Care in gynecology focuses on the prevention, diagnosis,
                             and treatment of cancers that affect the female reproductive system.
                             Early detection and prompt treatment are essential in improving outcomes and quality of life.
                        </p>

                        <p>
                            Specialized gynecologic oncology teams use a multidisciplinary approach to provide
                             comprehensive care for each patient.
                        </p><br><br>

                        <p>Awareness and prompt treatment will save lives.<br>
                            We celebrate September as Gynecological Awareness Month.</p>
                        <div class="about-contact-box-eight">
                            <div class="icon-box"><img src="{{ asset('patient/img/about/about8-3.svg') }}" alt=""></div>
                            <div class="content-box">
                                <span>Book Appointment</span>
                                <h6><a href="#">+91 98790 09439</a></h6>
                            </div>
                        </div>
                        {{-- <a href="#" class="btn-style8 v9">Learn More</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="main-section space" data-bg-src="{{ asset('patient/img/bg/ser-bg9-1.jpg') }}">
        <!-- service-section-nine -->
        <div class="service-section-nine">
            <div class="container-style8">
                <div class="title-area-four text-center  wow fadeInUp" data-wow-delay="400ms">
                    <span class="sub-title8">Key Types of Cancer in</span>
                    <h2>Gynecologic Oncology</h2>
                </div>
                <div class="row">
                    <div class="col-lg-5 col-md-12 col-sm-12">
                        <div class="service-tabs">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="ovariancancer-tab" data-bs-toggle="tab" data-bs-target="#ovariancancer" type="button" role="tab" aria-controls="ovariancancer" aria-selected="true"><i class="fa fa-plus"></i>Ovarian Cancer</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                <button class="nav-link" id="uterinecencer-tab" data-bs-toggle="tab" data-bs-target="#uterinecencer" type="button" role="tab" aria-controls="uterinecencer" aria-selected="false"><i class="fa fa-plus"></i>Uterine Cancer</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                <button class="nav-link" id="cervicalcancer-tab" data-bs-toggle="tab" data-bs-target="#cervicalcancer" type="button" role="tab" aria-controls="cervicalcancer" aria-selected="false"><i class="fa fa-plus"></i>Cervical Cancer</button>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-12 col-sm-12">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="ovariancancer" role="tabpanel" aria-labelledby="ovariancancer-tab">
                                <div class="service-tab-content">
                                    <h4 class="title">Ovarian Cancer</h4>
                                    <p> Ovarian cancer begins in the ovaries and is often challenging to detect early. It is the most deadly of the gynecologic cancers due to the lack of early symptoms.  </p>

                                    <a href="#ovariancancer-section" class="ser-btn-nine">Learn More</a>
                                    <div class="ser-img-nine">
                                        <img src="{{ asset('patient/img/service/ovarian_cancer_960X792.jpg') }}" alt="">
                                        <div class="icon-box"><img src="{{ asset('patient/img/service/ser9-2.svg') }}" class="image" alt=""></div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="uterinecencer" role="tabpanel" aria-labelledby="uterinecencer-tab">
                                <div class="service-tab-content">
                                    <h4 class="title">Uterine Cancer</h4>
                                    <p>Uterine cancer primarily originates in the lining of the uterus (endometrial cancer) and is the most common gynecologic cancer in women.</p>

                                    <a href="#uterinecancer-section" class="ser-btn-nine">Learn More</a>
                                    <div class="ser-img-nine">
                                        <img src="{{ asset('patient/img/service/uterine_cancer_960X792.jpg') }}" alt="">
                                        <div class="icon-box"><img src="{{ asset('patient/img/service/ser9-2.svg') }}" class="image" alt=""></div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="cervicalcancer" role="tabpanel" aria-labelledby="cervicalcancer-tab">
                                <div class="service-tab-content">
                                    <h4 class="title">Cervical Cancer</h4>
                                    <p>  Cervical cancer originates in the cells of the cervix and is often linked to human papillomavirus (HPV) infection. </p>

                                    <a href="#cervicalcancer-section" class="ser-btn-nine">Learn More</a>
                                    <div class="ser-img-nine">
                                        <img src="{{ asset('patient/img/service/cervical_cancer_960X792.jpg') }}" alt="">
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


    {{-- Ovarian Cancer section start --}}
    <section id="ovariancancer-section" class="about-section-eight space pt-0 space-md-bottom">
        <div class="container-style8">
            <div class="title-area-four text-center  wow fadeInUp" data-wow-delay="400ms">
                <span class="sub-title8"><h2>Ovarian Cancer</h2></span>
            </div>
            <div class="row">
                <div class="col-lg-7 col-md-12 col-sm-12">
                    <div class="about-img-eight">
                        <img src="{{ asset('patient/img/service/ovarian_cancer1.jpg') }}" alt="">
                        {{-- <div class="exp-box-eight">
                            <div class="icon-box"><img src="{{ asset('patient/img/about/abicon1-1.svg') }}" alt=""></div>
                            <div class="exp-content">
                                <h6 class="title">Inpatient Services</h6>
                                <p>It is a long established fact that a reader will be distracted.</p>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <div class="col-lg-5 col-md-12 col-sm-12">
                    <div class="about-content-eight">
                        <br><br><br><p>   Ovarian cancer begins in the ovaries and is often challenging to detect early.
                            It is the most deadly of the gynecologic cancers due to the lack of early symptoms.
                             Most ovarian cancer cases are diagnosed at a later stage when the cancer has spread beyond the ovaries.
                        </p>
                        <div class="about-contact-box-eight">
                            <div class="icon-box"><img src="{{ asset('patient/img/about/about8-3.svg') }}" alt=""></div>
                            <div class="content-box">
                               <br><br><br> <span>Book Appointment</span>
                                <h6><a href="#">+91 98790 09439</a></h6>
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
                <div class="col-xl-6">
                    <div class="vs-accordion accordion accordion-style2" id="vsaccordion">

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                Symptoms
                            </h2>
                            <p> - Persistent bloating or abdominal swelling. </p>
                            <p> - Pelvic pain or pressure.</p>
                            <p> - Difficulty eating or feeling full quickly.</p>
                            <p> - Frequent urination or urgent need to urinate.</p>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                Risk Factors
                            </h2>
                            <p> - Family history of ovarian cancer or breast cancer.</p>
                            <p> - Genetic mutations (BRCA1 and BRCA2 genes).</p>
                            <p> - Age, with a higher risk in post-menopausal women.</p>
                            <p> - Hormone replacement therapy (HRT) and reproductive history.</p>
                        </div>
                    </div>
                    <br>
                    <img src="{{ asset('patient/img/service/ovarian_cancer2.jpg') }}" alt="Service Image" style="width: 550px; height: 300px;">
                </div>
                <div class="col-xl-6">
                    <div class="vs-accordion accordion accordion-style2" id="vsaccordion">

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                Diagnosis
                            </h2>
                            <p><h6>Physical Examination:</h6>A pelvic examination to feel for any abnormalities.</p>
                            <p><h6>Ultrasound:</h6>Imaging of the ovaries to detect masses.</p>
                            <p><h6>CA-125 Blood Test:</h6> Measures a protein associated with ovarian cancer, though not exclusively.</p>
                            <p><h6>Biopsy:</h6>A definitive diagnosis involves sampling tissue for laboratory analysis.</p>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                Treatment
                            </h2>
                            <p><h6>Surgery:</h6>Removing the ovaries, fallopian tubes, uterus, and sometimes surrounding tissues.</p>
                            <p><h6>Chemotherapy:</h6>After surgery or as a primary treatment to target cancer cells.</p>
                            <p><h6>Targeted Therapy:</h6> Drugs designed to attack specific cancer cells.</p>
                            <p><h6>Prognosis:</h6>Early detection can improve outcomes; however, advanced ovarian cancer has a lower survival rate.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- Ovarian Cancer Section ends --}}

     {{-- Uterine Cancer section start --}}
     <section id="uterinecancer-section" class="about-section-eight space pt-0 space-md-bottom">
        <div class="container-style8">
            <div class="title-area-four text-center  wow fadeInUp" data-wow-delay="400ms">
                <span class="sub-title8"><h2>Uterine Cancer</h2></span>
            </div>
            <div class="row">
                <div class="col-lg-7 col-md-12 col-sm-12">
                    <div class="about-img-eight">
                        <img src="{{ asset('patient/img/service/utrine_cancer.png') }}" alt="">
                        {{-- <div class="exp-box-eight">
                            <div class="icon-box"><img src="{{ asset('patient/img/about/abicon1-1.svg') }}" alt=""></div>
                            <div class="exp-content">
                                <h6 class="title">Inpatient Services</h6>
                                <p>It is a long established fact that a reader will be distracted.</p>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <div class="col-lg-5 col-md-12 col-sm-12">
                    <div class="about-content-eight">
                        <br><br><br><p>  Uterine cancer primarily originates in the lining of the uterus
                             (endometrial cancer) and is the most common gynecologic cancer in women.
                              Early diagnosis is common due to symptoms like abnormal bleeding, which prompt timely investigation.
                        </p>
                        <div class="about-contact-box-eight">
                            <div class="icon-box"><img src="{{ asset('patient/img/about/about8-3.svg') }}" alt=""></div>
                            <div class="content-box">
                               <br><br><br> <span>Book Appointment</span>
                                <h6><a href="#">+91 98790 09439</a></h6>
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
                <div class="col-xl-6">
                    <div class="vs-accordion accordion accordion-style2" id="vsaccordion">

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                Symptoms
                            </h2>
                            <p> - Abnormal vaginal bleeding, especially after menopause. </p>
                            <p> - Pelvic pain or pressure.</p>
                            <p> - Pain during urination or intercourse.</p>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                Risk Factors
                            </h2>
                            <p> - Obesity, which increases estrogen levels in the body.</p>
                            <p> - Age, particularly post-menopausal women.</p>
                            <p> - Hormone therapy with estrogen alone.</p>
                            <p> - Genetic factors, such as Lynch syndrome.</p>
                        </div>
                    </div>
                    <br>
                    <img src="{{ asset('patient/img/service/uti.jpg') }}" alt="Service Image" style="width: 550px; height: 410px;">
                </div>
                <div class="col-xl-6">
                    <div class="vs-accordion accordion accordion-style2" id="vsaccordion">

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                Diagnosis
                            </h2>
                            <p><h6>Pelvic Exam:</h6>Physical examination of the pelvic area.</p>
                            <p><h6>Transvaginal Ultrasound:</h6>Imaging the uterus for any abnormalities.</p>
                            <p><h6>Endometrial Biopsy:</h6> Sampling of the uterine lining to check for cancer cells.</p>
                            <p><h6>Hysteroscopy:</h6>Directly viewing the inside of the uterus with a camera.</p>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                Treatment
                            </h2>
                            <p><h6>Surgery:</h6>A hysterectomy to remove the uterus, and possibly the ovaries and fallopian tubes.</p>
                            <p><h6>Radiation Therapy:</h6>Often used after surgery to kill remaining cancer cells.</p>
                            <p><h6>Hormone Therapy:</h6> Used for advanced or recurrent cancer.</p>
                            <p><h6>Chemotherapy:</h6>In cases where cancer has spread beyond the uterus.</p>
                            <p><h6>Prognosis:</h6>Uterine cancer has a good prognosis when detected early, especially when confined to the uterus.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- Uterine Cancer Section ends --}}

     {{-- Cervical Cancer section start --}}
     <section id="cervicalcancer-section" class="about-section-eight space pt-0 space-md-bottom">
        <div class="container-style8">
            <div class="title-area-four text-center  wow fadeInUp" data-wow-delay="400ms">
                <span class="sub-title8"><h2>Cervical Cancer</h2></span>
            </div>
            <div class="row">
                <div class="col-lg-7 col-md-12 col-sm-12">
                    <div class="about-img-eight">
                        <img src="{{ asset('patient/img/service/cervical_cancer.jpg') }}" alt="">
                        {{-- <div class="exp-box-eight">
                            <div class="icon-box"><img src="{{ asset('patient/img/about/abicon1-1.svg') }}" alt=""></div>
                            <div class="exp-content">
                                <h6 class="title">Inpatient Services</h6>
                                <p>It is a long established fact that a reader will be distracted.</p>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <div class="col-lg-5 col-md-12 col-sm-12">
                    <div class="about-content-eight">
                        <br><br><br><p>  Cervical cancer originates in the cells of the cervix and is often
                             linked to human papillomavirus (HPV) infection. Regular screening through Pap tests
                             has significantly reduced cervical cancer rates by detecting precancerous changes early.
                        </p>
                        <div class="about-contact-box-eight">
                            <div class="icon-box"><img src="{{ asset('patient/img/about/about8-3.svg') }}" alt=""></div>
                            <div class="content-box">
                               <br><br><br> <span>Book Appointment</span>
                                <h6><a href="#">+91 98790 09439</a></h6>
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
                <div class="col-xl-6">
                    <div class="vs-accordion accordion accordion-style2" id="vsaccordion">

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                Symptoms
                            </h2>
                            <p> - Abnormal vaginal bleeding, including after intercourse or between periods. </p>
                            <p> - Unusual vaginal discharge.</p>
                            <p> - Pain during intercourse.</p>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                Risk Factors
                            </h2>
                            <p> - HPV infection, especially high-risk strains.</p>
                            <p> - Smoking, which can contribute to cancer cell changes in the cervix.</p>
                            <p> - Weak immune system, which makes it harder to clear HPV infection.</p>
                            <p> - Early sexual activity and multiple sexual partners.</p>
                        </div>
                    </div>
                    <br>
                    <img src="{{ asset('patient/img/service/cervical_cancer2.jpg') }}" alt="Service Image" style="width: 560px; height: 440px;">
                </div>
                <div class="col-xl-6">
                    <div class="vs-accordion accordion accordion-style2" id="vsaccordion">

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                Diagnosis
                            </h2>
                            <p><h6>Pap Test:</h6>Detects abnormal cells on the cervix.</p>
                            <p><h6>HPV Test:</h6> Identifies high-risk HPV strains associated with cervical cancer.</p>
                            <p><h6>Colposcopy:</h6> Detailed examination of the cervix to find abnormal areas.</p>
                            <p><h6>Biopsy:</h6>Tissue sample analysis to confirm cancer diagnosis.</p>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                Treatment
                            </h2>
                            <p><h6>Surgery:</h6>Removal of the cervix or entire uterus in early-stage cancer.</p>
                            <p><h6>Radiation Therapy:</h6>Often combined with chemotherapy for advanced stages.</p>
                            <p><h6>Chemotherapy:</h6> Typically used with radiation or for metastatic cancer.</p>
                            <p><h6>Immunotherapy:</h6>For advanced or recurrent cervical cancer, immunotherapy can help the immune system fight cancer.</p>
                            <p><h6>Prognosis:</h6>Cervical cancer is highly treatable when caught early, with a good survival rate. Advanced cases may have a lower prognosis but can still be managed with aggressive treatment.</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- Cervical Cancer Section ends --}}


    <section class="vs-accordion-wrapper space-top space-md-bottom">
        <div class="container">
            <div class="row">

                    <div class="about-content">
                        <span class="h3 text-theme sec-subtitle mb-2 mb-md-0"></span>
    <h2>Conclusion:</h2>
    <p>
        Comprehensive Gynecologic Cancer Care, particularly for ovarian, uterine, and cervical cancer,
         emphasizes the importance of early detection, diagnosis, and personalized treatment.
          Regular screenings like Pap tests for cervical cancer and awareness of symptoms are critical
          in reducing risks. Working with a gynecologic oncologist ensures patients receive specialized care
           designed to meet the unique challenges of each type of cancer.
        </p>
        <p>
            If you or someone you know is experiencing symptoms or has risk factors for gynecologic cancers,
             timely consultation with a healthcare provider can make a significant difference in health outcomes.
        </p>

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
