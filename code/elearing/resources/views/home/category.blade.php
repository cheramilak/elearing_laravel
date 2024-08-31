@extends('home.layout.app')
@section('title', 'Home')
@section('footer-class') footer--two @endsection


@section('content')
<section class="section feature section section--bg-offwhite-one">
    <div class="container">
        <h2 class="font-title--md text-center">What you want to study</h2>
        <form action="" method="post">
        <div class="row">

            <div class="col-lg-3 col-md-6">
                <div class="cardFeature">
                    <div class="cardFeature__icon cardFeature__icon--bg-b">
                           <img src="{{ asset('assets/images/teacher.svg') }}" alt="">
                    </div>
                    <h5 class="font-title--xs">Tutor</h5>
                    <p>
                        Vivamus interdum neque massa, eget mattis mi gravida eget. Donec et dictum justo. Vivamus
                        interdum.
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="cardFeature">
                    <div class="cardFeature__icon cardFeature__icon--bg-b">
                        <img src="{{ asset('assets/images/interview.svg') }}" alt="">
                    </div>
                    <h5 class="font-title--xs">Research consultation </h5>
                    <p>
                        Vivamus interdum neque massa, eget mattis mi gravida eget. Donec et dictum justo. Vivamus
                        interdum.
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="cardFeature">
                    <div class="cardFeature__icon cardFeature__icon--bg-b">
                        <img src="{{ asset('assets/images/course.svg') }}" alt="">
                    </div>
                    <h5 class="font-title--xs">Training</h5>
                    <p>
                        Vivamus interdum neque massa, eget mattis mi gravida eget. Donec et dictum justo. Vivamus
                        interdum.
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="cardFeature">
                    <div class="cardFeature__icon cardFeature__icon--bg-r">
                        <img src="{{ asset('assets/images/startup.svg') }}" alt="">
                    </div>
                    <h5 class="font-title--xs">Entrepreneurship</h5>
                    <p>
                        Vivamus cursus libero quis lobortis mattis. Suspendisse in malesuada mi. Maecenas vel
                        euismod turpis.
                    </p>
                </div>
            </div>

        </div>
    </form>
    </div>
</section>
@endsection
