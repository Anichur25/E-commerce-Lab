@extends('home')
 @section('contents')
 @if(Session :: get('message-save'))
 <p class = 'alert alert-success'>{{ Session :: get('message-save') }}</p>
 <?php Session :: put('message-save',NULL)?>
 @endif
 <div class="course_info_container">
     <div class="student_info_items">
         <form action = "{{ url('/update-course/'.$course -> course_id) }}" method = "post">
             {{ csrf_field() }}
             <div class="row">
                 <div class="col-md-6"><h3 class = "text-center heading">Course Information</h3></div>
             </div>
             <div class="row">
                 <div class="col-md-2">
                     <label class="text-dark"><strong>Course Code</strong></label>
                 </div>
                 <div class="col-md-8">
                     <div class="form-group">
                         <input type="text" class="student_info_item" name="course_code"
                             style="background-color: gainsboro;" value = "{{ $course -> course_code }}" required>
                     </div>
                 </div>
             </div>
             <div class="row">
                 <div class="col-md-2">
                     <label class="text-dark"><strong>Course Title</strong></label>
                 </div>
                 <div class="col-md-8">
                     <div class="form-group">
                         <input type="text" class="student_info_item" name="course_title"
                             style="background-color: gainsboro;" value = "{{ $course -> course_title }}" required>
                     </div>
                 </div>
             </div>
             <div class="row">
                 <div class="col-md-2">
                     <label class="text-dark"><strong>Credit</strong></label>
                 </div>
                 <div class="col-md-8">
                     <div class="form-group">
                         <input type="number" class="student_info_item" name="course_credit"
                             style="background-color: gainsboro;" value = "{{ $course -> course_credit }}"required>
                     </div>
                 </div>
             </div>
             <div class="row">
                 <div class="col-md-2">
                     <label class="text-dark"><strong>Total Marks</strong></label>
                 </div>
                 <div class="col-md-8">
                     <div class="form-group">
                         <input type="text" class="student_info_item" name="total_mark"
                             style="background-color: gainsboro;" value = "{{ $course -> total_mark }}" required>
                     </div>
                 </div>
             </div>
             <div class="row">
                    <div class="col-md-2">
                        <label class="text-dark"><strong>Course Type</strong></label>
                    </div>
                    <div class="col-md-9">
                        <div class="form-group">
                            <select class="student_info_item" name="course_type" value = "{{ $course -> course_type }}">
                            <option value="Written">{{ $course -> course_type }}</option>
                                <option value="Written">Written</option>
                                <option value="Lab">Lab</option>
                                <option value="Project">Project</option>
                                <option value="Board viva">Board viva</option>
                            </select>
                        </div>
                    </div>
                </div>     
             <button type="submit" class="btn btn-primary">Update Course</button>
         </form>
     </div>

 </div>

 @endsection