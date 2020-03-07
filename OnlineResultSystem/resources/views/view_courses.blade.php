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
            <h2><i class="halflings-icon user"></i><span class="break"></span>courses</h2>
            
        </div>
        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable">
                <thead>
                    <tr>
                        <th>Course Code</th>
                        <th>Course Title</th>
                        <th>Credit</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                @foreach($all_courses_info as $course)
                <tbody>
                    <tr>
                        <td class = "center">{{ $course -> course_code }}</td>
                        <td class="center">{{ $course -> course_title }}</td>
                        <td class = "center"> {{ $course -> course_credit }}</td>
                        <td class="center">
                            <a class="btn btn-info" href="{{URL :: to('/course-detail/'.$course ->course_id)}}">
                                Details
                            </a>
                           
                            <a class="btn btn-danger" href="{{URL :: to('/delete-course/'.$course ->course_id)}}">
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