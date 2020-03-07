@extends('home')
@section('contents')
<div class="box">
    <div class="box-content">
       <p><strong>Syllabus Name : </strong> {{ $syllabus[0] -> syllabus_name }}</p>
       <p><strong>Session : </strong> {{ $syllabus[0] -> session_id }}</p>
       <p><strong>Year : </strong> {{ $syllabus[0] -> year}}</p>
       <p><strong>Semester : </strong> {{ $syllabus[0] -> semester }}</p>
       <p><strong>Courses : </strong></p>
       <table class="table table-striped table-bordered bootstrap-datatable">
                <thead>
                    <tr>
                        <th>Course Code</th>
                        <th>Course Title</th>
                        <th>Credit</th>
                    </tr>
                </thead>

                @foreach($syllabus as $syllabus_info)
                <tbody>
                    <tr>
                        <td class = "center">{{ $syllabus_info -> course_code }}</td>
                        <td class="center">{{ $syllabus_info -> course_title }}</td>
                        <td class = "center"> {{ $syllabus_info -> course_credit }}</td>
                    </tr>
                </tbody>
                @endforeach
</table>
    </div>
</div>
@endsection