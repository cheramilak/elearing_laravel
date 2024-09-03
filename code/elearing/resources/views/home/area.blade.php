@extends('home.layout.app')
@section('title', 'Home')
@section('footer-class') footer--two @endsection

@section('content')
<section class="section feature section section--bg-offwhite-one">
    <div class="container">
        <h2 class="font-title--md text-center">Subject/Study </h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('setStudy') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="study">Study</label>
                <input type="text" class="form-control" id="study" name="study" value="{{ old('study') }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</section>
@endsection
