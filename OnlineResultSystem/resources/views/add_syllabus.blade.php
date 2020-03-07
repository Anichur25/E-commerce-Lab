@extends('home')
@section('contents')
<div class="card">
    <div class="card-body">
        <div class="syllabus_info_items">
            <form action="{{ url('/save-syllabus') }}" method="post" name="course-form">
                {{ csrf_field() }}

                <div class="row">
                    <div class="col-md-2">
                        <label class="text-dark"><strong>Syllabus Title</strong></label>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <input type="text" class="student_info_item" name="syllabus_title"
                                style="background-color: gainsboro;" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2">
                        <label class="text-dark"><strong>Year</strong></label>
                    </div>
                    <div class="col-md-9">
                        <div class="form-group">
                            <select class="student_info_item" name="year" required>
                                <option value="First">First Year</option>
                                <option value="Second">Second Year</option>
                                <option value="Third">Third Year</option>
                                <option value="Fourth Year">Fourth Year</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <label class="text-dark"><strong>Semester</strong></label>
                    </div>
                    <div class="col-md-9">
                        <div class="form-group">
                            <select class="student_info_item" name="semester" required>
                                <option value="ODD">Odd Semester</option>
                                <option value="EVEN">Even Semester</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <label class="text-dark"><strong>Session</strong></label>
                    </div>
                    <div class="col-md-9">
                        <div class="form-group">
                            <select class="student_info_item" name="session" required>
                                @foreach($sessions as $session)
                                <option value="{{ $session -> session_year }}">{{ $session -> session_year }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <label class="text-dark"><strong>Courses : </strong></label>
                    </div>
                    <div class="col-md-9">
                        <div class="form-group">
                            <select class="student_info_item" name="courses[]">
                                @foreach($courses as $course)
                                <option value="{{ $course -> course_id }}">{{ $course -> course_title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                 <button type = "submit" class = "btn btn-success" id = "submit_btn">Add Syllabus</button>
            </form>
            <button class="btn btn-primary add_btn">Add More Courses</button>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {

    $('.add_btn').click(function() {
       
       $element = '<div class="row">' +
                    '<div class="col-md-9">'+
                        '<div class="form-group">'+
                            '<select class="student_info_item" name="courses[]">'+
                                '@foreach($courses as $course)'+
                                '<option value="{{ $course -> course_id }}">{{ $course -> course_title }}</option>'+
                                '@endforeach'+
                            '</select>'+
                        '</div>'+
                    '</div>'+
                '</div>'
       $($element).insertBefore('#submit_btn');
    });

});
</script>
@endsection