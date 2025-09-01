<!doctype html>
<html class="no-js " lang="en">

<head>
    @include('admin.layout.headerlink')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">


    <style>
    .service-form-control {
        gap: 5px;
        display: flex;
        width: 100%;
        padding: .375rem .75rem;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #495057;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #ced4da;
        border-radius: .25rem;
        transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;

    }

    /* Modern file upload styling */
    select#service_id {
        background: white !important;
        appearance: none !important;
        -webkit-appearance: none !important;
        -moz-appearance: none !important;
        border: 1px solid #ccc;
        padding: 10px;
    }

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
                                <input type="hidden" name="service_details_id" id="service_details_id" value="">

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
                                            <select name="service_id" id="service_id" class="service-form-control"
                                                style="height: 50px;margin-top: 4px;border-radius: 15px;">
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

                                        <div class="modern-upload-wrapper" id="modern-upload-area">
                                            <label class="modern-upload-label" for="image">
                                                <i class="zmdi zmdi-cloud-upload"></i>
                                                Upload Image
                                            </label>
                                            <input type="file" class="modern-upload-input" name="image1" id="image1"
                                                accept="image/*">
                                            <button type="button" class="modern-upload-btn"
                                                onclick="document.getElementById('image1').click();">
                                                Choose File
                                            </button>
                                            <span class="modern-upload-info"></span>
                                            <span class="text-danger" id="media-error"></span>
                                            <div id="current_media" class="modern-upload-preview">
                                                <img id="current_image1" src="#" alt="Preview" style="display: none;">
                                            </div>
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
                                        <button type="submit" id="submitButton"
                                            class="btn btn-primary btn-round">Submit</button>
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
                                <table class="table m-b-0 table-hover patientServiceTable" id="serviceTable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Image</th>
                                            <th>Service Name</th>
                                            <th>Service Title</th>
                                            <th>Service Full Description</th>
                                             <th>Image1</th>
                                            <th>Service Book Contact No</th>
                                            <th>Faq</th>
                                            <th>Benifits</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($service_details as $service_detail)
                                        <tr id="raw_{{ str_pad($service_detail->id, 2, '0', STR_PAD_LEFT) }}">
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
                                             <td>
                                                @if ($service_detail->image1)
                                                <img src="{{ asset($service_detail->image1) }}" alt="Service Image1"
                                                    width="100">
                                                @endif
                                            </td>
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
                                            {{-- ✅ Display Benefits --}}
                                            <td>
                                                @php
                                                $benefits = is_string($service_detail->benifits)
                                                ? json_decode($service_detail->benifits, true)
                                                : $service_detail->benifits;
                                                @endphp

                                                @if (is_array($benefits))
                                                {{ implode(', ', $benefits) }}
                                                @else
                                                {{ $benefits ?? '' }}
                                                @endif
                                            </td>

                                            <td>
                                                <button type="button" class="btn btn-primary btn-round edit-service"
                                                    data-id="{{ $service_detail->id }}"
                                                    data-service_id="{{ $service_detail->service_id }}"
                                                    data-title="{{ e($service_detail->title) }}"
                                                    data-short_desc="{{ e($service_detail->short_desc) }}"
                                                    data-full_desc="{{ htmlentities($service_detail->full_desc) }}"
                                                    data-image="{{ asset($service_detail->image) }}"
                                                    data-image1="{{ asset($service_detail->image1) }}"
                                                    data-book_contact_no="{{ e($service_detail->book_contact_no) }}"
                                                    data-faq='@json($service_detail->faq)'
                                                    data-benifits='@json($benefits)'>
                                                    Edit
                                                </button>

                                                <button type="button" class="btn btn-danger btn-round remove-service"
                                                    data-id="{{ $service_detail->id }}">Delete</button>
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

    <!-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/js/select2.min.js"></script> -->
    <!-- <script src="{{ asset('patient/js/vendor/jquery-3.6.0.min.js') }}"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script> -->

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Bootstrap (required by Summernote) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Summernote JS -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <script>
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

      $('#image1').on('change', function(e) {
            const file = e.target.files[0];

            if (file) {
                const reader = new FileReader();

                reader.onload = function(evt) {
                    $('#current_image1')
                        .attr('src', evt.target.result)
                        .css('display', 'block');
                };

                reader.readAsDataURL(file);
            } else {
                $('#current_image1')
                    .attr('src', '#')
                    .css('display', 'none');
            }
        });

    $(document).ready(function() {
        $('#serviceTable').DataTable({
            order: [
                [0, 'desc']
            ],
            responsive: true,
            pageLength: 10,
            ordering: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search services..."
            }
        });
        let deletedServices = [];

        // Add new service input field
        $(document).on('click', '.add-service', function() {
            const serviceDetailId = $('#service_details_id').val();
            const newRow = `
                    <div class="form-group service-row">
                        <div class="input-group service-input-group mb-3">
                            <input type="text" class="form-control" name="patient_services[]" placeholder="Patient Service Name">
                            <div class="input-group-append">
                                <button type="button" class="btn btn-danger remove-service"  data-id="${serviceDetailId}">
                                    <i class="zmdi zmdi-minus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                `;
            $(this).closest('.service-row').after(newRow);
        });

        function decodeHtmlEntities(str) {
            const txt = document.createElement('textarea');
            txt.innerHTML = str;
            return txt.value;
        }
        // Edit service handler
        // Use event delegation - bind to document or a parent static element
        $(document).on('click', '.edit-service', function() {
            const $btn = $(this);

            let benifits = $btn.data('benifits') || [];
            $('#service_details_id').val($btn.data('id'));
            $('#service_id').val($btn.data('service_id')).trigger('change');
            $('#title').val($btn.data('title'));
            $('#short_desc').val($btn.data('short_desc'));
            const fullDescDecoded = decodeHtmlEntities($btn.data('full_desc'));

            $('#full_desc').summernote('code', fullDescDecoded);

            // Set the HTML content
            $('#book_contact_no').val($btn.data('book_contact_no'));

            // Set image preview
            const image = $btn.data('image');
            if (image) {
                $('#preview_image').show().attr('src', image);
            }
            const image1 = $btn.data('image1');
            if (image1) {
                $('#current_image1').show().attr('src', image1);
            }

            // Set Benefits
            $('#benifits-wrapper').empty();
            if (typeof benifits === 'string') {
                try {
                    const parsedString = JSON.parse(benifits);
                    benifits = parsedString.split(',').map(b => b.trim());
                } catch (e) {
                    benifits = [];
                }
            }

            if (Array.isArray(benifits) && benifits.length > 0) {
                benifits.forEach((benefit, index) => {
                    $('#benifits-wrapper').append(`
                <div class="input-group mb-2 benefit-group">
                    <input type="text" name="benifits[]" class="form-control" placeholder="Benefit ${index + 1}" value="${benefit}">
                    <div class="input-group-append">
                        <button type="button" class="btn btn-danger remove-benefit">Remove</button>
                    </div>
                </div>
            `);
                });
            }

            // Set FAQs
            let faqs = $btn.data('faq');
            if (typeof faqs === 'string') {
                try {
                    faqs = JSON.parse(faqs);
                } catch (e) {
                    faqs = [];
                }
            }

            if (Array.isArray(faqs)) {
                let faqsHtml = '';
                faqs.forEach(f => {
                    faqsHtml += `
                <div class="faq-group mb-2">
                    <input type="text" name="faq_title[]" class="form-control mb-1" placeholder="FAQ Title" value="${f.title || ''}">
                    <textarea name="faq_desc[]" class="form-control summernote" placeholder="FAQ Description">${f.description || f.desc || ''}</textarea>
                </div>`;
                });
                $('#faqs-wrapper').html(faqsHtml);
                $('.summernote').summernote(); // re-initialize summernote
            }
             $('html, body').animate({
                    scrollTop: $('#add-service-details-form').offset().top
                }, 500);
            // $('button[type="submit"]').text('Update');
            $('#submitButton').text('Update');

        });



        const table = $('#serviceTable').DataTable();

        $('#add-service-details-form').on('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(this);

            // Validate required service ID
            const serviceDetailId = $('#service_details_id').val();
            alert(serviceDetailId);
            const serviceId = $('#service_id').val();
            if (!serviceId) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Missing Service',
                    text: 'Please select a service before submitting.'
                });
                return;
            }

            // Append structured FAQs
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

            // Append Benefits
            const benifits = $('input[name="benifits[]"]').map(function() {
                return $(this).val().trim();
            }).get().filter(b => b !== '');
            formData.append('benifits', JSON.stringify(benifits));
            console.log({
                serviceDetailId
            });
            let url = serviceDetailId ?
                `/admin/service_details/update/${serviceDetailId}` :
                `/admin/service_details/store`;
            console.log({
                url
            })
            // AJAX submit
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


                    const service = response.data;
                    console.log({
                        service
                    })

                    const imagePath = window.location.origin + '/' + service.image;
                    const imagePath1 = window.location.origin + '/' + service.image1;
                    // Render FAQ
                    const faqsHtml = Array.isArray(service.faq) ?
                        service.faq.map(f =>
                            `<strong>${f.title}</strong>: ${f.desc || f.description || ''}`
                        )
                        .join('<br>') :
                        '';

                    // Parse Benefits
                    const getBenefits = (benifitsStr) => {
                        try {
                            const benefits = JSON.parse(benifitsStr);
                            return Array.isArray(benefits) ? benefits.join(',') :
                                '';
                        } catch {
                            return '';
                        }
                    };
                    const benefitsText = getBenefits(service?.benifits);

                    const encodedService = encodeURIComponent(JSON.stringify(service));

                    function escapeHtml(text) {
                        if (!text) return '';
                        return text
                            .replace(/&/g, "&amp;")
                            .replace(/"/g, "&quot;")
                            .replace(/'/g, "&#39;")
                            .replace(/</g, "&lt;")
                            .replace(/>/g, "&gt;");
                    }


                    // const imagePath = window.location.origin + '/' + service.image;
                    const serviceDetailId = $('#service_details_id').val();
                    alert(serviceDetailId);
                    const actionHtml = `
                    <button type="button" class="btn btn-primary btn-round edit-service"
                            data-id="${service.id}"
                            data-service_id="${escapeHtml(service.service_id)}"
                            data-title="${escapeHtml(service.title)}"
                            data-short_desc="${escapeHtml(service.short_desc)}"
                            data-full_desc="${escapeHtml(service.full_desc)}"
                            data-image="${imagePath}"
                            data-image1="${imagePath1}"
                            data-book_contact_no="${escapeHtml(service.book_contact_no)}"
                            data-faq='${JSON.stringify(service.faq || [])}'
                                data-benifits='${JSON.stringify(benefitsText || [])}'>
                            Edit
                    </button>
                    <button type="button" class="btn btn-danger btn-round remove-service"
                            data-id="${service.id}">
                            Delete
                    </button>
                    `;

                    if (serviceDetailId) {
                        console.log("Sds", serviceDetailId)
                        console.log("upadra", service)
                        const serviceDetailId12 = String(service.id).padStart(2, '0');
                        console.log({
                            serviceDetailId12
                        });
                        const existingRow = $(`#raw_${serviceDetailId12}`);
                        console.log("dfkld", existingRow.length)
                        // Update row cells
                        existingRow.find('td:eq(0)').text(String(service.id).padStart(2,
                            '0'));
                        existingRow.find('td:eq(1)').html(service.image ?
                            `<img src="${imagePath}" width="100" />` : '');
                        existingRow.find('td:eq(2)').text(service.service_id || '');
                        existingRow.find('td:eq(3)').text(service.title || '');
                        existingRow.find('td:eq(4)').html(service.full_desc || '');
                        existingRow.find('td:eq(5)').html(service.image1 ?
                            `<img src="${imagePath1}" width="100" />` : '');
                        existingRow.find('td:eq(6)').text(service.book_contact_no ||
                            '');
                        existingRow.find('td:eq(7)').html(faqsHtml);
                        existingRow.find('td:eq(8)').text(benefitsText);
                        existingRow.find('td:eq(9)').html(actionHtml);
                    } else {

                        const rowData = [
                            service.id,
                            service.image ? `<img src="${imagePath}" width="100" />` :
                            '',
                            service.service_id || '',
                            service.title || '',
                            service.full_desc || '',
                            service.image1 ? `<img src="${imagePath1}" width="100" />` :
                            '',
                            service.book_contact_no || '',
                            faqsHtml,
                            benefitsText,
                            actionHtml
                        ];

                        const rowIndex = table.rows().eq(0).filter(function(index) {
                            return table.cell(index, 0).data() == String(service
                                .id);
                        });

                        if (rowIndex.length > 0) {
                            // Update existing row
                            const rowNode = table.row(rowIndex[0]).node();
                            rowNode.id = `raw_${service.id}`; // Set row ID
                            table.row(rowIndex[0]).data(rowData).draw(false);
                        } else {
                            // Add new row
                            const newRowNode = table.row.add(rowData).node();
                            newRowNode.id = `raw_${service.id}`; // Set row ID
                            table.draw(false);
                        }

                    }
                    // Reset form
                    $('#full_desc').summernote('code', '');


                    // Reset Benefits
                    $('#benifits-wrapper').html(`
                            <input type="text" name="benifits[]" class="form-control mb-1" placeholder="Benefit">
                        `);

                    // Reset FAQs
                    $('#faqs-wrapper').html(`
                            <div class="faq-group mb-2">
                                <input type="text" name="faq_title[]" class="form-control mb-1" placeholder="FAQ Title">
                                <textarea name="faq_desc[]" class="form-control summernote" placeholder="FAQ Description"></textarea>
                            </div>
                        `);
                    $('#add-service-details-form')[0].reset();
                    $('.summernote').summernote('reset');
                    $('#preview_image').hide().attr('src', '#');
                     $('#current_image1').hide().attr('src', '#');
                    $('#service_details_id').val('');
                    $('#submitButton').text('Submit');
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: response.message || 'Service saved successfully.',
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
                        console.error('Response parse error', e);
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
        $(document).on('click', '.remove-service', function(e) {
            e.preventDefault();
            const serviceId = $(this).data('id');
            alert(serviceId);
            const row = $(this).closest('tr');

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
                        url: `/admin/service_details/${serviceId}`,
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                'content')
                        },
                        success: function(response) {
                            if (response.success) {
                                Swal.fire({
                                    title: 'Deleted!',
                                    text: response.message ||
                                        'The service detail has been deleted.',
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
                                title: 'Error!',
                                text: 'Failed to delete service.',
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });
                            console.error('Delete failed:', error);
                        }
                    });
                }
            });
        });


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
    })
    </script>

    </script>
</body>

</html>