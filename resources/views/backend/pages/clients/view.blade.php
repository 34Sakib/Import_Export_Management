<div class="modal-body">
    <div class="row">
        <div class="col-md-4 text-center">
            @if($client->logo)
                <img src="{{ $client->logo_url }}" alt="{{ $client->name }}" class="img-fluid rounded mb-3" style="max-height: 200px;">
            @else
                <div class="bg-light d-flex align-items-center justify-content-center" style="width: 200px; height: 200px;">
                    <span class="text-muted">No logo</span>
                </div>
            @endif
            
            <div class="mt-3">
                <span class="badge {{ $client->is_active ? 'bg-success' : 'bg-danger' }} p-2">
                    {{ $client->is_active ? 'Active' : 'Inactive' }}
                </span>
            </div>
        </div>
        
        <div class="col-md-8">
            <table class="table table-bordered">
                <tr>
                    <th style="width: 30%;">Name:</th>
                    <td>{{ $client->name }}</td>
                </tr>
                @if($client->website)
                    <tr>
                        <th>Website:</th>
                        <td>
                            <a href="{{ $client->website }}" target="_blank" rel="noopener noreferrer">
                                {{ $client->website }}
                            </a>
                        </td>
                    </tr>
                @endif
                <tr>
                    <th>Sort Order:</th>
                    <td>{{ $client->sort_order }}</td>
                </tr>
                <tr>
                    <th>Created At:</th>
                    <td>{{ $client->created_at->format('M d, Y h:i A') }}</td>
                </tr>
                <tr>
                    <th>Last Updated:</th>
                    <td>{{ $client->updated_at->format('M d, Y h:i A') }}</td>
                </tr>
            </table>
        </div>
    </div>
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="button" class="btn btn-primary edit-client" data-id="{{ $client->id }}">
        <i class="fas fa-edit"></i> Edit
    </button>
</div>
