<!doctype html>
<html class="no-js " lang="en">

<head>
    @include('admin.layout.headerlink')
</head>

<body class="theme-cyan">

    <!-- Top Bar -->
    @include('admin.layout.navbar')
    {{-- leftsidebar --}}
    @include('admin.layout.leftsidebar')

    <!-- Main Content -->
    <section class="content home">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Dashboard
                        <small class="text-muted">Welcome to Vasavada Hospital Admin</small>
                    </h2>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="row clearfix">
                            <div class="col-lg-6 col-md-6 col-sm-12 text-center">
                                <div class="body">
                                    {{-- data-to="{{ $appointmentCount }}" --}}
                                    <h2 class="number count-to m-t-0" data-from="0"  data-speed="1000"
                                        data-fresh-interval="700">2
                                        {{-- {{ $appointmentCount }} --}}
                                    </h2>
                                    <p class="text-muted">New Appointments</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 text-center">
                                <div class="body">
                                    {{-- data-to="{{ $contactCount }}"  --}}
                                    <h2 class="number count-to m-t-0" data-from="0" data-speed="2000"
                                        data-fresh-interval="700">4
                                        {{-- {{ $contactCount }} --}}
                                    </h2>
                                    <p class="text-muted">Contacts</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Appointments</strong></h2>
                        </div>
                        <div class="body">
                            <p class="float-md-right">
                                <span class="badge badge-success">3 Admit</span>
                                <span class="badge badge-default">2 Discharge</span>
                            </p>
                            <div class="table-responsive table_middel">
                                <table class="table m-b-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Patients</th>
                                            <th>Adress</th>
                                            <th>START Date</th>
                                            <th>END Date</th>
                                            <th>Priority</th>
                                            <th>Progress</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td><img src="assets/images/xs/avatar3.jpg"
                                                    class="rounded-circle width30 m-r-15"
                                                    alt="profile-image"><span>John</span></td>
                                            <td><span class="text-info">70 Bowman St. South Windsor, CT 06074</span>
                                            </td>
                                            <td>Sept 13, 2017</td>
                                            <td>Sept 16, 2017</td>
                                            <td><span class="badge badge-warning">MEDIUM</span></td>
                                            <td>
                                                <div class="progress m-b-0 m-t-10">
                                                    <div class="progress-bar progress-bar-warning" role="progressbar"
                                                        aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"
                                                        style="width: 40%;"> <span class="sr-only">40% Complete</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><span class="badge badge-success">Admit</span></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td><img src="assets/images/xs/avatar1.jpg"
                                                    class="rounded-circle width30 m-r-15" alt="profile-image"><span>Jack
                                                    Bird</span></td>
                                            <td><span class="text-info">123 6th St. Melbourne, FL 32904</span></td>
                                            <td>Sept 13, 2017</td>
                                            <td>Sept 22, 2017</td>
                                            <td><span class="badge badge-warning">MEDIUM</span></td>
                                            <td>
                                                <div class="progress m-b-0 m-t-10">
                                                    <div class="progress-bar" role="progressbar" aria-valuenow="100"
                                                        aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                                                        <span class="sr-only">100% Complete</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><span class="badge badge-default">Discharge</span></td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td><img src="assets/images/xs/avatar4.jpg"
                                                    class="rounded-circle width30 m-r-15" alt="profile-image"><span>Dean
                                                    Otto</span></td>
                                            <td><span class="text-info">123 6th St. Melbourne, FL 32904</span></td>
                                            <td>Sept 13, 2017</td>
                                            <td>Sept 23, 2017</td>
                                            <td><span class="badge badge-warning">MEDIUM</span></td>
                                            <td>
                                                <div class="progress m-b-0 m-t-10">
                                                    <div class="progress-bar progress-bar-success" role="progressbar"
                                                        aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"
                                                        style="width: 15%;"> <span class="sr-only">15% Complete</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><span class="badge badge-success">Admit</span></td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td><img src="assets/images/xs/avatar2.jpg"
                                                    class="rounded-circle width30 m-r-15" alt="profile-image"><span>Jack
                                                    Bird</span></td>
                                            <td><span class="text-info">4 Shirley Ave. West Chicago, IL 60185</span>
                                            </td>
                                            <td>Sept 17, 2017</td>
                                            <td>Sept 16, 2017</td>
                                            <td><span class="badge badge-success">LOW</span></td>
                                            <td>
                                                <div class="progress m-b-0 m-t-10">
                                                    <div class="progress-bar" role="progressbar" aria-valuenow="100"
                                                        aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                                                        <span class="sr-only">100% Complete</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><span class="badge badge-default">Discharge</span></td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td><img src="assets/images/xs/avatar5.jpg"
                                                    class="rounded-circle width30 m-r-15"
                                                    alt="profile-image"><span>Hughe L.</span></td>
                                            <td><span class="text-info">4 Shirley Ave. West Chicago, IL 60185</span>
                                            </td>
                                            <td>Sept 18, 2017</td>
                                            <td>Sept 18, 2017</td>
                                            <td><span class="badge badge-danger">HIGH</span></td>
                                            <td>
                                                <div class="progress m-b-0 m-t-10">
                                                    <div class="progress-bar progress-bar-danger" role="progressbar"
                                                        aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"
                                                        style="width: 85%;"> <span class="sr-only">85% Complete</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><span class="badge badge-success">Admit</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </section>
    @include('admin.layout.footerlink')
</body>

</html>