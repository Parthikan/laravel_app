<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all(); // Correct variable name
        return view('students.index', compact('students')); // Now it matches
    }



    public function create()
    {
        return view('students.create'); // Correct path
    }
    public function edit($id)
    {
        $student = Student::findOrFail($id); // Find the student by ID
        return view('students.edit', compact('student')); // Load edit view
    }
    public function update(Request $request, $id)
    {
        // Validate the incoming data
        $request->validate([
            'name' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'mobile' => 'required|string|max:15',
            'gender' => 'required',
            'skill' => 'nullable|array',
        ]);

        // Find the student and update details
        $student = Student::findOrFail($id);
        $student->update([
            'name' => $request->input('name'),
            'department' => $request->input('department'),
            'mobile' => $request->input('mobile'),
            'gender' => $request->input('gender'),
            'skill' => implode(',', $request->input('skill', [])), // Convert array to string
        ]);

        // Redirect back with success message
        return redirect()->route('students.index')->with('success', 'Student updated successfully');
    }


public function destroy($id)
{
    $student = Student::findOrFail($id);
    $student->delete();

    return redirect()->route('students.index')->with('success', 'Student deleted successfully');
}


public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'department' => 'required|string|max:255',
        'gender' => 'required', // Ensure this is present
        'skill' => 'nullable|array',
    ]);

    Student::create([
        'name' => $request->name,
        'department' => $request->department,
        'gender' => $request->gender ?? 'Not Specified', // Set a default value
        'skill' => implode(',', $request->skill ?? []),
    ]);    

    return redirect()->route('students.index')->with('success', 'Student added successfully!');
}


}
