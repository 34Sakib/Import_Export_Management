@extends('backend.layout.master')

@section('title', 'Add New Client')

@push('styles')
    <link rel="stylesheet" href="{{ asset('backend/plugins/summernote/summernote-bs4.min.css') }}">
    <style>
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
                        <h1 class="m-0">Add New Client</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.clients.index') }}">Clients</a></li>
                            <li class="breadcrumb-item active">Add New</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Client Information</h3>
                            </div>
                            <form id="client-form" action="{{ route('admin.clients.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Client Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="Enter client name" required>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="logo">Logo <span class="text-danger">*</span></label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input @error('logo') is-invalid @enderror" id="logo" name="logo" accept="image/*" required>
                                            <label class="custom-file-label" for="logo">Choose file</label>
                                            @error('logo')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <small class="form-text text-muted">Recommended size: 200x100px (Max: 2MB)</small>
                                        <div class="mt-2">
                                            <img id="logo-preview" src="#" alt="Logo Preview" class="img-thumbnail logo-preview d-none">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="website">Website URL</label>
                                        <input type="url" class="form-control @error('website') is-invalid @enderror" id="website" name="website" value="{{ old('website') }}" placeholder="https://example.com">
                                        @error('website')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="sort_order">Sort Order</label>
                                                <input type="number" class="form-control @error('sort_order') is-invalid @enderror" id="sort_order" name="sort_order" value="{{ old('sort_order', 0) }}" min="0">
                                                @error('sort_order')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="is_active">Status</label>
                                                <select class="form-control @error('is_active') is-invalid @enderror" id="is_active" name="is_active">
                                                    <option value="1" {{ old('is_active', 1) ? 'selected' : '' }}>Active</option>
                                                    <option value="0" {{ !old('is_active', 1) ? 'selected' : '' }}>Inactive</option>
                                                </select>
                                                @error('is_active')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save"></i> Save Client
                                    </button>
                                    <a href="{{ route('admin.clients.index') }}" class="btn btn-default">
                                        <i class="fas fa-arrow-left"></i> Back to List
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('backend/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <script>
        $(function () {
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
            
            $("#logo").change(function() {
                readURL(this);
            });
            
            // Form submission
            $('#client-form').on('submit', function(e) {
                e.preventDefault();
                var form = this;
                var formData = new FormData(form);
                
                $.ajax({
                    url: $(form).attr('action'),
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    beforeSend: function() {
                        $(form).find('button[type="submit"]').prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Saving...');
                    },
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: response.message,
                            timer: 2000,
                            showConfirmButton: false
                        }).then(function() {
                            window.location.href = response.redirect;
                        });
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
                            title: 'Error!',
                            text: errorMessage
                        });
                        
                        $(form).find('button[type="submit"]').prop('disabled', false).html('<i class="fas fa-save"></i> Save Client');
                    }
                });
            });
        });
    </script>
@endpush
