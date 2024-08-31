@extends('home.layout.app')
@section('title', 'Home')
@section('footer-class') footer--two @endsection


@section('content')
<section class="section feature section section--bg-offwhite-one">
    <div class="container">
        <h2 class="font-title--md text-center">What grade applay for</h2>
        <form action="" method="post">
        <div class="row">

            <div class="col-lg-3 col-md-6">
                <div class="cardFeature">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="checkbox1">
                        <label class="form-check-label" for="checkbox1">
                            Option 1
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="cardFeature">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="checkbox1">
                        <label class="form-check-label" for="checkbox1">
                            Option 1
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="cardFeature">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="checkbox1">
                        <label class="form-check-label" for="checkbox1">
                            Option 1
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="cardFeature">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="checkbox1">
                        <label class="form-check-label" for="checkbox1">
                            Option 1
                        </label>
                    </div>
                </div>
            </div>




        </div>
        <button type="submit" class="btn btn-primary mt-2">Next</button>

    </form>
    </div>
</section>
@endsection
