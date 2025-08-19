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
                    <h2>About Section</h2>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>About Section</strong></h2>
                        </div>
                        <div class="body">
                            <form action="{{ route('admin.about_section.update') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="aboutSection_id" id="aboutSection_id"
                                    value="{{ $about->id ?? '' }}">

                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="subtitle" id="subtitle"
                                                placeholder="Enter subtitle" value="{{ $about->subtitle ?? '' }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="title" id="title"
                                                placeholder="Enter title" value="{{ $about->title ?? '' }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Image 1</label>
                                            <div class="modern-upload-wrapper" id="modern-upload-area1">
                                                <label class="modern-upload-label" for="image1">
                                                    <i class="zmdi zmdi-cloud-upload"></i>
                                                    Upload Image 1
                                                </label>
                                                <input type="file" class="modern-upload-input" name="image1"
                                                    id="image1" accept="image/*">
                                                <button type="button" class="modern-upload-btn"
                                                    onclick="document.getElementById('image1').click();">
                                                    Choose File
                                                </button>
                                                <span class="modern-upload-info"></span>
                                                <span class="text-danger" id="image1-error"></span>
                                                <div class="modern-upload-preview" id="current_image1"
                                                    style="display: {{ !empty($about->image1) ? 'block' : 'none' }};">
                                                    @if (!empty($about->image1))
                                                        <img src="{{ asset($about->image1) }}" alt="Image 1"
                                                            style="max-width: 120px; max-height: 120px;">
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Image 2</label>
                                            <div class="modern-upload-wrapper" id="modern-upload-area2">
                                                <label class="modern-upload-label" for="image2">
                                                    <i class="zmdi zmdi-cloud-upload"></i>
                                                    Upload Image 2
                                                </label>
                                                <input type="file" class="modern-upload-input" name="image2"
                                                    id="image2" accept="image/*">
                                                <button type="button" class="modern-upload-btn"
                                                    onclick="document.getElementById('image2').click();">
                                                    Choose File
                                                </button>
                                                <span class="modern-upload-info"></span>
                                                <span class="text-danger" id="image2-error"></span>
                                                <div class="modern-upload-preview" id="current_image2"
                                                    style="display: {{ !empty($about->image2) ? 'block' : 'none' }};">
                                                    @if (!empty($about->image2))
                                                        <img src="{{ asset($about->image2) }}" alt="Image 2"
                                                            style="max-width: 120px; max-height: 120px;">
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <textarea class="form-control summernote" name="description" id="description" placeholder="Enter description">{{ $about->description ?? '' }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <textarea class="form-control summernote" name="extra" id="extra" placeholder="Enter extra details">{{ $about->extra ?? '' }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="languages"
                                                id="languages" placeholder="e.g. English, Gujarati, Hindi"
                                                value="{{ $about->languages ?? '' }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="experience"
                                                id="experience" placeholder="Enter experience (years)"
                                                value="{{ $about->experience ?? '' }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="video_url"
                                                id="video_url" placeholder="Enter video URL"
                                                value="{{ $about->video_url ?? '' }}">
                                        </div>
                                    </div>
                                </div>

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

            // Image 1 preview
            $('#image1').on('change', function(e) {
                let file = e.target.files[0];
                if (file) {
                    let reader = new FileReader();
                    reader.onload = function(evt) {
                        $('#current_image1').html('<img src="' + evt.target.result +
                            '" alt="Image 1">');
                        $('#current_image1').css('display', 'flex');
                    };
                    reader.readAsDataURL(file);
                } else {
                    $('#current_image1').html('');
                    $('#current_image1').css('display', 'none');
                }
            });
            // Image 2 preview
            $('#image2').on('change', function(e) {
                let file = e.target.files[0];
                if (file) {
                    let reader = new FileReader();
                    reader.onload = function(evt) {
                        $('#current_image2').html('<img src="' + evt.target.result +
                            '" alt="Image 2">');
                        $('#current_image2').css('display', 'flex');
                    };
                    reader.readAsDataURL(file);
                } else {
                    $('#current_image2').html('');
                    $('#current_image2').css('display', 'none');
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
                text: "About section updated successfully!",
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
