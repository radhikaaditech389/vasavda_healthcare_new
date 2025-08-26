<!doctype html>
<html class="no-js " lang="en">

<head>
    @include('admin.layout.headerlink')

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
</head>

<body class="theme-cyan">
    <!-- Top Bar -->
    @include('admin.layout.navbar')
    {{-- leftsidebar --}}
    @include('admin.layout.leftsidebar')

    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>All Appointments
                        {{-- <small class="text-muted">Welcome to Compass</small> --}}
                    </h2>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card patients-list">
                        <div class="body">
                            <div class="table-responsive">
                                <table id="patientListTable" class="table m-b-0 table-hover">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Area</th>
                                            <th>Appointment Date</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($appointments as $appointment)
                                            <tr>
                                                {{-- <td><span class="list-icon"><img class="patients-img" src="{{ asset('admin/images/xs/avatar1.jpg') }}" alt=""></span></td> --}}
                                                <td><span class="list-name">{{ $loop->iteration }}</span></td>
                                                <td>{{ $appointment->name }}</td>
                                                <td>{{ $appointment->email }}</td>
                                                <td>{{ $appointment->area }}</td>
                                                <td>{{ $appointment->phone }}</td>
                                                {{-- <td>{{ $appointment->appointment_date }}</td> --}}
                                                <td>{{ $appointment->appointment_date->format('d/m/Y H:i:s') }}</td>
                                                {{-- <td><span class="badge badge-success">Approved</span></td> --}}
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Jquery Core Js -->
    @include('admin.layout.footerlink')
</body>

</html>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#patientListTable').DataTable({
            "pageLength": 10,
            "ordering": true,
            "searching": true,
            "lengthChange": true,
            "columnDefs": [{
                "orderable": false,
                "targets": []
            }]
        });
    });
</script>
