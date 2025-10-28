@extends('backend.layout.master')

@push('styles')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<!-- SweetAlert2 -->
<link rel="stylesheet" href="{{ asset('backend/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
@endpush

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Top Bar Settings</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <button type="button" class="btn btn-primary" id="addNewBtn">
                        <i class="fas fa-plus"></i> Add New
                    </button>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="topBarTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Opening Hours</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Data will be loaded by DataTables -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- Create/Edit Modal -->
<div class="modal fade" id="topBarModal" tabindex="-1" role="dialog" aria-labelledby="topBarModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="topBarModalLabel">Add Top Bar Setting</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="topBarForm" method="POST">
                @csrf
                <input type="hidden" name="_method" id="formMethod" value="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                        <span class="invalid-feedback" id="emailError"></span>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="text" class="form-control" id="phone" name="phone" required>
                        <span class="invalid-feedback" id="phoneError"></span>
                    </div>
                    <div class="form-group">
                        <label for="opening_hours">Opening Hours</label>
                        <input type="text" class="form-control" id="opening_hours" name="opening_hours" required>
                        <small class="form-text text-muted">Example: Mon-Fri: 9:00 AM - 6:00 PM</small>
                        <span class="invalid-feedback" id="openingHoursError"></span>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="is_active" name="is_active" value="1" checked>
                            <label class="custom-control-label" for="is_active">Active</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="saveBtn">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<!-- DataTables  & Plugins -->
<script src="{{ asset('backend/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('backend/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<!-- SweetAlert2 -->
<script src="{{ asset('backend/plugins/sweetalert2/sweetalert2.min.js') }}"></script>

