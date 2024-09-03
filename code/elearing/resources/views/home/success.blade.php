@extends('home.layout.app')
@section('title', 'Home')
@section('footer-class') footer--two @endsection


@section('content')
<section class="section feature section section--bg-offwhite-one">
    <div class="container">
        <h2 class="font-title--md text-center">Success</h2>


                    <!-- Initial Schedule Fields -->
                        <div class="alert alert-success">
                            <h4 class="alert-heading">Success!</h4>
                            <p>Your information has been successfully submitted.</p>
                            <hr>
                            <p>We will contact soon.</p>
                            <p class="mb-0">Thank you for your submission.</p>
                        </div>
        <a href="{{ route('index') }}" class="btn btn-primary mt-2">Home</a>


    </div>
</section>
@endsection
