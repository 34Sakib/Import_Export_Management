<form id="client-form" action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if(isset($method) && in_array($method, ['PUT', 'PATCH', 'DELETE']))
        @method($method)
        <input type="hidden" name="_method" value="{{ $method }}">
    @endif
    
    <div class="modal-body">
        <div class="form-group">
            <label for="name">Client Name <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" 
                   id="name" name="name" value="{{ old('name', $client->name ?? '') }}" required>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="website">Website</label>
            <input type="url" class="form-control @error('website') is-invalid @enderror" 
                   id="website" name="website" value="{{ old('website', $client->website ?? '') }}">
            @error('website')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="logo">Logo {{ !$client->exists ? '*' : '' }}</label>
            <div class="custom-file">
                <input type="file" class="custom-file-input @error('logo') is-invalid @enderror" 
                       id="logo" name="logo" {{ !$client->exists ? 'required' : '' }}>
                <label class="custom-file-label" for="logo">Choose file</label>
                @error('logo')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <small class="form-text text-muted">Recommended size: 200x100px. Max size: 2MB. Allowed types: jpg, jpeg, png, gif</small>
            
            @if($client->exists && $client->logo)
                <div class="mt-2">
                    <img src="{{ $client->logo_url }}" alt="{{ $client->name }}" id="logo-preview" class="img-thumbnail logo-preview">
                </div>
            @else
                <div class="mt-2">
                    <img src="#" alt="Logo Preview" id="logo-preview" class="img-thumbnail logo-preview d-none">
                </div>
            @endif
        </div>
        
        <div class="form-group">
            <label for="sort_order">Sort Order</label>
            <input type="number" class="form-control @error('sort_order') is-invalid @enderror" 
                   id="sort_order" name="sort_order" value="{{ old('sort_order', $client->sort_order ?? 0) }}">
            @error('sort_order')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        
        <div class="form-group">
            <div class="custom-control custom-switch">
                <input type="hidden" name="is_active" value="0">
                <input type="checkbox" class="custom-control-input" id="is_active" name="is_active" 
                       value="1" {{ old('is_active', $client->is_active ?? true) ? 'checked' : '' }}>
                <label class="custom-control-label" for="is_active">Active</label>
            </div>
        </div>
    </div>
    
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">
            <i class="fas fa-save"></i> {{ $client->exists ? 'Update' : 'Save' }} Client
        </button>
    </div>
</form>
