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
          <th>Type</th>
          <th>Way</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @forelse ($form as $item)
        <tr>
          <td>{{ $item->name }}</td>
          <td>{{ $item->email }}</td>
          <td>
            @if ($item->cat == '1')
            <span class="badge bg-label-danger me-1">Tutor</span>
            @endif
            @if ($item->cat == '2')
            <span class="badge bg-label-primary me-1">Research</span>
            @endif
            @if ($item->cat == '3')
            <span class="badge bg-label-primary me-1">Training</span>
            @endif
            @if ($item->cat == '4')
            <span class="badge bg-label-primary me-1">Entrepreneurship</span>
            @endif
          </td>
          <td>
            @if ($item->type == '1')
            <span class="badge bg-label-primary me-1">Online</span>
            @endif
            @if ($item->status == '2')
            <span class="badge bg-label-info me-1">Offline</span>
            @endif
          </td>
          <td>
          <a href="{{ route('formDetail',$item->id) }}"><span class="badge bg-label-info me-1">Detail</span></a>
          </td>
        </tr>
        @empty
        @endforelse
      </tbody>
    </table>
</div>
@endsection
