<!doctype html>
<html class="no-js " lang="en">

<head>
    @include('admin.layout.headerlink')

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
                    <h2>All Clinics</h2>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Clinics</strong></h2>
                        </div>
                        <div class="body">
                            <form action="{{ route('admin.clinics.store') }}" method="POST" id="clinicForm"
                                class="form-wrap3 mb-30" data-bg-color="#f3f6f7" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="clinic_id" id="clinic_id">

                                <div class="row clearfix align-items-start">
                                    <!-- Left Side Inputs -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="modern-upload-wrapper text-center" id="modern-upload-area">
                                                <label class="modern-upload-label" for="clinic_image">
                                                    <i class="zmdi zmdi-cloud-upload"></i>
                                                    Upload Clinic Image
                                                </label>
                                                <input type="file" class="modern-upload-input" name="clinic_image"
                                                    id="clinic_image" accept="image/*" onchange="previewImage(this);">
                                                <button type="button" class="modern-upload-btn"
                                                    onclick="document.getElementById('clinic_image').click();">
                                                    Choose File
                                                </button>
                                                <span class="modern-upload-info d-block mt-2">
                                                    Supported formats: jpg, png, jpeg. Max size: 2MB.
                                                </span>
                                                <span class="text-danger" id="media-error"></span>
                                                <div id="current_media" class="modern-upload-preview mt-3">
                                                    <img id="preview_image" src="#" alt="Preview"
                                                        style="display: none; max-width: 150px; border-radius: 8px;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Right Side Image Upload -->
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <input type="text" class="form-control" name="title" id="title"
                                                placeholder="Clinic Name">
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
                                <table id="clinicTable" class="table m-b-0 table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Clinic Name</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($clinics as $clinic)
                                            <tr>
                                                <td><span class="list-name">
                                                        {{ str_pad($clinic->id, STR_PAD_LEFT) }}</span></td>
                                                <td>{{ $clinic->title }}</td>
                                                <td>
                                                    @if ($clinic->image)
                                                        <img src="{{ asset($clinic->image) }}"
                                                            alt="{{ $clinic->title }}" width="100">
                                                    @endif
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-primary btn-round edit-clinic"
                                                        data-id="{{ $clinic->id }}" data-title="{{ $clinic->title }}"
                                                        data-image="{{ asset($clinic->image) }}">
                                                        Edit
                                                    </button>
                                                    <a href="#" class="btn btn-danger btn-round delete-clinic"
                                                        data-id="{{ $clinic->id }}">Delete</a>
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
            $('#clinicTable').DataTable({
                "pageLength": 10,
                "ordering": true,
                "searching": true,
                "lengthChange": true,
                "columnDefs": [{
                    "orderable": false,
                    "targets": [2, 3]
                }]
            });
        });

        const uploadArea = document.getElementById('modern-upload-area');
        const uploadInput = document.getElementById('clinic_image');
        if (uploadArea && uploadInput) {
            uploadArea.addEventListener('dragover', function(e) {
                e.preventDefault();
                uploadArea.classList.add('dragover');
            });
            uploadArea.addEventListener('dragleave', function(e) {
                e.preventDefault();
                uploadArea.classList.remove('dragover');
            });
            uploadArea.addEventListener('drop', function(e) {
                e.preventDefault();
                uploadArea.classList.remove('dragover');
                if (e.dataTransfer.files && e.dataTransfer.files.length) {
                    uploadInput.files = e.dataTransfer.files;
                    $('#clinic_image').trigger('change');
                }
            });
        }

        function previewImage(input) {
            const preview = document.getElementById('preview_image');

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                }

                reader.readAsDataURL(input.files[0]);
            } else {
                preview.src = '';
                preview.style.display = 'none';
            }
        }

        $(document).ready(function() {
            $('#clinicForm').on('submit', function(e) {
                e.preventDefault();
                const formData = new FormData(this);
                const clinicId = $('#clinic_id').val();
                const url = clinicId ? '{{ route('admin.clinics.update', ['id' => ':id']) }}'.replace(
                    ':id', clinicId) : '{{ route('admin.clinics.store') }}';
                const method = clinicId ? 'POST' : 'POST';

                if (clinicId) {
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
                                willClose: () => {
                                    window.location.reload();
                                }
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
                            text: 'An error occurred: ' + error,
                        });
                        console.log('Error:', error);
                    }
                });
            });

            $(document).on('click', '.edit-clinic', function() {
                console.log('Edit button clicked');

                let id = $(this).data('id');
                let title = $(this).data('title');
                let image = $(this).data('image');

                $('#clinic_id').val(id);
                $('#title').val(title);

                if (image) {
                    $('#preview_image').attr('src', image).show();
                } else {
                    $('#preview_image').hide();
                }

                $('button[type="submit"]').text('Update');

                $('html, body').animate({ scrollTop: 0 }, 'slow');
            });

            $(document).on('click', '.delete-clinic', function(e) {
                e.preventDefault();
                const clinicId = $(this).data('id');

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
                            url: `/admin/clinics/${clinicId}`,
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
                                            'Clinic deleted successfully!',
                                        timer: 5000,
                                        timerProgressBar: true,
                                        willClose: () => {
                                            window.location.reload();
                                        }
                                    });
                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Error',
                                        text: response.message ||
                                            'Failed to delete clinic data!',
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

                $(document).on('click',
                    'button[type="reset"], .cancel-btn, #cancel-btn, button:contains("Cancel")',
                    function(e) {
                        e.preventDefault();

                        $('#clinicForm')[0].reset();
                        $('#clinic_image').val('');
                        $('#preview_image').removeAttr('src').hide();
                        $('button[type="submit"]').text('Submit');
                        $('.text-danger').text('');
                    });

            });
        });
    </script>
</body>

</html>
