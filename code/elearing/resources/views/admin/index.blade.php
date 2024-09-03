@extends('layouts/admin')

@section('title', 'Dashboard')

@section('content')

<div class="card">
  <h5 class="card-header">Users
    <a href="{{ route('createUser') }}" class="btn btn-sm btn-outline-primary float-end" ><i class="fas fa-user-shield"></i> Add new</a>

  </h5>

@endsection
