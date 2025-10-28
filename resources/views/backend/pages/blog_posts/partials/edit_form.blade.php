<form action="{{ route('admin.blog-posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="row">
        <!-- Left Column -->
        <div class="col-md-8">
            <div class="form-group">
                <label for="title">Title <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" 
                       id="title" name="title" value="{{ old('title', $post->title) }}" required>
                @error('title')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <div class="form-group">
                <label for="content">Content <span class="text-danger">*</span></label>
                <textarea class="form-control @error('content') is-invalid @enderror" 
                          id="content" name="content" rows="10" required>{{ old('content', $post->content) }}</textarea>
                @error('content')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <div class="form-group">
                <label for="excerpt">Excerpt</label>
                <textarea class="form-control @error('excerpt') is-invalid @enderror" 
                          id="excerpt" name="excerpt" rows="3">{{ old('excerpt', $post->excerpt) }}</textarea>
                <small class="form-text text-muted">A short description of your blog post.</small>
                @error('excerpt')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>

        <!-- Right Column -->
        <div class="col-md-4">
            <!-- Publish Card -->
            <div class="card mb-3">
                <div class="card-header"><h5 class="card-title">Publish</h5></div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control @error('status') is-invalid @enderror" id="status" name="status" required>
                            <option value="draft" {{ old('status', $post->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                            <option value="published" {{ old('status', $post->status) == 'published' ? 'selected' : '' }}>Published</option>
                            <option value="archived" {{ old('status', $post->status) == 'archived' ? 'selected' : '' }}>Archived</option>
                        </select>
                        @error('status')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="published_at">Publish Date</label>
                        <input type="datetime-local" class="form-control @error('published_at') is-invalid @enderror" 
                               id="published_at" name="published_at"
                               value="{{ old('published_at', $post->published_at ? $post->published_at->format('Y-m-d\TH:i') : now()->format('Y-m-d\TH:i')) }}">
                        @error('published_at')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Update Post
                        </button>
                    </div>
                </div>
            </div>

            <!-- Featured Image Card -->
            <div class="card mb-3">
                <div class="card-header"><h5 class="card-title">Featured Image</h5></div>
                <div class="card-body">
                    @if($post->featured_image)
                        <div class="text-center mb-3">
                            <img src="{{ asset('images/' . $post->featured_image) }}" alt="{{ $post->title }}" class="img-fluid mb-2" id="currentImage">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="remove_image" name="remove_image" value="1">
                                <label class="form-check-label" for="remove_image">Remove image</label>
                            </div>
                        </div>
                    @endif
                    <div class="form-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input @error('featured_image') is-invalid @enderror" 
                                   id="featured_image" name="featured_image">
                            <label class="custom-file-label" for="featured_image">
                                {{ $post->featured_image ? 'Change image' : 'Choose image' }}
                            </label>
                            @error('featured_image')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <small class="form-text text-muted">Recommended size: 1200x630px</small>
                        <div class="mt-2 text-center">
                            <img id="imagePreview" src="#" alt="Preview" class="img-fluid d-none">
                        </div>
                    </div>
                </div>
            </div>

            <!-- SEO Settings Card -->
            <div class="card">
                <div class="card-header"><h5 class="card-title">SEO Settings</h5></div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="meta_title">Meta Title</label>
                        <input type="text" class="form-control @error('meta_title') is-invalid @enderror" 
                               id="meta_title" name="meta_title" value="{{ old('meta_title', $post->meta_title) }}">
                        <small class="form-text text-muted">If empty, the post title will be used.</small>
                        @error('meta_title')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="meta_description">Meta Description</label>
                        <textarea class="form-control @error('meta_description') is-invalid @enderror" 
                                  id="meta_description" name="meta_description" rows="3">{{ old('meta_description', $post->meta_description) }}</textarea>
                        <small class="form-text text-muted">Recommended: 50-160 characters</small>
                        @error('meta_description')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="meta_keywords">Meta Keywords</label>
                        <input type="text" class="form-control @error('meta_keywords') is-invalid @enderror" 
                               id="meta_keywords" name="meta_keywords" value="{{ old('meta_keywords', $post->meta_keywords) }}">
                        <small class="form-text text-muted">Comma-separated keywords</small>
                        @error('meta_keywords')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- JS for featured image preview -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    $('#featured_image').on('change', function() {
        const [file] = this.files;
        if (file) {
            $('#imagePreview').attr('src', URL.createObjectURL(file)).removeClass('d-none');
        }
    });
});
</script>
