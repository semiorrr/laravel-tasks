@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4 text-center">Student Database</h2>
    <div class="row mb-3">
        <div class="col-md-6 offset-md-3">
            <input type="text" id="searchInput" class="form-control" placeholder="Search students...">
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle" id="studentsTable">
            <thead class="table-light">
                <tr>
                    <th>Photo</th>
                    <th>Last Name</th>
                    <th>First Name</th>
                    <th>Course</th>
                    <th>Student ID</th>
                    <th>Details<br><small>(Year/Bdate/Hobbies/Skills)</small></th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                <tr>
                    <td class="text-center">
                        <img src="{{ $student->photo }}"
                             alt="Photo"
                             class="rounded-circle border border-secondary shadow-sm"
                             width="60" height="60"
                             onerror="this.onerror=null;this.src='https://via.placeholder.com/60?text=No+Photo';">
                    </td>
                    <td>{{ $student->last_name }}</td>
                    <td>{{ $student->first_name }}</td>
                    <td>{{ $student->course }}</td>
                    <td>{{ $student->student_id }}</td>
                    <td style="white-space: pre-line;">{{ $student->details }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script>
    document.getElementById('searchInput').addEventListener('keyup', function() {
        let value = this.value.toLowerCase();
        let rows = document.querySelectorAll('#studentsTable tbody tr');
        rows.forEach(row => {
            let text = row.innerText.toLowerCase();
            row.style.display = text.includes(value) ? '' : 'none';
        });
    });
</script>
@endsection 