<!doctype html>
<html class="no-js " lang="en">

<head>
    @include('admin.layout.headerlink')

    <!-- Summernote CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
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
                                            <input type="text" class="form-control" name="question" id="question"
                                                placeholder="Enter question">
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <textarea class="form-control summernote" name="answer" id="answer" placeholder="Enter answer"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <!-- New Checkbox -->
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group form-check" style="margin-left: 12px;">
                                            <input type="checkbox" class="form-check-input" name="show_on_home"
                                                id="show_on_home" value="1">
                                            <label class="form-check-label" for="show_on_home">Show on Homepage</label>
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
                                <table id="faqsTable" class="table m-b-0 table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Question</th>
                                            <th>Answer</th>
                                            <th>Show on Home</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($faqs as $faq)
                                            <tr>
                                                <td><span class="list-name">
                                                        {{ str_pad($faq->id, STR_PAD_LEFT) }}</span></td>
                                                <td>{{ $faq->question }}</td>
                                                <td>{!! $faq->answer !!}</td>
                                                <td>
                                                    @if ($faq->show_on_home)
                                                        <span class="badge badge-success">Yes</span>
                                                    @else
                                                        <span class="badge badge-danger">No</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-primary btn-round edit-faq"
                                                        data-id="{{ $faq->id }}"
                                                        data-question="{{ $faq->question }}"
                                                        data-answer="{{ $faq->answer }}"
                                                        data-show_on_home="{{ $faq->show_on_home }}">Edit</button>
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

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#faqsTable').DataTable({
                "pageLength": 10,
                "ordering": true,
                "searching": true,
                "lengthChange": true,
                "columnDefs": [{
                    "orderable": false,
                    "targets": [4]
                }]
            });
        });

        $(document).ready(function() {
            $('.edit-faq').on('click', function() {
                const id = $(this).data('id');
                const question = $(this).data('question');
                const answer = $(this).data('answer');
                const show_on_home = $(this).data('show_on_home') || 0;

                $('#faq_id').val(id);
                $('#question').val(question);
                $('#show_on_home').prop('checked', show_on_home == 1);

                $('#answer').summernote('code', answer);

                $('button[type="submit"]').text('Update');

                $('html, body').animate({ scrollTop: 0 }, 'slow');
            });

            $('#faq_form').on('submit', function(e) {
                e.preventDefault();
                const formData = new FormData(this);

                if ($('#show_on_home').is(':checked')) {
                    formData.set('show_on_home', 1);
                } else {
                    formData.set('show_on_home', 0);
                }

                const faqId = $('#faq_id').val();
                const url = faqId ?
                    '{{ route('admin.faq.update', ['id' => ':id']) }}'.replace(':id', faqId) :
                    '{{ route('admin.faq.store') }}';
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
                                        showConfirmButton: true
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
                    $('#answer').summernote('code', '');
                    $('button[type="submit"]').text('Submit');
                });
        });
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
</body>

</html>
