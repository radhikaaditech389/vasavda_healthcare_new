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

        .modern-upload-preview img,
        .modern-upload-preview video {
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
                    <h2>All Sliders</h2>
                </div>
            </div>
        </div>

        <!-- Add Slider Form -->
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Slider</strong></h2>
                        </div>
                        <div class="body">
                            <form id="sliderForm" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="slider_id" id="slider_id">
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="modern-upload-wrapper" id="modern-upload-area">
                                                <label class="modern-upload-label" for="media">
                                                    <i class="zmdi zmdi-cloud-upload"></i>
                                                    Upload Image or Video
                                                </label>
                                                <input type="file" class="modern-upload-input" name="media"
                                                    id="media" accept="image/*,video/*">
                                                <button type="button" class="modern-upload-btn"
                                                    onclick="document.getElementById('media').click();">
                                                    Choose File
                                                </button>
                                                <span class="modern-upload-info">
                                                    Supported formats: Images (jpg, png, jpeg) and Videos (mp4, mov,
                                                    avi). Max
                                                    size: 2MB.
                                                </span>
                                                <span class="text-danger" id="media-error"></span>
                                                <div id="current_media" class="modern-upload-preview"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="title1">Title 1</label>
                                            <input type="text" class="form-control" name="title1" id="title1"
                                                required>
                                            <span class="text-danger" id="title1-error"></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="title2">Title 2</label>
                                            <input type="text" class="form-control" name="title2" id="title2"
                                                required>
                                            <span class="text-danger" id="title2-error"></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="title3">Title 3</label>
                                            <input type="text" class="form-control" name="title3" id="title3"
                                                required>
                                            <span class="text-danger" id="title3-error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-primary btn-round"
                                            id="submitBtn">Upload</button>
                                        <button type="reset"
                                            class="btn btn-default btn-round btn-simple">Cancel</button>
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
                                <table id="slidersTable" class="table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Media</th>
                                            <th>Title 1</th>
                                            <th>Title 2</th>
                                            <th>Title 3</th>
                                            <th>Sequence</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="slidersTable">
                                        @include('admin.partials.slider-table')
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
            $('#slidersTable').DataTable({
                "pageLength": 10,
                "ordering": true,
                "searching": true,
                "lengthChange": true,
                "columnDefs": [{
                    "orderable": false,
                    "targets": [1, 6]
                }]
            });
        });

        $(document).ready(function() {
            // Form submission handler
            $('#sliderForm').on('submit', function(e) {
                e.preventDefault();
                const formData = new FormData(this);
                const sliderId = $('#slider_id').val();
                const url = sliderId ? '{{ route('admin.slider.update', ['id' => ':id']) }}'.replace(':id',
                    sliderId) : '{{ route('admin.slider.store') }}';
                const method = sliderId ? 'POST' : 'POST';

                if (sliderId) {
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
                        console.log(response);
                        if (response.status === 'success' || response.status === true) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: response.message ||
                                    'Operation completed successfully!',
                                timer: 5000,
                                timerProgressBar: true,
                            }).then(() => {
                                window.location.reload();
                            });

                            $('#sliderForm')[0].reset();
                            $('#slider_id').val('');
                            $('#submitBtn').text('Upload');
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: response.message || 'Something went wrong!',
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        const errors = xhr.responseJSON.errors;
                        if (errors) {
                            for (const key in errors) {
                                if (errors.hasOwnProperty(key)) {
                                    $(`#${key}-error`).text(errors[key][0]);
                                }
                            }
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'An error occurred: ' + error,
                            });
                        }
                    }
                });
            });

            // Edit button handler
            $('.edit-slider').on('click', function() {
                const id = $(this).data('id');
                const sequence = $(this).data('sequence');
                const image = $(this).data('image');
                const video = $(this).data('video');
                const mediaType = $(this).data('media-type');
                const title1 = $(this).data('title1');
                const title2 = $(this).data('title2');
                const title3 = $(this).data('title3');

                $('#slider_id').val(id);
                $('#sequence').val(sequence);
                $('#title1').val(title1);
                $('#title2').val(title2);
                $('#title3').val(title3);
                $('#submitBtn').text('Update');

                $('#current_media').empty();
                if (mediaType === 'image' && image) {
                    $('#current_media').append(
                        `<img src="${image}" style="width: 50%; height: auto;" alt="Current Media" class="img-fluid">`
                    );
                } else if (mediaType === 'video' && video) {
                    $('#current_media').append(
                        `<video src="${video}" style="width: 50%; height: auto;" controls class="img-fluid"></video>`
                    );
                }

                $('html, body').animate({ scrollTop: 0 }, 'slow');
            });

            // Cancel button handler
            $('button[type="reset"]').on('click', function(e) {
                e.preventDefault();
                $('#sliderForm')[0].reset();
                $('#slider_id').val('');
                $('#current_media').empty();
                $('#submitBtn').text('Upload');
                $('.text-danger').text(''); // Hide all validation messages
            });

            // Add file input change handler
            $('#media').on('change', function(e) {
                const file = e.target.files[0];
                if (!file) {
                    $('#current_media').empty();
                    return;
                }

                // Clear previous preview
                $('#current_media').empty();

                // Validate file size
                const maxSize = 20 * 1024 * 1024; // 2MB
                if (file.size > maxSize) {
                    $('#media-error').text('File size must not exceed 2MB');
                    $('#media').val('');
                    return;
                }

                // Create preview based on file type
                if (file.type.startsWith('image/')) {
                    const img = new Image();
                    img.onload = function() {
                        // Validate image dimensions
                        const maxWidth = 1920;
                        const maxHeight = 1080;
                        if (img.width > maxWidth || img.height > maxHeight) {
                            $('#media-error').text(
                                `Image dimensions must not exceed ${maxWidth}x${maxHeight}`);
                            $('#media').val('');
                            return;
                        }
                        $('#current_media').html(`
                            <div class="mb-2">
                                <p>New Image Preview:</p>
                                <img src="${img.src}" class="img-thumbnail mt-2" style="max-height: 150px;">
                            </div>
                        `);
                    };
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        img.src = e.target.result;
                    };
                    reader.readAsDataURL(file);
                } else if (file.type.startsWith('video/')) {
                    const video = document.createElement('video');
                    video.onloadedmetadata = function() {
                        // Validate video dimensions
                        const maxWidth = 1920;
                        const maxHeight = 1080;
                        if (video.videoWidth > maxWidth || video.videoHeight > maxHeight) {
                            $('#media-error').text(
                                `Video dimensions must not exceed ${maxWidth}x${maxHeight}`);
                            $('#media').val('');
                            return;
                        }
                        $('#current_media').html(`
                            <div class="mb-2">
                                <p>New Video Preview:</p>
                                <video controls class="mt-2" style="max-height: 150px;">
                                    <source src="${video.src}" type="${file.type}">
                                    Your browser does not support the video tag.
                                </video>
                            </div>
                        `);
                    };
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        video.src = e.target.result;
                    };
                    reader.readAsDataURL(file);
                }
            });

            // Modern drag & drop for upload area
            const uploadArea = document.getElementById('modern-upload-area');
            const uploadInput = document.getElementById('media');
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
                        $('#media').trigger('change');
                    }
                });
            }

            // Ensure delete-slider click event is properly bound
            $(document).on('click', '.delete-slider', function() {
                const id = $(this).data('id');

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
                            url: '{{ route('admin.slider.delete', ['id' => ':id']) }}'
                                .replace(':id', id),
                            type: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(response) {
                                if (response.status === 'success' || response.status ===
                                    true) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Deleted',
                                        text: response.message ||
                                            'Slider deleted successfully!',
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
                                            'Something went wrong!',
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
                    }
                });
            });
        });
    </script>
</body>

</html>
