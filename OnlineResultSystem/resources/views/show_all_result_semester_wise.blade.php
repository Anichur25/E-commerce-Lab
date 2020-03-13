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
                        @foreach($courses as $course)
                        <th>{{ $course -> course_code }}</th>
                        @endforeach
                        <th>GPA</th>
                    </tr>
                    @foreach($all_students as $student)
                    <tr class="table-secondary">
                    <td class = "center">{{ $student -> student_id }}</td>
                    <?php $all_results = DB :: table('marksheets')
                      ->join('main_result','marksheets.student_id','=','main_result.student_id')
                      ->where('main_result.part',$student -> part)
                      ->where('marksheets.semester',$student -> semester)
                      ->where('main_result.exam_year',$student -> exam_year)
                      ->where('main_result.student_id',$student -> student_id)
                      ->select('marksheets.grade_point','main_result.odd_semester_gpa','main_result.even_semester_gpa')
                      ->get();?>

                    @foreach($all_results as $result)
                    <td class = "center">{{ $result -> grade_point }}</td>
                    @endforeach
                    <td class = "center">
                    <?php 
                       if($student -> semester == 'odd')
                       echo $result -> odd_semester_gpa;
                       else 
                       echo $result -> even_semester_gpa;
                    ?>
                    </td>
                    </tr>
                    @endforeach
                </thead>
            </table>
        </div>
    </div>
</div>
@endsection