@extends('backend.layout.master')
<!-- SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@section('title', 'Service Management')
@section('page-title', 'Service Management')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Services</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">All Services</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                            data-target="#createServiceModal">
                            <i class="fas fa-plus"></i> Create Service
                        </button>
                    </div>

                </div>
                <div class="card-body">
                    @if (session('success'))
                        <script>
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end', // top-right corner
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
                                position: 'top-end', // top-right corner
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
                        <table id="servicesTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Image</th>
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

    <!-- Create Service Modal -->
    <div class="modal fade" id="createServiceModal" tabindex="-1" role="dialog" aria-labelledby="createServiceModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form action="{{ route('admin.service.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="createServiceModalLabel">Create Service</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        {{-- SweetAlert Error --}}
                        @if (session('error'))
                            <script>
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error!',
                                    text: "{{ session('error') }}",
                                    toast: true,
                                    position: 'top-end',
                                    timer: 3000,
                                    showConfirmButton: false
                                });
                            </script>
                        @endif

                        {{-- Service Title --}}
                        <div class="form-group">
                            <label for="title">Service Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                                name="title" value="{{ old('title') }}" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Description --}}
                        <div class="form-group">
                            <label for="description">Service Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                rows="4" placeholder="Enter service description...">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Image Upload --}}
                        <div class="form-group">
                            <label for="image">Service Image</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input @error('image') is-invalid @enderror"
                                        id="image" name="image" accept="image/*" onchange="previewImage(event)">
                                    <label class="custom-file-label" for="image">Choose image file...</label>
                                </div>
                            </div>
                            <small class="form-text text-muted">Supported formats: JPEG, PNG, JPG, GIF, SVG, WEBP. Max size:
                                2MB</small>
                            @error('image')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Preview --}}
                        <div class="form-group">
                            <div class="preview-container" id="imagePreview" style="display: none;">
                                <label>Image Preview:</label>
                                <div class="mt-2">
                                    <img id="preview" src="" alt="Preview"
                                        style="max-width: 200px; max-height: 200px; border-radius: 5px;">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            <i class="fas fa-times"></i> Cancel
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Create Service
                        </button>
                    </div>
                </form>
            </div>


        </div>
    </div>
    <div class="modal fade" id="updateServiceModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Service</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- AJAX content will load here -->
                    <div id="editServiceFormContainer"></div>
                </div>
            </div>
        </div>
    </div>



@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            console.log('Initializing Services DataTable...');

            $('#servicesTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('admin.service.index') }}",
                    type: 'GET',
                    error: function(xhr, error, thrown) {
                        console.error('DataTables AJAX Error:', error);
                        console.error('Response:', xhr.responseText);
                        alert('Error loading services: ' + error);
                    }
                },
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'description',
                        name: 'description'
                    },
                    {
                        data: 'image',
                        name: 'image',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ],
                order: [
                    [0, 'desc']
                ],
                pageLength: 10,
                responsive: true,
                language: {
                    processing: "Loading services...",
                    emptyTable: "No services found",
                    zeroRecords: "No matching services found"
                }
            });
        });
    </script>
    <script>
        $(document).on('click', '.editServiceBtn', function() {
            var serviceId = $(this).data('id');

            $.ajax({
                url: '/admin/service/' + serviceId + '/ajax-edit',
                type: 'GET',
                success: function(response) {
                    $('#editServiceFormContainer').html(response);
                    $('#updateServiceModal').modal('show');

                    // Optional: initialize file input preview JS again if needed
                },
                error: function(xhr) {
                    alert('Failed to load service data.');
                }
            });
        });
    </script>
@endpush
