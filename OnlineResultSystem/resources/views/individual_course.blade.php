@extends('home')
@section('contents')
<div class="box">
    <div class="box-content">
       <p><strong>Course Code : </strong> {{ $course -> course_code }}</p>
       <p><strong>Course Title : </strong> {{ $course -> course_title }}</p>
       <p><strong>Course Credit : </strong> {{ $course -> course_credit }}</p>
       <p><strong>Total Mark : </strong> {{ $course -> total_mark }}</p>
       <p><strong>Course Type :  </strong> {{ $course -> course_type }}</p>
       
       <a class="btn btn-primary" href="{{URL :: to('/edit-course/'.$course ->course_id)}}">
                               Edit 
                            </a>
    </div>
</div>
@endsection