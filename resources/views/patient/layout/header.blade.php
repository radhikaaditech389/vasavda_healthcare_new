<header class="header-wrapper header-layout1">
    <style>
        /* General styles for the header */
        .header-top-info li a,
        .main-menu a,
        .header-btn a {
            font-family: 'Arial', sans-serif;
            /* Change to your desired font */
            font-size: 16px;
            /* Adjust size as needed */
            color: #E11F5E;
            /* Change color if necessary */
            text-decoration: none;
            /* Remove underline */
        }

        /* Header button styles */
        .header-btn a {
            background-color: #E11F5E;
            /* Button background color */
            color: #fff;
            /* Button text color */
            padding: 12px 25px;
            /* Button padding */
            border-radius: 5px;
            /* Rounded corners */
            transition: background-color 0.3s;
            /* Smooth transition */
            font-weight: bold;
            /* Make text bold */
            text-align: center;
            /* Center text */
        }

        .header-btn a:hover {
            background-color: #E11F5E;
            /* Darker shade on hover */
        }

        /* Adjusting the logo size and padding */
        .header1-logo img {
            height: 100px;
            /* Adjust height */
            width: auto;
            /* Maintain aspect ratio */
        }

        /* Increase padding for the header */
        .header-wrapper {
            padding: 20px 0;
            /* Adjust top and bottom padding */
            background-color: #fff;
            /* Ensure background color is white */
        }

        /* Centering header elements */
        .header-main {
            display: flex;
            justify-content: center;
            /* Center elements horizontally */
            align-items: center;
            /* Center elements vertically */
        }

        /* Mobile menu styles */
        .mobile-menu {
            display: none;
            /* Hide by default */
            position: absolute;
            /* Position it absolutely */
            top: 100%;
            /* Position below the header */
            left: 0;
            right: 0;
            background-color: white;
            /* Background color */
            z-index: 1000;
            /* Ensure it appears above other elements */
            padding: 10px 0;
            /* Padding for the menu */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            /* Optional shadow */
            transition: max-height 0.3s ease;
            /* Smooth transition */
            max-height: 0;
            /* Initially hidden */
            overflow: hidden;
            /* Hide overflow */
        }

        .mobile-menu.active {
            display: block;
            /* Show when active */
            max-height: 500px;
            /* Set a max height when active */
        }

        .mobile-menu ul {
            list-style: none;
            /* Remove bullet points */
            padding: 0;
            /* Remove padding */
            margin: 0;
            /* Remove margin */
        }

        .mobile-menu li {
            padding: 10px 20px;
            /* Padding for menu items */
        }

        .mobile-menu li a {
            color: #000;
            /* Text color */
            text-decoration: none;
            /* Remove underline */
        }

        @media (max-width: 768px) {
            .main-menu {
                display: none;
                /* Hide main menu on mobile */
            }
        }
    </style>

    <!-- Header Top -->
    <div class="header-top bg-title py-2 d-none d-md-block">
        <div class="container custom-container py-1">
            <div class="row justify-content-between">
                <div class="col-auto">
                    <ul class="header-top-info list-unstyled m-0">
                        <li><i class="far fa-envelope"></i><a href="mailto:{{ $footer->email }}"
                                class="text-reset">{{ $footer->email }}</a></li>
                        {{-- <li><i class="far fa-map-marker-alt"></i>Sun South Trade Center, Bopal, Ahmedabad</li>  --}}
                        <li><i class="far fa-map-marker-alt"></i>{{ strip_tags($footer->address) }}</li>
                        <li><i class="far fa-clock"></i>{{ $footer->days }}: {{ $footer->hospital_time }}</li>
                    </ul>
                </div>
                <div class="col-auto d-none d-xl-block">
                    <ul class="head-top-links text-end">
                        {{-- <li>
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink1" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fal fa-globe"></i> English
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                <li><a href="#">German</a></li>
                                <li><a href="#">French</a></li>
                                <li><a href="#">Italian</a></li>
                                <li><a href="#">Latvian</a></li>
                                <li><a href="#">Spanish</a></li>
                                <li><a href="#">Greek</a></li>
                            </ul>
                        </li> --}}
                        <li>
                            <ul class="header-social">
                                {{-- <li><a href="https://www.youtube.com/@mygynac"><i class="fab fa-youtube"></i></a></li>
                                <li><a href="https://www.instagram.com/vasavadawomenshospital/"><i
                                            class="fab fa-instagram"></i></a></li> --}}

                                <li><a href="{{ $footer->yt_link }}"><i class="fab fa-youtube"></i></a></li>
                                <li><a href="{{ $footer->insta_link }}"><i class="fab fa-instagram"></i></a></li>
                                {{-- <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li> --}}
                            </ul>
                        </li>
                        {{-- <li>
                            <button type="submit" class="header-search-btn searchBoxTggler">Search<i class="far fa-search"></i></button>
                        </li> --}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Sticky Active -->
    <div class="sticky-wrap">
        <div class="sticky-active">
            <!-- Header Main -->
            <div class="header-main">
                <div class="container custom-container position-relative">
                    <div class="row align-items-center">
                        <div class="col-auto d-flex align-items-center">
                            <div class="header1-logo">
                                {{-- <a href="/"><img src="{{ asset('patient/img/Vasavada_Logo.png') }}"
                                        alt="Logo"></a> --}}

                                <a href="/"><img src="{{ $footer->logo_image }}" alt="Logo"></a>
                            </div>
                        </div>
                        <div class="col d-flex justify-content-between align-items-center">
                            {{-- <nav class="main-menu menu-style1 d-none d-lg-block">
                                <ul class="d-flex m-0">
                                    <li><a href="/about_us">About Us</a></li>
                                    <li><a href="/doctors">Doctors</a></li>
                                    <li><a href="/why_vasavada">Why Vasavada</a></li>
                                    <li class="menu-item-has-children">
                                        <a href="/service">Services</a>
                                        <ul class="sub-menu">
                                            <li><a href="/pragnancy_care">Pregnancy care & Delivery</a></li>
                                            <li><a href="/laproscopy">Laparosacopy & Hysteroscopic</a></li>
                                            <li><a href="/sonography">3D/4D Sonography</a></li>
                                            <li><a href="/urogynocology">Uro-Gynecology</a></li>
                                            <li><a href="/cancer_care">Gynec Cancer Care</a></li>
                                            <li><a href="/preventive_oncogynocology">Preventive Onco-Gynecology & Health
                                                    Checkup</a></li>
                                            <li><a href="/sexual_health">Sexual Health</a></li>
                                            <li><a href="/interfertility">Infertility</a></li>
                                            <li><a href="/cosmetic_gynecology">Cosmetic Gynecology</a></li>
                                            <li><a href="/mental_health">Mental Health</a></li>
                                            <li><a href="/dietitian">Dietitian</a></li>
                                            <li><a href="/physiotherpy">Physiotherapy & ANC classes</a></li>
                                            <li><a href="/home_care">Home Care</a></li>
                                            <li><a href="/clinic">Special Clinics</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="/testimonials">Testimonials</a></li>
                                    <li><a href="/contact">Contact Us</a></li>
                                    <li><a href="/home_care">Home Care Service</a></li>
                                    <li><a href="/faq">FAQ</a></li>
                                    <li><a href="/360_view">Explore Our Space</a></li>
                                </ul>
                            </nav> --}}

                            <nav class="main-menu menu-style1 d-none d-lg-block">
                                <ul class="d-flex m-0">
                                    @foreach ($menus as $menu)
                                        <li class="{{ $menu->submenus->count() ? 'menu-item-has-children' : '' }}">
                                            <a href="{{ $menu->link }}">{{ $menu->name }}</a>

                                            @if ($menu->submenus->count())
                                                <ul class="sub-menu">
                                                    @foreach ($menu->submenus as $submenu)
                                                        <li>
                                                            <a
                                                                href="{{ $submenu->submenu_link }}">{{ $submenu->submenu_name }}</a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            </nav>

                            <div class="header-btn d-none d-xl-block">
                                <a href="/appointment" class="vs-btn style2">Appointment<i
                                        class="fal fa-calendar-alt"></i></a>
                            </div>
                            <button class="vs-menu-toggle d-inline-block d-xl-none" id="mobile-menu-toggle"><i
                                    class="fas fa-bars"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <nav class="mobile-menu d-lg-none">
        <ul class="main-menu">
            <li><a href="/about_us">About Us</a></li>
            <li><a href="/doctors">Doctors</a></li>
            <li><a href="/why_vasavada">Why Vasavada</a></li>
            <li class="menu-item-has-children">
                <a href="/service">Services</a>
                <ul class="sub-menu">
                    <li><a href="/pragnancy_care">Pregnancy care & Delivery</a></li>
                    <li><a href="/laproscopy">Laparosacopy & Hysteroscopic</a></li>
                    <li><a href="/sonography">3D/4D Sonography</a></li>
                    <li><a href="/urogynocology">Uro-Gynecology</a></li>
                    <li><a href="/cancer_care">Gynec Cancer Care</a></li>
                    <li><a href="/preventive_oncogynocology">Preventive Onco-Gynecology & Health Checkup</a></li>
                    <li><a href="/sexual_health">Sexual Health</a></li>
                    <li><a href="/interfertility">Infertility</a></li>
                    <li><a href="/cosmetic_gynecology">Cosmetic Gynecology</a></li>
                    <li><a href="/mental_health">Mental Health</a></li>
                    <li><a href="/dietitian">Dietitian</a></li>
                    <li><a href="/physiotherpy">Physiotherapy & ANC classes</a></li>
                    <li><a href="/home_care">Home Care</a></li>
                    <li><a href="/clinic">Special Clinics</a></li>
                </ul>
            </li>
            <li><a href="/testimonials">Testimonials</a></li>
            <li><a href="/contact">Contact Us</a></li>
            <li><a href="/home_care">Home Care Service</a></li>
            <li><a href="/faq">FAQ</a></li>
            <li><a href="/360_view">Explore Our Space</a></li>
        </ul>
    </nav>
</header>

<script>
    document.getElementById('mobile-menu-toggle').addEventListener('click', function() {
        const menu = document.querySelector('.mobile-menu');
        menu.classList.toggle('active');
    });
</script>

{{-- <header class="header-wrapper header-layout7">
    <!-- Sticky Active -->
    <div class="sticky-wrap">
        <div class="sticky-active">
            <!-- Header Main -->
            <div class="header-main7">
                <div class="container container-style7 position-relative">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto">
                            <div class="header1-logo py-2">
                                <a href="/"><img src="{{ asset('patient/img/Vasavada_Logo.png') }}" alt="Logo" style="height:120px; width:250px; margin-left:50px"></a>
                            </div>
                        </div>
                        <div class="col d-lg-flex justify-content-end">
                            <div class="location-box-two one">
                                <div class="header-icon7"><img src="{{ asset('patient/img/breadcurmb/phone1(6).png') }}" alt=""></div>
                                <div class="content-box">
                                    <span class="text-title">For Appointment</span>
                                    <h6 class="title"><a href="#">+91 98790 09439</a></h6>
                                </div>
                            </div>
                            <div class="location-box-two one">
                                <div class="header-icon7"><img src="{{ asset('patient/img/breadcurmb/mail1(6).png') }}" alt=""></div>
                                <div class="content-box">
                                    <span class="text-title">Email</span>
                                    <h6 class="title"><a href="#">care@vasavadahospitals.org</a></h6>
                                </div>
                            </div>
                            <div class="location-container">
                                <div class="location-box-two">
                                    <div class="header-icon7">
                                        <img src="{{ asset('patient/img/breadcurmb/location1(6).png') }}" alt="">
                                    </div>
                                    <div class="content-box">
                                        <span class="text-title">Location</span>
                                        <h6 class="title" style="color: #4DB135 !important;">Sun South Trade Center, Bopal, Ahmedabad</h6>
                                    </div>
                                </div>
                                {{-- <div class="location-box-two">
                                    <div class="header-icon7">
                                        <img src="{{ asset('patient/img/breadcurmb/location1(6).png') }}" alt="">
                                    </div>
                                    <div class="content-box">
                                        <span class="text-title">Location</span>
                                        <h6 class="title">Surdhara Cir, Thaltej, Ahmedabad</h6>
                                    </div>
                                </div>
                            </div>
                            <style>
                                .location-container {
display: flex;
flex-direction: column;
gap: 10px; /* Adjust the gap between locations as needed */
}

.location-box-two {
display: flex;
align-items: center;
padding: 8px;

border-radius: 5px;
}</style>
                        </div>
                        <button class="vs-menu-toggle d-inline-block d-xl-none"><i class="fas fa-bars"></i></button>
                    </div>
                </div>
            </div>
            <div class="header-lower-seven">
                <div class="container-style7">
                    <div class="outer-box">
                        <div class="nav-box">
                            <nav class="main-menu seven menu-style7 d-none d-lg-block">
                                <ul>
                                    <li>
                                        <a href="/about_us">About Us</a>
                                    </li>
                                    <li>
                                        <a href="/doctors">Doctors</a>
                                    </li>
                                    <li>
                                        <a href="/why_vasavada">Why Vasavada</a>
                                    </li>



                                    <li class="menu-item-has-children">
                                        <a href="/service">Services</a>
                                        <ul class="sub-menu">
                                            <li><a href="/pragnancy_care">Pregnancy care & Delivery</a></li>
                                            <li><a href="/laproscopy">Laparosacopy & Hysteroscopic</a></li>
                                            <li><a href="/sonography">3D/4D Sonography</a></li>
                                            <li><a href="/urogynocology">Uro-Gynecology</a></li>
                                            <li><a href="/cancer_care">Gynec Cancer Care</a></li>
                                            <li><a href="/preventive_oncogynocology">Preventive Onco-Gynecology & Health Checkup</a></li>
                                            <li><a href="/sexual_health">Sexual Health</a></li>
                                            <li><a href="/interfertility">Infertility</a></li>
                                            <li><a href="/cosmetic_gynecology">Cosmetic Gynecology</a></li>
                                            <li><a href="/mental_health">Mental Health</a></li>
                                            <li><a href="/dietitian">Dietitian</a></li>
                                            <li><a href="/physiotherpy">Physiotherapy & ANC classes</a></li>
                                            <li><a href="/home_care">Home Care</a></li>
                                            <!-- <li><a href="/vacination">Vacination</a></li> -->
                                            {{-- <li><a href="/pediatric">Pediatric Clinic</a></li> -
                                            <li><a href="/clinic">Special Clinics</a></li>


                                        </ul>
                                    </li>
                                    <li>
                                        <a href="/testimonials">Testimonials</a>
                                    </li>

                                    <li>
                                        <a href="/contact">Contact Us</a>
                                    </li>

                                    <li>
                                        <a href="/home_care">Home Care Service</a>
                                    </li>
                                    <li>
                                        <a href="/faq">FAQ</a>
                                    </li>

                                    <li>
                                        <a href="/360_view">Explore Our Space</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                                <div class="btn-box-seven">
                                    <a href="/appointment" class="btn-style7 v1">Appointments</a>
                                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header> --}}
