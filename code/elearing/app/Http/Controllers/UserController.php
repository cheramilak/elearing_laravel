<?php

namespace App\Http\Controllers;

use App\Models\TeacherProfile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
  public function index()
  {
    $user = User::all();
    $data = [
      'users' => $user
    ];
    return view('admin.users.index',$data);
  }

  public function create()
  {
    return view('admin.users.create');
  }

  public function store(Request $request)
  {
      // Validate the incoming request data
      $validatedData = $request->validate([
          'name' => 'required|string|max:255',
          'email' => 'required|email|unique:users,email',
          'password' => 'required|string|min:8',
          'type' => 'required|in:0,1,2',
          'status' => 'required|in:0,1,2', // Adjust status values as needed
      ]);

      // Create a new user instance
      $user = new User();
      $user->name = $validatedData['name'];
      $user->email = $validatedData['email'];
      $user->password = bcrypt($validatedData['password']);
      $user->status = $validatedData['status'];
      $user->type = $validatedData['type'];
      $user->save();

      return redirect()->route('users')->with(['message' => 'User created successfully']);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
      // Validate the incoming request data
      $validatedData = $request->validate([
          'name' => 'required|string|max:255',
          'email' => 'required|email|unique:users,email,' . $id,
          'password' => 'nullable|string|min:6', // Password is nullable for update
          'type' => 'required|in:0,1,2',
          'status' => 'required|in:0,1,2', // Adjust status values as needed
      ]);

      // Find the user by ID
      $user = User::findOrFail($id);
      $user->name = $validatedData['name'];
      $user->email = $validatedData['email'];
      if (isset($validatedData['password'])) {
          $user->password = bcrypt($validatedData['password']);
      }
      $user->status = $validatedData['status'];
      $user->type = $validatedData['type'];
      $user->save();
      return redirect()->route('users')->with(['message' => 'User update successfully']);
  }

  public function edit($id){
    $user = User::find($id);
    $data = [
      'user' => $user
    ];
    return view('admin.users.edit',$data);
  }

  public function profile($id){
    $user = User::find($id);
    $profile = TeacherProfile::where('user_id',$id)->first();

    $data = [
        'user' => $user,
        'profile' => $profile
    ];
    return view('admin.users.detail',$data);
  }

  public function downloadTeacherCv($id){
    $profile = TeacherProfile::where('user_id',$id)->first();
    $filePath = public_path($profile->file);
    if (file_exists($filePath)) {
        return response()->download($filePath);
    }
    return back()->with('error','No CV avalable');
  }

  public function updateTeacher(Request $request,$id){
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'status' => 'required|in:0,1,3', // Adjust status values as needed
        'address' => 'nullable|string|max:255',
        'phone' => 'required|string|max:255',
        'file' => 'nullable|file|mimes:pdf,jpeg,png,jpg' ,
        'password' => 'nullable|string|min:6', // Password is nullable for update
    ]);
    $user = User::find($id);
    $profile = TeacherProfile::where('user_id',$id)->first();
    $user->name = $validatedData['name'];
    if (isset($validatedData['password'])) {
        $user->password = bcrypt($validatedData['password']);
    }
    $user->status = $validatedData['status'];

    $user->update();

    if ($request->hasFile('file')) {
        $fileName =  time() . '.' . $request->file->extension();
        $request->file->move(public_path('file'), $fileName);
        $filePath = 'file/'.$fileName;
        $profile->file = $filePath;
    }
    $profile->phone = $request->phone;
    $profile->address = $user->address;
    $profile->update();
    return back()->with('success','update success');
  }
}
