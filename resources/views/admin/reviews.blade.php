<!doctype html>
<html class="no-js " lang="en">

<head>
    @include('admin.layout.headerlink')
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
                                        <h2><strong>Pending</strong> Reviews</h2>
                                    </div>

                                    <table class="table m-b-0 table-hover">
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
                                        <tbody>
                                            @foreach ($pendingReviews as $review)
                                                <tr>
                                                    <td>{{ $review->name }}</td>
                                                    <td>{{ $review->location }}</td>
                                                    <td>{{ $review->rating }}</td>
                                                    <td>{{ $review->message }}</td>
                                                    <td>
                                                        @if ($review->image_path)
                                                            <img src="{{ asset($review->image_path) }}"
                                                                alt="Review Photo" width="100">
                                                        @endif
                                                    </td>
                                                    <td>{{ $review->created_at->format('M d, Y') }}</td>
                                                    <td>
                                                        {{-- Approve button --}}
                                                        <form action="{{ route('reviews.approve', $review) }}"
                                                            method="POST" style="display: inline-block;"
                                                            class="approve-form">
                                                            @csrf
                                                            <button type="submit"
                                                                class="btn btn-success btn-round approve-review-btn">Approve</button>
                                                        </form>

                                                        {{-- Reject button --}}
                                                        <form action="{{ route('reviews.reject', $review) }}"
                                                            method="POST" style="display: inline-block;"
                                                            class="reject-form">
                                                            @csrf
                                                            <button type="submit"
                                                                class="btn btn-danger btn-round reject-review-btn">Reject</button>
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

<script>
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

        // --- Code for Approve/Reject Buttons (First Block) ---
        document.querySelectorAll('.approve-review-btn').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();

                const form = this.closest('form');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You are about to approve this review!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, approve it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });

        document.querySelectorAll('.reject-review-btn').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();

                const form = this.closest('form');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You are about to reject this review!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, reject it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });

        // --- Code for Success Message (Second Block) ---
        const successMessage = "{{ session('success') }}";

        if (successMessage) {
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: successMessage,
                timer: 5000,
                showConfirmButton: true,
                showProgressBar: true,
            });
        }
    });
</script>
