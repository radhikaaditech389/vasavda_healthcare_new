<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Doctors - Vasavada womens hospital Bopal</title>
    <meta name="author" content="Vasavada Women's Hospital">
    <meta name="description" content="Doctors team at best womens hospital bopal and lady gynecologist bopal">
    <meta name="keywords"
        content="Famele Doctor bopal, Womens hospital bopal, Women's hospital bopal, gynecologist bopal, lady gynecologist bopal, womens hospital near by, gynecologist near by, lady gynecologist near by">
    <link rel="canonical" href="https://www.vasavadahospitals.org/doctors" />
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
                <h1 class="breadcumb-title"
                    style="-webkit-text-stroke: 2px black;
    -webkit-text-fill-color: #702840; ">Doctors</h1>
                <div class="breadcumb-menu-wrap">
                    <i class="far fa-home-lg"></i>
                    <ul class="breadcumb-menu">
                        <li><a href="/">Home</a></li>
                        <li class="active">Doctors</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <section class="bg-light2 space-top space-md-bottom">
        <div class="container">
            <div class="section-title text-center wow fadeInUp" data-wow-delay="0.3s">
                <h2 class="sec-title h1"> <span class="inner-text">Our Doctors</span></h2>
                <p class="sec-text">Search or browse by <a href="https://www.vasavadahospitals.org/">womens hospital
                        bopal</a>, treatment or <a href="https://www.vasavadahospitals.org/contact">gynecologist near
                        me</a> to see what can do for you</p>
                <div class="sec-icon2"><img src="{{ asset('patient/img/Logo.png') }}" alt="icon"
                        style="width: 100px; height:80px;"></div>
            </div>

            <style>
                .doctor-profile-card {
                    text-align: center;
                    margin-bottom: 10px;
                }

                .doctor-profile-card img {
                    width: 350px;
                    height: 400px;
                    object-fit: cover;
                    display: block;
                }

                .doctor-profile-card h5 {
                    margin-top: 15px;
                    font-weight: 700;
                    color: #000;
                }

                .doctor-profile-card p {
                    margin: 0;
                    color: #00bcd4;
                    font-weight: 500;
                }

                .doctor-profile-card:hover h5,
                .doctor-profile-card:hover p {
                    color: #00bcd4;
                }

                .doctor-modal .modal-content {
                    border-radius: 12px;
                    overflow: hidden;
                    background: #fff;
                }

                .doctor-modal .modal-header {
                    background: linear-gradient(to right, #2c3e50, #3498db);
                    color: #fff;
                    font-weight: 700;
                    border-bottom: none;
                    padding: 20px 30px;
                }

                .doctor-modal .profile-img {
                    width: 100%;
                    height: 450px;
                    border-radius: 12px;
                    object-fit: cover;
                    margin-bottom: 20px;
                    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
                }

                .doctor-modal .info-card {
                    background: #f9f9f9;
                    border-radius: 12px;
                    padding: 15px;
                    margin-bottom: 15px;
                    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08);
                }

                .doctor-modal .info-card h6 {
                    font-weight: 600;
                    color: #1976d2;
                    margin-bottom: 8px;
                }

                .doctor-modal .section-card {
                    background: #f9f9f9;
                    border-radius: 12px;
                    padding: 20px;
                    margin-bottom: 20px;
                    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08);
                }

                .doctor-modal .section-card h6 {
                    font-weight: 600;
                    color: #1976d2;
                    border-bottom: 2px solid #1976d2;
                    display: inline-block;
                    padding-bottom: 4px;
                    margin-bottom: 12px;
                }

                .doctor-modal .lang-pill {
                    display: inline-block;
                    background: #e3f2fd;
                    color: #1976d2;
                    font-size: 13px;
                    font-weight: 600;
                    padding: 5px 12px;
                    border-radius: 50px;
                    margin: 2px;
                }

                .doctor-modal .modal-footer {
                    border-top: none;
                    display: flex;
                    justify-content: flex-end;
                    gap: 10px;
                }

                .doctor-modal .btn-primary {
                    background: #1976d2;
                    border: none;
                    padding: 10px 20px;
                    border-radius: 8px;
                    font-weight: 600;
                }

                .modal-title {
                    font-size: 26px;
                    font-weight: 600;
                    color: #fff;
                }
            </style>

            <div class="row g-4 justify-content-center">
                {{-- Highlight Dr. Mitali Vasavada first --}}
                @foreach ($doctors as $doctor)
                    @if ($doctor->name == 'Dr. Mitali Vasavada')
                        <div class="col-md-6 col-lg-4 d-flex justify-content-center">
                            <div class="doctor-profile-card text-center p-4 featured-doctor">
                                <img src="{{ asset($doctor->image) }}" alt="{{ $doctor->name }}"
                                    class="doctor-img mb-3">
                                <a href="{{ route('director_detail') }}" class="text-decoration-none">
                                    <h4>{{ $doctor->name }}</h4>
                                    <p class="fs-5">{{ $doctor->specialization }}</p>
                                </a>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>

            {{-- Now show all other doctors --}}
            <div class="row g-4 justify-content-center mt-4">
                @foreach ($doctors as $doctor)
                    @if ($doctor->name != 'Dr. Mitali Vasavada')
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="doctor-profile-card">
                                <img src="{{ asset($doctor->image) }}" alt="{{ $doctor->name }}" class="doctor-img">

                                @if ($doctor->name == 'Our Paediatric Team')
                                    <a href="{{ route('setu_newborn') }}" class="text-decoration-none">
                                        <h5>{{ $doctor->name }}</h5>
                                        <p>{{ $doctor->specialization }}</p>
                                    </a>
                                @else
                                    <a href="javascript:void(0)" data-bs-toggle="modal"
                                        data-bs-target="#doctorModal{{ $doctor->id }}" class="text-decoration-none">
                                        <h5>{{ $doctor->name }}</h5>
                                        <p>{{ $doctor->specialization }}</p>
                                    </a>
                                @endif
                            </div>
                        </div>

                        {{-- Doctor Modal --}}
                        <div class="modal fade doctor-modal" id="doctorModal{{ $doctor->id }}" tabindex="-1"
                            aria-hidden="true">
                            <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                                <div class="modal-content">
                                    <!-- Header -->
                                    <div class="modal-header">
                                        <h5 class="modal-title">{{ $doctor->name }}</h5>
                                        <button type="button" class="btn btn-sm btn-light rounded-circle"
                                            data-bs-dismiss="modal" aria-label="Close">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                    <!-- Body -->
                                    <div class="modal-body">
                                        <div class="row">
                                            <!-- Left Side -->
                                            <div class="col-md-4">
                                                <img src="{{ asset($doctor->image) }}" alt="{{ $doctor->name }}"
                                                    class="profile-img">
                                                <div class="info-card">
                                                    <h6>🎓 Education</h6>
                                                    <p>{{ $doctor->details->education ?? '-' }}</p>
                                                </div>
                                                <div class="info-card">
                                                    <h6>🌐 Languages</h6>
                                                    @if (!empty($doctor->details->languages))
                                                        @foreach (explode(',', $doctor->details->languages) as $lang)
                                                            <span class="lang-pill">{{ trim($lang) }}</span>
                                                        @endforeach
                                                    @else
                                                        <p>-</p>
                                                    @endif
                                                </div>
                                            </div>
                                            <!-- Right Side -->
                                            <div class="col-md-8">
                                                <div class="section-card">
                                                    <h6>About Doctor</h6>
                                                    <p>{!! $doctor->details->description ?? '-' !!}</p>
                                                </div>
                                                <div class="section-card">
                                                    <h6>Experience & Achievements</h6>
                                                    <p>{!! $doctor->details->experience ?? '-' !!}</p>
                                                </div>
                                                <div class="section-card">
                                                    <h6>Specializations</h6>
                                                    <p>{{ $doctor->specialization ?? '-' }}</p>
                                                </div>
                                                <div class="section-card">
                                                    <h6>Additional Information</h6>
                                                    <p>{!! $doctor->details->extra_info ?? '-' !!}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Footer -->
                                    <div class="modal-footer">
                                        <a href="{{ route('appointment') }}" class="btn btn-primary">Book
                                            Appointment</a>
                                        <a href="{{ route('contact') }}" class="btn btn-outline-secondary">Contact
                                            Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
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
