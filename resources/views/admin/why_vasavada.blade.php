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

        .action-buttons {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 12px;
            margin-top: 8px;
        }

        .btn-gradient {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: linear-gradient(90deg, #43cea2 0%, #185a9d 100%);
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 10px 28px;
            font-weight: 700;
            min-width: 180px;
        }

        .btn-gradient:hover {
            background: linear-gradient(90deg, #185a9d 0%, #43cea2 100%);
            color: #fff;
        }

        .btn-gradient-primary {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: linear-gradient(90deg, #43cea2 0%, #185a9d 100%);
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 10px 28px;
            font-weight: 700;
            min-width: 180px;
        }

        .btn-gradient-primary:hover {
            background: linear-gradient(90deg, #185a9d 0%, #43cea2 100%);
            color: #fff;
        }

        .btn-gradient-secondary {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: linear-gradient(90deg, #a18cd1 0%, #fbc2eb 100%);
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 10px 28px;
            font-weight: 700;
            min-width: 180px;
        }

        .btn-gradient-secondary:hover {
            background: linear-gradient(90deg, #8f79c8 0%, #f7addf 100%);
            color: #fff;
        }

        .btn-gradient-cancel {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: linear-gradient(90deg, #dee2e6 0%, #adb5bd 100%);
            color: #212529;
            border: none;
            border-radius: 8px;
            padding: 10px 28px;
            font-weight: 700;
            min-width: 140px;
        }

        .btn-gradient-cancel:hover {
            background: linear-gradient(90deg, #ced4da 0%, #6c757d 100%);
            color: #212529;
        }

        .btn-disabled {
            opacity: 0.6;
            cursor: not-allowed;
            pointer-events: none;
        }

        /* Enhancements */
        .form-section-title {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .form-section-title .small-note {
            color: #6c757d;
            font-weight: 500;
            font-size: 12px;
        }

        .item-row {
            background: #f9fbfd;
            border: 1px solid #eef2f7;
            border-radius: 10px;
        }

        .badge {
            display: inline-block;
            padding: 0.35em 0.6em;
            font-size: 12px;
            font-weight: 700;
            line-height: 1;
            color: #185a9d;
            background-color: #e3f2fd;
            border-radius: 10px;
        }

        /* Item row polish */
        .icon-file-name {
            font-size: 12px;
            color: #6c757d;
            margin-top: 6px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .icon-file-name i {
            color: #185a9d;
        }

        /* Summernote theming */
        .note-editor.note-frame {
            border: 1px solid #e6ecf1;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(24, 90, 157, 0.05);
            overflow: hidden;
        }

        .note-editor .note-toolbar {
            background: linear-gradient(90deg, #f8fafc 0%, #eef5fb 100%);
            border-bottom: 1px solid #e6ecf1;
            padding: 6px 8px;
        }

        .note-editor .note-toolbar .note-btn-group .note-btn {
            border-radius: 6px;
            border: 1px solid #d7e3ef;
            background: #ffffff;
            color: #185a9d;
        }

        .note-editor .note-toolbar .note-btn:hover {
            background: #f0f7ff;
            border-color: #c4d7ea;
            color: #0f4774;
        }

        .note-editor .note-editable {
            min-height: 220px;
            padding: 14px 16px;
            line-height: 1.6;
        }

        .note-placeholder {
            color: #94a3b8;
        }

        .note-statusbar {
            background: #f8fafc;
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
                    <h2>Why Vasavada Section</h2>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2 class="form-section-title">
                                <strong>Why Vasavada Section</strong>
                                <span class="badge">Create / Update</span>
                            </h2>
                        </div>
                        <div class="body">
                            <form
                                action="{{ $section ? route('admin.why_vasavada.update', $section->id) : '#' }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                @if ($section)
                                    @method('PUT')
                                @endif

                                <!-- Section Fields -->
                                <div class="row clearfix">
                                    {{-- <div class="col-md-4 col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">Section Name</label>
                                            <input type="text" name="name" class="form-control"
                                                value="{{ old('name', $section->name ?? '') }}" readonly>
                                        </div>
                                    </div> --}}
                                    <div class="col-md-4 col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">Title</label>
                                            <input type="text" name="title" class="form-control"
                                                value="{{ old('title', $section->title ?? '') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">Subtitle</label>
                                            <input type="text" name="subtitle" class="form-control"
                                                value="{{ old('subtitle', $section->subtitle ?? '') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Description</label>
                                            <textarea name="description" class="form-control summernote" id="description">{{ old('description', $section->description ?? '') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Image</label>
                                            <div class="modern-upload-wrapper" id="modern-upload-area">
                                                <label class="modern-upload-label" for="image">
                                                    <i class="zmdi zmdi-cloud-upload"></i>
                                                    Upload Image
                                                </label>
                                                <input type="file" class="modern-upload-input" name="image"
                                                    id="image" accept="image/*">
                                                <button type="button" class="modern-upload-btn"
                                                    onclick="document.getElementById('image').click();">Choose
                                                    File</button>
                                                <span class="modern-upload-info"></span>
                                                <span class="text-danger" id="image-error"></span>
                                                <div class="modern-upload-preview" id="current_image"
                                                    style="display: {{ $section && $section->image ? 'block' : 'none' }};">
                                                    @if ($section && $section->image)
                                                        <img src="{{ asset($section->image) }}" alt="Image"
                                                            style="max-width: 120px; max-height: 120px;">
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <h5 class="form-section-title">Section Items <span class="small-note">Add reasons,
                                        features, or highlights</span></h5>

                                <div id="items-wrapper">
                                    @if ($section && $section->items->count())
                                        @foreach ($section->items as $index => $item)
                                            <div class="card p-3 mb-2 item-row">
                                                <input type="hidden" name="items[{{ $index }}][id]"
                                                    value="{{ $item->id }}">
                                                <input type="hidden" name="items[{{ $index }}][existing_icon]"
                                                    value="{{ $item->icon }}">
                                                <div class="row">
                                                    <div class="col-md-4 mb-2">
                                                        <label>Icon (SVG)</label>
                                                        <input type="file" name="items[{{ $index }}][icon]"
                                                            accept="image/svg+xml,.svg"
                                                            class="form-control item-icon-input">
                                                        <div class="icon-file-name">
                                                            <i class="zmdi zmdi-file"></i>
                                                            <span
                                                                class="file-name-text">{{ $item->icon ? basename($item->icon) : 'No file selected' }}</span>
                                                        </div>
                                                        <small class="text-muted">Upload SVG icon</small>
                                                        <div class="icon-preview mt-2">
                                                            @if (!empty($item->icon))
                                                                <img src="{{ asset($item->icon) }}" alt="icon"
                                                                    style="height:36px;width:auto;">
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 mb-2">
                                                        <label>Title</label>
                                                        <input type="text"
                                                            name="items[{{ $index }}][title]"
                                                            class="form-control"
                                                            value="{{ old("items.$index.title", $item->title) }}"
                                                            required>
                                                    </div>
                                                    <div class="col-md-3 mb-2">
                                                        <label>Order</label>
                                                        <input type="number"
                                                            name="items[{{ $index }}][order]"
                                                            class="form-control"
                                                            value="{{ old("items.$index.order", $item->order) }}">
                                                    </div>
                                                    <div class="col-md-1 d-flex align-items-end mb-2">
                                                        <button type="button"
                                                            class="btn btn-danger btn-sm remove-item">Remove</button>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>

                                <div class="action-buttons">
                                    <button type="button" id="add-item" class="btn btn-gradient-secondary">
                                        <i class="zmdi zmdi-plus-circle-o"></i>
                                        Add Item
                                    </button>
                                    <button type="submit" class="btn btn-gradient-primary {{ !$section ? 'btn-disabled' : '' }}" {{ !$section ? 'disabled' : '' }} title="{{ !$section ? 'No record to update' : '' }}">
                                        <i class="zmdi zmdi-check-circle"></i>
                                        Update Section
                                    </button>
                                    @if ($section)
                                        <a href="{{ route('admin.why_vasavada') }}" class="btn btn-gradient-cancel">
                                            <i class="zmdi zmdi-undo"></i>
                                            Cancel
                                        </a>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2 class="form-section-title">
                                <strong>Existing Sections</strong>
                                <span class="badge">Overview</span>
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Title</th>
                                            <th>Items</th>
                                            <th>Image</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse(($sections ?? []) as $i => $s)
                                            <tr>
                                                <td>{{ $s->id }}</td>
                                                <td>{{ $s->name }}</td>
                                                <td>{{ $s->title }}</td>
                                                <td>{{ $s->items_count }}</td>
                                                <td>
                                                    @if ($s->image)
                                                        <img src="{{ asset($s->image) }}" alt="img"
                                                            style="height:40px;width:auto;border-radius:6px;box-shadow:0 2px 8px rgba(0,0,0,0.05);">
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.why_vasavada.edit', $s->id) }}"
                                                        class="btn btn-sm btn-gradient-primary"
                                                        style="min-width:auto;padding:6px 14px;">
                                                        <i class="zmdi zmdi-edit"></i>
                                                    </a>
                                                    {{-- <form action="{{ route('admin.why_vasavada.delete', $s->id) }}"
                                                        method="POST" style="display:inline-block"
                                                        class="delete-form">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn btn-sm btn-gradient-secondary btn-delete"
                                                            style="min-width:auto;padding:6px 14px;">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </button>
                                                    </form> --}}
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center">No sections found.</td>
                                            </tr>
                                        @endforelse
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

    <script>
        $(document).ready(function() {
            $('.summernote').summernote({
                placeholder: 'Write a compelling description... You can format text, lists, and links here.',
                height: 260,
                minHeight: 200,
                maxHeight: 480,
                dialogsInBody: true,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['fontname', ['fontname']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['codeview', 'help']]
                ],
                fontNames: ['Arial', 'Helvetica', 'Times New Roman', 'Roboto', 'Calibri'],
                fontSizes: ['12', '14', '16', '18', '20', '24', '28'],
            });

            // Image preview
            $('#image').on('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(evt) {
                        $('#current_image').html('<img src="' + evt.target.result + '" alt="Image">');
                        $('#current_image').css('display', 'flex');
                    };
                    reader.readAsDataURL(file);
                } else {
                    $('#current_image').html('');
                    $('#current_image').css('display', 'none');
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
                text: "{{ session('success') }}",
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let index = {{ $section && $section->items ? $section->items->count() : 0 }};

            document.getElementById('add-item').addEventListener('click', function() {
                let wrapper = document.getElementById('items-wrapper');
                let html = `
            <div class="card p-3 mb-2 item-row">
                <div class="row">
                    <div class="col-md-4 mb-2">
                        <label>Icon (SVG)</label>
                        <input type="file" name="items[${index}][icon]" accept="image/svg+xml,.svg" class="form-control item-icon-input">
                        <div class="icon-file-name">
                            <i class="zmdi zmdi-file"></i>
                            <span class="file-name-text">No file selected</span>
                        </div>
                        <small class="text-muted">Upload SVG icon</small>
                        <div class="icon-preview mt-2"></div>
                    </div>
                    <div class="col-md-4 mb-2">
                        <label>Title</label>
                        <input type="text" name="items[${index}][title]" class="form-control" required>
                    </div>
                    <div class="col-md-3 mb-2">
                        <label>Order</label>
                        <input type="number" name="items[${index}][order]" class="form-control">
                    </div>
                    <div class="col-md-1 d-flex align-items-end mb-2">
                        <button type="button" class="btn btn-danger btn-sm remove-item">Remove</button>
                    </div>
                </div>
            </div>
        `;
                wrapper.insertAdjacentHTML('beforeend', html);
                index++;
            });

            // remove item row
            document.addEventListener('click', function(e) {
                if (e.target.classList.contains('remove-item')) {
                    e.target.closest('.item-row').remove();
                }
            });

            // SweetAlert confirm for delete
            document.querySelectorAll('form.delete-form').forEach(function(form) {
                form.addEventListener('submit', function(ev) {
                    ev.preventDefault();
                    Swal.fire({
                        title: 'Are you sure?',
                        text: 'This action will permanently delete the section.',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#185a9d',
                        cancelButtonColor: '#adb5bd',
                        confirmButtonText: 'Yes, delete it!',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });

            // Live preview for SVG icon inputs
            document.addEventListener('change', function(e) {
                if (e.target && e.target.classList.contains('item-icon-input')) {
                    const input = e.target;
                    const container = input.closest('.col-md-4');
                    const preview = container.querySelector('.icon-preview');
                    const nameEl = container.querySelector('.file-name-text');
                    preview.innerHTML = '';
                    const file = input.files && input.files[0];
                    if (!file) return;
                    if (file.type !== 'image/svg+xml') {
                        preview.innerHTML = '<span class="text-danger">Please upload an SVG file.</span>';
                        input.value = '';
                        nameEl.textContent = 'No file selected';
                        return;
                    }
                    nameEl.textContent = file.name;
                    const reader = new FileReader();
                    reader.onload = function(evt) {
                        const url = evt.target.result;
                        preview.innerHTML = '<img src="' + url +
                            '" alt="icon" style="height:36px;width:auto;">';
                    };
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>
</body>

</html>
