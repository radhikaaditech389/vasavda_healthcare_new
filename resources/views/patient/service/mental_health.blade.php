<!doctype html>
<html class="no-js" lang="zxx">

@include('patient.layout.head')

<body class="">
    @include('patient.layout.mobile_menu')
    @include('patient.layout.side_menu')
    @include('patient.layout.header', ['footer' => $footer])
    <div class="breadcumb-wrapper " style="margin-top: -30px !important;">
        <div class="parallax" data-parallax-image="{{ asset('patient/img/breadcurmb/mental_health_breadcrumb.jpg') }}"></div>
        <div class="container z-index-common">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title" style="-webkit-text-stroke: 2px black;
    -webkit-text-fill-color: #702840; ">Mental Health</h1>
                <div class="breadcumb-menu-wrap">
                    <i class="far fa-home-lg"></i>
                    <ul class="breadcumb-menu">
                        <li><a href="/">Home</a></li>
                        <li class="active">Mental Health</li>
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
                    <h2>Mental Health</h2>
                </div>
                <div class="row">
                    <div class="col-lg-5 col-md-12 col-sm-12">
                        <div class="service-tabs">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                <button class="nav-link" id="counseling-tab" data-bs-toggle="tab" data-bs-target="#counseling" type="button" role="tab" aria-controls="counseling" aria-selected="false"><i class="fa fa-plus"></i>Counseling</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                <button class="nav-link" id="couplemaritalcounseling-tab" data-bs-toggle="tab" data-bs-target="#couplemaritalcounseling" type="button" role="tab" aria-controls="couplemaritalcounseling" aria-selected="false"><i class="fa fa-plus"></i>Couple / Marital Counseling</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="postpartum-tab" data-bs-toggle="tab" data-bs-target="#postpartum" type="button" role="tab" aria-controls="postpartum" aria-selected="false"><i class="fa fa-plus"></i>Postpartum Depression/<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Baby Blues</button>
                                </li>
                               
                            

                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-12 col-sm-12">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="counseling" role="tabpanel" aria-labelledby="counseling-tab">
                                <div class="service-tab-content">
                                    <h4 class="title">Counseling</h4>
                                    <p><h5>Purpose:</h5> To provide a safe, supportive environment where individuals can explore their thoughts, feelings, and behaviors with a mental health professional, working toward better mental and emotional well-being.
                                    </p>

                                    <a href="#counseling-section" class="ser-btn-nine">Learn More</a>
                                    <div class="ser-img-nine">
                                        <img src="{{ asset('patient/img/service/accompaniment-abortion-process 387X400.jpg') }}" alt="">
                                        <div class="icon-box"><img src="{{ asset('patient/img/service/ser9-2.svg') }}" class="image" alt=""></div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="couplemaritalcounseling" role="tabpanel" aria-labelledby="couplemaritalcounseling-tab">
                                <div class="service-tab-content">
                                    <h4 class="title"> Couple / Marital Counseling</h4>
                                    <p><h5>Purpose:</h5> To help couples address issues within their relationship, enhance communication, resolve conflicts, and strengthen their bond.</p>

                                    <a href="#couplemaritalcounseling-section" class="ser-btn-nine">Learn More</a>
                                    <div class="ser-img-nine">
                                        <img src="{{ asset('patient/img/about/Marriage-Counseling.jpg') }}" alt="">
                                        <div class="icon-box"><img src="{{ asset('patient/img/service/ser9-2.svg') }}" class="image" alt=""></div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="postpartum" role="tabpanel" aria-labelledby="postpartum-tab">
                                <div class="service-tab-content">
                                    <h4 class="title"> Postpartum Depression/Baby Blues</h4>
                                    <p>sample text</p>

                                    <a href="#postpartum-section" class="ser-btn-nine">Learn More</a>
                                    <div class="ser-img-nine">
                                        <img src="{{ asset('patient/img/service/postpartum Final.jpg') }}" alt="">
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
    <br>

    <section class="vs-accordion-wrapper space-top space-md-bottom" id="counseling-section">
        <div class="container">
            <div class="title-area-four text-center  wow fadeInUp" data-wow-delay="400ms">
                <span class="sub-title8"><h2>Counseling</h2></span>
            </div>
            <div class="row">
                <div class="col-xl-6 mb-30 mb-xl-0">
                    <div class="about-content">
                        <span class="h3 text-theme sec-subtitle mb-2 mb-md-0"></span>
                        <h2>Purpose</h2>
                        <p class="pe-xl-2 text-title">To provide a safe, supportive environment where individuals can explore their thoughts, feelings, and behaviors with a mental health professional, working toward better mental and emotional well-being.

                        </p>
                    </div>
                    <br>
                    <div class="about-content">
                        <span class="h3 text-theme sec-subtitle mb-2 mb-md-0"></span>
                        <h2>Benefits</h2>
                        <h4>Improved Coping Mechanisms</h4>
                        <p class="pe-xl-2 text-title"> Teaches tools and strategies for managing stress, anxiety, and other emotional challenges.

                        </p>
                        <h4>Self-Awareness</h4>
                        <p class="pe-xl-2 text-title">Encourages personal growth and a deeper understanding of one’s values, behaviors, and triggers.

                        </p>
                        <h4>Better Relationships</h4>
                        <p class="pe-xl-2 text-title">Often improves communication and interpersonal skills, positively impacting relationships with others.


                        </p>
                    </div>
                </div>

                <div class="col-xl-6 mb-30 mb-xl-0">
                    <div class="about-content">
                        <span class="h3 text-theme sec-subtitle mb-2 mb-md-0"></span>
                        <h2>Types of Counseling</h2>

                        <p class="pe-xl-2 text-title"><b> Individual Counseling</b> Helps individuals address specific mental health concerns, such as anxiety, depression, trauma, stress, or self-esteem issues.

                        </p>

                        <p class="pe-xl-2 text-title"><b> Behavioral Therapy</b>Focuses on identifying and changing harmful behaviors or thought patterns.

                        </p>

                        <p class="pe-xl-2 text-title"><b>Cognitive Behavioral Therapy (CBT)</b>A common approach that helps individuals recognize and reframe negative thinking patterns.


                        </p>
                    </div>

                    <div class="about-content">
                        <span class="h3 text-theme sec-subtitle mb-2 mb-md-0"></span>
                        <h2>Considerations</h2>
                        <h4>Commitment</h4>
                        <p class="pe-xl-2 text-title">Results are typically seen with regular sessions and active participation.

                        </p>

                        <h4>Safe Space for Exploration</h4>
                        <p class="pe-xl-2 text-title">Requires openness and vulnerability to address deeper issues and emotional pain.

                        </p>

                    </div>
                </div>

            </div>
            <div class="row mt-40 mb-20">
                <div class="col-lg-4 mb-30">
                    <img src="{{ asset('patient/img/service/medium-shot-doctor-talking-patient 387X400.jpg') }}" alt="Service Image" class="w-100">
                </div>
                <div class="col-lg-4 mb-30">
                    <img src="{{ asset('patient/img/service/postpartum 387X400.jpg') }}" alt="Service Image" class="w-100">
                </div>
                <div class="col-lg-4 mb-30">
                    <img src="{{ asset('patient/img/service/marital_counseling1 387X400.jpg') }}" alt="Service Image" class="w-100">
                </div>
            </div>
        </div>
    </section>


    <section class="vs-accordion-wrapper space-top space-md-bottom" id="couplemaritalcounseling-section">
        <div class="container">
            <div class="title-area-four text-center  wow fadeInUp" data-wow-delay="400ms">
                <span class="sub-title8"><h2>Couple / Marital Counseling</h2></span>
            </div>
            <div class="row">
                <div class="col-xl-6 mb-30 mb-xl-0">
                    <div class="about-content">
                        <span class="h3 text-theme sec-subtitle mb-2 mb-md-0"></span>
                        <h2>Purpose</h2>
                        <p class="pe-xl-2 text-title">To help couples address issues within their relationship, enhance communication, resolve conflicts, and strengthen their bond.


                        </p>
                    </div>
                    <br>
                    <div class="about-content">
                        <span class="h3 text-theme sec-subtitle mb-2 mb-md-0"></span>
                        <h2>Benefits</h2>
                        <h4>Improved Relationship Satisfaction</h4>
                        <p class="pe-xl-2 text-title"> Strengthens the relationship foundation, leading to a more fulfilling partnership.


                        </p>
                        <h4>Understanding and Empathy</h4>
                        <p class="pe-xl-2 text-title">Encourages empathy by fostering a better understanding of each partner’s perspective and feelings.


                        </p>
                        <h4>Long-Term Tools for Success</h4>
                        <p class="pe-xl-2 text-title">Provides skills that can help couples navigate future challenges together.



                        </p>
                    </div>
                </div>

                <div class="col-xl-6 mb-30 mb-xl-0">
                    <div class="about-content">
                        <span class="h3 text-theme sec-subtitle mb-2 mb-md-0"></span>
                        <h2>Focus Areas</h2>

                        <p class="pe-xl-2 text-title"><b>Communication Skills</b> : Teaches effective, non-confrontational ways to express feelings and concerns.

                        </p>

                        <p class="pe-xl-2 text-title"><b>Conflict Resolution </b> : Helps couples work through conflicts in a healthy, constructive manner.


                        </p>

                        <p class="pe-xl-2 text-title"> <b>Intimacy and Connection </b>: Addresses physical and emotional intimacy issues, rebuilding trust and closeness.

                        </p>

                        <p class="pe-xl-2 text-title"> <b>Life Transitions </b>: Offers support for managing significant changes, such as parenting, career shifts, or relocation.


                        </p>
                    </div><br>

                    <div class="about-content">
                        <span class="h3 text-theme sec-subtitle mb-2 mb-md-0"></span>
                        <h2>Considerations</h2>
                        <h4>Mutual Commitment</h4>
                        <p class="pe-xl-2 text-title">Requires dedication from both partners to achieve meaningful progress.


                        </p>

                        <h4>Ongoing Practice</h4>
                        <p class="pe-xl-2 text-title">Techniques learned in sessions often need to be practiced regularly to maintain benefits.


                        </p>

                    </div>
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
