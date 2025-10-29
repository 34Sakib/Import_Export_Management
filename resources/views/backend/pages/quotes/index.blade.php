@extends('backend.layout.master')

@section('title', 'Quote Requests')

@push('styles')
    <link rel="stylesheet" href="{{ asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/sweetalert2/sweetalert2.min.css') }}">
    <style>
        .status-badge {
            font-size: 0.8rem;
            padding: 0.35em 0.65em;
            font-weight: 500;
        }
    </style>
@endpush

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="card-title">Quote Requests</h4>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="quotesTable" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Origin</th>
                                            <th>Destination</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- DataTable will load data here -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- View Modal -->
    <div class="modal fade" id="viewQuoteModal" tabindex="-1" role="dialog" aria-labelledby="viewQuoteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewQuoteModalLabel">Quote Request Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Name:</strong> <span id="viewName"></span></p>
                            <p><strong>Email:</strong> <span id="viewEmail"></span></p>
                            <p><strong>Phone:</strong> <span id="viewPhone"></span></p>
                            <p><strong>Origin:</strong> <span id="viewOrigin"></span></p>
                            <p><strong>Destination:</strong> <span id="viewDestination"></span></p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Weight:</strong> <span id="viewWeight"></span></p>
                            <p><strong>Dimensions:</strong> <span id="viewDimensions"></span></p>
                            <p><strong>Status:</strong> <span id="viewStatus"></span></p>
                            <p><strong>Submitted:</strong> <span id="viewCreatedAt"></span></p>
                        </div>
                        <div class="col-12 mt-3">
                            <p><strong>Message:</strong></p>
                            <div id="viewMessage" class="p-3 bg-light rounded"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="updateStatusBtn">Update Status</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Status Update Modal -->
    <div class="modal fade" id="statusModal" tabindex="-1" role="dialog" aria-labelledby="statusModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="statusModalLabel">Update Quote Status</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="statusForm">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <input type="hidden" id="quoteId" name="quote_id">
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="{{ \App\Models\Quote::STATUS_PENDING }}">Pending</option>
                                <option value="{{ \App\Models\Quote::STATUS_PROCESSING }}">Processing</option>
                                <option value="{{ \App\Models\Quote::STATUS_COMPLETED }}">Completed</option>
                                <option value="{{ \App\Models\Quote::STATUS_CANCELLED }}">Cancelled</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Update Status</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('backend/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            // Initialize DataTable
            var table = $('#quotesTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.quotes.index') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'phone', name: 'phone'},
                    {data: 'origin', name: 'origin'},
                    {data: 'destination', name: 'destination'},
                    {
                        data: 'status', 
                        name: 'status',
                        render: function(data, type, row) {
                            return '<span class="badge status-badge bg-' + row.status_class + '">' + data + '</span>';
                        }
                    },
                    {
                        data: 'created_at', 
                        name: 'created_at',
                        render: function(data) {
                            return new Date(data).toLocaleDateString('en-US', {
                                year: 'numeric',
                                month: 'short',
                                day: 'numeric',
                                hour: '2-digit',
                                minute: '2-digit'
                            });
                        }
                    },
                    {
                        data: 'action', 
                        name: 'action', 
                        orderable: false, 
                        searchable: false,
                        className: 'text-center'
                    },
                ],
                order: [[7, 'desc']]
            });

            // View quote details
            $(document).on('click', '.view-quote', function() {
                var quoteId = $(this).data('id');
                var url = '{{ route("admin.quotes.show", ":id") }}';
                url = url.replace(':id', quoteId);
                
                $.get(url, function(data) {
                    $('#viewName').text(data.name);
                    $('#viewEmail').text(data.email);
                    $('#viewPhone').text(data.phone);
                    $('#viewOrigin').text(data.origin);
                    $('#viewDestination').text(data.destination);
                    $('#viewWeight').text(data.weight);
                    $('#viewDimensions').text(data.dimensions);
                    $('#viewMessage').text(data.message || 'No message provided.');
                    $('#viewCreatedAt').text(new Date(data.created_at).toLocaleString());
                    
                    // Set status badge
                    var statusBadge = '<span class="badge status-badge bg-' + data.status_class + '">' + data.status + '</span>';
                    $('#viewStatus').html(statusBadge);
                    
                    // Set the quote ID for status update
                    $('#updateStatusBtn').data('id', data.id);
                    
                    // Show the modal
                    $('#viewQuoteModal').modal('show');
                });
            });

            // Show status update modal
            $(document).on('click', '#updateStatusBtn', function() {
                var quoteId = $(this).data('id');
                $('#quoteId').val(quoteId);
                $('#statusModal').modal('show');
            });

            // Handle status update form submission
            $('#statusForm').on('submit', function(e) {
                e.preventDefault();
                var quoteId = $('#quoteId').val();
                
                // Build the URL manually to ensure it's correct
                var url = '{{ url("admin/quotes") }}/' + quoteId + '/status';
                
                // Get the CSRF token
                var token = $('meta[name="csrf-token"]').attr('content');
                
                // Get the selected status
                var status = $('#status').val();
                
                console.log('Updating status for quote', quoteId, 'to', status, 'using URL:', url);
                
                // Show loading state
                var submitBtn = $(this).find('button[type="submit"]');
                var originalText = submitBtn.html();
                submitBtn.prop('disabled', true).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Updating...');
                
                $.ajax({
                    url: url,
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': token
                    },
                    data: {
                        _token: token,
                        status: status
                    },
                    dataType: 'json',
                    success: function(response) {
                        $('#statusModal').modal('hide');
                        
                        // Reset button state
                        submitBtn.prop('disabled', false).html(originalText);
                        
                        // Reload the DataTable
                        table.ajax.reload(null, false);
                        
                        // Update the status in the view modal if it's open
                        if ($('#viewQuoteModal').hasClass('show')) {
                            var statusBadge = '<span class="badge status-badge bg-' + response.status_class + '">' + response.status + '</span>';
                            $('#viewStatus').html(statusBadge);
                        }
                        
                        // Show success message
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: response.message || 'Quote status updated successfully.',
                            timer: 2000,
                            showConfirmButton: false
                        });
                    },
                    error: function(xhr, status, error) {
                        // Reset button state
                        submitBtn.prop('disabled', false).html(originalText);
                        
                        console.error('Error updating status:', xhr, status, error);
                        
                        // Show error message
                        var errorMessage = 'An error occurred while updating the status. ';
                        
                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            errorMessage += xhr.responseJSON.message;
                        } else if (xhr.status === 404) {
                            errorMessage += 'The requested resource was not found. Please refresh the page and try again.';
                        } else if (xhr.status === 500) {
                            errorMessage += 'A server error occurred. Please try again later.';
                        }
                        
                        Swal.fire({
                            icon: 'error',
                            title: 'Error ' + (xhr.status || ''),
                            text: errorMessage,
                            showConfirmButton: true
                        });
                    }
                });
            });
            
            // When showing the status modal, set the current status as selected
            $('#statusModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var currentStatus = $('#viewStatus').text().trim().toLowerCase();
                $('#status').val(currentStatus);
            });

            // Handle delete
            $(document).on('click', '.delete-quote', function(e) {
                e.preventDefault();
                var quoteId = $(this).data('id');
                var url = '{{ route("admin.quotes.destroy", "") }}' + '/' + quoteId;
                
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
                            url: url,
                            type: 'POST',
                            data: {
                                _method: 'DELETE',
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                table.ajax.reload();
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Deleted!',
                                    text: 'Quote has been deleted.',
                                    timer: 2000,
                                    showConfirmButton: false
                                });
                            },
                            error: function(xhr) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error!',
                                    text: 'An error occurred while deleting the quote.'
                                });
                            }
                        });
                    }
                });
            });
        });
    </script>
@endpush
