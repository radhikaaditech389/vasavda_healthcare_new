<!doctype html>
<html class="no-js " lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    @include('admin.layout.headerlink')
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
                    <h2>Add Facility</h2>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Facility</strong></small>
                            </h2>
                        </div>
                        <div class="body">
                            <form action="{{ route('admin.facilities.store') }}" method="POST"
                                enctype="multipart/form-data" id="add-facility-form" class="form-wrap3 mb-30"
                                data-bg-color="#f3f6f7">
                                @csrf
                                <input type="hidden" name="facility_id" id="facility_id">

                                <div class="row clearfix">
                                    <!-- Left side: Image Upload -->
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="modern-upload-wrapper" id="modern-upload-area">
                                                <label class="modern-upload-label" for="image">
                                                    <i class="zmdi zmdi-cloud-upload"></i>
                                                    Upload Facility Image
                                                </label>
                                                <input type="file" class="modern-upload-input" name="image" id="image"
                                                    accept="image/*" onchange="previewImage(this)">
                                                <button type="button" class="modern-upload-btn"
                                                    onclick="document.getElementById('image').click();">
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
                                            <input type="text" class="form-control" name="title" id="title"
                                                placeholder="title">
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control" name="description" id="description"
                                                placeholder="Enter description" rows="2"
                                                style="border:1px solid #e3e3e3; border-radius:15px"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <button type="submit" id="submitButton" class="btn btn-primary btn-round">Submit</button>
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
                    <div class="card directors-list">
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table m-b-0 table-hover" id="facility-detail">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Image</th>
                                            <th>title</th>
                                            <th>description</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($facilities as $facility)
                                        <tr data-id="{{ $facility->id }}">
                                            <td><span class="list-name">
                                                    {{ str_pad($facility->id, STR_PAD_LEFT) }}</span></td>
                                            <td>
                                                @if ($facility->image)
                                                <img src="{{ asset($facility->image) }}" alt="{{ $facility->title }}"
                                                    width="100">
                                                @endif
                                            </td>
                                            <td>{{ $facility->title }}</td>
                                            <td>{{ $facility->description }}</td>
                                            <td>
                                                <button type="button" class="btn btn-primary btn-round edit-facility"
                                                    data-id="{{ $facility->id }}" data-title="{{ $facility->title }}"
                                                    data-description="{{ $facility->description }}"
                                                    data-image="{{ $facility->image }}">Edit</button>
                                                <a href="#" class="btn btn-danger btn-round delete-facility"
                                                    data-id="{{ $facility->id }}">Delete</a>
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
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready(function() {

        $('#facility-detail').DataTable({
            order: [
                [0, 'desc']
            ], // Sort by ID descending
            responsive: true,
            pageLength: 10,
            ordering: true,          
        });
        let base_url = "{{ url('/') }}";
        let deletedFacilities = [];

        // Add new service input field
        $(document).on('click', '.add-director', function() {
            const newRow = `
                    <div class="form-group director-row">
                        <div class="input-group service-input-group mb-3">
                            <input type="text" class="form-control" name="director_services[]" placeholder="director Service Name">
                            <div class="input-group-append">
                                <button type="button" class="btn btn-danger remove-service">
                                    <i class="zmdi zmdi-minus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                `;
            $(this).closest('.director-row').after(newRow);
        });

        // Edit service handler
        $(document).on('click', '.edit-facility', function() {
            // console.log('Edit button clicked');
            deletedServices = [];

            let id = $(this).data('id');
            let title = $(this).data('title');
            let description = $(this).data('description');
            let image = $(this).data('image');

            console.log('Edit data:', {
                id,
                title,
                description,
                image
            }); // Debug

            // Set form values
            $('#facility_id').val(id);
            $('#title').val(title);
            $('#description').val(description);
            // $('#director_link').val(link);

            // Show current image if exists
            if (image) {
                let imagePath = image;

                // If it's not a full URL, prepend base URL
                if (!image.startsWith('http')) {
                    imagePath = window.location.origin + '/' + image.replace(/^\/+/, '');
                }

                $('#preview_image').attr('src', imagePath).show();
            } else {
                $('#preview_image').hide();
            }

            // Change button text
            // $('button[type="submit"]').text('Update');
             $('#submitButton').text('Update');
            // Fetch director services

            $.ajax({
                url: `/admin/facilities/${id}/facility`,
                type: 'GET',
                success: function(response) {
                    console.log('facility:', response); // Debug
                    $('#facilities_container').empty();

                    if (response.length === 0) {
                        addEmptyServiceRow();
                    } else {
                        response.forEach((service, index) => {
                            const row = `
                                    <div class="form-group director-row" data-director-service-id="${service.id}">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="director_services[]" 
                                                value="${service.director_service_name}" placeholder="director Service Name">
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
                            $('#facilities_container').append(row);
                             $('html, body').animate({
                    scrollTop: $('#add-facility-form').offset().top
                }, 500);
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching director services:', error);
                    addEmptyServiceRow();
                }
            });
        });

        function escapeHtml(text) {
            if (!text) return '';
            return text
                .replace(/&/g, "&amp;")
                .replace(/"/g, "&quot;")
                .replace(/'/g, "&#39;")
                .replace(/</g, "&lt;")
                .replace(/>/g, "&gt;");
        }
        const table = $('#facility-detail').DataTable();
        $('#add-facility-form').on('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(this);
            const facilityId = $('#facility_id').val();

            if (facilityId) {
                formData.append('is_update', '1');
            }

            // Handle image: keep old if not changed
            const imageInput = document.getElementById('image');
            if (!imageInput.files.length && facilityId) {
                formData.delete('image');
                formData.append('keep_existing_image', '1');
            }

            // Append deleted facilities (if any)
            if (typeof deletedFacilities !== 'undefined' && deletedFacilities.length > 0) {
                formData.append('deleted_facilities', JSON.stringify(deletedFacilities));
            }

            // Append dynamic facilities input
            const facilities = [];
            $('.facility-row input[name="facilities[]"]').each(function() {
                const name = $(this).val().trim();
                if (name !== '') {
                    facilities.push({
                        id: $(this).closest('.facility-row').data(
                            'facility-service-id') || null,
                        name
                    });
                }
            });
            formData.append('facility_data', JSON.stringify(facilities));

            // Set endpoint
            const url = facilityId ?
                `/admin/facilities/update/${facilityId}` :
                `/admin/facilities/store`;

            $.ajax({
                url,
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Accept': 'application/json'
                },
                success: function(response) {
                    if (!response.success) return;

                    const facility = response.data;
                    const imagePath = window.location.origin + '/' + (facility.image || '');

                    const actionHtml = `
                <button type="button" class="btn btn-primary btn-round edit-facility"
                    data-id="${facility.id}"
                    data-title="${escapeHtml(facility.title)}"
                    data-description="${escapeHtml(facility.description)}"
                    data-image="${imagePath}">
                    Edit
                </button>
                <a href="#" class="btn btn-danger btn-round delete-facility" data-id="${facility.id}">Delete</a>
            `;

                    const rowData = [
                        facility.id,
                        facility.image ? `<img src="${imagePath}" width="100">` : '',
                        facility.title,
                        facility.description,
                        actionHtml
                    ];

                    // Handle table row (add or update)
                    const paddedId = String(facility.id).padStart(2, '0');
                    const existingRow = $(`#raw_${paddedId}`);

                    if (typeof table !== 'undefined') {
                        if (existingRow.length > 0) {
                            // Update
                            table.row(existingRow).data(rowData).draw(false);
                        } else {
                            // Add
                            const newRow = table.row.add(rowData).draw(false).node();
                            $(newRow).attr('id', `raw_${paddedId}`);
                        }
                    } else {
                        // No DataTable — fallback append
                        const newRowHtml = `
                    <tr id="raw_${paddedId}" data-id="${facility.id}">
                        <td>${facility.id}</td>
                        <td><img src="${imagePath}" width="100" /></td>
                        <td>${facility.title}</td>
                        <td>${facility.description}</td>
                        <td>${actionHtml}</td>
                    </tr>
                `;

                        if (facilityId) {
                            $(`#facility-detail tr[data-id="${facility.id}"]`).replaceWith(
                                newRowHtml);
                        } else {
                            $('#facility-detail').append(newRowHtml);
                        }
                    }

                    // Reset form and UI
                    $('#add-facility-form')[0].reset();
                    $('#facility_id').val('');
                    $('#preview_image').hide();
                    $('#submitButton').text('Submit');

                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: response.message || 'Facility saved successfully.',
                        timer: 2000,
                        showConfirmButton: false
                    });
                },
                error: function(xhr) {
                    let msg = 'An error occurred.';
                    try {
                        const res = JSON.parse(xhr.responseText);
                        if (res.message) msg = res.message;
                    } catch (e) {
                        console.error('JSON parse error:', e);
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
            const serviceRow = $(this).closest('.director-row');
            const directorServiceId = serviceRow.data('director-service-id');

            if (directorServiceId) {
                // Only add to deletedServices if it's an existing service (has an ID)
                deletedServices.push(directorServiceId);
                console.log('Service marked for deletion:', directorServiceId);
                console.log('Current deletedServices:', deletedServices);
            }
            serviceRow.remove();
        });

        // Cancel button handler
        $('#cancel-btn').on('click', function() {
            resetForm();
        });

        function resetForm() {
            $('#add-facility-form')[0].reset();
            $('#facility_id').val('');
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
                    <div class="form-group director-row">
                        <div class="input-group service-input-group mb-3">
                            <input type="text" class="form-control" name="director_services[]" 
                                placeholder="director Service Name">
                            <div class="input-group-append">
                                <button type="button" class="btn btn-success add-service">
                                    <i class="zmdi zmdi-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                `;
            $('#facilities_container').html(row);
        }

        $(document).on('click', '.delete-facility', function(e) {
            e.preventDefault();
            const faciltyId = $(this).data('id');
            const row = $(this).closest('tr'); // get the row of the clicked button

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
                        url: `/admin/facilities/${faciltyId}`,
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            if (response.success) {
                                Swal.fire({
                                    title: 'Deleted!',
                                    text: response.message ||
                                        'The director has been deleted.',
                                    icon: 'success',
                                    confirmButtonText: 'OK'
                                });

                                // ✅ Remove row without reloading
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
                            console.error('Error:', error);
                            Swal.fire({
                                title: 'Error!',
                                text: 'Failed to delete director.',
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