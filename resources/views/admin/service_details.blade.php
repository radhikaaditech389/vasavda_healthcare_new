<!doctype html>
<html class="no-js " lang="en">

<head>
    @include('admin.layout.headerlink')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
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
                    <h2>Add Service Details</h2>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong> Service Details</strong></small>
                            </h2>
                        </div>
                        <div class="body">
                            <form action="{{ route('admin.service_details.store') }}" method="POST"
                                enctype="multipart/form-data" id="add-service-details-form" class="form-wrap3 mb-30"
                                data-bg-color="#f3f6f7">
                                @csrf
                                <input type="hidden" name="service_details_id" id="service_details_id">

                                <div class="row clearfix">
                                    <!-- Left side: Image Upload -->
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="modern-upload-wrapper" id="modern-upload-area">
                                                <label class="modern-upload-label" for="image">
                                                    <i class="zmdi zmdi-cloud-upload"></i>
                                                    Upload Service Image
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

                                        <div class="form-group">
                                            <label>benifits</label>
                                            <div id="benifits-wrapper">
                                                <div class="input-group mb-2 benefit-group">
                                                    <input type="text" name="benifits[]" class="form-control"
                                                        placeholder="Benefit 1">
                                                    <div class="input-group-append">
                                                        <button type="button"
                                                            class="btn btn-danger remove-benefit">Remove</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-sm btn-primary" id="add-benefit">Add
                                                More</button>
                                        </div>

                                        <div class="form-group">
                                            <label>FAQs</label>
                                            <div id="faqs-wrapper">
                                                <div class="faq-group mb-3">
                                                    <div class="input-group mb-2">
                                                        <input type="text" name="faq_title[]" class="form-control"
                                                            placeholder="FAQ Title">
                                                    </div>
                                                    <div class="input-group">
                                                        <textarea name="faq_desc[]" class="form-control summernote"
                                                            placeholder="FAQ Description"></textarea>
                                                    </div>
                                                    <button type="button"
                                                        class="btn btn-danger btn-sm mt-2 remove-faq">Remove</button>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-sm btn-primary mt-2" id="add-faq">Add
                                                More</button>
                                        </div>
                                    </div>

                                    <!-- Right side: Service Name + Link -->
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="service_id">Select Service</label>
                                            <select name="service_id" id="service_id" class="form-control"
                                                style="height: 45px">
                                                <option value="">-- Choose Service --</option>

                                                @foreach($services as $service)
                                                <option value="{{ $service->id }}">{{ $service->service_name }}</option>

                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <input type="text" class="form-control" name="title" id="title"
                                                placeholder="Service title">
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control summernote" name="full_desc" id="full_desc"
                                                placeholder="Enter extra details"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <textarea class="form-control" name="short_desc" id="short_desc"
                                                placeholder="Enter Short Desc"
                                                style="border: 1px solid #cccccc;"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" maxLength="10" class="form-control"
                                                name="book_contact_no" id="book_contact_no"
                                                placeholder="Service book contact no">

                                        </div>



                                    </div>
                                </div>

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
                                <table class="table m-b-0 table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Image</th>
                                            <th>Service Name</th>
                                            <th>Service Title</th>
                                            <th>Service Full Description</th>
                                            <th>Service Book Contact No</th>
                                            <th>Faq</th>
                                            <th>Benifits</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($service_details as $service_detail)
                                        <tr>
                                            <td><span class="list-name">
                                                    {{ str_pad($service_detail->id, 2, '0', STR_PAD_LEFT) }}
                                                </span></td>

                                            <td>
                                                @if ($service_detail->image)
                                                <img src="{{ asset($service_detail->image) }}" alt="Service Image"
                                                    width="100">
                                                @endif
                                            </td>

                                            <td>{{ $service_detail->service_id }}</td>
                                            <td>{{ $service_detail->title }}</td>
                                            <td>{!! $service_detail->full_desc !!}</td>
                                            <td>{{ $service_detail->book_contact_no }}</td>

                                            {{-- ✅ Display Faq --}}
                                            <td>
                                                @if (is_array($service_detail->faq))
                                                @foreach ($service_detail->faq as $faq)
                                                <strong>{{ $faq['title'] }}</strong>: {!! $faq['desc'] ??
                                                $faq['description'] ?? '' !!}<br>
                                                @endforeach
                                                @endif
                                            </td>
