@extends('layouts/admin')

@section('title', 'Tables - Basic Tables')

@section('content')
<div class="col-md-12">
  <div class="card mb-4">
    <h5 class="card-header">User edit</h5>
    <form action="{{ route('updateUser',$user->id) }}" method="post">
      @csrf
    <div class="card-body">
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">@lang('messages.name')</label>
        <input type="text" name="name" required class="form-control @error('name') is-invalid @enderror" value="{{ $user->name }}" id="exampleFormControlInput1" placeholder="Kebede ayele" />
        @error('name')
        <span class="invalid-feedback" role="alert">
           <strong>{{ $message }}</strong>
        </span>
       @enderror
      </div>
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">@lang('messages.email')</label>
        <input type="email" name="email"  class="form-control @error('email') is-invalid @enderror" value="{{ $user->email }}" id="exampleFormControlInput1" placeholder="name@example.com" />
        @error('email')
        <span class="invalid-feedback" role="alert">
           <strong>{{ $message }}</strong>
        </span>
       @enderror
      </div>
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">@lang('messages.password')</label>
        <input type="password" name="password"  class="form-control @error('password') is-invalid @enderror"  id="exampleFormControlInput1" placeholder="password" />
        @error('password')
        <span class="invalid-feedback" role="alert">
           <strong>{{ $message }}</strong>
        </span>
       @enderror
      </div>
      <div class="mb-3">
        <label for="exampleFormControlSelect1" class="form-label">@lang('status')</label>
        <select name="status" required class="form-select @error('status') is-invalid @enderror"  id="exampleFormControlSelect1" aria-label="Default select example">
          <option value="1" {{ $user->status == '1' ? 'selected' : '' }}>Active</option>
          <option value="2" {{ $user->status == '2' ? 'selected' : '' }}>Pending</option>
          <option value="0" {{ $user->status == '0' ? 'selected' : '' }}>Block</option>
        </select>
        @error('status')
        <span class="invalid-feedback" role="alert">
           <strong>{{ $message }}</strong>
        </span>
       @enderror
      </div>
      <div class="mb-3">
        <label for="type" class="form-label">@lang('messages.userType')</label>
        <select name="type" required class="form-select @error('type') is-invalid @enderror" id="type" aria-label="Default select example">
          <option value="0" {{ $user->type == '0' ? 'selected' : '' }}>Student</option>
          <option value="1" {{ $user->type == '1' ? 'selected' : '' }}>Teacher</option>
          <option value="2" {{ $user->type == '2' ? 'selected' : '' }}>Admin</option>
        </select>
        @error('type')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
      <div class="row justify-content-end">
        <div class="col-sm-12">
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </div>
    </div>
  </form>
  </div>
</div>
@endsection
