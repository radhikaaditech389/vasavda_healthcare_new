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
                    <h2>All Patients Contacts
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
                                <table id="contactListTable" class="table m-b-0 table-hover">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Message</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($contacts as $contact)
                                            <tr>
                                                {{-- <td><span class="list-icon"><img class="patients-img" src="{{ asset('admin/images/xs/avatar1.jpg') }}" alt=""></span></td> --}}
                                                <td><span class="list-name">{{ $loop->iteration }}</span></td>
                                                <td>{{ $contact->name }}</td>
                                                <td>{{ $contact->email }}</td>
                                                <td>{{ $contact->phone }}</td>
                                                <td>{{ $contact->message }}</td>
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
        $('#contactListTable').DataTable({
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
