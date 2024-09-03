@extends('layouts/admin')


@section('page-script')
<script src="{{asset('assets/js/pages-account-settings-account.js')}}"></script>
<script>
    function resetImage() {
        document.getElementById('upload').value = '';
        document.getElementById('uploadedAvatar').src = '{{ asset('assets/img/avatars/1.png') }}';
    }

    function previewImage(event) {
        const file = event.target.files[0];
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('uploadedAvatar').src = e.target.result;
        }
        reader.readAsDataURL(file);
      document.getElementById('submitBTN').style.display = 'block';
    }

    function editItem(e){
        var id = e['id'];
        var name = e['reasen'];
        $("#editReasen").val(name);
        $("#editId").val(id);
        $("#teacherEdit").val(e['teacher_id']);
      }
</script>
@endsection

@section('content')
<h4 class="py-3 mb-4">
  <span class="text-muted fw-light">Account Settings /</span> Account
</h4>

<div class="row">
  <div class="col-md-12">
    <div class="card mb-4">
      <h4 class="card-header">Profile Details</h4>
      <!-- Account -->
      <div class="card-body">
        <form action="{{ route('updateStudentPhoto',$user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="d-flex align-items-start align-items-sm-center gap-4">
                <img src="{{ $profile->image == '' ? asset('assets/img/avatars/1.png') : asset( $profile->image ) }}" height="200" width="200" alt="user-avatar" class="d-block w-px-120 h-px-120 rounded mt-1" id="uploadedAvatar" />
                <div class="button-wrapper">
                    <label for="upload" class="btn btn-primary me-2 mb-3" tabindex="0">
                        <span class="d-none d-sm-block">Upload new photo</span>
                        <i class="mdi mdi-tray-arrow-up d-block d-sm-none"></i>
                        <input type="file" name="image" id="upload" class="account-file-input" hidden accept="image/png, image/jpeg" onchange="previewImage(event)" />
                    </label>
                    <button type="button" class="btn btn-outline-danger account-image-reset mb-3" onclick="resetImage()">
                        <i class="mdi mdi-reload d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Reset</span>
                    </button>
                    <div class="text-muted small">Allowed JPG, GIF or PNG.</div>
                </div>
            </div>
            <div class="mt-3">
                <button type="submit" style="display: none"  id="submitBTN" class="btn btn-primary">Submit</button>
            </div>
        </form>

      </div>
      <div class="card-body pt-2 mt-1">
        <form id="formAccountSettings" action="{{ route('updateStudent',$user->id) }}" method="POST" enctype="multipart/form-data" >
            @csrf
          <div class="row mt-2 gy-4">
            <div class="col-md-6">
              <div class="form-floating form-floating-outline">
                <input class="form-control" type="text" id="name" name="name" value="{{ $user->name }}" autofocus />
                <label for="name">full name</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating form-floating-outline">
                <input class="form-control" type="text" id="email" readonly name="email" value="{{ $user->email }}" placeholder="john.doe@example.com" />
                <label for="email">E-mail</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating form-floating-outline">
                <input type="text" class="form-control" id="address" name="address" value="{{ $profile->address }}" />
                <label for="address">Address</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="input-group input-group-merge">
                <div class="form-floating form-floating-outline">
                  <input type="text" id="phone" name="phone" class="form-control" value="{{ $profile->phone }}" placeholder="202 555 0111" />
                  <label for="phone">Phone Number</label>
                </div>
                <span class="input-group-text">ET (+251)</span>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating form-floating-outline">
                <select name="status" required class="form-select @error('status') is-invalid @enderror"  id="status" aria-label="Default select example">
                    <option value="1" {{ $user->status == 1 ? 'selected' : '' }}>Active</option>
                    <option value="3" {{ $user->status == 3 ? 'selected' : '' }}>Pending</option>
                    <option value="0" {{ $user->status == 0 ? 'selected' : '' }}>Block</option>
                </select>
                <label for="status">Status</label>
              </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating form-floating-outline">
                  <input type="password" class="form-control"  name="Editpassword"  />
                  <label for="password">Password</label>
                </div>
              </div>
          </div>
          <div class="mt-4">
            <button type="submit" class="btn btn-primary me-2">Save changes</button>
          </div>
        </form>
      </div>
      <!-- /Account -->
    </div>
    <div class="card m-3">
        <h5 class="card-header">Instracter
            <a href="add" class="btn btn-sm btn-outline-primary float-end"  data-bs-toggle="modal" data-bs-target="#modalCenter"><i class="fas fa-user-shield"></i> Add new</a>
          </h5>

          <div class="table-responsive text-nowrap">
            <table class="table table-striped">
              <thead>
                <tr>
                    <tr>
                        <th>Instracter</th>
                        <th>Reasen</th>
                        <th>Actions</th>
                    </tr>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0">
                @forelse ($instracters as $item)
                <tr>
                    <td>{{ $item->teachers->name }}</td>
                    <td>{{ $item->reasen }}</td>
                    <td>
                        <a href="" class="btn btn-info">View</a>
                        <a href="javascript:void(0)" onClick="editItem({{ $item }})" data-bs-toggle="modal" data-bs-target="#modalCenterEdit" class="btn btn-warning">Edit</a>
                    </td>
                </tr>
                @empty
                @endforelse
              </tbody>
            </table>
          </div>
  </div>
</div>

<div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <form action="{{ route('assignTeacher',$user->id) }}" method="post">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalCenterTitle">Create form</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
              <div class="col mb-3">
                  <label for="reasen" class="form-label">reasen</label>
                  <input type="text" name="reasen" required id="reasen" class="form-control" placeholder="Enter description">
                </div>
          <div class="mb-3">
            <label for="exampleFormControlSelect1" class="form-label">reasen</label>
            <select name="teacher" required class="form-select @error('teacher') is-invalid @enderror"  id="exampleFormControlSelect1" aria-label="Default select example">
              @foreach ($teacher as $item)
              <option value="{{ $item->id }}">{{ $item->name }}</option>
              @endforeach
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
    <form action="{{ route('updateAssignTeacher') }}" method="post">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalCenterTitle">Update form</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
              <div class="col mb-3">
                  <label for="priceWithTitle" class="form-label">Reasen</label>
                  <input type="text" name="reasen" id="editReasen" required  class="form-control" placeholder="Enter resean">
                  <input type="text" name="id" id="editId" hidden required  class="form-control" placeholder="Enter resean">
                </div>
          <div class="mb-3">
            <label for="statusEdit" class="form-label">Status</label>
            <select name="teacher" required class="form-select @error('teacher') is-invalid @enderror"  id="teacherEdit" aria-label="Default select example">
                @foreach ($teacher as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
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
