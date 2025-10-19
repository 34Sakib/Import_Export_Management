@extends('backend.layout.master')

@section('title', 'Service Details')
@section('page-title', 'Service Details')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.service.index') }}">Services</a></li>
    <li class="breadcrumb-item active">View</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Service Information</h3>
                <div class="card-tools">
                    <a href="{{ route('admin.service.edit', $service->id) }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-edit"></i> Edit Service
                    </a>
                    <a href="{{ route('admin.service.index') }}" class="btn btn-secondary btn-sm">
                        <i class="fas fa-arrow-left"></i> Back to List
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <table class="table table-borderless">
                            <tr>
                                <th width="150">Service ID:</th>
                                <td>{{ $service->id }}</td>
                            </tr>
                            <tr>
                                <th>Title:</th>
                                <td>{{ $service->title }}</td>
                            </tr>
                            <tr>
                                <th>Description:</th>
                                <td>{{ $service->description ?? 'No description provided' }}</td>
                            </tr>
                            <tr>
                                <th>Created:</th>
                                <td>{{ $service->created_at->format('M d, Y h:i A') }}</td>
                            </tr>
                            <tr>
                                <th>Last Updated:</th>
                                <td>{{ $service->updated_at->format('M d, Y h:i A') }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-4">
                        <div class="text-center">
                            <label class="form-label"><strong>Service Image:</strong></label>
                            <div class="mt-2">
                                @if($service->image && $service->image !== 'nophoto.png')
                                    <img src="{{ asset('images/' . $service->image) }}" 
                                         alt="{{ $service->title }}" 
                                         class="img-fluid rounded shadow"
                                         style="max-width: 100%; max-height: 300px;">
                                @else
                                    <div class="bg-light p-4 rounded">
                                        <i class="fas fa-image fa-3x text-muted"></i>
                                        <p class="text-muted mt-2">No image available</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-md-6">
                        <a href="{{ route('admin.service.edit', $service->id) }}" class="btn btn-primary">
                            <i class="fas fa-edit"></i> Edit Service
                        </a>
                    </div>
                    <div class="col-md-6 text-right">
                        <form action="{{ route('admin.service.destroy', $service->id) }}" method="POST" 
                              style="display: inline;" 
                              onsubmit="return confirm('Are you sure you want to delete this service?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-trash-alt"></i> Delete Service
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
