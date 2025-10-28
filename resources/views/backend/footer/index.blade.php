@extends('backend.layout.master')
<!-- SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@section('title', 'Footer Settings')

@push('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<!-- SweetAlert2 -->
<link rel="stylesheet" href="{{ asset('backend/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
@endpush

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Footer Settings</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Footer Settings</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    @if(session('success'))
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
                title: '{{ session('success') }}'
            });
        </script>
    @endif

    @if(session('error'))
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
                title: '{{ session('error') }}'
            });
        </script>
    @endif

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#footerModal">
                                <i class="fas fa-plus"></i> Add Footer Settings
                            </button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="footerTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Logo</th>
                                        <th>Title</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Social Links</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Data will be loaded via DataTables -->
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<!-- Footer Modal -->
<div class="modal fade" id="footerModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Footer Settings</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="footerForm" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" id="formMethod" value="POST">
                <input type="hidden" name="footer_id" id="footer_id">
                
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title">Title <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Enter title" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter description"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter phone number">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="logo">Logo</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="logo" name="logo">
                                        <label class="custom-file-label" for="logo">Choose file</label>
                                    </div>
                                </div>
                                <div id="logoPreview" class="mt-2"></div>
                            </div>
                            <div class="form-group">
                                <label>Social Media Links</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fab fa-facebook"></i></span>
                                    </div>
                                    <input type="url" class="form-control" name="facebook" placeholder="Facebook URL">
                                </div>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fab fa-twitter"></i></span>
                                    </div>
                                    <input type="url" class="form-control" name="twitter" placeholder="Twitter URL">
                                </div>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fab fa-instagram"></i></span>
                                    </div>
                                    <input type="url" class="form-control" name="instagram" placeholder="Instagram URL">
                                </div>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fab fa-linkedin"></i></span>
                                    </div>
                                    <input type="url" class="form-control" name="linkedin" placeholder="LinkedIn URL">
                                </div>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fab fa-youtube"></i></span>
                                    </div>
                                    <input type="url" class="form-control" name="youtube" placeholder="YouTube URL">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endsection

@push('scripts')
<!-- DataTables  & Plugins -->
<script src="{{ asset('backend/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('backend/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<!-- SweetAlert2 -->
<script src="{{ asset('backend/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<!-- bs-custom-file-input -->
<script src="{{ asset('backend/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>

<script>
    $(function () {
        // Initialize DataTable
        var table = $('#footerTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('admin.admin.footer-settings.index') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                {data: 'logo', name: 'logo', orderable: false, searchable: false},
                {data: 'title', name: 'title'},
                {data: 'phone', name: 'phone'},
                {data: 'email', name: 'email'},
                {data: 'social_links', name: 'social_links', orderable: false, searchable: false},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
            responsive: true,
            autoWidth: false,
        });

        // Initialize bs-custom-file-input
        bsCustomFileInput.init();

        // Preview image before upload
        $("#logo").change(function(){
            readURL(this);
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#logoPreview').html('<img src="'+e.target.result+'" class="img-fluid" style="max-height: 150px;">');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        // Reset form and preview when modal is closed
        $('#footerModal').on('hidden.bs.modal', function () {
            document.getElementById("footerForm").reset();
            $('#logoPreview').html('');
            $('#formMethod').val('POST');
            $('.modal-title').text('Add Footer Settings');
            $('.custom-file-label').text('Choose file');
        });

        // Handle form submission
        $('#footerForm').on('submit', function(e) {
            e.preventDefault();
            
            var formData = new FormData(this);
            var footerId = $('#footer_id').val();
            var url = "{{ route('admin.admin.footer-settings.store') }}";
            var method = 'POST';
            
            if ($('#formMethod').val() === 'PUT') {
                url = '{{ url("admin/footer-settings") }}/' + footerId;
                formData.append('_method', 'PUT');
            }
            
            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.success) {
                        $('#footerModal').modal('hide');
                        table.ajax.reload();
                        
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                        });

                        Toast.fire({
                            icon: 'success',
                            title: response.message || 'Operation completed successfully!'
                        });
                    }
                },
                error: function(xhr) {
                    var errorMessage = 'An error occurred. Please try again.';
                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        errorMessage = xhr.responseJSON.message;
                    }
                    
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                    });

                    Toast.fire({
                        icon: 'error',
                        title: errorMessage
                    });
                }
            });
        });

        // Handle edit button click
        $(document).on('click', '.editBtn', function() {
            var footerId = $(this).data('id');
            
            // Clear previous form data
            $('#footerForm')[0].reset();
            $('#logoPreview').html('');
            
            $.get('{{ url("admin/footer-settings") }}/' + footerId + '/edit', function(data) {
                $('.modal-title').text('Edit Footer Settings');
                $('#formMethod').val('PUT');
                $('#footer_id').val(data.id);
                
                // Fill the form with footer data
                $('#title').val(data.title);
                $('#description').val(data.description);
                $('#phone').val(data.phone);
                $('#email').val(data.email);
                $('input[name="facebook"]').val(data.facebook);
                $('input[name="twitter"]').val(data.twitter);
                $('input[name="instagram"]').val(data.instagram);
                $('input[name="linkedin"]').val(data.linkedin);
                $('input[name="youtube"]').val(data.youtube);
                
                // Show logo preview if exists
                if (data.logo) {
                    var logoUrl = '{{ asset("images/") }}/' + data.logo;
                    $('#logoPreview').html('<img src="' + logoUrl + '" class="img-fluid" style="max-height: 150px;">');
                }
                
                $('#footerModal').modal('show');
            });
        });

        // Handle delete button click
        $(document).on('click', '.deleteBtn', function(e) {
            e.preventDefault();
            var footerId = $(this).data('id');
            var deleteUrl = '{{ url("admin/footer-settings") }}/' + footerId;
            
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Delete',
                cancelButtonText: 'Cancel',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: deleteUrl,
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            _method: 'DELETE'
                        },
                        success: function(response) {
                            table.ajax.reload();
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                            });

                            Toast.fire({
                                icon: 'success',
                                title: 'Record deleted successfully!'
                            });
                        },
                        error: function(xhr) {
                            Swal.fire(
                                'Error!',
                                'Failed to delete record. Please try again.',
                                'error'
                            );
                        }
                    });
                }
            });
        });
    });
</script>
@endpush
