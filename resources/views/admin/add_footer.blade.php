<!doctype html>
<html class="no-js " lang="en">

<head>
    @include('admin.layout.headerlink')
    <!-- Summernote CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.css" rel="stylesheet">

    <style>
        .logo-upload-wrapper {
            display: inline-block;
            position: relative;
            border: 2px dashed #ccc;
            border-radius: 8px;
            padding: 10px;
            cursor: pointer;
            transition: border-color 0.3s ease;
            text-align: center;
        }

        .logo-upload-wrapper:hover {
            border-color: #999;
        }

        .logo-upload-wrapper img {
            max-width: 200px;
            height: auto;
            display: block;
            margin: 0 auto;
        }

        .logo-upload-wrapper .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.4);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
            border-radius: 8px;
            font-weight: bold;
        }

        .logo-upload-wrapper:hover .overlay {
            opacity: 1;
        }

        .swal2-container .swal2-select {
            display: none !important;
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
                    <h2>Add Header & Footer Content</h2>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Header & Footer</strong></h2>
                        </div>
                        <div class="body">
                            <form
                                action="{{ isset($footers[0]) ? route('admin.footer.update', $footers[0]->id) : route('admin.footer.store') }}"
                                method="POST" id="footer_form" class="form-wrap3 mb-30" data-bg-color="#f3f6f7"
                                enctype="multipart/form-data">
                                @csrf
                                @if (isset($footers[0]))
                                    @method('PUT')
                                    <input type="hidden" name="footer_id" id="footer_id" value="{{ $footers[0]->id }}">
                                @endif
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group text-left">
                                            <label class="logo-upload-wrapper">
                                                <img id="preview_image"
                                                    src="{{ isset($footers[0]) && $footers[0]->logo_image ? asset($footers[0]->logo_image) : 'https://via.placeholder.com/200?text=Upload+Logo' }}"
                                                    alt="Preview">
                                                <div class="overlay">Click to change</div>
                                                <input type="file" name="logo_image" id="logo_image" accept="image/*"
                                                    onchange="previewImage(this)" style="display: none;">
                                            </label>
                                            <small class="text-muted d-block mt-2">Supported formats: jpg, png,
                                                jpeg</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="description" class="font-weight-bold">
                                                <i class="fas fa-align-left"></i> Address
                                            </label>
                                            <textarea class="form-control summernote" name="address" id="address" placeholder="Enter address">{{ isset($footers[0]) ? $footers[0]->address : '' }}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="description" class="font-weight-bold">
                                                <i class="fas fa-align-left"></i> Description
                                            </label>
                                            <textarea name="description" id="description" class="form-control summernote" placeholder="Enter detailed description">{{ isset($footers[0]) ? $footers[0]->description : '' }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="phone_no" id="phone_no"
                                                placeholder="Enter phone number"
                                                value="{{ isset($footers[0]) ? $footers[0]->phone_no : '' }}">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="email" class="form-control" name="email" id="email"
                                                placeholder="Enter email"
                                                value="{{ isset($footers[0]) ? $footers[0]->email : '' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="days" id="days"
                                                placeholder="Enter days"
                                                value="{{ isset($footers[0]) ? $footers[0]->days : '' }}">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="hospital_time"
                                                id="hospital_time" placeholder="Enter hospital time"
                                                value="{{ isset($footers[0]) ? $footers[0]->hospital_time : '' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="consulting_time"
                                                id="consulting_time" placeholder="Enter consulting time"
                                                value="{{ isset($footers[0]) ? $footers[0]->consulting_time : '' }}">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="special_time"
                                                id="special_time" placeholder="Enter special time"
                                                value="{{ isset($footers[0]) ? $footers[0]->special_time : '' }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="yt_link" id="yt_link"
                                                placeholder="Enter youtube link"
                                                value="{{ isset($footers[0]) ? $footers[0]->yt_link : '' }}">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="insta_link"
                                                id="insta_link" placeholder="Enter instagram link"
                                                value="{{ isset($footers[0]) ? $footers[0]->insta_link : '' }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-primary btn-round">
                                            {{ isset($footers[0]) ? 'Update' : 'Submit' }}
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

    {{-- <section class="content">
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
                                            <th>Logo</th>
                                            <th>Description</th>
                                            <th>Address</th>
                                            <th>Phone no.</th>
                                            <th>Email</th>
                                            <th>Days</th>
                                            <th>Hospital Time</th>
                                            <th>Consulting Time</th>
                                            <th>Youtube</th>
                                            <th>Instagram</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (isset($footers[0]))
                                            <tr>
                                                <td><span class="list-name">{{ str_pad($footers[0]->id, STR_PAD_LEFT) }}</span></td>
                                                <td>
                                                    @if ($footers[0]->logo_image)
                                                        <img src="{{ asset($footers[0]->logo_image) }}" alt="{{ $footers[0]->email }}"
                                                            width="100">
                                                    @endif
                                                </td>
                                                <td>{{ $footers[0]->description }}</td>
                                                <td>{{ $footers[0]->address }}</td>
                                                <td>{{ $footers[0]->phone_no }}</td>
                                                <td>{{ $footers[0]->email }}</td>
                                                <td>{{ $footers[0]->days }}</td>
                                                <td>{{ $footers[0]->hospital_time }}</td>
                                                <td>{{ $footers[0]->consulting_time }}</td>
                                                <td>{{ $footers[0]->yt_link }}</td>
                                                <td>{{ $footers[0]->insta_link }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-primary btn-round edit-footer"
                                                        data-id="{{ $footers[0]->id }}"
                                                        data-logo_image="{{ $footers[0]->logo_image }}"
                                                        data-description="{{ $footers[0]->description }}"
                                                        data-address="{{ $footers[0]->address }}"
                                                        data-phone_no="{{ $footers[0]->phone_no }}"
                                                        data-email="{{ $footers[0]->email }}" data-days="{{ $footers[0]->days }}"
                                                        data-hospital_time="{{ $footers[0]->hospital_time }}"
                                                        data-consulting_time="{{ $footers[0]->consulting_time }}"
                                                        data-yt_link="{{ $footers[0]->yt_link }}"
                                                        data-insta_link="{{ $footers[0]->insta_link }}">Edit</button>
                                                </td>
                                            </tr>
                                        @else
                                            <tr>
                                                <td colspan="12" class="text-center text-muted">No footer data found.</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- Jquery Core Js -->
    @include('admin.layout.footerlink')

    <script>
        $(document).ready(function() {
            // Only allow edit, not add or delete
            $('.delete-footer').remove(); // Remove delete button if present

            $(document).on('click', '.edit-footer', function() {
                console.log("Edit button clicked");
                let id = $(this).data('id');
                let logo_image = $(this).data('logo_image');
                let description = $(this).data('description');
                let address = $(this).data('address');
                let phone_no = $(this).data('phone_no');
                let email = $(this).data('email');
                let days = $(this).data('days');
                let hospital_time = $(this).data('hospital_time');
                let consulting_time = $(this).data('consulting_time');
                let special_time = $(this).data('special_time');
                let yt_link = $(this).data('yt_link');
                let insta_link = $(this).data('insta_link');

                $('#footer_id').val(id);
                $('#description').val(description);
                $('#address').val(address);
                $('#phone_no').val(phone_no);
                $('#email').val(email);
                $('#days').val(days);
                $('#hospital_time').val(hospital_time);
                $('#consulting_time').val(consulting_time);
                $('#special_time').val(special_time);
                $('#yt_link').val(yt_link);
                $('#insta_link').val(insta_link);

                if (logo_image) {
                    $('#preview_image').attr('src', '/' + logo_image).show();
                } else {
                    $('#preview_image').hide();
                }

                $('button[type="submit"]').text('Update');
            });

            // Prevent form reset from clearing the record
            $(document).on('click', 'button[type="reset"], .cancel-btn, #cancel-btn, button:contains("Cancel")',
                function(e) {
                    e.preventDefault();
                    // Optionally, reload the page or reset fields to current db values
                    window.location.reload();
                });
        });
        $(document).ready(function() {
            $('.delete-footer').remove();

            $(document).on('click', '.edit-footer', function() {
                let footerData = $(this).data();
                $('#footer_id').val(footerData.id);
                $('#description').val(footerData.description);
                $('#address').val(footerData.address);
                $('#phone_no').val(footerData.phone_no);
                $('#email').val(footerData.email);
                $('#days').val(footerData.days);
                $('#hospital_time').val(footerData.hospital_time);
                $('#consulting_time').val(footerData.consulting_time);
                $('#special_time').val(footerData.special_time);
                $('#yt_link').val(footerData.yt_link);
                $('#insta_link').val(footerData.insta_link);

                if (footerData.logo_image) {
                    $('#preview_image').attr('src', '/' + footerData.logo_image).fadeIn();
                    $('#no_image_text').hide();
                } else {
                    $('#preview_image').hide();
                    $('#no_image_text').show();
                }

                $('button[type="submit"]').text('Update').addClass('btn-primary');
            });

            $(document).on('click', 'button[type="reset"], .cancel-btn, #cancel-btn, button:contains("Cancel")',
                function(e) {
                    e.preventDefault();
                    $('#footer_form')[0].reset();
                    $('#preview_image').hide();
                    $('#no_image_text').show();
                    $('button[type="submit"]').text('Save').removeClass('btn-primary');
                });
        });

        function previewImage(input) {
            if (input.files && input.files[0]) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    $('#preview_image').attr('src', e.target.result).fadeIn();
                    $('#no_image_text').hide();
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <!-- Summernote JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.summernote').summernote({
                height: 200,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['fontsize', 'color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                ]
            });
        });
    </script>

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session('success') }}',
                timer: 5000,
                timerProgressBar: true,
                showConfirmButton: true,
                didOpen: () => {
                    document.querySelectorAll('.swal2-input, .swal2-select').forEach(el => {
                        el.setAttribute('autocomplete', 'off');
                    });
                }
            });
        </script>
    @endif
</body>

</html>
