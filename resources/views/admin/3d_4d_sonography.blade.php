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
                    <h2>Sonography Details</h2>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Edit Sonography Details</strong></h2>
                        </div>
                        <div class="body">
                         
                            <form 
                               >
                            

                                <div class="row clearfix">

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>title</label>
                                            <input type="text" class="form-control" name="title"
                                                value="{{ $sonography_data->title }}">
                                        </div>
                                    </div>
                                </div>
                                 <div class="row clearfix mb-3">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control summernote"
                                                name="description">{{ $sonography_data->description }}</textarea>
                                        </div>
                                    </div>
                                </div>
                              
                                <div class="modern-upload-wrapper" id="modern-upload-area1">
                                    <label class="modern-upload-label" for="image">
                                        <i class="zmdi zmdi-cloud-upload"></i>
                                        Upload Image
                                    </label>
                                    <input type="file" class="modern-upload-input" name="image" id="image"
                                        accept="image/*">
                                    <button type="button" class="modern-upload-btn"
                                        onclick="document.getElementById('image').click();">
                                        Choose File
                                    </button>
                                    <span class="modern-upload-info"></span>
                                    <span class="text-danger" id="image1-error"></span>
                                    <div class="modern-upload-preview" id="current_image1"
                                        style="display: {{ !empty($sonography_data->image) ? 'block' : 'none' }};">
                                        @if (!empty($sonography_data->image))
                                        <img src="{{ asset($sonography_data->image) }}" alt="Image 1"
                                            style="max-width: 120px; max-height: 120px;">
                                        @endif
                                    </div>
                                </div>


                                {{-- Campaigns --}}
                                <h4>Sonography Details</h4>
                                <div id="sonography-wrapper">
                                    @if($sonography_data->sonography_detail)
                                    @foreach(json_decode($sonography_data->sonography_detail, true) as $index => $sonography)
                                    <div class="sonography-item mb-3 d-flex">
                                        <input type="text" name="sonography[{{ $index }}][title]"
                                            class="form-control mb-2 text-content" placeholder="Sonography Title"
                                            value="{{ $sonography['title'] ?? '' }}">
                                        <textarea name="sonography[{{ $index }}][desc]" class="form-control form-content"
                                            placeholder="Sonography Description">{{ $sonography['desc'] ?? '' }}</textarea>
                                        <button type="button"
                                            class="btn btn-danger btn-sm remove-sonography">Remove</button>
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                                <button type="button" class="btn btn-sm btn-success sonography-btn">+ Add
                                    Sonography Detail</button>
                                <hr>


                                <!-- <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <h4>Campaign Image</h4>
                                        <input type="file" class="form-control" name="campaign_image">
                                        @if($sonography_data->campaign_image)
                                        <img src="{{ asset($sonography_data->campaign_image) }}"
                                            alt="Director campaign Image" style="max-width: 120px; margin-top: 10px;">
                                        @endif
                                    </div>
                                  
                                </div> -->

                                 <div class="modern-upload-wrapper" id="modern-upload-area1">
                                    <label class="modern-upload-label" for="image1">
                                        <i class="zmdi zmdi-cloud-upload"></i>
                                        sonography Image1
                                    </label>
                                    <input type="file" class="modern-upload-input" name="sonography_image1" id="image2"
                                        accept="image/*">
                                    <button type="button" class="modern-upload-btn"
                                        onclick="document.getElementById('image2').click();">
                                        Choose File
                                    </button>
                                    <span class="modern-upload-info"></span>
                                    <span class="text-danger" id="image1-error"></span>
                                    <div class="modern-upload-preview" id="current_image2"
                                        style="display: {{ !empty($sonography_data->sonography_image1) ? 'block' : 'none' }};">
                                        @if (!empty($sonography_data->sonography_image1))
                                            <img src="{{ asset($sonography_data->sonography_image1) }}" alt="Image 1"
                                                style="max-width: 120px; max-height: 120px;">
                                        @endif
                                    </div>
                                </div>

                                <!-- {{-- Trainings --}} -->
                                <!-- <h4>Trainings</h4>
                                <div id="trainings-wrapper">
                                    @if($sonography_data->trainings)
                                    @foreach(json_decode($sonography_data->trainings, true) as $index => $training)
                                    <div class="training-item mb-3 d-flex">
                                        <input type="text" name="trainings[{{ $index }}][title]"
                                            class="form-control mb-2 text-content" placeholder="Training Title"
                                            value="{{ $training['title'] ?? '' }}">
                                        <textarea name="trainings[{{ $index }}][desc]" class="form-control form-content"
                                            placeholder="Training Description">{{ $training['desc'] ?? '' }}</textarea>
                                        <button type="button"
                                            class="btn btn-danger btn-sm remove-training">Remove</button>
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                                <button type="button" class="btn btn-sm btn-success" onclick="addTraining()">+ Add
                                    Training</button>
                                <hr> -->

                                <!-- <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <h4>Training Image</h4>
                                        <input type="file" class="form-control" name="training_image">
                                        @if($sonography_data->training_image)
                                        <img src="{{ asset($sonography_data->training_image) }}" alt="Training Image"
                                            style="max-width: 120px; margin-top: 10px;">
                                        @endif
                                    </div>
                                </div> -->

                                 <div class="modern-upload-wrapper" id="modern-upload-area1">
                                    <label class="modern-upload-label" for="image1">
                                        <i class="zmdi zmdi-cloud-upload"></i>
                                      Sonography image2
                                    </label>
                                    <input type="file" class="modern-upload-input" name="sonography_image2" id="image4"
                                        accept="image/*">
                                    <button type="button" class="modern-upload-btn"
                                        onclick="document.getElementById('image4').click();">
                                        Choose File
                                    </button>
                                    <span class="modern-upload-info"></span>
                                    <span class="text-danger" id="image1-error"></span>
                                    <div class="modern-upload-preview" id="current_image4"
                                        style="display: {{ !empty($sonography_data->sonography_image2) ? 'block' : 'none' }};">
                                        @if (!empty($sonography_data->sonography_image2))
                                            <img src="{{ asset($sonography_data->sonography_image2) }}" alt="Image 1"
                                                style="max-width: 120px; max-height: 120px;">
                                        @endif
                                    </div>
                                </div>


                                <!-- {{-- Conferences --}}
                                <h4>Conferences</h4>
                                <div id="conferences-wrapper">
                                    @if($sonography_data->conferences)
                                    @foreach(json_decode($sonography_data->conferences, true) as $index => $conference)
                                    <div class="conference-item mb-3 d-flex">
                                        <input type="text" name="conferences[{{ $index }}][title]"
                                            class="form-control mb-2 text-content" placeholder="Training Title"
                                            value="{{ $conference['title'] ?? '' }}">
                                        <textarea name="conferences[{{ $index }}][desc]"
                                            class="form-control form-content"
                                            placeholder="conference Description">{{ $conference['desc'] ?? '' }}</textarea>
                                        <button type="button"
                                            class="btn btn-danger btn-sm remove-conference">Remove</button>
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                                <button type="button" class="btn btn-sm btn-success" onclick="addConferences()">+ Add
                                    conferences</button>
                                <hr>

                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <h4>Media Presence</h4>
                                            <textarea class="form-control form-desc"
                                                name="media_presence">{{ $sonography_data->media_presence }}</textarea>
                                        </div>
                                    </div>
                                </div> -->

                                <!-- <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <h4>award Image</h4>
                                        <input type="file" class="form-control" name="award_image">
                                        @if($sonography_data->award_image)
                                        <img src="{{ asset($sonography_data->award_image) }}" alt="Award Image"
                                            style="max-width: 120px; margin-top: 10px;">
                                        @endif
                                    </div>
                                </div> -->

                                <div class="modern-upload-wrapper" id="modern-upload-area1">
                                    <label class="modern-upload-label" for="image1">
                                        <i class="zmdi zmdi-cloud-upload"></i>
                                       Sonography image3
                                    </label>
                                    <input type="file" class="modern-upload-input" name="sonography_image3" id="image3"
                                        accept="image/*">
                                    <button type="button" class="modern-upload-btn"
                                        onclick="document.getElementById('image3').click();">
                                        Choose File
                                    </button>
                                    <span class="modern-upload-info"></span>
                                    <span class="text-danger" id="image1-error"></span>
                                    <div class="modern-upload-preview" id="current_image3"
                                        style="display: {{ !empty($sonography_data->sonography_image3) ? 'block' : 'none' }};">
                                        @if (!empty($sonography_data->sonography_image3))
                                            <img src="{{ asset($sonography_data->sonography_image3) }}" alt="Image 1"
                                                style="max-width: 120px; max-height: 120px;">
                                        @endif
                                    </div>
                                </div>

                                {{-- Benifits --}}
                                <h4>benifits</h4>
                                <div id="awards-wrapper">
                                    @if($sonography_data->benifits)
                                    @foreach(json_decode($sonography_data->benifits, true) as $index => $benifit)
                                    <div class="benifit-item mb-3 d-flex">
                                        <input type="text" name="benifits[{{ $index }}][title]"
                                            class="form-control mb-2 text-content" placeholder="Training Title"
                                            value="{{ $benifit['title'] ?? '' }}">
                                        <textarea name="benifits[{{ $index }}][desc]" class="form-control form-content"
                                            placeholder="benifit Description">{{ $benifit['desc'] ?? '' }}</textarea>
                                        <button type="button" class="btn btn-danger btn-sm remove-benifit">Remove</button>
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                                <button type="button" class="btn btn-sm btn-success" onclick="addBenifits()">+ Add
                                    Benifits</button>
                                <hr>

                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <h4>community Charity Work</h4>
                                            <textarea class="form-control form-desc"
                                                name="community_charity_work">{{ $sonography_data->community_charity_work }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <!-- <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <h4>Charity Image</h4>
                                        <input type="file" class="form-control" name="charity_image">
                                        @if($sonography_data->charity_image)
                                        <img src="{{ asset($sonography_data->charity_image) }}" alt="Award Image"
                                            style="max-width: 120px; margin-top: 10px;">
                                        @endif
                                    </div>
                                </div> -->
                                <div class="modern-upload-wrapper" id="modern-upload-area1">
                                    <label class="modern-upload-label" for="image1">
                                        <i class="zmdi zmdi-cloud-upload"></i>
                                        Upload Image
                                    </label>
                                    <input type="file" class="modern-upload-input" name="charity_image" id="image5"
                                        accept="image/*">
                                    <button type="button" class="modern-upload-btn"
                                        onclick="document.getElementById('image5').click();">
                                        Choose File
                                    </button>
                                    <span class="modern-upload-info"></span>
                                    <span class="text-danger" id="image1-error"></span>
                                    <div class="modern-upload-preview" id="current_image5"
                                        style="display: {{ !empty($sonography_data->charity_image) ? 'block' : 'none' }};">
                                        @if (!empty($sonography_data->charity_image))
                                            <img src="{{ asset($sonography_data->charity_image) }}" alt="Image 1"
                                                style="max-width: 120px; max-height: 120px;">
                                        @endif
                                    </div>
                                </div>


                                {{-- memberships --}}
                                <h4>memberships</h4>
                                <div id="memberships-wrapper">
                                    @if($sonography_data->memberships)
                                    @foreach(json_decode($sonography_data->memberships, true) as $index => $membership)
                                    <div class="membership-item mb-3 d-flex">
                                        <input type="text" name="memberships[{{ $index }}][title]"
                                            class="form-control mb-2 text-content" placeholder="Membership Title"
                                            value="{{ $membership['title'] ?? '' }}">
                                        <textarea name="memberships[{{ $index }}][desc]"
                                            class="form-control form-content"
                                            placeholder="Membership Description">{{ $membership['desc'] ?? '' }}</textarea>
                                        <button type="button"
                                            class="btn btn-danger btn-sm remove-membership">Remove</button>
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                                <button type="button" class="btn btn-sm btn-success" onclick="addMemberships()">+ Add
                                    memberships</button>
                                <hr>


                                <!-- <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <h4>Membership Image</h4>
                                        <input type="file" class="form-control" name="membership_image">
                                        @if($sonography_data->membership_image)
                                        <img src="{{ asset($sonography_data->membership_image) }}" alt="Award Image"
                                            style="max-width: 120px; margin-top: 10px;">
                                        @endif
                                    </div>
                                </div> -->
                                <div class="modern-upload-wrapper" id="modern-upload-area1">
                                    <label class="modern-upload-label" for="image1">
                                        <i class="zmdi zmdi-cloud-upload"></i>
                                        Upload Image
                                    </label>
                                    <input type="file" class="modern-upload-input" name="membership_image" id="image6"
                                        accept="image/*">
                                    <button type="button" class="modern-upload-btn"
                                        onclick="document.getElementById('image6').click();">
                                        Choose File
                                    </button>
                                    <span class="modern-upload-info"></span>
                                    <span class="text-danger" id="image1-error"></span>
                                    <div class="modern-upload-preview" id="current_image6"
                                        style="display: {{ !empty($sonography_data->membership_image) ? 'block' : 'none' }};">
                                        @if (!empty($sonography_data->membership_image))
                                            <img src="{{ asset($sonography_data->membership_image) }}" alt="Image 1"
                                                style="max-width: 120px; max-height: 120px;">
                                        @endif
                                    </div>
                                </div>

                                {{-- publications_talks --}}
                                <h4>publications Talks</h4>
                                <div id="publications_talks-wrapper">
                                    @if($sonography_data->publications_talks)
                                    @foreach(json_decode($sonography_data->publications_talks, true) as $index =>
                                    $publications_talk)
                                    <div class="publications_talk-item mb-3 d-flex">
                                        <input type="text" name="publications_talks[{{ $index }}][title]"
                                            class="form-control mb-2 text-content" placeholder="publications_talk Title"
                                            value="{{ $publications_talk['title'] ?? '' }}">
                                        <textarea name="publications_talks[{{ $index }}][desc]"
                                            class="form-control form-content"
                                            placeholder="Membership Description">{{ $publications_talk['desc'] ?? '' }}</textarea>
                                        <button type="button"
                                            class="btn btn-danger btn-sm remove-publications_talk">Remove</button>
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                                <button type="button" class="btn btn-sm btn-success" onclick="addpublicationsTalks()">+
                                    Add
                                    publication talks</button>
                                <hr>

                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-primary btn-round">Update Director</button>
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
        $('#image').on('change', function(e) {
            let file = e.target.files[0];
            if (file) {
                let reader = new FileReader();
                reader.onload = function(evt) {
                    $('#current_image1').html('<img src="' + evt.target.result +
                        '" alt="Image 1" width="100px">');
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

    @if(session('success'))
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

    @if(session('error'))
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: "{{ session('error') }}",
    });
    @endif

    let campaignIndex = {{ $sonography_data->campaigns ? count(json_decode($sonography_data->campaigns, true)) : 0 }};
    let trainingIndex = {{ $sonography_data->trainings ? count(json_decode($sonography_data->trainings, true)) : 0 }};
    let conferenceIndex = {{ $sonography_data->conferences ? count(json_decode($sonography_data->conferences, true)) : 0 }};
    let awardIndex = {{ $sonography_data->awards ? count(json_decode($sonography_data->awards, true)) : 0 }};
    let membershipIndex = {{ $sonography_data->memberships ? count(json_decode($sonography_data->memberships, true)) : 0 }};
    let publicationsTalkIndex = {{ $sonography_data->publications_talks ? count(json_decode($sonography_data->publications_talks, true)) : 0 }};


    $(".sonography-btn").click(function() {
        let wrapper = document.getElementById('sonography-wrapper');
        wrapper.insertAdjacentHTML('beforeend', `
            <div class="campaign-item mb-3 d-flex">
                <input type="text" name="campaigns[${campaignIndex}][title]" class="form-control mb-2 text-content" placeholder="Campaign Title">
                <textarea name="campaigns[${campaignIndex}][desc]" class="form-control form-content" placeholder="Campaign Description"></textarea>
                <button type="button" class="btn btn-danger btn-sm remove-campaign">Remove</button>
            </div>
        `);
        campaignIndex++;
    });


    $(document).on('click', '.remove-campaign', function() {
        $(this).closest('.campaign-item').remove();
    });

    function addTraining() {
        let wrapper = document.getElementById('trainings-wrapper');
        wrapper.insertAdjacentHTML('beforeend', `
        <div class="training-item mb-3 d-flex">
            <input type="text" name="trainings[${trainingIndex}][title]" class="form-control mb-2 text-content" placeholder="Training Title">
            <textarea name="trainings[${trainingIndex}][desc]" class="form-control form-content" placeholder="Training Description"></textarea>
            <button type="button" class="btn btn-danger btn-sm remove-training">Remove</button> 
        </div>
    `);
        trainingIndex++;
    }
    $(document).on('click', '.remove-training', function() {
        $(this).closest('.training-item').remove();
    });

    function addConferences() {
        let wrapper = document.getElementById('conferences-wrapper');
        wrapper.insertAdjacentHTML('beforeend', `
        <div class="conference-item mb-3 d-flex">
            <input type="text" name="conferences[${conferenceIndex}][title]" class="form-control mb-2 text-content" placeholder="conference Title">
            <textarea name="conferences[${conferenceIndex}][desc]" class="form-control form-content" placeholder="conference Description"></textarea>
            <button type="button" class="btn btn-danger btn-sm remove-conference">Remove</button> 
        </div>
    `);
        conferenceIndex++;
    }
    $(document).on('click', '.remove-conference', function() {
        $(this).closest('.conference-item').remove();
    });

    function addBenifits() {
        let wrapper = document.getElementById('awards-wrapper');
        wrapper.insertAdjacentHTML('beforeend', `
        <div class="award-item mb-3 d-flex">
            <input type="text" name="awards[${awardIndex}][title]" class="form-control mb-2 text-content" placeholder="award Title">
            <textarea name="awards[${awardIndex}][desc]" class="form-control form-content" placeholder="award Description"></textarea>
            <button type="button" class="btn btn-danger btn-sm remove-award">Remove</button> 
        </div>
    `);
        awardIndex++;
    }
    $(document).on('click', '.remove-award', function() {
        $(this).closest('.award-item').remove();
    });

    function addMemberships() {
        let wrapper = document.getElementById('memberships-wrapper');
        wrapper.insertAdjacentHTML('beforeend', `
        <div class="membership-item mb-3 d-flex">
            <input type="text" name="memberships[${membershipIndex}][title]" class="form-control mb-2 text-content" placeholder="membership Title">
            <textarea name="memberships[${membershipIndex}][desc]" class="form-control form-content" placeholder="membership Description"></textarea>
            <button type="button" class="btn btn-danger btn-sm remove-membership">Remove</button> 
        </div>
    `);
        membershipIndex++;
    }
    $(document).on('click', '.remove-membership', function() {
        $(this).closest('.membership-item').remove();
    });

    function addpublicationsTalks() {
        let wrapper = document.getElementById('publications_talks-wrapper');
        wrapper.insertAdjacentHTML('beforeend', `
        <div class="publications_talk-item mb-3 d-flex">
            <input type="text" name="publications_talks[${publicationsTalkIndex}][title]" class="form-control mb-2 text-content" placeholder="membership Title">
            <textarea name="publications_talks[${publicationsTalkIndex}][desc]" class="form-control form-content" placeholder="membership Description"></textarea>
            <button type="button" class="btn btn-danger btn-sm remove-publications_talk">Remove</button> 
        </div>
    `);
        publicationsTalkIndex++;
    }
    $(document).on('click', '.remove-publications_talk', function() {
        $(this).closest('.publications_talk-item').remove();
    });
     $('.summernote').summernote({
                height: 200,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['fontsize', 'color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                ]
            });
    </script>
</body>

</html>