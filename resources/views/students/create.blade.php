@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Student</h1>
    <form action="{{ route('students.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Name:</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Department:</label>
            <input type="text" name="department" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Mobile:</label>
            <input type="text" name="mobile" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Add</button>
    </form>
</div>
@endsection
