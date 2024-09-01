@extends('home.layout.app')
@section('title', 'Home')
@section('footer-class') footer--two @endsection

@section('content')
<section class="section feature section section--bg-offwhite-one">
    <div class="container">
        <h2 class="font-title--md text-center">What subject do you want</h2>
        <form action="{{ route('setSubjects') }}" method="post">
            @csrf
            <div class="row">
                @foreach ($subject as $item)
                <div class="col-lg-3 col-md-6">
                    <div class="cardFeature">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="subjects[]" value="{{ $item->id }}" id="checkbox{{ $item->id }}">
                            <label class="form-check-label" for="checkbox{{ $item->id }}">
                                {{ $item->name }} <span class="small">{{ $item->price }}/hr</span>
                            </label>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <button type="submit" class="btn btn-primary mt-2">Next</button>
        </form>
    </div>
</section>
@endsection
