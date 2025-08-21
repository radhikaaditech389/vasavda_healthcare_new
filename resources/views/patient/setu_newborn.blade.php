<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Newborn Care - Vasavada womens hospital Bopal</title>
    <meta name="author" content="Vasavada Women's Hospital">
    <meta name="description" content="Newborn Care at best womens hospital bopal by lady gynecologist bopal">
    <meta name="keywords" content="Womens hospital bopal, Women's hospital bopal, gynecologist bopal, lady gynecologist bopal, womens hospital near by, gynecologist near by, lady gynecologist near by">
    <link rel="canonical" href="https://www.vasavadahospitals.org/setu_newborn/" />
    @include('patient.layout.head')
</head>

<body class="">
    @include('patient.layout.mobile_menu')
    @include('patient.layout.side_menu')
    @include('patient.layout.header', ['footer' => $footer])
    <div class="breadcumb-wrapper " style="margin-top: -30px !important;">
        <div class="parallax" data-parallax-image="{{ asset('patient/img/breadcurmb/doctors.jpg') }}"></div>
        <div class="container z-index-common">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title" style="-webkit-text-stroke: 2px black;
    -webkit-text-fill-color: #702840; ">Paediatric Team</h1>
                <div class="breadcumb-menu-wrap">
                    <i class="far fa-home-lg"></i>
                    <ul class="breadcumb-menu">
                        <li><a href="/">Home</a></li>
                        <li class="active">Paediatric Team</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>




    <section id="pregnancy-section" class="vs-accordion-wrapper space-top space-md-bottom">
        <div class="container">
            <div class="title-area-four text-center  wow fadeInUp" data-wow-delay="400ms">
                <span class="sub-title8"><h2> Our Paediatric Team
</h2></span>
            </div>
            <div class="row">
                <div class="col-xl-6">
                    <div class="vs-accordion accordion accordion-style2" id="vsaccordion">

                        <div class="accordion-item">
                            <h2 class="accordion-header">

                            </h2>
                            <p>Setu Newborn Care Centre is led by a team of Consultant Neonatologists- all of whom have been
                                trained in the UK and India and have worked as a Consultant in the UK. All of them have been accredited
                                 by Royal College of Paediatrics and Child Health, London with Certified Specialist Training in Neonatal Medicine (CCST).

                            </p>
                            <p>
                                After completion of their certified neonatal training each of them has worked further in important subspecialties of Neonatology, which makes them a unique team of Neonatologists.
                            </p>

                        </div>


                    </div>
                    <br>
                    <img src="{{ asset('patient/img/about/pediatric.png') }}" alt="Service Image" style="width: 550px; height: 300px;">
                </div>
                <div class="col-xl-6">
                    <div class="vs-accordion accordion accordion-style2" id="vsaccordion">

                        <div class="accordion-item">
                            <h2 class="accordion-header">


                            </h2>
                            <p>We have a state-of-the-art NICU (Neonatal Intensive Care Unit) equipped with latest ventilators, CPAP machines, Nitric oxide, multichannel monitors, incubators, open care warmers, phototherapy lights, in house blood gas machine, TPN laminar flow and an ultrasound machine.
                            </p>
                            <p>We are the first unit in Gujarat to have facilities for Cooling machine and Cerebral Function Monitor for infants with Hypoxic Ischaemic Encephalopathy which is a big step towards increasing intact survival.
                            </p>
                            <p>We have provision for 25 intensive care beds in our NICU and a further 15 beds in the SCBU (Special Care Baby Unit). We have our own fuly equipped ambulance and a newborn transport trolley with newborn transport ventilator. </p>
                            <p>
                                The transport team is led by a dedicated Transport Consultant. We also have a babypod system, which is specifically designed for interhospital transfer. We strongly promote Kangaroo mother care and developmental care and provide the positioning aids for keeping the babies comfortable. We have 3 luxury rooms for mothers and a separate room for breast feeding as well as storage of breast milk.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>










       <!-- Repeat for other doctors -->
    <!-- Copy the above modal structure for each doctor, changing the id and content -->
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

    <script>
        $(document).ready(function() {
            // Initialize all modals
            var myModals = document.querySelectorAll('.modal');
            myModals.forEach(function(modal) {
                new bootstrap.Modal(modal);
            });
        });
    </script>


</body>

</html>
