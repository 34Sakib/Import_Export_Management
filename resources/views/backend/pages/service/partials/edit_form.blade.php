<form action="{{ route('admin.service.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{ $service->id }}">
    <div class="card-body">
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="form-group">
            <label for="title">Service Title <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('title') is-invalid @enderror"
                id="title" name="title" value="{{ old('title', $service->title) }}" required>
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                rows="4" placeholder="Enter description...">{{ old('description', $service->description) }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="image">Service Image</label>
            @if ($service->image && $service->image !== 'nophoto.png')
                <div class="mb-2">
                    <label>Current Image:</label>
                    <div class="mt-1">
                        <img src="{{ asset('images/' . $service->image) }}" alt="Current Image"
                            style="max-width: 200px; max-height: 200px; border-radius: 5px;">
                    </div>
                </div>
            @endif

            <div class="input-group">
                <div class="custom-file">
                    <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="image"
                        name="image" accept="image/*">
                    <label class="custom-file-label" for="image">Choose new image file...</label>
                </div>
            </div>
            <small class="form-text text-muted">
                Supported formats: JPEG, PNG, JPG, GIF, SVG, WEBP. Max size: 2MB. Leave empty to keep
                current image.
            </small>
            @error('image')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <div class="preview-container" id="imagePreview" style="display: none;">
                <label>New Image Preview:</label>
                <div class="mt-2">
                    <img id="preview" src="" alt="Preview"
                        style="max-width: 200px; max-height: 200px; border-radius: 5px;">
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Update Service</button>
    </div>
</form>
