<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
    <div class="menu">
        <ul class="list">
            <li>
                <div class="user-info">
                    <div class="image"><a href="{{ route('home') }}"><img src="{{ asset('admin/images/Logo.png') }}"
                                alt="User"></a>
                    </div>
                    <div class="detail">
                        <h4>Dr. Mitali Vasavada</h4>
                        <!-- <small>(M.D.)</small> -->
                    </div>
                </div>
            </li>
            <!-- <li class="header">MAIN</li> -->
            <li class="{{ request()->routeIs('admin.index') ? 'active open' : '' }}"><a
                    href="{{ route('admin.index') }}"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>
            <li
                class="{{ request()->routeIs('admin.patients.list') || request()->routeIs('admin.contact.list') ? 'active open' : '' }}">
                <a href="javascript:void(0);" class="menu-toggle"><i
                        class="zmdi zmdi-calendar-check"></i><span>Appointment</span> </a>
                <ul class="ml-menu">
                    <li class="{{ request()->routeIs('admin.patients.list') ? 'active open' : '' }}"><a
                            href="{{ route('admin.patients.list') }}">Appointment List</a></li>
                    <li class="{{ request()->routeIs('admin.contact.list') ? 'active open' : '' }}"><a
                            href="{{ route('admin.contact.list') }}">Contact Message List</a></li>
                </ul>
            </li>
            <li
                class="{{ request()->routeIs('admin.menu') || request()->routeIs('submenu.create') ? 'active open' : '' }}">
                <a href="javascript:void(0);" class="menu-toggle"><i
                        class="zmdi zmdi-format-align-right"></i><span>Menu</span> </a>
                <ul class="ml-menu">
                    <li class="{{ request()->routeIs('admin.menu') ? 'active open' : '' }}"><a
                            href="{{ route('admin.menu') }}">Menu</a></li>
                    <li class="{{ request()->routeIs('submenu.create') ? 'active open' : '' }}"><a
                            href="{{ route('submenu.create') }}">Submenu</a></li>
                </ul>
            </li>
            <li
                class="{{ request()->routeIs('admin.footer') || request()->routeIs('admin.slider') || request()->routeIs('admin.faq') || request()->routeIs('admin.about_section') ? 'active open' : '' }}">
                <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-home"></i><span>Home</span> </a>
                <ul class="ml-menu">
                    <li class="{{ request()->routeIs('admin.footer') ? 'active open' : '' }}"><a
                            href="{{ route('admin.footer') }}">Header & Footer</a></li>
                    <li class="{{ request()->routeIs('admin.slider') ? 'active open' : '' }}"><a
                            href="{{ route('admin.slider') }}">Slider</a></li>
                    <li class="{{ request()->routeIs('admin.faq') ? 'active open' : '' }}"><a
                            href="{{ route('admin.faq') }}">FAQ</a></li>
                    <li class="{{ request()->routeIs('admin.about_section') ? 'active open' : '' }}"><a
                            href="{{ route('admin.about_section') }}">About Section</a></li>
                </ul>
            </li>
            <li
                class="{{ request()->routeIs('admin.add_services') || request()->routeIs('admin.service_details.index') || request()->routeIs('admin.sonography_details.index')  ? 'active open' : '' }}">
                <a href="javascript:void(0);" class="menu-toggle"><i
                        class="zmdi zmdi-badge-check"></i><span>Services</span> </a>
                <ul class="ml-menu">
                    <li class="{{ request()->routeIs('admin.add_services') ? 'active open' : '' }}"><a
                            href="{{ route('admin.add_services') }}">All Services</a></li>
                    <li class="{{ request()->routeIs('admin.service_details.index') ? 'active open' : '' }}"><a
                            href="{{ route('admin.service_details.index') }}">Service Details</a></li>
                    <li class="{{ request()->routeIs('admin.sonography_details.index') ? 'active open' : '' }}"><a
                            href="{{ route('admin.sonography_details.index') }}">Sonography Details</a></li>
                </ul>
            </li>
            <li class="{{ request()->routeIs('admin.about_us') ? 'active open' : '' }}"><a
                    href="{{ route('admin.about_us') }}"><i class="zmdi zmdi-shield-check"></i><span>About
                        Us</span></a>
            </li>
            <li
                class="{{ request()->routeIs('admin.add_directors') || request()->routeIs('admin.director_details') ? 'active open' : '' }}">
                <a href="javascript:void(0);" class="menu-toggle"><i
                        class="zmdi zmdi-account-add"></i><span>Directors</span>
                </a>
                <ul class="ml-menu">
                    <li class="{{ request()->routeIs('admin.add_directors') ? 'active open' : '' }}"><a
                            href="{{ route('admin.add_directors') }}">All Directors</a></li>
                    <li class="{{ request()->routeIs('admin.director_details') ? 'active open' : '' }}"><a
                            href="{{ route('admin.director_details') }}">Director Details</a></li>
                </ul>
            </li>
            {{-- <li><a href="javascript:void(0);" class="menu-toggle"><i
                        class="zmdi zmdi-hospital"></i><span>Facilities</span>
                </a>
                <ul class="ml-menu">
                    <li><a href="{{ route('admin.facilities') }}">All Facilities</a></li>
        </ul>
        </li> --}}

            <li class="{{ request()->routeIs('admin.facilities') ? 'active open' : '' }}"><a
                    href="{{ route('admin.facilities') }}"><i
                        class="zmdi zmdi-hospital"></i><span>Facilities</span></a>
            </li>

        {{-- <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-account-box-phone"></i><span>About --}}
        {{-- <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-account-box-phone"></i><span>About
                        Section</span>
                </a>
                <ul class="ml-menu">
                    <li><a href="{{ route('admin.about_section') }}">About Section</a></li>
        </ul>
        </li> --}}

        <li
            class="{{ request()->routeIs('admin.doctors') || request()->routeIs('admin.doctor.details') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-accounts-alt"></i><span>Doctors</span>
            </a>
            <ul class="ml-menu">
                <li class="{{ request()->routeIs('admin.doctors') ? 'active open' : '' }}"><a
                        href="{{ route('admin.doctors') }}">All Doctor</a></li>
                <li class="{{ request()->routeIs('admin.doctor.details') ? 'active open' : '' }}"><a
                        href="{{ route('admin.doctor.details') }}">Doctor Details</a></li>
            </ul>
        </li>

            <li class="{{ request()->routeIs('admin.why_vasavada') ? 'active open' : '' }}">
                <a href="{{ route('admin.why_vasavada') }}" class=""><i class="zmdi zmdi-flower"></i><span>Why
                        Vasavada</span>
                </a>
            </li>

        {{-- <li><a href="{{ route('admin.reviews') }}" class=""><i
            class="zmdi zmdi-puzzle-piece"></i><span>Reviews</span>
        </a>
        </li> --}}

        <li
            class="{{ request()->routeIs('admin.reviews') || request()->routeIs('admin.all.reviews') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-puzzle-piece"></i><span>Reviews</span>
            </a>
            <ul class="ml-menu">
                <li class="{{ request()->routeIs('admin.reviews') ? 'active open' : '' }}"><a
                        href="{{ route('admin.reviews') }}">Review Requests</a></li>
                <li class="{{ request()->routeIs('admin.all.reviews') ? 'active open' : '' }}"><a
                        href="{{ route('admin.all.reviews') }}">All Reviews</a></li>
            </ul>
        </li>
    </div>
</aside>