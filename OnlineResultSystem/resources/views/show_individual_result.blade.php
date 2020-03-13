@extends('home')
@section('contents')
<div class="box">
    <div class="box-content">
     <p><strong>Student ID : </strong> {{ $student_info[0] -> student_id }}</p>
     <p><strong>Name : </strong> {{ $student_info[0] -> student_name }}</p>
     <p><strong>Session : </strong> {{ $student_info[0] -> session }}</p>
     <p><strong>Hall : </strong> {{ $student_info[0] -> hall }}</p>
    </div>
</div>

<div class="box">
    <div class="box-content span12">
    <table class="table table-striped table-bordered bootstrap-datatable">
                <thead>
                    <tr>
                        <th>Course Code</th>
                        <th>Grade Point</th>
                    </tr>
                </thead>

                @foreach($student_info as $result)
                <tbody>
                    <tr>
                        <td class = "center">{{ $result -> course_code }}</td>
                        <td class="center">{{ $result -> grade_point }}</td>  
                    </tr>
                   
                </tbody>
                @endforeach
            </table>
    </div>
</div>
@endsection