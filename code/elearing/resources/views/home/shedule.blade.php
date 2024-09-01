@extends('home.layout.app')
@section('title', 'Home')
@section('css')
<link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet">
@endsection
@section('footer-class') footer--two @endsection

@section('content')
<section class="section feature section section--bg-offwhite-one">
    <div class="container">
        <h2 class="font-title--md text-center">Schedule Time</h2>
        <form action="{{ route('storeSchedule') }}" method="post" id="scheduleForm">
            @csrf
            <div class="row" id="scheduleContainer">
                <!-- Initial Schedule Fields -->
                <div class="col-lg-4 col-md-6 mb-3 schedule-item">
                    <div class="form-group">
                        <label for="dayOfWeek">Day of the Week</label>
                        <select class="form-select" name="dayOfWeek[]" required>
                            <option value="" disabled selected>Select a day</option>
                            <option value="monday">Monday</option>
                            <option value="tuesday">Tuesday</option>
                            <option value="wednesday">Wednesday</option>
                            <option value="thursday">Thursday</option>
                            <option value="friday">Friday</option>
                            <option value="saturday">Saturday</option>
                            <option value="sunday">Sunday</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-3 schedule-item">
                    <div class="form-group">
                        <label for="startTime">Start Time</label>
                        <input type="time" class="form-control" name="startTime[]" required>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-3 schedule-item">
                    <div class="form-group">
                        <label for="endTime">End Time</label>
                        <input type="time" class="form-control" name="endTime[]">
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn-secondary" id="addMore">Add More</button>
            <button type="submit" class="btn btn-primary mt-3">Next</button>
        </form>
    </div>
</section>
@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<!-- Bootstrap JS CDN -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Flatpickr JS CDN -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        flatpickr("input[name='startTime[]']", {
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
            time_24hr: true
        });
        flatpickr("input[name='endTime[]']", {
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
            time_24hr: true
        });

        document.getElementById('addMore').addEventListener('click', function() {
            const container = document.getElementById('scheduleContainer');
            const newItem = document.createElement('div');
            newItem.classList.add('row');
            newItem.innerHTML = `
                <div class="col-lg-4 col-md-6 mb-3 schedule-item">
                    <div class="form-group">
                        <label for="dayOfWeek">Day of the Week</label>
                        <select class="form-select" name="dayOfWeek[]" required>
                            <option value="" disabled selected>Select a day</option>
                            <option value="monday">Monday</option>
                            <option value="tuesday">Tuesday</option>
                            <option value="wednesday">Wednesday</option>
                            <option value="thursday">Thursday</option>
                            <option value="friday">Friday</option>
                            <option value="saturday">Saturday</option>
                            <option value="sunday">Sunday</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-3 schedule-item">
                    <div class="form-group">
                        <label for="startTime">Start Time</label>
                        <input type="time" class="form-control" name="startTime[]" required>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-3 schedule-item">
                    <div class="form-group">
                        <label for="endTime">End Time</label>
                        <input type="time" class="form-control" name="endTime[]">
                    </div>
                </div>
            `;
            container.appendChild(newItem);

            flatpickr("input[name='startTime[]']", {
                enableTime: true,
                noCalendar: true,
                dateFormat: "H:i",
                time_24hr: true
            });
            flatpickr("input[name='endTime[]']", {
                enableTime: true,
                noCalendar: true,
                dateFormat: "H:i",
                time_24hr: true
            });
        });
    });
</script>
@endsection
