@extends('home')
@section('contents')

@if(Session :: get('message'))
<p class = "alert-success">{{ Session :: get('message') }}</p>
<?php Session :: put('message',NULL); ?>
@endif
@if(Session :: get('message-update'))
 <p class = 'alert alert-success'>{{ Session :: get('message-update') }}</p>
 <?php Session :: put('message-update',NULL)?>
 @endif
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>Students</h2>
            
        </div>
        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable">
                <thead>
                    <tr>
                        <th>Student ID</th>
                        <th>Student Name</th>
                        <th>Session</th>
                        <th>Contact Number</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                @foreach($all_students_info as $student)
                <tbody>
                    <tr>
                        <td class = "center">{{ $student -> student_id }}</td>
                        <td class="center">{{ $student -> student_name }}</td>
                        <td class = "center"> {{ $student -> session }}</td>
                        <td class = "center"> {{ $student -> student_mobile_number }}</td>
                        <td class="center">
                            <a class="btn btn-info" href="{{URL :: to('/student-detail/'.$student ->student_id)}}">
                                Details
                            </a>
                           
                            <a class="btn btn-danger" href="{{URL :: to('/delete-student/'.$student ->student_id)}}">
                                Delete
                            </a>
                           
                        </td>
                    </tr>
                   
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
    <!--/span-->

</div>
@endsection