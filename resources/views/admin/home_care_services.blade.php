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
                    <h2>Home Care Services</h2>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Home Care Services</strong></h2>
                        </div>
                        <div class="body">
                            <form action="{{ route('admin.home_care_service.details.store') }}" method="POST"
                                enctype="multipart/form-data" id="homeCareForm" class="form-wrap3 mb-30"
                                data-bg-color="#f3f6f7">
                                @csrf
                                <input type="hidden" name="homeCare_id" id="homeCare_id"
                                    value="{{ $homeCare->id ?? '' }}">
                                <input type="hidden" name="slug" id="slug" value="{{ $homeCare->slug ?? '' }}">

                                <div class="row clearfix">
                                    <!-- Title -->
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label><strong>Facility Name</strong></label>
                                            <input type="text" class="form-control" name="title" id="title"
                                                placeholder="Enter Service Name" value="{{ $homeCare->title ?? '' }}">
                                        </div>
                                    </div>

                                    <!-- Display Order -->
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label><strong>Display Order</strong></label>
                                            <input type="number" class="form-control" name="display_order"
                                                id="display_order" placeholder="Display Order"
                                                value="{{ $homeCare->display_order ?? '' }}">
                                        </div>
                                    </div>

                                    <!-- Active Status -->
                                    <div class="col-sm-3">
                                        <div class="form-group form-check mt-2">
                                            <input type="checkbox" class="form-check-input" id="is_active"
                                                name="is_active" value="1"
                                                {{ !empty($homeCare->is_active) && $homeCare->is_active ? 'checked' : '' }}>
                                            <label class="form-check-label"
                                                for="is_active"><strong>Active</strong></label>
                                        </div>
                                    </div>
                                </div>

                                <!-- Image Upload -->
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label><strong>Banner Image</strong></label>
                                            <div class="modern-upload-wrapper" id="modern-upload-area1">
                                                <label class="modern-upload-label" for="image">
                                                    <i class="zmdi zmdi-cloud-upload"></i> Upload Image
                                                </label>
                                                <input type="file" class="modern-upload-input" name="image"
                                                    id="image" accept="image/*">
                                                <button type="button" class="modern-upload-btn"
                                                    onclick="document.getElementById('image').click();">Choose
                                                    File</button>
                                                <span class="modern-upload-info"></span>
                                                <span class="text-danger" id="image-error"></span>

                                                {{-- Preview Box --}}
                                                <div class="modern-upload-preview" id="current_image"
                                                    style="display: {{ !empty($homeCare->image) ? 'block' : 'none' }};">
                                                    <img id="preview-image"
                                                        src="{{ !empty($homeCare->image) ? asset($homeCare->image) : '' }}"
                                                        alt="Preview" style="max-width: 120px; max-height: 120px;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- summernote Sections -->
                                <div class="row clearfix">
                                    <div class="col-sm-6 mb-3">
                                        <label><strong>Purpose</strong></label>
                                        <textarea class="form-control summernote" name="purpose_html" id="purpose_html">{{ $homeCare->purpose_html ?? '' }}</textarea>
                                    </div>

                                    <div class="col-sm-6 mb-3">
                                        <label><strong>Services</strong></label>
                                        <textarea class="form-control summernote" name="services_html" id="services_html">{{ $homeCare->services_html ?? '' }}</textarea>
                                    </div>

                                    <div class="col-sm-6 mb-3">
                                        <label><strong>Benefits</strong></label>
                                        <textarea class="form-control summernote" name="benefits_html" id="benefits_html">{{ $homeCare->benefits_html ?? '' }}</textarea>
                                    </div>

                                    <div class="col-sm-6 mb-3">
                                        <label><strong>Considerations</strong></label>
                                        <textarea class="form-control summernote" name="considerations_html" id="considerations_html">{{ $homeCare->considerations_html ?? '' }}</textarea>
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
                                <table id="homeCareTable" class="table m-b-0 table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Service Name</th>
                                            <th>Image</th>
                                            <th>Order</th>
                                            <th>Status</th>
                                            <th>Purpose</th>
                                            <th>Services</th>
                                            <th>Benefits</th>
                                            <th>Considerations</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($homeCareServices as $service)
                                            <tr>
                                                <td>{{ $service->id }}</td>
                                                <td>{{ $service->title }}</td>
                                                <td>
                                                    @if (!empty($service->image) && file_exists(public_path($service->image)))
                                                        <img src="{{ asset($service->image) }}" alt="Service Image"
                                                            style="max-width: 100px; max-height: 100px; border-radius: 8px;">
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td>{{ $service->display_order }}</td>
                                                <td>
                                                    @if ($service->is_active)
                                                        <span class="badge bg-success">Active</span>
                                                    @else
                                                        <span class="badge bg-danger">Inactive</span>
                                                    @endif
                                                </td>
                                                <td>{!! Str::limit(strip_tags($service->purpose_html), 50) !!}</td>
                                                <td>{!! Str::limit(strip_tags($service->services_html), 50) !!}</td>
                                                <td>{!! Str::limit(strip_tags($service->benefits_html), 50) !!}</td>
                                                <td>{!! Str::limit(strip_tags($service->considerations_html), 50) !!}</td>
                                                <td>
                                                    <button class="btn btn-sm btn-primary edit-homecare"
                                                        data-id="{{ $service->id }}"
                                                        data-slug="{{ $service->slug }}"
                                                        data-title="{{ $service->title }}"
                                                        data-display_order="{{ $service->display_order }}"
                                                        data-is_active="{{ $service->is_active }}"
                                                        data-purpose_html="{{ $service->purpose_html }}"
                                                        data-services_html="{{ $service->services_html }}"
                                                        data-benefits_html="{{ $service->benefits_html }}"
                                                        data-considerations_html="{{ $service->considerations_html }}"
                                                        data-image_url="{{ !empty($service->image) ? asset($service->image) : '' }}">
                                                        Edit
                                                    </button>
                                                    <button class="btn btn-sm btn-danger delete-service"
                                                        data-id="{{ $service->id }}">
                                                        Delete
                                                    </button>
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
            $('#homeCareTable').DataTable({
                "pageLength": 10,
                "ordering": true,
                "searching": true,
                "lengthChange": true,
                "columnDefs": [{
                    "orderable": false,
                    "targets": [2, 9]
                }]
            });
        });

        document.getElementById('image').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    let preview = document.getElementById('preview-image');
                    preview.src = e.target.result;
                    document.getElementById('current_image').style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
        });

        $(document).ready(function() {
            // AJAX Form submit (create/update)
            $('#homeCareForm').on('submit', function(e) {
                e.preventDefault();
                const formData = new FormData(this);
                const homeCareId = $('#homeCare_id').val();
                const url = homeCareId ?
                    '{{ route('admin.home_care_service.details.update', ['id' => ':id']) }}'
                    .replace(
                        ':id', homeCareId) :
                    '{{ route('admin.home_care_service.details.store') }}';
                const method = homeCareId ? 'POST' : 'POST';

                if (homeCareId) {
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
            $(document).on('click', '.edit-homecare', function() {
                const id = $(this).data('id');
                const slug = $(this).data('slug');
                $('#homeCare_id').val(id);
                const title = $(this).data('title');
                const displayOrder = $(this).data('display_order');
                const isActive = $(this).data('is_active');
                const purposeHtml = $(this).data('purpose_html');
                const servicesHtml = $(this).data('services_html');
                const benefitsHtml = $(this).data('benefits_html');
                const considerationsHtml = $(this).data('considerations_html');

                const imageUrl = $(this).data('image_url');
                if (imageUrl) {
                    $('#preview-image').attr('src', imageUrl).show();
                    $('#current_image').show();
                } else {
                    $('#preview-image').attr('src', '').hide();
                    $('#current_image').hide();
                }

                $('#title').val(title);
                $('#display_order').val(displayOrder);
                $('#is_active').prop('checked', isActive == 1);
                $('#purpose_html').summernote('code', purposeHtml);
                $('#services_html').summernote('code', servicesHtml);
                $('#benefits_html').summernote('code', benefitsHtml);
                $('#considerations_html').summernote('code', considerationsHtml);

                $('button[type="submit"]').text('Update');
            });

            // Delete doctor
            $(document).on('click', '.delete-service', function(e) {
                e.preventDefault();
                const homeCareId = $(this).data('id');

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
                            url: `/admin/home_care_service/details/${homeCareId}`,
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
                                            'Home Care Service deleted successfully!',
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

                $('#homeCareForm')[0].reset();
                $('.summernote').each(function() {
                    $(this).summernote('code', '');
                });
                $('#preview-image').attr('src', '').hide();
                $('#current_image').hide();
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
