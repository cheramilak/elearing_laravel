<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    public function index(){
      $course = Course::all();
      $data = [
        'course' => $course
      ];
      return view('admin.course.index',$data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|in:0,1',
            'price' => 'required|integer',
        ]);

        dd('test');

        Course::create([
            'name' => $request->input('name'),
            'status' => $request->input('status'),
            'price' => $request->input('price'),
        ]);

        return redirect()->route('course')->with('success','course add  success');
    }

    public function update(Request $request) {
      $request->validate([
        'name' => 'required|string|max:255',
        'status' => 'required|string',
        'price' => 'required|integer',
        'id' => 'required|integer'
    ]);

    $course = Course::findOrFail($request->id);



    $course->update([
        'name' => $request->input('name'),
        'status' => $request->input('status'),
        'price' => $request->price,
    ]);

    return redirect()->route('course')->with('success', 'Course updated successfully.');

  }

  public function delete($id){
    $uni = Course::findOrFail($id);
    $uni->delete();
    return redirect()->route('universty')->with('success', 'delete successfully.');
  }
}
