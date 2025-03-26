@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Add Student</h2>
    <form action="{{ route('students.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Name:</label>
            <input type="text" name="name" class="form-control" placeholder="Enter your name" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Department:</label>
            <input type="text" name="department" class="form-control" placeholder="Enter department" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Gender:</label>
            <div>
                <input type="radio" name="gender" value="Male" required> Male
                <input type="radio" name="gender" value="Female" required> Female
                <input type="radio" name="gender" value="Other" required> Other
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">Skills:</label>
            <div>
                <input type="checkbox" name="skill[]" value="PHP"> PHP
                <input type="checkbox" name="skill[]" value="Laravel"> Laravel
                <input type="checkbox" name="skill[]" value="JavaScript"> JavaScript
                <input type="checkbox" name="skill[]" value="MySQL"> MySQL

            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
