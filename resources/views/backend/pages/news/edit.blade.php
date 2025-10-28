<form id="editNewsForm" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="modal-body">
        <div id="editNewsErrors" class="alert alert-danger" style="display: none;"></div>
        <input type="hidden" id="edit_news_id" name="id" value="{{ $news->id }}">
        
        <div class="form-group">
            <label for="edit_title">Title <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="edit_title" name="title" value="{{ old('title', $news->title) }}" required>
        </div>
        
        <div class="form-group">
            <label for="edit_short_description">Short Description <span class="text-danger">*</span></label>
            <textarea class="form-control" id="edit_short_description" name="short_description" rows="3" required>{{ old('short_description', $news->short_description) }}</textarea>
        </div>
        
        <div class="form-group">
            <label for="edit_content">Content <span class="text-danger">*</span></label>
            <textarea class="form-control summernote" id="edit_content" name="content">{{ old('content', $news->content) }}</textarea>
        </div>
        
        <div class="form-group">
            <label for="edit_image">Image</label>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="edit_image" name="image" accept="image/*">
                <label class="custom-file-label" for="edit_image">Choose file</label>
            </div>
            @if($news->image)
                <div class="mt-2" id="editImagePreview">
                    <img src="{{ asset('images/' . $news->image) }}" alt="Current Image" style="max-width: 200px; max-height: 200px;" class="img-thumbnail">
                    <div class="form-check mt-2">
                        <input type="checkbox" class="form-check-input" id="remove_image" name="remove_image" value="1">
                        <label class="form-check-label" for="remove_image">Remove current image</label>
                    </div>
                </div>
            @endif
        </div>
        
        <div class="form-group">
            <label for="edit_publish_date">Publish Date <span class="text-danger">*</span></label>
            <input type="date" class="form-control" id="edit_publish_date" name="publish_date" value="{{ old('publish_date', $news->publish_date ? $news->publish_date->format('Y-m-d') : '') }}" required>
        </div>
        
        <div class="form-group">
            <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="edit_is_published" name="is_published" value="1" {{ $news->is_published ? 'checked' : '' }}>
                <label class="custom-control-label" for="edit_is_published">Publish</label>
            </div>
        </div>
        
        <div class="card mt-3">
            <div class="card-header">
                <h5>SEO Settings</h5>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="edit_meta_title">Meta Title</label>
                    <input type="text" class="form-control" id="edit_meta_title" name="meta_title" value="{{ old('meta_title', $news->meta_title) }}">
                </div>
                <div class="form-group">
                    <label for="edit_meta_description">Meta Description</label>
                    <textarea class="form-control" id="edit_meta_description" name="meta_description" rows="3">{{ old('meta_description', $news->meta_description) }}</textarea>
                </div>
                <div class="form-group">
                    <label for="edit_meta_keywords">Meta Keywords</label>
                    <input type="text" class="form-control" id="edit_meta_keywords" name="meta_keywords" value="{{ old('meta_keywords', $news->meta_keywords) }}">
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
    </div>
</form>

@push('scripts')
<script>
    $(document).ready(function() {
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
    });
</script>
@endpush
