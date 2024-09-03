<?php

namespace App\Http\Controllers;

use App\Models\StudentProfile;
use App\Models\StudentTutorial;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{
    public function signup(){
        return view('student.signup');
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,',
            'password' => 'required|string|min:6|confirmed',
            'phone' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);

        $user = new User();
        $user->name = $validatedData['username'];
        $user->email = $validatedData['email'];
        $user->password = bcrypt($validatedData['password']);
        $user->status = 3;
        $user->type = 2;
        $user->save();

        $student = new StudentProfile;

        $student->phone = $request->phone;
        $student->address = $request->address;
        $student->user_id = $user->id;
        $student->save();
        Auth::attempt([
            'email' => $validatedData['email'],
            'password' => $validatedData['password']
        ]);
        $cat = Session::get('cat', 0);
        if($cat == 0){
            return redirect()->route('getCategory');
        }
        return redirect()->route('login')->with('message','Signup success');
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

        // Fetch the subjects from the database based on the selected IDs
        $subjects = Subject::whereIn('id', $selectedSubjectIds)->get();
        $selectedGrade = Session::get('selectedGrade', 'No Grade');
        $type = Session::get('type', 'No set');
        $cat = Session::get('cat', 0);
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
        $studentTutorial->save();
        return view('home.success');

    }
}
