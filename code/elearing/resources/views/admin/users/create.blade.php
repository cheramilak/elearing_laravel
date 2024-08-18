@extends('layouts/admin')

@section('title', 'User create')

@section('page-script')
  <script>
    function showSpinner() {
      var spinner = document.getElementById('spinner');
      spinner.style.display = 'block';
      var button = document.getElementById('submitButton');
      button.style.display = 'none';
        }
  </script>
@endsection

@section('content')
  <div class="col-md-12">
    <div class="card mb-4">
      <h5 class="card-header">User create form</h5>
      <form action="{{ route('storeUser') }}" method="post" onsubmit="showSpinner()">
        @csrf
        <div class="card-body">
          <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" required class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" id="name" placeholder="Kebede ayele" />
            @error('name')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" required name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" id="email" placeholder="name@example.com" />
            @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" required class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" id="password" placeholder="password" />
            @error('password')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
          <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" required class="form-select @error('status') is-invalid @enderror" id="status" aria-label="Default select example">
              <option value="1">Active</option>
              <option value="2">Pending</option>
              <option value="0">Blocked</option>
            </select>
            @error('status')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
          <div class="mb-3">
            <label for="type" class="form-label">User type</label>
            <select name="type" required class="form-select @error('type') is-invalid @enderror" id="type" aria-label="Default select example">
              <option value="0">Student</option>
              <option value="1">Teacher</option>
              <option value="2">Admin</option>
            </select>
            @error('type')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
          <div class="row justify-content-end">
            <div class="col-sm-12">
              <button type="submit" id="submitButton" class="btn btn-primary">Submit</button>
              <div class="spinner-border" id="spinner" style="display: none;" role="status">
                <span class="visually-hidden">Loading...</span>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection
