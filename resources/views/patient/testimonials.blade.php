<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Testimonials - Vasavada womens hospital Bopal</title>
    <meta name="author" content="Vasavada Women's Hospital">
    <meta name="description" content="Testimonials of best womens hospital bopal and lady gynecologist bopal">
    <meta name="keywords"
        content="Womens hospital bopal, Women's hospital bopal, gynecologist bopal, lady gynecologist bopal, womens hospital near by, gynecologist near by, lady gynecologist near by">
    <link rel="canonical" href="https://www.vasavadahospitals.org/testimonials/" />
    @include('patient.layout.head')
</head>

<body class="">
    <div id="page-root">
        @include('patient.layout.mobile_menu')
        @include('patient.layout.side_menu')
        @include('patient.layout.header', ['footer' => $footer])
        <div class="breadcumb-wrapper " style="margin-top: -30px !important;">
            <div class="parallax" data-parallax-image="{{ asset('patient/img/breadcurmb/testimonial.jpg') }}"></div>
            <div class="container z-index-common">
                <div class="breadcumb-content">
                    <h1 class="breadcumb-title"
                        style="-webkit-text-stroke: 2px black;
    -webkit-text-fill-color: #702840; ">Testimonials</h1>
                    <div class="breadcumb-menu-wrap">
                        <i class="far fa-home-lg"></i>
                        <ul class="breadcumb-menu">
                            <li><a href="/">Home</a></li>
                            <li class="active">Testimonials</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <section class="vs-shop-details space-top space-md-bottom">
            <div class="container">
                <ul class="nav product-tab mb-30 justify-content-center mb-4" id="productTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="reviews-tab" data-bs-toggle="tab" href="#reviews" role="tab"
                            aria-controls="reviews" aria-selected="true">
                            Review ({{ $reviews->count() }})
                        </a>
                    </li>

                    <!-- Button inside nav -->
                    {{-- <li class="nav-item" role="presentation">
                    <button type="button" class="btn btn-primary ms-3" data-bs-toggle="modal"
                        data-bs-target="#reviewModal">
                        ✍️ Give Your Review
                    </button>
                </li> --}}
                </ul>

                <div id="floating-review-button">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#reviewModal">
                        ✍️ Give Your Review
                    </button>
                </div>

                {{-- <div class="row justify-content-center">
                    <div class="col-xl-9 col-xxl-8">
                        <div class="tab-content mb-25" id="productTabContent">
                            <div class="tab-pane fade show active" id="reviews" role="tabpanel"
                                aria-labelledby="reviews-tab">
                                <div class="vs-comment-area list-style-none vs-comments-layout1 pt-3">
                                    <ul class="comment-list">
                                        @forelse($reviews as $review)
                                            <li class="review vs-comment mb-4">
                                                <div class="vs-post-comment d-flex p-3 rounded shadow-sm bg-white">

                                                    <!-- Avatar -->
                                                    <div class="author-img me-3">
                                                        @if ($review->image_path)
                                                            <img src="{{ asset($review->image_path) }}"
                                                                alt="{{ $review->name }}"
                                                                class="rounded-circle border border-2 border-primary shadow-sm"
                                                                style="width:60px; height:60px; object-fit:cover;">
                                                        @else
                                                            @php
                                                                $colors = [
                                                                    '#1abc9c',
                                                                    '#3498db',
                                                                    '#9b59b6',
                                                                    '#e67e22',
                                                                    '#e74c3c',
                                                                    '#2ecc71',
                                                                    '#f39c12',
                                                                    '#8e44ad',
                                                                    '#16a085',
                                                                ];
                                                                $colorIndex = crc32($review->name) % count($colors);
                                                                $bgColor = $colors[$colorIndex];
                                                                $initials = collect(explode(' ', $review->name))
                                                                    ->map(fn($w) => strtoupper(substr($w, 0, 1)))
                                                                    ->join('');
                                                            @endphp
                                                            <div class="rounded-circle d-flex align-items-center justify-content-center shadow-sm"
                                                                style="width:60px; height:60px; background:{{ $bgColor }}; color:white; font-weight:bold; font-size:18px;">
                                                                {{ $initials }}
                                                            </div>
                                                        @endif
                                                    </div>

                                                    <!-- Content -->
                                                    <div class="comment-content flex-grow-1">
                                                        <!-- Name + Stars -->
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <h4 class="name h6 mb-0">{{ $review->name }}</h4>
                                                            <div class="star-rating text-warning">
                                                                @for ($i = 1; $i <= 5; $i++)
                                                                    @if ($i <= $review->rating)
                                                                        <i class="fas fa-star"></i>
                                                                    @elseif ($i - $review->rating < 1)
                                                                        <i class="fas fa-star-half-alt"></i>
                                                                    @else
                                                                        <i class="far fa-star"></i>
                                                                    @endif
                                                                @endfor
                                                            </div>
                                                        </div>

                                                        <!-- Time + Location -->
                                                        <small class="text-muted d-block mb-2">
                                                            {{ $review->created_at->diffForHumans() }}
                                                            @if ($review->location)
                                                                &nbsp; | &nbsp;
                                                                <i class="fas fa-map-marker-alt"></i>
                                                                {{ $review->location }}
                                                            @endif
                                                        </small>

                                                        <!-- Message -->
                                                        <p class="mb-0">{{ $review->message }}</p>
                                                    </div>
                                                </div>
                                            </li>
                                        @empty
                                            <p class="text-center text-muted">No reviews available yet.</p>
                                        @endforelse
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}

                <div class="row g-4">
                    @forelse($reviews as $review)
                        <div class="col-md-6 col-lg-4">
                            <div class="review-card p-4 rounded-4 shadow-sm bg-white h-100 d-flex flex-column">

                                <p class="mb-4 text-dark" style="flex-grow:1; font-size:1rem; line-height:1.6;">
                                    {{ Str::limit($review->message, 300) }}
                                </p>

                                <div
                                    class="mt-auto pt-3 border-top d-flex flex-column flex-md-row justify-content-between align-items-md-center">
                                    <div class="d-flex align-items-center mb-3 mb-md-0">
                                        @if ($review->image_path)
                                            <img src="{{ asset($review->image_path) }}" alt="{{ $review->name }}"
                                                class="rounded-circle border border-2 border-primary"
                                                style="width:55px; height:55px; object-fit:cover;">
                                        @else
                                            @php
                                                $colors = [
                                                    '#1abc9c',
                                                    '#3498db',
                                                    '#9b59b6',
                                                    '#e67e22',
                                                    '#e74c3c',
                                                    '#2ecc71',
                                                    '#f39c12',
                                                    '#8e44ad',
                                                    '#16a085',
                                                ];
                                                $colorIndex = crc32($review->name) % count($colors);
                                                $bgColor = $colors[$colorIndex];
                                                $initials = collect(explode(' ', $review->name))
                                                    ->map(fn($w) => strtoupper(substr($w, 0, 1)))
                                                    ->join('');
                                            @endphp
                                            <div class="rounded-circle d-flex align-items-center justify-content-center"
                                                style="width:55px; height:55px; background:{{ $bgColor }}; color:white; font-weight:bold; font-size: 1.25rem;">
                                                {{ $initials }}
                                            </div>
                                        @endif

                                        <div class="ms-3">
                                            <div class="fw-bold fs-5 text-dark">{{ $review->name }}</div>
                                            <div class="text-muted small d-flex align-items-center">
                                                @if ($review->location)
                                                    <i class="fas fa-map-marker-alt me-1 text-primary"></i>
                                                    <span>{{ $review->location }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-column align-items-md-end mt-2 mt-md-0">
                                        <div class="text-warning d-flex align-items-center mb-1">
                                            @for ($i = 1; $i <= 5; $i++)
                                                @if ($i <= floor($review->rating))
                                                    <i class="fas fa-star me-1"></i>
                                                @elseif ($i - $review->rating < 1)
                                                    <i class="fas fa-star-half-alt me-1"></i>
                                                @else
                                                    <i class="far fa-star me-1"></i>
                                                @endif
                                            @endfor
                                            <span class="text-dark ms-1"
                                                style="font-size:0.9rem;">{{ number_format($review->rating, 1) }}</span>
                                        </div>

                                        <div class="text-muted small d-flex align-items-center">
                                            <i class="far fa-calendar-alt me-1 text-primary"></i>
                                            <span>{{ $review->created_at->diffForHumans() }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-center text-muted col-12">No reviews available yet.</p>
                    @endforelse
                </div>
            </div>
        </section>
    </div>

    <!-- Review Modal -->
    <div class="modal fade" id="reviewModal" tabindex="-1" aria-labelledby="reviewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content rounded-3 shadow-lg border-0 review-modal-custom">

                <div class="modal-header bg-primary text-white rounded-top-3 border-0">
                    <h5 id="reviewModalLabel" class="modal-title fw-bold d-flex align-items-center">
                        <i class="fas fa-star me-2"></i> Share Your Experience
                    </h5>
                    <button type="button" class="btn-close btn-close-white btn-close-fallback ms-auto"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{ route('reviews.store') }}" method="POST" enctype="multipart/form-data"
                    id="reviewForm">
                    @csrf
                    <div class="modal-body px-4">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control rounded-pill" id="nameInput"
                                placeholder="Enter your name" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Location</label>
                            <input type="text" name="location" class="form-control rounded-pill"
                                placeholder="Your city or area">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Rate your experience <span
                                    class="text-danger">*</span></label>
                            <div class="google-stars d-flex align-items-center">
                                <i class="fas fa-star" data-value="1"></i>
                                <i class="fas fa-star" data-value="2"></i>
                                <i class="fas fa-star" data-value="3"></i>
                                <i class="fas fa-star" data-value="4"></i>
                                <i class="fas fa-star" data-value="5"></i>
                            </div>
                            <input type="hidden" name="rating" id="ratingInput" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Your review <span
                                    class="text-danger">*</span></label>
                            <textarea name="message" class="form-control" id="reviewMessage" rows="5" maxlength="1000"
                                placeholder="What do you like about your experience?" required></textarea>
                            <div class="d-flex justify-content-between mt-1 small text-muted">
                                <span>Be specific and considerate.</span>
                                <span id="charCount">0/1000</span>
                            </div>
                        </div>

                        <div class="mb-2">
                            <label class="form-label fw-semibold">Add a photo (optional)</label>
                            <div class="google-dropzone" id="imageDropzone">
                                <input type="file" name="image" id="imageInput" accept="image/*"
                                    class="cover-input">
                                <div class="dz-instructions">
                                    <i class="fas fa-camera me-2"></i>
                                    Drag & drop or <button type="button" class="btn btn-link p-0 align-baseline"
                                        id="chooseImageBtn">browse</button>
                                </div>
                                <div class="preview-wrapper d-none" id="imagePreviewWrapper">
                                    <img id="imagePreview" alt="Selected photo preview">
                                    <button type="button" class="btn btn-sm btn-outline-danger remove-image"
                                        id="removeImageBtn"><i class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <div class="small text-muted mt-1">PNG/JPG up to 3MB.</div>
                        </div>
                    </div>

                    <div class="modal-footer border-0">
                        <button type="button" class="btn btn-light rounded-pill"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success rounded-pill submit-review-btn"
                            id="submitReviewBtn" disabled>
                            <i class="fas fa-paper-plane me-1"></i> Submit Review
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Toast -->
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 1080">
        <div id="reviewToast" class="toast align-items-center text-bg-success border-0" role="alert"
            aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    Thanks! Your review is being submitted.
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div>
        </div>
    </div>

    <!-- CSS for Star Rating -->
    <style>
        #floating-review-button .btn {
            border-radius: 50px;
            padding: 15px 25px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            animation: pulse 2s infinite;
        }

        #floating-review-button {
            position: fixed;
            bottom: 20px;
            left: 20px;
            z-index: 9999;
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
            }

            100% {
                transform: scale(1);
            }
        }

        /* General Modal Styles */
        .review-modal-custom {
            border: none;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            background-color: #f8f9fa;
            margin-top: 0 !important;
            z-index: 1060;
        }

        .modal-backdrop {
            z-index: 9998 !important;
        }

        .modal {
            z-index: 9999 !important;
        }

        body.modal-open #page-root {
            filter: blur(2px);
            transition: filter .2s ease;
            pointer-events: none;
            user-select: none;
            will-change: filter;
        }

        /* Modal Header */
        .modal-header.bg-primary {
            background-color: #4285f4 !important;
            padding: 1.25rem 1.5rem;
            display: flex;
            align-items: center;
        }

        .modal-header .btn-close {
            filter: invert(1) brightness(1.4);
            opacity: 1;
            position: relative;
            z-index: 1;
            outline: none;
            box-shadow: none;
        }

        .modal-header .btn-close:hover {
            filter: invert(1) brightness(2);
            opacity: 1;
        }

        /* Fallback for environments where .btn-close-white icon may not render */
        .btn-close-fallback::before {
            content: '\00d7';
            font-size: 26px;
            line-height: 1;
            font-weight: 700;
            color: #fff;
            display: inline-block;
        }

        .btn-close-fallback {
            width: 26px;
            height: 26px;
            background: transparent !important;
            border: 0;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        /* Avatar */
        .google-avatar {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background: linear-gradient(135deg, #4285f4, #34a853);
            color: #fff;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
        }

        /* Form Inputs */
        .form-control,
        .form-control:focus {
            padding: 0.75rem 1.25rem;
            box-shadow: none;
            border-color: #ddd;
            transition: all 0.2s ease-in-out;
        }

        textarea.form-control {
            border-radius: 0.75rem;
            padding: 1rem;
            resize: vertical;
        }

        .form-control:focus {
            outline: none !important;
            border-color: #b9c8f7;
            box-shadow: 0 0 0 0.12rem rgba(66, 133, 244, 0.18);
        }

        /* Star Rating */
        .google-stars {
            font-size: 2rem;
            color: #e0e0e0;
        }

        .google-stars .fas.fa-star {
            cursor: pointer;
            transition: color 0.15s ease-in-out, transform 0.1s ease-in-out;
        }

        .google-stars .fas.fa-star:hover {
            transform: scale(1.05);
        }

        .google-stars .fas.fa-star.active {
            color: #fbbc05;
        }

        /* Dropzone */
        .google-dropzone {
            border: 1.5px dashed #cfd8dc;
            border-radius: 12px;
            padding: 16px;
            background: #fff;
            text-align: center;
            transition: border-color 0.2s ease-in-out, background 0.2s ease-in-out;
            min-height: 80px;
            cursor: pointer;
            position: relative;
        }

        .google-dropzone.dragover {
            border-color: #4285f4;
            background: #f1f7ff;
        }

        .google-dropzone .dz-instructions {
            color: #607d8b;
        }

        .google-dropzone .preview-wrapper {
            position: relative;
            display: inline-block;
        }

        .google-dropzone img {
            max-height: 140px;
            max-width: 100%;
            border-radius: 10px;
            object-fit: cover;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.12);
        }

        .google-dropzone .remove-image {
            position: absolute;
            top: 6px;
            right: 6px;
        }

        /* Make input cover the entire dropzone so it's always clickable */
        .google-dropzone .cover-input {
            position: absolute;
            inset: 0;
            opacity: 0;
            cursor: pointer;
            width: 100%;
            height: 100%;
        }

        /* Submit Button */
        .submit-review-btn {
            background-color: #34a853;
            border: none;
            font-weight: 600;
            padding: 0.75rem 1.5rem;
            transition: background-color 0.2s ease-in-out, transform 0.1s ease-in-out, opacity 0.2s;
        }

        .submit-review-btn:hover:not([disabled]) {
            background-color: #2e8b57;
            transform: translateY(-1px);
        }

        .submit-review-btn[disabled] {
            opacity: 0.65;
            cursor: not-allowed;
        }

        .author-img img,
        .author-img div {
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .author-img:hover img,
        .author-img:hover div {
            transform: scale(1.05);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .review-card {
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .review-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const form = document.getElementById('reviewForm');
            const nameInput = document.getElementById('nameInput');
            const messageInput = document.getElementById('reviewMessage');
            const charCount = document.getElementById('charCount');
            const submitBtn = document.getElementById('submitReviewBtn');
            const starsContainer = document.querySelector('.google-stars');
            const ratingInput = document.getElementById('ratingInput');
            const ratingLabel = null; // no label text on hover/click per request
            const avatar = document.getElementById('googleAvatar');
            const avatarName = document.getElementById('googleAvatarName');

            const imageDropzone = document.getElementById('imageDropzone');
            const chooseImageBtn = document.getElementById('chooseImageBtn');
            const imageInput = document.getElementById('imageInput');
            const imagePreviewWrapper = document.getElementById('imagePreviewWrapper');
            const imagePreview = document.getElementById('imagePreview');
            const removeImageBtn = document.getElementById('removeImageBtn');

            const titles = ['Terrible', 'Poor', 'Average', 'Good', 'Excellent'];
            let currentRating = 0;

            // Guard: if any key element missing, stop early
            if (!form || !starsContainer || !ratingInput) return;

            // Hoisted validation to avoid "Cannot access before initialization"
            function validateForm() {
                const nameOk = nameInput && nameInput.value.trim().length > 0;
                const messageOk = messageInput && messageInput.value.trim().length >= 10;
                const ratingOk = Number(ratingInput.value) > 0;
                const valid = nameOk && messageOk && ratingOk;
                if (submitBtn) submitBtn.disabled = !valid;
                return valid;
            }

            // Star interactions via delegation (robust against reflows)
            const updateStars = (rating) => {
                const stars = starsContainer.querySelectorAll('.fas.fa-star');
                stars.forEach(star => {
                    const value = parseInt(star.getAttribute('data-value')) || 0;
                    star.classList.toggle('active', value <= rating);
                });
            };

            if (ratingInput.value) {
                currentRating = parseInt(ratingInput.value) || 0;
                updateStars(currentRating);
            }

            starsContainer.addEventListener('click', (e) => {
                const target = e.target.closest('.fas.fa-star');
                if (!target) return;
                const value = parseInt(target.getAttribute('data-value')) || 0;
                currentRating = value;
                ratingInput.value = currentRating;
                updateStars(currentRating);
                validateForm();
            });

            starsContainer.addEventListener('mouseover', (e) => {
                const target = e.target.closest('.fas.fa-star');
                if (!target) return;
                const value = parseInt(target.getAttribute('data-value')) || 0;
                updateStars(value);
            });

            starsContainer.addEventListener('mouseout', () => {
                updateStars(currentRating);
            });

            // Character counter
            const updateCharCount = () => {
                const len = messageInput.value.length;
                charCount.textContent = `${len}/1000`;
            };
            if (messageInput) {
                messageInput.addEventListener('input', () => {
                    updateCharCount();
                    validateForm();
                });
                updateCharCount();
            }

            // Avatar initials and name echo
            const updateAvatar = () => {
                const name = nameInput ? nameInput.value.trim() : '';
                if (avatarName) avatarName.textContent = name || 'Guest';
                if (avatar) {
                    const initials = name
                        .split(/\s+/)
                        .filter(Boolean)
                        .slice(0, 2)
                        .map(part => part[0]?.toUpperCase())
                        .join('') || 'G';
                    avatar.textContent = initials;
                }
                validateForm();
            };
            if (nameInput) {
                nameInput.addEventListener('input', updateAvatar);
                updateAvatar();
            }

            // Image upload + preview
            const openFileDialog = () => imageInput && imageInput.click();
            if (chooseImageBtn) chooseImageBtn.addEventListener('click', (e) => {
                e.preventDefault();
                openFileDialog();
            });
            // Click anywhere triggers file dialog via cover input
            imageDropzone.addEventListener('click', (e) => {
                if (!e.target || !e.target.matches('input[type="file"]')) {
                    openFileDialog();
                }
            });

            const handleFile = (file) => {
                if (!file) return;
                if (!file.type.startsWith('image/')) {
                    alert('Please upload an image file.');
                    return;
                }
                if (file.size > 3 * 1024 * 1024) {
                    alert('Image must be smaller than 3MB.');
                    return;
                }
                const reader = new FileReader();
                reader.onload = (e) => {
                    imagePreview.src = e.target.result;
                    imagePreviewWrapper.classList.remove('d-none');
                };
                reader.readAsDataURL(file);
                // Make sure file is attached to the input for form submission
                const dataTransfer = new DataTransfer();
                dataTransfer.items.add(file);
                imageInput.files = dataTransfer.files;
            };

            if (imageInput) imageInput.addEventListener('change', (e) => handleFile(e.target.files[0]));

            // Prevent default browser behavior globally when dragging over window to avoid file open
            ['dragover', 'drop'].forEach(evt => {
                window.addEventListener(evt, (e) => {
                    e.preventDefault();
                });
            });

            ['dragover', 'dragenter'].forEach(evt => {
                imageDropzone.addEventListener(evt, (e) => {
                    e.preventDefault();
                    e.stopPropagation();
                    imageDropzone.classList.add('dragover');
                });
            });
            ['dragleave', 'drop'].forEach(evt => {
                imageDropzone.addEventListener(evt, (e) => {
                    e.preventDefault();
                    e.stopPropagation();
                    imageDropzone.classList.remove('dragover');
                });
            });
            imageDropzone.addEventListener('drop', (e) => {
                const file = e.dataTransfer && e.dataTransfer.files && e.dataTransfer.files[0];
                if (file) handleFile(file);
            });

            if (removeImageBtn) {
                removeImageBtn.addEventListener('click', () => {
                    if (imageInput) imageInput.value = '';
                    imagePreview.src = '';
                    imagePreviewWrapper.classList.add('d-none');
                });
            }

            validateForm();

            // Toast on submit
            form.addEventListener('submit', (e) => {
                if (!validateForm()) {
                    e.preventDefault();
                    return;
                }
                const toastEl = document.getElementById('reviewToast');
                if (toastEl && window.bootstrap && bootstrap.Toast) {
                    const toast = new bootstrap.Toast(toastEl);
                    toast.show();
                }
                if (submitBtn) submitBtn.disabled = true;
            });
        });
    </script>

    @include('patient.layout.footer')

    <a href="#" class="scrollToTop scroll-bottom  style2"><i class="fas fa-arrow-alt-up"></i></a>

    <!-- Jquery -->
    <script src="{{ asset('patient/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <!-- Slick Slider -->
    <script src="{{ asset('patient/js/slick.min.js') }}"></script>
    <script src="{{ asset('patient/js/slick-animation.min.js') }}"></script>
    <!-- Layerslider -->
    <script src="{{ asset('patient/js/layerslider.utils.js') }}"></script>
    <script src="{{ asset('patient/js/layerslider.transitions.js') }}"></script>
    <script src="{{ asset('patient/js/layerslider.kreaturamedia.jquery.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('patient/js/bootstrap.min.js') }}"></script>
    <!-- jQuery Datepicker -->
    <script src="{{ asset('patient/js/jquery.datetimepicker.min.js') }}"></script>
    <!-- Magnific Popup -->
    <script src="{{ asset('patient/js/jquery.magnific-popup.min.js') }}"></script>
    <!-- Isotope Filter -->
    <script src="{{ asset('patient/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('patient/js/isotope.pkgd.min.js') }}"></script>
    <!-- Parallax Scroll -->
    <script src="{{ asset('patient/js/universal-parallax.min.js') }}"></script>
    <!-- WOW Animation -->
    <script src="{{ asset('patient/js/wow.min.js') }}"></script>
    <!-- Custom Carousel -->
    <script src="{{ asset('patient/js/vscustom-carousel.min.js') }}"></script>
    <!-- Form Js -->
    <script src="{{ asset('patient/js/ajax-mail.js') }}"></script>
    <!-- Main Js File -->
    <script src="{{ asset('patient/js/main.js') }}"></script>

</body>

</html>
