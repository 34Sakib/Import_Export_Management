@extends('backend.layout.master')

@section('title', 'Manage News')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Latest News</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addNewsModal">
                            <i class="fas fa-plus"></i> Add News
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <table id="newsTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Short Description</th>
                                <th>Publish Date</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Data will be loaded via AJAX -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add News Modal -->
<div class="modal fade" id="addNewsModal" tabindex="-1" role="dialog" aria-labelledby="addNewsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addNewsModalLabel">Add New News</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="addNewsForm" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div id="addNewsErrors" class="alert alert-danger" style="display: none;"></div>
                    
                    <div class="form-group">
                        <label for="title">Title <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="short_description">Short Description <span class="text-danger">*</span></label>
                        <textarea class="form-control" id="short_description" name="short_description" rows="3" maxlength="500" required></textarea>
                        <small class="text-muted">Max 500 characters</small>
                    </div>
                    
                    <div class="form-group">
                        <label for="content">Content <span class="text-danger">*</span></label>
                        <textarea class="form-control summernote" id="content" name="content" rows="10" required></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="image">Featured Image</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image" name="image" accept="image/*">
                            <label class="custom-file-label" for="image">Choose file</label>
                        </div>
                        <small class="form-text text-muted">Recommended size: 800x450px, Max size: 2MB</small>
                        <div id="imagePreview" class="mt-2" style="display: none;">
                            <img src="" alt="Preview" id="imagePreviewImg" class="img-thumbnail" style="max-width: 200px;">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="publish_date">Publish Date <span class="text-danger">*</span></label>
                        <input type="datetime-local" class="form-control" id="publish_date" name="publish_date" required>
                    </div>
                    
                    <div class="form-group">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="is_published" name="is_published" value="1" checked>
                            <label class="custom-control-label" for="is_published">Publish Now</label>
                        </div>
                    </div>
                    
                    <div class="card mt-3">
                        <div class="card-header">
                            <h5>SEO Settings</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="meta_title">Meta Title</label>
                                <input type="text" class="form-control" id="meta_title" name="meta_title" maxlength="255">
                                <small class="text-muted">Max 255 characters</small>
                            </div>
                            
                            <div class="form-group">
                                <label for="meta_description">Meta Description</label>
                                <textarea class="form-control" id="meta_description" name="meta_description" rows="2" maxlength="500"></textarea>
                                <small class="text-muted">Max 500 characters</small>
                            </div>
                            
                            <div class="form-group">
                                <label for="meta_keywords">Meta Keywords</label>
                                <input type="text" class="form-control" id="meta_keywords" name="meta_keywords" maxlength="255">
                                <small class="text-muted">Separate keywords with commas</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- View News Modal -->
<div class="modal fade" id="viewNewsModal" tabindex="-1" role="dialog" aria-labelledby="viewNewsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewNewsModalLabel">View News</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="newsDetails">
                <!-- News details will be loaded here -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit News Modal -->
<div class="modal fade" id="editNewsModal" tabindex="-1" role="dialog" aria-labelledby="editNewsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editNewsModalLabel">Edit News</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editNewsForm" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div id="editNewsErrors" class="alert alert-danger" style="display: none;"></div>
                    <input type="hidden" id="edit_news_id" name="id">
                    
                    <div class="form-group">
                        <label for="edit_title">Title <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="edit_title" name="title" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="edit_short_description">Short Description <span class="text-danger">*</span></label>
                        <textarea class="form-control" id="edit_short_description" name="short_description" rows="3" maxlength="500" required></textarea>
                        <small class="text-muted">Max 500 characters</small>
                    </div>
                    
                    <div class="form-group">
                        <label for="edit_content">Content <span class="text-danger">*</span></label>
                        <textarea class="form-control summernote" id="edit_content" name="content" rows="10" required></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label>Current Image</label>
                        <div id="currentImageContainer">
                            <img id="currentImage" src="" alt="Current Image" class="img-thumbnail" style="max-width: 200px; display: none;">
                            <p id="noImageText" class="text-muted">No image uploaded</p>
                        </div>
                        <div class="custom-file mt-2">
                            <input type="file" class="custom-file-input" id="edit_image" name="image" accept="image/*">
                            <label class="custom-file-label" for="edit_image">Change image</label>
                        </div>
                        <div class="form-check mt-2">
                            <input type="checkbox" class="form-check-input" id="remove_image" name="remove_image" value="1">
                            <label class="form-check-label" for="remove_image">Remove current image</label>
                        </div>
                        <small class="form-text text-muted">Recommended size: 800x450px, Max size: 2MB</small>
                        <div id="editImagePreview" class="mt-2" style="display: none;">
                            <img src="" alt="Preview" id="editImagePreviewImg" class="img-thumbnail" style="max-width: 200px;">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="edit_publish_date">Publish Date <span class="text-danger">*</span></label>
                        <input type="datetime-local" class="form-control" id="edit_publish_date" name="publish_date" required>
                    </div>
                    
                    <div class="form-group">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="edit_is_published" name="is_published" value="1">
                            <label class="form-check-label" for="edit_is_published">Publish</label>
                        </div>
                    </div>
                    
                    <div class="card mt-3">
                        <div class="card-header">
                            <h5>SEO Settings</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="edit_meta_title">Meta Title</label>
                                <input type="text" class="form-control" id="edit_meta_title" name="meta_title" maxlength="255">
                                <small class="text-muted">Max 255 characters</small>
                            </div>
                            
                            <div class="form-group">
                                <label for="edit_meta_description">Meta Description</label>
                                <textarea class="form-control" id="edit_meta_description" name="meta_description" rows="2" maxlength="500"></textarea>
                                <small class="text-muted">Max 500 characters</small>
                            </div>
                            
                            <div class="form-group">
                                <label for="edit_meta_keywords">Meta Keywords</label>
                                <input type="text" class="form-control" id="edit_meta_keywords" name="meta_keywords" maxlength="255">
                                <small class="text-muted">Separate keywords with commas</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('styles')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<!-- Summernote -->
<link rel="stylesheet" href="{{ asset('backend/plugins/summernote/summernote-bs4.min.css') }}">
<!-- Custom styles -->
<style>
    .table th, .table td {
        vertical-align: middle;
    }
    .action-buttons {
        display: flex;
        gap: 5px;
    }
    .news-image {
        width: 80px;
        height: 80px;
        object-fit: cover;
        border-radius: 5px;
    }
</style>
@endpush

@push('scripts')
<!-- DataTables  & Plugins -->
<script src="{{ asset('backend/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('backend/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('backend/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- bs-custom-file-input -->
<script src="{{ asset('backend/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>

<script>
    $(function () {
        // Initialize DataTable
        var table = $('#newsTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('admin.news.index') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                {data: 'image', name: 'image', orderable: false, searchable: false},
                {data: 'title', name: 'title'},
                {data: 'short_description', name: 'short_description'},
                {data: 'publish_date', name: 'publish_date'},
                {data: 'status', name: 'status'},
                {data: 'action', name: 'action', orderable: false, searchable: false, className: 'action-buttons'},
            ],
            responsive: true,
            autoWidth: false,
            order: [[0, 'desc']]
        });

        // Initialize Summernote
        $('.summernote').summernote({
            height: 200,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });

        // Initialize bs-custom-file-input
        bsCustomFileInput.init();

        // Handle image preview for add form
        $('#image').on('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagePreviewImg').attr('src', e.target.result);
                    $('#imagePreview').show();
                }
                reader.readAsDataURL(file);
            } else {
                $('#imagePreview').hide();
            }
        });

        // Handle image preview for edit form
        $('#edit_image').on('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    $('#editImagePreviewImg').attr('src', e.target.result);
                    $('#editImagePreview').show();
                }
                reader.readAsDataURL(file);
            } else {
                $('#editImagePreview').hide();
            }
        });

        // Handle remove image checkbox
        $('#remove_image').on('change', function() {
            if ($(this).is(':checked')) {
                $('#currentImage').hide();
                $('#noImageText').show();
            } else {
                if ($('#currentImage').attr('src') !== '') {
                    $('#currentImage').show();
                    $('#noImageText').hide();
                }
            }
        });

        // Set current date and time for publish date
        const now = new Date();
        const year = now.getFullYear();
        const month = String(now.getMonth() + 1).padStart(2, '0');
        const day = String(now.getDate()).padStart(2, '0');
        const hours = String(now.getHours()).padStart(2, '0');
        const minutes = String(now.getMinutes()).padStart(2, '0');
        
        const currentDateTime = `${year}-${month}-${day}T${hours}:${minutes}`;
        $('#publish_date').val(currentDateTime);

        // Handle form submission for create
        $('body').on('submit', '#addNewsForm', function(e) {
            e.preventDefault();
            console.log('Form submission started');
            
            var form = $(this);
            var formData = new FormData(this);
            var url = '{{ route("admin.news.store") }}';
            
            // Add content from Summernote
            var content = $('#content').summernote('code');
            formData.append('content', content);
            
            // Log form data for debugging
            console.log('Form data:');
            for (var pair of formData.entries()) {
                console.log(pair[0] + ': ', pair[1]);
            }
            
            // Show loading state
            var submitBtn = form.find('button[type="submit"]');
            var originalBtnText = submitBtn.html();
            submitBtn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Saving...');
            
            // Clear previous errors
            $('#addNewsErrors').html('').hide();
            
            // Log CSRF token
            console.log('CSRF Token:', $('meta[name="csrf-token"]').attr('content'));
            
            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    console.log('Server response:', response);
                    if (response.status === 'success') {
                        // Reset form
                        form[0].reset();
                        $('.summernote').summernote('reset');
                        $('#imagePreview').hide();
                        
                        // Hide modal
                        $('#addNewsModal').modal('hide');
                        
                        // Reload datatable
                        table.ajax.reload(null, false); // false means don't reset paging
                        
                        // Show success message
                        toastr.success(response.message || 'News created successfully!', 'Success', {
                            timeOut: 3000,
                            closeButton: true,
                            progressBar: true,
                            positionClass: 'toast-top-right'
                        });
                    } else {
                        console.error('Unexpected response status:', response.status);
                        toastr.error('Unexpected response from server', 'Error', {
                            timeOut: 5000,
                            closeButton: true,
                            progressBar: true,
                            positionClass: 'toast-top-right'
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error:', status, error);
                    console.error('Response:', xhr.responseText);
                    
                    if (xhr.status === 422) {
                        // Validation errors
                        const errors = xhr.responseJSON?.errors;
                        if (errors) {
                            let errorHtml = '<div class="alert alert-danger"><ul class="mb-0">';
                            
                            for (const field in errors) {
                                if (errors.hasOwnProperty(field)) {
                                    errors[field].forEach(error => {
                                        errorHtml += `<li><strong>${field}:</strong> ${error}</li>`;
                                        console.error(`Validation error - ${field}:`, error);
                                    });
                                }
                            }
                            
                            errorHtml += '</ul></div>';
                            $('#addNewsErrors').html(errorHtml).show();
                        } else {
                            toastr.error('Validation error occurred but no error details were returned', 'Error', {
                                timeOut: 5000,
                                closeButton: true,
                                progressBar: true,
                                positionClass: 'toast-top-right'
                            });
                        }
                    } else if (xhr.status === 419) {
                        // CSRF token mismatch
                        toastr.error('Session expired. Please refresh the page and try again.', 'Error', {
                            timeOut: 5000,
                            closeButton: true,
                            progressBar: true,
                            positionClass: 'toast-top-right'
                        });
                        console.error('CSRF token mismatch. Please check if the CSRF token is being sent correctly.');
                    } else {
                        // Other errors
                        const errorMessage = xhr.responseJSON?.message || 'An error occurred while creating the news. Please check the console for details.';
                        toastr.error(errorMessage, 'Error', {
                            timeOut: 5000,
                            closeButton: true,
                            progressBar: true,
                            positionClass: 'toast-top-right'
                        });
                    }
                },
                complete: function() {
                    submitBtn.prop('disabled', false).html(originalBtnText);
                }
            });
        });

        // Handle view button click
        $(document).on('click', '.viewNewsBtn', function() {
            var newsId = $(this).data('id');
            var url = '{{ route("admin.news.show", "") }}/' + newsId;
            
            $.get(url, function(response) {
                if (response.status === 'success') {
                    const news = response.data;
                    let html = `
                        <h3>${news.title}</h3>
                        <p class="text-muted">Published on: ${new Date(news.publish_date).toLocaleDateString()}</p>
                        <hr>
                    `;
                    
                    if (news.image) {
                        html += `<img src="{{ asset('images/') }}/${news.image}" class="img-fluid mb-3" alt="${news.title}">`;
                    }
                    
                    html += `
                        <h5>Short Description</h5>
                        <p>${news.short_description}</p>
                        
                        <h5 class="mt-4">Content</h5>
                        <div class="news-content">${news.content}</div>
                        
                        <div class="mt-4">
                            <h5>SEO Information</h5>
                            <p><strong>Meta Title:</strong> ${news.meta_title || 'N/A'}</p>
                            <p><strong>Meta Description:</strong> ${news.meta_description || 'N/A'}</p>
                            <p><strong>Keywords:</strong> ${news.meta_keywords || 'N/A'}</p>
                        </div>
                    `;
                    
                    $('#newsDetails').html(html);
                    $('#viewNewsModal').modal('show');
                }
            });
        });

        // Handle edit button click
        $(document).on('click', '.editNewsBtn', function(e) {
            e.preventDefault();
            const newsId = $(this).data('id');
            const editUrl = '{{ route("admin.news.edit", ["__ID__"]) }}'.replace('__ID__', newsId);
            
            // Show loading state
            const editModal = $('#editNewsModal');
            editModal.find('.modal-content').html(`
                <div class="modal-header">
                    <h5 class="modal-title">Edit News</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <div class="spinner-border" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    <p class="mt-2">Loading news data...</p>
                </div>
            `);
            editModal.modal('show');
            
            // Get the news edit form
            $.get(editUrl, function(response) {
                if (response.status === 'success') {
                    // Update the modal with the edit form
                    editModal.find('.modal-content').html(response.html);
                    
                    // Initialize Summernote for the edit form
                    $('#edit_content').summernote({
                        height: 300,
                        toolbar: [
                            ['style', ['style']],
                            ['font', ['bold', 'italic', 'underline', 'clear']],
                            ['fontname', ['fontname']],
                            ['color', ['color']],
                            ['para', ['ul', 'ol', 'paragraph']],
                            ['height', ['height']],
                            ['table', ['table']],
                            ['insert', ['link', 'picture', 'hr']],
                            ['view', ['fullscreen', 'codeview']],
                            ['help', ['help']]
                        ]
                    });
                    
                    // Show file name when a file is selected
                    $('.custom-file-input').on('change', function() {
                        let fileName = $(this).val().split('\\').pop();
                        $(this).next('.custom-file-label').addClass("selected").html(fileName);
                    });
                    
                    // Handle image preview when a new image is selected
                    $('#edit_image').on('change', function() {
                        if (this.files && this.files[0]) {
                            var reader = new FileReader();
                            reader.onload = function(e) {
                                $('#editImagePreview').html('<img src="' + e.target.result + '" alt="Preview" style="max-width: 200px; max-height: 200px;" class="img-thumbnail">');
                            }
                            reader.readAsDataURL(this.files[0]);
                        }
                    });
                    
                    // Reset the form
                    $('#editNewsForm')[0].reset();
                    
                    // Populate the form
                    $('#edit_news_id').val(news.id);
                    $('#edit_title').val(news.title);
                    $('#edit_short_description').val(news.short_description);
                    
                    // Format the date for datetime-local input
                    if (news.publish_date) {
                        const publishDate = new Date(news.publish_date);
                        const formattedDate = publishDate.toISOString().slice(0, 16);
                        $('#edit_publish_date').val(formattedDate);
                    }
                    
                    // Set published status
                    $('#edit_is_published').prop('checked', news.is_published == 1 || news.is_published === true);
                    
                    // Handle image display
                    if (news.image) {
                        $('#currentImage').attr('src', '{{ asset("images/") }}/' + news.image).show();
                        $('#noImageText').hide();
                    } else {
                        $('#currentImage').hide();
                        $('#noImageText').show();
                    }
                    
                    // Set meta fields
                    $('#edit_meta_title').val(news.meta_title || '');
                    $('#edit_meta_description').val(news.meta_description || '');
                    $('#edit_meta_keywords').val(news.meta_keywords || '');
                    
                    // Reset the remove image checkbox and preview
                    $('#remove_image').prop('checked', false);
                    $('#editImagePreview').hide();
                    
                    // Show the form content
                    editModal.find('.modal-body').html($('#editNewsForm').html());
                    $.get(editUrl, function(htmlResponse) {

                        console.log('Edit form HTML response:', htmlResponse); // Debug log
                        if (htmlResponse.status === 'success') {
                            // Show the edit modal
                            $('#editNewsModal .modal-content').html(htmlResponse.html);
                            $('#editNewsModal').modal('show');
                            
                            // Reinitialize any necessary plugins
                            if (typeof $.fn.summernote === 'function') {
                                $('.summernote').summernote({
                                    height: 300
                                });
                            }
                        }
                    }).fail(function(xhr, status, error) {
                        console.error('Error loading edit form:', error);
                        alert('Error loading edit form. Please check the console for details.');
                    });
                }
            });
        });

        // Update News Form Submission
        $(document).on('submit', '#editNewsForm', function(e) {
            e.preventDefault();
            
            const form = $(this);
            const formData = new FormData(this);
            const newsId = $('#edit_news_id').val();
            
            // Add the content from the Summernote editor
            formData.set('content', $('#edit_content').summernote('code'));
            
            // Add _method for PUT request
            formData.append('_method', 'PUT');
            
            // Show loading state
            const submitBtn = form.find('button[type="submit"]');
            const originalBtnText = submitBtn.html();
            submitBtn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Updating...');
            
            // Clear previous errors
            $('#editNewsErrors').html('').hide();
            
            const updateUrl = '{{ route("admin.news.update", [""]) }}' + '/' + newsId;
            
            $.ajax({
                url: updateUrl,
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.status === 'success') {
                        // Show success message
                        toastr.success(response.message || 'News updated successfully!', 'Success', {
                            timeOut: 3000,
                            closeButton: true,
                            progressBar: true,
                            positionClass: 'toast-top-right'
                        });
                        
                        // Close the modal and refresh the table
                        $('#editNewsModal').modal('hide');
                        if (typeof table !== 'undefined') {
                            table.ajax.reload();
                        } else {
                            window.location.reload();
                        }
                    } else if (response.redirect) {
                        // If there's a redirect URL in the response, navigate to it
                        window.location.href = response.redirect;
                    }
                },
                error: function(xhr) {
                    toastr.error('An error occurred while updating the news.', 'Error', {
                        timeOut: 5000,
                        closeButton: true,
                        progressBar: true,
                        positionClass: 'toast-top-right'
                    });
                },
                complete: function() {
                    // Re-enable the submit button
                    submitBtn.prop('disabled', false).html(originalBtnText);
                }
            });
        });

        // Delete News
        $(document).on('submit', 'form[action*="news/"][method="POST"]', function(e) {
            e.preventDefault();
            
            if (confirm('Are you sure you want to delete this news item?')) {
                const form = $(this);
                const url = form.attr('action');
                
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: form.serialize(),
                    success: function(response) {
                        if (response.status === 'success') {
                            table.ajax.reload();
                            toastr.success('News deleted successfully!', 'Success', {
                                timeOut: 3000,
                                closeButton: true,
                                progressBar: true,
                                positionClass: 'toast-top-right'
                            });
                        }
                    },
                    error: function(xhr) {
                        toastr.error('Error deleting news.', 'Error', {
                            timeOut: 5000,
                            closeButton: true,
                            progressBar: true,
                            positionClass: 'toast-top-right'
                        });
                    }
                });
            }
            
            return false;
        });

        // Reset modals when closed
        $('.modal').on('hidden.bs.modal', function() {
            $(this).find('form')[0].reset();
            $(this).find('.alert').hide();
            $('.summernote').summernote('reset');
            $('#imagePreview, #editImagePreview').hide();
            $('#currentImage').attr('src', '');
            $('#noImageText').show();
        });
    });
</script>
@endpush
