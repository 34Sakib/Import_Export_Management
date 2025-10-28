@extends('backend.layout.master')

@section('title', 'Manage Testimonials')

@push('styles')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/toastr/toastr.min.css') }}">
    <style>
        .rating {
            color: #ffc107;
            font-size: 1.2rem;
        }
        .img-thumbnail {
            max-width: 80px;
            height: auto;
        }
    </style>
@endpush

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Testimonials</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Testimonials</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">All Testimonials</h3>
                                <div class="float-right">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#testimonialModal" id="addTestimonialBtn">
                                        <i class="fas fa-plus"></i> Add New Testimonial
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="testimonialsTable" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Company</th>
                                            <th>Rating</th>
                                            <th>Status</th>
                                            <th>Featured</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Data will be loaded via AJAX -->
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

    <!-- Testimonial Modal -->
    <div class="modal fade" id="testimonialModal" tabindex="-1" role="dialog" aria-labelledby="testimonialModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="testimonialModalLabel">Add New Testimonial</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="testimonialForm" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="testimonialId">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" required>
                                </div>
                                <div class="form-group">
                                    <label for="designation">Designation</label>
                                    <input type="text" class="form-control" id="designation" name="designation" placeholder="Enter designation">
                                </div>
                                <div class="form-group">
                                    <label for="company">Company</label>
                                    <input type="text" class="form-control" id="company" name="company" placeholder="Enter company name">
                                </div>
                                <div class="form-group">
                                    <label for="rating">Rating <span class="text-danger">*</span></label>
                                    <select class="form-control" id="rating" name="rating" required>
                                        <option value="5">★★★★★ (5/5)</option>
                                        <option value="4">★★★★☆ (4/5)</option>
                                        <option value="3">★★★☆☆ (3/5)</option>
                                        <option value="2">★★☆☆☆ (2/5)</option>
                                        <option value="1">★☆☆☆☆ (1/5)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="image">Profile Image</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image" name="image" accept="image/*">
                                        <label class="custom-file-label" for="image">Choose file</label>
                                    </div>
                                    <small class="form-text text-muted">Recommended size: 200x200px, Max size: 2MB</small>
                                    <div class="mt-2" id="imagePreview">
                                        <img id="previewImg" src="{{ asset('images/default-avatar.png') }}" alt="Preview" class="img-thumbnail" style="max-width: 150px; max-height: 150px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="content">Testimonial Content <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="content" name="content" rows="4" placeholder="Enter testimonial content" required></textarea>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="is_featured" name="is_featured" value="1">
                                            <label class="form-check-label" for="is_featured">Mark as Featured</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1" checked>
                                            <label class="form-check-label" for="is_active">Active</label>
                                        </div>
                                    </div>
                                </div>
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
    <!-- Toastr -->
    <script src="{{ asset('backend/plugins/toastr/toastr.min.js') }}"></script>
    <!-- bs-custom-file-input -->
    <script src="{{ asset('backend/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>

    <script>
        $(function () {
            // Initialize DataTable
            var table = $('#testimonialsTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.testimonials.index') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'image', name: 'image', orderable: false, searchable: false},
                    {data: 'name', name: 'name'},
                    {data: 'company', name: 'company'},
                    {data: 'rating', name: 'rating'},
                    {data: 'status', name: 'is_active'},
                    {data: 'featured', name: 'is_featured'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],
                responsive: true,
                autoWidth: false,
                order: [[0, 'desc']],
                pageLength: 10,
                lengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, 'All']],
                language: {
                    processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>',
                    emptyTable: 'No data available in table',
                    zeroRecords: 'No matching records found',
                    info: 'Showing _START_ to _END_ of _TOTAL_ entries',
                    infoEmpty: 'Showing 0 to 0 of 0 entries',
                    infoFiltered: '(filtered from _MAX_ total entries)',
                    search: '_INPUT_',
                    searchPlaceholder: 'Search...',
                    lengthMenu: 'Show _MENU_ entries',
                    paginate: {
                        first: 'First',
                        last: 'Last',
                        next: 'Next',
                        previous: 'Previous'
                    },
                },
                drawCallback: function () {
                    $('[data-toggle="tooltip"]').tooltip();
                }
            });

            // Initialize form elements
            bsCustomFileInput.init();

            // Reset form and show modal for adding new testimonial
            $('#addTestimonialBtn').click(function() {
                $('#testimonialForm')[0].reset();
                $('#testimonialId').val('');
                $('#testimonialModalLabel').text('Add New Testimonial');
                $('#previewImg').attr('src', '{{ asset("backend/images/default-avatar.png") }}');
                $('.custom-file-label').text('Choose file');
                $('#testimonialModal').modal('show');
            });

            // Handle image preview
            $('#image').change(function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        $('#previewImg').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(file);
                    $('.custom-file-label').text(file.name);
                }
            });

            // Handle form submission
            $('#testimonialForm').submit(function(e) {
                e.preventDefault();
                
                const formData = new FormData(this);
                const url = formData.get('id') ? 
                    '{{ route("admin.testimonials.update", "") }}/' + formData.get('id') : 
                    '{{ route("admin.testimonials.store") }}';
                const method = formData.get('id') ? 'PUT' : 'POST';
                
                // Add _method for Laravel form method spoofing
                if (method === 'PUT') {
                    formData.append('_method', 'PUT');
                }
                
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        $('#testimonialModal').modal('hide');
                        table.ajax.reload();
                        
                        // Show success message
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000
                        });
                        
                        Toast.fire({
                            icon: 'success',
                            title: response.message || 'Operation completed successfully!'
                        });
                    },
                    error: function(xhr) {
                        const errors = xhr.responseJSON?.errors;
                        let errorMessage = 'An error occurred. Please try again.';
                        
                        if (errors) {
                            errorMessage = Object.values(errors)[0][0];
                        } else if (xhr.responseJSON?.message) {
                            errorMessage = xhr.responseJSON.message;
                        }
                        
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: errorMessage
                        });
                    }
                });
            });

            // Handle edit button click
            $(document).on('click', '.btn-edit', function() {
                const id = $(this).data('id');
                const url = '{{ route("admin.testimonials.get", "") }}/' + id;
                
                // Fetch testimonial data
                $.get(url, function(response) {
                    const testimonial = response;
                    
                    // Populate form fields
                    $('#testimonialId').val(testimonial.id);
                    $('#name').val(testimonial.name);
                    $('#designation').val(testimonial.designation || '');
                    $('#company').val(testimonial.company || '');
                    $('#content').val(testimonial.content);
                    $('#rating').val(testimonial.rating);
                    $('#is_featured').prop('checked', testimonial.is_featured);
                    $('#is_active').prop('checked', testimonial.is_active);
                    
                    // Set image preview
                    if (testimonial.image) {
                        $('#previewImg').attr('src', testimonial.image_url);
                        $('.custom-file-label').text('Change image');
                    } else {
                        $('#previewImg').attr('src', '{{ asset("images/default-avatar.png") }}');
                        $('.custom-file-label').text('Choose file');
                    }
                    
                    // Update modal title and show
                    $('#testimonialModalLabel').text('Edit Testimonial');
                    $('#testimonialModal').modal('show');
                });
            });

            // Handle delete button click
            $(document).on('click', '.btn-delete', function() {
                const id = $(this).data('id');
                
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
                            url: '{{ route("admin.testimonials.destroy", "") }}/' + id,
                            type: 'DELETE',
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                table.ajax.reload();
                                
                                Swal.fire(
                                    'Deleted!',
                                    response.message || 'Testimonial has been deleted.',
                                    'success'
                                );
                            },
                            error: function(xhr) {
                                Swal.fire(
                                    'Error!',
                                    xhr.responseJSON?.message || 'An error occurred while deleting the testimonial.',
                                    'error'
                                );
                            }
                        });
                    }
                });
            });
        });
    </script>
@endpush
