<!doctype html>
<html class="no-js " lang="en">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

    <title>Vasavada Hospital Admin</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- Custom Css -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/authentication.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/color_skins.css') }}">

<link rel="stylesheet" href="{{ asset('admin/plugins/bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin/plugins/jvectormap/jquery-jvectormap-2.0.3.min.css') }}"/>
<link rel="stylesheet" href="{{ asset('admin/plugins/morrisjs/morris.min.css') }}" />
<!-- Custom Css -->
<link rel="stylesheet" href="{{ asset('admin/css/main.css') }}">
<link rel="stylesheet" href="{{ asset('admin/css/color_skins.css') }}">

</head>

<body class="theme-cyan authentication sidebar-collapse">
<!-- Navbar -->

<!-- End Navbar -->
<div class="page-header">
    <div class="page-header-image" style="background-image:url({{ asset('admin/images/login.jpg')}})"></div>
    <div class="container">
        <div class="col-md-12 content-center">
            <div class="card-plain">
                <form class="form" method="POST" action="{{ url('/admin/login') }}">
                    @csrf  <!-- Add CSRF token -->
                    <div class="header">
                        <div class="logo-container">
                            <img src="{{ asset('admin/images/Logo.png') }}" alt="">
                        </div>
                        <h5>Log in</h5>
                    </div>
                    <div class="content">
                        <div class="input-group input-lg">
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter User Name" required>
                            <span class="input-group-addon">
                                <i class="zmdi zmdi-account-circle"></i>
                            </span>
                        </div>
                        <!-- Add error message display -->
                        <span class="text-danger" id="username-error"></span>
                        @error('username')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <div class="input-group input-lg">
                            <input type="password" name="password" id="password" placeholder="Password" class="form-control" required/>
                            <span class="input-group-addon">
                                <i class="zmdi zmdi-lock"></i>
                            </span>
                        </div>
                        <span class="text-danger" id="password-error"></span>
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="footer text-center">
                        <button type="submit" class="btn l-cyan btn-round btn-lg btn-block waves-effect waves-light">SIGN IN</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="container">

            <div class="copyright">
                &copy;
                <script>
                    document.write(new Date().getFullYear())
                </script>,
                <span>Designed by & Developed by<a href="#" target="_blank"> AdiTech</a></span>
            </div>
        </div>
    </footer>
</div>

<!-- Jquery Core Js -->
<script src="{{ asset('admin/bundles/libscripts.bundle.js') }}"></script>
<script src="{{ asset('admin/bundles/vendorscripts.bundle.js') }}"></script> <!-- Lib Scripts Plugin Js -->

<script>
   $(".navbar-toggler").on('click',function() {
    $("html").toggleClass("nav-open");
});
//=============================================================================
$('.form-control').on("focus", function() {
    $(this).parent('.input-group').addClass("input-group-focus");
}).on("blur", function() {
    $(this).parent(".input-group").removeClass("input-group-focus");
});
</script>
</body>
</html>











