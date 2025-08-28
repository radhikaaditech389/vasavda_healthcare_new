<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Home Care - Vasavada womens hospital Bopal</title>
    <meta name="author" content="Vasavada Women's Hospital">
    <meta name="description" content="Home Care at top womens hospital bopal and lady gynecologist bopal">
    <meta name="keywords"
        content="Home Care bopal, Womens hospital bopal, Women's hospital bopal, gynecologist bopal, lady gynecologist bopal, womens hospital near by, gynecologist near by, lady gynecologist near by">
    <link rel="canonical" href="https://www.vasavadahospitals.org/home_care" />
    @include('patient.layout.head')
</head>

<body class="">
    @include('patient.layout.mobile_menu')
    @include('patient.layout.side_menu')
    @include('patient.layout.header', ['footer' => $footer])
    <div class="breadcumb-wrapper " style="margin-top: -30px !important;">
        <div class="parallax" data-parallax-image="{{ asset('patient/img/breadcurmb/homecare.jpg') }}"></div>
        <div class="container z-index-common">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title"
                    style="-webkit-text-stroke: 2px black;
    -webkit-text-fill-color: #702840; ">Home Care</h1>
                <div class="breadcumb-menu-wrap">
                    <i class="far fa-home-lg"></i>
                    <ul class="breadcumb-menu">
                        <li><a href="/">Home</a></li>
                        <li class="active">Home Care</li>
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
                    {{-- <span class="sub-title8">Key Types of Cancer in</span> --}}
                    <h2>Home Care</h2>
                </div>
                <div class="row">
                    <div class="col-lg-5 col-md-12 col-sm-12">
                        <div class="service-tabs">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pharmacy-tab" data-bs-toggle="tab"
                                        data-bs-target="#pharmacy" type="button" role="tab"
                                        aria-controls="pharmacy" aria-selected="true"><i
                                            class="fa fa-plus"></i>Pharmacy</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="laboratory-tab" data-bs-toggle="tab"
                                        data-bs-target="#laboratory" type="button" role="tab"
                                        aria-controls="laboratory" aria-selected="false"><i
                                            class="fa fa-plus"></i>Laboratory</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="nursingcare-tab" data-bs-toggle="tab"
                                        data-bs-target="#nursingcare" type="button" role="tab"
                                        aria-controls="nursingcare" aria-selected="false"><i
                                            class="fa fa-plus"></i>Nursing Care</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="attendantcare-tab" data-bs-toggle="tab"
                                        data-bs-target="#attendantcare" type="button" role="tab"
                                        aria-controls="attendantcare" aria-selected="false"><i
                                            class="fa fa-plus"></i>Attendant Care</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="doctoroncall-tab" data-bs-toggle="tab"
                                        data-bs-target="#doctoroncall" type="button" role="tab"
                                        aria-controls="doctoroncall" aria-selected="false"><i
                                            class="fa fa-plus"></i>Doctor on Call</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="vaccination-tab" data-bs-toggle="tab"
                                        data-bs-target="#vaccination" type="button" role="tab"
                                        aria-controls="vaccination" aria-selected="false"><i
                                            class="fa fa-plus"></i>Vaccination</button>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-12 col-sm-12">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="pharmacy" role="tabpanel"
                                aria-labelledby="pharmacy-tab">
                                <div class="service-tab-content">
                                    <h4 class="title">Pharmacy</h4>
                                    <p> <b>Purpose:</b>To deliver prescribed medications and health supplies directly to
                                        patients’ homes, ensuring continuity of care without the need for pharmacy
                                        visits. </p>

                                    <a href="#pharmacy-section" class="ser-btn-nine">Learn More</a>
                                    <div class="ser-img-nine">
                                        <img src="{{ asset('patient/img/service/Pharmacist filling prescription in pharmacy.jpg') }}"
                                            alt="">
                                        <div class="icon-box"><img src="{{ asset('patient/img/service/ser9-2.svg') }}"
                                                class="image" alt=""></div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="laboratory" role="tabpanel"
                                aria-labelledby="laboratory-tab">
                                <div class="service-tab-content">
                                    <h4 class="title">Laboratory</h4>
                                    <p><b>Purpose:</b> To offer diagnostic services at home, including sample collection
                                        for various tests, allowing patients to receive accurate results without
                                        visiting a lab.</p>

                                    <a href="#laboratory-section" class="ser-btn-nine">Learn More</a>
                                    <div class="ser-img-nine">
                                        <img src="{{ asset('patient/img/about/LabMachines.jpg') }}" alt="">
                                        <div class="icon-box"><img src="{{ asset('patient/img/service/ser9-2.svg') }}"
                                                class="image" alt=""></div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nursingcare" role="tabpanel"
                                aria-labelledby="nursingcare-tab">
                                <div class="service-tab-content">
                                    <h4 class="title">Nursing Care</h4>
                                    <p><b>Purpose:</b> To provide professional nursing services at home for patients
                                        recovering from surgeries, managing chronic conditions, or needing regular
                                        monitoring. </p>

                                    <a href="#nursingcare-section" class="ser-btn-nine">Learn More</a>
                                    <div class="ser-img-nine">
                                        <img src="{{ asset('patient/img/about/nursing-care.png') }}" alt="">
                                        <div class="icon-box"><img src="{{ asset('patient/img/service/ser9-2.svg') }}"
                                                class="image" alt=""></div>
                                    </div>
                                </div>
                            </div>


                            <div class="tab-pane fade" id="attendantcare" role="tabpanel"
                                aria-labelledby="attendantcare-tab">
                                <div class="service-tab-content">
                                    <h4 class="title">Attendant Care</h4>
                                    <p><b>Purpose:</b> To provide non-medical assistance for daily activities, helping
                                        patients with mobility issues or those who need support with basic care. </p>

                                    <a href="#attendantcare-section" class="ser-btn-nine">Learn More</a>
                                    <div class="ser-img-nine">
                                        <img src="{{ asset('patient/img/service/attendant_care_960X792.jpg') }}"
                                            alt="">
                                        <div class="icon-box"><img src="{{ asset('patient/img/service/ser9-2.svg') }}"
                                                class="image" alt=""></div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="doctoroncall" role="tabpanel"
                                aria-labelledby="doctoroncall-tab">
                                <div class="service-tab-content">
                                    <h4 class="title">Doctor on Call</h4>
                                    <p><b>Purpose:</b> To provide on-demand medical consultations and treatments at
                                        home, often for non-emergency needs or routine follow-ups. </p>

                                    <a href="#doctoroncall-section" class="ser-btn-nine">Learn More</a>
                                    <div class="ser-img-nine">
                                        <img src="{{ asset('patient/img/service/doctor_on_call (2).jpg') }}"
                                            alt="">
                                        <div class="icon-box"><img
                                                src="{{ asset('patient/img/service/ser9-2.svg') }}" class="image"
                                                alt=""></div>
                                    </div>
                                </div>
                            </div>


                            <div class="tab-pane fade" id="vaccination" role="tabpanel"
                                aria-labelledby="vaccination-tab">
                                <div class="service-tab-content">
                                    <h4 class="title">Vaccination</h4>
                                    <p><b>Purpose:</b> To provide vaccination services at home, ensuring safety and
                                        accessibility, particularly for young children, elderly individuals, or those
                                        with limited mobility. </p>

                                    <a href="#vaccination-section" class="ser-btn-nine">Learn More</a>
                                    <div class="ser-img-nine">
                                        <img src="{{ asset('patient/img/about/vaccination.jpg') }}" alt="">
                                        <div class="icon-box"><img
                                                src="{{ asset('patient/img/service/ser9-2.svg') }}" class="image"
                                                alt=""></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="pharmacy-section" class="vs-accordion-wrapper space-top space-md-bottom">
        <div class="container">
            <div class="title-area-four text-center  wow fadeInUp" data-wow-delay="400ms">
                <span class="sub-title8">
                    <h2>Pharmacy</h2>
                </span>
            </div>
            <div class="row">
                <div class="col-xl-6">
                    <div class="vs-accordion accordion accordion-style2" id="vsaccordion">

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                Purpose
                            </h2>
                            <p> To deliver prescribed medications and health supplies directly to patients’ homes,
                                ensuring continuity of care without the need for pharmacy visits</p>

                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                Services
                            </h2>
                            <p>
                            <h6>Prescription Delivery:</h6> Convenient, on-time delivery of prescribed medications to
                            ensure patients have uninterrupted access.</p>
                            <p>
                            <h6>Refill Reminders:</h6>Regular reminders for medication refills, helping patients adhere
                            to treatment plans.</p>
                            <p>
                            <h6>Consultation Support:</h6> Pharmacists available for consultation regarding dosage, side
                            effects, and medication interactions.</p>

                        </div>
                    </div>
                    <br>
                    <img src="{{ asset('patient/img/service/Pharmacist filling prescription in pharmacy.jpg') }}"
                        alt="Service Image" style="width: 550px; height: 300px;">
                </div>
                <div class="col-xl-6">
                    <div class="vs-accordion accordion accordion-style2" id="vsaccordion">

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                Benefits
                            </h2>
                            <p>
                            <h6>Convenience:</h6>Reduces the need to visit pharmacies, especially beneficial for the
                            elderly and patients with mobility issues.</p>
                            <p>
                            <h6>Enhanced Compliance:</h6>Regular refills and reminders improve medication adherence,
                            essential for chronic conditions.</p>

                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                Considerations
                            </h2>
                            <p>
                            <h6>Prescription Verification:</h6>Delivery typically requires a valid prescription, and
                            orders are verified for accuracy and safety.</p>
                            <p>
                            <h6>Availability:</h6>Some medications may not be available for delivery due to regulations,
                            requiring consultation.</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section id="laboratory-section" class="vs-accordion-wrapper space-top space-md-bottom">
        <div class="container">
            <div class="title-area-four text-center  wow fadeInUp" data-wow-delay="400ms">
                <span class="sub-title8">
                    <h2>Laboratory</h2>
                </span>
            </div>
            <div class="row">
                <div class="col-xl-6">
                    <div class="vs-accordion accordion accordion-style2" id="vsaccordion">

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                Purpose
                            </h2>
                            <p>To offer diagnostic services at home, including sample collection for various tests,
                                allowing patients to receive accurate results without visiting a lab. </p>

                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                Services
                            </h2>
                            <p><b>Sample Collection at Home:</b> Blood, urine, and other samples are collected by
                                trained professionals and sent for testing.</p>
                            <p><b>Diagnostic Testing:</b> Includes a range of tests like blood glucose, lipid profiles,
                                kidney and liver function tests, and COVID-19 testing.</p>
                            <p><b>Digital Report Access:</b>Results are often shared digitally, allowing for easy access
                                by patients and their doctors.</p>
                        </div>
                    </div>
                    <br>
                    <img src="{{ asset('patient/img/about/LabMachines(2).jpg') }}" alt="Service Image"
                        style="width: 550px; height: 300px;">
                </div>
                <div class="col-xl-6">
                    <div class="vs-accordion accordion accordion-style2" id="vsaccordion">

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                Benefits
                            </h2>
                            <p>
                            <h6>Convenience and Comfort:</h6>Allows for testing without leaving home, reducing exposure
                            risks, especially for immunocompromised patients.</p>
                            <p>
                            <h6>Timely Results:</h6>Quick turnaround of results, often accessible online or via mobile
                            apps.</p>

                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                Considerations
                            </h2>
                            <p>
                            <h6>Fasting Requirements:</h6>Some tests require fasting or specific preparations, which are
                            explained to patients before sample collection.</p>
                            <p>
                            <h6>Accuracy and Certification:</h6>Labs should be accredited to ensure quality and accuracy
                            of results.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="nursingcare-section" class="vs-accordion-wrapper space-top space-md-bottom">
        <div class="container">
            <div class="title-area-four text-center  wow fadeInUp" data-wow-delay="400ms">
                <span class="sub-title8">
                    <h2>Nursing Care</h2>
                </span>
            </div>
            <div class="row">
                <div class="col-xl-6">
                    <div class="vs-accordion accordion accordion-style2" id="vsaccordion">

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                Purpose
                            </h2>
                            <p>To provide professional nursing services at home for patients recovering from surgeries,
                                managing chronic conditions, or needing regular monitoring. </p>

                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                Services
                            </h2>
                            <p><b>Wound Care and Dressing Changes:</b>Skilled care for post-surgical wounds, bed sores,
                                and injuries.</p>
                            <p><b>Vital Sign Monitoring:</b>Regular checks of blood pressure, heart rate, oxygen levels,
                                and more.</p>
                            <p><b>Chronic Disease Management:</b>Support for patients with diabetes, hypertension, and
                                other conditions requiring regular observation.</p>
                        </div>
                    </div>
                    <br>
                    <img src="{{ asset('patient/img/service/nursing_care.jpg') }}" alt="Service Image"
                        style="width: 550px; height: 300px;">
                </div>
                <div class="col-xl-6">
                    <div class="vs-accordion accordion accordion-style2" id="vsaccordion">

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                Benefits
                            </h2>
                            <p>
                            <h6>Expert Care at Home:</h6>Offers patients skilled nursing care without the need to stay
                            in a hospital.</p>
                            <p>
                            <h6>Enhanced Recovery:</h6>Proper in-home care supports faster recovery, especially after
                            surgeries.</p>

                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                Considerations
                            </h2>
                            <p>
                            <h6>Customized Care Plans:</h6>Nursing services are often personalized based on medical
                            needs, requiring consultation.</p>
                            <p>
                            <h6>Coordination with Doctors:</h6>Nurses frequently coordinate with the patient’s doctor to
                            ensure continuity and accuracy of care.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="attendantcare-section" class="vs-accordion-wrapper space-top space-md-bottom">
        <div class="container">
            <div class="title-area-four text-center  wow fadeInUp" data-wow-delay="400ms">
                <span class="sub-title8">
                    <h2>Attendant Care</h2>
                </span>
            </div>
            <div class="row">
                <div class="col-xl-6">
                    <div class="vs-accordion accordion accordion-style2" id="vsaccordion">

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                Purpose
                            </h2>
                            <p>To provide non-medical assistance for daily activities, helping patients with mobility
                                issues or those who need support with basic care. </p>

                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                Services
                            </h2>
                            <p><b>Assistance with Daily Activities:</b>Help with bathing, dressing, eating, and other
                                personal care tasks.</p>
                            <p><b>Mobility Support:</b>Assistance with walking, transferring from bed to wheelchair, and
                                exercise as recommended.</p>
                            <p><b>Companionship:</b>Attendants provide social support, improving the patient’s mental
                                and emotional well-being.</p>
                        </div>
                    </div>
                    <br>
                    <img src="{{ asset('patient/img/service/steptodown.com309316.jpg') }}" alt="Service Image"
                        style="width: 550px; height: 300px;">
                </div>
                <div class="col-xl-6">
                    <div class="vs-accordion accordion accordion-style2" id="vsaccordion">

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                Benefits
                            </h2>
                            <p>
                            <h6>Enhanced Independence:</h6> Supports patients in performing daily activities, allowing
                            them to remain at home comfortably.</p>
                            <p>
                            <h6>Emotional Support:</h6>Reduces isolation by providing companionship and daily
                            interactions.</p>

                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                Considerations
                            </h2>
                            <p>
                            <h6>Training:</h6>Attendants are trained in patient care but do not perform medical tasks.
                            </p>
                            <p>
                            <h6>Compatibility:</h6>Assigning attendants who are compatible with the patient’s needs and
                            personality is crucial for quality care.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section id="doctoroncall-section" class="vs-accordion-wrapper space-top space-md-bottom">
        <div class="container">
            <div class="title-area-four text-center  wow fadeInUp" data-wow-delay="400ms">
                <span class="sub-title8">
                    <h2>Doctor on Call</h2>
                </span>
            </div>
            <div class="row">
                <div class="col-xl-6">
                    <div class="vs-accordion accordion accordion-style2" id="vsaccordion">

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                Purpose
                            </h2>
                            <p>To provide on-demand medical consultations and treatments at home, often for
                                non-emergency needs or routine follow-ups. </p>

                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                Services
                            </h2>
                            <p><b>Routine Check-ups:</b>Regular health checks, vital sign monitoring, and assessments.
                            </p>
                            <p><b>Medical Advice and Diagnosis:</b>Diagnosis and treatment plans for mild symptoms or
                                ongoing conditions.</p>
                            <p><b>Prescriptions:</b>Doctors can prescribe medications, which can often be filled through
                                the home pharmacy service.</p>
                        </div>
                    </div>
                    <br>
                    <img src="{{ asset('patient/img/service/doctor_on_call.jpg') }}" alt="Service Image"
                        style="width: 550px; height: 300px;">
                </div>
                <div class="col-xl-6">
                    <div class="vs-accordion accordion accordion-style2" id="vsaccordion">

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                Benefits
                            </h2>
                            <p>
                            <h6>Immediate Access to Care:</h6>Convenient for patients who need quick medical attention
                            without visiting a clinic.</p>
                            <p>
                            <h6>Reduced Exposure:</h6>Particularly valuable for the elderly or immunocompromised,
                            reducing the risk of exposure in medical settings.</p>

                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                Considerations
                            </h2>
                            <p>
                            <h6>Non-Emergency Care:</h6>Best suited for non-emergency issues. Severe cases may still
                            require hospital visits.</p>
                            <p>
                            <h6>Availability:</h6>Doctor on-call services may vary in availability based on time and
                            location.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="vaccination-section" class="vs-accordion-wrapper space-top space-md-bottom">
        <div class="container">
            <div class="title-area-four text-center  wow fadeInUp" data-wow-delay="400ms">
                <span class="sub-title8">
                    <h2>Vaccination</h2>
                </span>
            </div>
            <div class="row">
                <div class="col-xl-6">
                    <div class="vs-accordion accordion accordion-style2" id="vsaccordion">

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                Purpose
                            </h2>
                            <p>To provide vaccination services at home, ensuring safety and accessibility, particularly
                                for young children, elderly individuals, or those with limited mobility. </p>

                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                Services
                            </h2>
                            <p><b>Routine Immunizations:</b>Vaccines for infants, children, and adults, such as the flu,
                                hepatitis, MMR, and more.</p>
                            <p><b>Travel Vaccinations:</b>Vaccines required for international travel, such as typhoid,
                                should be administered before departure. Additionally, pre-pregnancy vaccinations,
                                pregnancy vaccinations, yearly influenza vaccination, and HPV vaccination are also
                                recommended.</p>
                            <p><b>COVID-19 and Booster Shots:</b>COVID vaccinations and boosters are also provided,
                                helping ensure safe vaccination in a home environment.</p>
                            <p><b>Pre-Pregnancy Vaccinations:</b><br>-Influenza Vaccination<br>-HPV<br>
                        </div>
                    </div>
                    <br>
                    <img src="{{ asset('patient/img/about/vaccination1.jpg') }}" alt="Service Image"
                        style="width: 550px; height: 300px;">
                </div>
                <div class="col-xl-6">
                    <div class="vs-accordion accordion accordion-style2" id="vsaccordion">

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                Benefits
                            </h2>
                            <p>
                            <h6>Convenience and Comfort:</h6>Reduces the need to visit clinics for routine
                            immunizations, especially helpful for parents or elderly individuals.</p>
                            <p>
                            <h6>Reduced Exposure:</h6>Minimizes exposure to potentially sick individuals in clinics,
                            especially important during flu seasons or pandemics.</p>

                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                Considerations
                            </h2>
                            <p>
                            <h6>Proper Storage:</h6>Ensuring vaccines are stored and transported at the right
                            temperatures to maintain efficacy.</p>
                            <p>
                            <h6>Qualified Staff:</h6>Vaccines should only be administered by trained healthcare
                            professionals to ensure proper technique and patient safety.</p>
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

                        These home care services provide comprehensive and compassionate support, making healthcare
                        accessible,
                        convenient, and effective for those in need of regular assistance or those who prefer to receive
                        care at home.
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
