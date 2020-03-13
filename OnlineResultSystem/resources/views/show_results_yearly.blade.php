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
                        <th>Odd Semester GPA</th>
                        <th>Even Semester GPA</th>
                        <th>YGPA</th>
                    </tr>
                </thead>

                @foreach($results as $result)
                <tbody>
                    <tr>
                        <td class = "center">{{ $result -> student_id }}</td>
                        <td class="center">{{ $result -> odd_semester_gpa }}</td>
                        <td class = "center"> {{ $result -> even_semester_gpa }}</td>
                        <td class = "center">{{ $result -> yearly_gpa }}</td>
                    </tr>
                   
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection