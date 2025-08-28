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

        /* Plus/Minus button design for service input group */
        .service-input-group {
            border-radius: 30px;
            overflow: hidden;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        .service-input-group input {
            border: none;
            padding: 12px 20px;
            font-size: 14px;
            outline: none;
        }

        .service-input-group .btn-success {
            border-radius: 50px;
            padding: 0 18px;
            background-color: #00c853;
            border: none;
            transition: background 0.3s;
        }

        .service-input-group .btn-danger {
            border-radius: 50px;
            padding: 0 18px;
            background-color: #db0711ff;
            border: none;
            transition: background 0.3s;
        }

        .service-input-group .btn-success:hover {
            background-color: #00a844;
        }

        .service-input-group .btn-danger:hover {
            background-color: #c00f2cff;
        }

        .service-input-group .zmdi {
            font-size: 18px;
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

    <!-- Right Sidebar -->
    @include('admin.layout.rightsidebar')

    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Add Patient Service</h2>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Patient Service</strong></small>
                            </h2>
                        </div>
                        <div class="body">
                            <form action="{{ route('admin.add_services.store') }}" method="POST"
                                enctype="multipart/form-data" id="add-services-form" class="form-wrap3 mb-30"
                                data-bg-color="#f3f6f7">
                                @csrf
                                <input type="hidden" name="service_id" id="service_id">

                                <div class="row clearfix">
                                    <!-- Left side: Image Upload -->
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="modern-upload-wrapper" id="modern-upload-area">
                                                <label class="modern-upload-label" for="service_image">
                                                    <i class="zmdi zmdi-cloud-upload"></i>
                                                    Upload Service Image
                                                </label>
                                                <input type="file" class="modern-upload-input" name="service_image"
                                                    id="service_image" accept="image/*" onchange="previewImage(this)">
                                                <button type="button" class="modern-upload-btn"
                                                    onclick="document.getElementById('service_image').click();">
                                                    Choose File
                                                </button>
                                                <span class="modern-upload-info">
                                                    Supported formats: Images (jpg, png, jpeg). Max size: 2MB.
                                                </span>
                                                <span class="text-danger" id="media-error"></span>
                                                <div id="current_media" class="modern-upload-preview">
                                                    <img id="preview_image" src="#" alt="Preview"
                                                        style="display: none;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Right side: Service Name + Link -->
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="service_name"
                                                id="service_name" placeholder="Service Name">
                                        </div>
                                        <!-- <div class="form-group">
                                            <input type="text" class="form-control" name="service_link"
                                                id="service_link" placeholder="Service Link" readonly>
                                        </div> -->
                                    </div>
                                </div>

                                {{-- <div class="col-sm-6">
                                        <div id="patient_services_container">
                                            <div class="form-group service-row">
                                                <div class="input-group service-input-group mb-3">
                                                    <input type="text" class="form-control" name="patient_services[]"
                                                        placeholder="Patient Service Name">
                                                    <div class="input-group-append">
                                                        <button type="button" class="btn btn-success add-service"><i
                                                                class="zmdi zmdi-plus"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}

                                <div class="row clearfix">
                                    <div class="col-sm-12">
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
                                <table id="servicesTable" class="table m-b-0 table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Image</th>
                                            <th>Service Name</th>
                                            <th>Service Link</th>
                                            {{-- <th>Services</th> --}}
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($services as $service)
                                            <tr>
                                                <td><span class="list-name">
                                                        {{ str_pad($service->id, STR_PAD_LEFT) }}</span></td>
                                                <td>
                                                    @if ($service->service_image)
                                                        <img src="{{ asset($service->service_image) }}"
                                                            alt="{{ $service->service_name }}" width="100">
                                                    @endif
                                                </td>
                                                <td>{{ $service->service_name }}</td>
                                                <td>{{ $service->service_link }}</td>
                                                {{-- <td>
                                                    @foreach ($service->patientServices as $patientService)
                                                        {{ $patientService->patient_service_name }}<br>
                                                    @endforeach
                                                </td> --}}
                                                <td>
                                                    <button type="button"
                                                        class="btn btn-primary btn-round edit-service"
                                                        data-id="{{ $service->id }}"
                                                        data-name="{{ $service->service_name }}"
                                                        data-image="{{ $service->service_image }}"
                                                        data-link="{{ $service->service_link }}">Edit</button>
                                                    <a href="#" class="btn btn-danger btn-round delete-service"
                                                        data-id="{{ $service->id }}">Delete</a>
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
            $('#servicesTable').DataTable({
                "pageLength": 10,
                "ordering": true,
                "searching": true,
                "lengthChange": true,
                "columnDefs": [{
                    "orderable": false,
                    "targets": [1, 4]
                }]
            });
        });

        $(document).ready(function() {
            let deletedServices = [];

            // Add new service input field
            $(document).on('click', '.add-service', function() {
                const newRow = `
                    <div class="form-group service-row">
                        <div class="input-group service-input-group mb-3">
                            <input type="text" class="form-control" name="patient_services[]" placeholder="Patient Service Name">
                            <div class="input-group-append">
                                <button type="button" class="btn btn-danger remove-service">
                                    <i class="zmdi zmdi-minus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                `;
                $(this).closest('.service-row').after(newRow);
            });

            // Edit service handler
            $(document).on('click', '.edit-service', function() {
                console.log('Edit button clicked');
                deletedServices = [];

                let id = $(this).data('id');
                let name = $(this).data('name');
                let link = $(this).data('link');
                let image = $(this).data('image');

                console.log('Edit data:', {
                    id,
                    name,
                    link,
                    image
                }); // Debug

                // Set form values
                $('#service_id').val(id);
                $('#service_name').val(name);
                $('#service_link').val(link);

                // Show current image if exists
                if (image) {
                    $('#preview_image').attr('src', '/' + image).show();
                } else {
                    $('#preview_image').hide();
                }

                // Change button text
                $('button[type="submit"]').text('Update');

                // Fetch patient services
                $.ajax({
                    url: `/admin/services/${id}/patient-services`,
                    type: 'GET',
                    success: function(response) {
                        console.log('Patient services:', response); // Debug
                        $('#patient_services_container').empty();

                        if (response.length === 0) {
                            addEmptyServiceRow();
                        } else {
                            response.forEach((service, index) => {
                                const row = `
                                    <div class="form-group service-row" data-patient-service-id="${service.id}">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="patient_services[]" 
                                                value="${service.patient_service_name}" placeholder="Patient Service Name">
                                            <div class="input-group-append">
                                                ${index === 0
                                        ? `<button type="button" class="btn btn-success add-service">
                                                                                                                                <i class="zmdi zmdi-plus"></i>
                                                                                                                               </button>`
                                        : `<button type="button" class="btn btn-danger remove-service">
                                                                                                                                <i class="zmdi zmdi-minus"></i>
                                                                                                                               </button>`
                                    }
                                            </div>
                                        </div>
                                    </div>
                                `;
                                $('#patient_services_container').append(row);
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching patient services:', error);
                        addEmptyServiceRow();
                    }
                });
            });

            // Form submission handler
            $('#add-services-form').on('submit', function(e) {
                e.preventDefault();

                const formData = new FormData(this);
                const serviceId = $('#service_id').val();

                if (serviceId) {
                    formData.append('is_update', '1');
                }

                const imageInput = document.getElementById('service_image');
                if (!imageInput.files.length && serviceId) {
                    formData.delete('service_image');
                    formData.append('keep_existing_image', '1');
                }

                if (deletedServices.length > 0) {
                    formData.append('deleted_services', JSON.stringify(deletedServices));
                }

                const patientServices = [];
                $('.service-row input[name="patient_services[]"]').each(function() {
                    if ($(this).val().trim() !== '') {
                        patientServices.push({
                            id: $(this).closest('.service-row').data(
                                'patient-service-id') || null,
                            name: $(this).val().trim()
                        });
                    }
                });
                formData.append('patient_services_data', JSON.stringify(patientServices));

                let url = serviceId ?
                    `/admin/services/update/${serviceId}` :
                    `/admin/services/store`;

                $.ajax({
                    url: url,
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        'Accept': 'application/json'
                    },
                    success: function(response) {
                        if (response.status === 'success' || response.success) {
                            Swal.fire({
                                title: 'Success!',
                                text: response.message || 'Service saved successfully.',
                                icon: 'success',
                                confirmButtonText: 'OK'
                            }).then(() => {
                                window.location.href =
                                    "{{ route('admin.add_services') }}";
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                        let msg = 'An error occurred while processing your request.';
                        if (xhr.responseText) {
                            try {
                                const res = JSON.parse(xhr.responseText);
                                if (res.message) msg = res.message;
                            } catch (e) {}
                        }
                        Swal.fire({
                            title: 'Error!',
                            text: msg,
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                });
            });

            // Remove service handler
            $(document).on('click', '.remove-service', function() {
                const serviceRow = $(this).closest('.service-row');
                const patientServiceId = serviceRow.data('patient-service-id');

                if (patientServiceId) {
                    // Only add to deletedServices if it's an existing service (has an ID)
                    deletedServices.push(patientServiceId);
                    console.log('Service marked for deletion:', patientServiceId);
                    console.log('Current deletedServices:', deletedServices);
                }
                serviceRow.remove();
            });

            // Cancel button handler
            $('#cancel-btn').on('click', function() {
                resetForm();
            });

            function resetForm() {
                $('#add-services-form')[0].reset();
                $('#service_id').val('');
                $('#preview_image').attr('src', '#').hide();
                deletedServices = [];
                addEmptyServiceRow();
                $('button[type="submit"]').text('Submit');

                // Clear any error states or messages
                $('.is-invalid').removeClass('is-invalid');
                $('.invalid-feedback').remove();
            }

            function addEmptyServiceRow() {
                const row = `
                    <div class="form-group service-row">
                        <div class="input-group service-input-group mb-3">
                            <input type="text" class="form-control" name="patient_services[]" 
                                placeholder="Patient Service Name">
                            <div class="input-group-append">
                                <button type="button" class="btn btn-success add-service">
                                    <i class="zmdi zmdi-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                `;
                $('#patient_services_container').html(row);
            }

            $(document).on('click', '.delete-service', function(e) {
                e.preventDefault();
                const serviceId = $(this).data('id');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "This action cannot be undone!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: `/admin/services/${serviceId}`,
                            type: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(response) {
                                if (response.success) {
                                    Swal.fire({
                                        title: 'Deleted!',
                                        text: response.message ||
                                            'The service has been deleted.',
                                        icon: 'success',
                                        confirmButtonText: 'OK'
                                    }).then(() => {
                                        window.location.href =
                                            "{{ route('admin.add_services') }}";
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
                                console.error('Error:', error);
                                Swal.fire({
                                    title: 'Error!',
                                    text: 'Failed to delete service.',
                                    icon: 'error',
                                    confirmButtonText: 'OK'
                                });
                            }
                        });
                    }
                });
            });
        });

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
                preview.src = '#';
                preview.style.display = 'none';
            }
        }
    </script>
</body>

</html>
