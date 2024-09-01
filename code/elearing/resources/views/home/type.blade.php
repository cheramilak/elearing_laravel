@extends('home.layout.app')
@section('title', 'Home')
@section('footer-class') footer--two @endsection


@section('content')
<section class="section feature section section--bg-offwhite-one">
    <div class="container">
        <h2 class="font-title--md text-center">Which way prefer to study</h2>
        <form action="" method="post">
        <div class="row">

            <div class="col-lg-6 col-md-6">
                <a href="{{ route('setType',1) }}">
                <div class="cardFeature">
                    <div class="cardFeature__icon cardFeature__icon--bg-b">
                           <img src="{{ asset('assets/images/videoconference.png') }}" alt="">
                    </div>
                    <h5 class="font-title--xs">Online</h5>
                    <p>
                        Learning conducted through the internet, allowing students to access courses, resources,
                         and interact with instructors and peers from anywhere with an internet connection.
                    </p>
                </div>
                </a>
            </div>
            <div class="col-lg-6 col-md-6">
                <a href="{{ route('setType',2) }}">
                <div class="cardFeature">
                    <div class="cardFeature__icon cardFeature__icon--bg-b">
                        <img src="{{ asset('assets/images/offline.png') }}" alt="">
                    </div>
                    <h5 class="font-title--xs">Offline</h5>
                    <p>
                        Learning that happens in person, such as attending classes or workshops at a physical location,
                         where students and teachers interact face-to-face.
                    </p>
                </div>
            </div>
            </a>
        </div>
    </form>
    </div>
</section>
@endsection
