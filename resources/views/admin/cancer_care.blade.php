<!doctype html>
<html class="no-js " lang="en">

<head>
    @include('admin.layout.headerlink')
    <!-- Summernote CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.css" rel="stylesheet">
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
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }

    .modern-upload-preview img {
        max-width: 80px;
        max-height: 80px;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(44, 62, 80, 0.10);
        background: #fff;
        position: relative;
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

    .remove-preview-img {
        position: absolute;
        top: 2px;
        right: 5px;
        color: white;
        background: rgba(0, 0, 0, 0.6);
        border-radius: 50%;
        cursor: pointer;
        font-size: 16px;
        padding: 0 5px;
        z-index: 10;
    }

    .select2-selection--multiple {
        margin-top: 7px;
        margin-left: 12px;
    }

    .degree-input-group {
        border-radius: 30px;
        overflow: hidden;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    }

    .degree-input-group input {
        border: none;
        padding: 12px 20px;
        font-size: 14px;
        outline: none;
    }

    .degree-input-group .btn-success {
        border-radius: 50px;
        /* pill shape */
        padding: 0 18px;
        background-color: #00c853;
        border: none;
        transition: background 0.3s;
    }

    .degree-input-group .btn-danger {
        border-radius: 50px;
        /* pill shape */
        padding: 0 18px;
        background-color: #db0711ff;
        border: none;
        transition: background 0.3s;
    }

    .degree-input-group .btn-success:hover {
        background-color: #00a844;
    }

    .degree-input-group .btn-danger:hover {
        background-color: #c00f2cff;
    }

    .degree-input-group .zmdi {
        font-size: 18px;
    }

    .form-desc {
        border: 1px solid #e3e3e3 !important;
        border-radius: 15px !important;
    }

    .form-content {
        padding: 10px 10px 0 10px !important;
        ;
        border: 1px solid #e3e3e3 !important;
        border-radius: 25px !important;
    }

    .text-content {
        width: 30% !important;
        margin-right: 15px !important;
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

    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>cancer care Details</h2>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>cancer care Details</strong></h2>
                        </div>
                        <div class="body">

                            <form action="{{ route('admin.cancer_care.store') }}" method="POST"
                                enctype="multipart/form-data" id="add-cancer-care-details-form" class="form-wrap3 mb-30"
                                data-bg-color="#f3f6f7">
                                <input type="hidden" name="cancer_care_id" id="cancer_care_id" value="">
                                <div class="row clearfix">

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>title</label>
                                            <input type="text" name="title" id="title" class="form-control"
                                                placeholder="Title">
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix mb-3">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea name="description" id="description"
                                                class="form-control summernote" placeholder="Description"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Book Contact No</label>
                                            <input type="text" name="book_contact_no" id="book_contact_no"
                                                class="form-control" maxlength="10" pattern="\d*"
                                                oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10);"
                                                placeholder="Enter 10-digit Contact Number">
                                        </div>
                                    </div>
                                </div>

                                <div class="modern-upload-wrapper" id="modern-upload-area1">
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
                                {{-- Symptoms --}}
                                <div class="row clearfix mb-3">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="description">symptoms</label>
                                            <textarea name="symptoms" id="symptoms" class="form-control summernote"
                                                placeholder="symptoms"></textarea>
                                        </div>
                                    </div>
                                </div>

                                {{-- Diagnosis --}}
                                <div class="row clearfix mb-3">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="description">Diagnosis</label>
                                            <textarea name="diagnosis" id="diagnosis" class="form-control summernote"
                                                placeholder="diagnosis"></textarea>
                                        </div>
                                    </div>
                                </div>



                                {{-- Risk factors --}}
                                <div class="row clearfix mb-3">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="description">Risk Factors</label>
                                            <textarea name="risk_factors" id="risk_factors"
                                                class="form-control summernote" placeholder="risk_factors"></textarea>
                                        </div>
                                    </div>
                                </div>

                                {{-- Treatment --}}
                                <div class="row clearfix mb-3">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="description">Treatment</label>
                                            <textarea name="treatment" id="treatment" class="form-control summernote"
                                                placeholder="treatment"></textarea>
                                        </div>
                                    </div>
                                </div>


                                <div class="modern-upload-wrapper" id="modern-upload-area1">
                                    <label class="modern-upload-label" for="image1">
                                        <i class="zmdi zmdi-cloud-upload"></i>
                                        care Image2
                                    </label>
                                    <input type="file" class="modern-upload-input" name="image2" id="image2"
                                        accept="image/*">
                                    <button type="button" class="modern-upload-btn"
                                        onclick="document.getElementById('image2').click();">
                                        Choose File
                                    </button>
                                    <span class="modern-upload-info"></span>
                                    <span class="text-danger" id="media-error"></span>
                                    <div id="current_media" class="modern-upload-preview">
                                        <img id="current_image2" src="#" alt="Preview" style="display: none;">
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <!-- <button type="submit" class="btn btn-primary btn-round">Update
                                            Sonography</button> -->
                                        <button type="submit" id="submitButton" class="btn btn-primary btn-round">
                                            Submit
                                        </button>
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
                                <table class="table m-b-0 table-hover" id="cancerCareTable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Image1</th>
                                            <th>Image2</th>
                                            <th>Book Contact No</th>
                                            <th>Symptoms</th>
                                            <th>Diagnosis</th>
                                            <th>Risk Factors</th>
                                            <th>Treatment</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cancer_care_data as $item)
                                        <tr id="row_{{ $item->id }}">
                                            <td>{{ str_pad($item->id, 3, '0', STR_PAD_LEFT) }}</td>
                                            <td>{{ $item->title }}</td>
                                            <td>{!! $item->description !!}</td>
                                            <td>
                                                @if ($item->image1)
                                                <img src="{{ asset($item->image1) }}" alt="Image1"
                                                    style="max-width: 100px;">
                                                @endif
                                            </td>
                                            <td>
                                                @if ($item->image2)
                                                <img src="{{ asset($item->image2) }}" alt="Image2"
                                                    style="max-width: 100px;">
                                                @endif
                                            </td>
                                            <td>{{ $item->book_contact_no }}</td>
                                            <td>{!! $item->symptoms !!}</td>
                                            <td>{!! $item->diagnosis !!}</td>
                                            <td>{!! $item->risk_factors !!}</td>
                                            <td>{!! $item->treatment !!}</td>
                                            <td>
                                                <button type="button" class="btn btn-primary btn-sm edit-btn"
                                                    data-id="{{ $item->id }}" data-title="{{ e($item->title) }}"
                                                    data-description="{{ e($item->description) }}"
                                                    data-book_contact_no="{{ e($item->book_contact_no) }}"
                                                    data-image1="{{asset($item->image1)}}"
                                                    data-image2="{{asset($item->image2)}}"
                                                    data-symptoms='@json(json_decode($item->symptoms, true))'
                                                    data-diagnosis='@json(json_decode($item->diagnosis, true))'
                                                    data-risk_factors='@json(json_decode($item->risk_factors, true))'
                                                    data-treatment='@json(json_decode($item->treatment, true))'>Edit</button>

                                                <!-- <form action="{{ route('admin.cancer_care.destroy', $item->id) }}"
                                                    method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Are you sure?')">Delete</button>
                                                </form> -->
                                                <button type="button" class="btn btn-danger btn-round delete-btn"
                                                    data-id="{{ $item->id }}">Delete</button>
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
    <!-- Summernote JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <script>
   
    let cancerCareTable;
    $(document).ready(function() {
        cancerCareTable = $('#cancerCareTable').DataTable({
            processing: true,
            serverSide: false, // ← temporarily disable to see raw data
        });
        $('.summernote').summernote({
            height: 200,
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['fontsize', 'color']],
                ['para', ['ul', 'ol', 'paragraph']],
            ]
        });



        // Image 1 preview
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

        // Image 2 preview
        $('#image2').on('change', function(e) {
            const file = e.target.files[0];

            if (file) {
                const reader = new FileReader();

                reader.onload = function(evt) {
                    $('#current_image2')
                        .attr('src', evt.target.result)
                        .css('display', 'block');
                };

                reader.readAsDataURL(file);
            } else {
                $('#current_image2')
                    .attr('src', '#')
                    .css('display', 'none');
            }
        });
        $('#image3').on('change', function(e) {
            let file = e.target.files[0];
            if (file) {
                let reader = new FileReader();
                reader.onload = function(evt) {
                    $('#current_image3').html('<img src="' + evt.target.result +
                        '" alt="Image 2">');
                    $('#current_image3').css('display', 'flex');
                };
                reader.readAsDataURL(file);
            } else {
                $('#current_image3').html('');
                $('#current_image3').css('display', 'none');
            }
        });
        $('#image4').on('change', function(e) {
            let file = e.target.files[0];
            if (file) {
                let reader = new FileReader();
                reader.onload = function(evt) {
                    $('#current_image4').html('<img src="' + evt.target.result +
                        '" alt="Image 4">');
                    $('#current_image4').css('display', 'flex');
                };
                reader.readAsDataURL(file);
            } else {
                $('#current_image4').html('');
                $('#current_image4').css('display', 'none');
            }
        });
        $('#image5').on('change', function(e) {
            let file = e.target.files[0];
            if (file) {
                let reader = new FileReader();
                reader.onload = function(evt) {
                    $('#current_image5').html('<img src="' + evt.target.result +
                        '" alt="Image 4">');
                    $('#current_image5').css('display', 'flex');
                };
                reader.readAsDataURL(file);
            } else {
                $('#current_image5').html('');
                $('#current_image5').css('display', 'none');
            }
        });
        $('#image6').on('change', function(e) {
            let file = e.target.files[0];
            if (file) {
                let reader = new FileReader();
                reader.onload = function(evt) {
                    $('#current_image6').html('<img src="' + evt.target.result +
                        '" alt="Image 4">');
                    $('#current_image6').css('display', 'flex');
                };
                reader.readAsDataURL(file);
            } else {
                $('#current_image6').html('');
                $('#current_image6').css('display', 'none');
            }
        });
    });

    $('#add-cancer-care-details-form').on('submit', function(e) {
        e.preventDefault();

        let form = this;
        let formData = new FormData(form);


        const cancerCareId = $('#cancer_care_id').val();
        // Change URL based on add/edit
        let url = cancerCareId ?
            `/admin/cancer_care/update/${cancerCareId}` // your update route
            :
            $(form).attr('action'); // store route

        // Disable submit button
        // $(form).find('button[type="submit"]').attr('disabled', true);

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
                const data = response.data;

                // Construct the image HTML
                const imagePath1 = window.location.origin + '/' + data.image1;
                const imagePath2 = window.location.origin + '/' + data.image2
                const image1Html = data.image1 ?
                    `<img src="/uploads/cancer_care/${data.image1}" width="100">` :
                    '';
                const image2Html = data.image2 ?
                    `<img src="/uploads/cancer_care/${data.image2}" width="100">` :
                    '';

                // Construct action buttons (Edit/Delete)
                const actionHtml = `
        <button type="button" class="btn btn-primary btn-sm edit-btn" data-id="${data.id}">Edit</button>
        <button type="button" class="btn btn-danger btn-sm delete-btn" data-id="${data.id}">Delete</button>
    `;


                // Prepare row data array for DataTable
                const rowData = [
                    data.id,
                    data.title,
                    data.description,
                    data.image1 ? `<img src="${imagePath1}" width="100" />` :
                    '',
                    data.image2 ? `<img src="${imagePath2}" width="100" />` :
                    '',
                    // ✅ Added
                    data.book_contact_no,
                    data.symptoms,
                    data.diagnosis,
                    data.risk_factors,
                    data.treatment,
                    actionHtml
                ];

                let row = $(`#cancerCareTable tbody tr[data-id="${data.id}"]`);

                if ($('#cancer_care_id').val()) {
                    row.children().eq(1).text(data.title);
                    row.children().eq(2).text(data.description);
                    row.children().eq(4).html(data.image1 ?
                        `<img src="${imagePath1}" width="100" />` : '');
                    row.children().eq(9).html(data.image2 ?
                        `<img src="${imagePath2}" width="100" />` : '');
                    row.children().eq(3).text(data.book_contact_no);
                    row.children().eq(5).text(data.symptoms);
                    row.children().eq(6).text(data.diagnosis);
                    row.children().eq(7).text(data.risk_factors);
                    row.children().eq(8).text(data.treatment);
                    row.children().eq(10).html(actionHtml);
                    // Editing existing row

                    // Find row index by ID (search in first column)
                    const rowIndex = cancerCareTable.rows().eq(0).filter(function(index) {
                        return cancerCareTable.cell(index, 0).data() == data.id;
                    });

                    if (rowIndex.length) {
                        cancerCareTable.row(rowIndex[0]).data(rowData).draw(false);
                    }
                } else {
                    const newRow = `
        <tr data-id="${data.id}">
            <td>${data.id}</td>
            <td>${data.title}</td>
            <td>${data.description}</td>
            <td>${data.book_contact_no}</td>
            <td>${image1Html}</td>
            <td>${data.symptoms}</td>
            <td>${data.diagnosis}</td>
            <td>${data.risk_factor}</td>
            <td>${data.treatment}</td>
            <td>${image2Html}</td>
            <td>${actionHtml}</td>
        </tr>
    `;
                    $('#cancerCareTable tbody').append(newRow);
                    // Adding new row
                    cancerCareTable.row.add(rowData).draw(false);
                }

                // Show success alert
                Swal.fire({
                    icon: 'success',
                    title: $('#cancer_care_id').val() ? 'Updated!' : 'Added!',
                    text: response.message || 'Cancer care details saved successfully.',
                    timer: 2000,
                    showConfirmButton: false
                });

                // Reset form and editor
                $('#add-cancer-care-details-form')[0].reset();
                $('.summernote').each(function() {
                    $(this).summernote('reset');
                });
                // $('.modern-upload-preview').hide().find('img').attr('src', '#');
                  $('#current_image1').hide().attr('src', '#');
                $('#cancer_care_id').val('');
                $('#submitButton').text('Submit');

                // Optionally update your table or UI here with new/updated data
            },
            error: function(xhr) {
                let msg = 'An error occurred.';
                if (xhr.status === 422) {
                    const errors = xhr.responseJSON.errors;
                    msg = '';
                    for (const key in errors) {
                        if (errors.hasOwnProperty(key)) {
                            msg += errors[key].join(' ') + '\n';
                        }
                    }
                } else if (xhr.responseJSON && xhr.responseJSON.message) {
                    msg = xhr.responseJSON.message;
                }

                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: msg,
                    confirmButtonText: 'OK'
                });

                // $(form).find('button[type="submit"]').attr('disabled', false);
            }
        });
    });

    $('#cancerCareTable tbody').on('click', '.edit-btn', function() {
        const id = $(this).data('id');

        // You might want to fetch details from the server for this ID,
        // or use cached data if available.

        // Example: AJAX call to get cancer care details
        $.ajax({
            url: `/admin/cancer_care/${id}`, // Adjust route as needed
            type: 'GET',
            success: function(response) {
                const data = response.data;

                $('#cancer_care_id').val(data.id);
                $('#title').val(data.title);
                $('#description').summernote('code', data.description);
                $('#book_contact_no').val(data.book_contact_no);
                $('#symptoms').summernote('code', data.symptoms);
                $('#diagnosis').summernote('code', data.diagnosis);
                $('#risk_factors').summernote('code', data.risk_factors);
                $('#treatment').summernote('code', data.treatment);
                  if (data.image1) {
                    $('#current_image1')
                        .attr('src', window.location.origin + '/' + data.image1)
                        .show();
                } else {
                    $('#current_image1').attr('src', '#').hide();
                }

                if (data.image2) {
                    $('#current_image2')
                        .attr('src', window.location.origin + '/' + data.image2)
                        .css('display', 'block');
                } else {
                    $('#current_image2')
                        .attr('src', '#')
                        .css('display', 'none');
                }
                $('#submitButton').text('Update');
                // Scroll to form or open modal if needed
                $('html, body').animate({
                    scrollTop: $('#add-cancer-care-details-form').offset().top
                }, 500);
            },
            error: function() {
                Swal.fire('Error', 'Unable to fetch data for editing', 'error');
            }
        });
    });


    $('#cancerCareTable tbody').on('click', '.delete-btn', function() {
        const id = $(this).data('id');
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
                    url: `/admin/cancer_care/${id}`,
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



    @if(session('success'))
    Swal.fire({
        didOpen: () => {
            document.querySelectorAll('.swal2-container select').forEach(el => el.remove());
        },
        icon: 'success',
        title: 'Success',
        text: "Cancer Care updated successfully!",
        timer: 5000,
        showConfirmButton: true,
    });
    @endif

    @if(session('error'))
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: "{{ session('error') }}",
    });
    @endif
    </script>
</body>

</html>