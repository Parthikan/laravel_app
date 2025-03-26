<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student; // Ensure correct namespace

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
        $request->validate([
            'name' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'gender' => 'required',
            'skill' => 'nullable|array', // Handle array input
        ]);

        Student::create([
            'name' => $request->input('name'),
            'department' => $request->input('department'),
            'gender' => $request->input('gender'),
            'skill' => implode(',', $request->input('skill', [])), // Convert array to string
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
            'gender' => 'required',
            'skill' => 'nullable|array',
        ]);

        $student = Student::findOrFail($id);
        $student->update([
            'name' => $request->input('name'),
            'department' => $request->input('department'),
            'gender' => $request->input('gender'),
            'skill' => implode(',', $request->input('skill', [])),
        ]);

        return redirect()->route('students.index')->with('success', 'Student updated successfully');
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted successfully');
    }
}
