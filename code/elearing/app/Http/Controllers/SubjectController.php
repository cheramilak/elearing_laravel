<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::with('grades')->get();
        return view('admin.tutor.index', compact('subjects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|integer',
            'status' => 'required',

        ]);
        $subject = Subject::create($request->all());
        return back()->with('success','subject add success');
    }

    public function show(Subject $subject)
    {
        return view('subjects.show', compact('subject'));
    }

    public function edit(Subject $subject)
    {
        return view('subjects.edit', compact('subject'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|integer',
            'id' => 'required|integer',
            'status' => 'required',
        ]);
        $subject = Subject::find($request->id);
        $subject->update($request->all());
        return back()->with('success','subject update success');
    }

    public function destroy(Subject $subject)
    {
        $subject->delete();
        return redirect()->route('subjects.index');
    }

    // Add grades to a subject
    public function addGrade(Request $request, Subject $subject)
    {
        $request->validate([
            'grade' => 'required|integer',
        ]);

        $subject->grades()->create([
            'grade' => $request->input('grade'),
        ]);

        return redirect()->route('subjects.show', $subject);
    }
}
