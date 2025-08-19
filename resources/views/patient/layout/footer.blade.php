<footer class="footer-wrapper footer-layout7">
    <div class="widget-area v7">
        <div class="container">
            <div class="row gx-0 gy-4">
                <div class="col-lg-3  wow fadeInUp" data-wow-delay="400ms">
                    <div class="widget footer-widget">
                        <div class="vs-widget-about-seven">
                            <div class="footer-logo"><img src="{{ $footer->logo_image }}" alt="logo"></div>
                            <p class="footer-text">{{ $footer->description }}</p>

                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-3 wow fadeInUp" data-wow-delay="500ms">
                    <div class="widget v1 footer-widget widget_nav_menu-seven">
                        <h3 class="widget_title-seven">Quick Links</h3>
                        <div class="menu-all-pages-container">
                            <ul class="menu-seven">
                                @foreach ($menus as $menu)
                                    <li>
                                        <a href="{{ url($menu->link) }}">
                                            {{ $menu->name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>


                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="600ms">
                    <div class="widget v1 footer-widget shedule">
                        <h3 class="widget_title-seven">Contact Info</h3>
                        <div class="vs-widget-contact-seven">

                            <div class="media-style7 v1">
                                <div class="media-icon-seven"><i class="fal fa-map-marker-alt"></i></div>
                                <div class="media-body-seven">
                                    <p class="media-text">{{ strip_tags($footer->address, '<br>') }}</p>
                                </div>
                            </div>

                            <div class="media-style7 v1">
                                <div class="media-icon-seven"><i class="fal fa-phone-alt"></i></div>
                                <div class="media-body-seven">
                                    <p class="media-text">+91 {{ $footer->phone_no }}</p>
                                </div>
                            </div>
                            <div class="media-style7">
                                <div class="media-icon-seven"><i class="fal fa-envelope"></i></div>
                                <div class="media-body-seven">
                                    <span class="media-label">{{ $footer->email }}</span>
                                </div>
                            </div>
                            <div class="media-style7">
                                <div class="media-icon-seven"><i class="fal fa-clock"></i></div>
                                <div class="media-body-seven">
                                    <span class="media-label">{{ $footer->days }} {{ $footer->hospital_time }} </span>
                                    {{-- <p class="media-text">Sunday - CLOSED</p> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3  wow fadeInUp" data-wow-delay="700ms">
                    <div class="widget v1 footer-widget widget-time-nav">
                        <h3 class="widget_title-seven">We are Available</h3>
                        <div class="menu-all-pages">
                            <ul class="time-menu-seven">
                                <li><b>Hospital Time</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                                    {{ $footer->hospital_time }}
                                </li>
                                <li><b>Consulting Time</b>&nbsp;&nbsp;&nbsp;: {{ $footer->consulting_time }} </li>
                                <li><b>Call for Specific Doctors' Availability</b></li>
                                <li><b>Open for Emergency:</b> (Registered Patients Only)</li>
                                {{-- <li>Friday&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:	 09:00 AM - 09:00 PM</li>
                                <li>Saturday&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:	 09:00 AM - 09:00 PM</li>
                                <li>Sunday&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:	 Open for Emergency<br>Special Consulting:   10:00 to 01:00 <br>& 04:00 to 08:00</li> --}}

                            </ul>
                        </div>

                        <ul class="footer-link-seven">
                            {{-- <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li> --}}
                            <li><a href="{{ $footer->yt_link }}" target="_blank"><i class="fab fa-youtube"></i></a>
                            </li>
                            <li><a href="{{ $footer->insta_link }}" target="_blank"><i
                                        class="fab fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-wrap-seven">
        <div class="container">
            <div class="copyright-text">
                <p class="mb-0">Copyright <i class="fal fa-copyright"></i> 2024 <a href="#">Vasavada Women’s
                        Hospital</a>. Design & Developed by <a href="#">Adi Tech</a>.</p>
            </div>
        </div>
    </div>
</footer>
