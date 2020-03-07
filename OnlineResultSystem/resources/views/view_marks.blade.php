@extends('home')
@section('contents')
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>Marks</h2>
            
        </div>
        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable">
                <thead>
                    <tr>
                        <th>Student ID</th>
                        <th>Part</th>
                        <th>Semester</th>
                        <th>Exam Year</th>
                        <th>Course Code</th>
                        <th>Grade Point</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                @foreach($all_results_info as $result)
                <tbody>
                    <tr>
                        <td class = "center">{{ $result -> student_id }}</td>
                        <td class="center">{{ $result -> part }}</td>
                        <td class = "center"> {{ $result -> semester }}</td>
                        <td class = "center"> {{ $result -> exam_year }}</td>
                        <td class = "center"> {{ $result -> course_code }}</td>
                        <td class = "center"> {{ $result -> grade_point }}</td>
                        <td class="center">
                            <a class="btn btn-info" href="{{URL :: to('/course-detail/'.$result ->student_id)}}">
                                Details
                            </a>
                           
                            <a class="btn btn-danger" href="{{URL :: to('/delete-course/'.$result ->student_id)}}">
                                Delete
                            </a>
                           
                        </td>
                    </tr>
                   
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection