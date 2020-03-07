@extends('home')
@section('contents')
<div class="box">
    <div class="box-content">
       <p><strong>Student Roll : </strong> {{ $student -> student_id }}</p>
       <p><strong>Student Name : </strong> {{ $student -> student_name }}</p>
       <p><strong>Father's Name : </strong> {{ $student -> student_father_name }}</p>
       <p><strong>Mother's Name : </strong> {{ $student -> student_mother_name }}</p>
       <p><strong>Date Of Birth : </strong> {{ $student -> student_dob }}</p>
       <p><strong>Hall : </strong> {{ $student -> hall }}</p>
       <p><strong>Session : </strong> {{ $student -> session }}</p>
       <p><strong>Gender : </strong> {{ $student -> gender }}</p>
       <p><strong>Email : </strong> {{ $student -> student_email }}</p>
       <p><strong>Mobile Number : </strong> {{ $student -> student_mobile_number }}</p>
       <p><strong>Address : </strong> {{ $student -> address }}</p>
       <a class="btn btn-primary" href="{{URL :: to('/edit-student/'.$student ->student_id)}}">
                               Edit 
                            </a>
    </div>
</div>
@endsection