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
            <h2><i class="halflings-icon user"></i><span class="break"></span>Syllabuses</h2>
            
        </div>
        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable">
                <thead>
                    <tr>
                        <th>Syllabus Name</th>
                        <th>Year</th>
                        <th>Semester</th>
                        <th>Session</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                @foreach($all_syllabuses_info as $syllabus)
                <tbody>
                    <tr>
                        <td class = "center">{{ $syllabus -> syllabus_name }}</td>
                        <td class="center">{{ $syllabus -> year }}</td>
                        <td class = "center"> {{ $syllabus -> semester }}</td>
                        <td class = "center"> {{ $syllabus -> session_id }}</td>
                        <td class="center">
                            <a class="btn btn-info" href="{{URL :: to('/syllabus-detail/'.$syllabus ->syllabus_id)}}">
                                Details
                            </a>
                           
                            <a class="btn btn-danger" href="{{URL :: to('/delete-syllabus/'.$syllabus ->syllabus_id)}}">
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