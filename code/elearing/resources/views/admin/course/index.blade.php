@extends('layouts.admin')

@section('title', 'Tables - Basic Tables')

@section('page-script')
{{-- <script src="{{asset('assets/js/ui-toasts.js')}}"></script> --}}
<script src="{{asset('assets/js/sweetalert.min.js')}}"></script>

  <script>
     const deleteBanks = (url) => {
      return new Promise((resolve, reject) => {
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this Banks!",
            icon: "warning",
            dangerMode: true,
            buttons: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                // User clicked the delete button
                window.location.replace(url);
                resolve(true); // Resolve the promise
            } else {
                resolve(false); // Resolve with false to indicate cancellation
            }
        })
        .catch((error) => {
            reject(error); // Handle any errors
        });
    });
  }

  function editItem(e){
    var id = e['id'];
    var name = e['name'];
    $("#editName").val(name);
    $("#editId").val(id);
    $("#priceEdit").val(e['price']);
  }

  </script>
  @endsection

@section('content')

<div class="card">

  <h5 class="card-header">Universty
    <a href="add" class="btn btn-sm btn-outline-primary float-end"  data-bs-toggle="modal" data-bs-target="#modalCenter"><i class="fas fa-user-shield"></i> Add new</a>
  </h5>

  <div class="table-responsive text-nowrap">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Name</th>
          <th>price</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @forelse ($course as $item)
        <tr>
          <td>
            {{ $item->name }}
          </td>
          <td>
            {{ $item->price }}
        </td>
          <td>
            @if ($item->status == '0')
            <span class="badge bg-label-danger me-1">De active</span>
            @else
            <span class="badge bg-label-primary me-1">Active</span>
            @endif
          </td>
          <td>
            <a href="javascript:void(0)" onClick="editItem({{ $item }})" data-bs-toggle="modal" data-bs-target="#modalCenterEdit"><span class="badge bg-label-primary me-1">Edit</span></a>
          </td>
        </tr>
        @empty
        @endforelse
      </tbody>
    </table>
  </div>
</div>

<div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
  <form action="{{ route('storeCourse') }}" method="post">
    @csrf
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalCenterTitle">Create form</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col mb-3">
            <label for="nameWithTitle" class="form-label">name</label>
            <input type="text" name="name" required id="nameWithTitle" class="form-control" placeholder="Enter Name">
          </div>
        </div>
        <div class="row">
          <div class="col mb-3">
            <label for="nameWithTitle" class="form-label">Price</label>
            <input type="text" name="price" required id="nameWithTitle" class="form-control" placeholder="price">
          </div>
        </div>
        <div class="mb-3">
          <label for="exampleFormControlSelect1" class="form-label">status</label>
          <select name="status" required class="form-select @error('status') is-invalid @enderror"  id="exampleFormControlSelect1" aria-label="Default select example">
            <option value="1">Active</option>
            <option value="0">Deactive</option>
          </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">close</button>
        <button type="submit" class="btn btn-primary">submit</button>
      </div>
    </div>
  </form>
  </div>
</div>

<div class="modal fade" id="modalCenterEdit" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
  <form action="{{ route('updateCourse') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalCenterTitle">Update form</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col mb-3">
            <label for="nameWithTitle" class="form-label">Name</label>
            <input type="text" name="name" id="editName" required  class="form-control" placeholder="Enter Name">
            <input type="text" name="id" id="editId" hidden required  class="form-control" >
          </div>
        </div>
        <div class="row">
          <div class="col mb-3">
            <label for="priceEdit" class="form-label">Price</label>
            <input type="text" name="price"  id="priceEdit" class="form-control" placeholder="price">
          </div>
        </div>
        <div class="mb-3">
          <label for="exampleFormControlSelect1" class="form-label">Status</label>
          <select name="status" required class="form-select @error('status') is-invalid @enderror"  id="exampleFormControlSelect1" aria-label="Default select example">
            <option value="1">Active</option>
            <option value="0">Deactive</option>
          </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </form>
  </div>
</div>
@endsection
