<!doctype html>
<html class="no-js " lang="en">

<head>
    @include('admin.layout.headerlink')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

    <style>
        .rating-widget {
            background: linear-gradient(135deg, #ffe082, #ffd54f);
            border-radius: 12px;
        }

        .stars i {
            margin-right: 2px;
            transition: transform 0.2s, color 0.2s;
        }

        .stars i:hover {
            transform: scale(1.3);
            color: #ffca28;
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

    <div style="margin-top: 100px;">
        <section class="content">
            <div class="container-fluid">
                <div class="row clearfix">
                    <div class="col-md-12">
                        <div class="card patients-list">
                            <div class="body">
                                <div class="table-responsive">
                                    <div class="header d-flex justify-content-between align-items-center">
                                        <h2><strong>All</strong> Reviews</h2>
                                    </div>

                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <!-- Update button -->
                                        {{-- <div>
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </div> --}}

                                        <!-- Overall Rating -->
                                        <div class="d-flex align-items-center rating-widget p-3 rounded shadow-sm"
                                            style="background: #fff8e1;">
                                            @php
                                                $totalReviews = $reviews->count();
                                                $averageRating = $reviews->avg('rating');
                                                $averageRating = number_format($averageRating, 1);
                                            @endphp

                                            <div class="d-flex align-items-center">
                                                <span class="me-3 fw-bold fs-5 text-dark">Overall Rating:</span>

                                                <span class="me-2 stars">
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        @if ($i <= floor($averageRating))
                                                            <i class="fa-solid fa-star text-warning"
                                                                style="font-size: 1.5rem;"></i>
                                                        @elseif ($i == ceil($averageRating) && $averageRating - floor($averageRating) >= 0.5)
                                                            <i class="fa-solid fa-star-half-stroke text-warning"
                                                                style="font-size: 1.5rem;"></i>
                                                        @else
                                                            <i class="fa-regular fa-star text-muted"
                                                                style="font-size: 1.5rem;"></i>
                                                        @endif
                                                    @endfor
                                                </span>

                                                <span class="fs-5 fw-bold text-dark">({{ $averageRating }}/5)</span>

                                                <span class="ms-3 text-muted">({{ $totalReviews }} Reviews)</span>
                                            </div>
                                        </div>
                                    </div>

                                    <table id="reviewsTable" class="table m-b-0 table-hover">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Location</th>
                                                <th>Rating</th>
                                                <th>Review</th>
                                                <th>Image</th>
                                                <th>Submitted At</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="reviewTableBody">
                                            @foreach ($reviews as $review)
                                                <tr>
                                                    <td>{{ $review->name }}</td>
                                                    <td>{{ $review->location ?? '-' }}</td>
                                                    <td class="text-nowrap">
                                                        <span>
                                                            @for ($i = 1; $i <= 5; $i++)
                                                                @if ($i <= $review->rating)
                                                                    <i class="fa-solid fa-star text-warning"></i>
                                                                @else
                                                                    <i class="fa-regular fa-star text-muted"></i>
                                                                @endif
                                                            @endfor
                                                        </span>
                                                    </td>
                                                    <td>{{ $review->message }}</td>
                                                    <td>
                                                        @if ($review->image_path)
                                                            <img src="{{ asset($review->image_path) }}" width="100">
                                                        @endif
                                                    </td>
                                                    <td>{{ $review->created_at->format('d/m/Y') }}</td>
                                                    <td>
                                                        <form id="delete-form-{{ $review->id }}"
                                                            action="{{ route('admin.reviews.delete', $review->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" class="btn btn-danger btn-sm"
                                                                onclick="confirmDelete({{ $review->id }})">Delete</button>
                                                        </form>
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
    </div>

    <!-- Jquery Core Js -->
    @include('admin.layout.footerlink')

</body>

</html>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#reviewsTable').DataTable({
            "pageLength": 10,
            "ordering": true,
            "searching": true,
            "lengthChange": true,
            "columnDefs": [{
                "orderable": false,
                "targets": [1, 4]
            }]
        });
    });

    window.swal = undefined;

    window.Swal = window.Swal.mixin({
        input: null
    });

    const _origFire = Swal.fire.bind(Swal);
    Swal.fire = (opts = {}) => {
        opts.input = null;

        const merged = Object.assign({
            didOpen: (el) => {
                el.querySelectorAll('select').forEach(s => s.remove());
                el.querySelectorAll('.bootstrap-select, .dropdown.bootstrap-select').forEach(w => w
                    .remove());
            }
        }, opts);

        if (opts.didOpen) {
            const ours = merged.didOpen;
            merged.didOpen = (el) => {
                ours(el);
                opts.didOpen(el);
            };
        }

        return _origFire(merged);
    };
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // --- Success Message Alert (from your code) ---
        const successMessage = "{{ session('success') }}";
        if (successMessage) {
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: successMessage,
                timer: 5000,
                showConfirmButton: true,
                timerProgressBar: true,
            });
        }
    });

    // --- Delete Confirmation Function ---
    function confirmDelete(id) {
        Swal.fire({
            title: "Are you sure?",
            text: "This review will be permanently deleted!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
            }
        });
    }
</script>
