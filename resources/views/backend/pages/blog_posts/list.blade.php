@extends('backend.layout.master')
<!-- SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@section('title', 'Blog Posts Management')
@section('page-title', 'Blog Posts Management')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Blog Posts</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">All Blog Posts</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                            data-target="#createBlogPostModal">
                            <i class="fas fa-plus"></i> Create Blog Post
                        </button>
                    </div>

                </div>
                <div class="card-body">
                    @if (session('success'))
                        <script>
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                            });

                            Toast.fire({
                                icon: 'success',
                                title: "{{ session('success') }}"
                            });
                        </script>
                    @endif

                    @if (session('error'))
                        <script>
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                            });

                            Toast.fire({
                                icon: 'error',
                                title: "{{ session('error') }}"
                            });
                        </script>
                    @endif

                    <div class="table-responsive">
                        <table id="blogPostsTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Status</th>
                                    <th>Featured Image</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- DataTable will populate this -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Create Blog Post Modal -->
    <div class="modal fade" id="createBlogPostModal" tabindex="-1" role="dialog"
        aria-labelledby="createBlogPostModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form action="{{ route('admin.blog-posts.store') }}" method="POST" enctype="multipart/form-data"
                    id="createBlogPostForm">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="createBlogPostModalLabel">Create Blog Post</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="title">Title <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                        id="title" name="title" value="{{ old('title') }}" required>
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="content">Content <span class="text-danger">*</span></label>
                                    <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="10"
                                        required>{{ old('content') }}</textarea>
                                    @error('content')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="excerpt">Excerpt</label>
                                    <textarea class="form-control @error('excerpt') is-invalid @enderror" id="excerpt" name="excerpt" rows="3">{{ old('excerpt') }}</textarea>
                                    <small class="form-text text-muted">A short description of your blog post.</small>
                                    @error('excerpt')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Publish</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select class="form-control @error('status') is-invalid @enderror"
                                                id="status" name="status" required>
                                                <option value="draft"
                                                    {{ old('status', 'draft') == 'draft' ? 'selected' : '' }}>Draft
                                                </option>
                                                <option value="published"
                                                    {{ old('status') == 'published' ? 'selected' : '' }}>Published</option>
                                                <option value="archived"
                                                    {{ old('status') == 'archived' ? 'selected' : '' }}>Archived</option>
                                            </select>
                                            @error('status')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="published_at">Publish Date</label>
                                            <input type="datetime-local"
                                                class="form-control @error('published_at') is-invalid @enderror"
                                                id="published_at" name="published_at"
                                                value="{{ old('published_at', now()->format('Y-m-d\TH:i')) }}">
                                            @error('published_at')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group text-center">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fas fa-save"></i> Save Post
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="card mt-3">
                                    <div class="card-header">
                                        <h3 class="card-title">Featured Image</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <div class="custom-file">
                                                <input type="file"
                                                    class="custom-file-input @error('featured_image') is-invalid @enderror"
                                                    id="featured_image" name="featured_image"
                                                    onchange="previewImage(this, 'create')">
                                                <label class="custom-file-label" for="featured_image">Choose image</label>
                                                @error('featured_image')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <small class="form-text text-muted">Recommended size: 1200x630px</small>
                                            <div class="mt-2 text-center">
                                                <img id="createImagePreview" src="#" alt="Preview"
                                                    class="img-fluid d-none" style="max-height: 150px;">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card mt-3">
                                    <div class="card-header">
                                        <h3 class="card-title">SEO Settings</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="meta_title">Meta Title</label>
                                            <input type="text"
                                                class="form-control @error('meta_title') is-invalid @enderror"
                                                id="meta_title" name="meta_title" value="{{ old('meta_title') }}">
                                            <small class="form-text text-muted">If empty, the post title will be
                                                used.</small>
                                            @error('meta_title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="meta_description">Meta Description</label>
                                            <textarea class="form-control @error('meta_description') is-invalid @enderror" id="meta_description"
                                                name="meta_description" rows="3">{{ old('meta_description') }}</textarea>
                                            <small class="form-text text-muted">Recommended: 50-160 characters</small>
                                            @error('meta_description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="meta_keywords">Meta Keywords</label>
                                            <input type="text"
                                                class="form-control @error('meta_keywords') is-invalid @enderror"
                                                id="meta_keywords" name="meta_keywords"
                                                value="{{ old('meta_keywords') }}">
                                            <small class="form-text text-muted">Comma-separated keywords</small>
                                            @error('meta_keywords')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="updateBlogModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Blog Post</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- AJAX content will load here -->
                    <div id="editBlogFormContainer"></div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            // Initialize DataTable
            var table = $('#blogPostsTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.blog-posts.index') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'featured_image',
                        name: 'featured_image',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ],
                order: [
                    [0, 'desc']
                ],
                responsive: true,
                autoWidth: false,
                dom: "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                language: {
                    processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>',
                    emptyTable: 'No data available',
                    info: 'Showing _START_ to _END_ of _TOTAL_ entries',
                    infoEmpty: 'Showing 0 to 0 of 0 entries',
                    infoFiltered: '(filtered from _MAX_ total entries)',
                    lengthMenu: 'Show _MENU_ entries',
                    search: '_INPUT_',
                    searchPlaceholder: 'Search...',
                    paginate: {
                        first: 'First',
                        last: 'Last',
                        next: 'Next',
                        previous: 'Previous'
                    },
                },
                drawCallback: function() {
                    $('.dataTables_paginate > .pagination').addClass('pagination-sm');
                }
            });

            // Handle delete button click
            $(document).on('submit', 'form[data-confirm]', function(e) {
                if (!confirm($(this).data('confirm'))) {
                    e.preventDefault();
                    return false;
                }
                return true;
            });
            // Handle edit button click

        });
    </script>
    <script>
        $(document).on('click', '.editBlogBtn', function() {
            var postId = $(this).data('id');

            $.ajax({
                url: '/admin/blog-posts/' + postId + '/ajax-edit', // make sure this matches route
                type: 'GET',
                success: function(response) {
                    $('#editBlogFormContainer').html(response);
                    $('#updateBlogModal').modal('show');

                    $('#featured_image').on('change', function() {
                        const [file] = this.files;
                        if (file) {
                            $('#imagePreview').attr('src', URL.createObjectURL(file))
                                .removeClass('d-none');
                        }
                    });
                },
                error: function(xhr) {
                    console.log(xhr.responseText); 
                    alert('Failed to load blog post data.');
                }
            });
        });
    </script>
@endpush