<script>
    $(function () {
        // Initialize DataTable
        var table = $('#topBarTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('admin.top-bar.index') }}",
                type: 'GET',
                error: function(xhr, error, code) {
                    console.error('DataTables error:', error);
                    console.error('Status:', xhr.status);
                    console.error('Response:', xhr.responseText);
                }
            },
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                {data: 'email', name: 'email'},
                {data: 'phone', name: 'phone'},
                {data: 'opening_hours', name: 'opening_hours'},
                {data: 'status', name: 'status', orderable: false, searchable: false},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
            responsive: true,
            autoWidth: false,
            drawCallback: function(settings) {
                console.log('DataTables draw event');
                console.log('Records total:', settings.aoData.length);
                console.log('JSON data:', settings.json);
            },
            initComplete: function() {
                console.log('DataTables initialization complete');
            },
            error: function(xhr, error, thrown) {
                console.error('DataTables error:', error);
                console.error('Status:', xhr.status);
                console.error('Response:', xhr.responseText);
            }
        });

        // Add CSRF token to all AJAX requests
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Show modal for adding new record
        $('#addNewBtn').click(function () {
            $('#topBarForm')[0].reset();
            $('#formMethod').val('POST');
            $('#topBarModalLabel').text('Add Top Bar Setting');
            $('#topBarModal').modal('show');
            $('.invalid-feedback').text('');
            $('.is-invalid').removeClass('is-invalid');
            $('#is_active').prop('checked', true);
        });

        // Handle form submission
        $('#topBarForm').on('submit', function (e) {
            e.preventDefault();
            var formData = new FormData(this);
            var url = '';
            var method = $('#formMethod').val();
            
            if (method === 'POST') {
                url = "{{ route('admin.top-bar.store') }}";
            } else {
                var id = $('#topBarForm').find('input[name="id"]').val();
                url = "{{ url('admin/top-bar') }}/" + id;
                formData.append('_method', 'PUT');
            }

            // Add the method to the form data for Laravel
            if (method !== 'POST') {
                formData.append('_method', 'PUT');
            }
            
            // Show loading state
            $('#saveBtn').prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Saving...');
            
            $.ajax({
                url: url,
                type: 'POST', // Always use POST and let Laravel handle the method spoofing
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    $('#topBarModal').modal('hide');
                    table.ajax.reload();
                    
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: response.message || 'Operation completed successfully.',
                        timer: 2000,
                        showConfirmButton: false
                    });
                },
                error: function (xhr) {
                    $('.invalid-feedback').text('');
                    $('.is-invalid').removeClass('is-invalid');
                    
                    var errorMessage = 'An error occurred. Please try again.';
                    
                    if (xhr.status === 419) {
                        errorMessage = 'Session expired. Please refresh the page and try again.';
                        window.location.reload();
                    } else if (xhr.status === 422 && xhr.responseJSON && xhr.responseJSON.errors) {
                        var errors = xhr.responseJSON.errors;
                        $.each(errors, function(key, value) {
                            var input = $('#' + key);
                            input.addClass('is-invalid');
                            input.next('.invalid-feedback').text(Array.isArray(value) ? value[0] : value);
                        });
                    } else if (xhr.responseJSON && xhr.responseJSON.message) {
                        errorMessage = xhr.responseJSON.message;
                    }
                    
                    // Show error message
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: errorMessage,
                        confirmButtonText: 'OK'
                    });
                },
                complete: function() {
                    // Re-enable the save button
                    $('#saveBtn').prop('disabled', false).html('Save changes');
                }
            });
        });

        // Handle edit button click
        $(document).on('click', '.edit-btn', function (e) {
            e.preventDefault();
            
            var id = $(this).data('id');
            var email = $(this).data('email');
            var phone = $(this).data('phone');
            var openingHours = $(this).data('opening-hours');
            var isActive = $(this).data('is-active');

            // Reset form and clear any previous data
            $('#topBarForm')[0].reset();
            $('.invalid-feedback').text('');
            $('.is-invalid').removeClass('is-invalid');

            // Set form values
            $('#topBarForm').find('input[name="id"]').remove();
            $('<input>').attr({
                type: 'hidden',
                name: 'id',
                value: id
            }).appendTo('#topBarForm');
            
            $('#email').val(email || '');
            $('#phone').val(phone || '');
            $('#opening_hours').val(openingHours || '');
            $('#is_active').prop('checked', isActive == 1);

            // Update form method and modal title
            $('#formMethod').val('PUT');
            $('#topBarModalLabel').text('Edit Top Bar Setting');
            $('#topBarModal').modal('show');
        });

        // Handle delete button click
        $(document).on('click', '.delete-btn', function (e) {
            e.preventDefault();
            
            var id = $(this).data('id');
            var rowElement = $(this).closest('tr');
            var rowData = table.row(rowElement).data();
            
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                showLoaderOnConfirm: true,
                preConfirm: () => {
                    return $.ajax({
                        url: '{{ url("admin/top-bar") }}/' + id,
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            _method: 'DELETE'
                        },
                        dataType: 'json'
                    });
                },
                allowOutsideClick: () => !Swal.isLoading()
            }).then((result) => {
                if (result.isConfirmed) {
                    if (result.value && result.value.success) {
                        table.row(rowElement).remove().draw(false);
                        Swal.fire(
                            'Deleted!',
                            result.value.message || 'The record has been deleted.',
                            'success'
                        );
                    } else {
                        Swal.fire(
                            'Error!',
                            result.value?.message || 'Failed to delete the record.',
                            'error'
                        );
                    }
                }
            }).catch(error => {
                Swal.fire(
                    'Error!',
                    'An error occurred while deleting the record.',
                    'error'
                );
                console.error('Delete error:', error);
            });
        });

        // Handle status toggle
        $('#topBarTable').on('click', '.toggle-status', function () {
            var id = $(this).data('id');
            var status = $(this).data('status');
            var newStatus = status == 1 ? 0 : 1;
            
            $.ajax({
                url: '/admin/top-bar/' + id + '/toggle-status',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    _method: 'PATCH',
                    is_active: newStatus
                },
                success: function (response) {
                    table.ajax.reload();
                    
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: response.message || 'Status updated successfully.',
                        timer: 2000,
                        showConfirmButton: false
                    });
                },
                error: function (xhr) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: xhr.responseJSON.message || 'An error occurred while updating the status.'
                    });
                }
            });
        });
    });
</script>
@endpush