<?php dd( $service_detail);?>
                                            {{-- ✅ Display Benefits --}}
                                            <td>
                                               {{ $service_detail->benifits}}
                                            </td>

                                            <td>
                                                <button type="button" class="btn btn-primary btn-round edit-service"
                                                    data-id="{{ $service_detail->id }}"
                                                    data-title="{{ $service_detail->title }}">Edit</button>

                                                <a href="#" class="btn btn-danger btn-round delete-service_detail"
                                                    data-id="{{ $service_detail->id }}">Delete</a>
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

    <!-- jQuery (required) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap (required by Summernote) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Summernote JS -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script>
    function reinitSummernote() {
        $('.summernote').summernote({
            height: 200,
            toolbar: [
                ['style', ['bold', 'italic', 'underline']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', ['link']],
                ['view', ['codeview']]
            ]
        });
    }
    reinitSummernote()

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
        $('#add-service-details-form').on('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(this);

            // Optional: Validate service selection
            const serviceId = $('#service_id').val();
            if (!serviceId) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Missing Service',
                    text: 'Please select a service before submitting.'
                });
                return;
            }


            // Append structured FAQ data (title + description)
            const faqTitles = $('input[name="faq_title[]"]').map(function() {
                return $(this).val();
            }).get();

            const faqDescs = $('textarea[name="faq_desc[]"]').map(function() {
                return $(this).val();
            }).get();

            const faqs = [];
            for (let i = 0; i < faqTitles.length; i++) {
                if (faqTitles[i].trim() !== '' || faqDescs[i].trim() !== '') {
                    faqs.push({
                        title: faqTitles[i],
                        description: faqDescs[i]
                    });
                }
            }
            formData.append('faq', JSON.stringify(faqs));

            // Append benifits[]
            const benifits = $('input[name="benifits[]"]').map(function() {
                return $(this).val().trim();
            }).get().filter(b => b !== '');
            formData.append('benifits', JSON.stringify(benifits));

            // Define URL
            const url = "{{ route('admin.service_details.store') }}";

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
                    // Swal.fire({
                    //     title: 'Success!',
                    //     text: response.message ||
                    //         'Service detail saved successfully.',
                    //     icon: 'success',
                    //     confirmButtonText: 'OK'
                    // });

                    const service = response.data;
                    // Example data structure for FAQ and Benefits (rendering as plain text or comma-separated)
                    const faqs = service?.faq.map(f =>
                        `<strong>${f.title}</strong>: ${f.desc}`).join('<br>');
                    // const benifits = service?.benifits ? service.benifits.join(', ') : '';

                    const newRow = `
        <tr>
            <td>${service?.id}</td>
            <td>
                ${service.image ? `<img src="${window.location.origin}/${service.image}" width="100" />` : ''}
            </td>
             <td>${service.service_id || ''}</td>
            <td>${service.title || ''}</td>
            <td>${service.full_desc || ''}</td>
            <td>${service.book_contact_no || ''}</td>
              <td>${faqs || ''}</td>
    <td>
        @if (is_array($service->benifits))
            {{ implode(', ', $service->benifits) }}
        @endif
    </td>
            <td>
                <button type="button" class="btn btn-primary btn-round edit-service"
                    data-id="${service?.id}" data-title="${service.title}">Edit</button>
                <a href="#" class="btn btn-danger btn-round delete-service_detail"
                    data-id="${service?.id}">Delete</a>
            </td>
        </tr>
    `;

                    $('table tbody').append(newRow);

                    // Optional: reset form
                    $('#add-service-details-form')[0].reset();
                    $('.summernote').summernote('reset');
                },

                error: function(xhr) {
                    let msg = 'An error occurred.';

                    try {
                        const res = JSON.parse(xhr.responseText);
                        if (res.message) msg = res.message;
                    } catch (e) {
                        console.error('Response parse error', e);
                    }

                    // Swal.fire({
                    //     title: 'Error!',
                    //     text: msg,
                    //     icon: 'error',
                    //     confirmButtonText: 'OK'
                    // });
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
            $('#add-service-details-form')[0].reset();
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
                                    window.location.reload();
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
    //benifit add and remove
    let benefitCount = 1;

    document.getElementById('add-benefit').addEventListener('click', function() {
        benefitCount++;
        const wrapper = document.getElementById('benifits-wrapper');

        const newBenefit = document.createElement('div');
        newBenefit.classList.add('input-group', 'mb-2', 'benefit-group');
        newBenefit.innerHTML = `
            <input type="text" name="benifits[]" class="form-control" placeholder="Benefit ${benefitCount}">
            <div class="input-group-append">
                <button type="button" class="btn btn-danger remove-benefit">Remove</button>
            </div>
        `;

        wrapper.appendChild(newBenefit);
    });

    // Remove benefit input on click
    document.addEventListener('click', function(e) {
        if (e.target && e.target.classList.contains('remove-benefit')) {
            e.target.closest('.benefit-group').remove();
        }
    });

    //faq add and remove

    document.getElementById('add-faq').addEventListener('click', function() {
        const wrapper = document.getElementById('faqs-wrapper');

        const faqGroup = document.createElement('div');
        faqGroup.classList.add('faq-group', 'mb-3');

        faqGroup.innerHTML = `
            <div class="input-group mb-2">
                <input type="text" name="faq_title[]" class="form-control" placeholder="FAQ Title">
            </div>
            <div class="input-group">
             <textarea class="form-control summernote" name="faq_desc[]"
                                                id="faq_desc[]"
                                                placeholder="FAQ Description"></textarea>
            </div>
            <button type="button" class="btn btn-danger btn-sm mt-2 remove-faq">Remove</button>
        `;

        wrapper.appendChild(faqGroup);
        reinitSummernote()
    });

    // Remove FAQ
    document.addEventListener('click', function(e) {
        if (e.target && e.target.classList.contains('remove-faq')) {
            e.target.closest('.faq-group').remove();
        }
    });
    </script>

    </script>
</body>

</html>