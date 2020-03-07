@extends('home')
@section('contents')
<div class="box">
    <div class="box-content">
        <div class="syllabus_info_items">
            <form action="{{ url('/add-marks-info') }}" method="post">
                {{ csrf_field() }}
                
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
                        <label class="text-dark"><strong>Part</strong></label>
                    </div>
                    <div class="col-md-9">
                        <div class="form-group">
                            <select class="student_info_item" name="part" required>
                                <option value=1>Part-I</option>
                                <option value=2>Part-II</option>
                                <option value=3>Part-III</option>
                                <option value=4>Part-IV</option>
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
                                <option value="odd">Odd Semester</option>
                                <option value="even">Even Semester</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <label class="text-dark"><strong>Examination Year</strong></label>
                    </div>
                    <div class="col-md-9">
                        <div class="form-group">
                            <select class="student_info_item" name="exam_year" required>
                                @foreach($years as $year)
                                <option value="{{ $year -> exam_year }}">{{ $year -> exam_year }}</option>
                                @endforeach 
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2">
                        <label class="text-dark"><strong>Course Code</strong></label>
                    </div>
                    <div class="col-md-9">
                        <div class="form-group">
                            <select class="student_info_item" name="course_code" required>
                                @foreach($courses as $course)
                                <option value="{{ $course -> course_code }}">{{ $course -> course_code }}</option>
                                @endforeach 
                            </select>
                        </div>
                    </div>
                </div>
                
                
                 <button type = "submit" class = "btn btn-primary">Add Marks</button>
            </form>
        </div>
    </div>
</div>

@endsection