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
            <li class="active open"><a href="/admin/index"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>
            <li><a href="javascript:void(0);" class="menu-toggle"><i
                        class="zmdi zmdi-calendar-check"></i><span>Appointment</span> </a>
                <ul class="ml-menu">
                    <li><a href="{{ route('admin.patients.list') }}">Appointment List</a></li>
                    <li><a href="{{ route('admin.contact.list') }}">Contact Message List</a></li>
                </ul>
            </li>
            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-flag"></i><span>Menu</span> </a>
                <ul class="ml-menu">
                    <li><a href="{{ route('admin.menu') }}">Menu</a></li>
                    <li><a href="{{ route('submenu.create') }}">Submenu</a></li>
                </ul>
            </li>
            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-folder"></i><span>Home</span> </a>
                <ul class="ml-menu">
                    <li><a href="{{ route('admin.footer') }}">Header & Footer</a></li>
                    <li><a href="{{ route('admin.slider') }}">Slider</a></li>
                    <li><a href="{{ route('admin.faq') }}">FAQ</a></li>
                    <li><a href="{{ route('admin.about_section') }}">About Section</a></li>
                </ul>
            </li>
            <li><a href="{{ route('admin.add_services') }}" class=""><i
                        class="zmdi zmdi-shield-check"></i><span>Services</span>
                </a>
            </li>
             <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-account-box-phone"></i><span>About
                        Us</span>
                </a>
                <ul class="ml-menu">
                    <li><a href="{{ route('admin.about_us') }}">About Us</a></li>
                </ul>
            </li>
             <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-account"></i><span>Directors</span>
                </a>
                <ul class="ml-menu">
                    <li><a href="{{ route('admin.add_directors') }}">All Directors</a></li>
                       <li><a href="{{ route('admin.director_details') }}">Director Details</a></li>
                </ul>
            </li>
             <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-account"></i><span>Facilities</span>
                </a>
                <ul class="ml-menu">
                    <li><a href="{{ route('admin.facilities') }}">All Facilities</a></li>
                </ul>
            </li>
            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-account-box-phone"></i><span>About
            {{-- <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-account-box-phone"></i><span>About
                        Section</span>
                </a>
                <ul class="ml-menu">
                    <li><a href="{{ route('admin.about_section') }}">About Section</a></li>
                </ul>
            </li> --}}
            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-account"></i><span>Doctors</span>
                </a>
                <ul class="ml-menu">
                    <li><a href="{{ route('admin.doctors') }}">All Doctor</a></li>
                    <li><a href="{{ route('admin.doctor.details') }}">Doctor Details</a></li>
                </ul>
            </li>

            <li><a href="{{ route('admin.why_vasavada') }}" class=""><i class="zmdi zmdi-flower"></i><span>Why
                        Vasavada</span>
                </a>
            </li>

            {{-- <li><a href="{{ route('admin.reviews') }}" class=""><i
                        class="zmdi zmdi-puzzle-piece"></i><span>Reviews</span>
                </a>
            </li> --}}

            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-puzzle-piece"></i><span>Reviews</span>
                </a>
                <ul class="ml-menu">
                    <li><a href="{{ route('admin.reviews') }}">Review Requests</a></li>
                    <li><a href="{{ route('admin.all.reviews') }}">All Reviews</a></li>
                </ul>
            </li>
    </div>
</aside>
