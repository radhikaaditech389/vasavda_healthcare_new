<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>FAQ - Vasavada womens hospital Bopal</title>
    <meta name="author" content="Vasavada Women's Hospital">
    <meta name="description" content="FAQ to visit best womens hospital bopal and lady gynecologist bopal">
    <meta name="keywords"
        content="FAQ, Womens hospital bopal, Women's hospital bopal, gynecologist bopal, lady gynecologist bopal, womens hospital near by, gynecologist near by, lady gynecologist near by">
    <link rel="canonical" href="https://www.vasavadahospitals.org/dr_mitali" />
    @include('patient.layout.head')
</head>

<body class="">
    @include('patient.layout.mobile_menu')
    @include('patient.layout.side_menu')
    @include('patient.layout.header', ['footer' => $footer])
    <div class="breadcumb-wrapper " style="margin-top: -30px !important;">
        <div class="parallax" data-parallax-image="{{ asset('patient/img/breadcurmb/breadcurmb-1-1.jpg') }}"></div>
        <div class="container z-index-common">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title" style="-webkit-text-stroke: 2px black;
    -webkit-text-fill-color: #702840; ">{{ explode(',', $director_data->name)[0] }}</h1>
                <div class="breadcumb-menu-wrap">
                    <i class="far fa-home-lg"></i>
                    <ul class="breadcumb-menu">
                        <li><a href="/">Home</a></li>
                        <li class="active">{{ explode(',', $director_data->name)[0] }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>



    <!-- Dr. Mitali Vasavada section start-->
    <section class="testinial-section7 space">
        <div class="container-style7">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12 wow fadeInUp" data-wow-delay="400ms">
                    <div class="test-img7">
                        <img src="{{ asset('patient/img/testimonial/DrVasavadaVertical.jpg') }}" alt="">
                        {{-- <a href="#" class="plus-btn"><img src="{{ asset('patient/img/testimonial/testi-plus7-1.png') }}"
                        alt=""></a> --}}
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 wow fadeInUp" data-wow-delay="600ms">
                    <div class="testi-content7">
                        <div class="title-area-three seven">
                            {{-- <br><br><span class="sub-title7">About Mitali Vasaavda</span> --}}
                            <h3>{{$director_data->name}}</h3>
                        </div><br>
                        <p><b>
                                <h5>Specialization:<h5>
                            </b>
                        <h6>{{$director_data->specialization}}</h6>
                        </p><br>
                        <p><b>
                                <h5>Special Skill:<h5>
                            </b>
                        <h6> {{$director_data->skills}}</h6>
                        </p><br>
                        <p><b>
                                <h5>Languages Spoken:<h5>
                            </b>
                        <h6>{{$director_data->languages}}</h6>
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- Dr.Mitali Vasavada section ends --}}

    <section class="vs-accordion-wrapper space-top space-md-bottom">
        <div class="container">
            <div class="row">

                <div class="about-content">
                    <span class="h3 text-theme sec-subtitle mb-2 mb-md-0"></span>
                    <h2>About Dr. Mitali Vasavada:</h2>
                   {!! $director_data->bio !!}
                </div>
            </div>
        </div>
    </section>

    <section class=" space-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-40  mb-lg-0 wow fadeInUp" data-wow-delay="0.3s">
                    <img src="{{ asset($director_data->campaign_image) }}" alt="image">
                </div>
                <div class="col-lg-6 align-self-center wow fadeInUp" data-wow-delay="0.4s">
                    <div class="ps-xxl-5 pe-xxl-5">
                        <span class="sec-subtitle2"> Initiatives & Campaigns </span>
                        <p class="sec-text2 mb-4 pb-lg-3">Dr. Vasavada has led multiple initiatives to improve women’s
                            healthcare and awareness:
                        </p>
                        <div class="list-style1">
                            <ul class="list-unstyled">
                                @php
                                $campaigns = json_decode($director_data->campaigns, true);
                                @endphp

                                @if(!empty($campaigns))
                                <ul>
                                    @foreach ($campaigns as $campaign)
                                    <li>
                                        <i class="fal fa-check-circle"></i>
                                        <span class="title">{{ $campaign['title'] }} -</span> {{ $campaign['desc'] }}
                                    </li>
                                    @endforeach
                                </ul>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class=" space-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-40  mb-lg-0 wow fadeInUp" data-wow-delay="0.3s">
                    <img src="{{ asset($director_data->training_image) }}" alt="image">
                </div>
                <div class="col-lg-6 align-self-center wow fadeInUp" data-wow-delay="0.4s">
                    <div class="ps-xxl-5 pe-xxl-5">
                        <span class="sec-subtitle2"> Teaching & Mentoring </span>
                        <p class="sec-text2 mb-4 pb-lg-3">Dr. Vasavada is deeply committed to teaching and mentoring:
                        </p>
                        <div class="list-style1">
                            @php
                            $trainings = json_decode($director_data->trainings, true);
                            @endphp

                            @if(!empty($trainings))
                            <ul class="list-unstyled">
                                @foreach ($trainings as $training)
                                <li><i class="fal fa-check-circle"></i><span class="title">{{ $training['title'] }}
                                        -</span>
                                    {{ $training['desc'] }}</li>
                                @endforeach
                            </ul>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class=" space-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-40  mb-lg-0 wow fadeInUp" data-wow-delay="0.3s">
                    <img src="{{ asset($director_data->award_image) }}" alt="image">
                </div>
                <div class="col-lg-6 align-self-center wow fadeInUp" data-wow-delay="0.4s">
                    <div class="ps-xxl-5 pe-xxl-5">
                        <span class="sec-subtitle2"> Conferences & Professional Development
                        </span>
                        <p class="sec-text2 mb-4 pb-lg-3">Dr. Vasavada actively participates in conferences to stay at
                            the forefront of gynecological advancements:
                        </p>
                        <div class="list-style1">
                            @php
                            $conferences = json_decode($director_data->conferences, true);
                            @endphp

                            @if(!empty($conferences))
                            <ul class="list-unstyled">
                                @foreach ($conferences as $conference)
                                <li><i class="fal fa-check-circle"></i><span
                                        class="title">{{ $conference['title'] }}</span> {{ $conference['desc'] }} </li>
                                @endforeach
                            </ul>
                            @endif
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
                    <h2>Media Presence </h2>
                    <p><b>{{$director_data->media_presence}}</b></p><br>

                </div>
            </div>
        </div>
    </section>



    <section class=" space-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-40  mb-lg-0 wow fadeInUp" data-wow-delay="0.3s">
                    <img src="{{ asset($director_data->charity_image) }}" alt="image">
                </div>
                <div class="col-lg-6 align-self-center wow fadeInUp" data-wow-delay="0.4s">
                    <div class="ps-xxl-5 pe-xxl-5">
                        <span class="sec-subtitle2"> Awards & Felicitations </span>
                        <p class="sec-text2 mb-4 pb-lg-3">Dr. Vasavada has been honored for her contributions to women’s
                            healthcare:
                        </p>
                        <div class="list-style1">
                             @php
                            $awards = json_decode($director_data->awards, true);
                            @endphp

                            @if(!empty($awards))
                            <ul class="list-unstyled">
                                 @foreach ($awards as $award)
                                <li><i class="fal fa-check-circle"></i><span class="title">{{ $award['title'] }}</span> {{ $award['desc'] }}</li>
                                @endforeach
                            </ul>
                            @endif
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
                    <h2>Community & Charity Work </h2>
                    <p><b>{{$director_data->community_charity_work}}</b></p><br>

                </div>
            </div>
        </div>
    </section>

    <section class=" space-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-40  mb-lg-0 wow fadeInUp" data-wow-delay="0.3s">
                    <img src="{{ asset($director_data->membership_image) }}" alt="image">
                </div>
                <div class="col-lg-6 align-self-center wow fadeInUp" data-wow-delay="0.4s">
                    <div class="ps-xxl-5 pe-xxl-5">
                        <span class="sec-subtitle2"> Memberships
                        </span>
                        <p class="sec-text2 mb-4 pb-lg-3">Dr. Vasavada is affiliated with prominent medical
                            organizations:
                        </p>
                        <div class="list-style1">
                              @php
                            $memberships = json_decode($director_data->memberships, true);
                            @endphp

                            @if(!empty($memberships))
                            <ul class="list-unstyled">
                                  @foreach ($memberships as $membership)
                                <li><i class="fal fa-check-circle"></i><span class="title">{{ $membership['title'] }}</span>{{ $membership['desc'] }}</li>
                                  @endforeach
                            </ul>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class=" space-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-40  mb-lg-0 wow fadeInUp" data-wow-delay="0.3s">
                    <img src="{{ asset('patient/img/about/mitalivasavada_collage(6).png') }}" alt="image">
                </div>
                <div class="col-lg-6 align-self-center wow fadeInUp" data-wow-delay="0.4s">
                    <div class="ps-xxl-5 pe-xxl-5">
                        <span class="sec-subtitle2"> Publications & Talks
                        </span>
                        <p class="sec-text2 mb-4 pb-lg-3">Dr. Vasavada is a published author and speaker on various
                            women’s health topics:
                        </p>
                        <div class="list-style1">
                              @php
                            $publications_talks = json_decode($director_data->publications_talks, true);
                            @endphp

                            @if(!empty($publications_talks))
                            <ul class="list-unstyled">
                                 @foreach ($publications_talks as $publications_talk)
                                <li><i class="fal fa-check-circle"></i><span class="title">{{ $publications_talk['title'] }}</span>{{ $publications_talk['desc'] }}</li>
                                @endforeach
                            </ul>
                            @endif
                        </div>
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