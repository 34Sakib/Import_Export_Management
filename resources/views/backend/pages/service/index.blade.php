
@extends('AdminSite.Layout.musterLayout')
@section('content')


<div class="" style="background:#FFFFFF !important; padding:20px !important; ">
    <div class="mb-3" style="display: flex; justify-content:space-between; ">
       <div>
           <h2 style="font-family:Georgia, 'Times New Roman', Times, serif;">{{ $title }} list  </h2>
       </div>
       @if(session()->has('success'))
       
       <script>
           Swal.fire({
               position: 'top-end', // Position top-right
               icon: 'success',
               title: 'Success!',
               text: "{{ session('success') }}",
               showConfirmButton: false, // Remove the 'OK' button
               timer: 1300, // Auto close after 3 seconds
               timerProgressBar: true,
               toast: true, // Display as toast notification
               showClass: {
                   popup: 'swal2-noanimation',
                   backdrop: 'swal2-noanimation'
               },
               hideClass: {
                   popup: '',
                   backdrop: ''
               },
              
           });
       </script>
   @endif
   
   @if(session()->has('error'))
        <script>
           Swal.fire({
               position: 'top-end', // Position top-right
               icon: 'error',
               title: 'Error!',
               text: "{{ session('error') }}",
               showConfirmButton: false, // Remove the 'OK' button
               timer: 1300, // Auto close after 3 seconds
               timerProgressBar: true,
               toast: true, // Display as toast notification
               showClass: {
                   popup: 'swal2-noanimation',
                   backdrop: 'swal2-noanimation'
               },
               hideClass: {
                   popup: '',
                   backdrop: ''
               }
           });
       </script>
   @endif
   

       <div>
           <button  type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"> Add New {{ $title }} </button>
       </div>
    </div>
    <hr>
    <div class="table-responsive">
        <table id="leaveDatatable"class="table" >
            <thead>
                <tr>
                    <th>ID</th>
                    <th class="text-center">Image</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Description</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            
          </table>
    </div>
    

     <!-- Button trigger modal -->


     <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header"> 
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add New {{ $title }} </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('admin.service.store') }}" enctype="multipart/form-data">
                        @csrf
                        
                        <!-- Name Field -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    
                        <!-- Position Field -->
                        <div class="mb-3">
                            <label for="position" class="form-label">description</label>
                            <input type="text" name="position" class="form-control" id="position" value="{{ old('position') }}" required>
                            @error('position')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    
                      
                    
                    
                        <!-- Profile Image Field -->
                        <div class="mb-3">
                            <label for="profile_image" class="form-label">Profile Image</label>
                            <input type="file" name="profile_image" class="form-control" id="profile_image">
                            @error('profile_image')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    
                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary w-100">Submit</button>
                    </form>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
{{-- end modal  --}}
</div>






<script type="text/javascript">
$('#leaveDatatable').DataTable({
 processing: true,
 serverSide: true,
 pageLength: 25,
 responsive: true,
 ajax: {
     url: false,
     type: 'GET'
 },
 order: [1, 'desc'],
 autoWidth: false,
 drawCallback: function() {
     $(".dataTables_length select").addClass("form-select form-select-sm");
 },
 language: {
     'paginate': {
         'previous': '<i class="mdi mdi-chevron-left"></i>',
         'next': '<i class="mdi mdi-chevron-right"></i>'
     }
 },
 columns: [
            { data: 'id', name: 'id' },
            { data: 'image', name: 'image' },
            { data: 'name', name: 'name' },
            { data: 'desription', name: 'desription' },
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ]
});


</script>
@endsection