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

    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>All Submenus</h2>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Submenu</strong></h2>
                        </div>
                        <div class="body">
                            <form action="{{ route('submenu.store') }}" method="POST" id="add-submenu-form"
                                class="form-wrap3 mb-30" data-bg-color="#f3f6f7">
                                @csrf
                                <input type="hidden" name="submenu_id" id="submenu_id" value="{{ $submenu->id }}">
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <select class="form-control" name="menu_id" id="menu_id" style="margin-left: 12px;">
                                                @foreach ($menus as $menu)
                                                    <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="submenu_name"
                                                id="submenu_name" placeholder="Submenu Name"
                                                value="{{ old('submenu_name', $submenu->name ?? '') }}">
                                            <span class="text-danger" id="name-error"></span>
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="checkbox" id="is_displayed" name="is_displayed" value="1"
                                                {{ old('is_displayed', $submenu->is_displayed ?? true) ? 'checked' : '' }}>
                                            <label for="is_displayed">Is Displayed</label>
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
                                            <th>Name</th>
                                            <th>Menu</th>
                                            <th>Sequence</th>
                                            <th>Link</th>
                                            <th>Is Displayed</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($submenus as $submenu)
                                            <tr>
                                                <td><span class="list-name">
                                                        {{ str_pad($submenu->id, STR_PAD_LEFT) }}</span></td>
                                                <td>{{ $submenu->submenu_name }}</td>
                                                <td>{{ $submenu->menu->name }}</td>
                                                <td>{{ $submenu->submenu_sequence }}</td>
                                                <td>{{ $submenu->submenu_link }}</td>
                                                <td>
                                                    @if ($submenu->is_displayed)
                                                        <span style="color: green;">&#10004;</span>
                                                    @else
                                                        <span style="color: red;">&#10008;</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <button type="button"
                                                        class="btn btn-primary btn-round edit-submenu"
                                                        data-id="{{ $submenu->id }}"
                                                        data-menu_id="{{ $submenu->menu_id }}"
                                                        data-submenu_name="{{ $submenu->submenu_name }}"
                                                        data-submenu_sequence="{{ $submenu->submenu_sequence }}"
                                                        data-submenu_link="{{ $submenu->submenu_link }}"
                                                        data-is_displayed="{{ $submenu->is_displayed }}" disabled>Edit</button>
                                                    <a href="#" class="btn btn-danger btn-round delete-submenu"
                                                        data-id="{{ $submenu->id }}" disabled>Delete</a>
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
            $('.edit-submenu').on('click', function() {
                const id = $(this).data('id');
                const menu_id = $(this).data('menu_id');
                const submenu_name = $(this).data('submenu_name');
                const is_displayed = $(this).data('is_displayed');

                $('#submenu_id').val(id);
                $('#menu_id').val(menu_id);
                $('#submenu_name').val(submenu_name);
                $('#is_displayed').prop('checked', is_displayed == 1);

                // Change form submit button text
                $('button[type="submit"]').text('Update');
            });

            $('#add-submenu-form').on('submit', function(e) {
                e.preventDefault();
                const name = $('#submenu_name').val();
                const nameRegex = /^[A-Za-z0-9 !@#$%^&*(),.?":{}|<>_\-]+$/;

                if (name === '' || name.length > 50 || !nameRegex.test(name)) {
                    $('#name-error').text(
                        'Name field is required, must not exceed 50 characters, and must contain only alphabetic characters.'
                        );
                    $('#submenu_name').focus();
                    return;
                } else {
                    $('#name-error').text('');
                }

                const formData = new FormData(this);
                const submenuId = $('#submenu_id').val();
                const url = submenuId ? '{{ route('admin.submenu.update', ['id' => ':id']) }}'.replace(
                    ':id', submenuId) : '{{ route('submenu.store') }}';
                const method = submenuId ? 'POST' : 'POST';

                if (submenuId) {
                    formData.append('_method', 'PUT');
                }

                console.log('formData:', formData);

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
                                willClose: () => {
                                    window.location.reload();
                                    reloadTable();
                                }
                            });

                            $('#add-submenu-form')[0].reset();
                            $('#submenu_id').val('');
                            $('button[type="submit"]').text('Submit');
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: response.message || 'Something went wrong!',
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

            $(document).on('click', 'button[type="reset"], .cancel-btn, #cancel-btn, button:contains("Cancel")',
                function(e) {
                    e.preventDefault();
                    $('#add-submenu-form')[0].reset();
                    $('#submenu_id').val('');
                    $('button[type="submit"]').text('Submit');
                    $('#name-error').text(''); // Hide validation message
                });

            $(document).on('click', '.delete-submenu', function(e) {
                e.preventDefault();
                const submenuId = $(this).data('id');
                console.log(submenuId);

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '{{ route('admin.submenu.delete', ['id' => ':id']) }}'
                                .replace(':id', submenuId),
                            type: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(response) {
                                if (response.status === 'success' || response.status ===
                                    true) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Deleted',
                                        text: response.message ||
                                            'Menu deleted successfully!',
                                        timer: 5000,
                                        timerProgressBar: true,
                                        willClose: () => {
                                            window.location.reload();
                                            reloadTable();
                                        }
                                    });
                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Error',
                                        text: response.message ||
                                            'Something went wrong!',
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
                    }
                });
            });

            function reloadTable() {
                $.get(window.location.href, function(response) {
                    const newTable = $(response).find('.table-responsive').html();
                    $('.table-responsive').html(newTable);
                });
            }

            $('#submenu_name').on('input', function() {
                const name = $(this).val();
                const nameRegex = /^[A-Za-z]+$/;
                if (name !== '' && name.length <= 10 && nameRegex.test(name)) {
                    $('#name-error').text('');
                }
                const baseUrl = 'http://localhost:8000/';
                $('#link').val(baseUrl + name.toLowerCase().replace(/\s+/g, '-'));
            });

            // Automatically set the sequence number
            const nextSequence = {{ $menus->count() + 1 }};
            $('#sequence').val(nextSequence);
        });
    </script>
</body>

</html>
