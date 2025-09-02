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
                    <h2>All Doctor</h2>
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
                            <form action="{{ route('admin.doctors.store') }}" method="POST" id="doctorForm"
                                class="form-wrap3 mb-30" data-bg-color="#f3f6f7" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="doctor_id" id="doctor_id">

                                <div class="row clearfix align-items-start">
                                    <!-- Left: Image Upload -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                           <div class="modern-upload-wrapper text-center" id="modern-upload-area">
                                                <label class="modern-upload-label" for="doctor_image">
                                                    <i class="zmdi zmdi-cloud-upload"></i>
                                                    Upload Doctor Image
                                                </label>
                                                <input type="file" class="modern-upload-input" name="doctor_image"
                                                    id="doctor_image" accept="image/*" onchange="previewImage(this);">
                                                <button type="button" class="modern-upload-btn"
                                                    onclick="document.getElementById('doctor_image').click();">
                                                    Choose File
                                                </button>
                                                <span class="modern-upload-info d-block mt-2">
                                                    Supported formats: jpg, png, jpeg. Max size: 2MB.
                                                </span>
                                                <span class="text-danger" id="media-error"></span>
                                                <div id="current_media" class="modern-upload-preview">
                                                    <img id="preview_image" src="#" alt="Preview"
                                                        style="display: none; max-width: 150px; border-radius: 8px;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Right: Info -->
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <input type="text" class="form-control" name="name" id="name"
                                                placeholder="Doctor Name">
                                        </div>
                                        <div class="form-group mb-3">
                                            <input type="text" class="form-control" name="specialization"
                                                id="specialization" placeholder="Specialization">
                                        </div>
                                    </div>
                                </div>

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
                                <table class="table" id="doctorsTable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Specialization</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($doctors as $doctor)
                                        <tr data-id="{{ $doctor->id }}">
                                            <td>{{ $doctor->id }}</td>
                                            <td><img src="{{ asset($doctor->image) }}" width="80" /></td>
                                            <td>{{ $doctor->name }}</td>
                                            <td>{{ $doctor->specialization }}</td>
                                            <td>
                                                <button class="btn btn-sm btn-primary edit-doctor">Edit</button>
                                                <button class="btn btn-sm btn-danger delete-doctor"
                                                    data-id="{{ $doctor->id }}">Delete</button>
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
        $('#doctorsTable').DataTable({
            order: [
                [0, 'desc']
            ],
            responsive: true,
            pageLength: 10,
            ordering: true,
        });
    });

    const uploadArea = document.getElementById('modern-upload-area');
    const uploadInput = document.getElementById('doctor_image');
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
                $('#doctor_image').trigger('change');
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
        const table = $('#doctorsTable').DataTable();

        $('#doctorForm').on('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(this);
            const doctorId = $('#doctor_id').val();
            const isEdit = !!doctorId;
            let url = isEdit ? `/admin/doctors/${doctorId}` : `{{ route('admin.doctors.store') }}`;

            if (isEdit) {
                formData.append('_method', 'PUT');
            }

            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    const doctor = response.data;
                    const imagePath = '/' + doctor.image;

                    const actionButtons = `
                    <button type="button" class="btn btn-sm btn-primary edit-doctor"
                        data-id="${doctor.id}"
                        data-name="${doctor.name}"
                        data-specialization="${doctor.specialization}"
                        data-image="${imagePath}">
                        Edit
                    </button>
                    <button type="button" class="btn btn-sm btn-danger delete-doctor"
                        data-id="${doctor.id}">
                        Delete
                    </button>
                `;
                    if (isEdit) {
                        // ✅ UPDATE using DataTable API
                        const row = table.row($(
                        `#doctorsTable tr[data-id="${doctor.id}"]`));
                        row.data([
                            doctor.id,
                            `<img src="${imagePath}" width="80">`,
                            doctor.name,
                            doctor.specialization,
                            actionButtons
                        ]).draw(false);
                    } else {
                        // ✅ ADD using DataTable API
                        const newRow = table.row.add([
                            doctor.id,
                            `<img src="${imagePath}" width="80">`,
                            doctor.name,
                            doctor.specialization,
                            actionButtons
                        ]).draw(false).node();
                        $(newRow).attr('data-id', doctor.id);
                    }

                    // ✅ Reset form
                    $('#doctorForm')[0].reset();
                    $('#doctor_id').val('');
                    $('#preview_image').hide().attr('src', '#');
                    $('#doctorForm button[type="submit"]').text('Submit');

                    Swal.fire('Success', response.message || 'Doctor saved!', 'success');
                },
                error: function() {
                    Swal.fire('Error', 'Something went wrong!', 'error');
                }
            });
        });

        $(document).on('click', '.edit-doctor', function() {
            const row = $(this).closest('tr');
            const id = row.data('id');
            const image = row.find('td:eq(1) img').attr('src');
            const name = row.find('td:eq(2)').text();
            const specialization = row.find('td:eq(3)').text();

            $('#doctor_id').val(id);
            $('#name').val(name);
            $('#specialization').val(specialization);
            $('#preview_image').attr('src', image).show();
            $('html, body').animate({
                scrollTop: 0
            }, 'slow');

            $('#doctorForm button[type="submit"]').text('Update');
        });


        $(document).on('click', '.delete-doctor', function(e) {
            e.preventDefault();
            const doctorId = $(this).data('id');
             const row = $(this).closest('tr');

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
                        url: `/admin/doctors/${doctorId}`,
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            console.log("res12",response)
                            if (response.success) {
                                Swal.fire({
                                    title: 'Deleted!',
                                    text: response.message ||
                                        'The doctor detail has been deleted.',
                                    icon: 'success',
                                    confirmButtonText: 'OK'
                                });

                                // Optionally remove the row from the table
                                row.fadeOut(300, function() {
                                    $(this).remove();
                                });
                            } else {
                                Swal.fire({
                                    title: 'Error!',
                                    text: response.message ||
                                        'Something went wrong.',
                                    icon: 'error',
                                    confirmButtonText: 'OK'
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
    });

    $('#cancel-btn').on('click', function() {
        resetForm();
    });

    function resetForm() {
        $('#doctorForm')[0].reset();
        $('#doctor_image').val('');
        $('#preview_image').attr('src', '#').hide();
        $('button[type="submit"]').text('Submit');

        $('.is-invalid').removeClass('is-invalid');
        $('.invalid-feedback').remove();
    }
    </script>
</body>

</html>