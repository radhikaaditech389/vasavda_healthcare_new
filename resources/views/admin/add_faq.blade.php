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

    <!-- Right Sidebar -->
    @include('admin.layout.rightsidebar')

    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Add FAQ</h2>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Faq</strong></h2>
                        </div>
                        <div class="body">
                            <form action="#" method="POST" id="faq_form" class="form-wrap3 mb-30"
                                data-bg-color="#f3f6f7">
                                @csrf
                                <input type="hidden" name="faq_id" id="faq_id">
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <select class="form-control" name="menu_id" id="menu_id"
                                                style="margin-left: 12px;">
                                                @foreach ($menus as $menu)
                                                    <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="question" id="question"
                                                placeholder="Enter question">
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="answer" id="answer"
                                                placeholder="Enter answer">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group m-t-5">
                                            <input type="text" class="form-control" name="link" id="link"
                                                placeholder="Enter link" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-primary btn-round">Submit</button>
                                        <button type="reset" class="btn btn-default btn-round btn-simple"
                                            id="cancel-btn">Cancel</button>
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
                                <table class="table m-b-0 table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Question</th>
                                            <th>Answer</th>
                                            <th>Menu</th>
                                            <th>Link</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($faqs as $faq)
                                            <tr>
                                                <td><span class="list-name">
                                                        {{ str_pad($faq->id, STR_PAD_LEFT) }}</span></td>
                                                <td>{{ $faq->question }}</td>
                                                <td>{{ $faq->answer }}</td>
                                                <td>{{ $faq->menu->name }}</td>
                                                <td>{{ $faq->link }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-primary btn-round edit-faq"
                                                        data-id="{{ $faq->id }}" data-menu_id="{{ $faq->menu_id }}"
                                                        data-question="{{ $faq->question }}"
                                                        data-answer="{{ $faq->answer }}"
                                                        data-link="{{ $faq->link }}">Edit</button>
                                                    <a href="#" class="btn btn-danger btn-round delete-faq"
                                                        data-id="{{ $faq->id }}">Delete</a>
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

    <script>
        $(document).ready(function() {
            $('.edit-faq').on('click', function() {
                const id = $(this).data('id');
                const menu_id = $(this).data('menu_id');
                const question = $(this).data('question');
                const answer = $(this).data('answer');
                const link = $(this).data('link');

                $('#faq_id').val(id);
                $('#menu_id').val(menu_id);
                $('#question').val(question);
                $('#answer').val(answer);
                $('#link').val(link);

                // Change form submit button text
                $('button[type="submit"]').text('Update');
            });

            $('#faq_form').on('submit', function(e) {
                e.preventDefault();
                const formData = new FormData(this);
                const faqId = $('#faq_id').val();
                const url = faqId ? '{{ route('admin.faq.update', ['id' => ':id']) }}'.replace(':id',
                    faqId) : '{{ route('admin.faq.store') }}';
                const method = faqId ? 'POST' : 'POST';

                if (faqId) {
                    formData.append('_method', 'PUT');
                }

                $.ajax({
                    url: url,
                    type: method,
                    data: formData,
                    cache: false,
                    processData: false,
                    contentType: false,
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if (response.status === 'success' || response.status === true) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: response.message ||
                                    'Operation completed successfully!',
                                timer: 5000,
                                timerProgressBar: true,
                                showConfirmButton: true
                            }).then(() => {
                                window.location.reload();
                            });

                            $('#faq_form')[0].reset();
                            $('#faq_id').val('');
                            $('button[type="submit"]').text('Submit');
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: response.message || 'Something went wrong!',
                                timer: 5000,
                                timerProgressBar: true
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'An error occurred: ' + error,
                        });
                        console.log('Error:', error);
                    }
                });
            });

            $(document).on('click', '.delete-faq', function(e) {
                e.preventDefault();
                const faqId = $(this).data('id');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "This action will permanently delete the FAQ.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '{{ route('admin.faq.delete', ['id' => ':id']) }}'
                                .replace(':id', faqId),
                            type: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(response) {
                                if (response.status === 'success' || response.status ===
                                    true) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Deleted!',
                                        text: response.message ||
                                            'FAQ deleted successfully.',
                                        timer: 2000,
                                        showConfirmButton: false
                                    }).then(() => {
                                        window.location.reload();
                                    });
                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Error',
                                        text: response.message ||
                                            'Something went wrong'
                                    });
                                }
                            },
                            error: function(xhr, status, error) {
                                console.log('Error:', error);
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: 'Unable to delete. Please try again later.'
                                });
                            }
                        });
                    }
                });
            });

            $(document).on('click', 'button[type="reset"], .cancel-btn, #cancel-btn, button:contains("Cancel")',
                function(e) {
                    e.preventDefault();
                    $('#faq_form')[0].reset();
                    $('#faq_id').val('');
                    $('button[type="submit"]').text('Submit');
                });
        });
    </script>
</body>

</html>
