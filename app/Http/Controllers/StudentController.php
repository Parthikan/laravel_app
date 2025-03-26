<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all(); // Fetch all students
        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'gender' => 'required|string',
            'skill' => 'nullable|array', // Accept array or null
        ]);

        // Convert skill array to string
        $validatedData['skill'] = isset($validatedData['skill']) 
            ? implode(',', $validatedData['skill']) 
            : null;

        // Insert data into database
        students::create([
            'name' => $validatedData['name'],
            'department' => $validatedData['department'],
            'gender' => $validatedData['gender'],
            'skill' => $validatedData['skill']
        ]);

        return redirect()->route('students.index')->with('success', 'Student added successfully!');
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'gender' => 'required|string',
            'skill' => 'nullable|array',
        ]);

        $student = Student::findOrFail($id);

        // Convert skill array to string
        $skill = isset($request->skill) ? implode(',', $request->skill) : null;

        // Update student data
        $student->update([
            'name' => $request->name,
            'department' => $request->department,
            'gender' => $request->gender,
            'skill' => $skill
        ]);

        return redirect()->route('students.index')->with('success', 'Student updated successfully!');
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted successfully');
    }
}
