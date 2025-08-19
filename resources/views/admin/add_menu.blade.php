<!doctype html>
<html class="no-js " lang="en">

<head>
    @include('admin.layout.headerlink')

    <style>
        .position-select {
            appearance: auto !important;
            -webkit-appearance: auto !important;
            -moz-appearance: auto !important;
            background-image: none !important;
            /* Removes extra arrow */
            padding-right: 8px;
            /* Adjust spacing */
        }

        /* Optional: make it look modern */
        .position-select {
            border-radius: 6px;
            border: 1px solid #ccc;
            padding: 4px 8px;
            font-size: 14px;
            transition: all 0.2s ease-in-out;
        }

        .position-select:focus {
            border-color: #007bff;
            box-shadow: 0 0 4px rgba(0, 123, 255, 0.4);
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

    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>All Menus</h2>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Menu</strong></h2>
                        </div>
                        <div class="body">
                            <form action="{{ route('admin.menu.store') }}" method="POST" id="add-menu-form"
                                class="form-wrap3 mb-30" data-bg-color="#f3f6f7">
                                @csrf
                                <input type="hidden" name="menu_id" id="menu_id" value="{{ $menu->id }}">
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="name" id="name"
                                                placeholder="Name" value="{{ old('name', $menu->name ?? '') }}">
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
                                                {{ old('is_displayed', $menu->is_displayed ?? true) ? 'checked' : '' }}>
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
                                            <th>Sequence</th>
                                            <th>Link</th>
                                            <th>Is Displayed</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="menuBody">
                                        @foreach ($menus as $menu)
                                            <tr data-id="{{ $menu->id }}">
                                                <td><span
                                                        class="list-name">{{ str_pad($menu->id, STR_PAD_LEFT) }}</span>
                                                </td>
                                                <td>{{ $menu->name }}</td>
                                                <td class="text-left">
                                                    <select name="sequence[{{ $menu->id }}]"
                                                        class="form-control position-select">
                                                        @for ($i = 1; $i <= count($menus); $i++)
                                                            <option value="{{ $i }}"
                                                                {{ $menu->sequence == $i ? 'selected' : '' }}>
                                                                {{ $i }}
                                                            </option>
                                                        @endfor
                                                    </select>
                                                </td>
                                                <td>{{ $menu->link }}</td>
                                                <td>
                                                    @if ($menu->is_displayed)
                                                        <span style="color: green;">&#10004;</span>
                                                    @else
                                                        <span style="color: red;">&#10008;</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-primary btn-round edit-menu"
                                                        data-id="{{ $menu->id }}" data-name="{{ $menu->name }}"
                                                        data-sequence="{{ $menu->sequence }}"
                                                        data-link="{{ $menu->link }}"
                                                        data-is_displayed="{{ $menu->is_displayed }}">Edit</button>
                                                    <a href="#" class="btn btn-danger btn-round delete-menu"
                                                        data-id="{{ $menu->id }}">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <button id="saveSequence" class="btn btn-success mt-3">Save Order</button>
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
            $('.edit-menu').on('click', function() {
                const id = $(this).data('id');
                const name = $(this).data('name');
                const is_displayed = $(this).data('is_displayed');

                $('#menu_id').val(id);
                $('#name').val(name);
                $('#is_displayed').prop('checked', is_displayed == 1);

                // Change form submit button text
                $('button[type="submit"]').text('Update');
            });

            $('#add-menu-form').on('submit', function(e) {
                e.preventDefault();
                const name = $('#name').val();
                const nameRegex = /^[A-Za-z ]+$/;

                if (name === '' || name.length > 20 || !nameRegex.test(name)) {
                    $('#name-error').text(
                        'Name field is required, must not exceed 20 characters, and must contain only alphabetic characters.'
                    );
                    $('#name').focus();
                    return;
                } else {
                    $('#name-error').text('');
                }

                const formData = new FormData(this);
                const menuId = $('#menu_id').val();
                const url = menuId ? '{{ route('admin.menu.update', ['id' => ':id']) }}'.replace(':id',
                    menuId) : '{{ route('admin.menu.store') }}';
                const method = menuId ? 'POST' : 'POST';

                if (menuId) {
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
                                willClose: () => {
                                    window.location.reload();
                                    reloadTable();
                                }
                            });
                            $('#add-menu-form')[0].reset();
                            $('#menu_id').val('');
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
                    $('#add-menu-form')[0].reset();
                    $('#menu_id').val('');
                    $('button[type="submit"]').text('Submit');
                    $('#name-error').text(''); // Hide validation message
                });

            $(document).on('click', '.delete-menu', function(e) {
                e.preventDefault();
                const menuId = $(this).data('id');
                console.log(menuId);
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
                            url: '{{ route('admin.menu.delete', ['id' => ':id']) }}'
                                .replace(':id', menuId),
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

            $('#name').on('input', function() {
                const name = $(this).val();
                const nameRegex = /^[A-Za-z]+$/;
                if (name !== '' && name.length <= 10 && nameRegex.test(name)) {
                    $('#name-error').text('');
                }
                const baseUrl = 'http://localhost:8000/';
                $('#link').val(baseUrl + name.toLowerCase().replace(/\s+/g, '-'));
            });

            const nextSequence = {{ $menus->count() + 1 }};
            $('#sequence').val(nextSequence);

            let tableBody = document.getElementById('menuBody');

            $(document).on('change', '.position-select', function() {
                let row = this.closest('tr');
                let newPosition = parseInt(this.value);
                let rows = Array.from(tableBody.querySelectorAll('tr'));

                rows.splice(rows.indexOf(row), 1);
                rows.splice(newPosition - 1, 0, row);

                rows.forEach(r => tableBody.appendChild(r));

                tableBody.querySelectorAll('tr').forEach((tr, idx) => {
                    tr.querySelector('.position-select').value = idx + 1;
                });
            });

            $('#saveSequence').on('click', function() {
                let data = {};
                $('#menuBody tr').each(function(idx, tr) {
                    data[$(tr).data('id')] = idx + 1;
                });

                fetch("{{ route('menus.updateSequence') }}", {
                        method: "POST",
                        headers: {
                            "X-CSRF-TOKEN": "{{ csrf_token() }}",
                            "Content-Type": "application/json"
                        },
                        body: JSON.stringify({
                            sequence: data
                        })
                    })
                    .then(res => res.json())
                    .then(res => {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: res.message || 'Menu order updated successfully!',
                            timer: 5000,
                            showConfirmButton: true
                        }).then(() => {
                            window.location.reload();
                        });
                    });
            });
        });
    </script>
</body>

</html>
