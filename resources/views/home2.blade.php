<!doctype html>
<html class="no-js" lang="zxx">

@include('patient.layout.head')

<body class="">

    <!--==============================
    Mobile Menu
    ============================== -->
    @include('patient.layout.mobile_menu')
    <!--==============================
    Sidemenu
    ============================== -->
    @include('patient.layout.side_menu')
    
    <!--==============================
    Popup Search Box
    ============================== -->
    <div class="popup-search-box d-none d-lg-block  ">
        <button class="searchClose border-theme text-theme"><i class="fal fa-times"></i></button>
        <form action="#">
            <input type="text" class="border-theme" placeholder="What are you looking for">
            <button type="submit"><i class="fal fa-search"></i></button>
        </form>
    </div>
    <!--==============================
        Header Area
    ==============================-->
    @include('patient.layout.home_header')
    <!-- End header-section -->

    <!--==============================
      Hero Area
    ==============================-->
  
    <!-- Hero-sec end -->
    @include('patient.layout.hero_area')

    <!-- service-section-eight -->
    <section class="service-section-eight space">
        <div class="container-style8">
            <div class="row g-0">
                <div class="col-lg-5 col-md-112 col-sm-12">
                    <div class="service-img-eight">
                        <a href="service-details.html" class="ext-box"></a>
                        <img src="{{ asset('patient/img/service/ser8-1.jpg') }}" alt="" >
                        <div class="service-content-eight">
                            <h6 class="title">Bath & Delivery</h6>
                            <p>Specializes in safe maternity care, including prenatal, postnatal <br>& delivery services, ensuring a smooth and healthy childbirth experience.</p>
                        </div>
                        <div class="ser-icon-box v1">
                            <img src="{{ asset('patient/img/service/ser-icon8-1.svg') }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-12 col-sm-12">
                    <div class="row g-0">
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="service-img-eight-v1">
                                <a href="service-details.html" class="ext-box"></a>
                                <img src="{{ asset('patient/img/service/ser8-2.jpg') }}" alt="">
                                <div class="service-content-eight-v1">
                                    <h6 class="title">Laparoscopic <br>(Key hole) surgeries</h6>
                                </div>
                                <div class="ser-icons-two">
                                    <img src="{{ asset('patient/img/service/ser-icon8-2.svg') }}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="service-img-eight-v1 two">
                                <a href="service-details.html" class="ext-box"></a>
                                <img src="{{ asset('patient/img/service/ser8-3.jpg') }}" alt="">
                                <div class="service-content-eight-v1">
                                    <h6 class="title">Gynac Cancers</h6>
                                </div>
                                <div class="ser-icons-two">
                                    <img src="{{ asset('patient/img/service/ser-icon8-3.svg') }}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="service-img-eight-v1 three">
                                <a href="service-details.html" class="ext-box"></a>
                                <img src="{{ asset('patient/img/service/ser8-4.jpg') }}" alt="">
                                <div class="service-content-eight-v1">
                                    <h6 class="title">Cosmetic Gynacology</h6>
                                </div>
                                <div class="ser-icons-two">
                                    <img src="{{ asset('patient/img/service/ser-icon8-4.svg') }}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="service-img-eight-v1 four">
                                <a href="service-details.html" class="ext-box"></a>
                                <img src="{{ asset('patient/img/service/ser8-5.jpg') }}" alt="">
                                <div class="service-content-eight-v1">
                                    <h6 class="title">Contraception &<br> family planning</h6>
                                </div>
                                <div class="ser-icons-two">
                                    <img src="{{ asset('patient/img/service/ser-icon8-5.svg') }}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="service-img-eight-v1 five">
                                <a href="service-details.html" class="ext-box"></a>
                                <img src="{{ asset('patient/img/service/ser8-6.jpg') }}" alt="">
                                <div class="service-content-eight-v1">
                                    <h6 class="title">Physiotherapy Lab &<br> Pathology Services</h6>
                                </div>
                                <div class="ser-icons-two">
                                    <img src="{{ asset('patient/img/service/ser-icon8-6.svg') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- en dservice section -->


    
    <section class="main-section space" data-bg-src="{{ asset('patient/img/bg/ser-bg9-1.jpg') }}">
        <!-- service-section-nine -->
        <div class="service-section-nine">
            <div class="container-style8">
                <div class="title-area-four text-center  wow fadeInUp" data-wow-delay="400ms">
                    <span class="sub-title8">Medical Services</span>
                    <h2>What Facilities We Provided</h2>
                </div>
                <div class="row">
                    <div class="col-lg-5 col-md-12 col-sm-12">
                        <div class="service-tabs">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="gastroenterology-tab" data-bs-toggle="tab" data-bs-target="#gastroenterology" type="button" role="tab" aria-controls="gastroenterology" aria-selected="true"><i class="fa fa-plus"></i>Contraception and family planning</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                <button class="nav-link" id="cardiac-tab" data-bs-toggle="tab" data-bs-target="#cardiac" type="button" role="tab" aria-controls="cardiac" aria-selected="false"><i class="fa fa-plus"></i>Puberty & Adolescent clinic</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                <button class="nav-link" id="paediatrics-tab" data-bs-toggle="tab" data-bs-target="#paediatrics" type="button" role="tab" aria-controls="paediatrics" aria-selected="false"><i class="fa fa-plus"></i>Menopause clinic</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="breast-tab" data-bs-toggle="tab" data-bs-target="#breast" type="button" role="tab" aria-controls="breast" aria-selected="false"><i class="fa fa-plus"></i>Breast Cancer</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="dermatology-tab" data-bs-toggle="tab" data-bs-target="#dermatology" type="button" role="tab" aria-controls="dermatology" aria-selected="false"><i class="fa fa-plus"></i>Sexual health clinic</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="neurology-tab" data-bs-toggle="tab" data-bs-target="#neurology" type="button" role="tab" aria-controls="neurology" aria-selected="false"><i class="fa fa-plus"></i>Sonography Dietician </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="eye-tab" data-bs-toggle="tab" data-bs-target="#eye" type="button" role="tab" aria-controls="eye" aria-selected="false"><i class="fa fa-plus"></i>Physiotherapy Lab & Pathology</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-12 col-sm-12">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="gastroenterology" role="tabpanel" aria-labelledby="gastroenterology-tab">
                                <div class="service-tab-content">
                                    <h4 class="title">Contraception and family planning</h4>
                                    <p>we offer comprehensive contraception and family planning services to help individuals and couples make informed choices about their reproductive health.</p>
                                    <ul class="ser-list-nine">
                                        <li>Personalized Counseling</li>
                                        <li>Comprehensive Options</li>
                                        <li>Family Planning Support</li>
                                        <li>Confidential and Safe Care</li>
                                    </ul>
                                    <a href="#" class="ser-btn-nine">Learn More</a>
                                    <div class="ser-img-nine">
                                        <img src="{{ asset('patient/img/service/ser9-2.png') }}" alt="">
                                        <div class="icon-box"><img src="{{ asset('patient/img/service/ser9-2.svg') }}" class="image" alt=""></div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="cardiac" role="tabpanel" aria-labelledby="cardiac-tab">
                                <div class="service-tab-content">
                                    <h4 class="title">Puberty & Adolescent clinice</h4>
                                    <p>Adolescence is a transformative phase, marked by rapid physical, emotional, and psychological changes. Our Puberty & Adolescent Clinic is dedicated to guiding young individuals and their families through this critical period.</p>
                                    <ul class="ser-list-nine">
                                        <li>Puberty Education</li>
                                        <li>Emotional & Mental Well-being</li>
                                        <li>Nutritional Guidance</li>
                                        <li>Hormonal Health</li>
                                    </ul>
                                    <a href="#" class="ser-btn-nine">Learn More</a>
                                    <div class="ser-img-nine">
                                        <img src="{{ asset('patient/img/service/ser9-2.png') }}" alt="">
                                        <div class="icon-box"><img src="{{ asset('patient/img/service/ser9-2.svg') }}" class="image" alt=""></div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="paediatrics" role="tabpanel" aria-labelledby="paediatrics-tab">
                                <div class="service-tab-content">
                                    <h4 class="title">Menopause clinic</h4>
                                    <p>Menopause is a natural part of aging for women, marking the end of their reproductive years. Our Menopause Clinic is dedicated to providing comprehensive care, support, and education to women during this important transition.</p>
                                    <ul class="ser-list-nine">
                                        <li>Emotional & Psychological Support</li>
                                        <li>Hormonal Therapy Options</li>
                                        <li>Bone Health</li>
                                        <li>Cardiovascular Health</li>
                                    </ul>
                                    <a href="#" class="ser-btn-nine">Learn More</a>
                                    <div class="ser-img-nine">
                                        <img src="{{ asset('patient/img/service/ser9-2.png') }}" alt="">
                                        <div class="icon-box"><img src="{{ asset('patient/img/service/ser9-2.svg') }}" class="image" alt=""></div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="breast" role="tabpanel" aria-labelledby="breast-tab">
                                <div class="service-tab-content">
                                    <h4 class="title">Breast Cancer</h4>
                                    <p>Breast cancer is one of the most common cancers affecting women today. Early detection and proper care can make a significant difference in treatment outcomes.</p>
                                    <ul class="ser-list-nine">
                                        <li>Breast Cancer Screening</li>
                                        <li>Diagnosis & Treatment</li>
                                        <li>Personalized Treatment Plans</li>
                                        <li>Post-Treatment Support</li>
                                    </ul>
                                    <a href="#" class="ser-btn-nine">Learn More</a>
                                    <div class="ser-img-nine">
                                        <img src="{{ asset('patient/img/service/ser9-2.png') }}" alt="">
                                        <div class="icon-box"><img src="{{ asset('patient/img/service/ser9-2.svg') }}" class="image" alt=""></div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="dermatology" role="tabpanel" aria-labelledby="dermatology-tab">
                                <div class="service-tab-content">
                                    <h4 class="title">Sexual health clinic</h4>
                                    <p>Our Sexual Health Clinic is committed to promoting safe, healthy, and informed choices regarding sexual well-being. </p>
                                    <ul class="ser-list-nine">
                                        <li>Sexual Health Education</li>
                                        <li>Contraceptive Counseling</li>
                                        <li>Sexually Transmitted Infections (STIs) Screening</li>
                                        <li>Fertility & Family Planning</li>
                                    </ul>
                                    <a href="#" class="ser-btn-nine">Learn More</a>
                                    <div class="ser-img-nine">
                                        <img src="{{ asset('patient/img/service/ser9-2.png') }}" alt="">
                                        <div class="icon-box"><img src="{{ asset('patient/img/service/ser9-2.svg') }}" class="image" alt=""></div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="neurology" role="tabpanel" aria-labelledby="neurology-tab">
                                <div class="service-tab-content">
                                    <h4 class="title">Sonography Dietician</h4>
                                    <p>Our clinic offers comprehensive Sonography and Dietician services to ensure holistic health care. We combine advanced diagnostic imaging with personalized nutritional advice to help you maintain optimal health and well-being.</p>
                                    <ul class="ser-list-nine">
                                        <li>Pregnancy Ultrasounds</li>
                                        <li>Abdominal Scans</li>
                                        <li>Pelvic Scans</li>
                                        <li>Thyroid Scans</li>
                                    </ul>
                                    <a href="#" class="ser-btn-nine">Learn More</a>
                                    <div class="ser-img-nine">
                                        <img src="{{ asset('patient/img/service/ser9-2.png') }}" alt="">
                                        <div class="icon-box"><img src="{{ asset('patient/img/service/ser9-2.svg') }}" class="image" alt=""></div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="eye" role="tabpanel" aria-labelledby="eye-tab">
                                <div class="service-tab-content">
                                    <h4 class="title">Physiotherapy Lab & Pathology Services</h4>
                                    <p>Our clinic provides a range of Physiotherapy and Pathology services to support diagnosis, treatment, and recovery for a variety of health conditions. </p>
                                    <ul class="ser-list-nine">
                                        <li>Rehabilitation Programs</li>
                                        <li>Pain Management</li>
                                        <li>Posture Correction & Ergonomics</li>
                                        <li>Sports & Fitness Training</li>
                                    </ul>
                                    <a href="#" class="ser-btn-nine">Learn More</a>
                                    <div class="ser-img-nine">
                                        <img src="{{ asset('patient/img/service/ser9-2.png') }}" alt="">
                                        <div class="icon-box"><img src="{{ asset('patient/img/service/ser9-2.svg') }}" class="image" alt=""></div>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End service-section-nine -->
        <!-- service-section-ten -->
        <div class="service-section-ten space pb-0">
            <div class="container-style8">
                <div class="outer-box">
                    <div class="service-block-ten">
                        <div class="ser-icon-ten">
                            <img src="{{ asset('patient/img/service/ser-icon10-1.svg') }}" alt="">
                        </div>
                        <div class="ser-content-ten">
                            <h4 class="title">692</h4>
                            <span>Hospital Beds</span>
                        </div>
                    </div>
                    <div class="service-block-ten">
                        <div class="ser-icon-ten">
                            <img src="{{ asset('patient/img/service/ser-icon10-2.svg') }}" alt="">
                        </div>
                        <div class="ser-content-ten">
                            <h4 class="title">1.478</h4>
                            <span>Outpatients (per day)</span>
                        </div>
                    </div>
                    <div class="service-block-ten">
                        <div class="ser-icon-ten">
                            <img src="{{ asset('patient/img/service/ser-icon10-3.svg') }}" alt="">
                        </div>
                        <div class="ser-content-ten">
                            <h4 class="title">44<span>.478</span></h4>
                            <span>Inpatients (per day)</span>
                        </div>
                    </div>
                    <div class="service-block-ten">
                        <div class="ser-icon-ten">
                            <img src="{{ asset('patient/img/service/ser-icon10-4.svg') }}" alt="">
                        </div>
                        <div class="ser-content-ten">
                            <h4 class="title">20<span>.218</span></h4>
                            <span>Surgeries (per day)</span>
                        </div>
                    </div>
                    <div class="service-block-ten">
                        <div class="ser-icon-ten">
                            <img src="{{ asset('patient/img/service/ser-icon10-5.svg') }}" alt="">
                        </div>
                        <div class="ser-content-ten">
                            <h4 class="title">4.9<span>/5.0</span></h4>
                            <span>Worldwide Rating</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


 <!-- about-section-eight -->
    <section class="about-section-eight space pt-0 space-md-bottom">
        <div class="container-style8">
            <div class="title-area-four text-center  wow fadeInUp" data-wow-delay="400ms">
                <span class="sub-title8">Welcome to Medical Center</span>
                <h2>The Heart And Science Of<br> Medical Test</h2>
            </div>
            <div class="row">
                <div class="col-lg-7 col-md-12 col-sm-12">
                    <div class="about-img-eight">
                        <img src="{{ asset('patient/img/about/ab-8-1.png') }}" alt="">
                        <div class="exp-box-eight">
                            <div class="icon-box"><img src="{{ asset('patient/img/about/abicon1-1.svg') }}" alt=""></div>
                            <div class="exp-content">
                                <h6 class="title">Inpatient Services</h6>
                                <p>It is a long established fact that a reader will be distracted.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-12 col-sm-12">
                    <div class="about-content-eight">
                        <p>We are dedicated to providing comprehensive healthcare services, 
                            specializing in women's health. Our one-stop breast care center is designed to offer seamless,
                             expert-led care for all your needs.
                        </p>
                        <ul class="about-list-eight">
                            <li><i class="fa fa-plus"></i>Women's health services, including one-stop breast care centre</li>
                            <li><i class="fa fa-plus"></i>Internationally acclaimed consultants and multidisciplinary experts</li>
                            <li><i class="fa fa-plus"></i>Expert-led, multi disciplinary teams</li>
                        </ul>
                        <div class="about-contact-box-eight">
                            <div class="icon-box"><img src="{{ asset('patient/img/about/about8-3.svg') }}" alt=""></div>
                            <div class="content-box">
                                <span>Book Appointment</span>
                                <h6><a href="#">+1 (212) 255-5511</a></h6>
                            </div>
                        </div>
                        <a href="#" class="btn-style8 v9">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End about-section-eight -->

    <!-- Skills section -->
    <section class="skills-section">
        <div class="container-style8">
            <div class="row">
                <div class="col-xl-7 col-lg-12 col-md-12 col-sm-12">
                    <div class="skill-content">
                        <div class="title-area-four  wow fadeInUp" data-wow-delay="400ms">
                            <span class="sub-title8 v1">Specialist SKILL</span>
                            <h2>Joining Hands With<br> Techno Easement</h2>
                        </div>
                        <div class="counter-box">
                            <div class="circle-column">
                                <div class="circle_percent" data-percent="80">
                                    <div class="circle_inner">
                                        <div class="round_per"></div>
                                    </div>
                                </div>
                                <h6 class="progress-title">Client Satisfaction</h6>
                            </div>
                            <div class="circle-column">
                                <div class="circle_percent" data-percent="75">
                                    <div class="circle_inner">
                                        <div class="round_per"></div>
                                    </div>
                                </div>
                                <h6 class="progress-title">Medical Success</h6>
                            </div>
                            <div class="circle-column">
                                <div class="circle_percent" data-percent="100">
                                    <div class="circle_inner">
                                        <div class="round_per"></div>
                                    </div>
                                </div>
                                <h6 class="progress-title">Client Referral</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5  col-md-6 col-sm-12">
                    <div class="skill-img">
                        <img src="{{ asset('patient/img/about/skill1-1.jpg') }}" alt="">
                        <img src="{{ asset('patient/img/about/shape1-1.png') }}" class="image" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End skills-section -->

    <!--==============================
    Brand Area
    ==============================-->
    <div class=" brand-section-six">
        <div class="container">
            <div class="brand-slider text-center vs-carousel" data-slide-show="5" data-lg-slide-show="4" data-md-slide-show="3" data-sm-slide-show="2" data-xs-slide-show="1">
                <div class="brand-img-six">
                    <img src="{{ asset('patient/img/brand/brand-6-1.png') }}" alt="image">
                </div>
                <div class="brand-img-six">
                    <img src="{{ asset('patient/img/brand/brand-6-2.png') }}" alt="image">
                </div>
                <div class="brand-img-six">
                    <img src="{{ asset('patient/img/brand/brand-6-3.png') }}" alt="image">
                </div>
                <div class="brand-img-six">
                    <img src="{{ asset('patient/img/brand/brand-6-5.png') }}" alt="image">
                </div>
                <div class="brand-img-six">
                    <img src="{{ asset('patient/img/brand/brand-6-4.png') }}" alt="image">
                </div>
                <div class="brand-img-six">
                    <img src="{{ asset('patient/img/brand/brand-6-1.png') }}" alt="image">
                </div>
                <div class="brand-img-six">
                    <img src="{{ asset('patient/img/brand/brand-6-2.png') }}" alt="image">
                </div>
                <div class="brand-img-six">
                    <img src="{{ asset('patient/img/brand/brand-6-3.png') }}" alt="image">
                </div>
                <div class="brand-img-six">
                    <img src="{{ asset('patient/img/brand/brand-6-5.png') }}" alt="image">
                </div>
                <div class="brand-img-six">
                    <img src="{{ asset('patient/img/brand/brand-6-4.png') }}" alt="image">
                </div>
            </div>
        </div>
    </div>
    <!-- End brand section -->

    <!-- main-section -->
    
    <!-- End main-section -->

    <!-- team-section-two -->
    <section class="team-section-ten space space-md-bottom">
        <div class="container-style8">
            <div class="title-area-four text-center wow fadeInUp" data-wow-delay="400ms">
                <span class="sub-title8">Meet Our Doctors</span>
                <h2>Meet Our Team and Medical<br> Expert Board</h2>
            </div>
            <div class="row">
                <!-- Team block -->
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="400ms">
                    <div class="team-card-ten">
                        <div class="team-img-ten">
                            <img src="{{ asset('patient/img/team/team8-1.jpg') }}" alt="">
                            <span class="share-icon-ten fa fa-share-alt"></span>
                            <div class="social-links-ten">
                                <a href="#"><i class="fab fa-instagram"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-facebook"></i></a>
                            </div>
                        </div>
                        <div class="info-box-ten">
                            <h4 class="name"><a href="#"></a>Dr. Reena Sharma</h4>
                            <span class="designation">Rheumatology</span>
                            <h4 class="number">+1 (212) 255-5511</h4>
                            <span class="date">Monday - Friday 08:00 — 18:00</span>
                        </div>
                    </div>
                </div>

                <!-- Team block -->
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="400ms">
                    <div class="team-card-ten">
                        <div class="team-img-ten">
                            <img src="{{ asset('patient/img/team/team8-1.jpg') }}" alt="">
                            <span class="share-icon-ten fa fa-share-alt"></span>
                            <div class="social-links-ten">
                                <a href="#"><i class="fab fa-instagram"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-facebook"></i></a>
                            </div>
                        </div>
                        <div class="info-box-ten">
                            <h4 class="name"><a href="#">Dr. Minesh Mehta</a></h4>
                            <span class="designation">Intensivist </span>
                            <h4 class="number">+1 (212) 255-5511</h4>
                            <span class="date">Monday - Friday 08:00 — 18:00</span>
                        </div>
                    </div>
                </div>


                <!-- Team block -->
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="400ms">
                    <div class="team-card-ten">
                        <div class="team-img-ten">
                            <img src="{{ asset('patient/img/team/team8-1.jpg') }}" alt="">
                            <span class="share-icon-ten fa fa-share-alt"></span>
                            <div class="social-links-ten">
                                <a href="#"><i class="fab fa-instagram"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-facebook"></i></a>
                            </div>
                        </div>
                        <div class="info-box-ten">
                            <h4 class="name"><a href="#">Dr. Gaurang Modi</a></h4>
                            <span class="designation">Hematologist</span>
                            <h4 class="number">+1 (212) 255-5511</h4>
                            <span class="date">Monday - Friday 08:00 — 18:00</span>
                        </div>
                    </div><br><br><br>
                </div>

                <!-- Team block -->
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="400ms">
                    <div class="team-card-ten">
                        <div class="team-img-ten">
                            <img src="{{ asset('patient/img/team/team8-1.jpg') }}" alt="">
                            <span class="share-icon-ten fa fa-share-alt"></span>
                            <div class="social-links-ten">
                                <a href="#"><i class="fab fa-instagram"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-facebook"></i></a>
                            </div>
                        </div>
                        <div class="info-box-ten">
                            <h4 class="name"><a href="#">Dr. Ashish Mehta</a></h4>
                            <span class="designation">Neonatologist</span>
                            <h4 class="number">+1 (212) 255-5511</h4>
                            <span class="date">Monday - Friday 08:00 — 18:00</span>
                        </div>
                    </div>
                </div>

                <!-- Team block -->
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="400ms">
                    <div class="team-card-ten">
                        <div class="team-img-ten">
                            <img src="{{ asset('patient/img/team/team8-1.jpg') }}" alt="">
                            <span class="share-icon-ten fa fa-share-alt"></span>
                            <div class="social-links-ten">
                                <a href="#"><i class="fab fa-instagram"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-facebook"></i></a>
                            </div>
                        </div>
                        <div class="info-box-ten">
                            <h4 class="name"><a href="#">Dr.Ashish Mahuakar</a></h4>
                            <span class="designation">Paediatric</span>
                            <h4 class="number">+1 (212) 255-5511</h4>
                            <span class="date">Monday - Friday 08:00 — 18:00</span>
                        </div>
                    </div>
                </div>

                <!-- Team block -->
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="400ms">
                    <div class="team-card-ten">
                        <div class="team-img-ten">
                            <img src="{{ asset('patient/img/team/team8-1.jpg') }}" alt="">
                            <span class="share-icon-ten fa fa-share-alt"></span>
                            <div class="social-links-ten">
                                <a href="#"><i class="fab fa-instagram"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-facebook"></i></a>
                            </div>
                        </div>
                        <div class="info-box-ten">
                            <h4 class="name"><a href="#">Dr. Jyotik Bhachech</a></h4>
                            <span class="designation">Psyciatrist</span>
                            <h4 class="number">+1 (212) 255-5511</h4>
                            <span class="date">Monday - Friday 08:00 — 18:00</span>
                        </div>
                    </div>
                </div>

                <!-- Team block -->
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="400ms">
                    <div class="team-card-ten">
                        <div class="team-img-ten">
                            <img src="{{ asset('patient/img/team/team8-1.jpg') }}" alt="">
                            <span class="share-icon-ten fa fa-share-alt"></span>
                            <div class="social-links-ten">
                                <a href="#"><i class="fab fa-instagram"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-facebook"></i></a>
                            </div>
                        </div>
                        <div class="info-box-ten">
                            <h4 class="name"><a href="#">Dr. Mitali Bhachech</a></h4>
                            <span class="designation">Physiotherapist</span>
                            <h4 class="number">+1 (212) 255-5511</h4>
                            <span class="date">Monday - Friday 08:00 — 18:00</span>
                        </div>
                    </div><br><br><br>
                </div>

                <!-- Team block -->
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="400ms">
                    <div class="team-card-ten">
                        <div class="team-img-ten">
                            <img src="{{ asset('patient/img/team/team8-1.jpg') }}" alt="">
                            <span class="share-icon-ten fa fa-share-alt"></span>
                            <div class="social-links-ten">
                                <a href="#"><i class="fab fa-instagram"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-facebook"></i></a>
                            </div>
                        </div>
                        <div class="info-box-ten">
                            <h4 class="name"><a href="#">Dr. Shail Vasavada</a></h4>
                            <span class="designation">Ophthalmologist</span>
                            <h4 class="number">+1 (212) 255-5511</h4>
                            <span class="date">Monday - Friday 08:00 — 18:00</span>
                        </div>
                    </div>
                </div>
                <!-- Team block -->
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="400ms">
                    <div class="team-card-ten">
                        <div class="team-img-ten">
                            <img src="{{ asset('patient/img/team/team8-2.jpg') }}" alt="">
                            <span class="share-icon-ten fa fa-share-alt"></span>
                            <div class="social-links-ten">
                                <a href="#"><i class="fab fa-instagram"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-facebook"></i></a>
                            </div>
                        </div>
                        <div class="info-box-ten">
                            <h4 class="name"><a href="#">Dr. Hetal Shah</a></h4>
                            <span class="designation">Plmonologist</span>
                            <h4 class="number">+1 (212) 255-5511</h4>
                            <span class="date">Monday - Friday 08:00 — 18:00</span>
                        </div>
                    </div>
                </div>
                <!-- Team block -->
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="400ms">
                    <div class="team-card-ten">
                        <div class="team-img-ten">
                            <img src="{{ asset('patient/img/team/team8-3.jpg') }}" alt="">
                            <span class="share-icon-ten fa fa-share-alt"></span>
                            <div class="social-links-ten">
                                <a href="#"><i class="fab fa-instagram"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-facebook"></i></a>
                            </div>
                        </div>
                        <div class="info-box-ten">
                            <h4 class="name"><a href="#">Dr. Sanket Mankad</a></h4>
                            <span class="designation">Infectious Disease</span>
                            <h4 class="number">+1 (212) 255-5511</h4>
                            <span class="date">Monday - Friday 08:00 — 18:00</span>
                        </div>
                    </div>
                </div>
                <!-- Team block -->
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="400ms">
                    <div class="team-card-ten">
                        <div class="team-img-ten">
                            <img src="{{ asset('patient/img/team/team8-4.jpg') }}" alt="">
                            <span class="share-icon-ten fa fa-share-alt"></span>
                            <div class="social-links-ten">
                                <a href="#"><i class="fab fa-instagram"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-facebook"></i></a>
                            </div>
                        </div>
                        <div class="info-box-ten">
                            <h4 class="name"><a href="#">Dr. Shruti Khare</a></h4>
                            <span class="designation">Endocrinologost</span>
                            <h4 class="number">+1 (212) 255-5511</h4>
                            <span class="date">Monday - Friday 08:00 — 18:00</span>
                        </div>
                    </div>
                </div>

                        <!-- Team block -->
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="400ms">
                    <div class="team-card-ten">
                        <div class="team-img-ten">
                            <img src="{{ asset('patient/img/team/team8-1.jpg') }}" alt="">
                            <span class="share-icon-ten fa fa-share-alt"></span>
                            <div class="social-links-ten">
                                <a href="#"><i class="fab fa-instagram"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-facebook"></i></a>
                            </div>
                        </div>
                        <div class="info-box-ten">
                            <h4 class="name"><a href="#">Dr. Girish Patel</a></h4>
                            <span class="designation">Fetal medicine</span>
                            <h4 class="number">+1 (212) 255-5511</h4>
                            <span class="date">Monday - Friday 08:00 — 18:00</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End team-section-two -->

    <!-- testimonial-section-eight -->
    <section class="testimonial-section-eight space pt-0">
        <div class="container-style8">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="testi-content-eight">
                        <div class="title-area-four">
                            <span class="sub-title8 v1">Patient Feedback & Reviews</span>
                            <h2>Patient Reviews</h2>
                        </div>
                        <div class="testi-slider-eight">
                            <div class="testi-info-eight">
                                <p>Amet eget facilisis tellus lacus massa mae cenas luctus non. Suspendisse erat 
                                    eu vulputate in at. Fermentum sed lobortis vulputate varius eget nu llam metus mollis.

                                </p>
                                <div class="testi-auther-eight">
                                    <h4 class="title">Rolina Oliva</h4>
                                    <span class="designation">Heart Patient</span>
                                </div>
                            </div>
                            <div class="testi-info-eight">
                                <p>Amet eget facilisis tellus lacus massa mae cenas luctus non. Suspendisse erat 
                                    eu vulputate in at. Fermentum sed lobortis vulputate varius eget nu llam metus mollis.

                                </p>
                                <div class="testi-auther-eight">
                                    <h4 class="title">Rolina Oliva</h4>
                                    <span class="designation">Heart Patient</span>
                                </div>
                            </div>
                            <div class="testi-info-eight">
                                <p>Amet eget facilisis tellus lacus massa mae cenas luctus non. Suspendisse erat 
                                    eu vulputate in at. Fermentum sed lobortis vulputate varius eget nu llam metus mollis.

                                </p>
                                <div class="testi-auther-eight">
                                    <h4 class="title">Rolina Oliva</h4>
                                    <span class="designation">Heart Patient</span>
                                </div>
                            </div>
                        </div>
                        <div id="slidenav4" class="custom-arrows-eight"></div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <form action="#" class="form-wrap4">
                        <div class="testi-form-title">
                            <div class="icon-box"><img src="{{ asset('patient/img/testimonial/testi8-1.svg') }}" alt=""></div>
                            <div class="content-box">
                                <h4 class="title">Book An Appointment</h4>
                                <span>Please Call Us To Ensure</span>
                            </div>
                        </div>
                        <div class="form-box-three">
                            <div class="row">
                                <div class="col-lg-12 col-md-6 form-group wow fadeInUp" data-wow-delay="400ms">
                                    <select class="form-select">
                                        <option hidden disabled selected>Type of Service</option>
                                        <option>Aerospace Medicine</option>
                                        <option>Bariatric Surgery</option>
                                        <option>Infectious Diseases</option>
                                        <option>Laboratory Medicine</option>
                                    </select>
                                </div>
                                <div class="col-lg-6 col-md-6 form-group wow fadeInUp" data-wow-delay="400ms">
                                    <input type="text" class=" dateTime-pick form-control" placeholder="Date">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <div class="col-lg-6 col-md-6 form-group wow fadeInUp" data-wow-delay="500ms">
                                    <input type="text" class="form-control" placeholder="Time">
                                    <i class="fa fa-clock"></i>
                                </div>
                                <div class="col-lg-6 col-md-6 form-group wow fadeInUp" data-wow-delay="600ms">
                                    <input type="text" class=" form-control" placeholder="Name">
                                </div>
                                <div class="col-lg-6 col-md-6 form-group wow fadeInUp" data-wow-delay="600ms">
                                    <input type="text" class="form-control" placeholder="Email">
                                </div>
                                <div class="col-lg-12 col-md-6 form-group wow fadeInUp" data-wow-delay="600ms">
                                    <input type="text" class="form-control" placeholder="Phone No">
                                </div>
                                <div class="col-xl-6 col-lg-7 col-md-6 col-sm-6 form-group mb-0 wow fadeInUp" data-wow-delay="600ms">
                                    <button type="submit" class="btn-style8 v10">Make Appointment</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- End testimonial-section-eight -->

    <!-- review-section -->
    <section class="review-section space" data-bg-src="{{ asset('patient/img/bg/review-bg.jpg') }}">  
        <div class="container-style8">
            <div class="row">
                <div class="col-xl-7 col-lg-12 col-md-12 col-sm-12">
                    <div class="title-area-four v1 light review">
                        <span class="sub-title8 v1">Patient Feedback & Reviews</span>
                        <h2>Where your family can turn to the experts</h2>
                    </div>
                    <div class="review-content">
                        <ul class="review-list">
                            <li><i class="fa fa-check-circle"></i>Planning Your Visit</li>
                            <li><i class="fa fa-check-circle"></i>Clinical Trials </li>
                        </ul>
                        <ul class="review-list">
                            <li><i class="fa fa-check-circle"></i>Visitor Resources</li>
                            <li><i class="fa fa-check-circle"></i>Pharmacy</li>
                        </ul>
                    </div>
                    <a href="#" class="btn-style8 v11">View All Location</a>
                </div>
                <div class="col-xl-5 col-lg-12 col-md-12 col-sm-12">
                    <div class="map-img">
                        <img src="{{ asset('patient/img/medicals/map.png') }}" alt="">
                        <div class="location-img">
                            <img src="{{ asset('patient/img/medicals/location1-1.png') }}" alt="">
                            <div class="map-popup">
                                <h6 class="title">Medical Hospital</h6>
                                <span>800 Rose St. Fourth Floor Lexington, KY 40536</span>
                            </div>
                        </div>
                        <div class="location-img-two">
                            <img src="{{ asset('patient/img/medicals/location1-2.png') }}" alt="">
                            <div class="map-popup">
                                <h6 class="title">Medical Hospital</h6>
                                <span>800 Rose St. Fourth Floor Lexington, KY 40536</span>
                            </div>
                        </div>
                        <div class="location-img-three">
                            <img src="{{ asset('patient/img/medicals/location1-3.png') }}" alt="">
                            <div class="map-popup">
                                <h6 class="title">Medical Hospital</h6>
                                <span>800 Rose St. Fourth Floor Lexington, KY 40536</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End review-section -->

    <!--==============================
    Blog Area
    ==============================-->
    <section class="vs-blog-wrapper-eight space">
        <div class="container-style8">
            <div class="row  text-center justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-6 wow fadeIn" data-wow-delay="400ms">
                    <div class="title-area-four text-center">
                        <span class="sub-title8">News & Updates</span>
                        <h2>Recent Articles</h2>
                    </div>
                </div>
            </div>
            <div class="row vs-carousel wow fadeInUp" data-wow-delay="0.3s" data-slide-show="3" data-lg-slide-show="2">
                <div class="col-xl-4 wow fadeInUp" data-wow-delay="400ms">
                    <div class="vs-blog blog-card-eight">
                        <div class="blog-img-eight">
                            <img src="{{ asset('patient/img/blog/b-8-1.jpg') }}" alt="Blog Image" class="w-100">
                            <div class="blog-date-eight">
                                <span>Health Care</span>
                            </div>
                            <div class="blog-meta-eight">
                                <a href="blog.html"><i class="fa fa-calendar"></i>February 28, 2023</a>
                                <a href="blog.html"><i class="fa fa-comment"></i>14</a>
                            </div>
                        </div>
                        <div class="blog-content-eight">
                            <h3 class="blog-title h5 font-body lh-base"><a href="blog.html">These blood markers may indicate a higher risk.</a></h3>
                            <p>Duis aute irure dolor in reprehe nderit in volu ptate velit esse a cilm.</p>
                            <a href="blog.html" class="review-btn-two wow fadeInUp animated">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 wow fadeInUp" data-wow-delay="500ms">
                    <div class="vs-blog blog-card-eight">
                        <div class="blog-img-eight">
                            <img src="{{ asset('patient/img/blog/b-8-2.jpg') }}" alt="Blog Image" class="w-100">
                            <div class="blog-date-eight">
                                <span>Health Care</span>
                            </div>
                            <div class="blog-meta-eight">
                                <a href="blog.html"><i class="fa fa-calendar"></i>February 28, 2023</a>
                                <a href="blog.html"><i class="fa fa-comment"></i>14</a>
                            </div>
                        </div>
                        <div class="blog-content-eight">
                            <h3 class="blog-title h5 font-body lh-base"><a href="blog.html">These blood markers may indicate a higher risk.</a></h3>
                            <p>Duis aute irure dolor in reprehe nderit in volu ptate velit esse a cilm.</p>
                            <a href="blog.html" class="review-btn-two wow fadeInUp animated">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 wow fadeInUp" data-wow-delay="600ms">
                    <div class="vs-blog blog-card-eight">
                        <div class="blog-img-eight">
                            <img src="{{ asset('patient/img/blog/b-8-3.jpg') }}" alt="Blog Image" class="w-100">
                            <div class="blog-date-eight">
                                <span>Health Care</span>
                            </div>
                            <div class="blog-meta-eight">
                                <a href="blog.html"><i class="fa fa-calendar"></i>February 28, 2023</a>
                                <a href="blog.html"><i class="fa fa-comment"></i>14</a>
                            </div>
                        </div>
                        <div class="blog-content-eight">
                            <h3 class="blog-title h5 font-body lh-base"><a href="blog.html">These blood markers may indicate a higher risk.</a></h3>
                            <p>Duis aute irure dolor in reprehe nderit in volu ptate velit esse a cilm.</p>
                            <a href="blog.html" class="review-btn-two wow fadeInUp animated">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 wow fadeInUp" data-wow-delay="700ms">
                    <div class="vs-blog blog-card-eight">
                        <div class="blog-img-eight">
                            <img src="{{ asset('patient/img/blog/b-8-1.jpg') }}" alt="Blog Image" class="w-100">
                            <div class="blog-date-eight">
                                <span>Health Care</span>
                            </div>
                            <div class="blog-meta-eight">
                                <a href="blog.html"><i class="fa fa-calendar"></i>February 28, 2023</a>
                                <a href="blog.html"><i class="fa fa-comment"></i>14</a>
                            </div>
                        </div>
                        <div class="blog-content-eight">
                            <h3 class="blog-title h5 font-body lh-base"><a href="blog.html">These blood markers may indicate a higher risk.</a></h3>
                            <p>Duis aute irure dolor in reprehe nderit in volu ptate velit esse a cilm.</p>
                            <a href="blog.html" class="review-btn-two wow fadeInUp animated">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 wow fadeInUp" data-wow-delay="800ms">
                    <div class="vs-blog blog-card-eight">
                        <div class="blog-img-eight">
                            <img src="{{ asset('patient/img/blog/b-8-2.jpg') }}" alt="Blog Image" class="w-100">
                            <div class="blog-date-eight">
                                <span>Health Care</span>
                            </div>
                            <div class="blog-meta-eight">
                                <a href="blog.html"><i class="fa fa-calendar"></i>February 28, 2023</a>
                                <a href="blog.html"><i class="fa fa-comment"></i>14</a>
                            </div>
                        </div>
                        <div class="blog-content-eight">
                            <h3 class="blog-title h5 font-body lh-base"><a href="blog.html">These blood markers may indicate a higher risk.</a></h3>
                            <p>Duis aute irure dolor in reprehe nderit in volu ptate velit esse a cilm.</p>
                            <a href="blog.html" class="review-btn-two wow fadeInUp animated">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 wow fadeInUp" data-wow-delay="900ms">
                    <div class="vs-blog blog-card-eight">
                        <div class="blog-img-eight">
                            <img src="{{ asset('patient/img/blog/b-8-3.jpg') }}" alt="Blog Image" class="w-100">
                            <div class="blog-date-eight">
                                <span>Health Care</span>
                            </div>
                            <div class="blog-meta-eight">
                                <a href="blog.html"><i class="fa fa-calendar"></i>February 28, 2023</a>
                                <a href="blog.html"><i class="fa fa-comment"></i>14</a>
                            </div>
                        </div>
                        <div class="blog-content-eight">
                            <h3 class="blog-title h5 font-body lh-base"><a href="blog.html">These blood markers may indicate a higher risk.</a></h3>
                            <p>Duis aute irure dolor in reprehe nderit in volu ptate velit esse a cilm.</p>
                            <a href="blog.html" class="review-btn-two wow fadeInUp animated">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="btn-box-eight">
                <a href="#" class="btn-style8 v12">View All News</a>
            </div>
        </div>
    </section>
    <!-- End blog-section -->

    <!-- contact-info-section -->
    <section class="contact-info-section-two">
        <div class="container-style8">
            <div class="outer-box" data-bg-src="{{ asset('patient/img/bg/blog-bg2-1.jpg') }}">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="contact-box-two">
                            <div class="icon-box"><img src="{{ asset('patient/img/blog/contact3-1.svg') }}" alt=""></div>
                            <h4 class="title">Subscribe <br>Newsletter</h4>
                            <a href="#" class="blog-btn-two">Sign Up Now</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="contact-box-two">
                            <div class="icon-box"><img src="{{ asset('patient/img/blog/contact3-2.svg') }}" alt=""></div>
                            <sub> Appointment</sub>
                            <h4 class="title two">+1 47820 803575</h4>
                            <span>Available 24 hours every day</span>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="contact-box-two">
                            <div class="icon-box"><img src="{{ asset('patient/img/blog/contact3-3.svg') }}" alt=""></div>
                            <h4 class="title">Map Location &<br> Directions</h4>
                            <a href="#" class="blog-btn-two">Get Direction</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End-contact-info-section -->

    <!--==============================
			Footer Area
	==============================-->
    @include('patient.layout.footer')

    <!--********************************
			Code End  Here 
	******************************** -->

    <!-- Scroll To Top -->
    <a href="#" class="scrollToTop scroll-bottom  style2"><i class="fas fa-arrow-alt-up"></i></a>
      
    <!--==============================
        All Js File
    ============================== -->
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