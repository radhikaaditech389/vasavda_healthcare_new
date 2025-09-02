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

    /* #add-director-form {
        display: none;
    } */
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
                    <h2>Edit director Service</h2>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>director Service</strong></small>
                            </h2>
                        </div>
                        <div class="body">
                            <form action="{{ route('admin.add_directors.store') }}" method="POST"
                                enctype="multipart/form-data" id="add-director-form" class="form-wrap3 mb-30"
                                data-bg-color="#f3f6f7">
                                @csrf
                                <input type="hidden" name="director_id" id="director_id">

                                <div class="row clearfix">
                                    <!-- Left side: Image Upload -->
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="modern-upload-wrapper" id="modern-upload-area">
                                                <label class="modern-upload-label" for="image">
                                                    <i class="zmdi zmdi-cloud-upload"></i>
                                                    Upload Director Image
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
                                            <input type="text" class="form-control" name="title" id="director_title"
                                                placeholder="title">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="category"
                                                id="director_category" placeholder="category">
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control" name="description" id="director_description"
                                                placeholder="Enter description" rows="2"
                                                style="border:1px solid #e3e3e3; border-radius:15px"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-primary btn-round"
                                            id="submitButton">Submit</button>
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
                                <table class="table m-b-0 table-hover" id="director-detail">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Image</th>
                                            <th>title</th>
                                            <th>description</th>
                                            <th>category</th>
                                            {{-- <th>Services</th> --}}
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($directors as $director)
                                        <tr data-id="{{ $director->id }}">
                                            <td><span class="list-name">
                                                    {{ str_pad($director->id, STR_PAD_LEFT) }}</span></td>
                                            <td>
                                                @if ($director->image)
                                                <img src="{{ asset($director->image) }}" alt="{{ $director->title }}"
                                                    width="100">
                                                @endif
                                            </td>
                                            <td>{{ $director->title }}</td>
                                            <td>{{ $director->description }}</td>
                                            <td>{{ $director->category }}</td>
                                            <td>
                                                <button type="button" class="btn btn-primary btn-round edit-director"
                                                    data-id="{{ $director->id }}" data-title="{{ $director->title }}"
                                                    data-description="{{ $director->description }}"
                                                    data-image="{{ $director->image }}"
                                                    data-category="{{ $director->category }}">Edit</button>
                                                <a href="#" class="btn btn-danger btn-round delete-director"
                                                    data-id="{{ $director->id }}">Delete</a>
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
        let base_url = "{{ url('/') }}";
        let deletedServices = [];

        $('#director-detail').DataTable({
            order: [
                [0, 'desc']
            ], // Sort by ID descending
            responsive: true,
            pageLength: 10,
            ordering: true,
        });

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
        $(document).on('click', '.edit-director', function() {
            // console.log('Edit button clicked');
            // $('#add-director-form').slideDown(); // or .show()

            deletedServices = [];

            let id = $(this).data('id');
            alert(id)
            let title = $(this).data('title');
            let description = $(this).data('description');
            let category = $(this).data('category');
            let image = $(this).data('image');

            console.log('Edit data:', {
                id,
                title,
                description,
                category,
                image
            }); // Debug

            // Set form values
            $('#director_id').val(id);
            $('#director_title').val(title);
            $('#director_description').val(description);
            $('#director_category').val(category);
            // $('#director_link').val(link);

            // Show current image if exists
            if (image) {
                $('#preview_image').attr('src', '/' + image).show();
            } else {
                $('#preview_image').hide();
            }

            // Change button text
            $('#submitButton').text('update');
        });
        $('#cancel-btn').on('click', function() {
            resetForm();
        });

        function resetForm() {
            // $('#add-director-form').slideUp(); // or .hide()
            $('#add-director-form')[0].reset();
            $('#service_id').val('');
            $('#preview_image').attr('src', '#').hide();
            $('#submitButton').text('Submit');
            // Clear any error states or messages
            $('.is-invalid').removeClass('is-invalid');
            $('.invalid-feedback').remove();
        }
        // Form submission handler

        let directorTable = $('#director-detail').DataTable();
        $('#add-director-form').on('submit', function (e) {
    e.preventDefault();

    const form = this;
    const formData = new FormData(form);
    const directorId = $('#director_id').val();

    const imageInput = document.getElementById('image');
    if (!imageInput.files.length && directorId) {
        formData.delete('image');
        formData.append('keep_existing_image', '1');
    }

    const url = directorId
        ? `/admin/add_directors/update/${directorId}`
        : $(form).attr('action');

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
        success: function (response) {
             
            const director = response.data;
            const directorIdPadded = String(director.id).padStart(2, '0');
            const imagePath = `${window.location.origin}/${director.image}`;

            const actionHtml = `
                <button type="button" class="btn btn-primary btn-round edit-director"
                    data-id="${director.id}"
                    data-title="${director.title}"
                    data-description="${director.description}"
                    data-image="${director.image}"
                    data-category="${director.category}">
                    Edit
                </button>
                <a href="#" class="btn btn-danger btn-round delete-director"
                    data-id="${director.id}">
                    Delete
                </a>
            `;

            const rowId = `raw_${directorIdPadded}`;
            const existingRow = $(`#${rowId}`);

            if (directorId) {
                            const row = $(`#director-detail tr[data-id="${directorId}"]`);
                            row.find('td:eq(0)').text(director.id);
                            row.find('td:eq(1) img').attr('src', imagePath);
                            row.find('td:eq(2)').text(director.title);
                            row.find('td:eq(3)').text(director.description);
                            row.find('td:eq(4)').text(director.category);

                            const actionHtml = `
                        <button type="button" class="btn btn-primary btn-round edit-director"
                            data-id="${director.id}"
                            data-title="${director.title}"
                            data-description="${director.description}"
                            data-image="${director.image}"
                            data-category="${director.category}">
                            Edit
                        </button>
                        <a href="#" class="btn btn-danger btn-round delete-director"
                            data-id="${director.id}">
                            Delete
                        </a>`;
                            row.find('td:eq(5)').html(actionHtml);
                        }
                        // ✅ Add new row
                        else {
                // ✅ Prepare new row data for DataTable
                const rowData = [
                    directorIdPadded,
                    `<img src="${imagePath}" width="100" />`,
                    director.title,
                    director.description,
                    director.category,
                    actionHtml
                ];

              const newRowNode = directorTable.row.add(rowData).draw(false).node();
                $(newRowNode).attr('id', rowId).attr('data-id', director.id);
            }

            // ✅ Reset form
            $('#add-director-form')[0].reset();
            $('#preview_image').hide();
            $('#director_id').val('');
            $('#submitButton').text('Submit');

            Swal.fire('Success', response.message || 'Director saved successfully!', 'success');
        },
        error: function (xhr) {
            let msg = 'An error occurred.';
            if (xhr.status === 422 && xhr.responseJSON?.errors) {
                msg = Object.values(xhr.responseJSON.errors).flat().join('\n');
            } else if (xhr.responseJSON?.message) {
                msg = xhr.responseJSON.message;
            }

            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: msg
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
            $('#director_services_container').html(row);
        }

        $(document).on('click', '.delete-director', function(e) {
            e.preventDefault();
            const directorId = $(this).data('id');
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
                        url: `/admin/add_directors/${directorId}`,
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

        console.log("Sd", preview)
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