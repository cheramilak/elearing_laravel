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
        <form action="{{ route('updateProfilePhoto',$user->id) }}" method="POST" enctype="multipart/form-data">
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
        <form id="formAccountSettings" action="{{ route('updateTeacher',$user->id) }}" method="POST" enctype="multipart/form-data" >
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
                <input class="form-control" type="file" id="state" name="state" placeholder="cv" />
                <label for="state">CV</label>
                <a href="{{ route('downloadTeacherCv',$user->id) }}" class="btn btn-outline-secondary mt-2">Download</a>
              </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating form-floating-outline">
                  <input type="password" class="form-control" id="password" name="password"  />
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
    <div class="card">
      <h5 class="card-header fw-normal">Delete Account</h5>
      <div class="card-body">
        <div class="mb-3 col-12 mb-0">
          <div class="alert alert-warning">
            <h6 class="alert-heading mb-1">Are you sure you want to delete your account?</h6>
            <p class="mb-0">Once you delete your account, there is no going back. Please be certain.</p>
          </div>
        </div>
        <form id="formAccountDeactivation" onsubmit="return false">
          <div class="form-check mb-3 ms-3">
            <input class="form-check-input" type="checkbox" name="accountActivation" id="accountActivation" />
            <label class="form-check-label" for="accountActivation">I confirm my account deactivation</label>
          </div>
          <button type="submit" class="btn btn-danger">Deactivate Account</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
