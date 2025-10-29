@extends('backend.layout.master')

@section('title', 'Manage Clients')     

@push('styles')
    <link rel="stylesheet" href="{{ asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <style>
        .client-logo {
            max-width: 80px;
            max-height: 80px;
            object-fit: cover;
        }
        .logo-preview {
            max-width: 200px;
            max-height: 200px;
            margin-top: 10px;
        }
    </style>
@endpush

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Clients</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Clients</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">All Clients</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-primary" id="add-client-btn">
                                        <i class="fas fa-plus"></i> Add New Client
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="clients-table" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Logo</th>
                                            <th>Name</th>
                                            <th>Website</th>
                                            <th>Sort Order</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Data will be loaded via DataTables -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Client Modal -->
    <div class="modal fade" id="clientModal" tabindex="-1" role="dialog" aria-labelledby="clientModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="clientModalLabel">Add New Client</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="modal-body">
                    <!-- Content will be loaded via AJAX -->
                </div>
            </div>
        </div>
    </div>

    <!-- View Client Modal -->
    <div class="modal fade" id="viewClientModal" tabindex="-1" role="dialog" aria-labelledby="viewClientModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewClientModalLabel">Client Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="view-modal-body">
                    <!-- Content will be loaded via AJAX -->
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('backend/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(function () {
            var table = $('#clients-table').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: "{{ route('admin.clients.index') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'logo', name: 'logo', orderable: false, searchable: false},
                    {data: 'name', name: 'name'},
                    {data: 'website', name: 'website'},
                    {data: 'sort_order', name: 'sort_order'},
                    {data: 'status', name: 'status', orderable: false, searchable: false},
                    {data: 'action', name: 'action', orderable: false, searchable: false, className: 'text-center'},
                ],
                order: [[4, 'asc']] // Default sort by sort_order
            });

            // Initialize file input
            bsCustomFileInput.init();

            // Preview logo before upload
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    
                    reader.onload = function(e) {
                        $('#logo-preview').attr('src', e.target.result).removeClass('d-none');
                    }
                    
                    reader.readAsDataURL(input.files[0]);
                }
            }

            // Add new client
            $('#add-client-btn').click(function() {
                $.get("{{ route('admin.clients.create') }}", function(response) {
                    if (response.success) {
                        $('#modal-body').html(response.html);
                        $('#clientModal').modal('show');
                        bsCustomFileInput.init();
                        
                        // Initialize form submission
                        initClientForm();
                    }
                }).fail(function() {
                    Swal.fire('Error', 'Failed to load form. Please try again.', 'error');
                });
            });

            // Edit client
            $(document).on('click', '.edit-client', function() {
                var clientId = $(this).data('id');
                
                $.get("/admin/clients/" + clientId + "/edit", function(response) {
                    if (response.success) {
                        $('#modal-body').html(response.html);
                        $('#clientModal').modal('show');
                        bsCustomFileInput.init();
                        
                        // Initialize form submission
                        initClientForm();
                    }
                }).fail(function() {
                    Swal.fire('Error', 'Failed to load client data. Please try again.', 'error');
                });
            });

            // View client
            $(document).on('click', '.view-client', function() {
                var clientId = $(this).data('id');
                
                $.get("/admin/clients/" + clientId, function(response) {
                    if (response.success) {
                        $('#view-modal-body').html(response.html);
                        $('#viewClientModal').modal('show');
                    }
                }).fail(function() {
                    Swal.fire('Error', 'Failed to load client details. Please try again.', 'error');
                });
            });

            // Initialize client form submission
            function initClientForm() {
                $('#client-form').on('submit', function(e) {
                    e.preventDefault();
                    var form = this;
                    var formData = new FormData(form);
                    var url = $(form).attr('action');
                    var method = $(form).find('input[name="_method"]').val() || 'POST';
                    
                    // Ensure CSRF token is included
                    formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
                    
                    // For PUT/PATCH methods, we need to append _method
                    if (method !== 'POST') {
                        formData.append('_method', method);
                    }
                    
                    // Handle checkbox value
                    var isActive = $('#is_active').is(':checked') ? 1 : 0;
                    formData.set('is_active', isActive);
                    
                    // Show loading state
                    var submitBtn = $(form).find('button[type="submit"]');
                    var originalBtnText = submitBtn.html();
                    submitBtn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Processing...');
                    
                    $.ajax({
                        url: url,
                        type: 'POST', // Always use POST, we'll handle the method with _method
                        data: formData,
                        processData: false,
                        contentType: false,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            $('#clientModal').modal('hide');
                            Swal.fire({
                                icon: 'success',
                                title: 'Success!',
                                text: response.message,
                                timer: 2000,
                                showConfirmButton: false
                            });
                            table.ajax.reload();
                        },
                        error: function(xhr) {
                            var errorMessage = 'An error occurred. Please try again.';
                            if (xhr.responseJSON && xhr.responseJSON.errors) {
                                var errors = xhr.responseJSON.errors;
                                errorMessage = '';
                                $.each(errors, function(key, value) {
                                    errorMessage += value[0] + '\n';
                                });
                            }
                            
                            Swal.fire({
                                icon: 'error',
                                title: 'Validation Error!',
                                text: errorMessage
                            });
                            
                            submitBtn.prop('disabled', false).html(originalBtnText);
                        }
                    });
                });
                
                // Handle logo preview
                $(document).on('change', '#logo', function() {
                    readURL(this);
                });
            }

            // View client details
            $(document).on('click', '.view-client', function() {
                var clientId = $(this).data('id');
                
                // Show loading state
                Swal.fire({
                    title: 'Loading...',
                    text: 'Please wait while we load the client details',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });
                
                // Fetch client details via AJAX
                $.ajax({
                    url: '/admin/clients/' + clientId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        Swal.close();
                        if (response.success && response.html) {
                            // Create a modal for viewing client details
                            var modalHtml = `
                                <div class="modal fade" id="viewClientModal" tabindex="-1" role="dialog" aria-labelledby="viewClientModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="viewClientModalLabel">Client Details</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                ${response.html}
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            `;
                            
                            // Remove existing modal if any
                            $('#viewClientModal').remove();
                            
                            // Append the modal to the body and show it
                            $('body').append(modalHtml);
                            $('#viewClientModal').modal('show');
                        } else {
                            Swal.fire('Error', 'Failed to load client details. Please try again.', 'error');
                        }
                    },
                    error: function(xhr) {
                        Swal.close();
                        var errorMessage = 'An error occurred while loading client details.';
                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            errorMessage = xhr.responseJSON.message;
                        }
                        Swal.fire('Error', errorMessage, 'error');
                    }
                });
            });
            
            // Delete client
            $(document).on('click', '.delete-client', function() {
                var clientId = $(this).data('id');
                
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
                            url: "/admin/clients/" + clientId,
                            type: 'DELETE',
                            data: {
                                _token: "{{ csrf_token() }}"
                            },
                            success: function(response) {
                                Swal.fire(
                                    'Deleted!',
                                    response.message,
                                    'success'
                                );
                                table.ajax.reload();
                            },
                            error: function() {
                                Swal.fire(
                                    'Error!',
                                    'Something went wrong. Please try again later.',
                                    'error'
                                );
                            }
                        });
                    }
                });
            });

            // Toggle status
            $(document).on('change', '.toggle-status', function() {
                var clientId = $(this).data('id');
                var isChecked = $(this).is(':checked');
                
                $.ajax({
                    url: "/admin/clients/" + clientId + "/toggle-status",
                    type: 'POST',
                    data: {
                        _token: "{{ csrf_token() }}",
                        _method: 'PATCH'
                    },
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: response.message,
                            timer: 2000,
                            showConfirmButton: false
                        });
                        table.ajax.reload();
                    },
                    error: function() {
                        Swal.fire(
                            'Error!',
                            'Something went wrong. Please try again later.',
                            'error'
                        );
                        table.ajax.reload();
                    }
                });
            });
            
            // Reset form when modal is closed
            $('#clientModal').on('hidden.bs.modal', function () {
                $('#client-form')[0].reset();
                $('#logo-preview').addClass('d-none');
            });
        });
    </script>
@endpush
