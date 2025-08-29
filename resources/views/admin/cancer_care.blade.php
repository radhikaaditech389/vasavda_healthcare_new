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
                    <h2>cancer care Details</h2>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Edit cancer care Details</strong></h2>
                        </div>
                        <div class="body">

                            <form 
                                enctype="multipart/form-data">

                                <div class="row clearfix">

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>title</label>
                                            <input type="text" class="form-control" name="title"
                                                value="{{ $cancer_care_data->title }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix mb-3">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control summernote"
                                                name="description">{{ $cancer_care_data->description }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Book Contact No</label>
                                            <input type="text" class="form-control" name="book_contact_no"
                                                value="{{ $cancer_care_data->book_contact_no }}" maxlength="10"
                                                pattern="\d*"
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
                                    <input type="file" class="modern-upload-input" name="image" id="image"
                                        accept="image/*">
                                    <button type="button" class="modern-upload-btn"
                                        onclick="document.getElementById('image').click();">
                                        Choose File
                                    </button>
                                    <span class="modern-upload-info"></span>
                                    <span class="text-danger" id="image1-error"></span>
                                    <div class="modern-upload-preview" id="current_image1"
                                        style="display: {{ !empty($cancer_care_data->image) ? 'block' : 'none' }};">
                                        @if (!empty($cancer_care_data->image))
                                        <img src="{{ asset($cancer_care_data->image) }}" alt="Image 1"
                                            style="max-width: 120px; max-height: 120px;">
                                        @endif
                                    </div>
                                </div>


                                {{-- Symptoms --}}
                                <h4>Symptoms</h4>
                                <div id="sonography-wrapper">
                                    @if($cancer_care_data->symptoms)
                                    @foreach(json_decode($cancer_care_data->symptoms, true) as $index =>
                                    $cancer_care)
                                    <div class="cancer_care-item mb-3 d-flex">
                                        <input type="text" name="cancer_care[{{ $index }}][title]"
                                            class="form-control mb-2 text-content" placeholder="cancer_care Title"
                                            value="{{ $cancer_care['title'] ?? '' }}">
                                        <textarea name="cancer_care[{{ $index }}][desc]"
                                            class="form-control form-content"
                                            placeholder="cancer_care Description">{{ $cancer_care['desc'] ?? '' }}</textarea>
                                        <button type="button"
                                            class="btn btn-danger btn-sm remove-cancer-care">Remove</button>
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                                <button type="button" class="btn btn-sm btn-success cancer-care-btn">+ Add
                                    Cancer Care Detail</button>
                                <hr>

                                {{-- Diagnosis --}}
                                <h4>Diagnosis</h4>
                                <div id="benifits-wrapper">
                                    @if($cancer_care_data->diagnosis)
                                    @foreach(json_decode($cancer_care_data->diagnosis, true) as $index => $diagnosisd)
                                    <div class="benifit-item mb-3 p-3 border rounded">
                                        <input type="text" name="diagnosisd[{{ $index }}][title]"
                                            class="form-control mb-2" placeholder="Title"
                                            value="{{ $diagnosisd['title'] ?? '' }}">

                                        <textarea name="diagnosisd[{{ $index }}][desc]" class="form-control mb-2"
                                            placeholder="Description">{{ $diagnosisd['desc'] ?? '' }}</textarea>

                                        <button type="button"
                                            class="btn btn-danger btn-sm remove-diagnosisd">Remove</button>
                                    </div>
                                    @endforeach
                                    @endif
                                </div>

                                <button type="button" class="btn btn-sm btn-success" onclick="addDiagnosisd()">+ Add
                                    Diagnosis</button>
                                <hr>

                                 {{-- Risk factors --}}
                                <h4>Risk factors</h4>
                                <div id="risk_factor-wrapper">
                                    @if($cancer_care_data->risk_factors)
                                    @foreach(json_decode($cancer_care_data->risk_factors, true) as $index => $risk_factor)
                                    <div class="risk_factor-item mb-3 p-3 border rounded">
                                        <input type="text" name="risk_factor[{{ $index }}][title]"
                                            class="form-control mb-2" placeholder="Title"
                                            value="{{ $risk_factor['title'] ?? '' }}">

                                        <textarea name="risk_factor[{{ $index }}][desc]" class="form-control mb-2"
                                            placeholder="Description">{{ $risk_factor['desc'] ?? '' }}</textarea>

                                        <button type="button"
                                            class="btn btn-danger btn-sm remove-risk-factor">Remove</button>
                                    </div>
                                    @endforeach
                                    @endif
                                </div>

                                <button type="button" class="btn btn-sm btn-success" onclick="addRiskFactors()">+ Add
                                    Risk Factors</button>
                                <hr>

                                 {{-- Treatment --}}
                                <h4>Treatment</h4>
                                <div id="benifits-wrapper">
                                    @if($cancer_care_data->treatment)
                                    @foreach(json_decode($cancer_care_data->treatment, true) as $index => $diagnosisd)
                                    <div class="benifit-item mb-3 p-3 border rounded">
                                        <input type="text" name="diagnosisd[{{ $index }}][title]"
                                            class="form-control mb-2" placeholder="Title"
                                            value="{{ $diagnosisd['title'] ?? '' }}">

                                        <textarea name="diagnosisd[{{ $index }}][desc]" class="form-control mb-2"
                                            placeholder="Description">{{ $diagnosisd['desc'] ?? '' }}</textarea>

                                        <button type="button"
                                            class="btn btn-danger btn-sm remove-diagnosisd">Remove</button>
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                                
                                <button type="button" class="btn btn-sm btn-success" onclick="addDiagnosisd()">+ Add
                                    treatment</button>
                                    <hr>
                                    
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
                                       <span class="text-danger" id="image1-error"></span>
                                       <div class="modern-upload-preview" id="current_image2"
                                           style="display: {{ !empty($cancer_care_data->image2) ? 'block' : 'none' }};">
                                           @if (!empty($cancer_care_data->image2))
                                           <img src="{{ asset($cancer_care_data->image2) }}" alt="Image 1"
                                               style="max-width: 120px; max-height: 120px;">
                                           @endif
                                       </div>
                                   </div>

                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-primary btn-round">Update
                                            Sonography</button>
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

     let sonographyIndex = {{ isset($cancer_care_data->sonography_detail) ? count(json_decode($cancer_care_data->sonography_detail, true)) : 0 }};
    let benifitIndex = {{ isset($cancer_care_data->benifits) ? count(json_decode($cancer_care_data->benifits, true)) : 0 }};
      let riskFactorIndex = {{ isset($cancer_care_data->risk_factor) ? count(json_decode($cancer_care_data->risk_factor, true)) : 0 }};

    $(".cancer-care-btn").click(function() {
        let wrapper = document.getElementById('sonography-wrapper');
        wrapper.insertAdjacentHTML('beforeend', `
            <div class="sonography-item mb-3 d-flex">
                <input type="text" name="sonographies[${sonographyIndex}][title]" class="form-control mb-2 text-content" placeholder="Sonography Title">
                <textarea name="sonographies[${sonographyIndex}][desc]" class="form-control form-content" placeholder="Sonography Description"></textarea>
                <button type="button" class="btn btn-danger btn-sm remove-cancer-care">Remove</button>
            </div>
        `);
        sonographyIndex++;
    });


    $(document).on('click', '.remove-cancer-care', function() {
        $(this).closest('.sonography-item').remove();
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

    function addDiagnosisd() {
        let wrapper = document.getElementById('benifits-wrapper');
        wrapper.insertAdjacentHTML('beforeend', `
        <div class="benifit-item mb-3 d-flex gap-2 align-items-start">
            <input type="text" name="benifits[${benifitIndex}][title]" class="form-control mb-2 text-content" placeholder="Benefit Title" style="flex:1;">
            <input type="text" name="benifits[${benifitIndex}][sub_title]" class="form-control mb-2 text-content" placeholder="Benefit Sub Title" style="flex:1;">
            <textarea name="benifits[${benifitIndex}][desc]" class="form-control form-content" placeholder="Benefit Description" style="flex:2;"></textarea>
            <button type="button" class="btn btn-danger btn-sm remove-diagnosisd">Remove</button> 
        </div>
    `);
        benifitIndex++;
    }

    // Remove button handler with jQuery (keep as is)
    $(document).on('click', '.remove-diagnosisd', function() {
        $(this).closest('.benifit-item').remove();
    });

     function addRiskFactors() {
        let wrapper = document.getElementById('risk_factor-wrapper');
        wrapper.insertAdjacentHTML('beforeend', `
        <div class="risk_factor-item mb-3 d-flex gap-2 align-items-start">
            <input type="text" name="risk_factor[${riskFactorIndex}][title]" class="form-control mb-2 text-content" placeholder="Benefit Title" style="flex:1;">
            <input type="text" name="risk_factor[${riskFactorIndex}][sub_title]" class="form-control mb-2 text-content" placeholder="Benefit Sub Title" style="flex:1;">
            <textarea name="risk_factor[${riskFactorIndex}][desc]" class="form-control form-content" placeholder="Benefit Description" style="flex:2;"></textarea>
            <button type="button" class="btn btn-danger btn-sm remove-risk-factor">Remove</button> 
        </div>
    `);
        riskFactorIndex++;
    }

    // Remove button handler with jQuery (keep as is)
    $(document).on('click', '.remove-risk-factor', function() {
        $(this).closest('.benifit-item').remove();
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