<?php

namespace App\Http\Controllers;

use App\Models\course;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FrontEndController extends Controller
{
    public function index(){
        $course = course::all();
        $data = [
            'course' => $course
        ];
        return view('home.index',$data);
    }

    public function getCategory(){
        return view('home.category');
    }
    public function setCategory($cat){
        Session::put('cat', $cat);
        return view('home.type');
    }

    public function setType($type){
        Session::put('type', $type);
        return $this->selectSUbject();
    }

    public function selectGrade(){
        return view('home.grade');
    }

    public function selectSUbject(){
        $subject = Subject::where('status',1)->get();
        $data = [
            'subject' => $subject
        ];
        return view('home.subject',$data);
    }

    public function setSubject(Request $request){
        $request->validate([
            'subjects' => 'required|array',
            'subjects.*' => 'exists:subjects,id', // Ensure each selected ID exists in the subjects table
        ]);
        // Get the selected subject IDs
        $selectedSubjects = $request->input('subjects');
        // Store the selected subjects in the session
        Session::put('selected_subjects', $selectedSubjects);
        return redirect()->route('selectGrade');
    }

    public function setGrade(Request $request){
        $request->validate([
            'grade' => 'required|integer',
        ]);
        Session::put('selectedGrade', $request->grade);
        return redirect()->route('selectShedule');
    }

    public function selectShedule(){
        return view('home.shedule');
    }

    public function storeSchedule(Request $request)
    {
        // Validate that each day of the week is unique
        $request->validate([
            'dayOfWeek' => 'required|array|distinct',
            'dayOfWeek.*' => 'in:monday,tuesday,wednesday,thursday,friday,saturday,sunday',
            'startTime.*' => 'required_with:dayOfWeek.*|date_format:H:i',
            'endTime.*' => 'nullable|date_format:H:i|after:startTime.*',
        ]);

        // Get the input values
        $daysOfWeek = $request->input('dayOfWeek');
        $startTimes = $request->input('startTime');
        $endTimes = $request->input('endTime');

        // Combine the schedule data
        $schedule = [];
        foreach ($daysOfWeek as $index => $day) {
            $schedule[] = [
                'day' => $day,
                'start_time' => $startTimes[$index] ?? null,
                'end_time' => $endTimes[$index] ?? null,
            ];
        }

        // Store the schedule data in the session
        Session::put('schedule', $schedule);

        // Redirect or perform other actions
        return redirect()->route('showCheckout'); // Replace with your desired route
    }

    public function showCheckout()
    {
        // Retrieve the schedule from the session
        $schedule = Session::get('schedule', []);

        // For demonstration, you might also want to retrieve the selected subject and grade
        // Assuming you stored them in session as well
        $selectedSubjectIds = Session::get('selected_subjects', []);

        // Fetch the subjects from the database based on the selected IDs
        $subjects = Subject::whereIn('id', $selectedSubjectIds)->get();
        $selectedGrade = Session::get('selectedGrade', 'No Grade');
        $type = Session::get('type', 'No set');

        // For demonstration purposes, set a dummy total cost
        $totalCost = 150.00;

        return view('home.checkout', [
            'schedule' => $schedule,
            'subjects' => $subjects,
            'grade' => $selectedGrade,
            'totalCost' => $totalCost,
            'type' => $type
        ]);
    }

    public function about(){
        $course = course::all();
        $data = [
            'course' => $course
        ];
        return view('home.about',$data);
    }

    public function contact(){
        $course = course::all();
        $data = [
            'course' => $course
        ];
        return view('home.contact',$data);
    }
}
