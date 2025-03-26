<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4>{{ isset($student) ? 'Edit Student' : 'Add Student' }}</h4>
        </div>
        <div class="card-body">
            <form action="{{ isset($student) ? route('students.update', $student->id) : route('students.store') }}" method="POST">
                @csrf
                @if(isset($student))
                    @method('PUT')
                @endif

                <div class="mb-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $student->name ?? '') }}" required>
                </div>

                <div class="mb-3">
                    <label for="department" class="form-label">Department:</label>
                    <input type="text" id="department" name="department" class="form-control" value="{{ old('department', $student->department ?? '') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Gender:</label>
                    <div class="d-flex gap-3">
                        @foreach(['Male', 'Female', 'Other'] as $gender)
                            <div class="form-check">
                                <input type="radio" id="gender_{{ $gender }}" name="gender" value="{{ $gender }}" class="form-check-input" {{ old('gender', $student->gender ?? '') == $gender ? 'checked' : '' }} required>
                                <label for="gender_{{ $gender }}" class="form-check-label">{{ $gender }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Skills:</label>
                    <div class="d-flex gap-3">
                        @foreach(['PHP', 'Laravel', 'JavaScript', 'MySQL'] as $skill)
                            <div class="form-check">
                                <input type="checkbox" id="skill_{{ $skill }}" name="skills[]" value="{{ $skill }}" class="form-check-input" {{ in_array($skill, old('skills', $student->skills ?? [])) ? 'checked' : '' }}>
                                <label for="skill_{{ $skill }}" class="form-check-label">{{ $skill }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-success">{{ isset($student) ? 'Update' : 'Submit' }}</button>
                </div>
            </form>
        </div>
    </div>
</div>