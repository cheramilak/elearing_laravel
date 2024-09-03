<?php

namespace App\Http\Controllers;

use App\Models\ResearchConsultation;
use Illuminate\Http\Request;

class ReaserchController extends Controller
{
    public function index(){
        $course = ResearchConsultation::all();
        $data = [
          'course' => $course
        ];
        return view('admin.research.index',$data);
      }

      public function store(Request $request)
      {
          $request->validate([
              'name' => 'required|string|max:255',
              'status' => 'required|in:0,1',
              'price' => 'required|integer',
          ]);
          ResearchConsultation::create([
              'name' => $request->input('name'),
              'status' => $request->input('status'),
              'price' => $request->input('price'),
          ]);

          return redirect()->route('research')->with('success','added  success');
      }

      public function update(Request $request) {
        $request->validate([
          'name' => 'required|string|max:255',
          'status' => 'required|string',
          'price' => 'required|integer',
          'id' => 'required|integer'
      ]);

      $course = ResearchConsultation::findOrFail($request->id);



      $course->update([
          'name' => $request->input('name'),
          'status' => $request->input('status'),
          'price' => $request->price,
      ]);

      return redirect()->route('research')->with('success', 'updated successfully.');
    }

    public function delete($id){
      $uni = ResearchConsultation::findOrFail($id);
      $uni->delete();
      return redirect()->route('research')->with('success', 'delete successfully.');
    }
}
