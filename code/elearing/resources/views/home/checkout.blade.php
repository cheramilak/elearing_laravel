@extends('home.layout.app')
@section('title', 'Checkout')
@section('footer-class') footer--two @endsection

@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Checkout Details</h4>
                </div>
                <div class="card-body">
                    <!-- Selected Subject and Grade -->
                    <div class="mb-3">
                        <h5 class="card-title">Selected Subject and Grade</h5>
                        <ul class="list-group">
                            @foreach ($subjects as $subject)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{ $subject->name }}
                                    <span class="small">{{ $subject->price }}/hr</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="mb-3">
                        <h5 class="card-title">Selected Grade</h5>
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Grade
                                <span >{{ $grade }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                type
                                <span>
                                @if ($type == 1)
                                Online
                                @else
                                Offline
                                @endif
                               </span>
                            </li>
                        </ul>
                    </div>
                    <!-- Schedule -->
                    <div class="mb-3">
                        <h5 class="card-title">Schedule</h5>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Day</th>
                                    <th scope="col">Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($schedule as $item)
                                    <tr>
                                        <td>{{ ucfirst($item['day']) }}</td>
                                        <td>{{ $item['start_time'] }} - {{ $item['end_time'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Checkout Button -->
                    <div class="mt-4">
                        <a href="{{ route('checkout') }}" class="btn btn-primary">Next</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
