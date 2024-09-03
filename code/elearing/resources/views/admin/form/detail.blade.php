@extends('layouts/admin')

@section('title', 'forms')

@section('content')

<div class="card">
    <h5 class="card-header">Detail</h5>
    <div class="table-responsive text-nowrap mb-3 mt-3">
        <!-- Add the class 'mx-auto' to center the table -->
        <table class="table table-bordered mx-auto" style="width: 80%;"> <!-- Adjust the width as needed -->
            <tr>
                <th>Category</th>
                <td>
                    @switch($data->cat)
                        @case(1)
                            Tutor
                            @break
                        @case(2)
                            Research
                            @break
                        @case(3)
                            Training
                            @break
                        @case(4)
                            Entrepreneurship
                            @break
                        @default
                            Unknown
                    @endswitch
                </td>
            </tr>
            <tr>
                <th>Schedule</th>
                <td>
                    @if($data->schedule && is_array($data->schedule))
                        <ul>
                            @foreach($data->schedule as $item)
                                <li>
                                    {{ ucfirst($item['day']) }}: {{ $item['start_time'] }} - {{ $item['end_time'] }}
                                </li>
                            @endforeach
                        </ul>
                    @else
                        No schedule available
                    @endif
                </td>
            </tr>
            <tr>
                <th>Course</th>
                <td>
                    @if($data->course)
                        @php
                            $courses = json_decode($data->course, true);
                        @endphp
                        @if($courses && is_array($courses))
                            <ul>
                                @foreach($courses as $course)
                                    <li>
                                        <strong>{{ $course['name'] }}</strong><br>
                                        Price: {{ number_format($course['price'], 2) }}<br>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            No course information available
                        @endif
                    @else
                        No course information available
                    @endif
                </td>
            </tr>
            @if ($data->cat == 1)
            <tr>
                <th>Selected Grade</th>
                <td>{{ $data->selected_grade }}</td>
            </tr>
            @endif
            <tr>
                <th>Type</th>
                <td>{{ $data->type == 1 ? 'Online' : 'Offline' }}</td>
            </tr>
            @if ($data->cat == 1)
            <tr>
                <th>Study</th>
                <td>{{ $data->study }}</td>
            </tr>
            @endif
            <tr>
                <th>Name</th>
                <td>{{ $data->name }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $data->email }}</td>
            </tr>
            <tr>
                <th>Phone</th>
                <td>{{ $data->phone }}</td>
            </tr>
            <tr>
                <th>Address</th>
                <td>{{ $data->address }}</td>
            </tr>
        </table>
    </div>
</div>

@endsection
