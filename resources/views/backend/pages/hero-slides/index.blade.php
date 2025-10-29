@extends('backend.layout.master')

@section('title', 'Hero Slides')

@push('styles')
    <link rel="stylesheet" href="{{ asset('backend/plugins/sweetalert2/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/sweetalert2/sweetalert2.min.css') }}">
    <style>
        .hero-slide-preview {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 5px;
            margin-bottom: 15px;
            display: none;
        }
        .btn-file {
            position: relative;
            overflow: hidden;
        }
        .btn-file input[type=file] {
            position: absolute;
            top: 0;
            right: 0;
            min-width: 100%;
            min-height: 100%;
            font-size: 100px;
            text-align: right;
            filter: alpha(opacity=0);
            opacity: 0;
            outline: none;
            background: white;
            cursor: inherit;
            display: block;
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
                                    <h4 class="card-title">Hero Slides</h4>
                                </div>
                                <div class="col-md-6 text-right">
                                    <button type="button" class="btn btn-primary openAddSlideModalBtn" data-toggle="modal" data-target="#slideModal">
    <i class="fas fa-plus"></i> Add New Slide
</button>

                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="heroSlidesTable" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Image</th>
                                            <th>Title</th>
                                            <th>Status</th>
                                            <th>Order</th>
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

    <!-- Add/Edit Modal -->
    <div class="modal fade" id="slideModal" tabindex="-1" role="dialog" aria-labelledby="slideModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="slideModalLabel">Add New Slide</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="slideForm" action="{{ route('admin.hero-slides.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="slideId">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title">Title <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="title" name="title" required>
                                </div>
                                <div class="form-group">
                                    <label for="subtitle">Subtitle</label>
                                    <input type="text" class="form-control" id="subtitle" name="subtitle">
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="button_text">Button Text</label>
                                    <input type="text" class="form-control" id="button_text" name="button_text">
                                </div>
                                <div class="form-group">
                                    <label for="button_url">Button URL</label>
                                    <input type="url" class="form-control" id="button_url" name="button_url">
                                </div>
                                <div class="form-group">
                                    <label for="order">Order</label>
                                    <input type="number" class="form-control" id="order" name="order" value="0" min="0">
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="is_active" name="is_active" value="1" checked>
                                        <label class="custom-control-label" for="is_active">Active</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Slide Image <span class="text-danger">*</span> <small>(Recommended: 1920x1080px)</small></label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="image" name="image" accept="image/*">
                                            <label class="custom-file-label" for="image">Choose file</label>
                                        </div>
                                    </div>
                                    <img id="imagePreview" src="#" alt="Preview" class="hero-slide-preview mt-2" />
                                    <small class="form-text text-muted">Upload a high-quality image for the hero slide.</small>
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

    <!-- View Modal -->
    <div class="modal fade" id="viewSlideModal" tabindex="-1" role="dialog" aria-labelledby="viewSlideModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewSlideModalLabel">View Slide Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Title:</strong> <span id="viewTitle"></span></p>
                            <p><strong>Subtitle:</strong> <span id="viewSubtitle"></span></p>
                            <p><strong>Description:</strong> <span id="viewDescription"></span></p>
                            <p><strong>Button Text:</strong> <span id="viewButtonText"></span></p>
                            <p><strong>Button URL:</strong> <a href="#" id="viewButtonUrl" target="_blank"></a></p>
                            <p><strong>Status:</strong> <span class="badge" id="viewStatus"></span></p>
                            <p><strong>Order:</strong> <span id="viewOrder"></span></p>
                        </div>
                        <div class="col-md-6">
                            <img id="viewImage" src="#" alt="Slide Image" class="img-fluid rounded">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // Check if jQuery is loaded
        if (typeof jQuery == 'undefined') {
            console.error('jQuery is not loaded!');
            document.write('<script src="https://code.jquery.com/jquery-3.6.0.min.js"><\/script>');
        }
    </script>
    <script src="{{ asset('backend/plugins/sweetalert2/sweetalert2.all.min.js') }}"></script>
    <script>
        console.log('Hero slides script loaded');
        $(document).ready(function() {
            console.log('Document ready');
            // Initialize DataTable
            var table = $('#heroSlidesTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.hero-slides.index') }}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'image', name: 'image', orderable: false, searchable: false},
                    {data: 'title', name: 'title'},
                    {data: 'status', name: 'status', orderable: false, searchable: false},
                    {data: 'order', name: 'order'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],
                order: [[4, 'asc']] // Default order by order column
            });

            // Show image preview
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#imagePreview').attr('src', e.target.result).show();
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }

            // Show image preview when file is selected
            $("#image").change(function() {
                readURL(this);
                $('.custom-file-label').text(this.files[0].name);
                $('#imagePreview').show();
            });

            // Reset form and modal
            function resetForm() {
                $('#slideForm')[0].reset();
                $('#slideId').val('');
                $('#imagePreview').hide();
                $('.custom-file-label').text('Choose file');
                $('#slideForm').find('.is-invalid').removeClass('is-invalid');
                $('#slideForm').find('.invalid-feedback').remove();
            }

            // Show add modal
            $('.openAddSlideModalBtn').on('click', function() {
                $('#slideForm')[0].reset();
                $('.is-invalid').removeClass('is-invalid');
                $('.invalid-feedback').remove();
                $('#imagePreview').hide();
                $('.custom-file-label').text('Choose file');

                $('#slideForm').attr('action', '{{ route("admin.hero-slides.store") }}');
                $('#slideForm').attr('method', 'POST');
                $('input[name="_method"]').remove();

                $('#slideModalLabel').text('Add New Slide');
                $('#saveBtn').text('Save');
                $('#slideModal').modal('show');
            });

            // Handle delete action with SweetAlert2
            $(document).on('click', '.delete-slide', function(e) {
                e.preventDefault();
                var form = $(this).closest('form');
                
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
                            url: form.attr('action'),
                            type: 'POST',
                            data: form.serialize(),
                            success: function(response) {
                                Swal.fire(
                                    'Deleted!',
                                    'The slide has been deleted.',
                                    'success'
                                );
                                table.ajax.reload();
                            },
                            error: function(xhr) {
                                Swal.fire(
                                    'Error!',
                                    'An error occurred while deleting the slide.',
                                    'error'
                                );
                            }
                        });
                    }
                });
            });

            // Show edit modal
            $(document).on('click', '.editSlideBtn', function() {
                var id = $(this).data('id');
                var url = '{{ route("admin.hero-slides.edit", ":id") }}';
                url = url.replace(':id', id);
                
                // Don't reset the form here, just clear validation
                $('.is-invalid').removeClass('is-invalid');
                $('.invalid-feedback').remove();
                
                // Show loading state
                Swal.fire({
                    title: 'Loading...',
                    text: 'Please wait while we load the slide data',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });
                
                $.get(url, function(data) {
                    // Clear any existing form data
                    $('#slideForm')[0].reset();
                    
                    // Set form action and method for update
                    var updateUrl = '{{ route("admin.hero-slides.update", ":id") }}';
                    updateUrl = updateUrl.replace(':id', id);
                    
                    $('#slideForm').attr('action', updateUrl);
                    $('#slideForm').attr('method', 'POST');
                    
                    // Remove any existing _method fields to avoid duplicates
                    $('input[name="_method"]').remove();
                    
                    // Add the _method field for PUT
                    $('#slideForm').append('<input type="hidden" name="_method" value="PUT">');
                    
                    // Update UI
                    $('#slideModalLabel').text('Edit Slide');
                    $('#saveBtn').text('Update');
                    
                    // Show the modal before populating fields
                    $('#slideModal').modal('show');
                    
                    // Close loading
                    Swal.close();
                    
                    // Populate form fields with the slide data
                    $('#slideId').val(data.id);
                    $('#title').val(data.title);
                    $('#subtitle').val(data.subtitle || '');
                    $('#description').val(data.description || '');
                    $('#button_text').val(data.button_text || '');
                    $('#button_url').val(data.button_url || '');
                    $('#order').val(data.order || 0);
                    $('#is_active').prop('checked', data.is_active == 1);
                    
                    // Show existing image if available
                    if (data.image) {
                        $('#imagePreview').attr('src', '/storage/hero-slides/' + data.image).show();
                        $('.custom-file-label').text('Change image');
                    } else {
                        $('#imagePreview').hide();
                        $('.custom-file-label').text('Choose file');
                    }
                    $('#slideId').val(data.id);
                    $('#title').val(data.title);
                    $('#subtitle').val(data.subtitle);
                    $('#description').val(data.description);
                    $('#button_text').val(data.button_text);
                    $('#button_url').val(data.button_url);
                    $('#order').val(data.order);
                    $('#is_active').prop('checked', data.is_active);
                    
                    if (data.image) {
                        var imageUrl = '{{ asset("storage/hero-slides/") }}/' + data.image;
                        $('#imagePreview').attr('src', imageUrl).show();
                    }
                });
            });

            // Show view modal
            $(document).on('click', '.viewSlideBtn', function() {
                var id = $(this).data('id');
                var url = '{{ route("admin.hero-slides.show", ":id") }}';
                url = url.replace(':id', id);
                
                $.get(url, function(data) {
                    $('#viewTitle').text(data.title);
                    $('#viewSubtitle').text(data.subtitle || 'N/A');
                    $('#viewDescription').text(data.description || 'N/A');
                    $('#viewButtonText').text(data.button_text || 'N/A');
                    
                    if (data.button_url) {
                        $('#viewButtonUrl').attr('href', data.button_url).text(data.button_url);
                    } else {
                        $('#viewButtonUrl').attr('href', '#').text('N/A');
                    }
                    
                    $('#viewStatus').text(data.is_active ? 'Active' : 'Inactive')
                        .removeClass('badge-success badge-secondary')
                        .addClass(data.is_active ? 'badge-success' : 'badge-secondary');
                        
                    $('#viewOrder').text(data.order);
                    
                    if (data.image) {
                        var imageUrl = '{{ asset("storage/hero-slides/") }}/' + data.image;
                        $('#viewImage').attr('src', imageUrl);
                    }
                    
                    $('#viewSlideModal').modal('show');
                });
            });

            // Handle form submission (create/update)
            $(document).on('submit', '#slideForm', function(e) {
                e.preventDefault();
                console.log('=== Form Submission Started ===');
                console.log('Form ID:', this.id);
                
                var form = $(this);
                var formElement = document.getElementById('slideForm');
                
                // Log form data before creating FormData
                console.log('Form elements:');
                $(formElement).find('input, textarea, select').each(function() {
                    console.log(this.name + ':', $(this).val());
                });
                
                var formData = new FormData(formElement);
                var url = form.attr('action');
                var method = form.find('input[name="_method"]').val() || 'POST';
                
                // Log FormData contents
                console.log('FormData contents:');
                for (var pair of formData.entries()) {
                    console.log(pair[0] + ': ' + pair[1]);
                }
                
                console.log('Form URL:', url);
                console.log('Form Method:', method);
                console.log('Form Data:');
                for (var pair of formData.entries()) {
                    console.log(pair[0] + ': ' + pair[1]);
                }
                
                // Show loading state
                var submitBtn = form.find('button[type="submit"]');
                var originalBtnText = submitBtn.html();
                submitBtn.prop('disabled', true).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Processing...');
                
                // Clear previous errors
                $('.is-invalid').removeClass('is-invalid');
                $('.invalid-feedback').remove();
                
                console.log('Sending AJAX request to:', url);
                console.log('Request method:', 'POST');
                console.log('CSRF Token:', $('meta[name="csrf-token"]').attr('content'));
                
                // Make the AJAX request
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    success: function(response, status, xhr) {
                        console.log('=== AJAX Success Response ===');
                        console.log('Status:', status);
                        console.log('Response:', response);
                        
                        // Show success message
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: response.message || 'Operation completed successfully.',
                            timer: 3000,
                            showConfirmButton: true
                        }).then((result) => {
                            // Only reset form and close modal after user acknowledges the success message
                            form[0].reset();
                            $('#slideModal').modal('hide');
                            table.ajax.reload();
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error('=== AJAX Error ===');
                        console.error('Status:', status);
                        console.error('Error:', error);
                        console.error('Response:', xhr.responseText);
                        
                        var response = xhr.responseJSON || {};
                        
                        // Reset button state
                        submitBtn.prop('disabled', false).html(originalBtnText);
                        
                        // Handle validation errors
                        if (xhr.status === 422) {
                            console.log('Validation errors:', response.errors);
                            if (response.errors) {
                                $.each(response.errors, function(key, value) {
                                    var input = $('#' + key);
                                    var errorMessage = Array.isArray(value) ? value[0] : value;
                                    input.addClass('is-invalid');
                                    input.after('<div class="invalid-feedback">' + errorMessage + '</div>');
                                });
                                return; // Don't show additional error message for validation errors
                            }
                        }
                        
                        // Show error message
                        var errorMessage = response.message || 
                                         (xhr.statusText ? xhr.statusText : 'An error occurred. Please try again.');
                        
                        Swal.fire({
                            icon: 'error',
                            title: 'Error ' + (xhr.status || ''),
                            html: '<div style="max-height: 200px; overflow-y: auto;">' + 
                                  errorMessage + 
                                  '<hr><small class="text-muted">Check browser console for details</small>' + 
                                  '</div>',
                            confirmButtonText: 'OK',
                            confirmButtonColor: '#3085d6',
                            allowOutsideClick: false
                        });
                    }
                });
            });
            
            // Handle delete with SweetAlert2
            $(document).on('click', '.delete-slide', function() {
                var button = $(this);
                var url = button.data('url');
                
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
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Deleted!',
                                    text: response.message || 'Slide has been deleted.',
                                    timer: 2000,
                                    showConfirmButton: false
                                });
                                table.ajax.reload();
                            },
                            error: function(xhr) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error!',
                                    text: xhr.responseJSON ? xhr.responseJSON.message : 'An error occurred while deleting.',
                                    confirmButtonText: 'OK'
                                });
                            }
                        });
                    }
                });
            });
        });
    </script>
@endpush
