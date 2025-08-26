<!doctype html>
<html class="no-js " lang="en">

<head>
    @include('admin.layout.headerlink')

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">

    <style>
        .dashboard-card {
            background-color: rgba(255, 255, 255, 0.15) !important;
            backdrop-filter: blur(4px);
            -webkit-backdrop-filter: blur(4px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .dashboard-card {
            background-color: transparent !important;
            border: none;
            box-shadow: none;
        }

        .dashboard-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.12);
        }

        .icon-circle {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 26px;
            color: #fff;
            flex-shrink: 0;
        }

        .bg-gradient-primary {
            background: linear-gradient(135deg, #ff6a00, #ee0979);
        }

        .bg-gradient-success {
            background: linear-gradient(135deg, #00b09b, #96c93d);
        }

        .dashboard-bg {
            position: relative;
            z-index: 1;
        }

        .dashboard-bg::before {
            content: "";
            position: absolute;
            top: 50%;
            left: 50%;
            width: 1000px;
            height: 1000px;
            margin-top: 300px;
            background: url("{{ asset($logo->logo_image) }}") no-repeat center/contain;
            opacity: 0.15;
            transform: translate(-50%, -50%);
            z-index: -1;
        }
    </style>
</head>

<body class="theme-cyan">

    <!-- Top Bar -->
    @include('admin.layout.navbar')
    {{-- leftsidebar --}}
    @include('admin.layout.leftsidebar')

    <!-- Main Content -->
    <section class="content home dashboard-bg">
        <div class="block-header mb-4">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2 class="fw-bold">Dashboard</h2>
                    <small class="text-muted">Welcome to Vasavada Hospital Admin</small>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <!-- Dashboard Row -->
            <div class="row g-4">
                <!-- Appointments -->
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <a href="{{ route('admin.patients.list') }}" class="text-decoration-none">
                        <div class="card shadow-lg border-0 rounded-4 dashboard-card h-100">
                            <div class="card-body d-flex align-items-center p-4">
                                <!-- Icon -->
                                <div class="icon-circle bg-gradient-primary">
                                    <i class="fas fa-calendar-check"></i>
                                </div>
                                <!-- Text -->
                                <div class="ms-4 ml-4">
                                    <h2 class="fw-bold mb-0 text-dark">{{ $appointmentCount }}</h2>
                                    <p class="text-muted mb-0">New Appointments</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Contacts -->
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <a href="{{ route('admin.contact.list') }}" class="text-decoration-none">
                        <div class="card shadow-lg border-0 rounded-4 dashboard-card h-100">
                            <div class="card-body d-flex align-items-center p-4">
                                <!-- Icon -->
                                <div class="icon-circle bg-gradient-success">
                                    <i class="fas fa-users"></i>
                                </div>
                                <!-- Text -->
                                <div class="ms-4 ml-4">
                                    <h2 class="fw-bold mb-0 text-dark">{{ $contactCount }}</h2>
                                    <p class="text-muted mb-0">Contacts</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    @include('admin.layout.footerlink')
</body>

</html>

<script>
    $(document).ready(function() {
        $('.counter').each(function() {
            var $this = $(this),
                countTo = $this.attr('data-count');

            $({
                countNum: $this.text()
            }).animate({
                countNum: countTo
            }, {
                duration: 1500,
                easing: 'swing',
                step: function() {
                    $this.text(Math.floor(this.countNum));
                },
                complete: function() {
                    $this.text(this.countNum);
                }
            });
        });
    });
</script>
