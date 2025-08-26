<!doctype html>
<html class="no-js " lang="en">

<head>
    @include('admin.layout.headerlink')
    <!-- Summernote CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

    <style>
        /* Modern file upload styling */
        .modern-upload-wrapper {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            background: #f8fafc;
            border: 2px dashed #43cea2;
            border-radius: 14px;
            padding: 28px 24px;
            margin-bottom: 18px;
            transition: border-color 0.2s;
            position: relative;
        }

        .modern-upload-wrapper.dragover {
            border-color: #185a9d;
            background: #e3f6fd;
        }

        .modern-upload-label {
            font-weight: 700;
            color: #185a9d;
            font-size: 1.13em;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .modern-upload-label i {
            font-size: 1.3em;
            color: #43cea2;
        }

        .modern-upload-input {
            opacity: 0;
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
            z-index: 2;
        }

        .modern-upload-btn {
            display: inline-block;
            background: linear-gradient(90deg, #43cea2 0%, #185a9d 100%);
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 10px 28px;
            font-weight: 700;
            font-size: 1em;
            cursor: pointer;
            margin-top: 8px;
            transition: background 0.2s;
            z-index: 3;
        }

        .modern-upload-btn:hover {
            background: linear-gradient(90deg, #185a9d 0%, #43cea2 100%);
        }

        .modern-upload-preview {
            margin-top: 16px;
            width: 100%;
        }

        .modern-upload-preview img {
            max-width: 220px;
            max-height: 120px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(44, 62, 80, 0.10);
            background: #fff;
            margin-right: 10px;
        }

        .modern-upload-info {
            color: #888;
            font-size: 0.98em;
            margin-top: 6px;
        }

        .text-danger {
            margin-top: 6px;
            display: block;
        }
    </style>
</head>

<body class="theme-cyan">
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>

    <!-- Top Bar -->
    @include('admin.layout.navbar')

    <!-- Left Sidebar -->
    @include('admin.layout.leftsidebar')

    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>All Doctor Details</h2>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Doctor</strong></h2>
                        </div>
                        <div class="body">
                            <form action="{{ route('admin.doctor.details.store') }}" method="POST" id="doctorForm"
                                class="form-wrap3 mb-30" data-bg-color="#f3f6f7">
                                @csrf
                                <input type="hidden" name="doctorDetails_id" id="doctorDetails_id">

                                <div class="row clearfix align-items-start">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="doctor_id">Select Doctor</label>
                                            <select class="form-control" name="doctor_id" id="doctor_id" required>
                                                <option value="">-- Select Doctor --</option>
                                                @foreach ($doctors as $doctor)
                                                    <option value="{{ $doctor->id }}">{{ $doctor->name }}
                                                        ({{ $doctor->specialization }})
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group mb-3">
                                            <input type="text" class="form-control" name="education" id="education"
                                                placeholder="Education">
                                        </div>

                                        <div class="form-group mb-3">
                                            <input type="text" class="form-control" name="languages" id="languages"
                                                placeholder="Languages (comma separated)">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="description">Description</label>
                                            <textarea class="form-control summernote" name="description" id="description" rows="6"
                                                placeholder="Short Description"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="experience">Experience</label>
                                            <textarea class="form-control summernote" name="experience" id="experience" rows="6" placeholder="Experience"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="extra_info">Extra Information</label>
                                            <textarea class="form-control summernote" name="extra_info" id="extra_info" rows="6"
                                                placeholder="Extra Information"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <!-- Submit Buttons -->
                                <div class="row mt-3">
                                    <div class="col-sm-12 text-end">
                                        <button type="submit" class="btn btn-primary btn-round">Submit</button>
                                        <button type="reset" class="btn btn-default btn-round btn-simple"
                                            id="cancel-btn">Cancel</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card patients-list">
                        <div class="body">
                            <div class="table-responsive">
                                <table id="doctorDetailTable" class="table m-b-0 table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Education</th>
                                            <th>Languages</th>
                                            <th>Description</th>
                                            <th>Experience</th>
                                            <th>Extra Information</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($doctorDetails as $doctor)
                                            <tr>
                                                <td><span class="list-name">
                                                        {{ str_pad($doctor->id, STR_PAD_LEFT) }}</span></td>
                                                <td>
                                                    <span class="list-name">{{ $doctor->doctor->name }}</span>
                                                </td>
                                                <td>{{ $doctor->education }}</td>
                                                <td>{{ $doctor->languages }}</td>
                                                <td>{!! $doctor->description !!}</td>
                                                <td>{!! $doctor->experience !!}</td>
                                                <td>{!! $doctor->extra_info !!}</td>
                                                <td>
                                                    <button type="button" class="btn btn-primary btn-round edit-doctor"
                                                        data-id="{{ $doctor->id }}"
                                                        data-doctor_id="{{ $doctor->doctor_id }}"
                                                        data-education="{{ $doctor->education }}"
                                                        data-languages="{{ $doctor->languages }}"
                                                        data-description="{{ $doctor->description }}"
                                                        data-experience="{{ $doctor->experience }}"
                                                        data-extra_info="{{ $doctor->extra_info }}">
                                                        Edit
                                                    </button>
                                                    <a href="#" class="btn btn-danger btn-round delete-doctor"
                                                        data-id="{{ $doctor->id }}">Delete</a>
                                                </td>
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

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#doctorDetailTable').DataTable({
                "pageLength": 10,
                "ordering": true,
                "searching": true,
                "lengthChange": true,
                "columnDefs": [{
                    "orderable": false,
                    "targets": [5, 6, 7]
                }]
            });
        });

        $(document).ready(function() {
            // AJAX Form submit (create/update)
            $('#doctorForm').on('submit', function(e) {
                e.preventDefault();
                const formData = new FormData(this);
                const doctorDetailsId = $('#doctorDetails_id').val();
                const url = doctorDetailsId ? '{{ route('admin.doctor.details.update', ['id' => ':id']) }}'
                    .replace(
                        ':id', doctorDetailsId) :
                    '{{ route('admin.doctor.details.store') }}';
                const method = doctorDetailsId ? 'POST' : 'POST';

                if (doctorDetailsId) {
                    formData.append('_method', 'PUT');
                }

                $.ajax({
                    url: url,
                    type: method,
                    data: formData,
                    cache: false,
                    processData: false,
                    contentType: false,
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if (response.status === 200 && response.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: response.message ||
                                    'Operation completed successfully!',
                                timer: 5000,
                                timerProgressBar: true,
                                willClose: () => window.location.reload()
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: response.message || 'Something went wrong!',
                                timer: 5000,
                                timerProgressBar: true
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'An error occurred: ' + error
                        });
                        console.log('Error:', error);
                    }
                });
            });

            // Edit doctor - pre-fill form
            $(document).on('click', '.edit-doctor', function() {
                const id = $(this).data('id');
                $('#doctorDetails_id').val(id);
                const doctorId = $(this).data('doctor_id');
                const education = $(this).data('education');
                const languages = $(this).data('languages');
                const description = $(this).data('description');
                const experience = $(this).data('experience');
                const extraInfo = $(this).data('extra_info');

                $('#doctor_id').val(doctorId);
                $('#education').val(education);
                $('#languages').val(languages);
                $('#description').summernote('code', description);
                $('#experience').summernote('code', experience);
                $('#extra_info').summernote('code', extraInfo);

                $('button[type="submit"]').text('Update');
            });

            // Delete doctor
            $(document).on('click', '.delete-doctor', function(e) {
                e.preventDefault();
                const doctorDetailsId = $(this).data('id');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: `/admin/doctor/details/${doctorDetailsId}`,
                            type: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(response) {
                                if (response.success) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Deleted',
                                        text: response.message ||
                                            'Doctor details deleted successfully!',
                                        timer: 5000,
                                        timerProgressBar: true,
                                        willClose: () => window.location
                                            .reload()
                                    });
                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Error',
                                        text: response.message ||
                                            'Failed to delete doctor details!',
                                        timer: 5000,
                                        timerProgressBar: true
                                    });
                                }
                            },
                            error: function(xhr, status, error) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: 'An error occurred: ' + error,
                                });
                                console.error('Error:', error);
                            }
                        });
                    }
                });
            });

            // Reset form
            $(document).on('click', 'button[type="reset"], .cancel-btn, #cancel-btn', function(e) {
                e.preventDefault();
                $('#doctorForm')[0].reset();
                $('.summernote').summernote('code', '');
                $('button[type="submit"]').text('Submit');
            });
        });
    </script>

    <!-- Summernote JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.summernote').summernote({
                height: 150, // editor height
                tabsize: 2,
                placeholder: 'Type here...',
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                ]
            });
        });
    </script>
</body>

</html>
