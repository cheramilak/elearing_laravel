@extends('layouts/admin')

@section('title', 'Tables - Basic Tables')

@section('content')

<div class="card">
  <h5 class="card-header">Config
  </h5>

<div class="container mt-5">
    <h6>About us</h6>
    <form action="{{ route('updateConfig',$about['slug']) }}" method="post">
        @csrf
    <textarea name="content" id="summernote">{{ $about['value'] }}</textarea>
    <button type="submit" class="btn btn-primary me-2 mt-3">Save changes</button>
</form>
</div>

<div class="container mt-5">
    <h6>Contacut  us</h6>
    <form action="{{ route('updateConfig',$about['slug']) }}" method="post">
        @csrf
    <textarea name="content" id="summernote1">{{ $contact['value'] }}</textarea>
    <button type="submit" class="btn btn-primary me-2 mt-3">Save changes</button>

</form>
</div>

</div>

@endsection

@section('page-script')

<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            height: 300 // set editor height
        });
        $('#summernote1').summernote({
            height: 300 // set editor height
        });
    });
</script>

@endsection
