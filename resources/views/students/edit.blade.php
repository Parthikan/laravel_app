@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Student</h1>
        <form action="{{ route('students.update', $student->id) }}" method="POST">
            @csrf
            @method('PUT')

            <input type="text" name="name" value="{{ old('name', $student->name) }}" required>
            <input type="text" name="department" value="{{ old('department', $student->department) }}" required>
            <input type="text" name="mobile" value="{{ old('mobile', $student->mobile) }}" required>

            <button type="submit">Update</button>
        </form>

    </div>
@endsection
