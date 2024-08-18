<?php

namespace App\Http\Controllers;

use App\Models\TeacherProfile;
use App\Models\User;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function signup(){
        return view('teacher.signup');
    }


    public function store(Request $request){
        $validatedData = $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,',
            'password' => 'required|string|min:6|confirmed',
            'file' => 'required|file|mimes:pdf,jpeg,png,jpg' ,
            'phone' => 'required|string|max:255',
        ]);

        $user = new User();
        $user->name = $validatedData['username'];
        $user->email = $validatedData['email'];
        $user->password = bcrypt($validatedData['password']);
        $user->status = 3;
        $user->type = 2;
        $user->save();

        $teacher = new TeacherProfile;
        if ($request->hasFile('file')) {
            $fileName =  time() . '.' . $request->file->extension();
            $request->file->move(public_path('file'), $fileName);
            $filePath = 'file/'.$fileName;
        }
        
        $teacher->phone = $request->phone;
        $teacher->file = $filePath;
        $teacher->user_id = $user->id;
        $teacher->save();
        return redirect()->route('')->with('message','Signup success');
    }
}
