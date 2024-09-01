@extends('home.layout.app')
@section('title', 'Home')
@section('footer-class') footer--two @endsection


@section('content')
<section class="section feature section section--bg-offwhite-one">
    <div class="container">
        <h2 class="font-title--md text-center">What grade applay for</h2>
        <form action="{{ route('setGrade') }}" method="post">
            @csrf
        <div class="row">
                    <!-- Initial Schedule Fields -->
                    <div class="col-lg-6 col-md-6 mb-3 schedule-item">
                        <div class="form-group">
                            <label for="dayOfWeek">Grade</label>
                            <select class="form-select" name="grade" required>
                                <option value="" disabled selected>Select a grade</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>
                        </div>
                    </div>




        </div>
        <button type="submit" class="btn btn-primary mt-2">Next</button>

    </form>
    </div>
</section>
@endsection
