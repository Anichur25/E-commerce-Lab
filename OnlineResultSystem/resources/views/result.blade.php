@extends('header')
@section('body')
<br>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3 class="text-center">Student Result</h3>
        </div>
        <div class="card-body">
            <h4>Student's Name : Anichur Rahman</h4>
            <h4>Student's ID : 1610676125</h4>
            <h4>Session : 2015 - 2016</h4>
            <h4>Hall : Shahid Habibur Rahman Hall</h4>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Course Name</th>
                        <th scope="col">Course Code</th>
                        <th scope="col">Credit</th>
                        <th scope="col">Result</th>
                    </tr>
                </thead>
                <tbody>
                   @foreach($student_info as $course)
                    <tr>
                        <td>{{ $course -> course_name }}</td>
                        <td>{{ $course -> course_code }}</td>
                        <td>{{ $course -> course_credit }}</td>
                        <td>{{ $course -> grade_point }}</td>
                    </tr>
                   @endforeach
                </tbody>
            </table>
        </div>

        </form>
    </div>
</div>
</div>
@endsection