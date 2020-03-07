@extends('home')
 @section('contents')
  
<?php Session :: put('student_id',$student -> student_id) ?>
 <div class="box">
 <div class="box-content">
  <div class="student_info_items_mark">
         <form action = "{{ url('/save-marks') }}" method = "post">
             {{ csrf_field() }}
             <div class="row">
                 <div class="col-md-2">
                     <label class="text-dark"><strong>Student ID</strong></label>
                 </div>
                 <div class="col-md-8">
                     <div class="form-group">
                         <input type="text" class="student_info_item" value = "{{ $student -> student_id }}"
                             style="background-color: gainsboro;" disabled>
                     </div>
                 </div>
             </div>
              
             @if(Session :: get('course_type') == 'Written')
              @include('written_exam')
             @elseif(Session :: get('course_type') == 'Lab')
             @include('lab_exam')
             @elseif(Session :: get('course_type') == 'Project')
             @include('project')
             @else
             <div class="row">
                 <div class="col-md-2">
                     <label class="text-dark"><strong>Viva Mark</strong></label>
                 </div>
                 <div class="col-md-8">
                     <div class="form-group">
                         <input type="text" class="student_info_item" name="total_viva"
                             style="background-color: gainsboro;" required>
                     </div>
                 </div>
             </div>
             @endif
             <button type="submit" class="btn btn-info">Save</button>
         </form>
     </div>
 </div>
 </div>
 @endsection