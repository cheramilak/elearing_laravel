@extends('layouts/admin')

@section('title', 'Tables - Basic Tables')

@section('content')

<div class="card">
  <h5 class="card-header">Users
    <a href="{{ route('createUser') }}" class="btn btn-sm btn-outline-primary float-end" ><i class="fas fa-user-shield"></i> Add new</a>

  </h5>
  <div class="table-responsive text-nowrap">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th>User type</th>
          <th>status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @forelse ($users as $item)
        <tr>
          <td>{{ $item->name }}</td>
          <td>{{ $item->email }}</td>
          <td>
            @if ($item->type == '0')
            <span class="badge bg-label-danger me-1">Student</span>
            @endif
            @if ($item->type == '1')
            <span class="badge bg-label-primary me-1">Teacher</span>
            @endif
            @if ($item->type == '2')
            <span class="badge bg-label-primary me-1">Admin</span>
            @endif
          </td>
          <td>
            @if ($item->status == '0')
            <span class="badge bg-label-danger me-1">Blocked</span>
            @endif
            @if ($item->status == '1')
            <span class="badge bg-label-primary me-1">Active</span>
            @endif
            @if ($item->status == '3')
            <span class="badge bg-label-info me-1">Pending</span>
            @endif
          </td>
          <td>
          <a href="{{ route('userEdit',$item->id) }}"><span class="badge bg-label-primary me-1">Edit</span></a>
          <a href="{{ route('userProfile',$item->id) }}"><span class="badge bg-label-info me-1">Profile</span></a>

          </td>
        </tr>
        @empty
        @endforelse
      </tbody>
    </table>
</div>

@endsection
