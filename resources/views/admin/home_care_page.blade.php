<!doctype html>
<html class="no-js " lang="en">

<head>
    @include('admin.layout.headerlink')
    <!-- Summernote CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.css" rel="stylesheet">

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
                    <h2>Home Care Service</h2>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Home Care Service</strong></h2>
                        </div>
                        <div class="body">
                            <form action="{{ route('admin.home_care_page.update') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="homeCare_id" id="homeCare_id"
                                    value="{{ $homeCare->id ?? '' }}">

                                <div class="row clearfix">
                                    {{-- <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="service_id"><strong>Select Service</strong></label>
                                            <select name="service_id" id="service_id" class="form-control">
                                                <option value="">-- Select Service --</option>
                                                @foreach ($services as $service)
                                                    <option value="{{ $service->id }}"
                                                        {{ !empty($homeCare->service_id) && $homeCare->service_id == $service->id ? 'selected' : '' }}>
                                                        {{ $service->service_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div> --}}

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="service_id"><strong>Page Title</strong></label>
                                            <input type="text" class="form-control" name="page_title" id="page_title"
                                                placeholder="Enter page title"
                                                value="{{ $homeCare->page_title ?? '' }}">
                                        </div>
                                    </div>

                                    {{-- <div class="col-sm-4">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="meta_title" id="meta_title"
                                                placeholder="Enter meta title"
                                                value="{{ $homeCare->meta_title ?? '' }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="meta_keywords"
                                                id="meta_keywords" placeholder="Enter meta keywords"
                                                value="{{ $homeCare->meta_keywords ?? '' }}">
                                        </div>
                                    </div> --}}
                                </div>

                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label><strong>Banner Image</strong></label>
                                            <div class="modern-upload-wrapper" id="modern-upload-area1">
                                                <label class="modern-upload-label" for="banner_image">
                                                    <i class="zmdi zmdi-cloud-upload"></i>
                                                    Upload Banner Image
                                                </label>
                                                <input type="file" class="modern-upload-input" name="banner_image"
                                                    id="banner_image" accept="image/*">
                                                <button type="button" class="modern-upload-btn"
                                                    onclick="document.getElementById('banner_image').click();">
                                                    Choose File
                                                </button>
                                                <span class="modern-upload-info"></span>
                                                <span class="text-danger" id="banner_image-error"></span>
                                                <div class="modern-upload-preview" id="current_banner_image"
                                                    style="display: {{ !empty($homeCare->banner_image) ? 'block' : 'none' }};">
                                                    @if (!empty($homeCare->banner_image))
                                                        <img src="{{ asset($homeCare->banner_image) }}"
                                                            alt="banner_image"
                                                            style="max-width: 120px; max-height: 120px;">
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label><strong>Conclusion</strong></label>
                                            <textarea class="form-control summernote" name="conclusion_html" id="conclusion_html" placeholder="Enter conclusion">{{ $homeCare->conclusion_html ?? '' }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                {{-- <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <textarea class="form-control summernote" name="meta_description" id="meta_description"
                                                placeholder="Enter meta description">{{ $homeCare->meta_description ?? '' }}</textarea>
                                        </div>
                                    </div>
                                </div> --}}

                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-primary btn-round"
                                            id="submitBtn">Update</button>
                                    </div>
                                </div>
                            </form>
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

            // banner_image preview
            $('#banner_image').on('change', function(e) {
                let file = e.target.files[0];
                if (file) {
                    let reader = new FileReader();
                    reader.onload = function(evt) {
                        $('#current_banner_image').html('<img src="' + evt.target.result +
                            '" alt="banner_image">');
                        $('#current_banner_image').css('display', 'flex');
                    };
                    reader.readAsDataURL(file);
                } else {
                    $('#current_banner_image').html('');
                    $('#current_banner_image').css('display', 'none');
                }
            });
        });

        @if (session('success'))
            Swal.fire({
                didOpen: () => {
                    document.querySelectorAll('.swal2-container select').forEach(el => el.remove());
                },
                icon: 'success',
                title: 'Success',
                text: "Home Care Page updated successfully!",
                timer: 5000,
                showConfirmButton: true,
            });
        @endif

        @if (session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: "{{ session('error') }}",
            });
        @endif
    </script>
</body>

</html>
