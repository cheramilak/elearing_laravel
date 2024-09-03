<?php

namespace App\Http\Controllers;

use App\Models\course;
use App\Models\ResearchConsultation;
use App\Models\StudentTutorial;
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
        $cat = Session::get('cat', 0);
        if($cat == 1){
            $subject = Subject::where('status',1)->get();
        }
        else if($cat == 2){
            $subject = ResearchConsultation::where('status',1)->get();
        }
        else if($cat == 3){
            $subject = course::where('status',1)->get();
        }
        $data = [
            'subject' => $subject
        ];
        return view('home.subject',$data);
    }

    public function setSubject(Request $request){
        $request->validate([
            'subjects' => 'required|array',
        ]);
        // Get the selected subject IDs
        $selectedSubjects = $request->input('subjects');
        // Store the selected subjects in the session
        Session::put('selected_subjects', $selectedSubjects);
        $cat = Session::get('cat', 0);
        if($cat == 1){
            return redirect()->route('selectGrade');

        }
        return redirect()->route('formStudy');
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

    public function formStudy(){
        return view('home.area');
    }

    public function setStudy(Request $request){
        $request->validate([
            'study' => 'required|string',
        ]);
        Session::put('study', $request->study);
        return redirect()->route('selectShedule');
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

    public function setStudentTutorila(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,',
            'phone' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);
        $schedule = Session::get('schedule', []);
        // For demonstration, you might also want to retrieve the selected subject and grade
        // Assuming you stored them in session as well
        $selectedSubjectIds = Session::get('selected_subjects', []);
        $cat = Session::get('cat', 0);
        // Fetch the subjects from the database based on the selected IDs
        if($cat == 1){
            $subjects = Subject::whereIn('id', $selectedSubjectIds)->get();
        }
        else if($cat == 2){
            $subjects = ResearchConsultation::whereIn('id', $selectedSubjectIds)->get();
        }
        else if($cat == 3){
            $subjects = course::whereIn('id', $selectedSubjectIds)->get();
        }
        else{
            $subjects = [];
        }
        $selectedGrade = Session::get('selectedGrade', 'No Grade');
        $type = Session::get('type', 'No set');
        $study = Session::get('study', 'No set');

        $studentTutorial = new StudentTutorial;
        $studentTutorial->cat = $cat;
        $studentTutorial->schedule = $schedule;
        $studentTutorial->course = $subjects;
        $studentTutorial->selected_grade = $selectedGrade;
        $studentTutorial->type = $type;
        $studentTutorial->name = $request->name;
        $studentTutorial->email = $request->email;
        $studentTutorial->phone = $request->phone;
        $studentTutorial->address = $request->address;
        $studentTutorial->study = $study;
        $studentTutorial->save();
        return view('home.success');
    }

    public function checkout(){
        return view('home.persenal_info');
    }
}
